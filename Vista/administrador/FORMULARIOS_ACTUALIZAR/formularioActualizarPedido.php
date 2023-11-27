<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");
require_once('../../../Modelo/conexion.php');
require_once('../../../Modelo/consultas.php');
require_once('../../../Controlador/controladorMostrarCliente.php');

$chekedCamisa = "";
$chekedChaleco = "";
$chekedChaqueta = "";
$chekedPantalon = "";
$contCamisa = "";
$contChaleco = "";
$contChaqueta = "";
$contPantalon = "";
$selectPedido  = null;
$selectsCamisa = null;
$selectChaqueta = null;
$selectPantalon = null;
if ($_GET['tipoPedido'] == "Pedido") {
  $selectPedido = 
  '
  <select name="tipoPedido" id="tipoPedido" class="select tipoPedido selectTipoPedido">
    <option value="">Seleccione Tipo Pedido</option>
    <option value="0" selected >Pedido</option>
    <option value="1">Arreglo</option>
  </select>
  ';
}
else{
  $selectPedido = '
  <select name="tipoPedido" id="tipoPedido" class="select tipoPedido selectTipoPedido">
    <option value="">Seleccione Tipo Pedido</option>
    <option value="0">Pedido</option>
    <option value="1" selected >Arreglo</option>
  </select>';
}
if ($_GET['confirmadorCamisa']) {
  $chekedCamisa =
    '
  <div class="col-lg-3 col-md-4">
    <div class="form-group">
      <input type="checkbox" name="camisa" id="camisa" checked disabled>
      <label>Camisa</label>
    </div>
  </div>
  ';
  switch ($_GET['cam_cuello']) {
    case 1:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1" selected>Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 2:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2" selected >Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 3:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3" selected >Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 4:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4" selected >Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 5:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5" selected >Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 6:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6" selected >Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 7:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7" selected >Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 8:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8" selected >Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
    case 9:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9" selected >Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      $cuello = "Dior";
      break;
    case 10:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10" selected >Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      $cuello = "Pajarito";
      break;
    case 11:
      $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11" selected >Nerú</option>
        </select>';
      $cuello = "Nerú";
      break;
    default:
    $selectsCamisa['tipoCuello'] = '
        <select name="cuello" id="cuello" class="select selectCamisa">
          <option value="">Tipo de Cuello</option>
          <option value="1">Valentino</option>
          <option value="2">Pegaso</option>
          <option value="3">Frances</option>
          <option value="4">Spencer</option>
          <option value="5">Lucas</option>
          <option value="6">Inghirami</option>
          <option value="7">Botón Down</option>
          <option value="8">Merizalde</option>
          <option value="9">Dior</option>
          <option value="10">Pajarito</option>
          <option value="11">Nerú</option>
        </select>';
      break;
  }

  switch ($_GET['cam_despunte']) {
    case 1:
        $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1" selected >1/6</option>
            <option value="2">1/8</option>
            <option value="3">1/4</option>
            <option value="4">3/6</option>
            <option value="5">3/8</option>
            <option value="6">Dobles</option>
          </select>
        ';
        break;
    case 2:
        $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1">1/6</option>
            <option value="2" selected >1/8</option>
            <option value="3">1/4</option>
            <option value="4">3/6</option>
            <option value="5">3/8</option>
            <option value="6">Dobles</option>
          </select>
        ';
        
        break;
    case 3:
        $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1">1/6</option>
            <option value="2">1/8</option>
            <option value="3" selected >1/4</option>
            <option value="4">3/6</option>
            <option value="5">3/8</option>
            <option value="6">Dobles</option>
          </select>
        ';
        
        break;
    case 4:
        $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1">1/6</option>
            <option value="2">1/8</option>
            <option value="3">1/4</option>
            <option value="4" selected >3/6</option>
            <option value="5">3/8</option>
            <option value="6">Dobles</option>
          </select>
        ';
        
        break;
    case 5:
        $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1">1/6</option>
            <option value="2">1/8</option>
            <option value="3">1/4</option>
            <option value="4">3/6</option>
            <option value="5" selected >3/8</option>
            <option value="6">Dobles</option>
          </select>
        ';
        
        break;
    case 6:
        $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1">1/6</option>
            <option value="2">1/8</option>
            <option value="3">1/4</option>
            <option value="4">3/6</option>
            <option value="5">3/8</option>
            <option value="6" selected >Dobles</option>
          </select>
        ';
        
        break;
    default:
      $selectsCamisa['despunte'] = 
        '
          <select name="despunte" id="despunte" class="select selectCamisa">
            <option value="">Tipo Despunte</option>
            <option value="1">1/6</option>
            <option value="2">1/8</option>
            <option value="3">1/4</option>
            <option value="4">3/6</option>
            <option value="5">3/8</option>
            <option value="6">Dobles</option>
          </select>
        ';  
  }

  switch ($_GET['cam_puno']) {
    case 1:
        $selectsCamisa['tipoPuno'] = 
        '
          <select name="puno" id="puno" class="select selectCamisa">
            <option value="">Tipo Puño</option>
            <option value="1" selected >Mancorna</option>
            <option value="2">Sencillo</option>
            <option value="3">Manga Corta</option>
          </select>
        ';
        break;
    case 2:
        $selectsCamisa['tipoPuno'] = 
        '
          <select name="puno" id="puno" class="select selectCamisa">
            <option value="">Tipo Puño</option>
            <option value="1">Mancorna</option>
            <option value="2" selected >Sencillo</option>
            <option value="3">Manga Corta</option>
          </select>
        ';
        break;
    case 3:
        $selectsCamisa['tipoPuno'] = 
          '
            <select name="puno" id="puno" class="select selectCamisa">
              <option value="">Tipo Puño</option>
              <option value="1">Mancorna</option>
              <option value="2">Sencillo</option>
              <option value="3" selected >Manga Corta</option>
            </select>
          ';
        break;
    
    default:
          $selectsCamisa['tipoPuno'] = 
          '
            <select name="puno" id="puno" class="select selectCamisa">
              <option value="">Tipo Puño</option>
              <option value="1">Mancorna</option>
              <option value="2">Sencillo</option>
              <option value="3">Manga Corta</option>
            </select>
          ';
        break;
  }
  switch ($_GET['cam_bolsillo']) {
    case 1:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1" selected >Cuadrado</option>
          <option value="2">Italiano</option>
          <option value="3">Con fuelle</option>
          <option value="4">Con Tapa</option>
          <option value="5">Con botón</option>
          <option value="6">No tiene</option>
        </select>
        ';
    
        break;
    case 2:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1">Cuadrado</option>
          <option value="2" selected >Italiano</option>
          <option value="3">Con fuelle</option>
          <option value="4">Con Tapa</option>
          <option value="5">Con botón</option>
          <option value="6">No tiene</option>
        </select>
        ';
        break;
    case 3:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1">Cuadrado</option>
          <option value="2">Italiano</option>
          <option value="3" selected >Con fuelle</option>
          <option value="4">Con Tapa</option>
          <option value="5">Con botón</option>
          <option value="6">No tiene</option>
        </select>
        ';
        break;
    case 4:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1">Cuadrado</option>
          <option value="2">Italiano</option>
          <option value="3">Con fuelle</option>
          <option value="4" selected >Con Tapa</option>
          <option value="5">Con botón</option>
          <option value="6">No tiene</option>
        </select>
        ';
        break;
    case 5:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1">Cuadrado</option>
          <option value="2">Italiano</option>
          <option value="3">Con fuelle</option>
          <option value="4">Con Tapa</option>
          <option value="5" selected >Con botón</option>
          <option value="6">No tiene</option>
        </select>
        ';
        break;
    case 6:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1">Cuadrado</option>
          <option value="2">Italiano</option>
          <option value="3">Con fuelle</option>
          <option value="4">Con Tapa</option>
          <option value="5">Con botón</option>
          <option value="6" selected >No tiene</option>
        </select>
        ';
        break;
    
    default:
        $selectsCamisa['bolsillo'] = 
        '
        <select name="bolsillo" id="bolsillo" class="select selectCamisa">
          <option value="">Tipo Bolsillo</option>
          <option value="1">Cuadrado</option>
          <option value="2">Italiano</option>
          <option value="3">Con fuelle</option>
          <option value="4">Con Tapa</option>
          <option value="5">Con botón</option>
          <option value="6">No tiene</option>
        </select>
        ';
        break;
  }

  $contCamisa = '
  <div class="campoCamisa" id="campoCamisa">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
          '.$selectsCamisa['tipoCuello'].'
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
        '.$selectsCamisa['despunte'].'
        </div>
      </div>

      <div class="col-lg-6 col-md-12">
        <div class="form-group">
        '.$selectsCamisa['tipoPuno'].'
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
        '.$selectsCamisa['bolsillo'].'
        </div>
      </div>
      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <input type="text" name="obsCamisa" class="campoCamisaInput" required value="'.$_GET['ped_caobservaciones'].'">
          <label>Observaciones de Camisa</label>
        </div>
      </div>
    </div>
  </div>
  
  
  ';
}

if ($_GET['confirmadorChaleco']) {
  $chekedChaleco =
    '
    <div class="col-lg-3 col-md-4">
      <div class="form-group">
        <input type="checkbox" name="chaleco" id="chaleco" checked disabled>
        <label>Chaleco</label>
      </div>
    </div>';


  $contChaleco = '
  <div class="camposChaleco" id="camposChaleco">
    <div class="col-lg-12 col-md-12">
      <div class="form-group">
        <input type="text" name="obsChaleco" class="campoChalecoInput" required value="'.$_GET['ped_chaobservaciones'].'">
        <label>Observaciones de Chaleco</label>
      </div>
    </div>
  </div>
  
  ';
}
if ($_GET['confirmadorChaqueta']) {

  switch ($_GET['ped_tipo_abertura']) {
    case 0:
        $selectChaqueta = 
        '
          <select name="tipoAbertura" id="tipoAbertura" class="select selectChaqueta">
            <option value="">Seleccion Tipo Abertura</option>
            <option value="0" selected >Si</option>
            <option value="1">No</option>
          </select>
        ';
        break;
    case 1:
        $selectChaqueta = 
        '
          <select name="tipoAbertura" id="tipoAbertura" class="select selectChaqueta">
            <option value="">Seleccion Tipo Abertura</option>
            <option value="0">Si</option>
            <option value="1" selected >No</option>
          </select>
        ';
        break;
    default:    
        $selectChaqueta = 
        '
          <select name="tipoAbertura" id="tipoAbertura" class="select selectChaqueta">
            <option value="">Seleccion Tipo Abertura</option>
            <option value="0">Si</option>
            <option value="1">No</option>
          </select>
        ';
        break;
  }


  $chekedChaqueta =
    '
  <div class="col-lg-3 col-md-4"> 
    <div class="form-group">
      <input type="checkbox" name="saco" id="saco" checked disabled>
      <label>Chaqueta</label>
    </div>
  </div>';


  $contChaqueta = '
  <div class="camposSaco" id="camposSaco">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
          <input type="number" name="cantAberturas" class="campoSacoInput" required value="'.$_GET['ped_aberturas'].'">
          <label>Aberturas Chaqueta</label>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
          '.$selectChaqueta.'
        </div>
      </div>
      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <input type="text" name="obsSaco" class="campoSacoInput" required value="'.$_GET['ped_cobservaciones'].'">
          <label>Observaciones de Chaqueta</label>
        </div>
      </div>
    </div>
  </div>
  
  ';
}
if ($_GET['confirmadorPantalon']) {
  $chekedPantalon =
    '
    <div class="col-lg-3 col-md-4">
      <div class="form-group">
        <input type="checkbox" name="pantalon" id="pantalon" checked disabled>
        <label>Pantalón</label>
      </div>
    </div>
  ';
  switch ($_GET['ped_bolsillo_reloj']) {
    case 0:
        $selectPantalon = '
          <select name="bolsilloReloj" id="bolsilloReloj" class="select selectPantalon">
            <option value="">Bolsillo Reloj</option>
            <option value="0" selected >Si</option>
            <option value="1">No</option>
          </select>
        ';
        break;
    case 1:
        $selectPantalon = '
          <select name="bolsilloReloj" id="bolsilloReloj" class="select selectPantalon">
            <option value="">Bolsillo Reloj</option>
            <option value="0">Si</option>
            <option value="1" selected >No</option>
          </select>
        ';
        break;
    default:    
        $selectPantalon = '
          <select name="bolsilloReloj" id="bolsilloReloj" class="select selectPantalon">
            <option value="">Bolsillo Reloj</option>
            <option value="0">Si</option>
            <option value="1">No</option>
          </select>
        ';
        break;
  }
  $contPantalon = '
  <div class="camposPantalon" id="camposPantalon">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
          <input type="text" name="bota" class="campoPantalonInput" required value="'.$_GET['ped_bota'].'" >
          <label>Bota Pantalón</label>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="form-group">
          '.$selectPantalon.'
        </div>
      </div>
      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <input type="text" name="obsPantalon" class="campoPantalonInput" required value="'.$_GET['ped_pobservaciones'].'" >
          <label>Observaciones de Pantalón</label>
        </div>
      </div>
    </div>
  </div>
  
  
  
  ';
}






?>

<html lang="es">

<head>
  <link rel="shortcut icon" href="../img/Logo mini.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="../css/formGrande.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar Pedido</title>
  <link rel="stylesheet" href="../css/validar.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ================= Favicon ================== -->
  <!-- Standard -->
  <link rel="shortcut icon" href="img/logo satriapp blanco.png">
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
  <!-- Styles -->
  <link href="../../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/themify-icons.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
  <link href="../../dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
  <link href="../../dashboard/css/lib/weather-icons.css" rel="stylesheet" />
  <link href="../../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/helper.css" rel="stylesheet">
  <link href="../../dashboard/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
  <script src="../../js/jquery-3.6.0.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../fullcalendar/lib/main.min.js"></script>
  <link rel="stylesheet" href="../css/navStyle.css">
  <link rel="stylesheet" href="../css/formNav.css">
  <link rel="stylesheet" media="all" href="../css/boton.css" />

</head>



<body>

  <form method="POST" action="../../../Controlador/controladorActualizarPedido.php?ped_id=<?php echo $_GET['ped_id'] ?>&confirmadorCamisa=<?php echo $_GET['confirmadorCamisa'] ?>&confirmadorChaleco=<?php echo $_GET['confirmadorChaleco'] ?>&confirmadorChaqueta=<?php echo $_GET['confirmadorChaqueta'] ?>&confirmadorPantalon=<?php echo $_GET['confirmadorPantalon'] ?>&obsGen=<?php echo $_GET['obs'] ?>" >
    <div class="contact_form">
      <div class="imagen-fondo">
        <img src="../img/pedido.jpg" alt="Imagen de fondo">
      </div>
      <a href="../Html/ped_especifico.php?ped_id=<?php echo $_GET['ped_id'] ?>" class="cta"><span>Atrás</span></a>
      <div class="login-box login-box-update" id="login">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>

        <h1>Actualizar Pedido</h1>

        <div class="row docTipo">
          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <input type="number" name="id" id="op" list="opciones" required readonly value="<?php echo $_GET['user_identificacion'] ?>">
              <datalist id="opciones">
                <?php mostrarClienteOpt() ?>
              </datalist>
              <label class="read">Cliente Identificación</label>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mx-auto">
            <div class="form-group">
              <?php echo $selectPedido;?>
            </div>
          </div>
        </div>
        <div class="row">
          <?php
          echo $chekedCamisa;
          echo $chekedChaleco;
          echo $chekedChaqueta;
          echo $chekedPantalon;
          ?>
        </div>
        <?php
        echo $contChaqueta;
        echo $contChaleco;
        echo $contCamisa;
        echo $contPantalon;
        ?>


        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="form-group">
              <input type="number" name="total" required value="<?php echo $_GET['pe_total'] ?>">
              <label>Total</label>
            </div>
          </div>


          <div class="col-lg-4 col-md-12">
            <div class="form-group">
              <input type="number" name="abono" required value="<?php echo $_GET['abono'] ?>">
              <label>Abono</label>
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <div class="form-group">
              <input type="date" name="fechaEntrega" required value="<?php echo $_GET['Entrega'] ?>">
              <label class="read">Fecha Entrega</label>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <input type="text" name="comp" value="<?php echo $_GET['obs'] ?>">
            <label>Complemento</label>
          </div>
        </div>
        <center> <button class="btn third" type="submit">Actualizar</button></center>
      </div>
    </div>
  </form>

  <script src="../js/validacionPedidoActualizar.js"></script>
  <script src="../js/validacionSelect.js"></script>
  <script src="../js/validacionSelectVacioPedido.js"></script>
</body>

</html>