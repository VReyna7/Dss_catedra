<?php

    class cuponesModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }
    
        public function getCupones(){
            try{
                $query = "SELECT * FROM oferta";
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row ->execute();
                $data = $row->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return false;
            }
        
        }
    }

?>