<?php
require_once("../../config/config.php");
require_once("../../config/funciones.php");

if (empty($_POST['id'])) {
    header("Location: ../panel.php?seccion=listado_usuarios&status=error");
    exit;
}                                                                                                   
$user_id = intval($_POST['id']);
$select_user = "SELECT usuarios_id FROM usuarios WHERE usuarios_id=$user_id";
$res_selec = mysqli_query($cnx, $select_user);

if (!$res_selec->num_rows) {
    header("Location: ../panel.php?seccion=listado_usuarios&status=error");
    exit;
}

$delete = "DELETE FROM usuarios WHERE usuarios_id=$user_id";
$res_delete = mysqli_query($cnx, $delete);

if ($res_delete) {
    header("Location: ../panel.php?seccion=listado_usuarios&status=ok&accion=eliminado");
} else {
    header("Location: ../panel.php?seccion=listado_usuarios&status=error");
}