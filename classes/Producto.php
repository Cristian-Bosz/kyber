<?php
require_once(__DIR__ . '/../bootstrap/autoload.php');

class Producto
{
    private $productos_id;
    private $img;
    private $nombre;
    private $descripcion;
    private $precio;
    private $categorias_id_fk;
    private $colores_id_fk;


    public function __construct( $img, $nombre,$descripcion, $precio, $categorias_id_fk, $colores_id_fk, $cnx)
    {
        $this->img = $img;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categorias_id_fk = $categorias_id_fk;
        $this->colores_id_fk = $colores_id_fk;
        $this->cnx = $cnx;
    }

    public function cargar()
    {
        $insert = "INSERT INTO productos (img, nombre, descripcion, precio, categorias_id_fk, colores_id_fk) 
        VALUES ('$this->img', '$this->nombre', '$this->descripcion',   $this->precio,  $this->categorias_id_fk , $this->colores_id_fk)";
        
    
        try{
            $res_insert = mysqli_query(DB::conectar(), $insert);
            if(!$res_insert)
            throw new Exception("Hubo un error al cargar el producto");

            return json_encode([
                'status' => 1,
                'msj' =>'El producto fue cargado exitosamente'
            ]);
            
        } catch (Exception $e){
            return json_encode([
                'status' => 0,
                'msj' => $e->getMessage()
            ]);
        }
    }
}