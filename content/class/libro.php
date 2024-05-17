<?php

class Libro
{
    protected $code;
    protected $nombre;
    protected $Autor;
    protected $genero;
    protected $sinopsis;
    protected $portada;
    protected $pages;
    protected $price;
   

    public function catalago()
    {
        $librosCatalogo = [];
        $miJson = file_get_contents("content/libros.json");
        $json_libros = json_decode($miJson, true);

        foreach ($json_libros as $libros) {
            $libro = new Libro();
            $libro->code = $libros["code"];
            $libro->nombre = $libros["nombre"];
            $libro->Autor = $libros["Autor"];
            $libro->genero = $libros["genero"];
            $libro->sinopsis = $libros["sinopsis"];
            $libro->portada = $libros["portada"];
            $libro->pages = $libros["pages"];
            $libro->price = $libros["price"];

            $librosCatalogo[] = $libro;

        }
        return $librosCatalogo;
    }
    public function catalago_x_genero($genero)
    {
        $LibrosTotal = $this->catalago();
        $librosArray = [];
        foreach ($LibrosTotal as $libro) {
            if ($libro->genero == $genero) {
                $librosArray[] = $libro; /*Manera acortada de array_push*/

            }
        }
        return $librosArray;
    }
    public function buscar_x_id($titulo)
    {
     $databookFound;
        $LibrosTotal = $this->catalago();
        $libro_a_encontrar = strtolower($titulo);
        $isFound = false;
        foreach ($LibrosTotal as $libro) {
            $titleLibro = $libro->getNombre();
            $titleLibroMinuscula = strtolower($titleLibro);
            if ($titleLibroMinuscula == $libro_a_encontrar || strstr($titleLibroMinuscula, $libro_a_encontrar)) {
                $databookFound = [
                    'nameFound1' => $libro->getNombre(),
                    'imgFound1' => $libro->getPortada(),
                    'sinopsisFound1' => $libro->getSinopsis(),
                    'pagesFound1' => $libro->getPages(),
                    'priceFound1' => $libro->getPrice(),
                    'genreFound1' => $libro->getGenero(),
                    'autorFound1' => $libro->getAutor(),
                    'codeFound1' => $libro->getCode(),
                ];
                
                // $nameFound = $libro->nombre;
                // $imgFound = $libro->getPortada();
                // $sinopsisFound = $libro->getSinopsis();
                // $pagesFound = $libro->getPages();
                // $priceFound = $libro->getPrice();
                // $genreFound = $libro->getGenero();
                // $autorFound = $libro->getAutor();
                // $codeFound = $libro->getCode();            
                // createCardbyId($nameFound, $imgFound,$sinopsisFound,$pagesFound,$priceFound,$genreFound, $autorFound,$codeFound);
                $isFound = true;
            }
        }
        if (!$isFound) {
            $msg = "No coincide ni un ID con su busqueda. Lo lamentamos";
            createAnError($msg);

        }
        return $databookFound;
    }
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
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getCode()
    {
        return $this->code;
    }

}