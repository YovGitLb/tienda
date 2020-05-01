<?php
include 'global/Config.php';
include 'global/conexion.php';
include 'carrito.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand">Logo de la Empresa</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Carrito(0)</a>
            </li>
        </ul>
    </div>
</nav>
</br>
</br>

<div class="container">
<br>
<div class="alert alert-success">
    
   <!--- Pantalla de mensaje....
    <?php print_r($_POST);?>-------------------------->



    <?php echo $mensaje;?>




<a href="" class="badge badge-success">Ver Carrito</a>

</div>

<div class="row">

    <?php
    
    $sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
    $sentencia->execute();
    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaProductos);
    
    
    ?>
    <?php 
     foreach($listaProductos as $producto) 
     {  ?>

      <div class="col-3"> 
        <div class="card">
            <img title="<?php echo $producto['NOMBRE'];?>" alt="<?php echo $producto['NOMBRE'];?>"
             class="card-img-top" src="<?php echo $producto['IMAGEN'];?>"
             data-toggle="popover"
             data-trigger="hover"
             data-content="<?php echo $producto['DESCRIPCION'];?>">

            <div class="card-body">
                <span><?php echo $producto['NOMBRE'];?></span>
                <h5 class="card-title">S/<?php echo $producto['PRECIO'];?></h5>
                <p class="card-text">Descripcion</p>


                        <form action="" method="post">
                        <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                        <input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['NOMBRE'],COD,KEY);?>">
                        <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['PRECIO'],COD,KEY);?>">
                        <input type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">


                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carritoo</button>
                
                       </form>

                        
        
            </div>
        </div>
    
    
      </div>

    <?php } ?>  
    
   

 

 

</div>


    
</div>

<script>
    $(function () {
  $('[data-toggle="popover"]').popover()
});


</script>
    
</body>

</html>


 <!--<form action="" method="POST">
                        <input type="text" name="id" id="id" value="<?php echo  $producto['ID'];?>">
                        <input type="text" name="nombre" id="nombre" value="<?php echo $producto['NOMBRE'];?>">
                        <input type="text" name="precio" id="precio" value="<?php echo $producto['PRECIO'];?>">
                        <input type="text" name="cantidad" id="cantidad" value="<?php echo 1;?>">

                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="button">Agrregar al carrito</button>
                
                       </form> -->


