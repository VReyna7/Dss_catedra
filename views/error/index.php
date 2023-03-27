<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=constant('TITULO')?></title>
    <link rel="stylesheet" href="public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php 
        $opcionesLogeado = false;
        require_once 'views/templates/header.php'
    ?>
    
    <main>
        <h1 class='error'><?php echo $this->mensaje; ?></h1>
    </main>
    
    <?php
        require_once 'views/templates/footer.php'
    ?>
</body>
</html>