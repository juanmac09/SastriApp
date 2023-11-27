<?php
// Creamos una clase medidas
class Medidas
{
  // Creamos un metodo registrar medidas
  public function registrarMedidas($id)
  {
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Preparamos el codigo Sql
    $result = $conexion->prepare("CALL registrarMedidas(?)");
    //  Convertimos argumentos a parametros
    $result->bindParam(1, $id);
    // Ejecutamos el codigo
    $result->execute();
    // Mostramos que fue exitoso
    // echo "<script>alert('El registro de Medidas fu Exitoso')</script>";
  }
  // Creamos un metodo registrar medidas de chaleco
  public function registrarMedidasChaleco($datos)
  {
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();

    // Preparamos el codigo Sql
    $result = $conexion->prepare("CALL registrarMedidasChaleco(?,?,?,?)");
    // Convertimos argumentos a parametros
    $result->bindParam(1, $datos['me_largo_chaleco']);
    $result->bindParam(2, $datos['me_espalda_chaleco']);
    $result->bindParam(3, $datos['me_hombro_chaleco']);
    $result->bindParam(4, $datos['me_pecho_chaleco']);
    // Ejecutamos el codigo
    $result->execute();
  }

  // Creamos un metodo de regitrar medidas chaqueta
  public function registrarMedidasChaqueta($datos)
  {
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();

    // Preparamos el codigo Sql
    $result = $conexion->prepare("CALL registrarMedidasChaqueta(?,?,?,?,?,?,?)");

    // Convertimos argumentos a parametros
    $result->bindParam(1, $datos['me_talle_chaqueta']);
    $result->bindParam(2, $datos['me_largo_chaqueta']);
    $result->bindParam(3, $datos['me_espalda_chaqueta']);
    $result->bindParam(4, $datos['me_hombro_chaqueta']);
    $result->bindParam(5, $datos['me_pecho_chaqueta']);
    $result->bindParam(6, $datos['me_cintura_chaqueta']);
    $result->bindParam(7, $datos['me_manga_chaqueta']);
    // Ejecutamos el codigo Sql
    $result->execute();
  }

  // Creamos metodo registrar medidas camisa
  public function registrarMedidasCamisa($datos)
  {
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();

    // Preparamos el cofigo Sql
    $result = $conexion->prepare("CALL registrarMedidasCamisa(?,?,?,?,?,?,?)");
    // Convertimos de argumentos a parametros
    $result->bindParam(1, $datos['me_cuello']);
    $result->bindParam(2, $datos['me_espalda_camisa']);
    $result->bindParam(3, $datos['me_manga_camisa']);
    $result->bindParam(4, $datos['me_largo_camisa']);
    $result->bindParam(5, $datos['me_pecho_camisa']);
    $result->bindParam(6, $datos['me_cintura_camisa']);
    $result->bindParam(7, $datos['me_cont_puño']);
    // Ejecutamos el codigo
    $result->execute();
  }

  // Creamos un metodo registrar medidas de pantalon 
  public function registrarMedidasPantalon($datos)
  {
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();

    // Preparamos el codigo Sql
    $result = $conexion->prepare("CALL registrarMedidasPantalon(?,?,?,?,?,?)");
    // Convertimos argumentos a parametros
    $result->bindParam(1, $datos['me_cintura_pantalon']);
    $result->bindParam(2, $datos['me_base_pantalon']);
    $result->bindParam(3, $datos['me_largo_pantalon']);
    $result->bindParam(4, $datos['me_rodilla_pantalon']);
    $result->bindParam(5, $datos['me_tiro_pantalon']);
    $result->bindParam(6, $datos['me_bota_pantalon']);
    // Ejecutamos el codigo
    $result->execute();
  }

  // Creamos el metodo consultar medidas de cliente
  public function consultarMedidasClientes($id)
  {
    // Creamos una variable f para guardar el resultado
    $f = null;
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Preparamos el codigo Sql
    $result = $conexion->prepare("CALL consultarMedidasClientes(?)");
    // Convertimos argumentos a parametros
    $result->bindParam(1, $id);
    // Ejecutamos el codigo Sql
    $result->execute();
    // Convertir el resultado a un vector
    $f = $result->fetch();
    // Retornamos f
    return $f;
  }

  // Creamos el metodo consultar medidas
  public function consultarMedidasExistencia($id, $tipo)
  {
    // Creamos una variable f para guardar el resultado
    $f = null;
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Preparamos el codigo Sql
    $result = $conexion->prepare("CALL consultarMedidasExistencia(?,?)");
    // Convertimos argumentos a parametros
    $result->bindParam(1, $id);
    $result->bindParam(2, $tipo);
    // Ejecutamos el codigo Sql
    $result->execute();
    // Convertir el resultado a un vector
    $f = $result->fetch();
    // Retornamos f
    return $f;
  }
  // Creamos el metodo actualizar medidas chaleco
  public function actualizarMedidasChaleco($datos)
  {
    // Creamos un objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Condicion si existe el registro de las medidas de chaleco
    // Si existe se actualiza y si no se registra
    if ($this->consultarMedidasExistencia($datos['id'], 1)) {
      // Preparamos el codigo Sql
      $result = $conexion->prepare("CALL actualizarMedidasChaleco(?,?,?,?,?)");
      // Convertimos argumentos a parametros
      $result->bindParam(1, $datos['id']);
      $result->bindParam(2, $datos['me_largo_chaleco']);
      $result->bindParam(3, $datos['me_espalda_chaleco']);
      $result->bindParam(4, $datos['me_hombro_chaleco']);
      $result->bindParam(5, $datos['me_pecho_chaleco']);
      // Ejecutamos el codigo Sql
      $result->execute();
    } else {
      $this->registrarMedidasChaleco($datos);
    }
  }
  // Se crea el metodo actualizar medidas chaqueta
  public function actualizarMedidasChaqueta($datos)
  {
    // Se crea el objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Condicion si existe el registro de las medidas de chaqueta
    // Si existe se actualiza y si no se registra
    if ($this->consultarMedidasExistencia($datos['id'], 2)) {
      // Preparamos el codigo Sql
      $result = $conexion->prepare("CALL  actualizarMedidasChaqueta(?,?,?,?,?,?,?,?)");
      // Convertimos argumentos a parametros
      $result->bindParam(1, $datos['id']);
      $result->bindParam(2, $datos['me_talle_chaqueta']);
      $result->bindParam(3, $datos['me_largo_chaqueta']);
      $result->bindParam(4, $datos['me_espalda_chaqueta']);
      $result->bindParam(5, $datos['me_hombro_chaqueta']);
      $result->bindParam(6, $datos['me_pecho_chaqueta']);
      $result->bindParam(7, $datos['me_cintura_chaqueta']);
      $result->bindParam(8, $datos['me_manga_chaqueta']);
      // Ejecutamos el codigo Sql
      $result->execute();
    } else {
      $this->registrarMedidasChaqueta($datos);
    }
  }

  // Se crea el metodo actualizar Camisa
  public function actualizarMedidasCamisa($datos)
  {
    // Se crea el objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Condicion si existe el registro de las medidas de camisa
    // Si existe se actualiza y si no se registra
    if ($this->consultarMedidasExistencia($datos['id'], 3)) {
      // Preparamos el codigo Sql
      $result = $conexion->prepare("CALL actualizarMedidasCamisa(?,?,?,?,?,?,?,?)");
      // Convertimos argumentos a parametros
      $result->bindParam(1, $datos['id']);
      $result->bindParam(2, $datos['me_cuello']);
      $result->bindParam(3, $datos['me_espalda_camisa']);
      $result->bindParam(4, $datos['me_manga_camisa']);
      $result->bindParam(5, $datos['me_largo_camisa']);
      $result->bindParam(6, $datos['me_pecho_camisa']);
      $result->bindParam(7, $datos['me_cintura_camisa']);
      $result->bindParam(8, $datos['me_cont_puño']);
      // Ejecutamos el codigo Sql
      $result->execute();
    } else {
      $this->registrarMedidasCamisa($datos);
    }
  }
  // Se crea el metodo actualizar medidas Pantalon
  public function actualizarMedidasPantalon($datos)
  {
    // Se crea el objeto conexion
    $obj = new Conexion();
    $conexion = $obj->get_conexion();
    // Condicion si existe el registro de las medidas de pantalon
    // Si existe se actualiza y si no se registra
    if ($this->consultarMedidasExistencia($datos['id'], 4)) {
      // Preparamos el codigo Sql
      $result = $conexion->prepare("CALL actualizarMedidasPantalon(?,?,?,?,?,?,?)");
      // Convertimos argumentos a parametros
      $result->bindParam(1, $datos['id']);
      $result->bindParam(2, $datos['me_cintura_pantalon']);
      $result->bindParam(3, $datos['me_base_pantalon']);
      $result->bindParam(4, $datos['me_largo_pantalon']);
      $result->bindParam(5, $datos['me_rodilla_pantalon']);
      $result->bindParam(6, $datos['me_tiro_pantalon']);
      $result->bindParam(7, $datos['me_bota_pantalon']);
      // Ejecutamos el codigo Sql
      $result->execute();
    } else {
      $this->registrarMedidasPantalon($datos);
    }
  }
}
