<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");
require_once("../Modelo/correoModelo.php");
require_once("../Modelo/pedidoModelo.php");
require_once("../Controlador/controladorMostrarPedido.php");

$obj = new Pedido();
$obj -> actualizarEstadoPedido($_GET);
$cliente = new Consultas();
$resultado = $cliente -> ConsultarClienteId($_GET['id_cli']);

    $correoC = $resultado['user_correo'];

$resultadoP = $obj -> consultarPedidoId(0,$_GET['idP']);
foreach($resultadoP as $d){
    $estado = ucfirst($d['pe_estado']);
}
$mensaje = "El estado del pedido con id ".$_GET['idP']." es:";
$correo = new Correo();
$correo -> enviarCorreoActualizacionEstado($correoC,$mensaje,$estado);


    mostrarPedido();

?>