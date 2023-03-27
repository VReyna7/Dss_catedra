<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?=constant('TITULO')?></title>
</head>
 <?php 
    if(isset($_SESSION['USER'])){
        $opcionesLogeado = true;
    }else if(isset($_SESSION['EMPLEADO'])){
        $opcionesLogeado = true;
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
        foreach($this->datos as $row){
    ?>
        <div>
            <h3>titulo: <?php echo $row['titulo']; ?></h3>
            <h3>Descripcion: <?php echo $row['descripcion']?> </h3>
            <h3>Nombre empresa: <?php echo $row['NombreEmpresa']; ?></h3>
            <h3>Rubro: <?php echo $row['nombreRubro']; ?></h3>
            <h3>Precio regular: $ <?php echo $row['precioRegular']; ?></h3>
            <h3>Precio en oferta $ <?php echo $row['precioOferta']; ?></h3>
            <br>
        </div>
        <br>
    <?php } ?>
    <?php 
      require_once 'views/templates/footer.php';
    ?>
</body>
</html>