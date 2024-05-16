<?php
class Genero{
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
}