<?php

    class cuponesModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }
    
        public function getCupones(){
            try{
                $query = "SELECT *, (SELECT nombre FROM empresa AS Em WHERE Em.CodigoEmpresa= of.idEmpresa) AS NombreEmpresa FROM oferta AS of" ;
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