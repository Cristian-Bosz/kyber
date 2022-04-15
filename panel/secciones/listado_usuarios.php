<?php
$orden = '';
if(!empty($_GET['columna']) && !empty($_GET['orden'])){

    $orden="ORDER BY {$_GET['columna']} {$_GET['orden']}";
}


$select_blog_panel = "SELECT usuarios_id, nombre, email, tipo 
FROM usuarios 
LEFT JOIN tipo_usuarios ON tipo_user_id = tipo_user_id_fk
$orden;";

$resSelect_blog_panel = mysqli_query($cnx, $select_blog_panel);

?>






<section class="p-5 m-0">




    <h2 class="display-4 text-center text-white mb-5">PANEL DE USUARIOS</h2>
   
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

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Hubo un error. El usuario que quisiste editar no existe. Intenta nuevamente..</h2>
 </div>

<?php
endif;
?> 

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error_4'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Ups error_4! El id no existe en la base de datos</h2>
 </div>

<?php
endif;
?> 

  <div class="container">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
             <a class="btn btn-primary my-3" href="panel.php?seccion=inicio" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>
             <a href="panel.php?seccion=alta_usuarios" class="btn btn-outline-warning float-end my-3"><i class="bi bi-plus-circle-dotted mx-1"></i> Nuevo usuario </a>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-dark table-hover">
                <caption>Lista de usuarios</caption>
                    <thead class="text-center">
                        <tr>
                            <th><a href="panel.php?seccion=listado_usuarios&columna=usuarios_id&orden=ASC" class="text-warning text-decoration-none">#</a></th>
                            <th><a href="panel.php?seccion=listado_usuarios&columna=nombre&orden=ASC" class="text-warning text-decoration-none">Nombre</a></th>
                            <th><a href="panel.php?seccion=listado_usuarios&columna=email&orden=ASC" class="text-warning text-decoration-none">Email</a></th>
                            <th><a href="panel.php?seccion=listado_usuarios&columna=tipo&orden=ASC" class="text-warning text-decoration-none">Tipo de usuario</a></th>

                            <th>Acciones</th>         
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while ($user = mysqli_fetch_assoc($resSelect_blog_panel)):
                    ?>
                                <tr class="text-center">
                                    <td class="text-center"><?= $user['usuarios_id'] ?></td>
                                   
                                    <td><?= ucfirst($user['nombre']) ?></td>
                                    <td><?= $user['email'] ?></td>
                                   <td><?= $user['tipo'] ?></td>
                                    <td class="text-center">
                                    <div class="btn-group">

                                        
                                            <a class="btn btn-outline-info me-1" href="panel.php?seccion=alta_usuarios&id=<?= $user['usuarios_id'] ?>" role="button"><i class="bi bi-pencil-square mx-1"></i>Editar</a>
                                                <form action="procesos/p_baja_usuarios.php" method="POST">
                                                            <input type="hidden" name="id" value="<?= $user['usuarios_id'] ?>">
                                                            <button class="btn btn-outline-danger" type="submit">
                                                            <i class="bi bi-person-x-fill"></i> Eliminar</button>
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
