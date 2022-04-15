<?php
$select_producto = 'SELECT * FROM productos WHERE productos_id = '. $_GET['id'];
$res_select_product = mysqli_query($cnx, $select_producto);
$sables = mysqli_fetch_assoc($res_select_product);

$select_cat = 'SELECT * FROM productos JOIN categorias ON categorias_id=categorias_id_fk WHERE productos_id = ' . $_GET['id'];
$res_select_cat = mysqli_query($cnx, $select_cat);
$categoria = mysqli_fetch_assoc($res_select_cat);

$select_col = 'SELECT * FROM productos JOIN colores ON colores_id=colores_id_fk WHERE productos_id = ' . $_GET['id'];
$res_select_col = mysqli_query($cnx, $select_col);
$colores = mysqli_fetch_assoc($res_select_col);


$select_coment = 'SELECT * FROM comentarios JOIN usuarios on usuarios_id=usuarios_id_fk WHERE productos_id_fk = ' . $_GET['id'];
$res_select_coment = mysqli_query($cnx, $select_coment);

if (!$sables) {
    header('Location: index.php?seccion=productos&error=producto_inexistente');
    exit;
}

?>

<section class="container-fluid mb-5">

                <div class="container my-5">
                    <div class="row">    
                        <div class="col-12 col-md-6 my-3">
                            <div class="container card bg-dark">       
                                <div class="card-body bg-dark mb-4">
                                    
                <!--INFO PARA AÑADIRLA A LA LISTA DE FAVORITOS-->
                                    <div class="fa-hover float-end col-md-3 col-sm-4"> 
                                        <form action="procesos/add_wish.php" method="POST">             
                                     
                                        <button type="submit" class="btn-wish float-end" name="btnAddWish"> <i class="bi bi-bookmark-heart" style="font-size: 2rem; color: lightblue;"></i></button>
     
                                                <input type="hidden" name="producto" value="<?= $sables['nombre'] ?>">
                                                <input type="hidden" name="precio" value="<?= $sables['precio'] ?>">
                                                <input type="hidden" name="img" value="<?= $sables['img'] ?>">  
                                                <input type="hidden" name="productos_id" value="<?= $sables['productos_id'] ?>">                       

                                        </form>
                                    </div>                     
                <!--/-->
                                    <figure>
                                        <img src="img/productos/<?=$sables["img"]?>" alt="<?= ucfirst($sables["nombre"]) ?>" class="img-fluid">
                                    </figure>
                                </div>

                                            <?php
                                            if (!isset($_SESSION['usuario'])):
                                            ?>
                                                <a class="btn btn-outline-secondary btn-lg mb-4 col-12" href="index.php?seccion=login" role="button">
                                                Añadir al carrito</a>                                                   
                                            <?php
                                            elseif ($_SESSION['usuario']['tipo_user_id_fk'] == 1 ):
                                            ?>
                                                <a class="btn btn-outline-secondary btn-lg mb-4 col-12" href="#" role="button"><i class="fa fa-lock" aria-hidden="true"></i>
                                                Añadir al carrito</a>                    
                                            <?php
                                            elseif ($_SESSION['usuario']['tipo_user_id_fk'] == 2):
                                            ?>
                                                <form action="procesos/add_cart.php" method="POST"> 
                                                    <div class="container">    
                                                    <div class="row">       
                                                            <input type="submit" name="btnAgregar" value="Agregar" class="btn btn-outline-danger btn-lg col-8">
                                                            <input type="number" name="cant" value="1" min="1" max="10" class="mx-2 col-3 rounded">
                                                    </div>
                                                    </div>    
                                                            <input type="hidden" name="producto" value="<?= $sables['nombre'] ?>">  
                                                            <input type="hidden" name="precio" value="<?= $sables['precio'] ?>">
                                                            <input type="hidden" name="img" value="<?= $sables['img'] ?>">
                                                            <input type="hidden" name="productos_id" value="<?= $sables['productos_id'] ?>">                       

                                                </form>
                                            <?php
                                            endif;
                                            ?>
                            </div>
                        </div>
                
                    
                        <div class="col-12 col-md-6 my-3">
                            <div class="card bg-dark text-white">
                                <div class="col-4 col-sm-5 col-md-6 col-lg-4 border border-warning rounded text-center mb-2 ">
                                <p class="lead my-1 text-warning"><?= ucfirst($categoria["cate_nombre"])?> </p>
                                </div>    
                                    <ul class="list-unstyled">
                                        <li> <h2 class="display-5 mb-4"><?= ucwords($sables["nombre"])?> </h2></li>
                                        <li> <h2 class="mb-4">$<?= $sables["precio"]?> </h2></li>
                                        <li><p class="lead text-justify"> <?= ucfirst($sables["descripcion"]) ?> </p></li>
                                        <li><p class="lead text-justify"> Color: <?= ucfirst($colores["color_nombre"]) ?> </p></li>
                                    </ul>
                            </div>      
                        </div>

                    </div>
                </div>










  
        <div class="container-fluid my-5">
            <div class= "row text-white justify-content-center bg-dark pastillitas-product">
            
               <h3 class="text-center text-white mt-5 mb-3"><strong>¿QUE VIENE EN LA CAJA?</strong></h3>             
  		                   
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 my-4  text-center rounded-circle">
                            <i class="fas fa-check fa-4x my-3"></i>
                                <h4> <b>Tu sable</b></h4> <p class="lead product-pills">Sable completamente ensamblado basado en las opciones de sable seleccionadas. </p>
                            </div>	

                            <div class="col-12  col-sm-6 col-md-6 col-lg-2  my-4  text-center">
                            <i class="fas fa-tools fa-4x my-3"></i>
                            <h4> <b>Herramientas para el sable</b></h4> <p class="lead product-pills">Cualquier llave/herramienta necesaria para el montaje/modificación del sable </p>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 my-4   text-center">
                            <i class="fas fa-slash fa-4x my-3"></i>
                            <h4> <b>Hoja del sable</b></h4> <p class="lead product-pills">Hoja de sable desmontable en la longitud que hayas elegido. </p>
                            </div>	

                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 my-4 text-center">
                            <i class="fas fa-plug fa-4x my-3"></i>
                            <h4> <b>Cargador del sable</b></h4> <p class="lead product-pills">Se proporcionará un cargador inteligente para todos los sables electrónicos instalados.  </p>
                            </div>
            </div>
        </div>
 




<article class="container my-5">
    <h2 class="text-white mt-5 mb-4"> Reseñas de clientes </h2>   
      

      <?php
        while ($comentario = mysqli_fetch_assoc($res_select_coment)):
        ?>
        <ul class="text-light list-unstyled border border-dark rounded">
            <li class="m-4">  
                <div class="row">
                        <div class="col-3 col-sm-2 col-lg-1">
                                <div class="col-sm-12 col-lg-12">     
                                    
                                        <?php
                                        if (!empty($comentario['img_user'])):
                                        ?>
                                                <figure>
                                                        <img src="img/users/<?= ($comentario['img_user']) ?>" 
                                                            alt="Avatar de <?= ($comentario['nombre']) ?>" class="figure-img img-fluid  rounded-circle">
                                                </figure>
                                        <?php
                                        elseif (empty($comentario['img_user'])):
                                        ?>
                                            <i class="fas fa-user-circle fa-3x"></i>         
                                        <?php
                                        endif;
                                        ?>
                                </div>
                        </div>
                        <div class="col-9 col-sm-10 col-lg-11">
                                    <p class="text-justify"><u><em><strong><?= ucfirst($comentario["nombre"]) ?> </strong></em> el <em><strong><?= ucfirst($comentario["fecha"]) ?></strong></em></u></p> 
                                
                                    <p class="lead text-justify"> <?= ucfirst($comentario["review"]) ?> </p>
                        </div>
                </div>
            </li>
 
        </ul>
        <?php
        endwhile;
        ?>




    </article>
    
    
</div>

</section>


