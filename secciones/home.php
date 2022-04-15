<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error_e'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Ups! El id no existe en la base de datos</h2>
 </div>

<?php
endif;
?> 

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error_4'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Ups! El id no existe en la base de datos</h2>
 </div>

<?php
endif;
?> 
<?php
    if ((!empty($_GET['status']) && $_GET['status'] == 'ok') &&
    (!empty($_GET['accion']) && ($_GET['accion'] == 'creado' || $_GET['accion'] == 'eliminado' || $_GET['accion'] == 'editado'))
    ):
    $accion = $_GET['accion'];
?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="display-6"><strong>¡Bien hecho!</strong> Tu usuario fue <b> <?= $accion ?> </b> exitosamente.</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
endif;
?>

<!-- BANNER  -->
  <section>
    <div class="container-fluid">
        
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
					<div class="carousel-item active">
					<a href="index.php?seccion=productos_detalle&id=5"><img src="img/blue.jpg" class="d-block w-100" alt="sable azul de orden caida."></a>
					</div>
					<div class="carousel-item">
					<a href="index.php?seccion=productos_detalle&id=3"><img src="img/reaver.jpg" class="d-block w-100" alt="sable rojo el cultista"></a>
					</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
        
	</div>
 
</section>



<!-- INFORMACION --> 

<section>
	
	<div class="jumbotron fallen-order mb-0">
<div class="py-5 mx-5 user-select-none">
   <h2 class="display-6 text-white mt-5 mx-2">EL SABLE PERSONALIZADO</h2>
		<h2 class="display-4 text-white mx-2">UNA ÚNICA ARMA PERFECTA</h2>
			<div class="container-fluid">
				<div class= "col-12 col-sm-12 col-md-12 col-lg-5 text-left">
				<p class="lead text-white text-justify">"Una vez construido, será su compañero constante, su herramienta y un medio de defensa listo". Fue con esta cita en nuestros corazones que buscamos crear la experiencia de sable personalizado más realista de la vida real, y comenzamos enfocándonos en artesanía superior y el uso de tecnología avanzada de punta de sable. Estas son solo algunas de las muchas características de nuestros sables personalizados:</p>
	  		

					<div class= "row align-self-lg-stretch text-light">
						<div class="col-3 col-sm-3 col-md-3 col-lg-3 border border-light rounded m-2 text-center  ">
							<img  class="my-3 pastilla_jumbotron_img" src="img/icons/superior.png" alt="imagen">
							<p class="lead" style="font-size:12px">Artesanía superio</p>
							
						</div>
						<div class="col-3 col-sm-3 col-md-3 col-lg-3 border border-light rounded m-2 text-center">
							<img  class="my-3 pastilla_jumbotron_img" src="img/icons/plecter.png" alt="imagen">
							<p class="lead" style="font-size:12px" >Placas de sonido Plecter Labs</p>
						</div>
						<div class="col-3 col-sm-3 col-md-3 col-lg-3 border border-light rounded m-2 text-center ">
							<img  class="my-3 pastilla_jumbotron_img" src="img/icons/led.png" alt="imagen">
							<p class="lead" style="font-size:12px">LED brillante</p>
						</div>	
					</div>
	  			</div>
    		</div>
        <hr>
</div>
    </div>

</section>

<!--NUESTRA HISTORIA --> 
<section>
	
	<div class="jumbotron historia text-center mb-3 user-select-none">
		<div class="py-5">
			<h2 class="display-6 text-white mt-5">NUESTRA HISTORIA</h2>
				<div class="container-fluid">
				
					<figure class="container text-sm-center mt-5">
					<blockquote class="blockquote">
								<p class="lead text-white">Fundada en 2021 por 2 personas, Kyber nació por la pasion por el diseño, los juegos y los sables personalizados.</p>
								<p class="lead text-white">A partir de un simple escritorio pequeño, nos embarcamos en nuestra búsqueda para ser conocidos por fabricar sables personalizados de primera calidad, completamente funcionales y listos para el duelo. Fue un viaje largo y arduo, pero tambien profundamente gratificante en el que tuvimos el privilegio de brindar alegría, emoción y deversión a tanta gente con nuestros sables.</p>
								<p class="lead text-white">Hoy, Kyber es una empresa de sables personalizados que se construye sobre los cimientos de la verdad, la competencia y el cuidado. Creemos en la comunicacion abierta, la transparencia y la honestidad con todos nuestros grupos de interés. Nos esforzamos por ofrecer el mejor servicio al cliente y productos de primera calidad dentro del plazo prometido. Esperamos brindarle una experiencia y un apoyo increíble, mientras comienza su viaje  en el mundo de los sables personalizados con nosotros.</p>
					</blockquote>
					<br>
					<figcaption class="blockquote-footer text-light">
					Cristian Bösz, <cite title="Source Title">fundador de Kyber.</cite>
					</figcaption>
					</figure>



				</div>
		</div>
	</div>
</section>




















<!-- separador --> 
<div class="container mb-5 ">
             <img class="d-block w-100" src="img/divider.webp" alt="division de estilo star wars">
  </div>


<!-- pastillas -->
<article>
<div class="container">
  		<div class= "row text-white justify-content-center bg-dark pastillitas">
	 
	  			<div class="col-12 col-sm-6 col-md-6 col-lg-2 my-4 mx-4 text-center">
				  <i class="fas fa-rocket fa-3x my-2"></i>
	  				<p class="lead"> <b>Envío Gratis</b> <br> En compras mayores a $100 </p>
	  			</div>	

	  			<div class="col-12  col-sm-6 col-md-6 col-lg-2  my-4 mx-4 text-center">
				  <i class="fas fa-file-invoice-dollar fa-3x my-2"></i>
	  				<p class="lead"><b>1 año de garantía.</b> <br> Si tienes algún problema te devolvemos tu dinero.</p>
	  			</div>

				<div class="col-12 col-sm-6 col-md-6 col-lg-2 my-4 mx-4  text-center">
				<i class="fas fa-money-check-alt fa-3x my-2"></i>
	  				<p class="lead"><b> Metodos de pago </b> <br> Pago Seguro </p>
	  			</div>	

	  			<div class="col-12 col-sm-6 col-md-6 col-lg-2 my-4 mx-4 text-center">
				  <i class="fas fa-headset fa-3x my-2"></i>
	  				<p class="lead"><b>Soporte 24x7</b> <br> En linea las 24hrs</p>
	  			</div>
	  		</div>
	  	</div>
</article>