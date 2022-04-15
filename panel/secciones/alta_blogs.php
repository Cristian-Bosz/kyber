<?php


$errores=[];
if (!empty($_GET['campo']))
    $errores = json_decode($_GET['campo']);



$articulo = [];
$accion='Crear';
$archivo = 'p_alta_blog.php';

//EDITAR Aqui chequeo que no este vacio el id asi podemos editarlo

if(!empty($_GET['id'])){
    $blog_id = $_GET['id'];
    $select_blog = "SELECT blog_id, img_miniatura, img_principal, titulo, descripcion, intro, fecha, autor, video
    FROM blog
    WHERE blog_id=$blog_id";
    $res_select_blog = mysqli_query($cnx, $select_blog);
    
    if (!$res_select_blog->num_rows){
        header("Location: ../panel.php?seccion=listado_blogs&status=error");
         exit;
    }
    $accion='Editar';
    $archivo = 'p_editar_blog.php';
    $articulo = mysqli_fetch_assoc($res_select_blog);
}

//EDITAR

?>




<section class="m-5" id="alta_blogs">

<?php  
if(!empty($_GET['tipo']) && $_GET['tipo'] == 'articulo'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-5">Hubo un error al cargar el articulo. Intenta nuevamente.</h2>
 </div>

<?php
endif;
?>

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-5">Hubo un error al cargar el articulo. Intenta nuevamente..</h2>
 </div>

<?php
endif;
?> 


  
                    <h2 class="display-4 text-info text-center"><b><?= $accion?></b> nuevo artículo</h2>
               
                <div class="text-white">
                    <form action="procesos/<?= $archivo ?>" method="POST" enctype="multipart/form-data">
              <!--pasamos el id de lo que vamos editar-->
              <?php
                        if(isset($articulo['blog_id'])):
                        ?>
                        <input type="hidden" name="id" value="<?= $articulo['blog_id']?>">
                        <?php
                        endif;    
                        ?>
                <!--/-->



    <div class='container-fluid my-5'>
    <a class="btn btn-primary mb-4" href="panel.php?seccion=listado_blogs" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>

    <div class='row'>    

<!--IMAGEN-->
    <div class='col-12 col-md-8 col-lg-5 col-xl-2 mb-5'>
            <div class='card-body-cart bg-dark text-white'>
                
         
                                              <label for="img_min" class="text-warning">Imagen de miniatura                                           
                                            </label>
                                            

                                        <figure class="card shadow border-warning">
                                            <img src="../img/<?= !empty($articulo['img_miniatura']) ? 'blogs/' . $articulo['img_miniatura'] : 'panel_miniatura.png' ?>" 
                                            alt="<?= empty($articulo['titulo']) ? $articulo['titulo'] : 'articulo nuevo' ?>" class="rounded">
                                        </figure>

                                        <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="img_miniatura" name="img_miniatura">
                                                    <label class="custom-file-label" for="img_miniatura">Elegí una foto para la miniatura</label>
                                                </div>
                                                <?php
                                                if (isset($errores->img_miniatura)):
                                                    ?>
                                                    <p class="fw-bold text-danger">
                                                        <?= $errores->img_miniatura ?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>        
                                        </div>
                                        
                  
            </div>      

                                            </div>
            <div class='col-12 col-md-8 col-lg-5 col-xl-3 mb-5'>

            <div class='card-body-cart bg-dark text-white'>
                
                                        <label for="img_pri" class="text-warning">Imagen de portada                                   
                                        </label>
                                    

                                        <figure class="card shadow border-warning">
                                            <img src="../img/<?= !empty($articulo['img_principal']) ? 'blogs/' . $articulo['img_principal'] : 'panel_portada.png' ?>" 
                                            alt="<?= empty($articulo['titulo']) ? $articulo['titulo'] : 'articulo nuevo' ?>" class="rounded">
                                        </figure>

                                        <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="img_principal" name="img_principal">
                                                    <label class="custom-file-label" for="img_principal">Elegí una foto para el articulo</label>
                                                </div>
                                                <?php
                                                if (isset($errores->img_principal)):
                                                    ?>
                                                    <p class="fw-bold text-danger">
                                                        <?= $errores->img_principal ?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>   
                                        </div>
            </div>      
        </div>
<!--/-->
<!--FORMULARIO DATOS DEL PRODUCTO-->
        <div class='col-12 col-md-12 col-lg-7 col-xl-7 my-2'>
            <ul class='list-unstyled'>
            <li>  
        
                <div class='row align-items-center text-light mb-3'>
                
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                    <label for="titulo" class="text-warning">Título</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" 
                                        value="<?= isset($articulo['titulo']) ? $articulo['titulo'] : '' ?>" >
                                        <?php
                                                if(isset($errores->titulo)):
                                                ?>
                                                        <p class="fw-bold text-danger">
                                                       <?= $errores->titulo?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>
                                    </div>


                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                    <label for="fecha" class="text-warning" >Fecha</label>
                                        <input type="date" id="fecha" name="fecha" value="<?= isset($articulo['fecha']) ? $articulo['fecha'] : '' ?>" min="1980-01-01" max="2022-12-31">
                                        <?php
                                                if(isset($errores->fecha)):
                                                ?>
                                                        <p class="fw-bold text-danger">
                                                       <?= $errores->fecha?>
                                                         </p>
                                                <?php
                                                endif;
                                                ?>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                    <label for="intro" class="text-warning">Subtítulo</label>
                                    <textarea name="intro" id="intro" rows="6"
                                            class="col-12 rounded text-dark"><?= isset($articulo['intro']) ? $articulo['intro'] : '' ?> </textarea>
                                            <?php
                                                if(isset($errores->intro)):
                                                ?>
                                                        <p class="fw-bold text-danger">
                                                       <?= $errores->intro?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>
                                        </div>
        
        

     
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                    <label for="autor" class="text-warning">Autor</label>
                                        <input type="text" class="form-control" id="autor" name="autor" 
                                        value="<?= isset($articulo['autor']) ? $articulo['autor'] : '' ?>" >
                                        <?php
                                                if(isset($errores->autor)):
                                                ?>
                                                        <p class="fw-bold text-danger">
                                                       <?= $errores->autor?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>    
                                        
                                    </div>

                                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 mx-2 my-2">
                                     <label for="descripcion" class="text-warning">Descripción</label>
                                        <textarea name="descripcion" id="descripcion" rows="6"
                                                class="col-12 rounded text-dark"><?= isset($articulo['descripcion']) ? $articulo['descripcion'] : '' ?> </textarea>
                                                <?php
                                                if(isset($errores->descripcion)):
                                                ?>
                                                        <p class="fw-bold text-danger">
                                                       <?= $errores->descripcion?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>
                                        </div>
                                        
                                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 mx-2 my-2"> 
                                        <label for="video" class="text-warning">URL de video (opcional)</label>
                                        <input type="text" class="form-control" id="video" name="video" 
                                        value="<?= isset($articulo['video']) ? $articulo['video'] : '' ?>" >
                                        <?php
                                                if(isset($errores->video)):
                                                ?>
                                                        <p class="fw-bold text-danger">
                                                       <?= $errores->video?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>    
                                        </div>


                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mx-2 my-2">
                                        <button class="btn btn-warning" type="submit"><i class="bi bi-chat-square-text-fill mx-2"></i><strong><?= $accion?> articulo</strong></button>
                                      
                                        </div>


                </div>
        
            </li>
            </ul>
        </div>      
             

    </div>
</div>



                    </form>
    </div>
</section>