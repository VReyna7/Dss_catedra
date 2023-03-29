<?php
class CuponesCate extends Controller{
    function __construct()
    {
        parent::__construct();   
        $this->view->mensaje = $mensajeInicioSesion = '';
    }

    public function render($categoria){
        $this->model->UpdateCuponesVencidos();
        $this->view->datos = $this->model->getCuponesCategoria($categoria);
        $this->view->render("dashboard/cuponesCategoria");
    }

}
?>