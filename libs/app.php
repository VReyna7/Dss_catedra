<?php
class App{
    function __construct(){
       // echo "<p>Nueva app</p>";
        $url = isset($_GET['url']) ? $_GET['url']: '';
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        if(empty($url[0])){
            $archivoController = 'controllers/Main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->render();
            return false;
        }

        $archivoController = 'controllers/'.$url[0].'.php';

        if(file_exists($archivoController)){
            require_once $archivoController;
            //incializa el controlado
            //si hay un metodo que se quiere cargar;
            $controller = new $url[0];
            if($controller->loadModel($url[1])){
                $controller->loadModel($url[1]);
                if(isset($url[2])){
                    if(method_exists($controller,$url[2])){
                        if(isset($url[3])){
                            $controller->{$url[2]}($url[3]);
                        }else{
                            $controller->{$url[2]}();
                        }
                    }else{
                        require_once 'controllers/error.php';
                        $controller = new Errors();
                    }
                }else{
                   $controller->render();
                }
            }
        }else{
            require_once 'controllers/error.php';
            $controller = new Errors();
        }
    
    }

}

?>