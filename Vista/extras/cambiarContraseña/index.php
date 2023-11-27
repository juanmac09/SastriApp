<?php
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/consultas.php");

$obj = new Consultas();
$resultado = $obj->ingresoLogin($_GET);


if ($_GET['token'] != $resultado['user_password']) {
  echo "<script>location.href='../excepsion/error404.html'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .third {
      border-color: #fff;
      color: #000;
      box-shadow: 0 0 40px 40px #000 inset, 0 0 0 0 #fff;
      -webkit-transition: all 150ms ease-in-out;
      transition: all 150ms ease-in-out;
    }

    .third:hover {
      box-shadow: 0 0 10px 0 #fff inset, 0 0 10px 4px #fff;
    }

    .third {
      border-color: #fff;
      color: #000;
      box-shadow: 0 0 40px 40px #a12b46 inset, 0 0 0 0 #fff;
      -webkit-transition: all 150ms ease-in-out;
      transition: all 150ms ease-in-out;
    }

    .third:hover {
      box-shadow: 0 0 10px 0 #fff inset, 0 0 10px 4px #fff;
    }

    .btn {
      box-sizing: border-box;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-color: transparent;
      border: 2px solid #fff;
      border-radius: 0.6em;
      color: #fff;
      cursor: pointer;
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-align-self: center;
      -ms-flex-item-align: center;
      align-self: center;
      font-size: 1.1rem !important;
      font-weight: 400;
      line-height: 1;
      margin: 20px;
      padding: 1.2em 2.8em;
      text-decoration: none;
      text-align: center;
      font-weight: 200;
      margin-top: 5%;
    }

    .btn:hover,
    .btn:focus {
      color: #fff;
      outline: 0;
    }

    .c {
      position: relative;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Contraseña</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Peta&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form action="../../../Controlador/controladorCambiarPassword.php?id=<?php echo $_GET['user'] ?>" method="POST">

    <div class="login-box">
      <h1>Crear Una Nueva Contraseña</h1>
      <form>
        <div class="intro">
          <p>Introduce tu nueva información de Contraseña abajo.</p>
        </div>
        <div class="user-box">
          <input type="password" name="pass" required id="pass">
          <label>Contraseña:</label>
          <p class="mensajeError ocultar" id="digitos">La contraseña debe ser mayor o igual a 8 digitos</p>
        </div>
        <div class="user-box">
          <input type="password" name="passConfirt" required id="confirt">
          <label>Confirmar Contraseña:</label>
          <p class="mensajeError ocultar" id="noCoincide">La contraseña no coincide</p>
        </div>
        <center><button class="btn third" type="submit">Guardar</button></center>
    </div>
    </div>


  </form>

<script src="js/main.js"></script>
</body>

</html>