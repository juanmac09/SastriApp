    <?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");


$obj = new Consultas();
session_start();
$_SESSION['confirmarRegistro'] = 1;
$_SESSION['mensaje'] = "Actualización Exitosa";
$obj -> modificarCliente($_POST);



?>