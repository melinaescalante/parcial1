<?php
class Libro
{
    protected $id;
    protected $nombre;
    protected $autor_id;

    protected $sinopsis;
    protected $portada;
    protected $pages;
    protected $price;
    protected $editorial_id;
    protected $genero;
    public function catalago()
    {
        $librosCatalogo = [];

        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT libro.*,GROUP_CONCAT(genero.genero_tipo) AS genero FROM libro LEFT JOIN pivotxgeneroxlibro ON libro.id = pivotxgeneroxlibro.libro_id JOIN genero on pivotxgeneroxlibro.genero_id= genero.id Group by libro.id';
        // $query = 'SELECT * FROM libro';
        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, Libro::class);
        $PDOStament->execute();
        while ($libro = $PDOStament->fetch()) {
            $librosCatalogo[] = $libro;
        }

        return $librosCatalogo;

    }

    public function buscar_x_coincidencia($titulo)
    {
        $databookFound = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT * FROM libro WHERE nombre LIKE :titulo';
        $stmt = $conn->prepare($query);

        $tituloConPorcentajes = "%$titulo%";

        $stmt->bindParam(':titulo', $tituloConPorcentajes, PDO::PARAM_STR);
        $stmt->execute();
        $databook = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($databook as $key) {

            $autor = (new Autor())->buscar_x_id($key["autor_id"]);
            $editorial = (new Editorial())->buscar_x_id($key["editorial_id"]);

            $data = [
                'codeFound1' => $key["id"],
                'nameFound1' => $key["nombre"],
                'autorFound1' => $autor->getAutorNombre(),
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

    }
    public function buscar_x_id($code)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT libro.*,GROUP_CONCAT(genero.id) AS genero FROM libro LEFT JOIN pivotxgeneroxlibro ON libro.id = pivotxgeneroxlibro.libro_id JOIN genero on pivotxgeneroxlibro.genero_id= genero.id WHERE libro.id=:code Group by libro.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['code' => htmlspecialchars($code)]);
        $resultado = $PDOStatement->fetch();

        return isset($resultado) ? $resultado : null;
    }
    public function getPages()
    {
        return $this->pages;
    }
    public function getGenre()
    {
        return $this->genero;
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

    public function getAutor()
    {
        $autor = (new Autor())->buscar_x_id($this->autor_id);
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

    public function getEditorial()
    {
        $editorial = (new Editorial())->buscar_x_id($this->editorial_id);
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
    public function reemplazarImagen($imagen, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = 'UPDATE libro SET portada = :imagen WHERE id = :id;';
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'id' => htmlspecialchars($id),
            'imagen' => htmlspecialchars($imagen),
        ]);
    }

    public function insert(string $nombre, int $autor_id, string $sinopsis, $portada, int $pages, int|float $price, int $editorial_id): int
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO libro VALUES (NULL, :nombre,:autor_id,:sinopsis,:portada,:pages, :price,:editorial_id);";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'nombre' => htmlspecialchars($nombre),
            'autor_id' => htmlspecialchars($autor_id),
            'sinopsis' => htmlspecialchars($sinopsis),
            'portada' => htmlspecialchars($portada),
            'pages' => htmlspecialchars($pages),
            'price' => htmlspecialchars($price),
            'editorial_id' => htmlspecialchars($editorial_id),
        ]);
        return $conexion->lastInsertId();
    }
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM libro WHERE id = $this->id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute();
    }
    public function update(int $id, string $nombre, int $autor_id, string $sinopsis, int $pages, int|float $price, int $editorial_id): void
    {
        $conexion = (new Conexion())->getConexion();

        $query = "UPDATE libro SET 
            `nombre` = :nombre, 
            `autor_id` = :autor_id, 
            `sinopsis` = :sinopsis, 
            `pages` = :pages, 
            `price` = :price, 
            `editorial_id` = :editorial_id 
          WHERE `id` = :id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([

            "id" => htmlspecialchars($id),
            "nombre" => htmlspecialchars($nombre),
            "autor_id" => htmlspecialchars($autor_id),
            "sinopsis" => htmlspecialchars($sinopsis),
            "pages" => htmlspecialchars($pages),
            "price" => htmlspecialchars($price),
            "editorial_id" => htmlspecialchars($editorial_id)
        ]);
    }
public function addGenre(int $id_genre, int $id_libro): void{
    $conexion = (new Conexion())->getConexion();
    $query = "INSERT INTO pivotxgeneroxlibro VALUES (NULL, :id_genre, :id_libro)";
    $PDOStament = $conexion->prepare($query);
    $PDOStament->execute([
        "id_genre"=>htmlspecialchars($id_genre),
        "id_libro"=>htmlspecialchars($id_libro)
        ]);

}
public function delete_genre(int $id_libro): void{
    $conexion = (new Conexion())->getConexion();
    $query = "DELETE FROM pivotxgeneroxlibro WHERE libro_id = :id_libro";
    $PDOStament = $conexion->prepare($query);
    $PDOStament->execute([
        "id_libro"=>htmlspecialchars($id_libro)
        ]);

}
    public function getAutorId()
    {
        return $this->autor_id;
    }


    public function getEditorialId()
    {
        return $this->editorial_id;
    }


}