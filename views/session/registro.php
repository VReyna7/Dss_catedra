<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/indexStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <title><?=constant('TITULO')?></title>
</head>
<body>
    <?php 
        $opcionesLogeado = false;
        require_once 'views/templates/header.php'
    ?>
    <main>
    <div class="container-fluid">
        <h1 class="main-tittle">La cuponera</h1>
        <h5 class="main-subtittle">Donde encuentras de todo!</h5>
        <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6" id="contenedorForm">
     <br>
        <h1 class='center'>Pagina de registro</h1>
        <form action="<?php echo constant('URL')?>registro/usuario/envioVerificacion" method='POST' class="form-group">
        <div class="form-group row">    
            <label for="dui">DUI</label>
            <div class="col">
            <input type="text"  class="form-control" name='dui' id='dui'>
            </div><br>
            <label for="nombre">Nombre</label>
            <div class="col">
                <input type="text"  class="form-control" name='nombre' id='nombre'>
            </div><br>
            <label for="apellido">Apellido</label>
            <div class="col">
                <input type="text"  class="form-control" name='apellido' id='apellido'>
            </div><br>
            <label for="contra">Contraseña</label>
            <div class="col">
                <input type="text"  class="form-control"  class="form-control" name='contra' id='contra'>
            </div><br>
            <label for="telefono">Telefono</label>
            <div class="col">
                <input type="text"  class="form-control" name='telefono' id='telefono'>
            </div><br>
            <label for="correo">Correo</label>
            <div class="col">
                <input type="text"  class="form-control" name='correo' id='correo'>
            </div><br>
            <label for="direccion">Direccion</label>
            <div class="col">
                <input type="text"  class="form-control" name='direccion' id='direccion'>
            </div><br>
            <input type="hidden" name='estado' id='estado' value='2'>
            <br><div>
                <input type="submit" name='enviar'  class="btn btn-primary" id='enviar'>
            </div>
            </div>
        </form>
        </div>
        </div>
        <h1><?php echo $this->mensaje; ?></h1>
        </div>
    </main>
    <?php
        require_once 'views/templates/footer.php'
    ?>
</body>
</html>