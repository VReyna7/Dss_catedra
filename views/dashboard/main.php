<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ayuda</title>
</head>
 <?php 
    if(!isset($_SESSION['USER'])){
        header('location:'.constant('URL').'main');
    }else{
        $opcionesLogeado = true;
    }
 ?>
<body>
    <?php 
        require_once 'views/templates/header.php';
        foreach($this->datos as $row){
            echo '<h2>'.$row['titulo'].'</h2>';
        }
    ?>
    <h1>raton</h1>
    <h1>raton</h1>
    <h1>raton</h1>
    <?php 
      require_once 'views/templates/footer.php';
    ?>
</body>
</html>