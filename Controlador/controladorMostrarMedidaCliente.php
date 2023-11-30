<?php
function mostrarMedidasChaleco($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    echo '
          <h3>Medidas Para Chaleco</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_largo_chaleco" class="camposMedidasChaleco camposDecimales" value="' . $resultado['me_largo_chaleco'] . '" >
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_espalda_chaleco" class="camposMedidasChaleco camposDecimales" value="' . $resultado['me_espalda_chaleco'] . '">
                <label>Espalda</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_hombro_chaleco" class="camposMedidasChaleco camposDecimales" value="' . $resultado['me_hombro_chaleco'] . '">
                <label>Hombro</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_pecho_chaleco" class="camposMedidasChaleco camposDecimales" value="' . $resultado['me_pecho_chaleco'] . '">
                <label>Pecho</label>
              </div>
            </div>
          </div>
    ';
  } else {
    echo '
          <h3>Medidas Para Chaleco</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_largo_chaleco" class="camposMedidasChaleco camposDecimales">
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_espalda_chaleco" class="camposMedidasChaleco camposDecimales">
                <label>Espalda</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_hombro_chaleco" class="camposMedidasChaleco camposDecimales">
                <label>Hombro</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_pecho_chaleco" class="camposMedidasChaleco camposDecimales">
                <label>Pecho</label>
              </div>
            </div>
          </div>
          ';
  }
}


function mostrarMedidasChaqueta($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    echo '
        <h3>Medidas Para Chaqueta</h3>
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_talle_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_talle_chaqueta'] . '">
              <label>Talle</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_largo_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_largo_chaqueta'] . '">
              <label>Largo</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_espalda_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_espalda_chaqueta'] . '">
              <label>Espalda</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_hombro_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_hombro_chaqueta'] . '">
              <label>Hombro</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_pecho_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_pecho_chaqueta'] . '">
              <label>Pecho</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_cintura_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_cintura_chaqueta'] . '">
              <label>Cintura</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_manga_chaqueta" class="camposMedidasChaqueta camposDecimales" value="' . $resultado['me_manga_chaqueta'] . '">
              <label>Manga</label>
            </div>
          </div>
        </div>
    
    
    ';
  } else {
    echo '
      <h3>Medidas Para Chaqueta</h3>
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_talle_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Talle</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_largo_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Largo</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_espalda_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Espalda</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_hombro_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Hombro</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_pecho_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Pecho</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_cintura_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Cintura</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_manga_chaqueta" class="camposMedidasChaqueta camposDecimales">
            <label>Manga</label>
          </div>
        </div>
      </div>
    
    
    ';
  }
}


function mostrarMedidasCamisa($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    echo '
          <h3>Medidas Para Camisa</h3>
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_cuello" class="camposMedidasCamisa camposDecimales" value="' . $resultado['me_cuello'] . '">
                <label>Cuello</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_espalda_camisa" class="camposMedidasCamisa camposDecimales" value="' . $resultado['me_espalda_camisa'] . '">
                <label>Espalda</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_manga_camisa" class="camposMedidasCamisa camposDecimales" value="' . $resultado['me_manga_camisa'] . '">
                <label>Manga</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_largo_camisa" class="camposMedidasCamisa camposDecimales" value="' . $resultado['me_largo_camisa'] . '">
                <label>Largo</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_pecho_camisa" class="camposMedidasCamisa camposDecimales" value="' . $resultado['me_pecho_camisa'] . '">
                <label>Pecho</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_cintura_camisa" class="camposMedidasCamisa camposDecimales" value="' . $resultado['me_cintura_camisa'] . '">
                <label>Cintura</label>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="form-group">
                <input type="text" name="me_cont_puño" class="camposMedidasCamisa" value="' . $resultado['me_cont_puño'] . '">
                <label>Corte Puño</label>
              </div>
            </div>
          </div>
    
    
    
      ';
  } else {
    echo '
      <h3>Medidas Para Camisa</h3>
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_cuello" class="camposMedidasCamisa camposDecimales">
            <label>Cuello</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_espalda_camisa" class="camposMedidasCamisa camposDecimales">
            <label>Espalda</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_manga_camisa" class="camposMedidasCamisa camposDecimales">
            <label>Manga</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_largo_camisa" class="camposMedidasCamisa camposDecimales">
            <label>Largo</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_pecho_camisa" class="camposMedidasCamisa camposDecimales">
            <label>Pecho</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_cintura_camisa" class="camposMedidasCamisa camposDecimales">
            <label>Cintura</label>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="form-group">
            <input type="text" name="me_cont_puño" class="camposMedidasCamisa">
            <label>Corte Puño</label>
          </div>
        </div>
      </div>
      ';
  }
}


function mostrarMedidasPantalon($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    echo '
        <h3>Medidas Para Pantalón</h3>
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_cintura_pantalon" class="camposMedidasPantalon camposDecimales" value="' . $resultado['me_cintura_pantalon'] . '">
              <label>Cintura</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_base_pantalon" class="camposMedidasPantalon camposDecimales" value="' . $resultado['me_base_pantalon'] . '">
              <label>Base</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_largo_pantalon" class="camposMedidasPantalon camposDecimales" value="' . $resultado['me_largo_pantalon'] . '">
              <label>Largo</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_rodilla_pantalon" class="camposMedidasPantalon camposDecimales" value="' . $resultado['me_rodilla_pantalon'] . '">
              <label>Rodilla</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_tiro_pantalon" class="camposMedidasPantalon camposDecimales" value="' . $resultado['me_tiro_pantalon'] . '">
              <label>Tiro</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_bota_pantalon" class="camposMedidasPantalon camposDecimales" value="' . $resultado['me_bota_pantalon'] . '">
              <label>Bota</label>
            </div>
          </div>
        </div>
    
    ';
  } else {
    echo '
        <h3>Medidas Para Pantalón</h3>
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_cintura_pantalon" class="camposMedidasPantalon camposDecimales">
              <label>Cintura</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_base_pantalon" class="camposMedidasPantalon camposDecimales">
              <label>Base</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_largo_pantalon" class="camposMedidasPantalon camposDecimales">
              <label>Largo</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_rodilla_pantalon" class="camposMedidasPantalon camposDecimales">
              <label>Rodilla</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_tiro_pantalon" class="camposMedidasPantalon camposDecimales">
              <label>Tiro</label>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="form-group">
              <input type="text" name="me_bota_pantalon" class="camposMedidasPantalon camposDecimales">
              <label>Bota</label>
            </div>
          </div>
        </div>
    
    
    ';
  }
}

function mostrarMedidasChalecoConsultar($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    echo '
    <tr>
    <th>Largo</th>
    <td><span contenteditable="true" class="medidaChaleco">' . $resultado['me_largo_chaleco'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Espalda</th>
        <td><span contenteditable="true" class="medidaChaleco">' . $resultado['me_espalda_chaleco'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Hombro</th>
        <td><span contenteditable="true" class="medidaChaleco">' . $resultado['me_hombro_chaleco'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Pecho</th>
        <td><span contenteditable="true" class="medidaChaleco">' . $resultado['me_pecho_chaleco'] . '</span> Cm</td>
    </tr>
    ';
  } else {
    echo '
    <tr>
    <th>Largo</th>
    <td><span contenteditable="true" class="medidaChaleco"></span> Cm</td>
    </tr>
    <tr>
        <th>Espalda</th>
        <td><span contenteditable="true" class="medidaChaleco"></span> Cm</td>
    </tr>
    <tr>
        <th>Hombro</th>
        <td><span contenteditable="true" class="medidaChaleco"></span> Cm</td>
    </tr>
    <tr>
        <th>Pecho</th>
        <td><span contenteditable="true" class="medidaChaleco"></span> Cm</td>
    </tr>
    ';
  }
}
function mostrarMedidasChaquetaConsulta($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    echo
    '
    <tr>
    <th>Talle</th>
    <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_talle_chaqueta'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Largo</th>
        <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_largo_chaqueta'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Espalda</th>
        <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_espalda_chaqueta'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Hombro</th>
        <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_hombro_chaqueta'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Pecho</th>
        <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_pecho_chaqueta'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Cintura</th>
        <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_cintura_chaqueta'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Manga</th>
        <td><span contenteditable="true" class="medidaChaqueta">' . $resultado['me_manga_chaqueta'] . '</span> Cm</td>
    </tr>
';
  } else {
    echo
    '
    <tr>
    <th>Talle</th>
    <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
    <tr>
        <th>Largo</th>
        <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
    <tr>
        <th>Espalda</th>
        <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
    <tr>
        <th>Hombro</th>
        <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
    <tr>
        <th>Pecho</th>
        <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
    <tr>
        <th>Cintura</th>
        <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
    <tr>
        <th>Manga</th>
        <td><span contenteditable="true" class="medidaChaqueta"></span> Cm</td>
    </tr>
';
  }
}
function mostrarMedidasCamisaConsulta($id)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);
  if ($resultado) {
    echo '
    <tr>
    <th>Cuello</th>
    <td><span contenteditable="true" class="medidaCamisa">' . $resultado['me_cuello'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Espalda</th>
        <td><span contenteditable="true" class="medidaCamisa">' . $resultado['me_espalda_camisa'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Manga</th>
        <td><span contenteditable="true" class="medidaCamisa">' . $resultado['me_manga_camisa'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Largo</th>
        <td><span contenteditable="true" class="medidaCamisa">' . $resultado['me_largo_camisa'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Pecho</th>
        <td><span contenteditable="true" class="medidaCamisa">' . $resultado['me_pecho_camisa'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Cintura</th>
        <td><span contenteditable="true" class="medidaCamisa">' . $resultado['me_cintura_camisa'] . '</span> Cm</td>
    </tr>
    <tr>
        <th>Corte Puño</th>
        <td><span contenteditable="true" class="medidaCamisa exceptuar">' . $resultado['me_cont_puño'] . '</span></td>
    </tr>';
  } else {
    echo '
    <tr>
    <th>Cuello</th>
    <td><span contenteditable="true" class="medidaCamisa"></span> Cm</td>
    </tr>
    <tr>
        <th>Espalda</th>
        <td><span contenteditable="true" class="medidaCamisa"></span> Cm</td>
    </tr>
    <tr>
        <th>Manga</th>
        <td><span contenteditable="true" class="medidaCamisa"></span> Cm</td>
    </tr>
    <tr>
        <th>Largo</th>
        <td><span contenteditable="true" class="medidaCamisa"></span> Cm</td>
    </tr>
    <tr>
        <th>Pecho</th>
        <td><span contenteditable="true" class="medidaCamisa"></span> Cm</td>
    </tr>
    <tr>
        <th>Cintura</th>
        <td><span contenteditable="true" class="medidaCamisa"></span> Cm</td>
    </tr>
    <tr>
        <th>Corte Puño</th>
        <td><span contenteditable="true" class="medidaCamisa"></span></td>
    </tr>';
  }
}

function mostrarMedidasPantalonConsultar($id)
{

  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    if ($_SESSION['rol'] == 1) {
      echo '
        <tr>
          <th>Cintura</th>
          <td><span contenteditable="true" class="medidaPantalon">' . $resultado['me_cintura_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Base</th>
            <td><span contenteditable="true" class="medidaPantalon">' . $resultado['me_base_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Largo</th>
            <td><span contenteditable="true" class="medidaPantalon">' . $resultado['me_largo_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Rodilla</th>
            <td><span contenteditable="true" class="medidaPantalon">' . $resultado['me_rodilla_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Tiro</th>
            <td><span contenteditable="true" class="medidaPantalon">' . $resultado['me_tiro_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Bota</th>
            <td><span contenteditable="true" class="medidaPantalon">' . $resultado['me_bota_pantalon'] . '</span> Cm</td>
        </tr>';
    }
    if ($_SESSION['rol'] == 5) {
      echo '
        <tr>
          <th>Cintura</th>
          <td><span class="medidaPantalon">' . $resultado['me_cintura_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Base</th>
            <td><span class="medidaPantalon">' . $resultado['me_base_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Largo</th>
            <td><span class="medidaPantalon">' . $resultado['me_largo_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Rodilla</th>
            <td><span class="medidaPantalon">' . $resultado['me_rodilla_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Tiro</th>
            <td><span class="medidaPantalon">' . $resultado['me_tiro_pantalon'] . '</span> Cm</td>
        </tr>
        <tr>
            <th>Bota</th>
            <td><span class="medidaPantalon">' . $resultado['me_bota_pantalon'] . '</span> Cm</td>
        </tr>';
    }
  } else {
    if ($_SESSION['rol'] == 1) {
      echo '
        <tr>
          <th>Cintura</th>
          <td><span contenteditable="true" class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Base</th>
            <td><span contenteditable="true" class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Largo</th>
            <td><span contenteditable="true" class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Rodilla</th>
            <td><span contenteditable="true" class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Tiro</th>
            <td><span contenteditable="true" class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Bota</th>
            <td><span contenteditable="true" class="medidaPantalon"></span> Cm</td>
        </tr>';
    }
    else if ($_SESSION['rol'] == 5) {
      echo '
        <tr>
          <th>Cintura</th>
          <td><span class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Base</th>
            <td><span class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Largo</th>
            <td><span class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Rodilla</th>
            <td><span class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Tiro</th>
            <td><span class="medidaPantalon"></span> Cm</td>
        </tr>
        <tr>
            <th>Bota</th>
            <td><span class="medidaPantalon"></span> Cm</td>
        </tr>';
    } 
  }
}


function mostrarMedidasGeneralesPedido($id, $infoPedido)
{
  $obj = new Medidas();
  $resultado = $obj->consultarMedidasClientes($id);

  if ($resultado) {
    $tablasMedidas = null;
    $claseCamisa = "";
    $claseChaleco = "";
    $claseChaqueta = "";
    $clasePantalon = "";
    if ($infoPedido['camisa'] == "") {
      $claseCamisa = "noUtilizada";
    }
    if ($infoPedido['chaleco'] == "") {
      $claseChaleco = "noUtilizada";
    }
    if ($infoPedido['chaqueta'] == "") {
      $claseChaqueta = "noUtilizada";
    }
    if ($infoPedido['pantalon'] == "") {
      $clasePantalon = "noUtilizada";
    }

    $tablasMedidas['camisa'] =
      '
      <div class="medidaCamisa ' . $claseCamisa . '">
        <table>
            <tr>
                <th colspan="7">Medidas Camisa</th>
                
            </tr>
            <tr>
                <td>Cuello</td>
                <td>' . $resultado['me_cuello'] . ' Cm</td>
            </tr>
            <tr>
                <td>Espalda</td>
                <td>' . $resultado['me_espalda_camisa'] . ' Cm</td>
            </tr>
            <tr>
                <td>Manga</td>
                <td>' . $resultado['me_manga_camisa'] . ' Cm</td>
            </tr>
            <tr>
                <td>Largo</td>
                <td>' . $resultado['me_largo_camisa'] . ' Cm</td>
            </tr>
            <tr>
                <td>Pecho</td>
                <td>' . $resultado['me_pecho_camisa'] . ' Cm</td>
            </tr>
            <tr>
                <td>Cintura</td>
                <td>' . $resultado['me_cintura_camisa'] . ' Cm</td>
            </tr>
            <tr>
                <td>Corte Puño</td>
                <td>' . $resultado['me_cont_puño'] . '</td>
            </tr>
            
        </table>
      </div>
      ';

    $tablasMedidas['chaleco'] =
      '
      <div class="medidasChaleco ' . $claseChaleco . '">
          <table>
              <tr>
                  <th colspan="7">Medidas Chaleco</th>
                  
              </tr>
              <tr>
                  <td>Largo</td>
                  <td>' . $resultado['me_largo_chaleco'] . ' Cm</td>
              </tr>
              <tr>
                  <td>Espalda</td>
                  <td>' . $resultado['me_espalda_chaleco'] . ' Cm</td>
              </tr>
              <tr>
                  <td>Hombro</td>
                  <td>' . $resultado['me_hombro_chaleco'] . ' Cm</td>
              </tr>
              <tr>
                  <td>Pecho</td>
                  <td>' . $resultado['me_pecho_chaleco'] . ' Cm</td>
              </tr>
          </table>
      </div>
    ';


    $tablasMedidas['chaqueta'] =
      '
    <div class="medidasChaqueta ' . $claseChaqueta . '">
        <table>
            <tr>
                <th colspan="7">Medidas Chaqueta</th>
                
            </tr>
            <tr>
                <td>Talle</td>
                <td>' . $resultado['me_talle_chaqueta'] . ' Cm</td>
            </tr>
            <tr>
                <td>Largo</td>
                <td>' . $resultado['me_largo_chaqueta'] . ' Cm</td>
            </tr>
            <tr>
                <td>Espalda</td>
                <td>' . $resultado['me_espalda_chaqueta'] . ' Cm</td>
            </tr>
            <tr>
                <td>Hombro</td>
                <td>' . $resultado['me_hombro_chaqueta'] . ' Cm</td>
            </tr>
            <tr>
                <td>Pecho</td>
                <td>' . $resultado['me_pecho_chaqueta'] . ' Cm</td>
            </tr>
            <tr>
                <td>Cintura</td>
                <td>' . $resultado['me_cintura_chaqueta'] . ' Cm</td>
            </tr>
            <tr>
                <td>Manga</td>
                <td>' . $resultado['me_manga_chaqueta'] . ' Cm</td>
            </tr>
        </table>
    </div>
    ';

    $tablasMedidas['pantalon'] =
      '
    <div class="medidasPantalon ' . $clasePantalon . '">
        <table class="tablamedidas">
            <tr>
                <th colspan="7">Medidas Pantalón</th>

            </tr>
            <tr>
                <td>Cintura</td>
                <td>' . $resultado['me_cintura_pantalon'] . ' Cm</td>
            </tr>
            <tr>
                <td>Base</td>
                <td>' . $resultado['me_base_pantalon'] . ' Cm</td>
            </tr>
            <tr>
                <td>Largo</td>
                <td>' . $resultado['me_largo_pantalon'] . ' Cm</td>
            </tr>
            <tr>
                <td>Rodilla</td>
                <td>' . $resultado['me_rodilla_pantalon'] . ' Cm</td>
            </tr>
            <tr>
                <td>Tiro</td>
                <td>' . $resultado['me_tiro_pantalon'] . ' Cm</td>
            </tr>
            <tr>
                <td>Bota</td>
                <td>' . $resultado['me_bota_pantalon'] . ' Cm</td>
            </tr>
        </table>
    </div>
    ';
    return $tablasMedidas;
  }
}
