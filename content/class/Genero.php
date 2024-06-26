<?php
class Genero
{
    protected $id;
    protected $genero_tipo;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getGeneroTipo()
    {
        return $this->genero_tipo;
    }


    public function setGeneroTipo($genero_tipo): self
    {
        $this->genero_tipo = $genero_tipo;

        return $this;
    }
    public function all_genres(): array
    {
        $genresArray = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM genero ";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, Genero::class);
        $PDOStament->execute();
        while ($genero = $PDOStament->fetch()) {
            $genresArray[] = $genero;
        }

        return $genresArray;

    }
    public function insert(string $genero_tipo) :void {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO genero VALUES (NULL,:genero_tipo);";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute(["genero_tipo"=>htmlspecialchars($genero_tipo) ]);
    }
    public function buscar_x_nombre($genero)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM genero WHERE genero.genero_tipo = :genero";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["genero"=>htmlspecialchars($genero) ]);
        $resultado = $PDOStatement->fetch();

        return isset($resultado) ? $resultado : null;
    }
    public function delete(): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM genero WHERE id = $this->id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute();
    }
    public function buscar_x_id($genero)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM genero WHERE id = :genero";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["genero"=>htmlspecialchars($genero) ]);
        $resultado = $PDOStatement->fetch();

        return isset($resultado) ? $resultado : null;
    }
    public function update(string $genero_tipo, int $id): void {
        $conexion=(new Conexion())->getConexion();

        $query = "UPDATE genero SET genero_tipo = :genero_tipo WHERE id = :id;";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "genero_tipo" => htmlspecialchars($genero_tipo),
            "id" => htmlspecialchars($id),
        ]);
    }
}