<?php
class Libro
{
    protected $id;
    protected $nombre;
    protected $autor_id;
    protected $genero;
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

            $data = [
                'codeFound1' => $key["id"],
                'nameFound1' => $key["nombre"],
                'autorFound1' => $key["autor_id"],
                'sinopsisFound1' => $key["sinopsis"],
                'imgFound1' => $key["portada"],
                'pagesFound1' => $key["pages"],
                'priceFound1' => $key["price"],
                // 'genreFound1' => $databookFound["genero"], 
                'editorialFound1' => $key["editorial_id"],
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
    public function getGenero()
    {
        return $this->genero;
    }
    public function getAutor()
    {
        return $this->autor_id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getCode()
    {
        return $this->id;
    }

}