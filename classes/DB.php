<?php

class DB
{
    protected $cnx;

    public static function conectar()
    {
    
            $servidor = 'localhost';
            $user = "root";
            $pass = "";
            $db = "kybers";
    
            return mysqli_connect($servidor, $user, $pass, $db);
    }
}