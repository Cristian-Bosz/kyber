<?php
 
$errores = [];
if (!empty($_GET['campo']))
    $errores = json_decode($_GET['campo']);
?>




<section class="bg-dark text-white">
 <div class="container">
        <div class="row">
            <div id="galeria">
                
                    <div>
                        <img class="d-block w-100" src="img/contact-banner.jpg" alt="banner del sable de luke skywalker">
                    </div>
            </div>
        </div>
		<h2 class= "display-6 mt-5 mb-5 text-center" > ¡CONTACTATE CON NOSOTROS! </h2>
    </div>

</section>

<div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12  col-xxl-11">

<aside class="container-fluid text-white py-3 bg-dark contacto">
     
        <div class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-md-8 borde pb-3 ">
            	 <p class="lead mb-5">Para recibir mas información sobre los últimos sables de luz y mas novedades sobre accesorios no dudes en contactarnos. O si tambien tiene alguna duda con respecto a algun producto, complete la información a continuación y nuestro equipo de servicio al cliente se comunicará con usted en un plazo de 3 a 5 días hábiles.</p>	
                

          	 <form action="procesos/procesar_form.php" method="post">

		                    <div class="form-group">
		                        <label for="nombre">Nombre *</label>
		                        <input type="text" class="form-control" name="nombre" id="nombre" >
								<?php
                                                if(isset($errores->nombre)):
                                                ?>
                                                        
                                                        <p class="text-danger"><strong><small>  <?= $errores->nombre?> </small></strong></p>
                                                        
                                                <?php
                                                endif;
                                                ?>
						    </div>
		                    <div class="form-group">
		                        <label for="nombre">Apellido *</label>
		                        <input type="text" class="form-control" name="apellido" id="apellido">
								<?php
                                                if(isset($errores->apellido)):
                                                ?>
                                                        
                                                        <p class="text-danger"><strong><small> <?= $errores->apellido?></small></strong></p>
                                                        
                                                <?php
                                                endif;
                                                ?>
		                    </div>
		         	                  
		                    <div class="form-group">
		                        <label for="mail">Email *</label>
		                        <input type="email" class="form-control" name="email" id="mail" aria-describedby="ayudamail" >    
								<?php
                                 if(isset($errores->email)):
                                 ?>
                                     
                                     <p class="text-danger"><strong><small>   <?= $errores->email?></small></strong> </p>
                                       
                                <?php
                                 endif;
                                ?>                                        
		                        <small id="ayudamail" class="form-text text-muted">Tu dirección de email está segura con nosotros.</small>
		                    </div>


		                


		                     <div class="form-group py-3">
		                        <label for="comentario">Tu mensaje *</label>
		                        <textarea id="comentario" name="comentario" class="form-control" cols="30" rows="5"></textarea>
								<?php
                                if(isset($errores->comentario)):
                                ?>
                                
                                 <p class="text-danger"><strong><small>   <?= $errores->comentario?></small></strong> </p>
                                   
                                 <?php
                                 endif;
                                ?>
		                    </div>


		                    <button type="submit" class="btn btn-primary btn-lg float-end">
		                    	Enviar
		                    </button>

				 </form>
				</div>
			</div>
</div>
				
</aside>

                                </div>
                                </div>
                                </div>
