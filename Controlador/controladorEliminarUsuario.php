<?php

require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");


$obj = new Consultas;

$obj -> deshabilitarUsuario($_GET);
session_start();
$_SESSION['confirmarRegistro'] = 1;
$_SESSION['mensaje'] = "Usuario deshabilitado";
echo "<script> location.href='../Vista/administrador/Html/Consultausuario.php?rol=1'</script>";


?>