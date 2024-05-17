<?php
class Editorial{
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
}