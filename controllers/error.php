<?php

 Class Errors extends Controller{
    function __construct(){
        //echo "Error archivo no existente";
        parent::__construct();
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página";
        $this->view->render('error/index');
    }
 }

?>