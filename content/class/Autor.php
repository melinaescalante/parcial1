<?php
class Autor
{
    protected $id;
    protected $autor_nombre;
    protected $autor_biografia;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getAutorNombre()
    {
        return $this->autor_nombre;
    }


    public function setAutorNombre($autor_nombre): self
    {
        $this->autor_nombre = $autor_nombre;

        return $this;
    }


    public function getAutorBiografia()
    {
        return $this->autor_biografia;
    }


    public function setAutorBiografia($autor_biografia): self
    {
        $this->autor_biografia = $autor_biografia;

        return $this;
    }
    public function buscar_x_id($autor)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM autor WHERE id = $autor";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();

        return isset($resultado) ? $resultado : null;

    }
    public function all_autors(): array
    {
        $autorsArray = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM autor ";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, Autor::class);
        $PDOStament->execute();
        while ($autor = $PDOStament->fetch()) {
            $autorsArray[] = $autor;
        }

        return $autorsArray;
    }
    public function insert(string $autor_nombre, string $autor_biografia)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO autor VALUES (NULL, '$autor_nombre', '$autor_biografia');";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute();
    }
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM autor WHERE id = $this->id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute();
    }
    public function update(string $autor_nombre, string $autor_biografia, int $id){
        $conexion=(new Conexion())->getConexion();

        $query = "UPDATE autor SET autor_nombre = :autor_nombre, autor_biografia=:autor_biografia WHERE id = :id;";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "autor_nombre" => htmlspecialchars($autor_nombre),
            "autor_biografia" => htmlspecialchars($autor_biografia),
            "id" => htmlspecialchars($id),
        ]);
    }
}