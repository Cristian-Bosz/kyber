
  <div class='container my-5'>
    <div class='row'>    
        <div class='col-12 col-md-12 col-lg-7 col-xl-8 my-2'>
           





<!--Acordeon del resumen de compra para mobile-->
        <div class="accordion accordion-flush resumen-mobile mb-4" id="accordionFlushExample">
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header text-white" id="flush-headingOne">
                    <button class="accordion-button collapsed check-acordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"><i class="bi bi-cart mx-2"></i>
                        Mostar resumen de compra   
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse bg-dark" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-dark">
                    
                <!--resumen en mobile-->
                        <div class=' col-12 col-md-8 col-lg-5 col-xl-4 mb-5'>
                            <div class='card-body-cart bg-dark text-white'>
                                
                                    <ul class='list-unstyled'>
                                    <li><h3>Resumen de compra</h3></li>
                                    <div class='divider my-4'>
                                    <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                    </div>

                <?php
                $total=0;

                if(isset($_SESSION["carrito"])){
                foreach($_SESSION["carrito"] as $indice =>$arreglo){
                    $total += $arreglo["cant"] * $arreglo["precio"];   
                ?>                    
                                    <div class='row align-items-center text-light mb-3'>
                                            <div class='col-6 col-sm-4 col-lg-4'>
                                                    <div class='col-sm-12 col-lg-12 float-end'>               
                                                                <figure>
                                                                <a href='index.php?seccion=productos_detalle&id=<?=$arreglo["productos_id"]?>' class='text-decoration-none'> 
                                                                <img src='img/productos/<?=$arreglo["img"]?>' alt='foto del sable <?=$indice?> ' class='img-tablet figure-img img-fluid w-75 my-2 mx-2 rounded float-end'></a>
                                                                </figure>           
                                                    </div>
                                            </div>
                                            <div class='col-6 col-sm-4 col-lg-6'>   
                                                <p class=' float-start mx-2 text-white'>Producto: <strong><?= $indice  ?></strong><br>
                                                                                        Cantidad: <strong><?=  $arreglo["cant"]  ?> </strong> <br>
                                                                                        Precio: $<strong><?=  $arreglo["precio"] ?></strong> c/u<br>
                                                </p>    
                                            </div>
                                    </div>
                <?php
                }
                }
                ?>
                                    <div class='divider my-3'>
                                        <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                        </div>

                                        <table class="table">
                                            <tbody class="text-white lead">
                                                <tr>  
                                                <td>Subtotal</td>
                                                <td class="float-end">$<?=$total?></td>
                                                </tr>

                                                <tr>
                                                <td>Envio</td>
                                                <td class="float-end text-success">Gratis</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                
                                        <div class='divider'>
                                        <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                        </div>



                                        <table class="table">
                                    <tbody class="text-white lead">
                                        <tr>
                                                <td class="fw-bold">TOTAL</td>
                                                <td class="float-end fw-bold"><strong>$<?=$total?></strong></td>
                                                </tr>
                                                </tbody>
                                        </table>

                                        <div class='divider'>
                                        <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                        </div>

                                
                                    </ul>       
                            </div>    
                                
                        </div>
                <!--/-->

                </div>
                </div>
            </div>
</div>





                <div class='row align-items-center text-light mb-3'>
                              
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-white"><a href="index.php?seccion=cart" class="text-decoration-none">Carrito</a></li>
                        <li class="breadcrumb-item active text-white fw-bold" aria-current="page">Información</li>
                        <li class="breadcrumb-item active text-white">Envío</li>
                        <li class="breadcrumb-item active text-white">Pago</li>
                    </ol>
                    </nav>
                    
                </div>
            
<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2>Hubo un error al guardar estos nuevos datos.<strong> Campos incompletos.</strong> Intenta nuevamente..</h2>
 </div>

<?php
endif;
?> 
            <form action="procesos/p_checkout.php" method="post" class="text-white">
                <h2 class="mt-5">Datos personales</h2>
                            <div class="input-group ">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 check-nombre mx-1 my-2">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" 
                                        value="<?= isset($_SESSION['campos']) && isset($_SESSION['campos']['nombre']) ?  $_SESSION['campos']['nombre'] : '' ?>" >
                                                <?php
                                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['nombre'])):
                                                ?>                                       
                                                 <p class="text-danger"> <?= $_SESSION['errores']['nombre'] ?> </p>
     
                                                <?php
                                                endif;
                                                ?>
                                    </div>


                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 check-apellido mx-1 my-2">
                                    <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" 
                                        value="<?= isset($_SESSION['campos']) && isset($_SESSION['campos']['apellido']) ?  $_SESSION['campos']['apellido'] : '' ?>" >
                                                <?php
                                                    if (isset($_SESSION['errores']) && isset($_SESSION['errores']['apellido'])):
                                                ?>                                       
                                                <p class="text-danger"> <?= $_SESSION['errores']['apellido'] ?> </p>
     
                                                <?php
                                                endif;
                                                ?>
                                    </div>
                            </div>  
                            
                            <div class="input-group ">                           
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-5 check-tel mx-1 my-2">
                                            <label for="tel">Telefono/Celular</label>
                                                <input type="text" class="form-control" id="tel" name="tel" 
                                                value="<?= isset($_SESSION['campos']) && isset($_SESSION['campos']['tel']) ?  $_SESSION['campos']['tel'] : ''?>">
                                                        <?php
                                                        if (isset($_SESSION['errores']) && isset($_SESSION['errores']['tel'])):
                                                        ?>                                       
                                                         <p class="text-danger"> <?= $_SESSION['errores']['tel'] ?> </p>
     
                                                        <?php
                                                        endif;
                                                        ?>
                                    </div>
                
        

     
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-5 check-dni mx-1 my-2">
                                            <label for="dni">Documento</label>
                                                <input type="text" class="form-control" id="dni" name="dni" 
                                                value="<?= isset($_SESSION['campos']) && isset($_SESSION['campos']['dni']) ?  $_SESSION['campos']['dni'] : ''?>" >
                                                        <?php
                                                        if (isset($_SESSION['errores']) && isset($_SESSION['errores']['dni'])):

                                                        ?>                                       
                                                        <p class="text-danger"> <?= $_SESSION['errores']['dni'] ?> </p>
                                                        <?php
                                                        endif;
                                                        ?>
                                    </div>
                            </div>
                            <div class="input-group ">
                            
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 check-email mx-1 my-2">
                                            <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?=$_SESSION['usuario']['email'] ?>">
                                                        <?php
                                                   if (isset($_SESSION['errores']) && isset($_SESSION['errores']['email'])):

                                                        ?>                                       
                                                   <p class="text-danger"> <?= $_SESSION['errores']['email'] ?> </p>
       
                                                        <?php
                                                        endif;
                                                        ?>
                                    </div>
                
                            </div>
                                        



                        
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10  mx-1 my-5">
                                <a class='btn btn-outline-primary float-start' href='index.php?seccion=cart'> Seguir comprando</a>
                                <div class='text-end'> <button class="btn btn-success" type="submit">Continuar compra</button></div>  
                               
                            </div>


				 </form>




        </div>      
               









<!--Resumen de compra para pc-->
        <div class='resumen-pc col-12 col-md-8 col-lg-5 col-xl-4 mb-5'>
            <div class='card-body-cart bg-dark text-white'>
                
                <ul class='list-unstyled'>
                    <li><h3>Resumen de compra</h3></li>
                    <div class='divider my-4'>
                    <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                    </div>

                    <?php
                    $total=0;

                    if(isset($_SESSION["carrito"])){
                    foreach($_SESSION["carrito"] as $indice =>$arreglo){
                        $total += $arreglo["cant"] * $arreglo["precio"];   
                    ?>                    
                                        <div class='row align-items-center text-light mb-3'>
                                                <div class='col-6 col-sm-4 col-lg-4'>
                                                        <div class='col-sm-12 col-lg-12 float-end'>               
                                                                    <figure>
                                                                    <a href='index.php?seccion=productos_detalle&id=<?=$arreglo["productos_id"]?>' class='text-decoration-none'> 
                                                                    <img src='img/productos/<?=$arreglo["img"]?>' alt='foto del sable <?=$indice?> ' class='img-tablet figure-img img-fluid w-75 my-2 mx-2 rounded float-end'></a>
                                                                    </figure>           
                                                        </div>
                                                </div>
                                                <div class='col-6 col-sm-4 col-lg-6'>   
                                                    <p class=' float-start mx-2 text-white'><strong><?= $indice  ?></strong><br>
                                                                                            Cantidad: <strong><?=  $arreglo["cant"]  ?> </strong> <br>
                                                                                            $<strong><?=  $arreglo["precio"] ?></strong> c/u<br>
                                                    </p>    
                                                </div>
                                        </div>
                    <?php
                    }
                    }
                    ?>
                                        <div class='divider my-3'>
                                            <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                            </div>

                                            <table class="table">
                                                <tbody class="text-white lead">
                                                    <tr>  
                                                    <td>Subtotal</td>
                                                    <td class="float-end">$<?=$total?></td>
                                                    </tr>

                                                    <tr>
                                                    <td>Envio</td>
                                                    <td class="float-end text-success">Gratis</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    
                                            <div class='divider'>
                                            <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                            </div>



                                            <table class="table">
                                        <tbody class="text-white lead">
                                            <tr>
                                                    <td class="fw-bold">TOTAL</td>
                                                    <td class="float-end fw-bold"><strong>$<?=$total?></strong></td>
                                                    </tr>
                                                    </tbody>
                                            </table>

                                            <div class='divider'>
                                            <img class='d-block w-100' src='img/divider.webp' alt='division de estilo star wars'>
                                            </div>

                                    
                </ul>       
            </div>    
                  
        </div>
 
    </div>
</div>





 
