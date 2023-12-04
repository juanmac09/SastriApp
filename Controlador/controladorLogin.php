<?php

require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");

$veri = new Consultas;

$f = $veri->ingresoLogin($_POST);
$clave = md5($_POST['password']);

if ($f) {

    if ($f['user_password'] == $clave) {

        if ($f['user_estado'] == 1) {
            session_start();
            $_SESSION['id'] = $f['user_identificacion'];
            $_SESSION['rol'] = $f['user_rol'];
            $_SESSION['auth'] = 1;
            $_SESSION["clave"] = 3;
            $_SESSION["mensajeBienvenida"] = "";
            switch ($f['user_rol']) {
                case 1:
                    $_SESSION["mensajeBienvenida"] = "Administrador";
                    echo "<script> location.href='../Vista/administrador/home.php'</script>";
                    break;

                case 2:
                    $_SESSION["mensajeBienvenida"] = "Saquero";
                    // echo "<script> alert('Bienvenido Saquero')</script>";
                    echo "<script> location.href='../Vista/saquero/home.php'</script>";
                    break;

                case 4:
                    $_SESSION["mensajeBienvenida"] = "Usuario";
                    // echo "<script> alert('Bienvenido Proveedor')</script>";
                    echo "<script> location.href='../Vista/usuario/home.php'</script>";
                    break;

                case 5:
                    $_SESSION["mensajeBienvenida"] = "Pantalonero";
                    // echo "<script> alert('Bienvenido Pantalonero')</script>";
                    echo "<script> location.href='../Vista/pantalonero/home.php'</script>";
                    break;
            }
        } else {
            session_start();
            $_SESSION["clave"] = 3;
            echo "<script> alert('El usuario se encuentra inactivo')</script>";
            echo "<script> location.href='../Vista/extras/login.php'</script>";
        }
    } else {
        session_start();
        $_SESSION["clave"] = 1;
        // echo "<script> alert('La clave es incorrecta')</script>";
        echo "<script> location.href='../Vista/extras/login.php'</script>";
    }
} else {
    session_start();
    $_SESSION["clave"] = 2;
    // echo "<script> alert('El numero de docucumento no coincide')</script>";
    echo "<script> location.href='../Vista/extras/login.php'</script>";
}
