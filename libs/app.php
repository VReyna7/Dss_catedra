<?php
class App{
    function __construct(){
       // echo "<p>Nueva app</p>";
        $url = isset($_GET['url']) ? $_GET['url']: '';
        $url = rtrim($url,'/');
        $url = explode('/', $url);
        //var_dump($url);

        if(empty($url[0])){
            $archivoController = 'controllers/Main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        
        
        $archivoController = 'controllers/'.$url[0].'.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            //incializa el controlador
            $controller = new $url[0];
            if(isset($url[1])){
                $controller->loadModel($url[1]);
            }

            if(!isset($url[1]) && $url[0]=='dashboard'){
                require_once 'controllers/error.php';
                $controller->loadModel('cupones');
                $controller->setCupones();
                return false;
            }

            if(!isset($url[1]) && )
    
            //si hay un metodo que se quiere cargar;
            if(isset($url[2])){
                if(method_exists($controller,$url[2])){
                    $controller->{$url[2]}();
                }else{
                    require_once 'controllers/error.php';
                    $controller = new Errors();
                    return false;
                }
            }else{
                $controller->render();
            }

        }else{
            require_once 'controllers/error.php';
            $controller = new Errors();
        }
    
    }

}



?>