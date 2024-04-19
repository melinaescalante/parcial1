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
        // print_r($librosCatalogo);
        return $librosCatalogo;
    }
    public function catalago_x_personajes($genero){
        $LibrosTotal= $this->catalago();
        $librosArray=[];
        foreach ($LibrosTotal as $libro) {
            if ($libro->genero==$genero){
            $librosArray []= $libro; /*Manera acortada de array_push*/
                
            }
        }
        return $librosArray;
    }
    
    // public function buscar_x_id($id){
    //     $LibrosTotal= $this->catalago();
    //     foreach ($LibrosTotal as $libro) {
    //     if ($libro->code==$id){
    //        return $libro;
                    
    //         }
        
    //     }
    //  }
    public function getPages()
    {
        return $this->pages;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getPortada()
    {
        return $this->portada;
    }
    public function getSinopsis()
    {
        return $this->sinopsis;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getAutor()
    {
        return $this->Autor;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCode()
    {
        return $this->code;
    }
}