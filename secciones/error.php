
	<section class="container text-center">
		<figure class="figure">
				<img src="img/wallpapers/palpatine.jpg"  class="img-fluid"   alt="Banner Franj Z">
	    </figure>


<?php
if(isset($_SESSION['error']) && !isset($_SESSION['usuario'])):
?>
	<div class="container alert alert-danger fade show" role="alert">
   <h2> <?= ucfirst($_SESSION['error']) ?> </h2>
	</div>

	<?php
     elseif(isset($_SESSION['error']) && $_SESSION['usuario']['tipo_user_id_fk'] == 2):
    ?>
	
	<div class="container alert alert-danger fade show" role="alert">
   <h2> <?= ucwords($_SESSION['usuario']['nombre']) ?>, <?= $_SESSION['error'] ?> </h2>
	</div>
<?php
endif;
unset($_SESSION['error']);
?>




		<h1 class= "text-center text-white"><?php echo error(); ?></h1>
	<p class="display-4 text-white"><em>"No deberías estar aqui joven jedi"</em></p>
    
	</section>
	
	
