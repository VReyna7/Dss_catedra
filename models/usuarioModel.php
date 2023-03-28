<?php

    class usuarioModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }

        //function de insertr datos de usuarios

        public function insert($datos){
            try{
                $query = "INSERT INTO cliente (DUI,nombre,apellido,telefono,correo,direccion,contra,estado) VALUES (:dui,:nombre,:apellido,:telefono,:correo,:direccion,:contra,:estado)";
                $this->conexion = $this->db->conectar();//accedemos a la funcion conectar, y por ende su return,  el cual recordara es la bdd
                $row = $this->conexion->prepare($query); //preparamos la consulta
                $row->bindParam(':dui', $datos['dui']);
                $row->bindParam(':nombre', $datos['nombre']);   
                $row->bindParam(':apellido', $datos['apellido']);   
                $row->bindParam(':telefono', $datos['telefono']);   
                $row->bindParam(':correo', $datos['correo']);   
                $row->bindParam(':direccion', $datos['direccion']);   
                $row->bindParam(':contra', $datos['contra']);  
                $row->bindParam(':estado', $datos['estado']);   
                $row->execute();//ejecutamos la consulta
                return true;
            }catch(PDOException $e){
                return false;
            }
        
        }

        //Funciones de busqueda de tipo de usuario

        public function searchUser($datos){
            try{
                $query = "SELECT * FROM cliente WHERE DUI=:DUI";
                $this->conexion = $this->db->conectar();//accedemos a la funcion conectar, y por ende su return,  el cual recordara es la bdd
                $row=$this->conexion->prepare($query);
                $row->bindParam(':DUI',$datos['dui']);
                $row->execute();
                if($row->rowCount()>0){
                    return true;
                }
            }catch(PDOException $e){
                return false;
            }
        }
        
        public function searchEmpleado($datos){
            try{
                $query = "SELECT * FROM empleado WHERE CodigoEmpleado=:CodigoEmpleado";
                $this->conexion = $this->db->conectar();//accedemos a la funcion conectar, y por ende su return,  el cual recordara es la bdd
                $row=$this->conexion->prepare($query);
                $row->bindParam(':CodigoEmpleado',$datos['cod']);
                $row->execute();
                if($row->rowCount()>0){
                    return true;
                }
            }catch(PDOException $e){
                return false;
            }
        }

        //Funciones de seteo de datos

        public function setUser($datos){
            try{
                $query = "SELECT * FROM cliente WHERE DUI=:DUI AND contra=:contra";
                $this->conexion = $this->db->conectar();//accedemos a la funcion conectar, y por ende su return,  el cual recordara es la bdd
                $row=$this->conexion->prepare($query);
                $row->bindParam(':DUI',$datos['dui']);
                $row->bindParam(':contra',$datos['pass']);
                $row->execute();
                $data = $row->fetch(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return false;
            }
        }

        public function setEmpleado($datos){
            try{
                $query = "SELECT * FROM empleado WHERE CodigoEmpleado=:CodigoEmpleado AND contra=:contra";
                $this->conexion = $this->db->conectar();//accedemos a la funcion conectar, y por ende su return,  el cual recordara es la bdd
                $row=$this->conexion->prepare($query);
                $row->bindParam(':CodigoEmpleado',$datos['cod']);
                $row->bindParam(':contra',$datos['pass']);
                $row->execute();
                $data = $row->fetch(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return false;
            }
        }
        

    }

?>