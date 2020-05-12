<?php

session_start();

$mensaje="";

//desencriptando valores y validando la informacion en el carrito de compras al hacer POST

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':    

            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                 
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="ok Id correcto ".$ID."</br>";
                

            }
            else{

                $mensaje.="No se pudo registrar el pedido".$ID."</br>";

            }

            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){

                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Ok nombre ".$NOMBRE."</br>";

            } else{
                $mensaje.="Hay un problema al guardar el nombre"."</br>"; break;
            }


            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){

                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Ok Cantidad ".$CANTIDAD."</br>";

            } else{
                $mensaje.="No se pudo ingresar la cantidad, revisar"."</br>";break;
            }


            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){

                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Ok precio ".$PRECIO."</br>";
            } else{
                $mensaje.="Algo pasa con el precio"."</br>";break;
            }



                //--almacenando informacion en el carrito

                if(!isset($_SESSION['CARRITO'])){
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );

                 $_SESSION['CARRITO'][0]=$producto;       

                 }else{
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );

                    

                 $_SESSION['CARRITO'][$NumeroProductos]=$producto;   
                 
                

                  
                 }
                 

                 $mensaje=print_r($_SESSION,true);

                 
                 

                 


        break;

        case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                 
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
               foreach($_SESSION["CARRITO"] as $indice=>$producto)
               {
                    if($producto['ID']==$ID)
                    {
                        unset($_SESSION["CARRITO"][$indice]);
                        echo "<script>alert('Elemento borrado...');</script>";   

                    }

               }
                

            }
            else{

                $mensaje.="No se pudo registrar el pedido".$ID."</br>";

            }  


        break;
        
        
    }
    


     



}

//session_destroy();

?>

