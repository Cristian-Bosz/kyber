<?php
require_once('../config/config.php');
require_once('../config/funciones.php');

$errores = [];

if (empty($_POST['tarjeta']) || (trim($_POST['tarjeta']) == '')) {
	$errores['tarjeta'] = 'Olvidaste escribir el número de la tarjeta de debito/credito';
}elseif (strlen($_POST['tarjeta']) > 16){
    $errores['tarjeta'] = 'El numero de la tarjeta debe tener 16 caracteres';
}elseif (strlen($_POST['tarjeta']) < 16){
    $errores['tarjeta'] = 'El numero de la tarjeta debe tener 16 caracteres';
}  



if (empty($_POST['nya']) || (trim($_POST['nya']) == '')) {
	$errores['nya'] = 'Olvidaste escribir el nombre del titular de la tarjeta';
}

if (empty($_POST['fecha']) || (trim($_POST['fecha']) == '')) {
	$errores['fecha'] = 'Olvidaste escribir la fecha de expiración';
}


if (empty($_POST['seguridad']) || (trim($_POST['seguridad']) == '')) {
	$errores['seguridad'] = 'Olvidaste escribir el código de seguridad';
}elseif (strlen($_POST['seguridad']) > 4){
    $errores['seguridad'] = 'El código de seguridad debe tener hasta 4 cifras MÁXIMO';
}elseif (strlen($_POST['seguridad']) < 3){
    $errores['seguridad'] = 'El código de seguridad debe tener hasta 3 cifras MÍNIMO';
}  


if (empty($_POST['DNI']) || (trim($_POST['DNI']) == '')) {
	$errores['DNI'] = 'Olvidaste escribir el DNI';
}elseif (strlen($_POST['codigo']) > 8){
    $errores['DNI'] = 'El DNI debe tener hasta 8 cifras MAXIMO';
}



$tarjeta = mysqli_real_escape_string($cnx, $_POST['tarjeta']);
$nya = mysqli_real_escape_string($cnx, $_POST['nya']);
$seguridad = mysqli_real_escape_string($cnx, $_POST['seguridad']);
$dni = mysqli_real_escape_string($cnx, $_POST['DNI']);
$fecha = mysqli_real_escape_string($cnx, $_POST['fecha']);


if (count($errores)){
    $_SESSION['campos'] = $_POST;
    $_SESSION['errores'] = $errores;
    
    header("Location: ../index.php?seccion=checkout_pago");
    exit;
}else{
    unset($_SESSION['errores']);
  

    header("Location: ../index.php?seccion=checkout_gracias");
    exit;
}



