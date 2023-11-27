<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/materialModelo.php");
require_once("../Modelo/accesorioModelo.php");
session_start();
if ($_POST['tipRegistro'] == 1) {
    $obj = new Material();
    if ($obj->consultarMaterialDescripcion($_POST['desc'])) {
        
        $_SESSION["mensaje"] = "Ya se encuentra material con esta descripción";
        $_SESSION["confirmarRegistro"] = 2;
        echo "<script>location.href='../Vista/administrador/Html/formularioRegistroMaterial.php'</script>";
    } else {
        if ($_POST['TipCan'] != 1 && $_POST['TipCan'] != 2 && $_POST['TipCan'] != 3) {
            echo "<script>alert('Seleccione una unidad de medida')</script>";
            echo "<script>location.href='../Vista/administrador/Html/formularioRegistroMaterial.php'</script>";
        } else {

            $obj->registrarMaterial($_POST);
            // Mostramos mensaje de exito
            $_SESSION["mensaje"] = "Material registrado exitosamente";
            $_SESSION["confirmarRegistro"] = 1;
            echo "<script>location.href='../Vista/administrador/Html/formularioRegistroMaterial.php'</script>";
        }
    }
} else if ($_POST['tipRegistro'] == 2) {
    $obj = new Accesorio();
    $obj->registrarAccesorio($_POST);
    // Mostramos mensaje de exito y redirigimos
    $_SESSION["mensaje"] = "Accesorio registrado exitosamente";
    $_SESSION["confirmarRegistro"] = 1;
    echo "<script>location.href='../Vista/administrador/Html/formularioRegistroMaterial.php'</script>";
} else {
    echo "<script>alert('Seleccione un tipo de registro')</script>";
    echo "<script>location.href='../Vista/administrador/Html/formularioRegistroMaterial.php'</script>";
}
?>