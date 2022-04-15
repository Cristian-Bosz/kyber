<?php
$orden = '';
if(!empty($_GET['columna']) && !empty($_GET['orden'])){

    $orden="ORDER BY {$_GET['columna']} {$_GET['orden']}";
}


$select_blog_panel = "SELECT blog_id, fecha, autor, titulo 
FROM blog
$orden;";

$resSelect_blog_panel = mysqli_query($cnx, $select_blog_panel);

?>






<section class="p-5 m-0">
<?php
    if ((!empty($_GET['status']) && $_GET['status'] == 'ok') &&
    (!empty($_GET['accion']) && ($_GET['accion'] == 'creado' || $_GET['accion'] == 'eliminado' || $_GET['accion'] == 'editado'))
    ):
    $accion = $_GET['accion'];
?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h2 class="display-6"><strong>¡Bien hecho!</strong> El producto fue <b> <?= $accion ?> </b> exitosamente.</h2>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
endif;
?>



    <h2 class="display-4 text-center text-white mb-5">PANEL DE BLOGS</h2>
  
  <div class="container">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
             <a class="btn btn-primary my-3" href="panel.php?seccion=inicio" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>
            <a href="panel.php?seccion=alta_blogs" class="btn btn-outline-warning float-end my-3"><i class="bi bi-plus-circle-dotted mx-1"></i> Nuevo blog </a>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-dark table-hover ">
                <caption>Lista de blogs</caption>
                   
                <thead class="text-center">
                        <tr>
                            <th><a href="panel.php?seccion=listado_blogs&columna=blog_id&orden=ASC" class="text-warning text-decoration-none">#</a></th>
                            <th><a href="panel.php?seccion=listado_blogs&columna=fecha&orden=ASC" class="text-warning text-decoration-none">Fecha</a></th>
                            <th><a href="panel.php?seccion=listado_blogs&columna=autor&orden=ASC" class="text-warning text-decoration-none">Autor</a></th>
                            <th><a href="panel.php?seccion=listado_blogs&columna=titulo&orden=ASC" class="text-warning text-decoration-none">Titulo</a></th>

                            <th>Acciones</th>         
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while ($data = mysqli_fetch_assoc($resSelect_blog_panel)):
                    ?>
                                <tr class="text-center">
                                    <td class="text-center"><?= $data['blog_id'] ?></td>
                                   
                                    <td><?= $data['fecha'] ?></td>
                                    <td><?= ucfirst($data['autor']) ?></td>
                                   <td><?= ucfirst($data['titulo']) ?></td>
                                    <td class="text-center">
                                    <div class="btn-group">

                                    <a class="btn btn-outline-info me-1" href="panel.php?seccion=alta_blogs&id=<?= $data['blog_id'] ?>" role="button"><i class="bi bi-pencil-square mx-1"></i>Editar</a>
                                        
                                                <form action="procesos/p_baja_blog.php" method="POST">
                                                            <input type="hidden" name="id" value="<?= $data['blog_id'] ?>">
                                                            <button class="btn btn-outline-danger" type="submit">
                                                            <i class="bi bi-trash"></i> Eliminar</button>
                                                </form>
                                                
                                        </div>
                                    </td>
                                </tr>
                    <?php
                    endwhile;
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>
