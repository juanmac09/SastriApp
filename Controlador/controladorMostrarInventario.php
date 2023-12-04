<?php
function mostrarInventario()
{
    $obj = new Inventario();
    $resultado = $obj->consultarInventario();
    if ($resultado) {
        foreach ($resultado as $f) {
            $tipo = "";
            $ver = "";
            $total = 0;
            if ($f['in_entrada_salida'] == 1) {
                $tipo = "Entrada";
                $ver = "consultarInventarioEspecificoEntrada.php?in_id=" . $f['in_id'] . "&in_accesorio_material=" . $f['in_accesorio_material'];

                $precio = $obj->consultarInventarioPrecio($f['in_id']);
                $codigo = 0;
                $total = 0;
                $precios = null;
                while ($codigo < count($precio)) {
                    $precios[$codigo] = $precio[$codigo]['in_precio'];
                    $total += $precio[$codigo]['in_precio'];
                    $codigo++;
                }
            } else if ($f['in_entrada_salida'] == 2) {
                $tipo = "Salida";
                $ver = "consultarInventarioEspecificoSalida.php?in_id=" . $f['in_id'] . "&in_accesorio_material=" . $f['in_accesorio_material'];;
            }
            if ($f['observaciones'] == null) {
                $f['observaciones'] = "Sin Observaciones";
            }

            $accesorioMaterial = ($f['in_accesorio_material'] == 1) ? "Materias Primas" : "Accesorios";

            if ($_SESSION['rol'] == 1) {
                echo
                "
                    <tr>
                        <td>" . $f['in_id'] . "</td>
                        <td>" . $f['in_fecha'] . "</td>
                        <td>" . $accesorioMaterial . "</td>
                        <td>" . $tipo . "</td>
                        <td> $" . $total . "</td>
                        <td>" . $f['observaciones'] . "</td>
                        <td><a href='$ver' class='btn btn-info'><i class='bi bi-search'></i> Ver</a></td>
                        <td><a href='../../../Controlador/controladorDeshabilitarInventario.php?in_id=" . $f['in_id'] . "' class='btn btn-danger eliminacionInventario'><i class='bi bi-trash'></i> Eliminar</a></td>
                    </tr>
                ";
            }
            else if ($_SESSION['rol'] == 4) {
                echo
                "
                    <tr>
                        <td>" . $f['in_id'] . "</td>
                        <td>" . $f['in_fecha'] . "</td>
                        <td>" . $accesorioMaterial . "</td>
                        <td>" . $tipo . "</td>
                        <td> $" . $total . "</td>
                        <td>" . $f['observaciones'] . "</td>
                        <td><a href='$ver' class='btn btn-info'><i class='bi bi-search'></i> Ver</a></td>
                    </tr>
                ";
            }
            
        }
    }
}

function mostrarInventarioEspecifico($id, $tipo)
{

    $obj = new Inventario();
    $invetario = $obj->consultarInventarioEspecifico($id, $tipo);
    return $invetario;
}


function mostrarInvetarioMaterialPrecio($id, $tipo)
{
    $obj = new Inventario();


    $precio = $obj->consultarInventarioPrecio($id);
    $codigo = 0;
    $total = 0;
    $precios = null;
    while ($codigo < count($precio)) {
        $precios[$codigo] = $precio[$codigo]['in_precio'];
        $total += $precio[$codigo]['in_precio'];
        $codigo++;
    }
    $codigo = 1;
    if ($tipo == 1) {
        $material = $obj->consultarInventarioMaterial($id);
        foreach ($material as $f) {
            echo
            "
                <tr>
                    <td width='5%'>
                        <span>$codigo</span>
                    </td>
                    <td width='60%'><span>" . $f['ma_material'] . "</span></td>
                    <td class='amount'><span>" . $f['in_cantidad'] . "</span></td>
                    <td class=''><span>" . $f['in_tipo'] . "</span></td>
                    <td class='tax taxrelated'>" . $precios[$codigo - 1] . "</td>
                </tr>
            ";
            $codigo++;
        }
    } else {
        $accesorio = $obj->consultarInventarioAccesorioIndividuales($id);
        foreach ($accesorio as $f) {
            echo
            "
                <tr>
                    <td width='5%'>
                        <span>$codigo</span>
                    </td>
                    <td width='60%'><span>" . $f['acc_nombre'] . "</span></td>
                    <td class='amount'><span>" . $f['cantidad'] . "</span></td>
                    <td class='tax taxrelated'>" . $precios[$codigo - 1] . "</td>
                </tr>
            ";
            $codigo++;
        }
    }



    return $total;
}

function mostrarMaterialInventarioSalida($id, $tipo)
{
    $obj = new Inventario();

    if ($tipo == 1) {
        $material = $obj->consultarInventarioMaterial($id);
        $codigo = 1;
        foreach ($material as $f) {
            echo
            "
            <tr>
                <td width='5%'>
                    <span>$codigo</span>
                </td>
                <td width='60%'><span>" . $f['ma_material'] . "</span></td>
                <td class='amount'><span>" . $f['in_cantidad'] . "</span></td>
                <td class=''><span>" . $f['in_tipo'] . "</span></td>
            </tr>
        ";
            $codigo++;
        }
    } else {
        $accesorio = $obj->consultarInventarioAccesorioIndividuales($id);
        $codigo = 1;
        foreach ($accesorio as $f) {
            echo
            "
            <tr>
                <td width='5%'>
                    <span>$codigo</span>
                </td>
                <td width='60%'><span>" . $f['acc_nombre'] . "</span></td>
                <td class='amount'><span>" . $f['cantidad'] . "</span></td>
            </tr>
        ";
            $codigo++;
        }
    }
}



function mostrarPrecioInventario($id)
{
    $obj = new Inventario();
    $precio = $obj->consultarInventarioPrecio($id);
    return $precio;
}





function mostrarInventarioAccesorio($id)
{
    $obj = new Inventario();
    $invetario = $obj->consultarInventarioAccesorio($id);
    return $invetario;
}
