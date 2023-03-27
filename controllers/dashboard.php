<?php
class dashboard extends Controller{
    function __construct()
    {
        parent::__construct();   
        $this->view->mensaje = $mensajeInicioSesion = '';
    }

    public function render(){
        $this->view->render("dashboard/main");
    }

    public function login(){
        extract($_POST);
        $mensajeInicioSesion = "";
        if($this->model->searchUser(['dui'=>$dui])){
            if($this->model->setUser(['dui'=>$dui,'pass'=>$pass])){
                $_SESSION['USER'] = 'USUARIO';
                
            }else{
                $mensajeInicioSesion = "Contraseña incorrecta" ;
            }
        }else{
            $mensajeInicioSesion = "No existe el usuario" ;
        }
        $this->view->mensaje = $mensajeInicioSesion;
        $this->render();
    }
}
?>