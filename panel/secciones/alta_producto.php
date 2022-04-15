<?php
$select_categorias = "SELECT * FROM categorias;";
$res_select_categorias = mysqli_query($cnx, $select_categorias);

$select_colors = "SELECT * FROM colores;";
$res_select_colors = mysqli_query($cnx, $select_colors);

$errores=[];
if (!empty($_GET['campo']))
    $errores = json_decode($_GET['campo']);



$producto = [];
$accion='Crear';
$archivo = 'alta_productos.php';

//EDITAR Aqui chequeo que no este vacio el id asi podemos editarlo

if(!empty($_GET['id'])){
    $producto_id = $_GET['id'];
    $select_prod = "SELECT productos_id, img, nombre, descripcion, precio, cate_nombre, color_nombre
    FROM productos
    JOIN categorias ON categorias_id=categorias_id_fk 
    JOIN colores ON colores_id=colores_id_fk 
    WHERE productos_id=$producto_id";
    $res_select_prod = mysqli_query($cnx, $select_prod);
    
    if (!$res_select_prod->num_rows){
        header("Location: ../panel.php?seccion=listado_productos&status=error");
         exit;
    }
    $accion='Editar';
    $archivo = 'editar_productos.php';
    $producto = mysqli_fetch_assoc($res_select_prod);
}

//EDITAR

?>




<section class="container" id="alta_producto">

<?php
if(!empty($_GET['tipo']) && $_GET['tipo'] == 'producto'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-5">Hubo un error al cargar el producto. Intenta nuevamente.</h2>
 </div>

<?php
endif;
?>

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-5">Hubo un error al cargar el producto. Intenta nuevamente..</h2>
 </div>

<?php
endif;
?>


    
        <h2 class="display-4 text-info text-center my-3"><b><?= $accion?></b> producto</h2>
                
                <div class="text-white">
                    <form action="procesos/<?= $archivo ?>" method="POST" enctype="multipart/form-data">
                <!--pasamos el id de lo que vamos editar-->
                        <?php
                        if(isset($producto['productos_id'])):
                        ?>
                        <input type="hidden" name="id" value="<?= $producto['productos_id']?>">
                        <?php
                        endif;    
                        ?>
                <!--/-->



    <div class='container my-5'>
    <a class="btn btn-primary mb-5" href="panel.php?seccion=listado_productos" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>

    <div class='row'>    

<!--IMAGEN-->
    <div class='col-12 col-md-8 col-lg-5 col-xl-4 mb-5'>
            <div class='card-body-cart bg-dark text-white'>
                
         
                                            <figure class="card shadow border-warning">
                                                <img src="../img/<?= !empty($producto['img']) ? 'productos/' . $producto['img'] : 'panel_producto.png' ?>" 
                                                alt="<?= empty($producto['nombre']) ? $producto['nombre'] : 'Sable nuevo' ?>" class=" rounded">
                                            </figure>

                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="inputGroupFile01" name="img">
                                                    <label class="custom-file-label" for="inputGroupFile01">Elegí una foto</label>
                                                </div>
                                            </div>

                                            <?php
                                            if (isset($errores->img)):
                                                ?>
                                                 <p class="fw-bold text-danger">
                                                    <?= $errores->img ?>
                                            </p>
                                                
                                            <?php
                                            endif;
                                            ?>
                                        
                  
            </div>      
        </div>
<!--/-->
<!--FORMULARIO DATOS DEL PRODUCTO-->
        <div class='col-12 col-md-12 col-lg-7 col-xl-8 my-2'>
            <ul class='list-unstyled'>
            <li>  
        
                <div class='row align-items-center text-light mb-3'>
                
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" 
                                        value="<?= isset($producto['nombre']) ? $producto['nombre'] : '' ?>" >
                                                <?php
                                                if(isset($errores->nombre)):
                                                ?>
                                                       
                                                      <p class="fw-bold text-danger"> <?= $errores->nombre?></p>
                                                        
                                                        
                                                <?php
                                                endif;
                                                ?>
                                    </div>


                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                        <label for="precio">Precio</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-dark text-warning m-1">$</span>
                                                <input type="text" class="form-control" id="precio" name="precio" value="<?= isset($producto['precio']) ? $producto['precio'] : '' ?>">
                                            </div>
                                            <?php
                                            if(isset($errores->precio)):
                                            ?>
                                                     <p class="fw-bold text-danger">
                                                    <?= $errores->precio?>
                                                    </p>
                                            <?php
                                            endif;
                                            ?>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                            <label for="categoria">Categoría</label>
                                            <select name="categoria" id="categoria" class="form-select text-dark">
                                                <option value="0" <?= !isset($producto) ? 'selected' : '' ?>  class="text-dark">Seleccione una
                                                    categoría
                                                </option>
                                                    <?php
                                                    while ($cate = mysqli_fetch_assoc($res_select_categorias)):
                                                    ?>
                                                        <option value="<?= $cate['categorias_id'] ?>" class=" text-dark" <?= in_array($cate['cate_nombre'], $producto) ? 'selected' : '' ?>> 
                                                        <?= ucfirst($cate['cate_nombre']) ?></option>
                                                    <?php
                                                    endwhile;
                                                    ?>
                                            </select>
                                                <?php
                                                if(isset($errores->categoria)):
                                                ?>
                                                         <p class="fw-bold text-danger">
                                                        <?= $errores->categoria?>
                                                </p>
                                                <?php
                                                endif;
                                                ?>
                                        </div>
        
        

     
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mx-2 my-2">
                                        <label for="color">Color</label>
                                        <select name="color" id="color" class="form-select text-dark">
                                            <option value="0" <?= !isset($producto) ? 'selected' : '' ?> class=" text-dark">Seleccione un
                                                color
                                            </option>
                                            <?php
                                             while ($colores = mysqli_fetch_assoc($res_select_colors)):
                                            ?>
                                                    <option value="<?= $colores['colores_id'] ?>" class="text-dark" 
                                                    <?= in_array($colores['color_nombre'], $producto) ? 'selected' : '' ?>
                                                    ><?= ucfirst($colores['color_nombre']) ?></option>
                                                <?php
                                                endwhile;
                                                ?>
                                        </select>
                                            <?php
                                            if(isset($errores->color)):
                                            ?>
                                                     <p class="fw-bold text-danger">
                                                    <?= $errores->color?>
                                            </p>
                                            <?php
                                            endif;
                                            ?>
                                        
                                    </div>

                                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 mx-2 my-2">
                                            <label for="descripcion" class="col-12">Descripción</label>
                                            <textarea name="descripcion" id="descripcion" rows="6"
                                                    class="col-12 rounded text-dark p-2"><?= isset($producto['descripcion']) ? $producto['descripcion'] : '' ?> </textarea>

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
                                        
                                        
                                        
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mx-2 my-2">
                                        <button class="btn btn-warning" type="submit"><i class="bi bi-tools mx-1"></i><strong><?= $accion?> producto</strong></button>
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