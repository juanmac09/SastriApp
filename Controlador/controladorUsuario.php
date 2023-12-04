<?php
// IMPORTAMOS LAS DEPENDECIAS NECESARIAS
require_once("../Modelo/conexion.php");
require_once("../modelo/consultas.php");
session_start();
$obj = new Consultas();
$_POST['user_registrar'] = $_SESSION['id'];

if ($_POST['rol'] == 1) {
    $usuario = $obj -> consultarDatosUsuarios($_POST['id'],1);
    $cliente = $obj -> consultarDatosUsuarios($_POST['id'],2);
    if ($usuario || $cliente) {
        $_SESSION['mensaje'] = "El documento ya se encuentra registrado";
        $_SESSION['confirmarRegistro'] = 2;
        echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
        die();
    }
    define ('LIMITE',2000 );
    define('ARREGLO',serialize(array('image/jpg','image/png','image/jpeg','image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);
    if ($_FILES['foto']['error']) {
        $_SESSION['confirmarRegistro'] = 2;
        $_SESSION['mensaje']= "La imagen no es compatible";
        // echo '<script> alert("error al cargar imagen intente nuevamente") </script>';
        echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
    }else {

        //confirmamos formato de imagen y peso

        if (in_array($_FILES['foto']['type'],$PERMITIDOS) && $_FILES['foto']['size'] <= LIMITE * 1024) {

            //capturamos los valores a guardar en la base de datos
            $foto = "../uploads/users/".$_FILES['foto']['name'];
            //movemos el archivo a la carpeta seleccionada
            $resultado = move_uploaded_file($_FILES['foto']['tmp_name'],$foto);

            if ($_POST['tel']=='') {
                $_POST['tel'] = 0;
            }
            $_POST['dire'] = null;
            $_POST['foto'] = $foto;
            $_POST['password'] = md5($_POST['id']);
            $_POST['rol'] = $_POST['rolUsuario'];
            $_SESSION['mensaje'] = "Registro Exitoso usuario";
            $_SESSION['confirmarRegistro'] = 1;
            $obj -> registrarUser($_POST);
            
        }
        else {
            $_SESSION['confirmarRegistro'] = 2;
            // echo "<script> alert('Error al cargar la foto')</script>";
            $_SESSION['mensaje'] = "La imagen no es compatible";
            echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
        }
    }
}
else if ($_POST['rol'] == 2) {
    $usuario = $obj -> consultarDatosUsuarios($_POST['id'],1);
    $cliente = $obj -> consultarDatosUsuarios($_POST['id'],2);
    if ($usuario || $cliente) {
        $_SESSION['mensaje'] = "Documento ya se encuentra registrado";
        $_SESSION['confirmarRegistro'] = 2;
        echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
        die();
    }
    if ($_POST['tel']=='') {
        $_POST['tel'] = 0;
    }
    if ($_POST['dire']=='') {
        $_POST['dire'] = "0";
    }
    $_POST['foto'] = null;
    $_POST['password']= null;
    $obj -> registrarUser($_POST);
    $_SESSION['mensaje'] = "Registro Exitoso cliente";
    $_SESSION['confirmarRegistro'] = 1;
}
else if($_POST['rol'] == 3){
  $f = $obj -> contarProveedor();
  if($f['count(user_identificacion)'] == 0){
    $_POST['id'] = 1; 
  }
  else{
    $n = $obj -> ultimoProveedor();
    $_POST['id'] = $n['user_identificacion'] + 1;
    
  }

  $obj -> registrarUser($_POST);
  $_SESSION['mensaje'] = "Registro Exitoso proveedor";
  $_SESSION['confirmarRegistro'] = 1;
}
else{
    echo "<script> alert('Seleccione un rol')</script>";
    echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
}











    




?>