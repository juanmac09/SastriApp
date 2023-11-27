<?php
// Importamos dependencias
require_once("../Modelo/conexion.php");
require_once("../Modelo/inventarioModelo.php");
session_start();
$_SESSION['confirmarRegistro'] = 1;
$_SESSION['mensaje'] = "Eliminación Exitosa";
// Creamos un objeto de la clase inventario
$obj = new Inventario();
// Ejecutamos el metodo para deshabilitar
$obj -> deshabilitarInventario($_GET['in_id']);

// echo "<script>alert('Se deshabilito exitosamente');</script>";
echo "<script>location.href='../Vista/administrador/Html/consultarInventario.php'</script>";
?>