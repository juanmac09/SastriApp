<?php

function mostrarClientes($rol)
{
    $obj = new Consultas();
    $result = $obj->consultarUsuario($rol);
    if (!isset($result)) {
        echo '<h2> no hay usuarios registrados </h2>';
    } else {
        foreach ($result as $f) {
            if ($_SESSION['rol'] == 1) {
                echo
                "   
                <tr>
                    <td>" . $f['user_identificacion'] . "</td>
                    <td>" . $f['user_nombre'] . "</td>
                    <td>" . $f['user_apellido'] . "</td>
                    <td>" . $f['user_correo'] . "</td>
                    <td>" . $f['user_direccion'] . "</td>
                    <td>" . $f['user_telefono'] . "</td>
                    <td>" . $f['user_registra'] . "</td>
                    <td><a href='../FORMULARIOS_ACTUALIZAR/actualizarCliente.php?id=" . $f['user_identificacion'] . "&nombre=" . $f['user_nombre'] . "&apellido=" . $f['user_apellido'] . "&correo=" . $f['user_correo'] . "&telefono=" . $f['user_telefono'] . "&direccion=" . $f['user_direccion'] . "' class='btn btn-success'> <i class='bi bi-arrow-clockwise'></i> Editar</a></td>
                    <td><a href='consultarMedidas.php?id=" . $f['user_identificacion'] . "' class='btn btn-warning'><i class='bi bi-rulers'></i> Medidas</a></td>
                    <td><button href='#' id_cliente='" . $f['user_identificacion'] . " - " . $f['user_nombre'] . "' class='btn btn-info btnPedidoCliente'><i class='bi bi-newspaper'></i>  Pedido</button></td>
                </tr>
                ";
            } 
            else if ($_SESSION['rol'] == 4) {
                echo
                "   
                <tr>
                    <td>" . $f['user_identificacion'] . "</td>
                    <td>" . $f['user_nombre'] . "</td>
                    <td>" . $f['user_apellido'] . "</td>
                    <td>" . $f['user_correo'] . "</td>
                    <td>" . $f['user_direccion'] . "</td>
                    <td>" . $f['user_telefono'] . "</td>
                    <td>" . $f['user_registra'] . "</td>
                    <td><a href='consultarMedidas.php?id=" . $f['user_identificacion'] . "' class='btn btn-warning'><i class='bi bi-rulers'></i> Medidas</a></td>
                </tr>
                ";
            } 
            else if ($_SESSION['rol'] == 5) {
                echo
                "   
                <tr>
                    <td>" . $f['user_identificacion'] . "</td>
                    <td>" . $f['user_nombre'] . "</td>
                    <td>" . $f['user_apellido'] . "</td>
                    <td>" . $f['user_correo'] . "</td>
                    <td>" . $f['user_direccion'] . "</td>
                    <td>" . $f['user_telefono'] . "</td>
                    <td>" . $f['user_registra'] . "</td>
                    <td><a href='consultarMedidas.php?id=" . $f['user_identificacion'] . "' class='btn btn-warning'><i class='bi bi-rulers'></i> Medidas</a></td>
                </tr>
                ";
            }
        }
    }
}

function mostrarClienteOpt()
{
    $obj = new Consultas();
    $result = $obj->consultarUsuario(2);
    if (!isset($result)) {
    } else {
        foreach ($result as $f) {
            echo
            "
                    <option  value='" . $f['user_identificacion'] . " - " . $f['user_nombre'] . "'>
               ";
        }
    }
}
