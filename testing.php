<?php
require_once "content/class/conexion.php";
require_once "content/class/libro.php";

$conexion = new Conexion();

$base_de_datos = $conexion->getConexion();

// $query = "SELECT * FROM comics";

// $PDOStament = $db->prepare($query);

// $PDOStament->setFetchMode(PDO::FETCH_CLASS, Comic::class);

// $PDOStament->execute();

// $comics = [];

// while($comic = $PDOStament->fetch()){
//     $comics []= $comic;
// }

// echo "<pre>";
// print_r($comics);
// echo "</pre>";