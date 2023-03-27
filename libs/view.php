<?php

    class View{
        private $mensaje;
        function __construct(){
            
        }

        function render($nombre){
            require 'views/'.$nombre.'.php';
        }

        public function __set($property, $value){
            if(property_exists($this, $property)) {
                $this->$property = $value;
            }
        }

    }

?>