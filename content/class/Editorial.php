<?php
class Editorial
{
    protected $id;
    protected $editorial_nombre;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getEditorialNombre()
    {
        return $this->editorial_nombre;
    }


    public function setEditorialNombre($editorial_nombre): self
    {
        $this->editorial_nombre = $editorial_nombre;

        return $this;
    }
    public function buscar_x_id($id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM editorial";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();

        return isset($resultado) ? $resultado : null;
    }
    public function all_editorials() : Array{
        $editorialsArray=[];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM editorial ";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, Editorial::class);
        $PDOStament->execute();
        while ($editorial = $PDOStament->fetch()) {
            $editorialsArray[] = $editorial;
        }
        
        return $editorialsArray;
    }
}