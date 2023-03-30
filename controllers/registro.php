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
        
        function registrarCliente($datos=array()){
            $mensajeRegistro = "";
                    if($this->model->insert(['dui'=>$datos[0], 'nombre'=>$datos[1], 'apellido'=>$datos[2],'telefono'=>$datos[3],'correo'=>$datos[4],'direccion'=>$datos[5],'contra'=>$datos[6],'estado'=>$datos[7]])){
                        $mensajeRegistro='Nuevo cliente creado';
                    }else{
                        $mensajeRegistro='Error no se pudo agregar Cliente';
                    }
            $this->view->mensajeProcesoCorrecto = $mensajeRegistro;
            $this->render();
        }

        public function envioVerificacion(){
            extract($_POST);
            if(!$this->model->searchClienteDUI($dui)){
                if(!$this->model->searchClienteCorreo($correo)){
            if(empty(trim($dui))){
                $mensajeRegistro="Debe escribir un dui";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(!preg_match('/^[0-9]{8}-[0-9]{1}$/',$dui)){
                $mensajeRegistro="debe escribir un dui con el formato 12345678-9";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(empty(trim($nombre))){
                $mensajeRegistro="debe escribir un nombre";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(empty(trim($apellido))){
                $mensajeRegistro="debe escribir un apellido";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }
            else if(empty(trim($telefono))){
                $mensajeRegistro="debe escribir un telefono";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(!preg_match('/^[267][0-9]{3}-?[0-9]{4}$/',$telefono)){
                 $mensajeRegistro="debe escribir un telefono valido";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(empty(trim($correo))){
                $mensajeRegistro="debe escribir un correo";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(empty(trim($direccion))){
                $mensajeRegistro="debe escribir un direccion";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else if(empty(trim($contra))){
                $mensajeRegistro="debe escribir un contra";
                $this->view->mensaje = $mensajeRegistro;
                $this->render();
            }else{
                 $codigo = rand(1000,9999);
            $destinatario = $correo; 
            $asunto = "Este mensaje es de prueba"; 
            $cuerpo = ' 
            <html> 
            <head> 
               <title>Codigo de verificación</title> 
            </head> 
            <body> 
            <h1>Tu codigo de verificación</h1> 
            <p> 
            <b>'.$codigo.'</b> 
            </p> 
            </body> 
            </html> 
            '; 

            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            //dirección del remitente 
            $headers .= "From: ratonesdss@gmail.com\r\n"; 
            $headers .= "Reply-to: ratonesdss@gmail.com\r\n"; 
            $headers .= "X-Mailer: PHP/".phpversion(); 

              if(mail($destinatario,$asunto,$cuerpo,$headers)){
                $_SESSION['COD'] = $codigo;
                $_SESSION['DATOS']=array($dui,$nombre,$apellido,$telefono,$correo,$direccion,$contra,$estado);
                $this->view->render('session/verificacion');
              }else{
                $this->view->mensaje = "ERROR AL MANDAR EL CORREO";
                $this->view->render('session/registro');
              }
             }
            }else{
                   $mensajeRegistro='Lo sentimos el correo ya esta en uso';
                   $this->view->mensaje = $mensajeRegistro;
                   $this->render(); 
            }
        }else{
             $mensajeRegistro='Lo sentimos el DUI ya esta en uso';
            $this->view->mensaje = $mensajeRegistro;
            $this->render();
        }
          
        }

        public function verificacionCliente(){
            extract($_POST);
            if($_SESSION['COD']==$cod){
                $this->registrarCliente($_SESSION['DATOS']);
            }else{
                $this->view->mensaje = "CODIGO INCORRECTO";
                $this->view->render('session/verificacion');
            }
        }

        

    }


?>