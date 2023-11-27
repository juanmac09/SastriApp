<?php
// CREAMOS UNA CLASE PARA USARLA COMO OBJETO MÁS ADELANTE
class Conexion{
  
    public function get_conexion()
    {

        // Las valores de las variables según los datos del hosting
        $user ="root";
        $pass = "";
        $host = "localhost";
        $db = "sastriapp";

        $conexion = new PDO("mysql: host=$host; dbname=$db" , $user,$pass);
        // Retornamos la conexion
        return $conexion;
    }

}


?>