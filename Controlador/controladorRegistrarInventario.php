<?php
// Importamos dependencias
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");
require_once("../Modelo/materialModelo.php");
require_once("../Modelo/pedidoModelo.php");
require_once("../Modelo/inventarioModelo.php");
require_once("../Modelo/accesorioModelo.php");
// Iniciamos la sesion para utilizar las variables
session_start();

$obj = new Inventario();
// Inicializamos una variable para retornar 
$perfil = ($_SESSION['rol'] == 4) ? "usuario" : "administrador" ;
 
// Verificamos que tipo de inventario vamos a registrar
if ($_POST['TipoRegistro'] == 1) {
    // Creamos los objetos de las clases que usaremos y otras variables
    $pedido = new Pedido();
    $mate = new Material();
    $usuario = new Consultas();
    $pro = $usuario->consultarProveedorId($_POST['provee']);
    $mensaje = "";
    $control = 0;
    // Verificamos si observasion no fue diligenciada
    if ($_POST['obser'] == null) {
        $_POST['obser'] = "0";
    }
    // Verificamos que tipo de inventario quiere ingresar
    if ($_POST['TiInv'] == 1) {
        // Verificamos si el proveedor existe
        if ($pro) {
            //Guardamos un array con los datos del proveedor
            $proveedor = explode("-", $_POST['provee']);
            $_POST['provee'] = $proveedor[0];
            // Verificamos si los materiales estan registrados
            for ($i = 0; $i < $_POST['contador']; $i++) {
                $material = explode("-", $_POST['material' . $i + 1]);
                if (!$mat = $mate->consultarMaterial($material[0])) {
                    $control = 1;
                    $mensaje = $mensaje . $_POST['material' . $i + 1] . " ";
                }
            }   
            // Si no esta registrado mostramos un mensaje y nos devolvemos al formulario
            if ($control == 1) {
                // Mensaje
                $_SESSION['mensaje'] = 'Hay algunos materiales que no se encuentran registrados';
                $_SESSION['confirmarRegistro'] = 2;
                
                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
            }
            // Si esta registrado
            else {
                // Inicializaremos variables para llevar el control
                $materiaPrimas = null;
                $control = 0;
                // Creamos un for para guardar todos los materiales que se intentan registrar en el inventario
                for ($i = 0; $i < $_POST['contador']; $i++) {
                    $materiaPrimas[] = $_POST['material' . $i + 1];
                }
                // Con la funcion contaremos cuantas veces se repiten los materiales en el array para saber si intenta registrar dos veces el mismo material
                $conteo = array_count_values($materiaPrimas);
                // Con un for verificamos si hay materiales repetidos
                for ($i = 0; $i < $_POST['contador']; $i++) {
                    if (isset($conteo[$_POST['material' . $i + 1]]) && $conteo[$_POST['material' . $i + 1]] > 1) {
                        $control = 1;
                    }
                }
                // Si hay materiales repetidos mandamos un mensaje y volvemos al formulario
                if ($control == 1) {
                    // Mensaje
                    $_SESSION['mensaje'] = 'Se esta intentando registrar varias veces el mismo material';
                    $_SESSION['confirmarRegistro'] = 2;
                    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                }
                // Si no hay materiales repetidos seguimos
                else {
                    // Usaremos el for para verificar si las unidades de los materiales concuerdan
                    for ($i = 0; $i < $_POST['contador']; $i++) {
                        $material = explode("-", $_POST['material' . $i + 1]);
                        $mat = $mate->consultarMaterial($material[0]);
                        // Rectificamos si las unidades son compatibles entre si 
                        if (
                            ($_POST['TipCan' . $i + 1] == 2 && ($mat['ma_tipo_cantidad'] == "metros" || $mat['ma_tipo_cantidad'] == "centimetros")) ||
                            ($mat['ma_tipo_cantidad'] == "unidades" && ($_POST['TipCan' . $i + 1] == 1 || $_POST['TipCan' . $i + 1] == 3))
                        ) {
                            // Si no lo son mandamos un mensaje y volvemos al formulario
                            $_SESSION['mensaje'] = 'Algunas unidades de medida no corresponden con el material';
                            $_SESSION['confirmarRegistro'] = 2;
                            echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                            die();
                        }
                    }
                    // Si son compatibles registramos el inventario
                    $obj->registrarInventarioEntrada($_POST);
                    // Con un for registramos todas las materias primes que se intentan registrar una por una
                    for ($i = 0; $i < $_POST['contador']; $i++) {
                        $_POST['TipCan'] = $_POST['TipCan' . $i + 1];
                        $_POST['cant'] = $_POST['cant' . $i + 1];
                        $material = explode("-", $_POST['material' . $i + 1]);
                        $_POST['material'] = $material[0];
                        $_POST['precioUni'] = $_POST['precioUni' . $i + 1];


                        $obj->registrarMaterialInventario($_POST);
                    }
                    // Con un for sumamos la cantidad de materia prima registrada en el inventario a la cantidad de materia prima registrada en la base de datos
                    for ($i = 0; $i < $_POST['contador']; $i++) {
                        $material = explode("-", $_POST['material' . $i + 1]);
                        $mat = $mate->consultarMaterial($material[0]);

                        if ($_POST['TipCan' . $i + 1] == 2 && $mat['ma_tipo_cantidad'] == "unidades") {
                            $total = $_POST['cant' . $i + 1] + $mat['ma_cantidad'];
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        } else if ($_POST['TipCan' . $i + 1] == 1 && $mat['ma_tipo_cantidad'] == "centimetros") {
                            $centimetros = $_POST['cant' . $i + 1] * 100;
                            $total = $centimetros + $mat['ma_cantidad'];
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        } else if ($_POST['TipCan' . $i + 1] == 3 && $mat['ma_tipo_cantidad'] == "metros") {
                            $metros = $_POST['cant' . $i + 1] / 100;
                            $total = $metros + $mat['ma_cantidad'];
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        } else {
                            $total = $_POST['cant' . $i + 1] + $mat['ma_cantidad'];
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        }
                    }
                    // Mandamos un mensaje de exito y volvemos al formulario
                    $_SESSION['mensaje'] = 'Registro entrada material exitoso';
                    $_SESSION['confirmarRegistro'] = 1;
                    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                }
            }
        } else {
            // Si el proveedor no existe mandamos un mensaje y volvemos al formulario
            $_SESSION['mensaje'] = 'El proveedor no se encuentra registrado';
            $_SESSION['confirmarRegistro'] = 2;
            echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
        }
    }
    // Si se intenta registrar un inventario de salida entramos en esta condición
    else if ($_POST['TiInv'] == 2) {
        // Verificamos si el pedido existe
        if ($pedido->consultarPedidoId(0, $_POST['pedido'])) {
            // Verificamos si el material a usar existe
            for ($i = 0; $i < $_POST['contadorSalida']; $i++) {
                $material = explode("-", $_POST['materialSalida' . $i + 1]);
                if (!$mat = $mate->consultarMaterial($material[0])) {
                    $control = 1;
                    $mensaje = $mensaje . $_POST['materialSalida' . $i + 1] . " ";
                }
            }
            // Si el material no existe mandamos un mensaje y volvemos al formulario
            if ($control == 1) {
                $_SESSION['mensaje'] = 'No se puede registar debido que algunos materiales no se encuentran registrados';
                $_SESSION['confirmarRegistro'] = 2;
                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
            } else {
                // Si existe creamos variables para controlar las verificaciones
                $materiaPrimas = null;
                $control = 0;
                // Usamos un for para guardar las materias primas a registrar en un array
                for ($i = 0; $i < $_POST['contadorSalida']; $i++) {
                    $materiaPrimas[] = $_POST['materialSalida' . $i + 1];
                }
                // Contamos cuantas veces aparece la materia prima en el array para saber si intenta registrar varias veces el mismo material
                $conteo = array_count_values($materiaPrimas);
                // Verificamos si intenta registrar varias veces el mismo materia
                for ($i = 0; $i < $_POST['contadorSalida']; $i++) {
                    if (isset($conteo[$_POST['materialSalida' . $i + 1]]) && $conteo[$_POST['materialSalida' . $i + 1]] > 1) {
                        $control = 1;
                    }
                }
                // Si intenta registrar el mismo material varias veces se mostrara un mensaje y volvera al formulario
                if ($control == 1) {

                    $_SESSION['mensaje'] = 'No se puede registar debido que esta intentado registrar dos veces el mismo material';
                    $_SESSION['confirmarRegistro'] = 2;
                    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                } else {
                    // Si todo va bien continuamos rectificando si las unidades de medida sean coherentes y aparte que exista la suficiente cantidad de material para realizar el pedido
                    for ($i = 0; $i < $_POST['contadorSalida']; $i++) {
                        $material = explode("-", $_POST['materialSalida' . $i + 1]);
                        $mat = $mate->consultarMaterial($material[0]);
                        // Verficamos si existe la suficiente cantidad de pedido
                        if (
                            ($_POST['TipCanSalida' . $i + 1] == 2 && ($mat['ma_tipo_cantidad'] == "metros" || $mat['ma_tipo_cantidad'] == "centimetros")) ||
                            ($mat['ma_tipo_cantidad'] == "unidades" && ($_POST['TipCanSalida' . $i + 1] == 1 || $_POST['TipCanSalida' . $i + 1] == 3))
                        ) {
                            $_SESSION['mensaje'] = 'No se puede registrar el Inventario debido a que algunas unidades de medida no corresponden';
                            $_SESSION['confirmarRegistro'] = 2;
                            echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                            die();
                        } else if ($_POST['TipCanSalida' . $i + 1] == 2 && $mat['ma_tipo_cantidad'] == "unidades") {
                            if ($_POST['cantSalida' . $i + 1] > $mat['ma_cantidad']) {
                                $_SESSION['mensaje'] = 'No se puede registrar el Inventario debido a que no hay suficiente material';
                                $_SESSION['confirmarRegistro'] = 2;
                                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                                die();
                            }
                        } else if ($_POST['TipCanSalida' . $i + 1] == 1 && $mat['ma_tipo_cantidad'] == "centimetros") {
                            $centimetros = $_POST['cantSalida' . $i + 1] * 100;
                            if ($centimetros > $mat['ma_cantidad']) {
                                $_SESSION['mensaje'] = 'No se puede registrar el Inventario debido a que no hay suficiente material';
                                $_SESSION['confirmarRegistro'] = 2;
                                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                                die();
                            }
                        } else if ($_POST['TipCanSalida' . $i + 1] == 3 && $mat['ma_tipo_cantidad'] == "metros") {
                            $metros = $_POST['cantSalida' . $i + 1] / 100;
                            if ($metros > $mat['ma_cantidad']) {
                                $_SESSION['mensaje'] = 'No se puede registrar el Inventario debido a que no hay suficiente material';
                                $_SESSION['confirmarRegistro'] = 2;
                                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                                die();
                            }
                        } else {
                            if ($_POST['cantSalida' . $i + 1] > $mat['ma_cantidad']) {
                                $_SESSION['mensaje'] = 'No se puede registrar el Inventario debido a que no hay suficiente material';
                                $_SESSION['confirmarRegistro'] = 2;
                                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                                die();
                            }
                        }
                    }
                    // Si exite la suficiente cantidad de materiales para el pedido se realizara el registro del inventario
                    $obj->registrarInventarioSalida($_POST);
                    // Con un for registraremos los materiales que se usaran para el pedio
                    for ($i = 0; $i < $_POST['contadorSalida']; $i++) {
                        $_POST['TipCan'] = $_POST['TipCanSalida' . $i + 1];
                        $_POST['cant'] = $_POST['cantSalida' . $i + 1];
                        $material = explode("-", $_POST['materialSalida' . $i + 1]);
                        $_POST['material'] = $material[0];
                        $obj->registrarMaterialInventario($_POST);
                    }
                    // Con un for restaremos la cantidad de material usado a la cantidad de material registrado en la base de datos
                    for ($i = 0; $i < $_POST['contadorSalida']; $i++) {
                        $material = explode("-", $_POST['materialSalida' . $i + 1]);
                        $mat = $mate->consultarMaterial($material[0]);

                        if ($_POST['TipCanSalida' . $i + 1] == 2 && $mat['ma_tipo_cantidad'] == "unidades") {
                            $total = $mat['ma_cantidad'] - $_POST['cantSalida' . $i + 1];
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        } else if ($_POST['TipCanSalida' . $i + 1] == 1 && $mat['ma_tipo_cantidad'] == "centimetros") {
                            $centimetros = $_POST['cantSalida' . $i + 1] * 100;
                            $total = $mat['ma_cantidad'] - $centimetros;
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        } else if ($_POST['TipCanSalida' . $i + 1] == 3 && $mat['ma_tipo_cantidad'] == "metros") {
                            $metros = $_POST['cantSalida' . $i + 1] / 100;
                            $total =  $mat['ma_cantidad'] - $metros;
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        } else {
                            $total =  $mat['ma_cantidad'] - $_POST['cantSalida' . $i + 1];
                            $mate->actualizarMaterialCantidad($mat['mat_id'], $total);
                        }
                    }
                    // Mostramos mensaje de exito y volvemos al formulario
                    $_SESSION['mensaje'] = 'Registro salida material exitoso';
                    $_SESSION['confirmarRegistro'] = 1;
                    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                }
            }
        } else {
            // Mandamos mensaje y volvemos al formulario
            $_SESSION['mensaje'] = 'El pedido no se encuentra registrado';
            $_SESSION['confirmarRegistro'] = 2;
            echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
        }
    }
} else if ($_POST['TipoRegistro'] == 2) {
    // Verificamos si observasión no fue diligenciada
    if ($_POST['obser'] == null) {
        $_POST['obser'] = "0";
    }
    // Creamos una variable para controlar los errores
    $controlador = 0;
    // Creamos un objeto de la clase accesorio
    $claseAccesorio = new Accesorio();
    // Validamos que haya elegido una opción de entrada o salida
    if ($_POST['TiInvAcc'] != "") {
        // Validamos que tipo de inventario es (Entrada o Salida)
        if ($_POST['TiInvAcc']  == 1) {

            for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                $idAccesorio = explode("-", $_POST['accesorio' . $i + 1]);
                $_POST['idAccesorio'] =  $idAccesorio[0];
                // Ejecutamos el metodo para saber la existencia del accesorio a registrar
                $existenciaAccesorio = $claseAccesorio->consultarAccesorioEspecifico($_POST['idAccesorio']);
                // Validamos si el accesorio existe y sino la variable que controla errores será cero
                if (!$existenciaAccesorio) {
                    $controlador = 1;
                }
            }
            // Verificamos que la variable que controla los errores siga en cero
            if ($controlador == 0) {
                // Validamos si alguno de los accesorios se esta tratando de registrar dos veces
                $contadorAccesorios = null;
                $contar = 0;
                // Guardamos las materias en un array para contar cuantas veces se repite
                for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                    $contadorAccesorios[] = $_POST['accesorio' . $i + 1];
                }
                // Contamos cuantas veces aparecen los accesorios
                $contar = array_count_values($contadorAccesorios);
                // Verificamos que no se repitan los accesorios
                // Con un for verificamos si hay materiales repetidos
                for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {

                    if (isset($contar[$_POST['accesorio' . $i + 1]]) && $contar[$_POST['accesorio' . $i + 1]] > 1) {
                        // Si se repite usamos la variable controlador para mostrar el error
                        $controlador = 1;
                    }
                }
                if ($controlador == 0) {
                    // Ejecutamos el método para registrar el inventario de entrada accesorio
                    $obj->registrarInventarioGeneralAccesorio($_POST);
                    // Usamos un for para registrar los accesorios
                    for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                        // Preparamos todos los datos para registrar
                        $accesorioId = explode("-", $_POST['accesorio' . $i + 1]);
                        $_POST['accesorio'] = $accesorioId[0];
                        $_POST['cantAcce'] = $_POST['cantAcce' . $i + 1];
                        $_POST['precioUniAce'] = $_POST['precioUniAce' . $i + 1];

                        // Ejecutamos el metodo para registrar el accesorio relacionado con inventario
                        $obj->registrarInventarioAccesorio($_POST);

                        // Sumamos la cantidad del accesorio que se esta registrando con la que hay antiguamente para ir actualizando la cantidad
                        $datosAccesorio = $claseAccesorio->consultarAccesorioEspecifico($_POST['accesorio']);
                        $totalCantidadAccesorio = $datosAccesorio['acc_cantidad'] + $_POST['cantAcce'];

                        // Actualizamos la cantidad del accesorio
                        $claseAccesorio->actualizarAccesorio([
                            "acc_id" => $datosAccesorio['acc_id'],
                            "nomAce" => $datosAccesorio['acc_nombre'],
                            "descAce" => $datosAccesorio['acc_descripcion'],
                            "cantAce" => $totalCantidadAccesorio,
                        ]);
                    }
                    // Mostramos mensaje de exito y redirigimos
                    $_SESSION['mensaje'] = 'Registro entrada accesorio exitoso';
                    $_SESSION['confirmarRegistro'] = 1;
                    echo "<script>location.href='../Vista/administrador/Html/formularioRegistroInventario.php'</script>";
                } else {
                    // Mandamos mensaje y volvemos al formulario
                    $_SESSION['mensaje'] = 'Algunos de los accesorios a registrar se encuentra repetido';
                    $_SESSION['confirmarRegistro'] = 2;
                    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                }
            } else {
                // Mandamos mensaje y volvemos al formulario
                $_SESSION['mensaje'] = 'Alguno de los accesorios no se encuentra registrado';
                $_SESSION['confirmarRegistro'] = 2;
                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
            }
        } else {
            // Con un for validamos si todos los accesorios a relacionar ya se encuentran registrados anteriormente
            for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                $accesorio = explode("-", $_POST['accesorio' . $i + 1]);
                // Voy aqui recuerde
                $resultado = $claseAccesorio->consultarAccesorioEspecifico($accesorio[0]);

                if (!$resultado) {
                    $controlador = 1;
                }
            }
            // Si el controlador esta en cero significa que todo va bien
            if ($controlador == 0) {
                // Validamos si alguno de los accesorios se esta tratando de registrar dos veces
                $contadorAccesorios = null;
                $contar = 0;
                // Guardamos las materias en un array para contar cuantas veces se repite
                for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                    $contadorAccesorios[] = $_POST['accesorio' . $i + 1];
                }
                // Contamos cuantas veces aparecen los accesorios
                $contar = array_count_values($contadorAccesorios);
                // Verificamos que no se repitan los accesorios
                // Con un for verificamos si hay materiales repetidos
                for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {

                    if (isset($contar[$_POST['accesorio' . $i + 1]]) && $contar[$_POST['accesorio' . $i + 1]] > 1) {
                        // Si se repite usamos la variable controlador para mostrar el error
                        $controlador = 1;
                    }
                }

                if ($controlador == 0) {
                    // Validamos que haya la cantidad suficiente para realizar el inventario
                    for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                        $accesorio = explode("-", $_POST['accesorio' . $i + 1]);
                        $resultado = $claseAccesorio->consultarAccesorioEspecifico($accesorio[0]);
                        if ($resultado['acc_cantidad'] < $_POST['cantAcce' . $i + 1]) {
                            $controlador = 1;
                        }
                    }
                    // Validamos que controlador este en cero
                    if ($controlador == 0) {
                        // Si todo va bien registramos inventario
                        $obj->registrarInventarioGeneralAccesorio($_POST);
                        // Usamos un for para registrar los accesorios
                        for ($i = 0; $i < $_POST['contadorAccesorio']; $i++) {
                            // Preparamos los datos a registrar 
                            $idAccesorios = explode('-', $_POST['accesorio' . $i + 1]);
                            $_POST['accesorio'] = $idAccesorios[0];
                            $_POST['cantAcce'] = $_POST['cantAcce' . $i + 1];
                            $_POST['precioUniAce'] = "";

                            // Ejecutamos el metodo para registrar el accesorio
                            $obj->registrarInventarioAccesorio($_POST);

                            // Restamos la cantidad registrada con la actual para tener actualizado la disponibilidad
                            $resultado = $claseAccesorio->consultarAccesorioEspecifico($_POST['accesorio']);
                            $accesoriosActuales = $resultado['acc_cantidad'] - $_POST['cantAcce'];
                            $claseAccesorio->actualizarAccesorio([
                                "acc_id" => $resultado['acc_id'],
                                "nomAce" => $resultado['acc_nombre'],
                                "descAce" => $resultado['acc_descripcion'],
                                "cantAce" => $accesoriosActuales,
                            ]);
                        }
                        // Mostramos mensaje de exito y redirigimos
                        $_SESSION['mensaje'] = 'Registro salida accesorio exitoso';
                        $_SESSION['confirmarRegistro'] = 1;
                        echo "<script>location.href='../Vista/administrador/Html/formularioRegistroInventario.php'</script>";
                    } else {
                        // Mandamos mensaje y volvemos al formulario
                        $_SESSION['mensaje'] = 'No hay accesorios suficientes para registrar el inventario';
                        $_SESSION['confirmarRegistro'] = 2;
                        echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                    }
                } else {
                    // Mandamos mensaje y volvemos al formulario
                    $_SESSION['mensaje'] = 'Alguno de los accesorios se encuentra repetido';
                    $_SESSION['confirmarRegistro'] = 2;
                    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
                }
            } else {
                // Mandamos mensaje y volvemos al formulario
                $_SESSION['mensaje'] = 'Alguno de los accesorios no se encuentra registrado';
                $_SESSION['confirmarRegistro'] = 2;
                echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
            }
        }
    } else {
        // Sino eligio ninguna opción de entrada o salida 
        // Mandamos mensaje y volvemos al formulario
        $_SESSION['mensaje'] = 'Seleccione un tipo de inventario';
        $_SESSION['confirmarRegistro'] = 2;
        echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
    }
} else {
    $_SESSION['mensaje'] = 'Seleccione un tipo de inventario';
    $_SESSION['confirmarRegistro'] = 2;
    echo "<script> location.href='../Vista/".$perfil."/Html/formularioRegistroInventario.php'</script>";
    die();
}
