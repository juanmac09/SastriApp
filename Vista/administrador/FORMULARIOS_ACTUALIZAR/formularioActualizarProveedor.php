<?php
session_start();
require_once("../../../Modelo/seguridadAdministrador.php");

?>

<html lang="es">

<head>
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="../css/formSimplelittle.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar Proveedor</title>
  <link rel="stylesheet" media="all" href="../css/boton.css" />
</head>

<body>
  <div class="imagen-fondo">
    <img src="../img/proveedor.jpg" alt="Imagen de fondo">
  </div>

  <a href="../Html/consultarProveedor.php?rol=3" class="cta"><span>Atrás</span></a>

  <form method="POST" action="../../../Controlador/controladorActualizarProveedores.php" enctype="multipart/form-data">
    <div class="contact_form">
      <div class="login-box login-box-update">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <center>
          <h1>Actualizar Proveedor</h1>
        </center>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="form-group">
              <input type="number" name="id" required readonly value="<?php echo $_GET['id']; ?>">
              <label class="read">Id</label>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="form-group">
              <input type="number" name="tel" required value="<?php echo $_GET['tel']; ?>">
              <label>Teléfono</label>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="form-group">
              <input type="text" name="local" required value="<?php echo $_GET['nom']; ?>">
              <label>Nombre del Local</label>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="form-group">
              <input type="text" name="Dire" required value="<?php echo $_GET['dir']; ?>">
              <label>Dirección</label>
            </div>
          </div>
        </div>

        <center> <button class="btn third" type="submit">Actualizar</button></center>

  </form>
</body>

</html>