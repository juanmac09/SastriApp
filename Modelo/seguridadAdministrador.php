<?php
if (isset($_SESSION['auth']) && $_SESSION ["auth"] == 1) {
    if ($_SESSION['rol'] = 1) {
     
    }
    else {
      echo "<script> alert('No tiene permiso')</script>";
      echo "<script> location.href='../../extras/login.php'</script>";
    }
}

else {
    echo "<script> alert('Inicie Sesion')</script>";
    echo "<script> location.href='../../extras/login.php'</script>";
}



?>