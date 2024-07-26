<?php
class Usuario
{
    protected $id;
    protected $nombre_completo;
    protected $email;
    protected $password;
    protected $rol;
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
    public function insert(string $nombre, string $email, string $pass, string $rol): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO usuario VALUES (NULL, :nombre,:email,:pass,:rol);";
        $paswordHash = password_hash(htmlspecialchars($pass), PASSWORD_DEFAULT);
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'nombre' => htmlspecialchars($nombre),
            'email' => htmlspecialchars($email),
            'pass' => $paswordHash,
            'rol' => htmlspecialchars($rol)
        ]);

    }
    public function usuario_x_email(string $email)
    {
        $conexion = (new Conexion())->getConexion();
        $query = " SELECT * FROM usuario WHERE email = :email ";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute([
            "email" => htmlspecialchars($email)
        ]);

        $result = $PDOStament->fetch();

        return $result ? $result : null;
    }
  
    function check_role($datos)
    {
        if ($_SESSION['login']['rol'] !== 'admin') {
         
            header("Location:../index.php?view=quienesSomos");
        }
    }
    public function all_users(): array
    {
        $usersArray = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = "SELECT * FROM usuario";
        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();
        while ($user = $PDOStament->fetch()) {
            $usersArray[] = $user;
        }

        return $usersArray;

    }
    public function delete(): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM usuario WHERE id = $this->id";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute();
    }
    public function buscar_x_id($user)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM usuario WHERE id = :user";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["user"=>htmlspecialchars($user) ]);
        $resultado = $PDOStatement->fetch();

        return isset($resultado) ? $resultado : null;
    }
    public function update(string $nombre,string $email, string $rol, int $id): void {
        $conexion=(new Conexion())->getConexion();

        $query = "UPDATE usuario SET nombre_completo = :nombre, email=:email, rol=:rol WHERE id = :id;";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "nombre" => htmlspecialchars($nombre),
            "email" => htmlspecialchars($email),
            "rol" => htmlspecialchars($rol),
            "id" => htmlspecialchars($id),
        ]);
    }
}