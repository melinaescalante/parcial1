<?php
require_once "content/class/conexion.php";
require_once "content/class/libro.php";

$conexion = new Conexion();

$base_de_datos = $conexion->getConexion();

$query = "SELECT * FROM libro";

$PDOStament = $base_de_datos->prepare($query);

$PDOStament->setFetchMode(PDO::FETCH_CLASS, Libro::class);

$PDOStament->execute();

// $comics = [];
$librosCatalogo = [];

while($libro = $PDOStament->fetch()){
    $librosCatalogo []= $libro;
}

echo "<pre>";
print_r($librosCatalogo);
echo "</pre>";
  
        // $conn = $conexion->getConexion();
       
        // $PDOStament = $conn->prepare($query);
        // $PDOStament->setFetchMode(PDO::FETCH_CLASS, Libro::class);
        // $PDOStament->execute();
        // while ($libro = $PDOStament->fetch()) {
        //     $librosCatalogo[] = $libro;
        // }
        // return $librosCatalogo;