<?php
require_once('../../config/config.php');
require_once('../../config/funciones.php');
require_once('../../bootstrap/autoload.php');



$errores = [];
if (empty($_POST['nombre']) || (trim($_POST['nombre']) == '')) {
    $errores['nombre'] = 'Ups! Olvidaste escribir el NOMBRE';
}elseif (strlen($_POST['nombre']) > 45){
    $errores['nombre'] = 'Ups! El nombre debe de tener hasta 45 caracteres MÁXIMO';
}


if (empty($_POST['descripcion']) || (trim($_POST['descripcion']) == '')) {
    $errores['descripcion'] = 'Ups! Olvidaste escribir la DESCRIPCIÓN del producto';
}elseif (strlen($_POST['descripcion']) > 1000){
    $errores['descripcion'] = 'Ups! La descripción debe de tener hasta 1000 caracteres MÁXIMO';
}


if (empty($_POST['color'])) {
    $errores['color'] = 'Ups! Olvidaste asignarle un COLOR';
}


if (empty($_POST['precio']) || (trim($_POST['precio']) == '')) {
    $errores['precio'] = 'Ups! Olvidaste escribir el PRECIO';
}


if (empty($_POST['categoria'])) {
    $errores['categoria'] = 'Ups! Olvidaste asignarle una CATEGORÍA';
}

$nombre_imagen = null;
if (!empty($_FILES['img'])) {

    $img = $_FILES['img'];

 if ($img['type'] != "image/png" && $img['type'] != 'image/jpeg' && $img['type'] != 'image/webp') {
        $errores['img'] = 'La imagen debe de ser de tipo .png o .jpg o .webp';
 }
   if ($img['type'] == "image/png")
 $ext = '.png';
 else if ($img['type'] == "image/jpg")
 $ext = '.jpg';
 else if ($img['type'] == "image/webp")
 $ext = '.webp';

    $nombre_imagen = basename(time() . $ext);

    move_uploaded_file($img['tmp_name'], "../../img/productos/$nombre_imagen");
    
}



if (count($errores)) {
    $json_errores = json_encode($errores);
    header("Location: ../panel.php?seccion=alta_producto&status=error&campo=$json_errores");
    exit;
}




$img = mysqli_real_escape_string($cnx, $nombre_imagen) ?? null;
$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$descripcion = mysqli_real_escape_string($cnx, $_POST['descripcion']);
$precio = mysqli_real_escape_string($cnx, $_POST['precio']);
$categorias_id_fk = mysqli_real_escape_string($cnx, $_POST['categoria']);
$colores_id_fk = mysqli_real_escape_string($cnx, $_POST['color']);


$prod = new Producto($img, $nombre, $descripcion, $precio, $categorias_id_fk, $colores_id_fk, $cnx);
$rta = json_decode($prod->cargar());


if($rta->status){
    header("Location: ../panel.php?seccion=listado_productos&status=ok&accion=creado");
    exit;
}else{
    header("Location: ../panel.php?seccion=alta_producto&status=error&tipo=producto");
    exit;
}
