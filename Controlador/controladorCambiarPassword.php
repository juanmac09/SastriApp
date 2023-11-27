<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");
$datos['id'] = $_GET['id'];
$datos['pass'] = $_POST['pass'];
$obj = new Consultas();
$obj -> modificarPassword($datos);

session_start();
$_SESSION['clave'] = 6;
echo 
"<script>
    location.href='../Vista/extras/login.php';
</script>";
?>