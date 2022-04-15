<?php
require_once("../config/config.php");
require_once("../config/funciones.php");

/*
 * VALIDACIÓN PERTINENTE DE QUE NO ESTÉ VACÍO
 */


$busqueda = mysqli_real_escape_string($cnx, $_GET['buscar']);

$select_busqueda = "SELECT * FROM productos LEFT JOIN categorias ON categorias_id=categorias_id_fk WHERE nombre LIKE '%$busqueda%' ";
$res_select_busqueda = mysqli_query($cnx, $select_busqueda);

if ($res_select_busqueda->num_rows) {
    unset($_SESSION['buscar']);
    $_SESSION['buscar']['palabra'] = $_GET['buscar'];
    while ($prod_bus = mysqli_fetch_assoc($res_select_busqueda)) {
        $_SESSION['buscar']['resultados'][] = $prod_bus;
    }

} else {
    $_SESSION['error_busqueda'] = 'No hay resultados para tu búsqueda. Este producto no existe.';
}
dd($select_busqueda);
header('Location: ../index.php?seccion=productos');
