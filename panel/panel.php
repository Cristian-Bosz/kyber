<!DOCTYPE html>
<?php
require_once('../config/config.php');
require_once('../config/arrays.php');
require_once('../Config/funciones.php');

//si alguien que no sea el admin intenta entrar al panel, no va a poder y lo redirijo al error
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['tipo_user_id_fk'] == 2 || !isset($_SESSION['usuario'])) {
    $_SESSION['error']='no tenés permisos para ingresar a esta sección';
    header('Location: ../index.php?seccion=error');
}
?>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kyber</title>
	<link rel="icon" type="image/png" href="../img/icons/cristal.png" />
	
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../css/estilos.css">
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
  
    



<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
 
<div class="container-fluid ">
    <h1 id="logo">
		<a class="nav-link text-light" href="../index.php?seccion=home">KYBER</a>
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
				<a class="nav-link active botonera" aria-current="page" href="../index.php?seccion=<?= $url ?>"><?= $boton ?></a>
				</li>
			<?php
			endforeach;
			?>

		</ul>



		<ul class="navbar-nav">
				
					<li class="nav-item mr-3">
						<a href="../index.php?seccion=wish" class="nav-link my-2"> 
							<i class="far fa-heart fa-lg"></i>
						</a>
					</li>
					<li class="nav-item mr-3">
						<a class="nav-link my-2" href="../index.php?seccion=cart"> 		
							<i class="fas fa-cart-plus fa-lg"></i>
						</a>
					</li>
					
						<?php
						if (!isset($_SESSION['usuario'])):
						?>
								<li class="nav-item d-xl-block ml-xl-auto">
									<a href="../index.php?seccion=login" class="btn btn-outline-warning <?= ('login') ?> my-2 mx-2">
									<i class="fas fa-sign-in-alt"></i>
									Iniciar Sesión
									</a>
								</li>
								<li class="nav-item ml-xl-3">
									<a href="../index.php?seccion=registro" class="btn btn-warning <?= ('registro') ?> my-2">
										Registro
									</a>
								</li>
						<?php
						else:
						?>
								<li class="nav-item d-xl-block ml-xl-auto">
									<a href="../index.php?seccion=perfil&id=<?=($_SESSION['usuario']['usuarios_id']) ?> "  class="btn btn-dark my-2 mx-2">
									<i class="fas fa-user-circle"></i> <?= ucwords($_SESSION['usuario']['nombre']) ?> 
									</a>
								</li>
								<li class="nav-item ml-xl-3">
									<a href="../procesos/logout.php" class="btn btn-outline-warning my-2">
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

$seccion = $_GET['seccion'] ?? 'inicio';

if (empty($seccion))
$seccion = 'inicio';

$ruta = SECCIONES . $seccion . '.php';

if (file_exists($ruta))
require_once($ruta);
else
require_once(SECCIONES . 'inicio.php');

?>




<footer>
<!-- separador --> 
<div class="container mb-5 ">
                        <img class="d-block w-100" src="../img/divider.webp" alt="division de estilo star wars">
  </div>
</footer>
<!--Bootstrap Bundle-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="js/jquery-3.4.1.js"></script>
 
		
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