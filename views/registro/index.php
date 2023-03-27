<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ayuda</title>
</head>
<body>
    <?php 
        require_once 'views/templates/header.php'
    ?>
    <main>
        <h1 class='center'>Pagina de registro</h1>
        <form action="<?php echo constant('URL')?>registro/registrarAlumno" method='POST'>
            <div>
                <label for="dui">DUI</label>
                <input type="text" name='dui' id='dui'>
            </div><br>
            <div>
            <label for="nombre">Nombre</label>
                <input type="text" name='nombre' id='nombre'>
            </div><br>
            <div>
            <label for="apellido">Apellido</label>
                <input type="text" name='apellido' id='apellido'>
            </div><br>
            <div>
            <label for="contra">Contraseña</label>
                <input type="text" name='contra' id='contra'>
            </div><br>
            <div>
            <label for="telefono">Telefono</label>
                <input type="text" name='telefono' id='telefono'>
            </div><br>
            <div>
            <label for="correo">Correo</label>
                <input type="text" name='correo' id='correo'>
            </div><br>
            <div>
            <label for="direccion">Correo</label>
                <input type="text" name='direccion' id='direccion'>
            </div><br>
            <div>
                <input type="submit" name='enviar' id='enviar'>
            </div>
        </form>
        <h1><?php echo $this->mensaje; ?></h1>
    </main>
    <?php
        require_once 'views/templates/footer.php'
    ?>
</body>
</html>