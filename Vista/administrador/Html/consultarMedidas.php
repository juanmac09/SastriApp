<?php
session_start();



require_once("../../../Modelo/seguridadAdministrador.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/medidasModelo.php");
require_once("../../../Controlador/controladorMostrarMedidaCliente.php");


$obj = new Medidas();

if (!$obj->consultarMedidasClientes($_GET['id'])) {
    // echo "<script>alert('El cliente no tiene medidas registradas, por favor registre un pedido.')</script>";
    $_SESSION['confirmarRegistro'] = 2;
    $_SESSION['mensaje'] = "El cliente no tiene medidas registradas";
    echo "<script>location.href='Consultaclientes.php?rol=2'</script>";
}
?>

<!DOCTYPE html>
<html lang="es">

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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="../../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="../../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../../dashboard/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleConsultarMedidas.css">
    <title>Consultar Medidas</title>
</head>


<body>
    <?php include("../navCons.php"); ?>
    <section id="main-content">
        <h1 class="h1Consultar titile-prin">Gestionar Medidas</h1>


        <div class="row tables" id="tablaMedidas">
            <div class="col-lg-3">
                <div class="card">
                    <div class="">
                        <div class="table-responsive">
                            <center>
                                <h6 class="h1Consultar">Chaqueta</h6>
                            </center>
                            <table id="" class="table table-striped table-bordered">
                                <tbody id="idMedidasChaqueta">
                                    <?php mostrarMedidasChaquetaConsulta($_GET['id']) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="">
                        <div class="table-responsive">
                            <center>
                                <h6 class="h1Consultar">Chaleco</h6>
                            </center>
                            <table id="" class="table table-striped table-bordered">
                                <tbody id="idMedidasChaleco">
                                    <?php mostrarMedidasChalecoConsultar($_GET['id']) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="">
                        <div class="table-responsive">
                            <center>
                                <h6 class="h1Consultar">Camisa</h6>
                            </center>
                            <table id="" class="table table-striped table-bordered">
                                <tbody id="idMedidaCamisa">
                                    <?php mostrarMedidasCamisaConsulta($_GET['id']) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="">
                        <div class="table-responsive">
                            <center>
                                <h6 class="h1Consultar">Pantalón</h6>
                            </center>
                            <table class="table table-striped table-bordered">
                                <tbody id="idMedidasPantalon">
                                    <?php mostrarMedidasPantalonConsultar($_GET['id']) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
        <!-- /# row -->


        <input type="button" id="saveChange" value="Guardar Cambios" class="btn btn-success m-b-10  saveChange">
    </section>
    <script src="../../dashboard/js/lib/data-table/datatables.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/jszip.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../../dashboard/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../../dashboard/js/lib/data-table/datatables-init.js"></script>
    <script src="../js/mainMedidas.js"></script>
    
    <script>
    // Obtener todas las celdas editables
    const celdasEditables = document.querySelectorAll('span[contenteditable="true"]');

    // Agregar un controlador de eventos para cada celda editable
    celdasEditables.forEach(function(celda) {
        celda.addEventListener('input', function(event) {
            // Verificar si la celda tiene la clase "exceptuar"
            if (celda.classList.contains('exceptuar')) {
                // Si tiene la clase "exceptuar", no realizamos ninguna validación
                return;
            }

            // Obtener el contenido ingresado por el usuario
            const contenido = event.target.textContent;

            // Verificar si el contenido es numérico o decimal
            if (!esNumeroDecimal(contenido)) {
                // Si no es numérico o decimal, eliminar el contenido no válido
                event.target.textContent = '';
            }
        });
    });

    // Función para verificar si un valor es numérico o decimal
    function esNumeroDecimal(valor) {
        return /^-?\d*\.?\d*$/.test(valor);
    }
</script>   
</body>

</html>