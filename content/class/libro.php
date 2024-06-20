<?php
class Libro
{
    protected $id;
    protected $nombre;
    // protected $autor_id;
    protected $autor;
    protected $sinopsis;
    protected $portada;
    protected $pages;
    protected $price;
    protected $editorial;
    // protected $editorial_id;
    protected $genero;
    protected $all_genres;

    protected static $valoresDB = ["id", "nombre", "sinopsis", "portada", "pages", "price"];
    public function catalago()
    {
        $librosCatalogo = [];

        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT libro.*,GROUP_CONCAT(genero.genero_tipo) AS genero FROM libro LEFT JOIN pivotxgeneroxlibro ON libro.id = pivotxgeneroxlibro.libro_id JOIN genero on pivotxgeneroxlibro.genero_id= genero.id Group by libro.id';

        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStament->execute();
        while ($libro = $PDOStament->fetch()) {
            $librosCatalogo[] = $this->mapear($libro);
        }

        return $librosCatalogo;

    }
    public function mapear($libroArrayAsociativo): Libro
    {
        $libro = new self();

        foreach (self::$valoresDB as $valor) {
            $libro->{$valor} = $libroArrayAsociativo[$valor];
        }

        $libro->autor = (new Autor())->buscar_x_id($libroArrayAsociativo["autor_id"]);
        $libro->editorial = (new Editorial())->buscar_x_id($libroArrayAsociativo["editorial_id"]);

        $genresId = explode(",", $libroArrayAsociativo["genero"]);
        $all_genres = [];
        if (!empty($genresId[0])) {
            foreach ($genresId as $genreId) {
                $all_genres[] = (new Genero())->buscar_x_nombre(($genreId));
            }
        }

        $libro->all_genres = $libroArrayAsociativo["genero"];
        $libro->genero = $all_genres;
        return $libro;
    }
    public function buscar_x_genero($genero)
    {
        $databookFound = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT libro.*, GROUP_CONCAT(genero.genero_tipo) AS genero FROM libro  LEFT JOIN pivotxgeneroxlibro ON libro.id = pivotxgeneroxlibro.libro_id 
                  JOIN genero ON pivotxgeneroxlibro.genero_id = genero.id 
                  WHERE libro.id IN (
                      SELECT libro.id 
                      FROM libro 
                      LEFT JOIN pivotxgeneroxlibro ON libro.id = pivotxgeneroxlibro.libro_id 
                      JOIN genero ON pivotxgeneroxlibro.genero_id = genero.id 
                      WHERE genero.genero_tipo LIKE :genero
                )  GROUP BY libro.id';

        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);


        $PDOStament->execute([
            "genero" => htmlspecialchars("%$genero%"),
        ]);

        while ($libro = $PDOStament->fetch()) {

            $databookFound[] =$this->mapear($libro);
        }

        return $databookFound;
        

    }
    public function buscar_x_coincidencia($titulo)
    {
        $databookFound = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT libro.*,GROUP_CONCAT(genero.genero_tipo) AS genero FROM libro LEFT JOIN pivotxgeneroxlibro ON libro.id = pivotxgeneroxlibro.libro_id JOIN genero on pivotxgeneroxlibro.genero_id= genero.id where libro.nombre like :titulo Group by libro.id';
        // SELECT * FROM libro WHERE nombre LIKE :titulo
         
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
                'genreFound1' => $key["genero"],
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
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(['code' => htmlspecialchars($code)]);
        $libroArray = $PDOStatement->fetch();
        $libro = $this->mapear($libroArray);
        return isset($libro) ? $libro : null;
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

        return $this->autor->getAutorNombre();
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

        return $this->editorial->getEditorialNombre();
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
    public function addGenre(int $id_genre, int $id_libro): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO pivotxgeneroxlibro VALUES (NULL, :id_genre, :id_libro)";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "id_genre" => htmlspecialchars($id_genre),
            "id_libro" => htmlspecialchars($id_libro)
        ]);

    }
    public function delete_genre(int $id_libro): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM pivotxgeneroxlibro WHERE libro_id = :id_libro";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "id_libro" => htmlspecialchars($id_libro)
        ]);

    }
    public function getAutorId()
    {
        // return $this->autor_id;
        return $this->autor->getId();    }


    public function getEditorialId()
    {
        return $this->editorial->getId();
        // return $this->editorial_id;
    }

    public function getAllGenres()
    {


        return $this->all_genres;
    }
}