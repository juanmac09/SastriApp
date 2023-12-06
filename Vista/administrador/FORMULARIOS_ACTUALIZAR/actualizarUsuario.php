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
  <link href="../css/formSimple-Actualizar.css " rel="stylesheet" type="text/css">
  <title>Actualizar usuario</title>
  <link rel="stylesheet" media="all" href="../css/boton.css" />
</head>

<body>
  <div class="imagen-fondo">
    <img src="../img/administrador.jpeg" alt="Imagen de fondo">
  </div>

  <a href="../Html/Consultausuario.php?rol=1" class="cta"><span>Atrás</span></a>

  <form method="POST" action="../../../Controlador/controladorActualizarUsuario.php" enctype="multipart/form-data">
    <div class="contact_form">
      <div class="login-box login-box-update">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Actualizar Usuario</h1>

        <div class="user-box">
          <input type="number" name="id" required readonly value="<?php echo $_GET['id']; ?>">
          <label class="read">Cédula</label>
        </div>

        <div class="user-box">
          <input type="text" name="nom" required value="<?php echo $_GET['nombre']; ?>">
          <label class="read">Nombre</label>
        </div>

        <div class="user-box">
          <input type="text" name="ape" required value="<?php echo $_GET['apellido']; ?>">
          <label class="read">Apellido</label>
        </div>

        <div class="user-box">
          <input type="email" name="email" required value="<?php echo $_GET['correo']; ?>">
          <label class="read">Correo</label>
        </div>

        <div class="user-box">
          <input type="number" name="tel" required value="<?php echo $_GET['telefono']; ?>">
          <label class="read">Teléfono</label>
        </div>

        <center> <button class="btn third" type="submit" name="actualizarUsuario">Actualizar</button></center>
      </div>
  </form>
</body>

</html>