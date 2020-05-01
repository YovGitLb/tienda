<?php
include 'global/Config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php'; //incluimos el archivo donde esta la cabecera


?>

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
             height="370px"
             data-content="<?php echo $producto['DESCRIPCION'];?>">

            <div class="card-body">
                <span><?php echo $producto['NOMBRE'];?></span>
                <h5 class="card-title">S/<?php echo $producto['PRECIO'];?></h5>
                <p class="card-text">Descripcion</p>


                        <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['NOMBRE'],COD,KEY);?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['PRECIO'],COD,KEY);?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                    <!-- ocultando el formulario de encriptacion de type=text a hidden en el formulario-->

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

<?php include 'templates/pie.php';?>  



 <!--<form action="" method="POST">
                        <input type="text" name="id" id="id" value="<?php echo  $producto['ID'];?>">
                        <input type="text" name="nombre" id="nombre" value="<?php echo $producto['NOMBRE'];?>">
                        <input type="text" name="precio" id="precio" value="<?php echo $producto['PRECIO'];?>">
                        <input type="text" name="cantidad" id="cantidad" value="<?php echo 1;?>">

                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="button">Agrregar al carrito</button>
                
                       </form> -->


