<?php

function mostrarUser($rol)
{
    $obj = new Consultas();
    $r = $obj -> consultarUsuario($rol);

    if (!isset($r)) {
        echo '<h2> no hay usuarios registrados </h2>';
    }
    else {
        foreach ($r as $f ) {
            echo 
            "
                <tr>
                <td><img src='../../".$f['user_foto']."' width = '40px' alt='Foto de usuario'></td>
                <td>".$f['user_identificacion']."</td>
                    <td>".$f['rol_nombre']."</td>
                    <td>".$f['user_nombre']."</td>
                    <td>".$f['user_apellido']."</td>
                    <td>".$f['user_telefono']."</td>
                    <td>".$f['user_correo']."</td>
                    <td><a href='../FORMULARIOS_ACTUALIZAR/actualizarUsuario.php?id=".$f['user_identificacion']."&nombre=".$f['user_nombre']."&apellido=".$f['user_apellido']."&telefono=".$f['user_telefono']."&correo=".$f['user_correo']."' class='btn btn-success'>Editar</a></td>
                    <td><a class='eliminar btn btn-danger'href='../../../Controlador/controladorEliminarUsuario.php?id=".$f['user_identificacion']."' >Eliminar</a></td>
                </tr>
            ";
        }
    }
}

function mostrarDatosUsu($id){
    $obj = new Consultas();
    $resultado = $obj -> ingresoLogin($id);

    return $resultado;

}


function mostrarDatosUsuario($id){
    
    $obj = new Consultas();
    return $obj -> consultarDatosUsuarios($id,1);
}


?>