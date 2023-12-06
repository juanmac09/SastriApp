<?php

session_start();

require_once("../../../Modelo/seguridadUsuario.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/inventarioModelo.php");
require_once("../../../Modelo/pedidoModelo.php");
require_once("../../../Controlador/controladorMostrarInventario.php");
require_once("../../../Controlador/controladorMostrarPedido.php");

$tablaCliente = "";
$cabeceroTabla = "";
$tipoInventario = "";
if ($_GET['in_accesorio_material'] == 1) {
    $tipoInventario = "Materia Prima";
    $inventario = mostrarInventarioEspecifico($_GET['in_id'],2);
    $pedido = mostrarPedidoIdInvetario($inventario['ped_id']);
    $tablaCliente = 
    "
        <div class='row section' style='margin-top:1rem'>
            <div class='col-1'>
                <table style='width:100%'>
                    <thead>
                        <tr class='invoice_detail'>
                            <th width='25%' style='text-align:center'>Cliente</th>
                            <th width='25%'>Telefono</th>
                            <th width='20%'>Número pedido</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class='invoice_detail'>
                            <td width='25%' style='text-align:center'>".ucfirst($pedido[0]['user_nombre']) ."</td>
                            <td width='25%'>".ucfirst($pedido[0]['user_telefono'])."</td>
                            <td width='20%'>".$inventario['ped_id']."</td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div><!--.row-->
    ";

    $cabeceroTabla = "
    
        <thead>
            <th width='5%'>Código</th>
            <th width='60%'>Material</th>

            <th width='10%'>Cant.</th>
            <th width='15%'>Tipo Cant.</th>

        </thead>
    ";
}
else{
    $tipoInventario = "Accesorio";
    $inventario  = mostrarInventarioAccesorio($_GET['in_id']) ;
    $cabeceroTabla = "
    
        <thead>
            <th width='5%'>Código</th>
            <th width='60%'>Accesorio</th>

            <th width='10%'>Cant.</th>

        </thead>
    ";
}

if ($inventario['observaciones'] == "") {
    $inventario['observaciones'] = "No hay observaciones";
}

    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/Logo mini.png">
</head>

<body>

    <section>
        <div class="control-bar">
            <div class="container">
                <div class="row">
                    <div class="col-4 text-right" style="margin-right: 80%; margin-left: -40%; ">
                        <a href="../Html/consultarInventario.php" class="cta">
                            <span class="flecha izquierda"></span>
                            <span>Atrás</span>
                        </a>
                    </div><!--.col-->
                    <div class="col-4 text-right">
                        <a href="javascript:window.print()">Imprimir</a>
                    </div><!--.col-->
                </div><!--.row-->
            </div><!--.container-->
        </div><!--.control-bar-->

        <header class="row">
            <div class="logoholder text-center">
                <img src="../img/logo satriapp negro y blanco.png" width="180">
            </div><!--.logoholder-->


            <div class="me">
                <p>
                    <strong>SastriApp</strong><br>
                    +57 3204898991<br>
                    Calle 90 #12-45<br>
                    Local 406<br>


                </p>
            </div><!--.me-->


        </header>


        <div class="row section">

            <div class="col-2">
                <h1>Salida <?php echo $tipoInventario?></h1>
            </div><!--.col-->

            <div class="col-2 text-right details">
                <p>
                    Fecha: <span><?php echo $inventario['in_fecha']; ?></span><br>
                    Comprobante: # <span><?php echo$_GET['in_id'] ?></span><br>

                </p>
            </div><!--.col-->
        </div><!--.row-->

        <?php echo $tablaCliente?>

        <div class="invoicelist-body">
            <table>
                <?php echo $cabeceroTabla; ?>
                <tbody>
                    <?php  mostrarMaterialInventarioSalida($_GET['in_id'],$_GET['in_accesorio_material'])?>
                </tbody>
            </table>

        </div><!--.invoice-body-->

        

        <div class="note">
            <h2>Observaciones: <span style="font-weight: 100;"><?php echo $inventario['observaciones']; ?></span></h2>

        </div><!--.note-->



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
        </script>
        <script src="main.js"></script>
    </section>
</body>

</html>