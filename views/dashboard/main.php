<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/default.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/indexStyle.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            echo "<h1>Bienvenido ". $_SESSION['EMPLEADO']."</h1>";
        }
        ?>
        <div class="container-fluid">
         <div class="banner"></div>
        <h1 class="main-tittle">La cuponera</h1>
        <h5 class="main-subtittle">Donde encuentras de todo!</h5>
        <div class="row d-flex justify-content-center">
        <h2 class="alert alert-success"><?=$this->mensaje?></h2>
        <?php
        //if(isset($datos)){
        foreach($this->datos as $row){
        ?>
      
       

<div class="col-lg-5">
       <div class="card" id="card" style="width: 100%; background: linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url('<?php echo constant('URL')?>public/img/<?php echo $row['img']; ?>') no-repeat;    background-size: cover; background-position: center;">
        <div class="card-body">
          <div class="brand-logo" style="width: 100px; height: 100px; float: left; margin-right: 10px; background-image: url('<?php echo constant('URL')?>public/img/<?php echo $row['logo']; ?>') ; background-repeat: no-repeat; background-position: center; background-size: contain; margin-bottom: 10px;"></div>
        <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
        <h6 class="card-subtitle mb-2   ">Antes: <?php echo $row['precioRegular']; ?></h6>
        <h6 class="card-subtitle mb-2   ">Ahora: <?php echo $row['precioOferta']; ?></h6>
        <p class="card-text"><?php echo $row['descripcion'];?>.</p>
        <p class="card-text">Fecha de expiración: <?php echo $row['fechaFin'];?>.</p>
        <p><?php 
            if($row['cantidadLimite']==0){
                echo 'Sin limite';
            }else{
                echo 'Limite: '.$row['cantidadLimite'];
            }
        ?></p>
        <button type="button" class="btn btn-dark card-link" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['CodigoOferta']?>">Ver mas</button>
        <?php if(!$opcionesEmpleado){ ?>
        <a href="<?=constant('URL')?>dashboard/cupones/adquirirCupon/<?=$row['CodigoOferta']?>_<?=$_SESSION['USER']?>" class="card-link"><button class="btn  btn-primary">Adquirir cupon</button></a>
        <?php }?>
        </div>
        </div>
        </div>

   <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['CodigoOferta']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Más información</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="card-title"><b>Titulo de la promoción:</b> <?php echo $row['titulo']; ?></p>
        <p class="card-text"><b>Descripción:</b> <?php echo $row['descripcion'];?></p>
        <p class="card-text"><b>Fecha de inicio promoción:</b> <?php echo $row['fechaInicio'];?>.</p>
        <p class="card-text"><b>Fecha de finalización de compra:</b> <?php echo $row['fechaFin'];?>.</p>
        <p class="card-text"><b>Fecha limite de canejo al comprar:</b> <?php echo $row['fechaLimite'];?>.</p>
        <p class="card-text"><b>Nombre de la empresa con la oferta:</b> <?php echo $row['NombreEmpresa'];?>.</p>
        <p class="card-text"><b>Dirección de la empresa:</b> <?php echo $row['direccion'];?>.</p>
        <p class="card-text"><b>Rubro de la empresa:</b> <?php echo $row['nombreRubro'];?>.</p>
        <p><b>Cantidad maxima de cupones:</b> <?php 
            if($row['cantidadLimite']==0){
                echo 'Sin limite';
            }else{
                echo $row['cantidadLimite'];
            }
        ?></p>
        <p class="card-subtitle mb-2   "><b>Precio Antes: </b>  <?php echo $row['precioRegular']; ?>$</p>
        <p class="card-subtitle mb-2   "><b>Precio Ahora: </b>  <?php echo $row['precioOferta']; ?>$</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</div>
</div>
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
<?php 
     require_once 'views/templates/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
