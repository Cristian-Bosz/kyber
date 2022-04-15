<?php
require_once('../config/config.php');
require_once('../config/funciones.php');

$errores = [];

if (empty($_POST['nombre']) || (trim($_POST['nombre']) == '')) {
	$errores['nombre'] = 'Olvidaste escribir tu nombre';
}elseif (strlen($_POST['nombre']) > 45){
    $errores['nombre'] = 'Ups! El nombre debe de tener hasta 45 caracteres MÁXIMO';
} 


if (empty($_POST['apellido']) || (trim($_POST['apellido']) == '')) {
	$errores['apellido'] = 'Olvidaste escribir tu apellido';
}elseif (strlen($_POST['apellido']) > 45){
    $errores['apellido'] = 'Ups! El apellido debe de tener hasta 45 caracteres MÁXIMO';
} 


if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$errores['email'] = 'Olvidaste escribir tu email';
} 

if (empty($_POST['tel']) || (trim($_POST['tel']) == '')) {
	$errores['tel'] = 'Olvidaste escribir tu telefono';
}elseif (strlen($_POST['tel']) > 10){
    $errores['tel'] = 'Ups! El numero de telefono debe de tener 10 numeros';
}elseif (strlen($_POST['tel']) < 10){
    $errores['tel'] = 'Ups! El numero de telefono debe de tener 10 minimo';
} 

if (empty($_POST['dni']) || (trim($_POST['dni']) == '')) {
	$errores['dni'] = 'Olvidaste escribir tu DNI';
}elseif (strlen($_POST['dni']) > 8){
    $errores['dni'] = 'Ups! El DNI debe de tener 8 numeros maximo';
}elseif (strlen($_POST['dni']) < 8){
    $errores['dni'] = 'Ups! El DNI debe de tener 8 numeros minimo';
}  



$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$apellido = mysqli_real_escape_string($cnx, $_POST['apellido']);
$email = mysqli_real_escape_string($cnx, $_POST['email']);
$tel = mysqli_real_escape_string($cnx, $_POST['tel']);
$dni = mysqli_real_escape_string($cnx, $_POST['dni']);

if (count($errores)){
    $_SESSION['campos'] = $_POST;
    $_SESSION['errores'] = $errores;
    
    header("Location: ../index.php?seccion=checkout");
    exit;
}else{
    unset($_SESSION['errores']);
  

    header("Location: ../index.php?seccion=checkout_envio");
    exit;
}



