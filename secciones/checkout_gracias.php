<div class='container my-5'>
    <div class='row'>



    <div class="alert alert-success mb-5" role="alert">
       
        <h3 class="alert-heading text-center"><i class="bi bi-patch-check-fill mx-2" style="font-size:2em;"></i> El pago se ha realizado con exito! <strong>Gracias por tu compra!</strong></h3>
        <hr>
        <p class="lead text-center">Gracias por confiar en nosotros, el producto te llegará en los proximos dos a cinco dias hábiles.</p>
        <p class="lead text-center">En unos momentos te estará llegando un correo electronico con el codigo de seguimiento del producto.</p>
    </div>

        


      
<div class='col-12 col-md-8 col-lg-5 col-xl-4 my-5'>
            <div class='bg-dark text-white'>
                
                <ul class='list-unstyled'>
                    <li><h3>Detalles del pedido</h3></li>
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
                                                <div class='col-6 col-sm-4 col-lg-6'>
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