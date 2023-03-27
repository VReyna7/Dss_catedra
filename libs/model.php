<?php

class Model{
    private $db;

    function __construct(){
        $this->db = new Conexion();
    }

    function __get($property){
        if(property_exists($this,$property)){
            return $this->$property;
        }
    }

}


?>