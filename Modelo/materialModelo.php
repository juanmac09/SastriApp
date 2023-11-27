<?php

class Material
{
    // Creamos el metodo para registrar material
    public function registrarMaterial($datos)
    {
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion->prepare("CALL registrarMaterial(?,?,?,?)");
        // Convertimos argumentos a parametros
        $result->bindParam(1, $datos['nom']);
        $result->bindParam(2, $datos['desc']);
        $result->bindParam(3, $datos['TipCan']);
        $result->bindParam(4, $datos['cant']);
        // Ejecutamos el codigo Sql
        $result->execute();
        
    }
    // Creamos el metodo de consultar material
    public function consultarMaterial($id = 0)
    {
        // Creamos la variable para guardar el resultado
        $f = null;
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        // Si id es igual a 0 consultamos todos las materias primas
        if ($id == 0) {
            $query = "SELECT * FROM materia_prima";

            $result = $conexion->prepare($query);
            $result->execute();

            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }

            return $f;
        }
        // Sino consultamos una materia prima en especificos
        else {

            $query = "SELECT * FROM materia_prima WHERE mat_id = :id";

            $result = $conexion->prepare($query);
            $result->bindParam("id", $id);
            $result->execute();


            $f = $result->fetch();
            return $f;
        }
    }
    // Creamos un metodo para actualizar material
    public function actualizarMaterial($datos)
    {
        // Creamos un objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion->prepare("CALL actualizarMaterial(?,?,?,?,?)");
        $result->bindParam(1, $datos['id']);
        $result->bindParam(2, $datos['nom']);
        $result->bindParam(3, $datos['desc']);
        $result->bindParam(4, $datos['TipCan']);
        $result->bindParam(5, $datos['cant']);
        // Ejecutasmos el codigo Sql
        $result->execute();
        // Mostramos mensaje de exito
        echo "<script>location.href='../Vista/administrador/Html/consultarMaterias.php'</script>";
    }
    // Creamos un metodo para actualizar la cantidad del material
    public function actualizarMaterialCantidad($id, $cant)
    {
        // Creamos un objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion->prepare("CALL actualizarMaterialCantidad(?,?)");
        // Convertimos argumentos a parametros
        $result->bindParam(1, $id);
        $result->bindParam(2, $cant);
        // Ejecutamos el codigo Sql
        $result->execute();
    }
    // Creamos un metodo para consultar la descripcion del material
    public function consultarMaterialDescripcion($descripcion)
    {
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos un objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        // Guardamos el codigo Sql
        $query = "SELECT * FROM materia_prima WHERE ma_descripcion = :descr";
        // Preparamos el codigo sql
        $result = $conexion->prepare($query);
        // Convertimos argumentos a parametros
        $result->bindParam(":descr", $descripcion);
        // Ejecutamos el codigo Sql
        $result->execute();
        // Convertimos el resultado a vector
        $f = $result->fetch();

        // Retornamos el resultado
        return $f;
    }
}
