<?php
class Libro{
    protected $code;
    protected $nombre;
    protected $Autor;
    protected $genero;
    protected $sinopsis;
    protected $portada;
    protected $pages;
    protected $price;

    public function catalago(){
        $librosCatalogo=[];
        $miJson =file_get_contents("content/libros.json");
        $json_libros=json_decode($miJson, true);

        foreach ($json_libros as $libros) {
            $libro = new Libro();
            $libro->code= $libros["code"];
            $libro->nombre= $libros["nombre"];
            $libro->Autor= $libros["Autor"];
            $libro->genero= $libros["genero"];
            $libro->sinopsis= $libros["sinopsis"];
            $libro->portada= $libros["portada"];
            $libro->pages= $libros["pages"];
            $libro->price= $libros["price"];

            $librosCatalogo []= $libro;

        }
        print_r($librosCatalogo);
        return $librosCatalogo;
    }
    
}