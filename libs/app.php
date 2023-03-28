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

            //incializa el controlador
            $controller = new $url[0];
            $controller->loadModel($url[1]);

            //si hay un metodo que se quiere cargar;
            if(isset($url[2])){
                if(method_exists($controller,$url[2])){
                    $controller->{$url[2]}();
                }else{
                    require_once 'controllers/error.php';
                    $controller = new Errors();
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