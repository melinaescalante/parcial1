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
}