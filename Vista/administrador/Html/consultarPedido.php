<?php
session_start();



require_once("../../../Modelo/seguridadAdministrador.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/pedidoModelo.php");
require_once("../../../Controlador/controladorMostrarPedido.php");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/Logo mini.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
    <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="../../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="../../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="../../dashboard/css/style.css" rel="stylesheet">
    <link href="../../dashboard/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleBotonExportar.css">
    <title>Consultar Pedido</title>
</head>



<body>
    <?php include("../navCons.php"); ?>
    <section id="main-content">
        <div class="col-lg-12 ">
            <div class="card" style="margin-left:12%; margin-right:3%;">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <center>
                            <h1 class="h1Consultar">Consultar Pedidos</h1>
                        </center>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id Pedido</th>
                                    <th>Documento Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Tipo</th>
                                    <th>Fecha Registro</th>
                                    <th>Fecha Entrega</th>
                                    <th>Total Pedido</th>
                                    <th>Abonado</th>
                                    <th>Estado</th>
                                    <th>Ver más</th>
                                </tr>
                            </thead>
                            <tbody id="tablabody">
                                <?php mostrarPedido() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </section>


    <script src="../../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/datatables.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/jszip.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../../dashboard/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/datatables-init.js"></script>
    <script src="../js/mainActualizarEstado.js"></script>
    <script src="../js/buscarForm.js"></script>
</body>

</html>