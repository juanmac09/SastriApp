<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");

if (isset($_SESSION["confirmarRegistro"])) {

  if ($_SESSION["confirmarRegistro"] == 1) {
    echo "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          swal('" . $_SESSION['mensaje'] . "', '', 'success');
        });
      </script>";
  }
  else if ($_SESSION["confirmarRegistro"] == 2) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Error', '".$_SESSION['mensaje']."', 'error');
      });
    </script>";
  
  }
}

?>

<html lang="es">

<head>
  <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="../css/formSimplelittle.css " rel="stylesheet" type="text/css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro Material / Accesorio</title>
</head>

<body>
  <?php include("../nav.php"); ?>
  <div class="imagen-fondo">
    <img src="../img/Materias.jpg" alt="Imagen de fondo">
  </div>
  <form method="POST" action="../../../Controlador/controladorRegistrarMateriasAccesorios.php"
    enctype="multipart/form-data">
    <div class="contact_form">

      <div class="login-box">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Registrar Material/<br>Accesorio</h1>

        <div>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <select name="tipRegistro" id="tipRegistro" class="select tipRegistro">
                  <option value="">Seleccione Tipo Registro</option>
                  <option value="1">Material</option>
                  <option value="2">Accesorio</option>
                </select>
              </div>
            </div>
            <div class="divMaterial ocultar" id="divMaterial">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="nom" class="inputMaterial">
                    <label>Nombre Material</label>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="desc" class="inputMaterial">
                    <label>Descripción</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="number" name="cant" class="inputMaterial">
                    <label>Cantidad</label>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <select name="TipCan" class="tipo select">
                      <option value="">Seleccione Unidad</option>
                      <option value="1">Metros</option>
                      <option value="2">Unidades</option>
                      <option value="3">Centímetros</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="divAccesorios ocultar" id="divAccesorios">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="nomAce" class="inputAccesorios">
                    <label>Nombre Accesorio</label>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="descAce" class="inputAccesorios">
                    <label>Descripción</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input type="number" name="cantAce" class="inputAccesorios">
                    <label>Cantidad</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <center> <button class="btn third" type="submit">Registrar</button></center>

  </form>

  <script src="../../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
  <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../js/validacionSelect.js"></script>
  <script src="../js/validarMaterialAccesorio.js"></script>
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