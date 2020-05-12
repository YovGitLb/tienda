<?php
include 'global/Config.php';
include 'carrito.php';
include 'templates/cabecera.php'; //incluimos el archivo donde esta la cabecera


?>

<br>
<h3>Lista de Carrito</h3>
<!--validando si hay datos en el carrito de compra-->

<?php if(!empty($_SESSION['CARRITO'])){
    ?>  

<table class="table table-light table-bordered table-striped">
    <tbody>
        <tr>
            <th width="40%">DESCRIPCION</th>
            <th width="15%" class="text-center">CANTIDAD</th>
            <th width="20%" class="text-center">PRECIO</th>
            <th width="20%" class="text-center">TOTAL</th>
            <th width="5%">---</th>
        </tr>

        <?php $total=0;  ?>

        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="40%"><?php echo $producto['NOMBRE']?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2)?></td>
            <td width="5%">
            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                     <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>

            </form> 
          
        
            </td>
            
        </tr>

        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>

        <?php  }?>

        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>S/<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        
    </tbody>
</table>

<?php  }  else{  ?>
<div class="alert alert-success">
    No hay productos en el carrito....
</div>

    <?php }?>    

<?php include 'templates/pie.php'; //incluimos el archivo donde esta el pie de pagina
?> 


