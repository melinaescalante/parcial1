<?php
class Usuario{
    protected $id;
    protected $nombre_completo;
    protected $email;
    protected $password;
    protected $rol;

    // public function(){

    public function getId()
    {
        return $this->id;
    }
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function insert(string $nombre, string $email, string $pass,string $rol): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO usuario VALUES (NULL, :nombre,:email,:pass,:rol);";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'nombre' => htmlspecialchars($nombre),
            'autor_id' => htmlspecialchars($email),
            'sinopsis' => htmlspecialchars($pass),
            'portada' => htmlspecialchars($rol)
        ]);
        // return $conexion->lastInsertId();
    }
}