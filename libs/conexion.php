<?php

class Conexion{
    private $host;
    private $username;
    private $password;
    private $db;

    function __construct(){
        $this->host = constant('HOST');//LLamando config del archivo config.php
        $this->username = constant('USER');
        $this->password = constant('PASSWORD');
        $this->db = constant('DB');
    }

    function conectar(){
        try{
            $options = [
                PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $con = new PDO("mysql:dbname=$this->db;host=$this->host", $this->username,$this->password,$options);
            return $con;

        }catch(Exception $e){
            $error = 'Error encontrado en conexión de Base de datos :( : '. $e->getMessage(). "\n";
            return $error;
        }
    }


}


?>