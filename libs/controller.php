<?php

class Controller{
    private $view;
    private $model;

    function __construct(){
       // echo "<p>Controlador base </p>";
        $this->view = new View();
    }

    function loadModel($model){
            $url = 'models/'.$model.'Model.php';

            if(file_exists($url)){
                require $url;
                $modelName = $model.'Model';
                $this->model = new $modelName();
            }
    }

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }




}



?>