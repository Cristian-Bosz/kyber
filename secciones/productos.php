<?php
  $select_productos='SELECT productos_id, nombre, img, precio, cate_nombre 
  FROM productos
  LEFT JOIN categorias ON categorias_id=categorias_id_fk 
  WHERE productos_id;';
  $resSelect=mysqli_query($cnx, $select_productos);

  
?>



<!--BANNER-->
<section class="bg-dark mt-2">
 <div class="container">
        <div class="row">
            <div id="galeria">
                    <div>
                        <img class="img-fluid" src="img/product-banner.jpg" alt="Banner de la tienda">
                    </div>
            </div>
        </div>
    </div>
</section>
<!--/-->

<!--MENSAJE ALERT DE LA VALIDACION DE LOS ID DEL DETALLE DEL PRODUCTO-->
<?php
     if (isset($_GET['error']) && $_GET['error'] == 'producto_inexistente'):
?>
    <div class="alert alert-danger d-flex align-items-center my-2" role="alert">
        <i class="fas fa-exclamation-triangle mx-2"></i><strong>Ups! Hubo un error.</strong>  El producto que solicitaste no se encuentra disponible.
    </div>
<?php
 endif;
?>
<!--/-->


            <?php
            if (!empty($_SESSION['error_busqueda'])):
            ?>
                <div class="container my-3">
                    <div class="alert alert-danger fade show" role="alert">
                        <?= $_SESSION['error_busqueda'] ?>
                    </div>
                </div>
            <?php
            endif;
            unset($_SESSION['error_busqueda']);
            ?> 




<nav class="container navbar navbar-light my-5">
    <form action="procesos/p_buscador.php" method="GET" class="form-inline ">
            <div class="input-group">
                <input class="form-control my-2" type="search" name="buscar" id="buscar" placeholder="Buscar"  value="<?= isset($_SESSION['buscar']) ? $_SESSION['buscar']['palabra'] : '' ?>">
                <button class="btn btn-outline-success my-2 mx-1" type="submit">Buscar</button>
            </div>  
    </form>
    
</nav>
   

<section class="container" >
        <div class="row mb-3">

                 <?php
                    if (isset($_SESSION['buscar'])) {
                        foreach ($_SESSION['buscar']['resultados'] as $sables) {
                    ?>

                    <div class="col-sm-6 col-md-6 col-lg-4 bg-dark">
                        <div class="card mb-3 bg-dark">
                            <div class="card-body bg-dark mb-4">
                            <a href="index.php?seccion=productos_detalle&id=<?= $sables["productos_id"] ?>" class="text-decoration-none">
                                <img class="card-img-top rounded" src="img/productos/<?=$sables["img"]?>" alt="<?= ucfirst($sables["nombre"]) ?>">
                            

                               <div class="col-4 col-sm-5 col-md-6 col-lg-6 border border-warning rounded text-center mt-4 mb-1">
                               <p class="lead my-1 text-warning"><?= ucfirst($sables["cate_nombre"])?> </p>
                              </div>

                                <h2 class="display-6 text-white text-left mt-3"><?= ucfirst($sables["nombre"]); ?></h2>
                                <p class="lead text-white">$<?= $sables["precio"]; ?></p>
                             </a>   
                               
                            </div>
                        </div>  
                    </div>

                        
<!--RECORRO LOS PRODUCTOS DE LA TIENDA-->
<?php
    }
}else{
  while($sables = mysqli_fetch_assoc($resSelect)):
?>

     
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 bg-dark">
                        <div class="card mb-3 bg-dark">
                            <div class="card-body bg-dark mb-4">
                            <a href="index.php?seccion=productos_detalle&id=<?= $sables["productos_id"] ?>" class="text-decoration-none">
                                <img class="card-img-top rounded" src="img/productos/<?=$sables["img"]?>" alt="<?= ucfirst($sables["nombre"]) ?>">
                            

                               <div class="col-4 col-sm-5 col-md-6 col-lg-6 border border-warning rounded text-center mt-4 mb-1">
                               <p class="lead my-1 text-warning"><?= ucfirst($sables["cate_nombre"])?> </p>
                              </div>

                                <h2 class="display-6 text-white text-left mt-3"><?= ucfirst($sables["nombre"]); ?></h2>
                                <p class="lead text-white">$<?= $sables["precio"]; ?></p>
                                
                    
                               </a>
                            </div>
                        </div>  
                    </div>

   <?php
      endwhile;
    }
    ?>
<!--/-->
        </div> 
</section>


