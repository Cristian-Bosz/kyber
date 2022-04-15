<?php
require_once("../config/config.php");
require_once("../config/funciones.php");

if (isset($_REQUEST["btnAgregar"])){
    $producto = $_REQUEST["producto"];
    $cantidad = $_REQUEST["cant"];
    $precio = $_REQUEST["precio"];
    $img = $_REQUEST["img"];
    $productos_id = $_REQUEST["productos_id"];
  

    $_SESSION["carrito"][$producto]["cant"] = $cantidad;
    $_SESSION["carrito"][$producto]["precio"] = $precio;
    $_SESSION["carrito"][$producto]["img"] = $img;
    $_SESSION["carrito"][$producto]["productos_id"] = $productos_id;

 


header("Location: ../index.php?seccion=cart");
    

}
?>