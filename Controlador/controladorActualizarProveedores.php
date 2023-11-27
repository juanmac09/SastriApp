<?php
// Importamos dependecias
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");
// Creamos el objeto de la clase proveedor
$obj = new Consultas();
session_start();
$_SESSION["confirmarRegistro"] = 1;
$_SESSION['mensaje'] = "Actualización Exitosa";
// Ejecutamos el metodo para actualizar
$obj -> modificarProveedor($_POST);


?>