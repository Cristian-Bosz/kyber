<aside class="container-fluid text-white py-3 bg-dark contacto">
     <h2 class= "display-5 mt-5 mb-5 text-center" > Iniciar Sesión </h2>
        <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 borde pb-3 ">
             
            
            <?php
            if (!empty($_SESSION['ok'])):
            ?>
                <div class="alert alert-info fade show" role="alert">
                <i class="bi bi-check-circle"></i>    
                <?= $_SESSION['ok'] ?>
                </div>
            <?php
            endif;
            ?>
            <?php
            if (!empty($_SESSION['error'])):
            ?>
                <div class="alert alert-danger fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                    <?= $_SESSION['error'] ?>
                </div>
            <?php
            endif;
            unset($_SESSION['error']);
            unset($_SESSION['ok']);
            ?>
          	 <form action="procesos/proceso_login.php" method="post">

		                    <div class="form-group">
		                        <label for="nombre">Nombre de usuario</label>
		                        <input type="text" class="form-control" name="nombre" id="nombre"> 
                                <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['nombre'])):
                                    ?>
                                   
                                      <p class="text-danger">  <?= $_SESSION['errores']['nombre'] ?> </p>
                                    
                                <?php
                                endif;
                                ?>              
                            </div>
		                 
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input type="password" name="pass" id="pass" class="form-control">  
                                <?php
                                if (isset($_SESSION['errores']) && isset($_SESSION['errores']['pass'])):
                                    ?>
                                   
                                      <p class="text-danger">  <?= $_SESSION['errores']['pass'] ?></p>
                                   
                                <?php
                                endif;
                                unset($_SESSION['errores']);
                                ?> 
                            </div>
		         	                  

		                    <button type="submit" value="enviar" class="btn btn-primary d-block w-100">
		                    <b>Iniciar Sesión</b> 
		                    </button>
                            <div class="mt-3">
                             <small class="mt-5">
                                <a href="index.php?seccion=registro" class="text-warning ">¿Olvidaste tu contraseña?</a></small>
                            <br> 
                            <small class="mt-5">¿Todavía no tenés una cuenta? 
                                <a href="index.php?seccion=registro" class="text-warning font-weight-bold">Registrate</a></small>
                            </div>
				 </form>
				</div>
			</div>
</div>
				
</aside>


