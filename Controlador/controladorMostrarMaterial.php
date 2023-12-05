<?php

function mostrarMaterial(){
    $obj = new Material();
    $resultado = $obj -> consultarMaterial();

    if ($resultado) {
        foreach ($resultado as $f) {
            if ($_SESSION['rol'] == 1) {
                echo 
                "
                    <tr>
                        <td>".$f['mat_id']."</td>
                        <td>".$f['ma_material']."</td>
                        <td>".$f['ma_descripcion']."</td>
                        <td>".$f['ma_tipo_cantidad']."</td>
                        <td>".$f['ma_cantidad']."</td>
                        <td><a href='../FORMULARIOS_ACTUALIZAR/formularioActualizarMaterial.php?mat_id=".$f['mat_id']."&ma_material=".$f['ma_material']."&ma_descripcion=".$f['ma_descripcion']."&ma_tipo_cantidad=".$f['ma_tipo_cantidad']."&ma_cantidad=".$f['ma_cantidad']."' class='btn btn-success'><i class='bi bi-arrow-clockwise'></i> Editar</a></td>
                    </tr>
                ";
            }
            else if($_SESSION['rol'] == 4){
                echo 
                "
                    <tr>
                        <td>".$f['mat_id']."</td>
                        <td>".$f['ma_material']."</td>
                        <td>".$f['ma_descripcion']."</td>
                        <td>".$f['ma_tipo_cantidad']."</td>
                        <td>".$f['ma_cantidad']."</td>
                    </tr>
                ";
            }
            
        }
    }

}

function mostrarMaterialOpt(){
    $obj = new Material();
    $resultado = $obj -> consultarMaterial();

    if ($resultado) {
        foreach ($resultado as $f) {
           echo 
                "
                    <option value='".$f['mat_id']." - ".$f['ma_material']."'>
                ";
        }
    }
    else{
        echo 
        "
            <option value='No hay material registrado'>
        ";
    }
}



?>