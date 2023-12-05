<?php
session_start();


require_once("../../../Modelo/seguridadAdministrador.php");
require_once("../../../Modelo/conexion.php");
require_once("../../../Modelo/materialModelo.php");
require_once("../../../Controlador/controladorMostrarMaterial.php");
require_once("../../../Modelo/consultas.php");
require_once("../../../Controlador/controladorMostrarProveedores.php");
require_once("../../../Modelo/pedidoModelo.php");
require_once("../../../Controlador/controladorMostrarPedido.php");
require_once("../../../Modelo/accesorioModelo.php");
require_once("../../../Controlador/controladorMostrarAccesorios.php");


if (isset($_SESSION["confirmarRegistro"])) {

  if ($_SESSION["confirmarRegistro"] == 1) {
    echo "
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          swal('".$_SESSION['mensaje']."', '', 'success');
        });
      </script>";
  }
  else if ($_SESSION["confirmarRegistro"] == 2) {
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        sweetAlert('Error', '".$_SESSION['mensaje']."', 'error');
      });
    </script>";
  
  }
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
  <link href="../css/formSimple.css " rel="stylesheet" type="text/css">
  <link href="../css/formSimplelittle-Inventario.css " rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/styleIconos.css">
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
  <title>Registro Inventario</title>
</head>

<body>

  <?php include("../nav.php"); ?>
  <div class="imagen-fondo">
    <img src="../img/inventario.jpg" alt="Imagen de fondo">
  </div>
  <form method="POST" action="../../../Controlador/controladorRegistrarInventario.php" enctype="multipart/form-data">
    <div class="contact_form">

      <div class="login-box inventario">
        <div class="logo-form-login"><img src="../img/logo satriapp blanco.png" alt=""></div>
        <h1>Registrar Inventario</h1>

        <div class="col-lg-6 col-md-4 container d-flex justify-content-center align-items-center">
          <div class="form-group">
            <select name="TipoRegistro" class="tipo select" id="TipoRegistro">
              <option value="">Seleccione Tipo</option>
              <option value="1">Material</option>
              <option value="2">Accesorios </option>
            </select>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <input type="date" name="fecha" required>
            <label class="read">Fecha</label>
          </div>
        </div>
        <div class="registroInventarioMaterial desaparecer" id="registroInventarioMaterial">
          <div class="col-lg-6 col-md-4 container d-flex justify-content-center align-items-center">
            <div class="form-group">
              <select name="TiInv" class="tipo select" id="tiInv">
                <option value="">Seleccione Tipo Inventario</option>
                <option value="1">Entrada</option>
                <option value="2">Salida </option>
              </select>
            </div>
          </div>




          <div class="materialDiv desaparecer">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <i class="bi bi-dash icono" id="restar"></i>
                  <i class="bi bi-plus icono" id="sumar"></i>
                </div>
              </div>
            </div>
            <div class="row ma " id="divOriginal">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="material1" list="opci" class="materialInput">
                  <datalist id="opci">
                    <?php mostrarMaterialOpt() ?>
                  </datalist>
                  <label>Materia Prima</label>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <select name="TipCan1" class="tipo select">
                    <option value="">Seleccione Unidad</option>
                    <option value="1">Metros</option>
                    <option value="2">Unidades</option>
                    <option value="3">Centímetros</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="cant1" class="materialInput">
                  <label>Cantidad</label>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="precioUni1" class="materialInput precioUnitario">
                  <label>Precio Unitario</label>
                </div>
              </div>

            </div>
          </div>
          <div class="materialSalida desaparecer">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <i class="bi bi-dash icono" id="restarSalida"></i>
                  <i class="bi bi-plus icono" id="sumarSalida"></i>
                </div>
              </div>
            </div>
            <div class="row salidaM" id="divOriginalSalida">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="materialSalida1" list="opci" class="materialSalidaInput">
                  <datalist id="opci">
                    <?php mostrarMaterialOpt() ?>
                  </datalist>
                  <label>Materia Prima</label>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <select name="TipCanSalida1" class="tipo select">
                    <option value="">Seleccione Unidad</option>
                    <option value="1">Metros</option>
                    <option value="2">Unidades</option>
                    <option value="3">Centímetros</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <input type="number" name="cantSalida1" class="materialSalidaInput">
                  <label>Cantidad</label>
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-12 col-md-12 proveedorDiv desaparecer">
            <div class="form-group">
              <input type="text" name="provee" list="provee" class="proveedorI">
              <datalist id="provee">
                <?php mostrarProveedoresOpt() ?>
              </datalist>
              <label>Proveedor</label>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 pedidoDiv desaparecer">
            <div class="form-group">
              <input type="text" name="pedido" list="pedido" class="pedidoInput">
              <datalist id="pedido">
                <?php mostrarPedidoOpt() ?>
              </datalist>
              <label>Número Pedido</label>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 desaparecer" id="precioDiv">
            <div class="form-group">
              <input type="number" name="precio" class="precioInput" id="precioTotal">
              <label class="read">Precio Total</label>
            </div>
          </div>

          <input type="hidden" id="contadorI" value="1" name="contador">
          <input type="hidden" id="contadorS" value="1" name="contadorSalida">
        </div>
        <div class="registroInventarioAccesorios desaparecer" id="registroInventarioAccesorios">
          <div class="extra">
            <div class="col-lg-6 col-md-4 container d-flex justify-content-center align-items-center">
              <div class="form-group">
                <select name="TiInvAcc" class="tipo select" id="tiInvAcc">
                  <option value="">Seleccione Tipo</option>
                  <option value="1">Entrada</option>
                  <option value="2">Salida</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <i class="bi bi-dash icono" id="restarAccesorio"></i>
                  <i class="bi bi-plus icono" id="sumarAccesorio"></i>
                </div>
              </div>
            </div>

            <div class="row acc" id="divOriginalAcc">
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="accesorio1" list="opcionAc" class="accesorioInput">
                  <datalist id="opcionAc">
                    <?php mostrarOptAccesorios() ?>
                  </datalist>
                  <label>Accesorio</label>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <input type="number" name="cantAcce1" class="accesorioInput">
                  <label>Cantidad</label>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 precioUnitarioAccesorioGrupo">
                <div class="form-group">
                  <input type="number" name="precioUniAce1" class="accesorioInput precioUnitarioAccesorio">
                  <label>Precio Unitario</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 " id="precioTotalAccesorio">
            <div class="form-group">
              <input type="number" name="precioTotalInventario" class="precioInput" id="precioTotalInventario" readonly>
              <label class="read">Precio Total</label>
            </div>
          </div>
          <input type="hidden" id="contadorA" value="1" name="contadorAccesorio">
        </div>
        <div class="col-lg-12 col-md-12 ">
          <div class="form-group">
            <input type="text" name="obser" id="observaciones">
            <label>Observaciones</label>
          </div>
        </div>
        <center> <button class="btn third" type="submit">Registrar</button></center>
      </div>
    </div>
  </form>
  <script src="../../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
  <script src="../../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../js/validacionSelect.js"></script>
  <script src="../js/inventario.js"></script>

  <?php

  if (isset($_SESSION["confirmarRegistro"])) {
    $_SESSION["confirmarRegistro"] = 0;
  }
  if (isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
  }
  ?>
</body>

</html>