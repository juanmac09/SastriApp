<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/pedidoModelo.php");
require_once("../Modelo/medidasModelo.php");
require_once("../Modelo/consultas.php");
require_once("../Modelo/correoModelo.php");
session_start();

$_SESSION["mensaje"] = "";
$_SESSION["confirmarRegistro"] = 0;
$_SESSION['confirmarCorreo'] = 0;
$correo = new Correo();
$datosPedido['infoProducto'] = "";
$pedido = "";
$cliente = new Consultas();
$datosCliente = explode("-",$_POST['id']);
$_POST['id'] = $datosCliente[0];
$resultado = $cliente->ConsultarClienteId($_POST['id']);

if ($resultado) {

    $correoC = $resultado['user_correo'];

    $medidas = new Medidas();

    $resulMedidas = $medidas->consultarMedidasClientes($_POST['id']);

    if (!$resulMedidas) {
        $medidas->registrarMedidas($_POST['id']);
    }


    $obj = new Pedido();
    if ($_POST['comp'] == "") {
        $_POST['comp'] = "0";
    }
    if (!isset($_POST['camisa']) && !isset($_POST['pantalon']) && !isset($_POST['saco']) && !isset($_POST['chaleco'])) {
        echo "<script>alert('Elija algun tipo de prenda')</script>";
        echo "<script>location.href='../Vista/administrador/Html/formularioRegistroPedido.php'</script>";
    } else {



        if (isset($_POST['saco']) && isset($_POST['chaleco']) && isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Saco, chaleco, pantalón y camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasChaqueta($_POST);
                $medidas->actualizarMedidasCamisa($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasChaqueta($_POST);
                $medidas->registrarMedidasCamisa($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }

            $_POST['pe_prendas'] = 4;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoChaleco($_POST);
            $obj->registrarPedidoPantalon($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (isset($_POST['saco']) && isset($_POST['chaleco']) && isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Saco, chaleco y pantalon.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasChaqueta($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasChaqueta($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_POST['pe_prendas'] = 3;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoChaleco($_POST);
            $obj->registrarPedidoPantalon($_POST);
        } else if (isset($_POST['saco']) && isset($_POST['chaleco']) && !isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Saco, chaleco y camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasChaqueta($_POST);
                $medidas->actualizarMedidasCamisa($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasChaqueta($_POST);
                $medidas->registrarMedidasCamisa($_POST);
            }
            $_POST['pe_prendas'] = 3;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoChaleco($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (isset($_POST['saco']) && isset($_POST['chaleco']) && !isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Saco y chaleco.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasChaqueta($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasChaqueta($_POST);
            }
            $_POST['pe_prendas'] = 2;

            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoChaleco($_POST);
        } else if (isset($_POST['saco']) && !isset($_POST['chaleco']) && isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Saco, pantalón y camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaqueta($_POST);
                $medidas->actualizarMedidasCamisa($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasChaqueta($_POST);
                $medidas->registrarMedidasCamisa($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_POST['pe_prendas'] = 3;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoPantalon($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (isset($_POST['saco']) && !isset($_POST['chaleco']) && isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Saco y pantalón.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaqueta($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasChaqueta($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_POST['pe_prendas'] = 2;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoPantalon($_POST);
        } else if (isset($_POST['saco']) && !isset($_POST['chaleco']) && !isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Saco.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaqueta($_POST);
            } else {
                $medidas->registrarMedidasChaqueta($_POST);
            }
            $_POST['pe_prendas'] = 1;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
        } else if (!isset($_POST['saco']) && isset($_POST['chaleco']) && isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Chaleco, pantalón y camisa.";
            $_POST['pe_prendas'] = 3;
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasCamisa($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasCamisa($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoChaleco($_POST);
            $obj->registrarPedidoPantalon($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (!isset($_POST['saco']) && isset($_POST['chaleco']) && isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Chaleco y pantalón.";
            $_POST['pe_prendas'] = 2;
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoChaleco($_POST);
            $obj->registrarPedidoPantalon($_POST);
        } else if (!isset($_POST['saco']) && isset($_POST['chaleco']) && !isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Chaleco y camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
                $medidas->actualizarMedidasCamisa($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
                $medidas->registrarMedidasCamisa($_POST);
            }
            $_POST['pe_prendas'] = 2;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoChaleco($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (!isset($_POST['saco']) && isset($_POST['chaleco']) && !isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Chaleco.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaleco($_POST);
            } else {
                $medidas->registrarMedidasChaleco($_POST);
            }
            $_POST['pe_prendas'] = 1;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoChaleco($_POST);
        } else if (!isset($_POST['saco']) && !isset($_POST['chaleco']) && isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Pantalón y camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasCamisa($_POST);
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasCamisa($_POST);
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_POST['pe_prendas'] = 2;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoPantalon($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (!isset($_POST['saco']) && !isset($_POST['chaleco']) && isset($_POST['pantalon']) && !isset($_POST['camisa'])) {
            $pedido = "Pantalón.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasPantalon($_POST);
            } else {
                $medidas->registrarMedidasPantalon($_POST);
            }
            $_POST['pe_prendas'] = 1;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoPantalon($_POST);
        } else if (!isset($_POST['saco']) && !isset($_POST['chaleco']) && !isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasCamisa($_POST);
            } else {
                $medidas->registrarMedidasCamisa($_POST);
            }
            $_POST['pe_prendas'] = 1;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoCamisa($_POST);
        } else if (isset($_POST['saco']) && !isset($_POST['chaleco']) && !isset($_POST['pantalon']) && isset($_POST['camisa'])) {
            $pedido = "Saco y camisa.";
            if ($resulMedidas) {
                $medidas->actualizarMedidasChaqueta($_POST);
                $medidas->actualizarMedidasCamisa($_POST);
            } else {
                $medidas->registrarMedidasChaqueta($_POST);
                $medidas->registrarMedidasCamisa($_POST);
            }
            $_POST['pe_prendas'] = 2;
            $_SESSION['confirmarRegistro'] = 1;
            $obj->registrarPedido($_POST);
            $obj->registrarPedidoSaco($_POST);
            $obj->registrarPedidoCamisa($_POST);
        }


        $resultadoP = $obj->consutarUltimoRegistrado();
        $nomUsuario = $resultado['user_nombre'];
        $datosPedido['infoProducto'] = $pedido;
        $datosPedido['id'] = $resultadoP['ped_id'];
        $datosPedido['estado'] = $resultadoP['pe_estado'];
        $datosPedido['fechaEntrega'] = $resultadoP['pe_fecha_entrega'];

        $correo->enviarCorreoRegistroPedido($datosPedido, $nomUsuario, $correoC);
        $_SESSION['confirmarCorreo'] = 1;
        $_SESSION['mensaje'] = "Pedido Exitoso";

        echo
            "<script>
                location.href='../Vista/administrador/Html/formularioRegistroPedido.php'
            </script>";
    }
} else {

    $_SESSION['confirmarRegistro'] = 2;
    $_SESSION['mensaje'] = "formularioRegistrar.php?id=" . $_POST['id'] . "";
    echo
        "<script>
            location.href='../Vista/administrador/Html/formularioRegistroPedido.php'
        </script>";
}
