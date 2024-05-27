<?php
class Libro
{
    protected $id;
    protected $nombre;
    protected $autor_id;
    protected $genero_id;
    protected $sinopsis;
    protected $portada;
    protected $pages;
    protected $price;
    protected $editorial_id;
    public function catalago()
    {
        $librosCatalogo = [];

        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT * FROM libro';
        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, Libro::class);
        $PDOStament->execute();
        while ($libro = $PDOStament->fetch()) {
            $librosCatalogo[] = $libro;
        }
        //         $miJson = file_get_contents("content/libros.json");
//         $json_libros = json_decode($miJson, true);
// print_r($json_libros);
        return $librosCatalogo;
        // foreach ($json_libros as $libros) {
        //     $libro = new Libro();
        //     $libro->code = $libros["code"];
        //     $libro->nombre = $libros["nombre"];
        //     $libro->Autor = $libros["Autor"];
        //     $libro->genero = $libros["genero"];
        //     $libro->sinopsis = $libros["sinopsis"];
        //     $libro->portada = $libros["portada"];
        //     $libro->pages = $libros["pages"];
        //     $libro->price = $libros["price"];

        //     $librosCatalogo[] = $libro;

        // }
    }
    // public function catalago_x_genero($genero)
    // {
    //     $LibrosTotal = $this->catalago();
    //     $librosArray = [];
    //     foreach ($LibrosTotal as $libro) {
    //         if ($libro->genero == $genero) {
    //             $librosArray[] = $libro; /*Manera acortada de array_push*/

    //         }
    //     }
    //     return $librosArray;
    // }
    public function buscar_x_id($titulo)
    {
        $databookFound = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT * FROM libro WHERE nombre LIKE :titulo';
        $stmt = $conn->prepare($query);
        // Agregar los comodines '%' al título
        $tituloConPorcentajes = "%$titulo%";
        // Vincular el parámetro
        $stmt->bindParam(':titulo', $tituloConPorcentajes, PDO::PARAM_STR);
        $stmt->execute();
        $databook = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($databook as $key) {
           
            $autor=(new Autor())->buscar_x_id($key["autor_id"]);
            $editorial=(new Editorial())->buscar_x_id($key["editorial_id"]);

            $data = [
                'codeFound1' => $key["id"],
                'nameFound1' => $key["nombre"],
                'autorFound1' =>  $autor->getAutorNombre(),
                'sinopsisFound1' => $key["sinopsis"],
                'imgFound1' => $key["portada"],
                'pagesFound1' => $key["pages"],
                'priceFound1' => $key["price"],
                // 'genreFound1' => $databookFound["genero"], 
                'editorialFound1' => $editorial->getEditorialNombre(),
            ];
            array_push($databookFound, $data);
        }

        return $databookFound;
        // $PDOStament = $conn->prepare($query);
        // $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        // $PDOStament->execute();
        // $databookFound = $PDOStament->fetchAll();
        // return $databookFound;
        // $LibrosTotal = $this->catalago();
        // $isFound = false;
        // foreach ($librosCatalogo as $libro) {
        //     $titleLibro = $libro->getNombre();
        //     $titleLibroMinuscula = strtolower($titleLibro);
        //     if ($titleLibroMinuscula == $libro_a_encontrar || strstr($titleLibroMinuscula, $libro_a_encontrar)) {
        //         $data = [
        //             'nameFound1' => $libro->getNombre(),
        //             'imgFound1' => $libro->getPortada(),
        //             'sinopsisFound1' => $libro->getSinopsis(),
        //             'pagesFound1' => $libro->getPages(),
        //             'priceFound1' => $libro->getPrice(),
        //             'genreFound1' => $libro->getGenero(),
        //             'autorFound1' => $libro->getAutor(),
        //             'codeFound1' => $libro->getCode(),
        //         ];
        //         $isFound = true;
        //     }
        // }
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
    // public function getGenero()
    // {
    //     return $this->genero_id;
    // }
    public function getAutor()
    {
        $autor=(new Autor())->buscar_x_id($this->autor_id);
        return $autor->getAutorNombre();
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getCode()
    {
        return $this->id;
    }

    public function getEditorialId()
    {
        $editorial=(new Editorial())->buscar_x_id($this->editorial_id);
        return $editorial->getEditorialNombre();
    }

    public function setEditorialId($editorial_id): self
    {
        $this->editorial_id = $editorial_id;

        return $this;
    }

    public function setPages($pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function setPortada($portada): self
    {
        $this->portada = $portada;

        return $this;
    }

    public function setSinopsis($sinopsis): self
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    // public function setGenero($genero): self
    // {
    //     $this->genero_id = $genero;

    //     return $this;
    // }

    public function setAutorId($autor_id): self
    {
        $this->autor_id = $autor_id;

        return $this;
    }


    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }
    public function insert(string $nombre, int $autor_id, string $sinopsis,  $portada,int $pages, int|float $price,int $editorial_id) : void {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO libro VALUES (NULL, '$nombre','$autor_id','$sinopsis','$portada','$pages',' $price','$editorial_id');";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute();
    }
}