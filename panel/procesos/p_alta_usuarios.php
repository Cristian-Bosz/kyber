<?php
require_once('../../config/config.php');
require_once('../../config/funciones.php');


$errores = [];
if (empty($_POST['nombre']) || (trim($_POST['nombre']) == '')) {
    $errores['nombre'] = 'Olvidaste escribir tu nombre de usuario';
}else{
    $select_username="SELECT nombre FROM usuarios WHERE nombre='$_POST[nombre]'";
    $res_select_username=mysqli_query($cnx, $select_username);

    if ($res_select_username->num_rows)
    $errores['nombre'] = 'Este nombre ya está registrado';
    elseif (strlen($_POST['nombre']) > 120)
    $errores['nombre'] = 'El nombre puede tener hasta 120 caracteres maximo';
} 




if (empty($_POST['email']) || (trim($_POST['email']) == '')) {
    $errores['email'] = 'Olvidaste escribir tu email';
}else{
    $select_email = "SELECT email FROM usuarios WHERE email = '$_POST[email]'";
    $res_select_email = mysqli_query($cnx, $select_email);

    if ($res_select_email->num_rows)
        $errores['email'] = 'Este email ya está registrado';
    elseif (strlen($_POST['email']) > 120)
        $errores['email'] = 'El email puede tener hasta 120 caracteres';
}



if (empty($_POST['permisos'])) {
    $errores['permisos'] = 'Ups! Olvidaste asignarle un PERMISO';
}


if (empty($_POST['pass']))
    $errores['pass'] = 'Olvidaste poner tu constraseña';
elseif (strlen($_POST['pass']) < 8)
$errores['pass'] = 'Muy pobre. La contraseña debe de tener entre 8 y 16 caracteres.';
elseif (strlen($_POST['pass']) > 16)
$errores['pass'] = 'Demasiados caracteres. La contraseña debe de tener entre 8 y 16 caracteres.';


    
if (count($errores)) {
    $json_errores = json_encode($errores);
    header("Location: ../panel.php?seccion=alta_usuarios&status=error&campo=$json_errores");
    exit;
}


//aca guardo en variables, los datos que mandó el usuario en el formulario, para asi guardarlo en la base de datos

$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$permisos = mysqli_real_escape_string($cnx, $_POST['permisos']);
$email = mysqli_real_escape_string($cnx, $_POST['email']);
$password = mysqli_real_escape_string($cnx, password_hash($_POST['pass'], PASSWORD_DEFAULT));

$insert="INSERT INTO usuarios (nombre, email, password, tipo_user_id_fk)
VALUES ('$nombre', '$email', '$password', '$permisos');";
$res_insert = mysqli_query($cnx, $insert);

if ($res_insert) {
    header('Location: ../panel.php?seccion=listado_usuarios&status=ok&accion=creado');
} else {
    header('Location: ../panel.php?seccion=alta_usuarios&status=error&tipo=usuario');
}
