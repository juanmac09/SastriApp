<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");
require_once("../../../Modelo/conexion.php");
$tipoCan = '';
if ($_GET['ma_tipo_cantidad'] == 'metros') {
  $tipoCan = "
    <option value='1' selected>Metros</option>
    <option value='2'>Unidades</option>
    <option value='3'>Centímetros</option>
  ";
} else if ($_GET['ma_tipo_cantidad'] == 'unidades') {
  $tipoCan = "
    <option value='1'>Metros</option>
    <option value='2' selected >Unidades</option>
    <option value='3'>Centímetros</option>
  ";
} else if ($_GET['ma_tipo_cantidad'] == 'centimetros') {
  $tipoCan = "
    <option value='1' selected>Metros</option>
    <option value='2'>Unidades</option>
    <option value='3' selected >Centímetros</option>
  ";
}
?>

<html lang="es">

<head>
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link href="../css/formSimplelittle.css " rel="stylesheet" type="text/css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar Material</title>
  <link rel="stylesheet" media="all" href="../css/boton.css" />
</head>

<body>
  <div class="imagen-fondo">
    <img src="../img/Materias.jpg" alt="Imagen de fondo">
  </div>

  <a href="../Html/consultarMaterias.php" class="cta"><span>Atrás</span></a>

  <form method="POST" action="../../../Controlador/controladorActualizarMaterias.php" enctype="multipart/form-data">
    <div class="contact_form">
      <div class="login-box login-box-update">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Actualizar Material</h1>

        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <input type="hidden" name="id" required value="<?php echo $_GET['mat_id'] ?>">
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <input type="text" name="nom" required value="<?php echo $_GET['ma_material'] ?>">
              <label>Nombre Material</label>
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <input type="text" name="desc" required value="<?php echo $_GET['ma_descripcion'] ?>">
              <label>Descripción</label>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <input type="number" name="cant" required value="<?php echo $_GET['ma_cantidad'] ?>">
              <label>Cantidad</label>
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <select name="TipCan" class="tipo select" style="margin-left: 14% !important;">
                <option value="">Seleccione Unidad</option>
                <?php echo $tipoCan ?>
              </select>
            </div>
          </div>
        </div>
        <center> <button class="btn third" type="submit" name="actualizarMaterial">Actualizar</button></center>
      </div>
    </div>
  </form>
  <script src="../js/validacionSelect.js"></script>
</body>

</html>