<section class="container text-center">
    <h2 class="display-4 text-white my-5">Tu carrito</h2>
    
<?php
    if (isset($_REQUEST['item'])){
        $producto=$_REQUEST["item"];
        unset($_SESSION["carrito"][$producto]);
       
header("location:index.php?seccion=cart");
 }
?>


<?php
$total=0;

if(isset($_SESSION["carrito"])){
   foreach($_SESSION["carrito"] as $indice =>$arreglo){
    $total += $arreglo["cant"] * $arreglo["precio"];   
    echo "   
    <div class='container'>
    <div class='row'>    
        <div class='col-12 col-md-12 col-lg-7 col-xl-8 my-2'>
            <ul class='list-unstyled  border-dark border-bottom border-2'>
            <li>  
        
                <div class='row align-items-center text-light mb-3'>
                
                        <div class='col-6 col-sm-4 col-lg-3'>
                                <div class='col-sm-12 col-lg-12 float-end'>               
                                            <figure>
                                            <a href='index.php?seccion=productos_detalle&id=".$arreglo["productos_id"]."' class='text-decoration-none'> 
                                            <img src='img/productos/".$arreglo["img"]."' alt='foto del sable ".$indice." ' class='img-tablet figure-img img-fluid w-75 my-2 mx-2 rounded float-end'></a>
                                            </figure>           
                                </div>
                        </div>
                        <div class='col-6 col-sm-4 col-lg-4'>   
                            <p class=' float-start mx-2 text-white'>Producto: <strong>". $indice  . "</strong><br>
                                                                    Cantidad: <strong>". $arreglo["cant"]  . "</strong> <br>
                                                                    Precio: $<strong>". $arreglo["precio"]  . "</strong> c/u<br>
                            </p>    
                        </div>
                
                        <div class='trash-pc col-12 col-sm-4 col-lg-5'>
                        <a class='btn btn-outline-danger float-center my-2' href='index.php?seccion=cart&item=$indice'>
                        <i class='fas fa-trash me-2'></i>Eliminar</a>
                        </div>
                        <div class='trash-mobile col-12 col-sm-4 col-lg-5'>
                        <a class='btn btn-outline-danger float-end my-2 mx-5' href='index.php?seccion=cart&item=$indice'>
                        <i class='fas fa-trash '></i></a>
                        </div>
                </div>
        
            </li>
            </ul>
        </div>      
                ";
   }  
   if(!empty($_SESSION["carrito"])){ 
        echo "
        <div class='col-12 col-md-8 col-lg-5 col-xl-4 mb-5'>
            <div class='card-body-cart bg-dark text-white'>
                
                    <ul class='list-unstyled'>
                    <li><h3>Resumen de compra</h3></li>
                    <div class='divider my-4'>
                    <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                    </div>
                        <li> 
                        <h4 class='my-2 text-end text-white'> TOTAL: <strong> $".$total."</strong> </h4>
                        <div class='divider my-3'>
                        <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                        </div>
                        <p class='text-start'><small>Descuentos aplicados durante el pago. <br>
                        Impuestos y gastos de envío calculados al finalizar la compra.</small></p>
                        </li>
                        <div class='divider'>
                        <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                        </div>
                        <li><a class='btn btn-outline-primary float-start my-3 me-1' href='index.php?seccion=productos'> Seguir comprando</a></li>
                        <li><div class='text-end my-3'><a class='btn btn-success' href='index.php?seccion=checkout'>Continuar compra</a></div></li>
                    </ul>
            </div>      
        </div>

    </div>
</div>
            ";
   }
}
?>

<?php
if(empty($_SESSION["carrito"])){
?>
    <div class="alert alert-info fade show my-5" role="alert">
    <h2 class="display-5"> <strong>Tu carrito está vacío</strong></h2>

                                <?php
                                if (!isset($_SESSION['usuario'])):
                                ?>
                                        <p class="lead">Para agregar al carrito, ¡Debés iniciar sesión!</p>      
                                
                                <?php
                                elseif ($_SESSION['usuario']['tipo_user_id_fk'] == 1 ):
                                ?> 
                                        <p class="lead">Sos administrador no podes agregar al carrito</p>  
                                
                                <?php
                                elseif ($_SESSION['usuario']['tipo_user_id_fk'] == 2):
                                ?>
                                        <p class="lead">¿No sabés qué comprar? ¡Miles de productos te esperan!</p>
                                   
                                <?php
                                endif;
                                ?>
    </div>
    
    <a class="btn btn-primary btn-lg float-start my-4 me-1" href="index.php?seccion=productos">Volver</a>
<?php
}
?>

    
</section>