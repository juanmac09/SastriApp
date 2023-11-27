<?php
class Inventario{

    public function registrarInventarioEntrada($datos){
            $obj = new Conexion();
            $conexion = $obj ->get_conexion();

            $result = $conexion -> prepare("CALL registrarInventarioEntrada(?,?,?,?)");
            $result -> bindParam(1,$datos['fecha']);
            $result -> bindParam(2,$datos['TiInv']);
            $result -> bindParam(3,$datos['provee']);
            $result -> bindParam(4,$datos['obser']);
            $result -> execute();
    }

    public function registrarMaterialInventario($datos){
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();

        $result = $conexion -> prepare("CALL registrarMaterialInventario(?,?,?,?)");
        $result -> bindParam(1,$datos['TipCan']);
        $result -> bindParam(2,$datos['cant']);
        $result -> bindParam(3,$datos['material']);
        $result -> bindParam(4,$datos['precioUni']);
        $result -> execute();
    }

    public function registrarInventarioSalida($datos){
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();

        $result = $conexion -> prepare("CALL registrarInventarioSalida(?,?,?,?)");
        $result -> bindParam(1,$datos['fecha']);
        $result -> bindParam(2,$datos['TiInv']);
        $result -> bindParam(3,$datos['pedido']);
        $result -> bindParam(4,$datos['obser']);
        $result -> execute();
    }
    
    // Creamos un metodo para registrar inventario Entrada Accesorios
    public function registrarInventarioGeneralAccesorio($datos){
        // Creamos el objeto de la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Guardamos el codigo Sql en una variable
        
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarInventarioGeneralAccesorio(?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['fecha']);
        $result -> bindParam(2,$datos['TiInvAcc']);
        $result -> bindParam(3,$datos['obser']);
        // Ejecutamos el codigo SQl
        $result -> execute();
    }
    // Creamos un metodo para registar los accesorios del inventario
    public function registrarInventarioAccesorio($datos) {
        // Creamos el objeto de la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarInventarioAccesorio(?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['accesorio']);
        $result -> bindParam(2,$datos['cantAcce']);
        $result -> bindParam(3,$datos['precioUniAce']);
        // Ejecutamos el codigo SQl
        $result -> execute();
    }
    public function consultarInventario(){
        $f = null;
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();

        $result = $conexion -> prepare("CALL consultarInventario()");
        $result -> execute();
        while ($resultado = $result -> fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function consultarInventarioEspecifico($id,$tipo){
        $f = null;
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();

        $result = $conexion -> prepare("CALL consultarInventarioEspecifico(?,?)");
        $result -> bindParam(1,$id);
        $result -> bindParam(2,$tipo);
        $result -> execute();

        $f = $result -> fetch();

        return $f;
    }

    // Creamos un metodo para consultar el inventario especifico de accesorios

    public function consultarInventarioAccesorio($id){
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo SQl
        $result = $conexion -> prepare("CALL consultarInventarioAccesorio(?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$id);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Guardamos el resultado en la variable f
        $f = $result -> fetch();
        // Retornamos resultado
        return $f;
    }

    public function consultarInventarioMaterial($id){
        $f = null;
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        
        $result = $conexion -> prepare("CALL consultarInventarioMaterial(?)");
        $result -> bindParam(1,$id);
        $result -> execute();

        while ($resultado = $result -> fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }
    
    public function consultarInventarioAccesorioIndividuales($id){
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo SQl
        $result = $conexion -> prepare("CALL consultarInventarioAccesorioIndividuales(?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$id);
         // Ejecutamos el codigo Sql
        $result -> execute();
        // Guardamos el resultado en la variable f
        while ($resultado = $result -> fetch()) {
            $f[] = $resultado;
        }
        // Retornamos resultado
        return $f;
    }

    public function consultarInventarioPrecio($id){
        $f = null;
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();

        $result = $conexion -> prepare("CALL consultarInventarioPrecio(?)");
        $result -> bindParam(1,$id);
        $result -> execute();

        while ($resultado = $result -> fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    // Creamos un metodo para deshabilitar 
    public function deshabilitarInventario($id){
        // Creamos un objeto de la clase conexion
        $obj = new Conexion ();
        $conexion = $obj -> get_conexion();
        
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL deshabilitarInventario(?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$id);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
}
