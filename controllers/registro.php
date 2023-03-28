<?php

    class Registro extends controller{
        private $mensajeRegistro;

        function __construct(){
            parent::__construct();
            $this->view->mensaje = $mensajeRegistro = '';
        }

        function render(){
            $this->view->render('session/registro');
        }
        
        function registrarCliente(){
            extract($_POST);
            $mensajeRegistro = "";
            if($this->model->insert(['dui'=>$dui, 'nombre'=>$nombre, 'apellido'=>$apellido,'telefono'=>$telefono,'correo'=>$correo,'direccion'=>$direccion,'contra'=>$contra,'estado'=>$estado])){
                $mensajeRegistro='Nuevo cliente creado';
            }else{
                $mensajeRegistro='Error no se pudo agregar Cliente';
            }

            $this->view->mensaje = $mensajeRegistro;
           $this->render();
        }

        

    }


?>