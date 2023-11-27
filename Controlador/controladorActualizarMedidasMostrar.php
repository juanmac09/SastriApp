<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/medidasModelo.php");
require_once("controladorMostrarMedidaCliente.php");
$obj = new Medidas();

    
if ($_GET['tipo'] == 1) {
    $obj -> actualizarMedidasChaqueta($_GET);
    mostrarMedidasChaquetaConsulta($_GET['id']);
}
else if ($_GET['tipo'] == 2) {
    $obj -> actualizarMedidasChaleco($_GET);
    mostrarMedidasChalecoConsultar($_GET['id']);
}
else if ($_GET['tipo'] == 3) {
    $obj -> actualizarMedidasCamisa($_GET);
    mostrarMedidasCamisaConsulta($_GET['id']);
}
else if ($_GET['tipo'] == 4) {
    $obj -> actualizarMedidasPantalon($_GET);
    mostrarMedidasPantalonConsultar($_GET['id']);
}

?>