<?php
class Editorial{
    protected $id;
    protected $editorial_nombre;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of editorial_nombre
     */
    public function getEditorialNombre()
    {
        return $this->editorial_nombre;
    }

    /**
     * Set the value of editorial_nombre
     */
    public function setEditorialNombre($editorial_nombre): self
    {
        $this->editorial_nombre = $editorial_nombre;

        return $this;
    }
}