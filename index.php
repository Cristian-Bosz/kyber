<!DOCTYPE html>
<html lang="es">
<?php
require_once('config/config.php');
require_once('config/arrays.php');
require_once('config/funciones.php');


?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kyber</title>
	<link rel="icon" type="image/png" href="img/icons/cristal.png" />
	
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/estilos.css">
<!-- Font Awesome icons-->
	<link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
<!-- Bootstrap icons-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
	.fallen-order{
		background-image: url("img/wallpapers/fallen-order.jpg");
		background-repeat: no-repeat;
	}
	.historia{
		background-image: url("img/wallpapers/lukefondo.jpg");
		background-repeat: no-repeat;
	}
</style>
</head>

<body style="background:black;">
  
    
		<?php
		if (!isset($_SESSION['usuario'])):
		?>
					
							
		<?php
        elseif ($_SESSION['usuario']['tipo_user_id_fk'] == 1):
        ?>

			<nav>
			<div class="d-grid gap-2">
			<a href="panel/panel.php" class="btn btn-outline-light btn-lg my-2 font-weight-bold text-uppercase" type="button">Panel de administracion</a>
			</div>
		</nav>
		<?php
		endif;
		?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
 
<div class="container-fluid ">
    <h1 id="logo">
		<a class="nav-link text-light" href="index.php?seccion=home">KYBER</a>
	</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarNav">
      <ul class="navbar-nav mx-auto">
    

		<!--foreach de la estructura del navbar que quiero que se repita -->       
			<?php                  
			foreach ($navbar as $boton => $url):
			?>
				<li class="nav-item">
				<a class="nav-link active botonera" aria-current="page" href="index.php?seccion=<?= $url ?>"><?= $boton ?></a>
				</li>
			<?php
			endforeach;
			?>

		</ul>



		<ul class="navbar-nav align-items-center">
				
					<li class="nav-item mr-3">
						<a href="index.php?seccion=wish" class="nav-link my-2"> 
							
										<?php 
                                        if(empty($_SESSION["deseos"])):
                                        ?>
                                  <i class="far fa-heart fa-lg"></i>
                                

                                        <?php
                                        elseif  (!empty($_SESSION["deseos"])):
                                        ?>  
                                   <i class="fas fa-heart fa-lg"></i>
                                        <?php
                                        endif;
                                        ?>


						</a>
					</li>
					<li class="nav-item mr-3">
						<a class="nav-link my-2" href="index.php?seccion=cart"> 		
							
										<?php 
                                        if(empty($_SESSION["carrito"])):
                                        ?>
									<i class="fas fa-shopping-cart fa-lg"></i>
                                        <?php
                                        elseif  (!empty($_SESSION["carrito"])):
                                        ?>  
                                  	<i class="fas fa-cart-plus fa-lg"></i>
                                        <?php
                                        endif;
                                        ?>
						</a>
					</li>
					
						<?php
						if (!isset($_SESSION['usuario'])):
						?>
								<li class="nav-item d-xl-block ml-xl-auto">
									<a href="index.php?seccion=login" class="btn btn-outline-warning <?= ('login') ?> my-2 mx-2">
									<i class="fas fa-sign-in-alt"></i>
									Iniciar Sesión
									</a>
								</li>
								<li class="nav-item ml-xl-3">
									<a href="index.php?seccion=registro" class="btn btn-warning <?= ('registro') ?> my-2">
										Registro
									</a>
								</li>
						<?php
						else:
						?>
								<li class="nav-item d-xl-block ml-xl-auto">
									<a href="index.php?seccion=perfil&id=<?=($_SESSION['usuario']['usuarios_id']) ?> "  class="btn btn-dark mx-2">
									


									<?php 
                                        if(empty($_SESSION['usuario']['img_user'])):
                                        ?>
									<i class="fas fa-user-circle fa-lg"></i>
                                        <?php
                                        elseif  (!empty($_SESSION['usuario']['img_user'])):
                                        ?>  
                                  	<img src="img/users/<?=($_SESSION['usuario']['img_user'])?>" alt="Avatar de <?=($_SESSION['usuario']['nombre']) ?>" class="figure-img img-fluid  rounded-circle " style="height: 50px; width: 50px;"> 
                                        <?php
                                        endif;
                                        ?>
									
									
									</a>
								</li>
								<li class="nav-item ml-xl-3">
									<a href="procesos/logout.php" class="btn btn-outline-warning my-2">
									<i class="fas fa-sign-out-alt"></i>
										Cerrar Sesión
									</a>
								</li>
						<?php
						endif;
						?>
        </ul>
    </div>
  </div>
</nav>




<?php

$seccion = $_GET['seccion'] ?? 'home';
$seccion = empty($seccion) ? 'error' : $seccion;
require_once("secciones/$seccion.php");

?>










<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark bg-dark text-white pt-4">
<!-- separador --> 
<div class="container mb-5 ">
                        <img class="d-block w-100" src="img/divider.webp" alt="division de estilo star wars">
  </div>


	<div class="container text-center text-md-left">	 
	  <div class="row">
		<div class="col-md-4 mx-auto">
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Políticas de Privacidad</h5>
		  <p>No asociado con DISNEY ©, LUCASFILM LTD. o cualquier
			franquicia de películas o sables de luz de LFL Ltd.</p>
			
		</div>
		
  
		<hr class="clearfix w-100 d-md-none">
		<div class="col-md-4 mx-auto text-center">
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">redes sociales</h5>
			  <ul class="list-unstyled list-inline text-center">
	  <li class="list-inline-item">
		<a href="https://www.instagram.com/?hl=es-la" class="btn-floating btn-fb mx-1">
		<i class="fab fa-instagram fa-2x"></i>
		</a>
	  </li>
	  <li class="list-inline-item">
		<a href="https://es-la.facebook.com/" class="btn-floating btn-tw mx-1">
		<i class="fab fa-facebook fa-2x"></i>
		</a>
	  </li>
	  <li class="list-inline-item">
		<a href="https://twitter.com/home" class="btn-floating btn-gplus mx-1">
		<i class="fab fa-twitter fa-2x"></i>
		</a>
	  </li>
	  <li class="list-inline-item">
		<a href="https://twitter.com/home" class="btn-floating btn-gplus mx-1">
		<i class="fab fa-youtube fa-2x"></i>
		</a>
	  </li>
	</ul>
		</div>
		
		<hr class="clearfix w-100 d-md-none">
		<div class="col-md-4 mx-auto">
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Correo</h5>
		  	<ul class="list-unstyled">
				<li>
					<p>KYBERSTORE@HOTMAIL.COM</p>
				</li>
		  	</ul>
		</div>

	  </div>
	</div>
 


<div class="footer-copyright text-center py-3">
<p>Copyright © 2021 Kyber LLC. All Rights Reserved.</p>
  
</div>

</footer>

<!--Bootstrap Bundle-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


 
		
 <script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>


</body>
</html>

<?php
mysqli_close($cnx);