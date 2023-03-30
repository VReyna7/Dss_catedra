<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=constant('TITULO')?></title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/Principal.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php 
        $opcionesLogeado = false;
        require_once 'views/templates/header.php'
    ?>
    
    <main class='main' style='background-image: url(<?php constant('URL')?>public/img/bannerIndex.png)'>
        <div class="div-botons">
            <a href="InicioSesion/usuario"><button class='btn btn-primary botonsito'>Inicio sesion</button></a>
            <a href="registro/usuario"><button class='btn btn-success botonsito'>Registrarse</button></a>
        </div>
    </main>

    <?php
        require_once 'views/templates/footer.php';
    ?>
</body>
</html>