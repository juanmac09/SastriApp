<?php

session_start();

require_once("../../../Modelo/seguridadUsuario.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/inventarioModelo.php");
require_once("../../../Controlador/controladorMostrarInventario.php");
$tablaProveedor = "";
$inventario = null;
$cabeceraTabla = "";
$tipoInventario = "";
if ($_GET['in_accesorio_material'] == 1) {
    $tipoInventario = "Materia Prima";
    $inventario  = mostrarInventarioEspecifico($_GET['in_id'],1);
    $tablaProveedor = '
        <div class="row section" style="margin-top:1rem">
        <div class="col-1">
            <table style="width:100%">
                <thead>
                    <tr class="invoice_detail">
                        <th width="25%" style="text-align:center">Proveedor</th>
                        <th width="25%">Dirección</th>
                        <th width="20%">Teléfono</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="invoice_detail">
                        <td width="25%" style="text-align:center">' . ucfirst($inventario["user_nombre"]). ' </td>
                        <td width="25%">'.ucfirst($inventario["user_direccion"]).'</td>
                        <td width="20%">'.$inventario["user_telefono"].'</td>

                    </tr>
                </tbody>
            </table>
        </div>

        </div><!--.row-->';

    $cabeceraTabla = 
    "
        <thead>
        <th width='5%'>Código</th>
        <th width='60%'>Material</th>

        <th width='10%'>Cant.</th>
        <th width='15%'>Tipo Cant.</th>
        <th class='taxrelated'>Precio</th>

        </thead>
    ";
    
}
else{
    $tipoInventario = "Accesorios";
    $inventario  = mostrarInventarioAccesorio($_GET['in_id']) ;
    $cabeceraTabla = 
    "
        <thead>
        <th width='5%'>Código</th>
        <th width='60%'>Accesorio</th>

        <th width='10%'>Cant.</th>
        <th class='taxrelated'>Precio</th>
        </thead>
    ";
}
  





if ($inventario['observaciones'] == "") {
    $inventario['observaciones'] = "No hay observaciones";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/Logo mini.png">
</head>

<body>
    <section class="todo">
        <div class="control-bar">
            <div class="container">
                <div class="row">
                    <div class="col-4 text-right" style="margin-right: 80%; margin-left: -40%; ">
                        <a href="../Html/consultarInventario.php" class="cta">
                            <span class="flecha izquierda"></span>
                            <span>Atras</span>
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
                <h1>Entrada <?php echo $tipoInventario?></h1>
            </div><!--.col-->

            <div class="col-2 text-right details">
                <p>
                    Fecha: <span><?php echo $inventario['in_fecha']; ?></span><br>
                    Comprobante: # <span><?php echo$_GET['in_id'] ?></span><br>
                </p>
            </div><!--.col-->
        </div><!--.row-->

        <?php echo $tablaProveedor?>

        <div class="invoicelist-body">
            <table>

                <?php echo $cabeceraTabla?>

                <tbody>
                    <?php $total = mostrarInvetarioMaterialPrecio($_GET['in_id'],$_GET['in_accesorio_material'])?>
                </tbody>
            </table>

        </div><!--.invoice-body-->

        <div class="invoicelist-footer">
            <table>
                <tr>
                    <td><strong>Total:</strong></td>
                    <td id="total_price"><?php echo $total?> </td>
                </tr>
            </table>
        </div>

        <div class="note">
            <h2>Observaciones: <span style="font-weight: 100;"><?php echo $inventario['observaciones']; ?></span></h2>

        </div><!--.note-->



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
        </script>
    </section>
</body>

</html>