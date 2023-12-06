<?php
$arreglo = explode("/",$_SERVER['REQUEST_URI']);    
$direccion = end($arreglo);



$archivos[0] = "Consultaclientes.php?rol=2";
$archivos[1] = "consultarPedido.php";

for ($i=0; $i < count($archivos); $i++) { 
   if ($archivos[$i] == $direccion) {
     $archivos [$i] = "#";
   }
}
$perfil = "#";
if ($direccion != "profile.php") {
   
$perfil = "profile.php";   
}


require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/consultas.php");
require_once("../../../Controlador/controladorMostrarUsuario.php");

$id['user'] = $_SESSION['id'];

$datos = mostrarDatosUsu($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="img/logo satriapp blanco.png">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="../../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../../dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../../dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="../../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../../dashboard/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../fullcalendar/lib/main.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleConsultar.css">
</head>
<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures barraN " style="height: 150vh;">
        <div class="nano">
            <div class="nano-content" >
                <ul>
                    <div class="logo"><a href="../home.php"><img width="70%" src="../img/logo satriapp blanco.png" alt="" /></a></div>

                    <li class="label">Configuración</li>

                    <li><a href="<?php echo $perfil?>"><i class="bi bi-person-circle"></i> Perfil - <?php echo $datos['user_nombre'] ?></a></li>

                    <li class="label">Acciones</li>
                    
                    <li><a class="sidebar-sub-toggle"><i class="bi bi-search"></i> Consultar <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            
                            <li><a href="<?php echo $archivos[0]?>">Clientes</a></li>
                            <li><a href="<?php echo $archivos[1]?>">Pedidos</a></li>
                        </ul>
                    </li>

                    <li class="label">Log out</li>
                    <li><a href="../../../Controlador/controladorCerrarSesion.php"><i class="ti-close"></i> Cerrar Sesión</a></li>

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
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right" >


                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">
                                    <?php echo $datos['user_nombre'] ?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">

                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#" id="profile">
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
    <!-- jquery vendor -->
    <script src="../../dashboard/js/lib/jquery.min.js"></script>
    <script src="../../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../../dashboard/js/lib/menubar/sidebar.js"></script>
    <script src="../../dashboard/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../../dashboard/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="../../dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="../../dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="../../dashboard/js/lib/calendar-2/pignose.init.js"></script>


    <script src="../../dashboard/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../../dashboard/js/lib/weather/weather-init.js"></script>
    <script src="../../dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../../dashboard/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../../dashboard/js/lib/chartist/chartist.min.js"></script>
    <script src="../../dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../../dashboard/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="../../dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="../../dashboard/js/dashboard2.js"></script>

    <script>
        var profile = document.getElementById("profile");
        var logOut = document.getElementById("logOut");

        profile.addEventListener("click",()=>{
            location.href='profile.php';
        })

        logOut.addEventListener("click",()=>{
            location.href='../../../Controlador/controladorCerrarSesion.php';   
        })
    </script>
</body>
</html>