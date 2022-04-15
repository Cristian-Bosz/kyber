<?php


$errores = [];

if (empty($_POST['nombre']) || (trim($_POST['nombre']) == '')) {
	$errores['nombre'] = 'Olvidaste escribir tu nombre';
}elseif (strlen($_POST['nombre']) > 45){
    $errores['nombre'] = 'Ups! El nombre debe de tener hasta 45 caracteres MÁXIMO';
} 


if (empty($_POST['apellido']) || (trim($_POST['apellido']) == '')) {
	$errores['apellido'] = 'Olvidaste escribir tu apellido';
} 


if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$errores['email'] = 'Olvidaste escribir tu email';
} 


if (empty($_POST['comentario']) || (trim($_POST['comentario']) == '')) {
	$errores['comentario'] = 'Olvidaste escribir el comentario';
}elseif (strlen($_POST['comentario']) > 255){
    $errores['comentario'] = 'Ups! El comentario debe de tener hasta 255 caracteres MÁXIMO';
}

$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$apellido = mysqli_real_escape_string($cnx, $_POST['apellido']);
$email = mysqli_real_escape_string($cnx, $_POST['email']);
$comentario = mysqli_real_escape_string($cnx, $_POST['comentario']);

if (count($errores)) {
    $json_errores = json_encode($errores);
    header("Location: ../index.php?seccion=contacto&status=error&campo=$json_errores");
    exit;
}else{
    header("Location: ../index.php?seccion=gracias");
    exit;
}


