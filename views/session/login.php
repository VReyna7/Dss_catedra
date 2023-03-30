<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/indexStyle.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title><?=constant('TITULO')?></title>
</head>
<body style='background: linear-gradient(rgba(255, 255, 255, 0.178), rgba(255, 255, 255, 0.178)), url("<?php echo constant('URL')?>public/img/fondo1.jpg"'>
    <?php 
        if(isset($_SESSION['USER'])){
            header('location:'.constant('URL').'dashboard/cupones/setCupones');
        }else if(isset($_SESSION['EMPLEADO'])){
            header('location:'.constant('URL').'dashboard/cupones/setCupones');
        }else{
            $opcionesLogeado = false;
        }
        require_once 'views/templates/header.php';
    ?>
    <main>
        <div class="container-fluid">
        <h1 class="main-tittle">La cuponera</h1>
        <h5 class="main-subtittle">Donde encuentras de todo!</h5>
        <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6" id="contenedorForm">
     <br>
        <h1 class='center'>Inicio de sesion</h1>
        <?php 
            if(!empty($this->mensaje)){
            echo '<h2 class="alert alert-danger">'.$this->mensaje.'</h2>';
            }
          ?>
        <form action="<?=constant('URL')?>inicioSesion/usuario/login" method='POST' class="form-group ">
        <div class="form-group row">
                <label for="dui" >Ingrese su DUI o Codigo de empleado:</label>
                <div class="col">
                <input type="text"  class="form-control"  name='cod' id='cod'>
                </div><br>
            <label for="pass">Contraseña</label>
            <div class="col">
                <input type="password"  class="form-control" name='pass' id='pass'>
            <br>
                <input type="submit"  class="btn btn-primary" name='enviar' id='enviar'>
            </div>
        </form>
        </div>
        </div>
        </div>
    </main>
    <?php
        require_once 'views/templates/footer.php'
    ?>
</body>
</html>