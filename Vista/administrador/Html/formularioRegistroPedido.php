<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");
require_once('../../../Modelo/conexion.php');
require_once('../../../Modelo/consultas.php');
require_once('../../../Controlador/controladorMostrarCliente.php');
$id_cliente = "";

$id_cliente = (isset($_GET['id_cliente'])) ? $_GET['id_cliente'] : "";


if (isset($_SESSION["confirmarCorreo"]) && $_SESSION['confirmarCorreo'] == 1 && isset($_SESSION["confirmarRegistro"]) && $_SESSION["confirmarRegistro"] == 1) {
  echo "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          swal({
            title: '" . $_SESSION['mensaje'] . "',
            text: 'Se envio un correo al cliente con la información del pedido',
            imageUrl: '../img/buzon-de-correo.gif',
          });
        });
      </script>";
} else if (isset($_SESSION["confirmarRegistro"]) && $_SESSION["confirmarRegistro"] == 2) {
  echo '
  <script>
      document.addEventListener("DOMContentLoaded",()=>{
      swal(
          {
          title: "El cliente no se encuentra registrado",
          text: "¿Desea registrarlo?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          cancelButtonText:"No",
          confirmButtonText: "Si",
          closeOnConfirm: true,
          },
          function () {
              setTimeout(() => {
                  location.href="' . $_SESSION['mensaje'] . '";
              }, 500);
              
          }
        );
      }) 
      </script>
  ';
}


?>

<html lang="es">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link href="../css/formGrande.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro Pedido</title>
  <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/validar.css">
  <link rel="stylesheet" media="all" href="../css/boton.css" />

  <script>
    function mostrarMedidasChaleco(doc) {
      if (doc.value != "") {
        if (doc.value.length < 7) {
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("medidasChaleco").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../../../Controlador/controladorIntermedioMostrarMedidasCliente.php?id=" + doc.value + "&medida=" + 1, true);
          xmlhttp.send();
        }
      }

    }

    function mostrarMedidasChaqueta(doc) {
      if (doc.value != "") {
        if (doc.value.length < 7) {
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("medidasChaqueta").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../../../Controlador/controladorIntermedioMostrarMedidasCliente.php?id=" + doc.value + "&medida=" + 2, true);
          xmlhttp.send();
        }
      }
    }

    function mostrarMedidasCamisa(doc) {
      if (doc.value != "") {
        if (doc.value.length < 7) {
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("medidasCamisa").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../../../Controlador/controladorIntermedioMostrarMedidasCliente.php?id=" + doc.value + "&medida=" + 3, true);
          xmlhttp.send();
        }
      }
    }

    function mostrarMedidasPantalon(doc) {
      if (doc.value != "") {
        if (doc.value.length < 7) {
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("medidasPantalon").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../../../Controlador/controladorIntermedioMostrarMedidasCliente.php?id=" + doc.value + "&medida=" + 4, true);
          xmlhttp.send();
        }
      }
    }

    document.addEventListener('DOMContentLoaded', () => {
      mostrarMedidasCamisa(document.getElementById('op'));
      mostrarMedidasChaleco(document.getElementById('op'));
      mostrarMedidasChaqueta(document.getElementById('op'));
      mostrarMedidasPantalon(document.getElementById('op'));
    })
  </script>
</head>



<body>
  <?php include("../nav.php") ?>
  <form method="POST" action="../../../Controlador/controladorRegistrarPedido.php">
    <div class="contact_form">
      <div class="imagen-fondo">
        <img src="../img/pedido.jpg" alt="Imagen de fondo">
      </div>
      <div class="login-box" id="login">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Registrar Pedido</h1>

        <div class="row docTipo">
          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <input type="text" name="id" id="op" list="opciones" required value="<?php echo $id_cliente ?>" oninput="mostrarMedidasChaleco(this), mostrarMedidasChaqueta(this), mostrarMedidasCamisa(this), mostrarMedidasPantalon(this) ">
              <datalist id="opciones">
                <?php mostrarClienteOpt() ?>
              </datalist>
              <label>Cliente Identificación</label>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mx-auto">
            <div class="form-group">
              <select name="tipoPedido" id="tipoPedido" class="select tipoPedido selectTipoPedido">
                <option value="">Seleccione Tipo Pedido</option>
                <option value="0">Pedido</option>
                <option value="1">Arreglo</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4">
            <div class="form-group">
              <input type="checkbox" name="camisa" id="camisa">
              <label>Camisa</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="form-group">
              <input type="checkbox" name="chaleco" id="chaleco">
              <label>Chaleco</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="form-group">
              <input type="checkbox" name="saco" id="saco">
              <label>Chaqueta</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="form-group">
              <input type="checkbox" name="pantalon" id="pantalon">
              <label>Pantalón</label>
            </div>
          </div>
        </div>
        <div class="medidasChaqueta text-center desaparecer" id="medidasChaqueta">
          <h3>Medidas Para Chaqueta</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_talle_chaqueta" class="camposMedidasChaqueta">
                <label>Talle</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_largo_chaqueta" class="camposMedidasChaqueta">
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_espalda_chaqueta" class="camposMedidasChaqueta">
                <label>Espalda</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_hombro_chaqueta" class="camposMedidasChaqueta">
                <label>Hombro</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_pecho_chaqueta" class="camposMedidasChaqueta">
                <label>Pecho</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_cintura_chaqueta" class="camposMedidasChaqueta">
                <label>Cintura</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_manga_chaqueta" class="camposMedidasChaqueta">
                <label>Manga</label>
              </div>
            </div>
          </div>
        </div>

        <div class="camposSaco desaparecer" id="camposSaco">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <input type="number" name="cantAberturas" class="campoSacoInput">
                <label>Aberturas Chaqueta</label>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <select name="tipoAbertura" id="tipoAbertura" class="select selectChaqueta">
                  <option value="">Seleccion Tipo Abertura</option>
                  <option value="0">Si</option>
                  <option value="1">No</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="form-group">
                <input type="text" name="obsSaco" class="campoSacoInput">
                <label>Observaciones de Chaqueta</label>
              </div>
            </div>
          </div>
        </div>
        <div class="medidasChaleco text-center desaparecer" id="medidasChaleco">
          <h3>Medidas Para Chaleco</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_largo_chaleco" class="camposMedidasChaleco">
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_espalda_chaleco" class="camposMedidasChaleco">
                <label>Espalda</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_hombro_chaleco" class="camposMedidasChaleco">
                <label>Hombro</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_pecho_chaleco" class="camposMedidasChaleco">
                <label>Pecho</label>
              </div>
            </div>
          </div>
        </div>

        <div class="camposChaleco desaparecer" id="camposChaleco">
          <div class="col-lg-12 col-md-12">
            <div class="form-group">
              <input type="text" name="obsChaleco" class="campoChalecoInput">
              <label>Observaciones de Chaleco</label>
            </div>
          </div>
        </div>

        <div class="medidasCamisa text-center desaparecer" id="medidasCamisa">
          <h3>Medidas Para Camisa</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_cuello" class="camposMedidasCamisa">
                <label>Cuello</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_espalda_camisa" class="camposMedidasCamisa">
                <label>Espalda</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_manga_camisa" class="camposMedidasCamisa">
                <label>Manga</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_largo_camisa" class="camposMedidasCamisa">
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_pecho_camisa" class="camposMedidasCamisa">
                <label>Pecho</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_cintura_camisa" class="camposMedidasCamisa">
                <label>Cintura</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_cont_puño" class="camposMedidasCamisa">
                <label>Corte Puño</label>
              </div>
            </div>
          </div>
        </div>
        <div class="campoCamisa desaparecer" id="campoCamisa">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <select name="cuello" id="cuello" class="select selectCamisa">
                  <option value="">Tipo de Cuello</option>
                  <option value="1">Valentino</option>
                  <option value="2">Pegaso</option>
                  <option value="3">Frances</option>
                  <option value="4">Spencer</option>
                  <option value="5">Lucas</option>
                  <option value="6">Inghirami</option>
                  <option value="7">Botón Down</option>
                  <option value="8">Merizalde</option>
                  <option value="9">Dior</option>
                  <option value="10">Pajarito</option>
                  <option value="11">Nerú</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <select name="despunte" id="despunte" class="select selectCamisa">
                  <option value="">Tipo Despunte</option>
                  <option value="1">1/6</option>
                  <option value="2">1/8</option>
                  <option value="3">1/4</option>
                  <option value="4">3/6</option>
                  <option value="5">3/8</option>
                  <option value="6">Dobles</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <select name="puno" id="puno" class="select selectCamisa">
                  <option value="">Tipo Puño</option>
                  <option value="1">Mancorna</option>
                  <option value="2">Sencillo</option>
                  <option value="3">Manga Corta</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <select name="bolsillo" id="bolsillo" class="select selectCamisa">
                  <option value="">Tipo Bolsillo</option>
                  <option value="1">Cuadrado</option>
                  <option value="2">Italiano</option>
                  <option value="3">Con fuelle</option>
                  <option value="4">Con Tapa</option>
                  <option value="5">Con botón</option>
                  <option value="6">No tiene</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="form-group">
                <input type="text" name="obsCamisa" class="campoCamisaInput">
                <label>Observaciones de Camisa</label>
              </div>
            </div>
          </div>
        </div>
        <div class="medidasPantalon text-center desaparecer" id="medidasPantalon">
          <h3>Medidas Para Pantalón</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_cintura_pantalon" class="camposMedidasPantalon">
                <label>Cintura</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_base_pantalon" class="camposMedidasPantalon">
                <label>Base</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_largo_pantalon" class="camposMedidasPantalon">
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_rodilla_pantalon" class="camposMedidasPantalon">
                <label>Rodilla</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_tiro_pantalon" class="camposMedidasPantalon">
                <label>Tiro</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="number" name="me_bota_pantalon" class="camposMedidasPantalon">
                <label>Bota</label>
              </div>
            </div>
          </div>
        </div>

        <div class="camposPantalon desaparecer" id="camposPantalon">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <input type="text" name="bota" class="campoPantalonInput">
                <label>Bota Pantalón</label>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <select name="bolsilloReloj" id="bolsilloReloj" class="select selectPantalon">
                  <option value="">Bolsillo Reloj</option>
                  <option value="0">Si</option>
                  <option value="1">No</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="form-group">
                <input type="text" name="obsPantalon" class="campoPantalonInput">
                <label>Observaciones de Pantalón</label>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="form-group">
              <input type="number" name="total" id="total" required>
              <label>Total</label>
            </div>
          </div>


          <div class="col-lg-4 col-md-12">
            <div class="form-group">
              <input type="number" name="abono" id="abono" required>
              <label>Abono</label>
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <div class="form-group">
              <input type="date" name="fechaEntrega" required>
              <label class="read">Fecha Entrega</label>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <input type="text" name="comp">
            <label>Complemento</label>
          </div>
        </div>
        <center> <button class="btn third" type="submit">Registrar</button></center>
      </div>
    </div>
  </form>

  <script src="../../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
  <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../js/validacionPedido.js"></script>
  <script src="../js/validacionSelect.js"></script>
  <script src="../js/validacionSelectVacioPedido.js"></script>

  <?php

  if (isset($_SESSION["confirmarRegistro"])) {
    $_SESSION["confirmarRegistro"] = 0;
  }

  if (isset($_SESSION["confirmarCorreo"]) && $_SESSION['confirmarCorreo'] == 1) {
    $_SESSION["confirmarCorreo"] = 0;
  }
  if (isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
  }
  ?>
</body>

</html>