<?php
session_start();
if (isset($_SESSION["clave"])) {

  if ($_SESSION["clave"] == 1) {
    echo "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          sweetAlert('Oops...', ' La contraseña es incorrecta ', 'error');
        });
      </script>";
  } else if ($_SESSION["clave"] == 2) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Error', ' El documento no se ha encontrado ', 'error');
      });
    </script>";
  } else if ($_SESSION["clave"] == 3) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Error', ' El usuario se encuentra inactivo ', 'error');
      });
    </script>";
  } else if ($_SESSION["clave"] == 4) {
    echo "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          swal({
            title: 'Correo Enviado',
            text: 'Se envio un correo para restablecer la contraseña.',
            imageUrl: 'img/Enviado.gif',
          });
        });
      </script>";
  } else if ($_SESSION["clave"] == 5) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Error', 'El correo no encuentra registrado', 'error');
      });
    </script>";
  } else if ($_SESSION["clave"] == 6) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Cambio Contraseña Exitoso', 'Se ha actualizado su contraseña', 'success');
      });
    </script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>


  <form action="../../Controlador/controladorLogin.php" method="POST">

    <div class="login-box">
      <div class="logo-form-login"><img src="img/logo satriapp blanco.png" alt=""></div>
      <h2>Iniciar Sesión</h2>
      <form>
        <div class="user-box">
          <input type="number" name="user" required>
          <label>No. Documento</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required class="c" id="c"> <i class="bi bi-eye-slash-fill ojoA" id="boton"></i>
          <label>Contraseña</label>
          <a href="RestablecerContra/index.html" class="forgotPass">¿Has olvidado tu contraseña?</a>
        </div>
        <center><button class="btno thirdr" type="submit">Ingresar</button></center>
    </div>
  </form>
  <!-- Modal -->


  <script>
    var input = document.getElementById("c");
    var ojo = document.getElementById("boton");
    ojo.addEventListener("click", () => {
      if (ojo.classList.contains("bi-eye-slash-fill")) {
        ojo.classList.remove("bi-eye-slash-fill");
        ojo.classList.add("bi-eye-fill");
        input.type = "text";
      } else {
        ojo.classList.remove("bi-eye-fill");
        ojo.classList.add("bi-eye-slash-fill");
        input.type = "password";
      }
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <!-- jquery vendor -->
  <script src="../dashboard/js/lib/jquery.min.js"></script>
  <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>

  <script src="../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
  <script src="js/alerts.init.js"></script>
  <script src="../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../dashboard/js/scripts.js"></script>

</body>

</html>

<?php
if (isset($_SESSION["clave"])) {
  $_SESSION["clave"] = 0;
}

?>