<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/indexStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?=constant('TITULO')?></title>
</head>
 <?php 
    if(isset($_SESSION['USER'])){
        $opcionesLogeado = true;
        $opcionesEmpleado = false;
    }else if(isset($_SESSION['EMPLEADO'])){
        $opcionesLogeado = true;
        $opcionesEmpleado = true;
    }else{
        header('location:'.constant('URL').'main');
    }
 ?>
<body>
    <?php 
        require_once 'views/templates/header.php';
        if(isset($_SESSION['EMPLEADO'])){
            echo "<h1>Bienvenido". $_SESSION['EMPLEADO']."</h1>";
        }
        ?>
        <div class="container-fluid">
         <div class="banner"></div>
        <h1 class="main-tittle">La cuponera</h1>
        <h5 class="main-subtittle">Donde encuentras de todo!</h5>
        <div class="row d-flex justify-content-center">
        <?php
        //if(isset($datos)){
        foreach($this->datos as $row){
        ?>
      
       

<div class="col-lg-5">
        <div class="card" style="width: 100%;">
        <div class="card-body">
        <img class="brand-logo" style="width: 100px; height: 100px; float: left; margin-right: 10px">
        <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
        <h6 class="card-subtitle mb-2   ">Antes: <?php echo $row['precioRegular']; ?></h6>
        <h6 class="card-subtitle mb-2   ">Ahora: <?php echo $row['precioOferta']; ?></h6>
        <p class="card-text"><?php echo $row['descripcion']?>.</p>
        <a href="#" class="card-link">Ver mas</a>
        <?php if(!$opcionesEmpleado){ ?>
        <a href="#" class="card-link">Adquirir cupon</a>
        <?php }?>
        </div>
        </div>
        </div>


    <?php } ?>
    </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
<?php 
      require_once 'views/templates/footer.php';
    ?>
</html>