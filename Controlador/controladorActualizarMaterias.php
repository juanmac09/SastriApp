<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/materialModelo.php");
require_once("../Modelo/accesorioModelo.php");
session_start();
if (isset($_POST['actualizarMaterial'])) {
    $obj = new Material();
    $_SESSION['confirmarRegistro'] = "1";
    $_SESSION['mensaje'] = "Actualización Exitoso";
    $obj -> actualizarMaterial($_POST); 

}
else{
    $obj = new Accesorio();
    $_POST['acc_id'] = $_GET['acc_id'];
    $obj -> actualizarAccesorio($_POST);
    // Mostramos mensaje de exito y redirigimos
    $_SESSION['confirmarRegistro'] = "1";
    $_SESSION['mensaje'] = "Actualización Exitoso";
    echo "<script>location.href='../Vista/administrador/Html/consultarAccesorios.php'</script>";
}


?>