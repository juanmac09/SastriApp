<?php

require_once('../Modelo/conexion.php');
require_once('../Modelo/medidasModelo.php');
require_once('controladorMostrarMedidaCliente.php');

$id = explode("-",$_GET['id']);
$_GET['id'] = $id[0];
if ($_GET['medida'] == 1) {
    mostrarMedidasChaleco($_GET['id']);
}
else if($_GET['medida'] == 2 ){
    mostrarMedidasChaqueta($_GET['id']);
}
else if($_GET['medida'] == 3){
    mostrarMedidasCamisa($_GET['id']);
}
else if($_GET['medida'] == 4){
    mostrarMedidasPantalon($_GET['id']);
}
else{
   
}




?>
