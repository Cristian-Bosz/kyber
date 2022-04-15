<?php
  $select_blog='SELECT blog_id, fecha, autor, titulo, intro, img_miniatura 
FROM blog 
WHERE blog_id;'; 
$res_select_blog = mysqli_query($cnx, $select_blog);

?>

<div class="fondo_blogs">
<!--BANNER-->
<section class="container bg-dark">
 <div >
        <div class="row">
            <div id="galeria">
                    <div>
                        <img class="d-block w-100" src="img/wallpapers/holocron3.jpg" alt="Banner de la tienda">
                    </div>
            </div>
        </div>
    </div>

<!--/-->


<!--MENSAJE ALERT DE LA VALIDACION DE LOS ID DEL DETALLE DEL Blog-->
<?php
     if (isset($_GET['error']) && $_GET['error'] == 'blog_inexistente'):
?>

    <div class="container my-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ups! Hubo un error.</strong> El articulo que solicitaste no se encuentra disponible.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
 endif;
?>
<!--/-->


        <h2 class="display-4 mt-3 mb-2 text-white text-center">Holocrón</h2>
        <h3 class="text-white text-center mb-5">El Holocrón es la fuente de noticias, artículos, eventos, videos y actualizaciones de Kyber.</h3>
        <div class="row mb-3">


<!--RECORRO LOS blogs-->
<?php
  while($noticias = mysqli_fetch_assoc($res_select_blog)):
?>

     
        <div class="col-md-6 col-lg-4 bg-dark">
                        <div class="card mb-3 bg-dark">
                            <div class="card-body bg-dark mb-4">
                                <a href="index.php?seccion=blogs_detalle&id=<?= $noticias["blog_id"] ?>">
                                    <img class="card-img-top rounded" src="img/blogs/<?=$noticias["img_miniatura"]?>" alt="<?= ucfirst($noticias["titulo"]) ?>">
                                </a>

                                <div class="text-left mt-4 mb-1">
                                <p class="text-light"><em><?= ucfirst($noticias["fecha"])?> | <?= ucfirst($noticias["autor"])?></em></p> 
                                </div>

                                    <h3 class="text-white text-left mt-3"><?= ucfirst($noticias["titulo"]); ?></h3>
                                
                                    <div class="d-grid gap-2">
                                    <a class="btn btn-outline-info mt-4" href="index.php?seccion=blogs_detalle&id=<?= $noticias["blog_id"] ?>" role="button"><i class="bi bi-book mx-2"></i>Leer mas</a>
                                    </div>
                                </div>
                        </div>  
                    </div>

   <?php
      endwhile;
    ?>
<!--/-->
</div> 
</section>
<div>