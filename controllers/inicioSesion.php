<?php
class InicioSesion extends Controller{
    function __construct()
    {
        parent::__construct();   
        $this->view->mensaje = $mensajeInicioSesion = '';
    }

    public function render(){
        $this->view->render("session/login");
    }

    public function login(){
        extract($_POST);
        $mensajeInicioSesion = "";
        if($this->model->searchUser(['dui'=>$dui])){
            if(!empty($this->model->setUser(['dui'=>$dui,'pass'=>$pass]))){
                $data = $this->model->setUser(['dui'=>$dui,'pass'=>$pass]);
                $_SESSION['USER'] = $data['DUI'];
                header("location:".constant("URL")."dashboard/cupones"); 
                echo $_SESSION['USER'];
            }else{
                $mensajeInicioSesion = "Contraseña incorrecta" ;
            }
        }else{
            $mensajeInicioSesion = "No existe el usuario" ;
        }
        $this->view->mensaje = $mensajeInicioSesion;
        $this->render();
    }

    public function deslogin(){
        session_destroy();
        header("location:".constant("URL")."main"); 
    }
}
?>