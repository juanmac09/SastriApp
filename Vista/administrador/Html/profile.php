<?php
session_start();



require_once("../../../Modelo/seguridadAdministrador.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/consultas.php");
require_once("../../../Controlador/controladorMostrarUsuario.php");

$datos = mostrarDatosUsuario($_SESSION['id']);


$foto = $datos['user_foto'];
$tel = $datos['user_telefono'];
$correo = $datos['user_correo']
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/Logo mini.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Favicon icon -->
    <link rel="icon" type="theme/image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="theme/css/style.css" rel="stylesheet">
    <title>Perfil del Usuario</title>
</head>

<body>
    <?php include("../navCons.php"); ?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol> -->
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid content">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img id="fotoPrincipal" class="mr-3 perfil" src="../../<?php echo $foto ?> " width="105" height="100" alt="" >
                                    <div class="media-body">
                                        <h3 class="mb-0"><?php echo $datos['user_nombre'] . " " . $datos['user_apellido']; ?></h3>
                                        <p class="text-muted mb-0">Administrador</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade modal-dialog modal-dialog-centered formulario" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                    </div>
                    <div class="col-lg-6">
                        <form class="form-valide" action="../../../Controlador/controladorActualizarUsuario.php" method="post" id="form" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Cédula <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="id" name="id" placeholder="Cédula" required value="<?php echo $datos['user_identificacion'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nom">Nombre <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre" required value="<?php echo $datos['user_nombre'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="ape">Apellido <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="ape" name="ape" placeholder="Apellido" required value="<?php echo $datos['user_apellido'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Correo <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required value="<?php echo $correo ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="tel">Teléfono <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="tel" name="tel" placeholder="Teléfono" required value="<?php echo $tel ?>">
                                </div>
                            </div>

                            <div class="form-group row" id="CheckFotoDiv">
                                <label class="col-lg-4 col-form-label" for="CheckFoto">Cambiar Foto</label>
                                <div class="col-lg-6">
                                    <input type="checkbox" id="CheckFoto" name="CheckFoto">
                                </div>
                            </div>

                            <div class="form-group row"id="photoCheckDiv">
                                <label class="col-lg-4 col-form-label" for="photocheck">Foto</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" id="photocheck" name="photocheck" accept="image/png, .jpeg, .jpg">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Checkpass">Cambiar Contraseña</label>
                                <div class="col-lg-6">
                                    <input type="checkbox" id="Checkpass" name="Checkpass">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="pass">Contraseña</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                                    <p class="digitos mensajeOculto" id="digitos">La contraseña debe ser mayor o igual a 8 digitos</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="confirPass">Confirmar contraseña</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="confirPass" name="confirPass" placeholder="Confirmar contraseña">
                                    <p class="noCoincide mensajeOculto" id="noCoincide">La contraseña no coincide</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary boton" name="perfil">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- #/ container -->
    </div>
    </div>
    <!-- #/ container -->
    </div>

    <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- <script src="theme/plugins/common/common.min.js"></script> -->
    <script src="theme/js/custom.min.js"></script>
    <!-- <script src="theme/js/settings.js"></script>
    <script src="theme/js/gleek.js"></script>
    <script src="theme/js/styleSwitcher.js"></script> -->
    <script src="../js/confirPass.js"></script>
    <script src="../js/mainfoto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>