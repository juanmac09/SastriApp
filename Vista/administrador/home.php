<?php
session_start();
require_once("../../Modelo/conexion.php");
require_once("../../Modelo/seguridadHomeAdministrador.php");
require_once("../../Calendario_V1_05_2023/db-connect.php");
require_once("../../Modelo/consultas.php");
require_once("../../Modelo/pedidoModelo.php");
require_once("../../Controlador/controladorMostrarUsuario.php");

$id['user'] = $_SESSION['id'];

$datos = mostrarDatosUsu($id);


$obj = new Pedido();

$pedido = $obj->consultarCantPedidoMensual();

$meses = array(
    "Ene",
    "Feb",
    "Mar",
    "Abr",
    "May",
    "Jun",
    "Jul",
    "Agos",
    "Sept",
    "Oct",
    "Nov",
    "Dic"
);


$datosGrafico = array_values($pedido);

$cantPedido = $obj->consultarCanPedidoEst();

if (isset($_SESSION["clave"])) {

    if ($_SESSION["clave"] == 3) {
        echo "
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Bienvenido',
                text: 'Usuario " . $_SESSION['mensajeBienvenida'] . " " . $datos['user_nombre'] . " !!',
                imageUrl: 'img/saludar.jpg',
              });
          });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SastriApp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="img/Logo mini.png">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../dashboard/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <link href="../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Calendar Style -->
    <link rel="stylesheet" href="css/styleCalendario.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures barraN" style="height: 150vh;">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="home.php"><img width="70%" src="img/logo satriapp blanco.png" alt="" /></a></div>

                    <li class="label">Configuración</li>

                    <li><a href="Html/profile.php"><i class="bi bi-person-circle"></i> Perfil</a></li>

                    <li class="label">Acciones</li>
                    <li><a class="sidebar-sub-toggle"><i class="bi bi-pen"></i> Registrar <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="Html/formularioRegistrar.php">Usuarios</a></li>
                            <li><a href="Html/formularioRegistroPedido.php">Pedido</a></li>
                            <li><a href="Html/formularioRegistroMaterial.php">Material / Accesorios</a></li>
                            <li><a href="Html/formularioRegistroInventario.php">Inventario</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="bi bi-search"></i> Consultar <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="Html/ConsultaUsuario.php?rol=1">Usuarios</a></li>
                            <li><a href="Html/Consultaclientes.php?rol=2">Clientes</a></li>
                            <li><a href="Html/consultarProveedor.php?rol=3">Proveedores</a></li>
                            <li><a href="Html/consultarPedido.php">Pedidos</a></li>
                            <li><a href="Html/consultarMaterias.php">Material</a></li>
                            <li><a href="Html/consultarAccesorios.php">Accesorios</a></li>
                            <li><a href="Html/consultarInventario.php">Inventario</a></li>
                        </ul>
                    </li>

                    <li class="label">Log out</li>
                    <li><a href="../../Controlador/controladorCerrarSesion.php"><i class="ti-close"></i> Cerrar Sesión</a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle hambur">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">


                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar"><?php echo $datos['user_nombre'] ?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">

                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="Html/profile.php" id="profile">
                                                    <i class="ti-user"></i>
                                                    <span> Mi Perfil</span>
                                                </a>
                                            </li>


                                            <li>
                                                <a href="../../Controlador/controladorCerrarSesion.php" id="logOut">
                                                    <i class="ti-power-off"></i>
                                                    <span>Cerrar Sesión</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- /# row -->
                <section id="main-content">
                    <div class="container py-5" id="page-container">
                        <div class="col-md-9">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <!-- Event Details Modal -->
                    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-0">
                                <div class="modal-header rounded-0">
                                    <h5 class="modal-title" style="color:#a12b42; font-weight:bold;">Detalles del Pedido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body rounded-0">
                                    <div class="container-fluid">
                                        <dl>
                                            <dt class="text-muted">Nombre Cliente</dt>
                                            <dd id="title" class="fw-bold fs-4"></dd>
                                            <dt class="text-muted">Descripción</dt>
                                            <dd id="description" class=""></dd>
                                            <dt class="text-muted">Fecha entrega</dt>
                                            <dd id="start" class=""></dd>
                                            <dt class="text-muted">Estado</dt>
                                            <dd id="end" class=""></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="modal-footer rounded-0">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="edit" data-id="">Ver</button>
                                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="col-md-3 infoPedidos">
        <div class="card infoEstadoPedido">
            <div class="card-body p-b-0">
                <h4 class="card-title"></h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab2" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><span class="hidden-sm-up"><i class="ti-pencil-alt"></i></span> <span class="hidden-xs-down">Pendiente</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><span class="hidden-sm-up"><i class="ti-time"></i></span> <span class="hidden-xs-down">Retrasado</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Terminado</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home7" role="tabpanel">
                        <div class="p-20">
                            <p>Los pedidos en estado Pendiente son: <?php echo $cantPedido['pendiente']; ?></p>
                        </div>
                    </div>
                    <div class="tab-pane  p-20" id="profile7" role="tabpanel">
                        <p>Los pedidos en estado Retrasado son: <?php echo $cantPedido['retrasado']; ?></p>
                    </div>
                    <div class="tab-pane p-20" id="messages7" role="tabpanel">
                        <p>Los pedidos en estado Terminado son: <?php echo $cantPedido['terminado']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" grafica">
        <canvas id="grafica" style="margin-top:20%"></canvas>
    </div>
    <?php
    $schedules = $conn->query("CALL consultarPedidoCalendario()");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y ", strtotime($row['pe_fecha_entrega']));
        // $row['edate'] = date("F d, Y ",strtotime($row['end_datetime']));
        $sched_res[$row['ped_id']] = $row;
    }


    ?>
    <?php
    if (isset($conn)) $conn->close();
    ?>


    <script src="./js/es.js"></script> <!--Idioma español Fullcalendar-->
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script src="./js/script.js"></script>
    <!-- jquery vendor -->
    <script src="../dashboard/js/lib/jquery.min.js"></script>
    <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../dashboard/js/lib/menubar/sidebar.js"></script>
    <script src="../dashboard/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../dashboard/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="../dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.init.js"></script>


    <script src="../dashboard/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../dashboard/js/lib/weather/weather-init.js"></script>
    <script src="../dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../dashboard/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../dashboard/js/lib/chartist/chartist.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="../dashboard/js/dashboard2.js"></script>
    <script src="js/botonesVistaCalendario.js"></script>
    <script>
        var profile = document.getElementById("profile");
        var logOut = document.getElementById("logOut");

        profile.addEventListener("click", () => {
            location.href = 'Html/profile.php';
        })

        logOut.addEventListener("click", () => {
            location.href = '../../Controlador/controladorCerrarSesion.php';
        })
    </script>


    <!-- Script Chart -->
    <script type="text/javascript">
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        // Pasaamos las etiquetas desde PHP
        const etiquetas = <?php echo json_encode($meses) ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Pedidos Entregados",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosGrafico) ?>,
            backgroundColor: '#a12b42', // Color de fondo
            borderColor: '#a12b42', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'bar', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 100
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Cant. Pedido'
                        }
                    }],
                },
            }
        });
    </script>
    </div>
    </section>
    <!-- jquery vendor -->
    <script src="../dashboard/js/lib/jquery.min.js"></script>
    <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>

    <script src="../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../dashboard/js/scripts.js"></script>

    <?php

    if (isset($_SESSION["clave"])) {
        $_SESSION["clave"] = 0;
    }
    ?>
</body>

</html>