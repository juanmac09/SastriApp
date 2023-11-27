<?php
// Cramos una clase Accesorio
class Accesorio
{

    // Creamos un metodo para registrar un accesorio
    public function registrarAccesorio($datos)
    {
        // Creamos la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        // Preparamso el codigo Sql
        $result = $conexion->prepare('CALL registrarAccesorio(?,?,?)');
        // Convertimos argumentos a parametros
        $result->bindParam(1, $datos['nomAce']);
        $result->bindParam(2, $datos['descAce']);
        $result->bindParam(3, $datos['cantAce']);
        // Ejecutamos el codigo Sql
        $result->execute();
        
    }

    // Creamos un método para consultar los accesorios
    public function consultarAccesorios()
    {
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj->get_conexion();

        // Guardamos el codigo sql en una variable
        $query = "SELECT * FROM accesorios;";

        // Preparamos el codigo Sql
        $result = $conexion->prepare($query);
        // Ejecutamos el codigo Sql
        $result->execute();

        // Convertimos el resultado en un arreglo
        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        // Retornamos el resultado
        return $f;
    }

    // Creamos un metodo para actualizar accesorio
    public function actualizarAccesorio($datos)
    {
        // Creamos la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj->get_conexion();

        $result = $conexion->prepare("CALL actualizarAccesorio(?,?,?,?)");
        // Convertimos argumentos a parametros
        $result->bindParam(1, $datos['acc_id']);
        $result->bindParam(2, $datos['nomAce']);
        $result->bindParam(3, $datos['descAce']);
        $result->bindParam(4, $datos['cantAce']);

        // Ejecutamos el codigo Sql
        $result->execute();
        
    }

    // Creamos un metodo para consultar un accesorio especifico
    public function consultarAccesorioEspecifico($id)
    {
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj->get_conexion();
        //Guardamos el codigo SQl en una variable    
        $query = "SELECT  * FROM accesorios WHERE acc_id = :id;";
        //    Preparamos el codigo Sql
        $result = $conexion->prepare($query);
        $result->bindParam(":id", $id);
        $result->execute();

        //    Guardamos el resultado en la variable $f
        $f = $result->fetch();
        // Retornamos el resultado
        return $f;
    }
}
