<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/consultas.php");
require_once("../Modelo/correoModelo.php");
function generarCadenaAleatoria($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $cadenaAleatoria = '';
    
    for ($i = 0; $i < $longitud; $i++) {
        $indiceAleatorio = mt_rand(0, strlen($caracteres) - 1);
        $caracterAleatorio = $caracteres[$indiceAleatorio];
        $cadenaAleatoria .= $caracterAleatorio;
    }
    
    return $cadenaAleatoria;
}


$obj = new Consultas();
$resultado = $obj -> consultarUsuarioCorreo($_POST['email']);

if ($resultado) {
    $correo = new Correo();
    $token = generarCadenaAleatoria(7);
    $datos['id'] = $resultado['user_identificacion'];
    $datos['pass'] = $token;
    $obj -> modificarPassword($datos);
    $token = md5($token);
    $link = "http://localhost/SastriApp/Vista/extras/cambiarContraseña/index.php?user=".$resultado['user_identificacion']."&token=".$token;
    $correo  -> enviarCorreoCambioPassword($resultado['user_correo'],$link);

    session_start();
    $_SESSION['clave'] = 4;
    echo 
        "<script>
            location.href='../Vista/extras/login.php';
        </script>";
}
else{
    session_start();
    $_SESSION['clave'] = 5;
    echo 
        "<script>
            location.href='../Vista/extras/login.php';
        </script>";
}



?>