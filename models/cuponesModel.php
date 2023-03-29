<?php

    class cuponesModel extends Model{

        private $conexion;

        public function __construct(){
            parent::__construct();
        }
    
        public function getCupones(){
            try{
                $query = "SELECT *,(SELECT nombre FROM rubro WHERE rubro.CodigoRubro in (SELECT idRubro FROM empresa WHERE empresa.CodigoEmpresa= Ofer.idEmpresa)) AS nombreRubro, (SELECT nombre FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS NombreEmpresa,  (SELECT logo FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS logo FROM oferta AS Ofer WHERE estado=0" ;
                $this->conexion = $this->db->conectar();
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
                $query = "SELECT *,(SELECT nombre FROM rubro WHERE rubro.CodigoRubro in (SELECT idRubro FROM empresa WHERE empresa.CodigoEmpresa= Ofer.idEmpresa)) AS nombreRubro, (SELECT nombre FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS NombreEmpresa, (SELECT logo FROM empresa WHERE empresa.CodigoEmpresa = Ofer.idEmpresa) AS logo  FROM oferta AS Ofer WHERE Ofer.idEmpresa IN (SELECT codigoEmpresa FROM empresa WHERE empresa.idRubro IN (SELECT CodigoRubro FROM rubro WHERE nombre = :categoria AND estado=0));" ;
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

        public function getCuponesComprados($dui){
            try{
                $query = "SELECT idCupon, (SELECT titulo FROM oferta WHERE CodigoOferta=idOferta) as tituloOferta,(SELECT img FROM oferta WHERE CodigoOferta=idOferta) AS img,(SELECT logo FROM empresa WHERE empresa.CodigoEmpresa IN (SELECT idEmpresa FROM oferta WHERE oferta.CodigoOferta = idOferta)) AS logo FROM cuponescomprados WHERE DuiCliente=:DuiCliente" ;
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row->bindParam(':DuiCliente',$dui);
                $row ->execute();
                $data = $row->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function newIdCupon(){
            try{
                $query = "SELECT MAX(idCupon) as cuponFinal FROM cuponescomprados" ;
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row ->execute();
                $id = $row->fetch(PDO::FETCH_ASSOC);
                $int = $id['cuponFinal'][2].$id['cuponFinal'][3].$id['cuponFinal'][4];
                $int = $int + 1;
                if(strlen($int)<3){
                    $idCupon = "CU0".$int;
                }else{
                    $idCupon = "CU".$int;
                }
                return $idCupon;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function comprarCupon($datos){
            try{
                $query = "INSERT INTO cuponescomprados (idCupon, idOferta, DuiCliente, estado) VALUES (:idCupon,:idOferta,:DuiCliente,1)" ;
                $this->conexion = $this->db->conectar();
                $row = $this->conexion->prepare($query);
                $row->bindParam(':idCupon',$datos['idCupon']);
                $row->bindParam(':idOferta',$datos['idOferta']);
                $row->bindParam(':DuiCliente',$datos['dui']);
                $row ->execute();
                return true;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }

?>
