<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");


$obj = new Consultas();
$obj->modificarUsuario($_POST);

if (isset($_POST['actualizarUsuario'])) {
    session_start();
    $_SESSION['confirmarRegistro'] = 1;
    $_SESSION['mensaje'] = "Actualización Exitosa";
    echo "<script> location.href='../Vista/administrador/Html/Consultausuario.php?rol=1'</script>";
} else if (isset($_POST['perfil'])) {

    session_start();

    if (isset($_POST['Checkpass'])) {
        $obj->modificarPassword($_POST);
    }
    if ($_SESSION['rol'] == 1) {

        echo "<script> location.href='../Vista/administrador/Html/profile.php'</script>";
    } else if ($_SESSION['rol'] == 5) {
        echo "<script> location.href='../Vista/pantalonero/Html/profile.php'</script>";
    }
} else if (isset($_POST['cambiarFoto'])) {

    define("ARREGLO", serialize(array('image/jpg', 'image/png', 'image/jpeg')));
    define('LIMITE', 2000);
    $PERMITIDOS = unserialize(ARREGLO);

    if ($_FILES['fotosubida']['error']) {
        echo "<script>Error al cargar la fotos</script>";
        if ($_SESSION['rol'] == 1) {

            echo "<script> location.href='../Vista/administrador/Html/profile.php'</script>";
        } else if ($_SESSION['rol'] == 5) {
            echo "<script> location.href='../Vista/pantalonero/Html/profile.php'</script>";
        }
    } 
    else {
        if (in_array($_FILES['fotosubida']['type'], $PERMITIDOS) && $_FILES['fotosubida']['size'] <= LIMITE * 1024) {
            session_start();

            $usuario = $obj->consultarDatosUsuarios($_SESSION['id'], $_SESSION['rol']);
            unlink($usuario['user_foto']);

            $foto = "../uploads/users/" . $_FILES['fotosubida']['name'];
            $resultado = move_uploaded_file($_FILES['fotosubida']['tmp_name'], $foto);
            $obj->modificarFoto($_SESSION['id'], $foto);



            echo "<script>Foto Actualizada Exitosa</script>";
            if ($_SESSION['rol'] == 1) {

                echo "<script> location.href='../Vista/administrador/Html/profile.php'</script>";
            } else if ($_SESSION['rol'] == 5) {
                echo "<script> location.href='../Vista/pantalonero/Html/profile.php'</script>";
            }
            
        } else {
            echo "<script>Error al cargar la fotos</script>";
            if ($_SESSION['rol'] == 1) {

                echo "<script> location.href='../Vista/administrador/Html/profile.php'</script>";
            } else if ($_SESSION['rol'] == 5) {
                echo "<script> location.href='../Vista/pantalonero/Html/profile.php'</script>";
            }
        }
    }
} else {
}
