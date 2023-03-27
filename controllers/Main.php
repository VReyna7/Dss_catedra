<?php

    Class Main extends Controller{

        function __construct(){
           // echo '<p>Nuevo controlador main</p>';
            parent::__construct();
        }

        function render(){
            $this->view->render('main/index');
        }

        function saludo(){
            echo "<p>Ejecutaste el metodo saludo</p>";
        }
    }

?>