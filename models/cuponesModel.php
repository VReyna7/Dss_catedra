<?php

    class cuponesModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }
    
        public function getCupones(){
            try{
                $query = "SELECT *,(SELECT nombre FROM rubro WHERE rubro.CodigoRubro in (SELECT idRubro FROM empresa WHERE empresa.CodigoEmpresa= Ofer.idEmpresa)) AS nombreRubro, (SELECT nombre FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS NombreEmpresa FROM oferta AS Ofer" ;
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row ->execute();
                $data = $row->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        
        }
    }

?>