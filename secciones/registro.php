
<aside class="container-fluid text-white py-3 bg-dark contacto">
     <h2 class= "display-5 mt-5 mb-5 text-center" > REGISTRARSE </h2>
        <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 borde pb-3 ">
                

          	 <form action="procesos/registro.php" method="post">

		                    <div class="form-group">
		                        <label for="nombre">Nombre de usuario *</label>
		                        <input type="text" class="form-control" name="nombre" id="nombre" 
                                value="<?= isset($_SESSION['campos']) && isset($_SESSION['campos']['nombre']) ?  $_SESSION['campos']['nombre'] : ''?>">
		                    
                                <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['nombre'])):
                                    ?>
                                    
                                       <p class="text-danger"> <?= $_SESSION['errores']['nombre'] ?> </p>
                                   
                                <?php
                                endif;
                                ?>
                            </div>
		                    
		                    <div class="form-group">
		                        <label for="mail">Email *</label>
		                        <input type="email" class="form-control" name="email" id="mail" aria-describedby="ayudamail"
                                value="<?= isset($_SESSION['campos']) && isset($_SESSION['campos']['email']) ?  $_SESSION['campos']['email'] : ''?>" >                                            
		                        <small id="ayudamail" class="form-text text-muted">Tu dirección de email está segura con nosotros.</small>
		                    
                                <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['email'])):
                                    ?>
                                    
                                      <p class="text-danger">  <?= $_SESSION['errores']['email'] ?> </p>
                                   
                                <?php
                                endif;
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="pass" class="font-weight-bold">Contraseña *</label>
                                <input type="password" name="pass" id="pass" class="form-control">
		                    
                                <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['pass'])):
                                    ?>
                                   
                                     <p class="text-danger">   <?= $_SESSION['errores']['pass'] ?> </p>
                                   
                                <?php
                                endif;
                                unset($_SESSION['errores']);
                                ?>
                            </div>
		         	                  
		                


		                    <button type="submit" value="enviar" class="btn btn-primary d-block w-100">
		                    <b>Enviar</b> 
		                    </button>

                            <div class="mt-3"> 
                            <small class="mt-5">¿Tenés una cuenta? 
                            <a href="index.php?seccion=login" class="text-warning font-weight-bold">Inicia sesión</a></small>
                            </div>
                        </form>
				</div>
			</div>
</div>
				
</aside>