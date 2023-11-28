<?php
function mostrarPedidoId($id)  {
    $obj = new Pedido();
    $resultado = $obj -> consultarPedidoId(0,$id);
    $table = null;
    if ($resultado) {
        
        foreach ($resultado as $f) {
            if ($f['cam_cuello'] != "") {
                $cuello = "";
                $despunte = "";
                $tipoPuno = "";
                $bolsilloCamisa = "";
                $table['confirmadorCamisa'] = true;
                switch ($f['cam_cuello']) {
                    case 1:
                        $cuello = "Valentino";
                        break;
                    case 2:
                        $cuello = "Pegaso";
                        break;
                    case 3:
                        $cuello = "Frances";
                        break;
                    case 4:
                        $cuello = "Spencer";
                        break;
                    case 5:
                        $cuello = "Lucas";
                        break;
                    case 6:
                        $cuello = "Inghirami";
                        break;
                    case 7:
                        $cuello = "Botón Down";
                        break;
                    case 8:
                        $cuello = "Merizalde";
                        break;
                    case 9:
                        $cuello = "Dior";
                        break;
                    case 10:
                        $cuello = "Pajarito";
                        break;
                    case 11:
                        $cuello = "Nerú";
                        break;
                    default:
                        $cuello = "Error";
                        break;
                }

                switch ($f['cam_despunte']) {
                    case 1:
                        $despunte = "1/6";
                        break;
                    case 2:
                        $despunte = "1/8";
                        break;
                    case 3:
                        $despunte = "1/4";
                        break;
                    case 4:
                        $despunte = "3/6";
                        break;
                    case 5:
                        $despunte = "3/8";
                        break;
                    case 6:
                        $despunte = "Dobles";
                        break;
                    default:
                        $despunte = "Error";
                        break;
                }

                switch ($f['cam_puno']) {
                    case 1:
                        $tipoPuno = "Mancorna";
                        break;
                    case 2:
                        $tipoPuno = "Sencillo";
                        break;
                    case 3:
                        $tipoPuno = "Manga Corta";
                        break;
                    
                    default:
                        $tipoPuno = "Error";
                        break;
                }

                switch ($f['cam_bolsillo']) {
                    case 1:
                        $bolsilloCamisa = "Cuadrado";
                        break;
                    case 2:
                        $bolsilloCamisa = "Italiano";
                        break;
                    case 3:
                        $bolsilloCamisa = "Con Puelle";
                        break;
                    case 4:
                        $bolsilloCamisa = "Con Tapa";
                        break;
                    case 5:
                        $bolsilloCamisa = "Con Botón";
                        break;
                    case 6:
                        $bolsilloCamisa = "No Tiene";
                        break;
                    
                    default:
                        $bolsilloCamisa = "Error";
                        break;
                }

                $table['camisa'] = 
                '
                    <h2>Detalle Pedido Camisa</h2>
                    <table>
                        <tr>
                            <th>Tipo Cuello</th>
                            <th>Tipo Despunte</th>
                            <th>Tipo Puño</th>
                            <th>Tipo Bolsillo</th>
                            <th>Observaciones</th>
                        </tr>
                        <tr>
                            <td>'.$cuello.'</td>
                            <td>'.$despunte.'</td>
                            <td>'.$tipoPuno.'</td>
                            <td>'.$bolsilloCamisa.'</td>
                            <td>'.$f['ped_caobservaciones'].'</td>
                        </tr>
                    </table>
                
                ';
            }
            else{
                $table['camisa'] = '';
                $table['confirmadorCamisa'] = false;
            }

            if ($f['ped_chaobservaciones'] != "") {
                $table['confirmadorChaleco'] = true;
                $table['chaleco'] = 
                "
                <h2>Detalle Pedido Chaleco</h2>
                <table>
                
                    <tr>
                        <th>Observaciones Chaleco</th>
                    </tr>
                    <tr>
                        <td>".$f['ped_chaobservaciones']."</td>
                    </tr>
                 </table>
                ";
            }
            else{
                $table['chaleco'] = "";
                $table['confirmadorChaleco'] = false;
            }

            if ($f['ped_aberturas'] != "") {
                $table['confirmadorChaqueta'] = true;
                $tipoAbertura = "";
                switch ($f['ped_tipo_abertura']) {
                    case 0:
                        $tipoAbertura = "Si";
                        break;
                    case 1:
                        $tipoAbertura = "No";
                        break;
                    default:    
                        $tipoAbertura = "Error";
                        break;
                }
                $table['chaqueta'] = 
                "
                <h2>Detalle Pedido Chaqueta</h2>
                <table>
                    <tr>
                        <th>Abertura Chaqueta</th>
                        <th>Tipo Abertura</th>
                        <th>Observaciones Chaqueta</th>
                        
                    </tr>
                    <tr>
                        <td>".$f['ped_aberturas']."</td>
                        <td>".$tipoAbertura."</td>
                        <td>".$f['ped_cobservaciones']."</td>
                    </tr>
                </table>
                ";
            }
            else{
                $table['chaqueta'] = "";
                $table['confirmadorChaqueta'] = false;
            }

            if ($f['ped_bota'] != "") {
                $table['confirmadorPantalon'] = true;
                $bolsilloReloj = "";

                switch ($f['ped_bolsillo_reloj']) {
                    case 0:
                        $bolsilloReloj = "Si";
                        break;
                    case 1:
                        $bolsilloReloj = "No";
                        break;
                    default:    
                        $bolsilloReloj = "Error";
                        break;
                }

                $table['pantalon'] = 
                "
                <h2>Detalle Pedido Pantalón</h2>
                <table>
                    <tr>
                        <th>Bota Pantalón</th>
                        <th>Bolsillo Reloj</th>
                        <th>Observaciones Pantalón</th>
                        
                    </tr>
                    <tr>
                        <td>".$f['ped_bota']."</td>
                        <td>".$bolsilloReloj."</td>
                        <td>".$f['ped_pobservaciones']."</td>
                    </tr>
                </table>
                ";
            }
            else{
                $table['pantalon'] = "";
                $table['confirmadorPantalon'] = false;
            }

            if ($f['pe_tipo'] == 0) {
                $table['tipoPedido'] = "Pedido";
            }
            else{
                $table['tipoPedido'] = "Arreglo";
            }

            
            $table['fecha'] = $f['pe_fecha'];
            $table['Entrega'] = $f['pe_fecha_entrega'];
            $table['nombreCompletoCliente'] = $f['user_nombre'] . " ". $f['user_apellido'];
            $table['telefono'] = $f['user_telefono'];
            $table['direccion'] = $f['user_direccion'];
            $table['email'] = $f['user_correo'];
            $table['abono'] = $f['pe_abono'];
            $table['total'] = $f['pe_total'];
            $table['obs'] = $f['ped_detalles'];
            $table['id'] = $f['user_identificacion']; 
            $table['datos'] = $f;
        }
        return $table;
    }
     
}

function mostrarPedido() {
   
    $obj = new Pedido();
    if ($_SESSION['rol'] == 1) {
        $resultado = $obj -> consultarPedido();
    }
    else if ($_SESSION['rol'] == 5) {
        $resultado = $obj -> consultarPedidoPantalonero();
    }
    if ($resultado) {
        foreach ($resultado as $f) {
            
            if ($f['pe_estado'] == "pendiente") {
                $select = "
                <select class='estado n1' id_cli = '".$f['user_identificacion']."' id_ped = '".$f['ped_id']."'>
                <option value='1' selected>Pendiente</option>
                <option value='2'>Retrasado</option>
                <option value='3'>Terminado </option>
                <option value='4'>Entregado </option>
                </select>
                "; 
            }
            elseif ($f['pe_estado'] == "retrasado") {
                $select = "
                <select class='estado n1' id_cli = '".$f['user_identificacion']."' id_ped = '".$f['ped_id']."'>
                <option value='1'>Pendiente</option>
                <option value='2' selected>Retrasado</option>
                <option value='3'>Terminado </option>
                <option value='4'>Entregado </option>
                </select>
                "; 
            }
            elseif ($f['pe_estado'] == "terminado") {
                $select = "
                <select class='estado n1' id_cli = '".$f['user_identificacion']."' id_ped = '".$f['ped_id']."'>
                <option value='1'>Pendiente</option>
                <option value='2'>Retrasado</option>
                <option value='3' selected>Terminado </option>
                <option value='4'>Entregado </option>
                </select>
                ";
            }
            else{
                $select = "
                <select class='estado n1' id_cli = '".$f['user_identificacion']."' id_ped = '".$f['ped_id']."'>
                <option value='1'>Pendiente</option>
                <option value='2'>Retrasado</option>
                <option value='3'>Terminado </option>
                <option value='4' selected>Entregado </option>
                </select>
                ";
            }
            
            if ($f['pe_tipo'] == 0) {
                $tipo = "Pedido";
            }
            else{
                $tipo = "Arreglo";
            }
            echo 
            "
                <tr>
                        <td>".$f['ped_id']."</td>
                        <td>".$f['user_identificacion']."</td>
                        <td>".$f['user_nombre']."</td>
                        <td>".$tipo."</td>
                        <td>".$f['pe_fecha']."</td>
                        <td>".$f['pe_fecha_entrega']."</td>
                        <td>$".$f['pe_total']."</td>
                        <td>$".$f['pe_abono']."</td>
                        <td>".$select."</td>
                        <td><a href='ped_especifico.php?ped_id=".$f['ped_id']."' class='btn btn-info'>Ver</a></td>
                </tr>
            ";
        }
    }
}

function mostrarPedidoOpt(){
    $obj = new Pedido();
    $resultado = $obj -> consultarPedido();
    if ($resultado) {
       foreach ($resultado as $f) {
            echo 
            "
                <option value='".$f['ped_id']."'>
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



function mostrarPedidoIdInvetario($id){
    $obj = new Pedido();
    $pedido = $obj -> consultarPedidoId(0,$id);
    return $pedido;
}