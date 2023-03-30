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
        //Verificacion si es clientej
        if($this->model->searchUser(['dui'=>$cod])){
            if(!empty($this->model->setUser(['dui'=>$cod,'pass'=>$pass]))){
                $data = $this->model->setUser(['dui'=>$cod,'pass'=>$pass]);
                //Se seta la sesion del cliente
                $_SESSION['USER'] = $data['DUI'];
                header("location:".constant("URL")."dashboard/cupones/setCupones"); 
            }else{
                $mensajeInicioSesion = "Contraseña incorrecta" ;
            }
        //Verificacion si es empleado
        }else if($this->model->searchEmpleado(['cod'=>$cod])){
            if(!empty($this->model->setEmpleado(['cod'=>$cod,'pass'=>$pass]))){
                $data = $this->model->setEmpleado(['cod'=>$cod,'pass'=>$pass]);
                //se setea la sesion del empleado
                $_SESSION['EMPLEADO'] = $data['CodigoEmpleado'];
                header("location:".constant("URL")."dashboard/cupones/setCupones"); 
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
        header("location:".constant("URL")); 
    }
}
?>