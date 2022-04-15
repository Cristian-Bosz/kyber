<?php
require_once("../../config/config.php");
require_once("../../config/funciones.php");

if (empty($_POST['id'])) {
    header("Location: ../panel.php?seccion=listado_productos&status=error");
    exit;
}                                                                                                   
$producto_id = intval($_POST['id']);
$select_prod = "SELECT productos_id FROM productos WHERE productos_id=$producto_id";
$res_selec = mysqli_query($cnx, $select_prod);

if (!$res_selec->num_rows) {
    header("Location: ../panel.php?seccion=listado_productos&status=error");
    exit;
}

$delete = "DELETE FROM productos WHERE productos_id=$producto_id";
$res_delete = mysqli_query($cnx, $delete);

if ($res_delete) {
    header("Location: ../panel.php?seccion=listado_productos&status=ok&accion=eliminado");
} else {
    header("Location: ../panel.php?seccion=listado_productos&status=error");
}