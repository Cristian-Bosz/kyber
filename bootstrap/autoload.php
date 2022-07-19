<?php
spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . "/../classes/$clase.php";

    if (file_exists($ruta));
    require_once($ruta);
});