<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");



?>

<html lang="es">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" media="all" href="../css/boton.css" />
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link href="../css/formSimplelittle.css " rel="stylesheet" type="text/css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar Accesorio</title>

</head>

<body>

  <div class="imagen-fondo">
    <img src="../img/Materias.jpg" alt="Imagen de fondo">
  </div>

  <a href="../Html/consultarAccesorios.php" class="cta"><span>Atrás</span></a>
  <form method="POST" action="../../../Controlador/controladorActualizarMaterias.php?acc_id=<?php echo $_GET['acc_id'] ?>" enctype="multipart/form-data">
    <div class="contact_form">

      <div class="login-box login-box-update-accesorios">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Actualizar Accesorio</h1>

        <div>
          <div class="row">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="nomAce" class="inputAccesorios" required value="<?php echo $_GET['acc_nombre'] ?>">
                  <label>Nombre Accesorio</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="descAce" class="inputAccesorios" required value="<?php echo $_GET['acc_descripcion'] ?>">
                  <label>Descripción</label>
                </div>
              </div>
            </div>


            <div class="col-lg-12 col-md-12">
              <div class="form-group">
                <input type="number" name="cantAce" class="inputAccesorios" required value="<?php echo $_GET['acc_cantidad'] ?>">
                <label>Cantidad</label>
              </div>
            </div>


          </div>

          <center> <button class="btn third" type="submit" name="actualizarAccesorios">Actualizar</button></center>

  </form>


</body>

</html>