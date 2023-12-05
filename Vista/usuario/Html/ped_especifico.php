<?php
session_start();
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/pedidoModelo.php");
require_once("../../../Modelo/medidasModelo.php");
require_once("../../../Controlador/controladorMostrarPedido.php");
require_once("../../../Controlador/controladorMostrarMedidaCliente.php");
require_once("../../../Modelo/seguridadUsuario.php");
$datos = mostrarPedidoId($_GET['ped_id']);
$datosMedidas = mostrarMedidasGeneralesPedido($datos['id'], $datos);
$link = "../FORMULARIOS_ACTUALIZAR/formularioActualizarPedido.php?";
$datosPant = "";
$datosChaqueta = "";
$datosCamisa = "";
$datosChaleco = "";

$datosCamisa = "cam_cuello=" . $datos['datos']['cam_cuello'] . "&cam_despunte=" .
    $datos['datos']['cam_despunte'] . "&cam_puno=" . $datos['datos']['cam_puno'] .
    "&cam_bolsillo=" . $datos['datos']['cam_bolsillo'] . "&ped_caobservaciones=" . $datos['datos']['ped_caobservaciones'] . "&confirmadorCamisa=" . $datos['confirmadorCamisa'];

$datosChaleco = "ped_chaobservaciones=" . $datos['datos']['ped_chaobservaciones'] . "&confirmadorChaleco=" . $datos['confirmadorChaleco'];

$datosChaqueta = "ped_aberturas=" . $datos['datos']['ped_aberturas'] . "&ped_tipo_abertura=" . $datos['datos']['ped_tipo_abertura'] . "&ped_cobservaciones=" . $datos['datos']['ped_cobservaciones'] . "&confirmadorChaqueta=" . $datos['confirmadorChaqueta'];

$datosPant = "ped_bota=" . $datos['datos']['ped_bota'] . "&ped_bolsillo_reloj=" . $datos['datos']['ped_bolsillo_reloj'] . "&ped_pobservaciones=" . $datos['datos']['ped_pobservaciones'] . "&confirmadorPantalon=" . $datos['confirmadorPantalon'];



$link = $link . $datosCamisa . "&" . $datosChaqueta . "&" . $datosChaleco . "&" . $datosPant . "&ped_id=" . $_GET['ped_id'] . "&user_identificacion=" . $datos['datos']['user_identificacion'] . "&tipoPedido=" . $datos['tipoPedido'] . "&pe_total=" . $datos['total'] . "&abono=" . $datos['abono'] . "&Entrega=" . $datos['Entrega'] . "&obs=" . $datos['obs'];


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
    <meta charset="UTF-8">
    <title>Pedido Específico</title>
    <link rel="shortcut icon" href="../img/Logo mini.png">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" media="all" href="../css/boton.css" />
    <link rel="stylesheet" href="../css/stylePedidoEspecifico.css">

</head>

<body>
    <a href="../Html/consultarPedido.php" class="cta"><span>Atrás</span></a>

    <!-- Formularios -->
    <div class="contenedor-formularios">
        <!-- Links de los formularios -->
        <ul class="contenedor-tabs">
            <li class="tab tab-segunda active" id="lol"><a href="#iniciar-sesion">Pedido</a></li>
            <li class="tab tab-primera" id="lol2"><a href="#registrarse">Medidas</a></li>
        </ul>

        <!-- Contenido de los Formularios -->
        <div class="contenido-tab">
            <!-- Iniciar Sesion -->

            <div id="iniciar-sesion">

                <div class="info_general">
                    <div class="logo">
                        <img src="../img/logo satriapp negro y blanco.png" alt="Logo">
                    </div>
                    <div class="info_pedido">
                        <table>
                            <tr>
                                <th>No. Pedido</th>
                                <td>#<?php echo $_GET['ped_id'] ?></td>
                            </tr>
                            <tr>
                                <th>Tipo Pedido</td>
                                <td><?php echo $datos['tipoPedido'] ?></td>
                            </tr>
                            <tr>
                                <th>Fecha Pedido</td>
                                <td><?php echo $datos['fecha'] ?></td>
                            </tr>
                            <tr>
                                <th>Fecha Entrega</td>
                                <td><?php echo $datos['Entrega'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="info_cliente">
                    <p><b>Nombre Cliente:</b> <span class="span_contenido nom"><?php echo $datos['nombreCompletoCliente'] ?></span></p>
                    <p><b>Teléfono:</b> <span class="span_contenido  tel"><?php echo $datos['telefono'] ?></span></p>
                    <p><b>Dirección:</b> <span class="span_contenido dir"> <?php echo $datos['direccion'] ?></span></p>
                    <p><b>Email:</b> <span class="span_contenido email"><?php echo $datos['email'] ?></span></p>
                </div>

                <div class="tablas_info">
                    <div class="tabla_camisa">

                        <?php echo $datos['camisa'] ?>
                    </div>

                    <div class="tabla_chaleco">

                        <?php echo $datos['chaleco'] ?>
                    </div>


                    <div class="tabla_chaqueta">

                        <?php echo $datos['chaqueta'] ?>
                    </div>

                    <div class="tabla_Pantalon">
                        <?php echo $datos['pantalon'] ?>
                    </div>

                    <div class="pago">
                        <table>
                            <th>Abono</th>
                            <td>$<?php echo $datos['abono'] ?></td>
                            <th>Total</th>
                            <td>$<?php echo $datos['total'] ?></td>
                        </table>
                    </div>

                    <div class="observaciones">
                        <p><b>Observaciones:</b> <span class="span_contenido obs"><?php echo $datos['obs'] ?></span></p>
                    </div>

                </div>
                
            </div>
            <!-- Registrarse -->
            <div id="registrarse">
                <h2 class="title_medidas">Medidas</h2>
                <div class="superior">
                    <div class="medidas">
                        <?php echo $datosMedidas['camisa'] ?>

                        <?php echo $datosMedidas['chaleco'] ?>
                    </div>
                    <div class="imagen">
                        <img src="../img/maniqui.jpeg" alt="Maniqui">
                    </div>
                </div>
                <div class="inferior">

                    <?php echo $datosMedidas['chaqueta'] ?>

                    <?php echo $datosMedidas['pantalon'] ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/scriptPedidoEspecifico.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/scriptPedidoEspecifico.js"></script>

</html>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="../js/scriptPedidoEspecifico.js"></script>
</body>

<?php
if (isset($_SESSION["confirmarRegistro"])) {
    $_SESSION["confirmarRegistro"] = 0;
}
if (isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}

?>

</html>