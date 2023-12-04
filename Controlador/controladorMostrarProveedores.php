<?php
// Creamos una funcion para mostrar los datos
function mostrarProveedores($rol) {
    // Creamos el objeto de la clase proveedor
    $obj = new Consultas();
    // ejecutamos el metodo para consultar
    $resultado = $obj -> consultarUsuario($rol);
    // Hacemos una validación si no hay proveedores
    if ($resultado) {
        // Usamos un foreach para recorrer la consulta
        foreach ($resultado as $f ) {
            // Mostramos la información
            if ($_SESSION['rol'] == 1) {
                echo 
                
                "
                <tr>
                    <td>".$f['user_identificacion']."</td>
                    <td>".$f['user_nombre']."</td>
                    <td>".$f['user_telefono']."</td>
                    <td>".$f['user_direccion']."</td>
                    <td>".$f['user_registra']."</td>
                    <td><a href='../FORMULARIOS_ACTUALIZAR/formularioActualizarProveedor.php?id=".$f['user_identificacion']."&nom=".$f['user_nombre']."&tel=".$f['user_telefono']."&dir=".$f['user_direccion']."' class='btn btn-success'><i class='bi bi-arrow-clockwise'></i> Editar</a></td>
                </tr>
                ";
            }
            else if($_SESSION['rol'] == 4){
                echo 
                
                "
                <tr>
                    <td>".$f['user_identificacion']."</td>
                    <td>".$f['user_nombre']."</td>
                    <td>".$f['user_telefono']."</td>
                    <td>".$f['user_direccion']."</td>
                    <td>".$f['user_registra']."</td>
                </tr>
                ";
            }
            
        }
    }
    else {
        // echo "<h2>No hay proveedores registrados</h2>";
    }
}

function mostrarProveedoresOpt(){
    $obj = new Consultas();
    $resultado = $obj -> consultarUsuario(3);
    if ($resultado) {
        foreach ($resultado as $f) {
            echo 
                "
                    <option value='".$f['user_identificacion']." - ".$f['user_nombre']."'>
                ";
        }
    }
    else{
        echo 
        "
            <option value='No hay proveedores registrados'>
        ";
    }
}




?>