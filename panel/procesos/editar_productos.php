<?php
require_once('../../config/config.php');
require_once('../../config/funciones.php');


//validamos que el id exista en la base de datos
$id = intval($_POST['id']);
$select_prod = "SELECT productos_id, img, nombre, descripcion, precio, cate_nombre, color_nombre
FROM productos
JOIN categorias ON categorias_id=categorias_id_fk 
JOIN colores ON colores_id=colores_id_fk 
WHERE productos_id=$id";
$res_select_prod = mysqli_query($cnx, $select_prod);

if (!$res_select_prod->num_rows){
    header("Location: ../panel.php?seccion=alta_producto&status=error");
     exit;
}







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
if (!empty($_FILES['img']) && $_FILES['img']['size'] > 0) {

    $img = $_FILES['img'];

 if ($img['type'] != "image/png" && $img['type'] != 'image/jpeg' && $img['type'] != 'image/webp') {
        $errores['img'] = 'La imagen debe de ser de tipo .png o .jpg o .webp';
 }
    if ($img['type'] == "image/webp")
    $ext = '.png';
    else
    $ext = '.jpg';
    
    $ext = '.webp';

    $nombre_imagen = basename(time() . $ext);

    move_uploaded_file($img['tmp_name'], "../../img/productos/$nombre_imagen");
    

    $imagen = mysqli_real_escape_string($cnx, $nombre_imagen) ?? null;
    $insert_imagen = "UPDATE productos SET 
                    img='$imagen'
                    WHERE productos_id = $id";
    
            $rpta_imagen = mysqli_query($cnx, $insert_imagen);


}







if (count($errores)) {
 
    $json_errores = json_encode($errores);
    header("Location: ../panel.php?seccion=alta_producto&id=$id&status=error&campo=$json_errores");
    exit;
}




$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$descripcion = mysqli_real_escape_string($cnx, $_POST['descripcion']);
$precio = mysqli_real_escape_string($cnx, $_POST['precio']);
$categoria = mysqli_real_escape_string($cnx, $_POST['categoria']);
$color = mysqli_real_escape_string($cnx, $_POST['color']);

//aca le digo que me edite este producto en especifico
$insert = "UPDATE productos SET
nombre='$nombre', descripcion='$descripcion', precio=$precio, categorias_id_fk='$categoria', colores_id_fk='$color'
WHERE productos_id = $id";
$res_insert = mysqli_query($cnx, $insert);


if($res_insert){
    header("Location: ../panel.php?seccion=listado_productos&status=ok&accion=editado");
    exit;
}else{
    header("Location: ../panel.php?seccion=alta_producto&id=$id&status=error&tipo=producto");
    exit;
}
