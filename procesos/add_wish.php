<?php
require_once("../config/config.php");
require_once("../config/funciones.php");

if (isset($_REQUEST["btnAddWish"])){
    $producto = $_REQUEST["producto"];
    $precio = $_REQUEST["precio"];
    $img = $_REQUEST["img"];
    $productos_id = $_REQUEST["productos_id"];

    $_SESSION["deseos"][$producto]["precio"] = $precio;
    $_SESSION["deseos"][$producto]["img"] = $img;
    $_SESSION["deseos"][$producto]["productos_id"] = $productos_id;

 


header("Location: ../index.php?seccion=wish");
    

}
?>