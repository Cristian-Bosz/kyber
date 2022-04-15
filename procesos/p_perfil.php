<?php
require_once('../config/config.php');
require_once('../config/funciones.php');




//validamos que el id exista en la base de datos
$id = intval($_POST['id']);
$select_user = "SELECT usuarios_id, nombre, apellido, email, fecha_nacimiento, img_user
FROM usuarios
WHERE usuarios_id=$id";
$res_select_user = mysqli_query($cnx, $select_user);

if (!$res_select_user->num_rows){
    header("Location: index.php?seccion=home&status=error_e");
     exit;
}





$errores = [];
if (empty($_POST['nombre']) || (trim($_POST['nombre']) == '')) {
    $errores['nombre'] = 'Olvidaste escribir tu nombre de usuario';
}else{
//Le agrego la validacion NOT LIKE para que no tome encuenta este id a la hora de buscar los nombres en la tabla usuarios. Porque si no agrego eso, encontrará este mismo nombre en la base de datos y me tirará el error de 'este nombre ya esta registrado'. Entonces por esto tengo que sacar a este id de las opciones de la base de datos.
    $select_username="SELECT nombre FROM usuarios WHERE nombre = '$_POST[nombre]' NOT LIKE usuarios_id=$id";
    $res_select_username=mysqli_query($cnx, $select_username);

    if ($res_select_username->num_rows)
    $errores['nombre'] = 'Este nombre ya está registrado';
    elseif (strlen($_POST['nombre']) > 20)
    $errores['nombre'] = 'El nombre puede tener hasta 20 caracteres maximo';
} 


if(strlen($_POST['apellido']) > 20){
    $errores['apellido'] = 'El apellido puede tener hasta 20 caracteres maximo';
}


if (empty($_POST['email']) || (trim($_POST['email']) == '')) {
    $errores['email'] = 'Olvidaste escribir tu email';
}else{
//le agrego la validacion NOT LIKE para que no tome encuenta este id a la hora de buscar los emails en la tabla usuarios. Porque si no agrego eso, encontrará este mismo mail en la base de datos y me tirará el error de 'este email ya esta registrado'. Entonces por esto tengo que sacar a este id de las opciones de la base de datos.
    $select_email = "SELECT email FROM usuarios WHERE email = '$_POST[email]' NOT LIKE usuarios_id=$id";
    $res_select_email = mysqli_query($cnx, $select_email);

    if ($res_select_email->num_rows)
        $errores['email'] = 'Este email ya está registrado';
    elseif (strlen($_POST['email']) > 120)
        $errores['email'] = 'El email puede tener hasta 120 caracteres';
}




$nombre_img_perfil = null;
    if (!empty($_FILES['img_user']) && $_FILES['img_user']['size'] > 0) {
    
        $img_perfil = $_FILES['img_user'];
    
     if ($img_perfil['type'] != "image/png" && $img_perfil['type'] != 'image/jpeg' && $img_perfil['type'] != 'image/webp') {
            $errores['img_user'] = 'La imagen debe de ser de tipo .png o .jpg o .webp';
     }
       if ($img_perfil['type'] == "image/png")
     $ext = '.png';
     else if ($img_perfil['type'] == "image/jpeg")
     $ext = '.jpg';
     else if ($img_perfil['type'] == "image/webp")
     $ext = '.webp';
    
        $nombre_img_perfil = basename(time() . '_perfil' . $ext);
    
        move_uploaded_file($img_perfil['tmp_name'], "../img/users/$nombre_img_perfil");
        

        $imagen_perfil = mysqli_real_escape_string($cnx, $nombre_img_perfil) ?? null;
        $insert_imagen_perfil = "UPDATE usuarios SET 
                        img_user='$imagen_perfil'
                        WHERE usuarios_id = $id";
        
        $rpta_imagen_perfil = mysqli_query($cnx, $insert_imagen_perfil);
        
                $_SESSION['usuario']['img_user'] = $imagen_perfil;
}
    

if (count($errores)) {
    $json_errores = json_encode($errores);
    header("Location: ../index.php?seccion=perfil&id=$id&status=error&campo=$json_errores");
    exit;
}






//aca guardo en variables, los datos que mandó el usuario en el formulario, para asi guardarlo en la base de datos
$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$apellido = mysqli_real_escape_string($cnx, $_POST['apellido']);
$email = mysqli_real_escape_string($cnx, $_POST['email']);
$fecha = mysqli_real_escape_string($cnx, $_POST['fecha_nacimiento']);



//aca le digo que me edite este usuario en especifico
$insert_user = "UPDATE usuarios SET
nombre='$nombre', apellido='$apellido', email='$email', fecha_nacimiento='$fecha'
WHERE usuarios_id = $id";
$res_insert_user = mysqli_query($cnx, $insert_user);


if($res_insert_user){
    header('Location: ../index.php?seccion=home&status=ok&accion=editado');
    exit;
} else {
    header("Location: ../index.php?seccion=perfil&id=$id&status=error&tipo=usuario");
    exit;
}
