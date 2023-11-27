<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");
$valor = '';
$select = '';
if (isset($_GET['id'])) {
  $select = "selected";
  $valor = $_GET['id'];
}


if (isset($_SESSION["confirmarRegistro"])) {

  if ($_SESSION["confirmarRegistro"] == 1) {
    echo "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          swal('" . $_SESSION['mensaje'] . "', '', 'success');
        });
      </script>";
  } else if ($_SESSION["confirmarRegistro"] == 2) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Error','" . $_SESSION['mensaje'] . "', 'error');
      });
    </script>";
  }
}

?>

<html lang="es">

<head>
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link href="../css/formSimple.css " rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/validar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
  <meta charset="UTF-8">
  <title>Registrar usuario</title>
</head>


<body>
  <?php include("../nav.php"); ?>

  <div class="imagen-fondo">
    <img src="../img/administrador.jpeg" alt="Imagen de fondo">
  </div>
  <form method="POST" action="../../../Controlador/controladorUsuario.php" enctype="multipart/form-data" id="formularioUsuario">
    <div class="contact_form">

      <div class="login-box">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Registrar Usuario</h1>
        <div class="user-box">
          <select name="rol" id="tipo" class="select">
            <option value="">Seleccione Rol</option>
            <option value="1">Usuario</option>
            <option value="2" <?php echo $select ?>>Cliente</option>
            <option value="3">Proveedor</option>
          </select>
        </div>


        <div class="user-box selectRolUsuario" id="selectRolUsuario">
          <select name="rolUsuario" id="rolUsuario" class="select">
            <option value="">Seleccione Rol del Usuario</option>
            <option value="1">Administrador</option>
            <option value="5">Pantalonero</option>
          </select>
        </div>

        <div class="user-box divInput">
          <input type="number" name="id" required class="in" value="<?php echo $valor; ?>">
          <label>Cédula</label>
        </div>

        <div class="user-box">
          <input type="text" name="nom" required>
          <label>Nombre</label>
        </div>
        <div class="user-box divInput">
          <input type="text" name="ape" required class="in">
          <label>Apellido</label>
        </div>
        <div class="user-box divInput">
          <input type="email" name="email" required class="in">
          <label>Correo</label>
        </div>
        <div class="user-box">
          <input type="number" name="tel" required>
          <label>Teléfono</label>
        </div>

        <div id="cliDir" class="desaparecer">
          <div class="user-box">
            <input type="text" name="dire" id="dire">
            <label>Dirección</label>
          </div>
        </div>
        <div id="fotoUsu" class="desaparecer">

          <div class="mb-3">
            <label for="foto" class="form-label"></label>
            <input class="form-control form-control-sm" name="foto" id="foto" type="file">
          </div>
        </div>

        <center> <button class="btn third" type="submit">Registrar</button></center>

  </form>

  <script src="../../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
  <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../js/validarUsuario.js"></script>
  <script src="../js/validacionSelect.js"></script>

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