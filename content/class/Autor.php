<?php
class Autor{
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
}