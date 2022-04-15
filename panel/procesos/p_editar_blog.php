<?php
require_once('../../config/config.php');
require_once('../../config/funciones.php');


//validamos que el id exista en la base de datos
$id = intval($_POST['id']);
$select_blog = "SELECT blog_id, img_miniatura, img_principal, titulo, descripcion, intro, fecha, autor, video
FROM blog
WHERE blog_id=$id";
$res_select_blog = mysqli_query($cnx, $select_blog);

if (!$res_select_blog->num_rows){
    header("Location: ../panel.php?seccion=alta_blogs&status=error");
     exit;
}


$errores = [];
if (empty($_POST['titulo']) || (trim($_POST['titulo']) == '')) {
    $errores['titulo'] = 'Ups! Olvidaste escribir el TITULO';
}elseif (strlen($_POST['titulo']) > 80){
    $errores['nombre'] = 'Ups! El titulo debe de tener hasta 80 caracteres MÁXIMO';
}


if (empty($_POST['descripcion']) || (trim($_POST['descripcion']) == '')) {
    $errores['descripcion'] = 'Ups! Olvidaste escribir la DESCRIPCIÓN del producto';
}elseif (strlen($_POST['descripcion']) > 65535){
    $errores['descripcion'] = 'Ups! El texto es demasiado largo, supera los 65535 caracteres.';
}


if (empty($_POST['intro']) || (trim($_POST['intro']) == '')) {
    $errores['intro'] = 'Ups! Olvidaste escribir la introducción del articulo';
}elseif (strlen($_POST['intro']) > 255){
    $errores['descripcion'] = 'Ups! La introducción debe de tener hasta 255 caracteres MÁXIMO.';
}


if (empty($_POST['fecha'])) {
    $errores['fecha'] = 'Ups! Olvidaste fijar la fecha. ¿Cuando escribiste este artículo?';
}


if (empty($_POST['autor']) || (trim($_POST['autor']) == '')) {
    $errores['autor'] = 'Ups! Olvidaste mencionar al autor de este articulo. ¿Quién lo escribió?';
}elseif (strlen($_POST['autor']) > 80){
    $errores['autor'] = 'Ups! El nombre es demasiado largo, supera los 80 caracteres.';
}

if (strlen($_POST['video']) > 120){
    $errores['video'] = 'Ups! El link del video es demasiado largo, supera los 120 caracteres.';
}


$nombre_img_miniatura = null;
if (!empty($_FILES['img_miniatura']) && $_FILES['img_miniatura']['size'] > 0) {

    $img_min = $_FILES['img_miniatura'];

 if ($img_min['type'] != "image/png" && $img_min['type'] != 'image/jpeg' && $img_min['type'] != 'image/webp') {
        $errores['img_miniatura'] = 'La imagen debe de ser de tipo .png o .jpg o .webp';
 }
   if ($img_min['type'] == "image/png")
 $ext = '.png';
 else if ($img_min['type'] == "image/jpg")
 $ext = '.jpg';
 else if ($img_min['type'] == "image/webp")
 $ext = '.webp';

    $nombre_img_miniatura = basename(time() . _min . $ext);

    move_uploaded_file($img_min['tmp_name'], "../../img/blogs/$nombre_img_miniatura");
    
    $imagen_min = mysqli_real_escape_string($cnx, $nombre_img_miniatura) ?? null;
    $insert_imagen_min = "UPDATE blog SET 
                    img_miniatura='$imagen_min'
                    WHERE blog_id = $id";
    
            $rpta_imagen_min = mysqli_query($cnx, $insert_imagen_min);
}


$nombre_img_pri = null;
if (!empty($_FILES['img_principal']) && $_FILES['img_principal']['size'] > 0) {

    $img_pri = $_FILES['img_principal'];

 if ($img_pri['type'] != "image/png" && $img_pri['type'] != 'image/jpeg' && $img_pri['type'] != 'image/webp') {
        $errores['img_principal'] = 'La imagen debe de ser de tipo .png o .jpg o .webp';
 }
   if ($img_pri['type'] == "image/png")
 $ext = '.png';
 else if ($img_pri['type'] == "image/jpg")
 $ext = '.jpg';
 else if ($img_pri['type'] == "image/webp")
 $ext = '.webp';

    $nombre_img_pri = basename(time() . $ext);

    move_uploaded_file($img_pri['tmp_name'], "../../img/blogs/$nombre_img_pri");

    $imagen_pri = mysqli_real_escape_string($cnx, $nombre_img_pri) ?? null;
    $insert_imagen_pri = "UPDATE blog SET 
                    img_principal='$imagen_pri'
                    WHERE blog_id = $id";
    
            $rpta_imagen_pri = mysqli_query($cnx, $insert_imagen_pri);
    
}

if (count($errores)) {
    $json_errores = json_encode($errores);
    header("Location: ../panel.php?seccion=alta_blogs&id=$id&status=error&campo=$json_errores");
    exit;
}




$titulo = mysqli_real_escape_string($cnx, $_POST['titulo']);
$descripcion = mysqli_real_escape_string($cnx, $_POST['descripcion']);
$intro = mysqli_real_escape_string($cnx, $_POST['intro']);
$fecha = mysqli_real_escape_string($cnx, $_POST['fecha']);
$autor = mysqli_real_escape_string($cnx, $_POST['autor']);
$video = mysqli_real_escape_string($cnx, $_POST['video']);


//aca le digo que me edite este blog en especifico
$insert = "UPDATE blog SET
titulo='$titulo', descripcion='$descripcion', intro='$intro', fecha='$fecha', autor='$autor', video='$video'
WHERE blog_id = $id";
$res_insert = mysqli_query($cnx, $insert);

if($res_insert){
    header("Location: ../panel.php?seccion=listado_blogs&status=ok&accion=editado");
    exit;
}else{
    header("Location: ../panel.php?seccion=alta_blogs&id=$id&status=error&tipo=articulo");
    exit;
}
