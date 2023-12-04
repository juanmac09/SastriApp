<?php

// Creamos una función para mostrar todos los accesorios

function mostrarTodosAccesorios(){
    // Creamos el objeto de la clase accesorios
    $obj = new Accesorio();
    // Ejecutamos el metodo para consultar los accesorios
    $resultado = $obj -> consultarAccesorios();
    // Verficamos que hayan registrados Accesorios
    if ($resultado) {
        // Recorremos el resultado con un ciclo
        foreach ($resultado as $f) {
            if ($_SESSION['rol'] == 1) {
                echo 
                "
                    <tr>
                        <td>".$f['acc_id']."</td>
                        <td>".$f['acc_nombre']."</td>
                        <td>".$f['acc_descripcion']."</td>
                        <td>".$f['acc_cantidad']."</td>
                        <td><a href='../FORMULARIOS_ACTUALIZAR/formularioActualizarAccesorios.php?acc_id=".$f['acc_id']."&acc_nombre=".$f['acc_nombre']."&acc_descripcion=".$f['acc_descripcion']."&acc_cantidad=".$f['acc_cantidad']."' class='btn btn-success'><i class='bi bi-arrow-clockwise'></i> Editar</a></td>
                    </tr>
                
                ";
            }
            else if($_SESSION['rol'] == 4){
                echo 
                "
                    <tr>
                        <td>".$f['acc_id']."</td>
                        <td>".$f['acc_nombre']."</td>
                        <td>".$f['acc_descripcion']."</td>
                        <td>".$f['acc_cantidad']."</td>
                    </tr>
                
                ";
            }
            
        }
    }
}


// Creamos una función para mostrar las opciones de accesorios
function mostrarOptAccesorios(){
    // Creamos un objeto de la clase accesorios
    $obj = new Accesorio();
    // Ejecutamso el metodo para consultar los accesorios
    $resultado = $obj -> consultarAccesorios();
    // Verificamos que hayan registrados accesorios
    if ($resultado) {
        // Usamos un foreach para recorrer los datos
        foreach ($resultado as $f) {
            echo "<option value='".$f['acc_id']." - ".$f['acc_nombre']."'>";
        }
    }
    // Sino hay registrados mostramos
    else{
        echo "<option value='No hay accesorios registrados'>";
    }

}



?>