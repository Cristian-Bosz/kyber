<section class="container text-center">
    <h2 class="display-4 text-white my-5">Lista de favoritos</h2>
    
<?php
    if (isset($_REQUEST['item'])){
        $producto=$_REQUEST["item"];
        unset($_SESSION["deseos"][$producto]);
       
header("location:index.php?seccion=wish");
 }
?>


<?php
$total=0;

if(isset($_SESSION["deseos"])){
   foreach($_SESSION["deseos"] as $indice =>$arreglo){
       echo "
                <section class='container'>
                    <ul class='list-unstyled border border-dark rounded'>
                    <li class='my-1'>  
                   
                        <div class='row align-items-center text-light '>
                        
                                <div class='col-6 col-sm-4 col-lg-3'>
                                        <div class='col-sm-12 col-lg-12 float-end'>               
                                                    <figure>
                                                    <a href='index.php?seccion=productos_detalle&id=".$arreglo["productos_id"]."' class='text-decoration-none'> 
                                                    <img src='img/productos/".$arreglo["img"]."' alt='foto del sable ".$indice." ' class='figure-img img-fluid w-50 my-2 mx-2 rounded float-end'></a>
                                                    </figure>           
                                        </div>
                                </div>
                                <div class='col-6 col-sm-4 col-lg-4'>
                                      <a href='index.php?seccion=productos_detalle&id=".$arreglo["productos_id"]."' class='text-decoration-none'>   
                                      <p class=' float-start mx-2 text-white'>Producto: <strong>". $indice  . "</strong><br>
                                        Precio: $<strong>". $arreglo["precio"]  . "</strong><br></p>    
                                      </a>   
                                </div>
                          
                                <div class='col-12 col-sm-4 col-lg-5'>
                                <a class='btn btn-danger float-center my-2' href='index.php?seccion=wish&item=$indice'>
                                <i class='fas fa-heart-broken me-2'></i>Eliminar</a>
                                </div>
                        </div>
                   
                     </li>
                    </ul>
                </section>
     
                    ";
   }  

}
?>

<?php
if(empty($_SESSION["deseos"])){
?>
    <div class="alert alert-info fade show my-5" role="alert">
    <h2 class="display-5"> <strong>Tu lista está vacía</strong></h2>
    <p class="lead">Nada por acá... Aún no tenés productos en Favoritos</p> 
    </div>';
<?php
}
?>




<br>
<a class="btn btn-primary btn-lg float-start my-4 me-1" href="index.php?seccion=productos">Volver</a>




    
</section>