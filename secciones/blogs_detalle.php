<?php
$select_blogs = 'SELECT * FROM blog WHERE blog_id = '. $_GET['id'];
$res_select_blogs = mysqli_query($cnx, $select_blogs);
$noticias = mysqli_fetch_assoc($res_select_blogs);


if (!$noticias) {
    header('Location: index.php?seccion=blogs&error=blog_inexistente');
    exit;
}

?>


<section class="bg-light">
      
           
        <div class="container card">
                <p class="lead my-4"><em><?= ($noticias["fecha"])?> | <?= ucfirst($noticias["autor"])?> </em></p>
    
                <h2 class="card-title display-4 text-info my-2 "><?= ucfirst($noticias["titulo"])?> </h2>
                <p class="card-text lead text-justify my-2"> <?= ucfirst($noticias["intro"]) ?> </p>
                <img src='img/blogs/<?=$noticias["img_principal"]?>' alt='<?= ucfirst($noticias["titulo"]) ?>' class="img-fluid card-img-top my-4">

              
               <div class="lead"> <?= html_entity_decode($noticias['descripcion']) ?> </div> 
              
		
			<div class="ratio ratio-16x9 bg-dark my-5">
                                        <iframe src="<?=$noticias["video"]?>" title="YouTube video player" allowfullscreen></iframe>
			</div>
		
	
        </div>
</section>

