<?php
// Importamos dependencias
require_once("../Modelo/conexion.php");
require_once("../Modelo/pedidoModelo.php");
require_once("../Controlador/controladorActualizarPedido.php");
session_start();

// Creamos el objeto de la clase Pedido

$obj = new Pedido();
// Guardamos el id de pedido en el arreglo post
$_POST['ped_id'] = $_GET['ped_id'];
// Ejecutamos el metodo para actualizar la información general del pedido
$obj -> actualizarPedido($_POST);
// Verificamos que prendas estan seleccionadas para actualizar su información 

// Pedido de camisa
if ($_GET['confirmadorCamisa']) {
    // Ejecutamos el metodo para actualizar la información de camisa
    $obj -> actualizarPedidoCamisa($_POST);
}
// Pedido de chaleco
if ($_GET['confirmadorChaleco']) {
    // Ejecutamos el metodo para actualizar la información de chaleco
    $obj -> actualizarPedidoChaleco($_POST);
}
// Pedido de chaqueta
if ($_GET['confirmadorChaqueta']) {
    // Ejecutamos el metodo para actualizar la información de chaqueta
    $obj -> actualizarPedidoSaco($_POST);
}
// Pedido de pantalon
if ($_GET['confirmadorPantalon']) {
    // Ejecutamos el metodo para actualizar la información de pantalón
    $obj -> actualizarPedidoPantalon($_POST);
}

// Verificamos si el complemento general del pedido original es igual al nuevo
if ($_GET['obsGen'] != $_POST['comp']) {
    // Verificamos que haya un detalle registrado anteriormente
    if ($obj -> consultarExistenciaDetallePedido($_POST['ped_id'])) {
        // Si hay registrado actualizamos el que se encuentra registrado
        $obj -> actualizarDetallePedido($_POST);
    }
    // Si no existe lo registramos
    else{
        $obj -> registrarDetallePedido($_POST);
    }
}
$_SESSION['confirmarRegistro'] = 1;
$_SESSION['mensaje'] = "Actualización Exitosa";
// Redirigimos al consultar pedido especifico
echo "<script>location.href='../Vista/administrador/Html/ped_especifico.php?ped_id=".$_POST['ped_id']."'</script>";


?>