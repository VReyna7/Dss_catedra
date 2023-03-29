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
        <h1 class="main-tittle">La cuponera</h1>
        <h5 class="main-subtittle">Donde encuentras de todo!</h5>
         <div class="banner"></div>
         
        <div class="row d-flex justify-content-center">
        <?php
        //if(isset($datos)){
        foreach($this->datos as $row){
        ?>
      
       

<div class="col-lg-5">
        <div class="card" id="card" style="width: 100%; background: linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url('../../public/img/<?php echo $row['img']; ?>') no-repeat;    background-size: cover; background-position: center;">
        <div class="card-body">
        <div class="brand-logo" style="width: 100px; height: 100px; float: left; margin-right: 10px; background-image: url('../../public/img/<?php echo $row['logo']; ?>') ; background-repeat: no-repeat; background-position: center; background-size: contain; margin-bottom: 10px;"></div>
        <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
        <h6 class="card-subtitle mb-2   ">Antes: <?php echo $row['precioRegular']; ?></h6>
        <h6 class="card-subtitle mb-2   ">Ahora: <?php echo $row['precioOferta']; ?></h6>
        <p class="card-text"><?php echo $row['descripcion'];?>.</p>
        <a href="#" class="card-link"> <button class="btn  btn-dark">Ver mas</button></a>
        <?php if(!$opcionesEmpleado){ ?>
            <button type="button" id="btnmodal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-nom="jose">Adquirir cupon</button>

            <?php }?>
        <p><?php 
            if($row['cantidadLimite']==0){
                echo 'Sin limite';
            }else{
                echo 'Limite: '.$row['cantidadLimite'];
            }
        ?></p>
        </div>
        </div>
        </div>


    <?php } ?>
    </div>
    </div>
    <script>
            $(document).on("click", "#btnmodal", function () {
                var nombre =$(this).data('nom');
                $("#nombre").val(nombre);})
                </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label >nombre: </label> <input type="text" id="nombre" name=""   >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
<?php 
      require_once 'views/templates/footer.php';
    ?>
</html>