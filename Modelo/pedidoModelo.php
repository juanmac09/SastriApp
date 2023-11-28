<?php
class Pedido{
    // Se crea el metodo Registrar Pedido
    public function registrarPedido($datos){
      // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarPedido(?,?,?,?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['id']);
        $result -> bindParam(2,$datos['tipoPedido']);
        $result -> bindParam(3,$datos['pe_prendas']);
        $result -> bindParam(4,$datos['total']);
        $result -> bindParam(5,$datos['abono']);
        $result -> bindParam(6,$datos['fechaEntrega']);
        $result -> bindParam(7,$datos['comp']);
        // Ejecutamos el codigo Sql
        $result -> execute();

        // echo "<script>alert('Registro Pedido Exitoso')</script>";
    }
    // Se crea el metodo Registrar Pedido Camisa
    public function registrarPedidoCamisa($datos){
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarPedidoCamisa(?,?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['cuello']);
        $result -> bindParam(2,$datos['despunte']);
        $result -> bindParam(3,$datos['puno']);
        $result -> bindParam(4,$datos['bolsillo']);
        $result -> bindParam(5,$datos['obsCamisa']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    // Se crea el metodo Registrar Pedido Chaleco
    public function registrarPedidoChaleco($datos){
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarPedidoChaleco(?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['obsChaleco']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    // Se crea el metodo rRegistrar Pedido Pantalon
    public function registrarPedidoPantalon($datos){
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarPedidoPantalon(?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['bota']);
        $result -> bindParam(2,$datos['bolsilloReloj']);
        $result -> bindParam(3,$datos['obsPantalon']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    // Se crea el metodo Registrar Pedido Saco
    public function registrarPedidoSaco($datos){
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL registrarPedidoSaco(?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['cantAberturas']);
        $result -> bindParam(2,$datos['tipoAbertura']);
        $result -> bindParam(3,$datos['obsSaco']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }

    // Creamos el metodo para registrar el pedido detalles
    public function registrarDetallePedido($datos) {
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL registrarDetallePedido(?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['comp']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    

    // Se crea el metodo Ultimo registro
    public function consutarUltimoRegistrado(){
        // Creamos una variable f para guardar el resultado
        $f = null;
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Guardamos el codigo Sql
        $query = "SELECT * FROM pedido ORDER BY ped_id DESC LIMIT 1";
        // Preparamos el codigo Sql
        $result = $conexion -> prepare($query);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertir el resultado a un vector
        $f = $result -> fetch();
        // Retornamos f
        return $f;
    }
    // Se crea el metodo Consultar Pedido
    public function consultarPedido(){
        // Creamos una variable f para guardar el resultado
        $f = null;
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarPedidos()");
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertir el resultado a un vector
        while ($resultado = $result -> fetch()) {
           $f[] = $resultado;
        }
        // Retornamos f
        return $f;
    }
    // Se crea el metodo para consultar pedido para pantalonero
    public function consultarPedidoPantalonero(){
        // Creamos una variable f para guardar el resultado
        $f = null;
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarPedidosPantalonero()");
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertir el resultado a un vector
        while ($resultado = $result -> fetch()) {
           $f[] = $resultado;
        }
        // Retornamos f
        return $f;
    }
    // Se crea el metodo consultar pedido con id
    public function consultarPedidoId($id,$n){
        // Creamos una variable f para guardar el resultado
        $f = null;
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarPedidosId(?,?)");
        // Preparamos el codigo Sql
        $result -> bindParam(1,$id);
        $result -> bindParam(2,$n);
        // Ejecutamos el codigo Sql
        $result ->execute();
        // Convertir el resultado a un vector
        while ($resultado = $result -> fetch()) {
            $f[] = $resultado;
        }
        // Retornamos f
        return $f;
    }
    // Creamos un metodo para consultar la existencia del detalle del pedido
    public function consultarExistenciaDetallePedido($pe_id) {
        // Creamos una variable f para guardar el resultado
        $f = null;
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj-> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("SELECT * FROM pedido_detalles WHERE ped_id = :id");
        // Convertimos argumentos a parametros
        $result -> bindParam(":id",$pe_id);
        // Ejecutamos el codigo
        $result -> execute(); 
        // Convertimos el resultado en arreglo
        $f = $result -> fetch();
        // Retornamos el resultado
        return $f;
    }

    // Se crea el metodo Actualizar Estado del Pedido
    public function actualizarEstadoPedido($datos){
        // Se crea el objeto conexion
        $obj = new Conexion();
        $conexion = $obj-> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL actualizarEstadoPedido(?,?)");
        // Preparamos el codigo Sql
        $result -> bindParam(1,$datos['idP']);
        $result -> bindParam(2,$datos['valor']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    // Se crea metodo para consultar la cantidad de pedido por mes
    public function consultarCantPedidoMensual(){
        // Variable para guardar el resultado
        $f = null;
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj  -> get_conexion();
        // Preparamos el codigo SQl
        $result = $conexion -> prepare("CALL consultarPedidosGrafica()");
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos en un array asociativo el resultado
        $f = $result -> fetch(PDO::FETCH_ASSOC);
        // Retornamos resultado
        return $f;
    }

    // Creamos el metodo para consultar la cantidad de pedido por estado 
    public function consultarCanPedidoEst(){
        // Variable para guardar resultado
        $f = null;
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarCantidadPedidoEstado()");
        // Ejecutamos el codigo sql
        $result -> execute();
        // Convertimos el resultado ha arreglos
        $f = $result -> fetch();
        // Retornamos resultado
        return $f;
    }

    // Creamos el metodo para actualizar el pedido
    public function actualizarPedido($datos){
        // Creamos el objeto para almacenar la conexion a la base de datos
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarPedido(?,?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['tipoPedido']);
        $result -> bindParam(3,$datos['total']);
        $result -> bindParam(4,$datos['abono']);
        $result -> bindParam(5,$datos['fechaEntrega']);
        // Ejecutamos el codigo SQl
        $result -> execute();
        // Mostramos mensaje de exito
        // echo "<script>alert('Actualización Exitosa')</script>";
    }

    // Creamos el metodo para actualizar el pedido camisa
    public function actualizarPedidoCamisa($datos) {
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarPedidoCamisa(?,?,?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['cuello']);
        $result -> bindParam(3,$datos['despunte']);
        $result -> bindParam(4,$datos['puno']);
        $result -> bindParam(5,$datos['bolsillo']);
        $result -> bindParam(6,$datos['obsCamisa']);

        // Ejecutamos el codigo SQl
        $result -> execute();
    }

    // Creamos el metodo para actualizar el pedido chaleco 
    public function actualizarPedidoChaleco($datos){
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarPedidoChaleco(?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['obsChaleco']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }

    // Creamos el metodo para actualizar el pedido pantalon
    public function actualizarPedidoPantalon($datos){
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarPedidoPantalon(?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['bota']);
        $result -> bindParam(3,$datos['bolsilloReloj']);
        $result -> bindParam(4,$datos['obsPantalon']);
        // Ejecutamos el codigo Sql
        $result -> execute();

    }
    

    // Creamos el metodo para actualizar el pedido saco
    public function actualizarPedidoSaco($datos) {
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarPedidoSaco(?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['cantAberturas']);
        $result -> bindParam(3,$datos['tipoAbertura']);
        $result -> bindParam(4,$datos['obsSaco']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }

    // Creamos el metodo para actualizar pedido detalle
    public function actualizarDetallePedido($datos){
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarDetallePedido(?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['ped_id']);
        $result -> bindParam(2,$datos['comp']);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    
}
?>