<?php
class Purchases
{
    protected $id;
    protected $id_user;
    protected $quantity;
    protected $id_libro;
    protected $price;
    protected $date;
    protected static $valoresDB = ["id", "quantity","price", "date"];
    
    public function compras_x_usuario($id)
    {
        $allPurchases = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT pivotxpurchasesxuser.*, usuario.*,GROUP_CONCAT(pivotxpurchasesxuser.id_libro) AS librosComprados,GROUP_CONCAT(pivotxpurchasesxuser.quantity) AS cantidadDeLibros FROM `pivotxpurchasesxuser` LEFT JOIN libro ON libro.id = pivotxpurchasesxuser.id_libro INNER JOIN usuario ON pivotxpurchasesxuser.id_user = :id';

        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStament->execute();
        while ($purchase = $PDOStament->fetch()) {
            $allPurchases[] = $this->mapear($purchase);
        }


        return $allPurchases;

    }
    public function mapear($purchaseArrayAsociativo): Purchases
    {
        $purchase = new self();

        foreach (self::$valoresDB as $valor) {
            $purchase->{$valor} = $purchaseArrayAsociativo[$valor];
        }

        $purchase->id_user = (new Usuario())->buscar_x_id($purchaseArrayAsociativo["id_user"]);
        $purchase->id_libro = (new Libro())->buscar_x_id($purchaseArrayAsociativo["id_libro"]);

        // $genresId = explode(",", $libroArrayAsociativo["genero"]);
        // $all_genres = [];
        // if (!empty($genresId[0])) {
        //     foreach ($genresId as $genreId) {
        //         $all_genres[] = (new Genero())->buscar_x_nombre(($genreId));
        //     }
        // }

        // $libro->all_genres = $libroArrayAsociativo["genero"];
        // $libro->genero = $all_genres;
        return $libro;
    }
    public function bringPurchases(int $id_user, int $id_purchase): void
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO pivotxpurchasesxuser VALUES (NULL, :id_user, :id_libro)";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            "id_user" => htmlspecialchars($id_user),
            "id_purchase" => htmlspecialchars($id_purchase)
        ]);

    }
}