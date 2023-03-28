<?php
class dashboard extends Controller{
    function __construct()
    {
        parent::__construct();   
        $this->view->mensaje = $mensajeInicioSesion = '';
        $this->view->datos = '';
    }

    public function render(){
        $this->view->render("dashboard/main");
    }

    public function setCupones(){
        $this->view->datos = $this->model->getCupones();
        $this->render();
    }
}
?>