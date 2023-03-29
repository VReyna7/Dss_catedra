<?php
class dashboard extends Controller{
    function __construct()
    {
        parent::__construct();   
        $this->view->mensaje = $mensajeDashboard= '';
        $this->view->datos = '';
    }

    public function render(){
        $this->view->render("dashboard/main");
    }

    public function setCupones($dato=''){
        $this->view->datos = $this->model->UpdateCuponesVencidos();
        $this->view->datos = $this->model->getCupones();
        if($dato=="success"){
            $this->view->mensaje= "El cupon se ha comprado exitosamente";
        }
        $this->render();
    }

    public function cuponesComprados(){
        $this->view->datos = $this->model->getCuponesComprados($_SESSION['USER']);
        $this->view->render("dashboard/misCupones");
    }

    public function adquirirCupon($dato){
        $parametro=rtrim($dato,"_");
        $parametro=explode("_",$dato);
        $id = $this->model->newIdCupon();
        if($this->model->comprarCupon(['idCupon'=>$id, 'idOferta'=>$parametro[0], 'dui'=>$parametro[1]])){
            header("location: ".constant("URL")."dashboard/cupones/setCupones/success");
        }else{
            $mensajeDashboard = "Error al comprar el cupon";
            $this->render();
        }

    }
}
?>