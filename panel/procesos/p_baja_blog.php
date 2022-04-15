<?php
require_once("../../config/config.php");
require_once("../../config/funciones.php");

if (empty($_POST['id'])) {
    header("Location: ../panel.php?seccion=listado_blogs&status=error");
    exit;
}                                                                                                   
$blog_id = intval($_POST['id']);
$select_blog = "SELECT blog_id FROM blog WHERE blog_id=$blog_id";
$res_selec = mysqli_query($cnx, $select_blog);

if (!$res_selec->num_rows) {
    header("Location: ../panel.php?seccion=listado_blogs&status=error");
    exit;
}

$delete = "DELETE FROM blog WHERE blog_id=$blog_id";
$res_delete = mysqli_query($cnx, $delete);

if ($res_delete) {
    header("Location: ../panel.php?seccion=listado_blogs&status=ok&accion=eliminado");
} else {
    header("Location: ../panel.php?seccion=listado_blogs&status=error");
}