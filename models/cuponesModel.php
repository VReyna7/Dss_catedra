<?php

    class cuponesModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }
    
        public function getCupones(){
            try{
                $query = "SELECT *,(SELECT nombre FROM rubro WHERE rubro.CodigoRubro in (SELECT idRubro FROM empresa WHERE empresa.CodigoEmpresa= Ofer.idEmpresa)) AS nombreRubro, (SELECT nombre FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS NombreEmpresa, (SELECT logo FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS logo FROM oferta AS Ofer WHERE estado=0" ;                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row ->execute();
                $data = $row->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        
        }

        

        public function getCuponesCategoria($categoria){
            try{
                $query = "SELECT *,(SELECT nombre FROM rubro WHERE rubro.CodigoRubro in (SELECT idRubro FROM empresa WHERE empresa.CodigoEmpresa= Ofer.idEmpresa)) AS nombreRubro, (SELECT nombre FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS NombreEmpresa FROM oferta AS Ofer WHERE Ofer.idEmpresa IN (SELECT codigoEmpresa FROM empresa WHERE empresa.idRubro IN (SELECT CodigoRubro FROM rubro WHERE nombre = :categoria AND estado=0))" ;
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row->bindParam(':categoria',$categoria);
                $row ->execute();
                $data = $row->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        
        }

        public function UpdateCuponesVencidos(){
            try{
                $query = "UPDATE oferta SET estado=1 WHERE fechaLimite<CURRENT_DATE() AND estado=0;";
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row ->execute();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }

?>