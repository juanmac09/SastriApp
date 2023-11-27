<?php

// Creamos la clase Consulta
class Consultas{

    //Creamos el metodo para registrar un usuario    
    public function registrarUser($datos)
    {
        // Creamos una objeto para la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // Preparamos el codigo Sql
        $resultado = $conexion -> prepare("CALL verificarExistencia(?,?,?)");
        $resultado -> bindParam(1,$datos['rol']);
        $resultado -> bindParam(2,$datos['id']);
        $resultado -> bindParam(3,$datos['email']);
        // Ejecutamos el codigo sql
        $resultado -> execute();
        $resultado->closeCursor();
        $f = $resultado -> fetch();
        // Condicion para saber si el usuario ya esta registrado 
        if ($f) {
            echo "<script> alert('El usuario ya existe ')</script>";
            echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
            die();
        }
        else {
            
        }
        //Preparamos el codigo sql 
        $result = $conexion -> prepare("CALL registrarUsuario(?,?,?,?,?,?,?,?,?,?)");
       
        
        // Convertimos argumentos a parametros
       $result -> bindParam(1, $datos['id']);
       $result -> bindParam(2, $datos['rol']);
       $result -> bindParam(3, $datos['nom']);
       $result -> bindParam(4, $datos['ape']);
       $result -> bindParam(5, $datos['password']);
       $result -> bindParam(6, $datos['foto']);
       $result -> bindParam(7, $datos['tel']);
       $result -> bindParam(8, $datos['dire']);
       $result -> bindParam(9, $datos['email']);
       $result -> bindParam(10, $datos['user_registrar']);
     

        // Ejecutamos el codigo
       $result -> execute();
        // Mostramos mensaje de exito
        //    echo "<script> alert('Registro Exitoso')</script>";
       echo "<script> location.href='../Vista/administrador/Html/formularioRegistrar.php'</script>";
    }
    // Creamos un metodo para el ingreso al sistema
    public function ingresoLogin($ingreso)
    {
        // Creamos una objeto para la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // preparamos el codigo sql
        $ing = $conexion -> prepare("CALL login(?)");
        // Convertimos argumentos a parametros
        $ing ->bindParam(1,$ingreso['user']);
        // Ejecutamos el codigo
        $ing -> execute();
        // Convertimos el resultado en un arreglo
        $da = $ing -> fetch();
        // Retornamos el resultado
        return $da;
    }
    // Creamos un metodo para consultar el usuario
    public function consultarUsuario($rol)
    {   
        // Creamos una variable para guardar el resultado de la consulta
        $f = null;
        // Creamos un objeto para la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarUsuario(?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$rol);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos el resultado a arreglo
        while ($resultado = $result -> fetch()) {
            $f[] = $resultado;
        }
        // Retornamos resultado
        return $f;
    }
    // Creamos un metodo para consultar el usuario por medio del correo
    public function consultarUsuarioCorreo($correo){
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarUsuarioCorreo(?)");
        // Creamos argumentos a parametros
        $result -> bindParam(1,$correo);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos el resultado a un arreglo
        $f = $result -> fetch();
        // Retornamos el resultado
        return $f;
    }
    // Creamos el metodo para modificar usuario
    public function modificarUsuario($dato)
    {   
        // Creamos un objeto de la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // Preparamos el codigo sql
        $result = $conexion -> prepare("CALL actualizarUsuario(?,?,?,?,?)");
        // Convertimos de argumentos a parametros
        $result -> bindParam(1,$dato['id']);
        $result -> bindParam(2,$dato['nom']);
        $result -> bindParam(3,$dato['ape']);
        $result -> bindParam(4,$dato['tel']);
        $result -> bindParam(5,$dato['email']);
        // Ejecutamos el codigo sql
        $result -> execute();
        // Mostramos mensaje de error
        // echo "<script> alert('Se actualizaron los datos')</script>";
    }   
    // Creamos el metodo para modificar la contraseña
    public function modificarPassword($datos){
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Incriptamos la contraseña a md5
        $pass = md5($datos['pass']);
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL actualizarPass(?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['id']);
        $result -> bindParam(2,$pass);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    // Creamos el objeto para modificar la foto
    public function modificarFoto($id,$foto){
        // Creamos un objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL actualizarFoto(?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$id);
        $result -> bindParam(2,$foto);
        // Ejecutamos el codigo Sql
        $result -> execute();
    }
    // Creamos el metodo para modificar clientes
    public function modificarCliente($datos){
        // Creamos el objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL actualizarCLiente(?,?,?,?,?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$datos['id']);
        $result -> bindParam(2,$datos['nom']);
        $result -> bindParam(3,$datos['ape']);
        $result -> bindParam(4,$datos['tel']);
        $result -> bindParam(5,$datos['email']);
        $result -> bindParam(6,$datos['dire']);
        // Ejecutamos el codigo sql
        $result -> execute();
        // Mostramos el mensaje de exito
        // echo "<script> alert('Se actualizaron los datos')</script>";
        echo "<script> location.href='../Vista/administrador/Html/Consultaclientes.php?rol=2'</script>";
    }
    // Creamos el metodo para modificar proveedores
    public function modificarProveedor($datos){
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL actualizarProveedor(?,?,?,?)");
        // Convertir argumentos a parametros
        $result -> bindParam(1,$datos['id']);
        $result -> bindParam(2,$datos['local']);
        $result -> bindParam(3,$datos['tel']);
        $result -> bindParam(4,$datos['Dire']);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Mostramos mensaje de exito
        // echo "<script> alert('Se actualizaron los datos')</script>";
        echo "<script> location.href='../Vista/administrador/Html/consultarProveedor.php?rol=3'</script>";
    }
    // Creamos el metodo para deshabilitar el usuario
    public function deshabilitarUsuario($dato)
    {
        // Creamos el objeto para la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL deshabilitarUsuario(?)");
        // Convertirmos de argumentos a parametros
        $result ->  bindParam(1,$dato['id']);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Mostramos el mensaje de exito
    }
    // Creamos el metodo para contar proveedores
    public function contarProveedor(){
        // Creamos el objeto de la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // Guardamos el codigo Sql
        $query = "SELECT count(user_identificacion) FROM usuario WHERE user_rol =3";
        // Preparamos el codigo sql
        $result = $conexion -> prepare($query);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos el resultado a vector
        $resultado = $result -> fetch();
        // Retornamos el resultado
        return $resultado;
    }

    // Creamos el metodo para consultar el ultimo proveedor
    public function ultimoProveedor(){
        // Creamos el objeto para la clase conexion
        $objconexion = new Conexion;
        $conexion = $objconexion -> get_conexion();
        // Guardamos el codigo Sql
        $query = "SELECT user_identificacion FROM usuario  WHERE user_rol = 3 ORDER BY user_identificacion DESC LIMIT 1;";
        // Preparamos el codigo Sql
        $result = $conexion -> prepare($query);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos el resultado a arreglo
        $resultado = $result -> fetch();
        // Retornamos el resultado
        return $resultado;
    }
    // Creamos el metodo para consultar un cliente por medio del id
    public function consultarClienteId($id){
        // Creamos el objeto de la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Guardamos el codigo Sql
        $query = "SELECT usuario.user_identificacion,usuario.user_nombre,usuario.user_registra,cli_usuario.user_apellido,cli_usuario.user_correo,
        direccion_usuario.user_direccion,telefono_usuario.user_telefono FROM usuario 
        INNER JOIN cli_usuario ON usuario.user_identificacion = cli_usuario.user_identificacion
        LEFT JOIN  direccion_usuario ON direccion_usuario.user_identificacion = usuario.user_identificacion
        LEFT JOIN telefono_usuario ON telefono_usuario.user_identificacion = usuario.user_identificacion WHERE user_estado = 1 AND usuario.user_identificacion = :id";
        // Preparamos el codigo Sql
        $result = $conexion -> prepare($query);
        // Convertimos argumentos a parametros
        $result -> bindParam(":id",$id);
        // Ejecutamos el codigo sql
        $result -> execute();
        // Convertimos el resultado a arreglos
        $f = $result -> fetch();
        // Retornamos resultado
        return $f;
    }
    // Creamos el metodo para consultar un proveedor por medio del id
    public function consultarProveedorId($id){
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos el objeto de la clase Conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Guardamos el codigo Sql
        $query = "SELECT usuario.user_identificacion,usuario.user_nombre,usuario.user_registra,
        direccion_usuario.user_direccion,telefono_usuario.user_telefono FROM usuario 
        LEFT JOIN  direccion_usuario ON direccion_usuario.user_identificacion = usuario.user_identificacion
        LEFT JOIN telefono_usuario ON telefono_usuario.user_identificacion = usuario.user_identificacion
        WHERE user_estado = 1  AND usuario.user_roL = 3  AND usuario.user_identificacion = :id";
        // Preparamos el codigo sql
        $result = $conexion -> prepare($query);
        // Convertimos argumentos a parametros
        $result -> bindParam(":id",$id);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos el resultado a arreglo
        $f = $result -> fetch();
        // Retornamos el resultado
        return $f;
    }
    // Consultamos los datos generales de todo los usuarios
    public function consultarDatosUsuarios($id,$rol){
        // Creamos una variable para guardar el resultado
        $f = null;
        // Creamos un objeto para la clase conexion
        $obj = new Conexion();
        $conexion = $obj -> get_conexion();
        // Preparamos el codigo Sql
        $result = $conexion -> prepare("CALL consultarUsuarioPerfil(?,?)");
        // Convertimos argumentos a parametros
        $result -> bindParam(1,$rol);
        $result -> bindParam(2,$id);
        // Ejecutamos el codigo Sql
        $result -> execute();
        // Convertimos el resultado a arreglo
        $f = $result -> fetch();
        // Retornamos el resultado
        return $f;
    }

}



?>