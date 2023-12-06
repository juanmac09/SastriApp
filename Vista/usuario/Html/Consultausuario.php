<?php
session_start();


require_once("../../../Modelo/seguridadUsuario.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/consultas.php");
require_once("../../../Controlador/controladorMostrarUsuario.php");


if (isset($_SESSION["confirmarRegistro"])) {

    if ($_SESSION["confirmarRegistro"] == 1) {
        echo "
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            swal('" . $_SESSION['mensaje'] . "', '', 'success');
          });
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/Logo mini.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
    <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="../../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="../../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../../dashboard/css/style.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Consultar Usuarios</title>

</head>

<body class="container-fluid p-5">
    <?php include("../navCons.php"); ?>
    <section id="main-content">
        <div class="col-lg-12 ">
            <div class="card" style="margin-left:12%; margin-right:3%;">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <center>
                            <h1 class="h1Consultar">Consultar Usuarios</h1>
                        </center>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Identificación</th>
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                mostrarUser($_GET['rol']);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </section>
    </div>
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
    <script src="../js/mainConfirmarElimiar.js"></script>

    <?php

    if (isset($_SESSION["confirmarRegistro"])) {
        $_SESSION["confirmarRegistro"] = 0;
    }
    if (isset($_SESSION['mensaje'])) {
        $_SESSION['mensaje'] = "";
    }

    ?>
</body>

</html>