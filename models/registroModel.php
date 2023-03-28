<?php

    class registroModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }

        public function insert($datos){
            try{
                $query = "INSERT INTO cliente (DUI,nombre,apellido,telefono,correo,direccion,contra) VALUES (:dui,:nombre,:apellido,:telefono,:correo,:direccion,:contra)";
                $this->conexion = $this->db->conectar();//accedemos a la funcion conectar, y por ende su return,  el cual recordara es la bdd
                $row = $this->conexion->prepare($query); //preparamos la consulta
                $row->bindParam(':dui', $datos['dui']);
                $row->bindParam(':nombre', $datos['nombre']);   
                $row->bindParam(':apellido', $datos['apellido']);   
                $row->bindParam(':telefono', $datos['telefono']);   
                $row->bindParam(':correo', $datos['correo']);   
                $row->bindParam(':direccion', $datos['direccion']);   
                $row->bindParam(':contra', $datos['contra']);   
                $row->execute();//ejecutamos la consulta
                return true;
            }catch(PDOException $e){
                return false;
            }
        
        }

        
        

    }

?>