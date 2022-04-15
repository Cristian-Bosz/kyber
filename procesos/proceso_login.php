<?php
require_once('../config/config.php');
require_once('../config/funciones.php');


$errores = [];
if (empty($_POST['nombre'])){
    $errores['nombre'] = 'El nombre de usuario que ingresaste no pertenece a ninguna cuenta. Comprueba el nombre de usuario y vuelve a intentarlo.
    ';
}

if (empty($_POST['pass'])){
    $errores['pass'] = 'La contraseña no es correcta. Compruébala.';
}

if (count($errores)){
    $_SESSION['errores'] = $errores;

    header("Location: ../index.php?seccion=login");
    exit;
}
$usr = mysqli_real_escape_string($cnx, $_POST['nombre']);
$select_username="SELECT * FROM usuarios WHERE nombre='$usr'";
$res_select_username=mysqli_query($cnx, $select_username);
$user = mysqli_fetch_assoc($res_select_username);

if ((!$res_select_username->num_rows) || !password_verify($_POST['pass'], $user['password'])){
    unset($_SESSION['errores']);
    $_SESSION['error'] = 'El nombre de usuario o la contraseña son incorrectas. Volve a intentarlo.';
    header("Location: ../index.php?seccion=login");
    exit;
}
unset($_SESSION['errores']);
unset($_SESSION['error']);

$_SESSION['usuario'] = $user;
header("Location: ../index.php?seccion=home");
