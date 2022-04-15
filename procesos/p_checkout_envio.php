<?php
require_once('../config/config.php');
require_once('../config/funciones.php');

$errores = [];

if (empty($_POST['direccion']) || (trim($_POST['direccion']) == '')) {
	$errores['direccion'] = 'Olvidaste escribir tu dirección';
}


if (empty($_POST['codigo']) || (trim($_POST['codigo']) == '')) {
	$errores['codigo'] = 'Olvidaste escribir el código postal de tu domicilio';
}elseif (strlen($_POST['codigo']) > 4){
    $errores['codigo'] = 'El código postal debe tener hasta 4 cifras MÁXIMO';
} 




$direccion = mysqli_real_escape_string($cnx, $_POST['direccion']);
$codigo = mysqli_real_escape_string($cnx, $_POST['codigo']);


if (count($errores)){
    $_SESSION['campos'] = $_POST;
    $_SESSION['errores'] = $errores;
    
    header("Location: ../index.php?seccion=checkout_envio");
    exit;
}else{
    unset($_SESSION['errores']);
  

    header("Location: ../index.php?seccion=checkout_pago");
    exit;
}



