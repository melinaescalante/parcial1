<?php
class Purchases
{
    protected $id;
    protected $id_user;
    protected $quantity;
    // protected $id_libro;
    protected $price;
    protected $date;
    protected $order_number;
    protected $librosComprados;
    protected static $valoresDB = ["id", "quantity", "price", "date","order_number"];

    public function compras_x_usuario($id)
    {
        $allPurchases = [];
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $query = 'SELECT pivotxpurchasesxuser.*, usuario.*,GROUP_CONCAT(pivotxpurchasesxuser.id_libro) AS librosComprados,GROUP_CONCAT(pivotxpurchasesxuser.quantity) AS cantidadDeLibros FROM pivotxpurchasesxuser LEFT JOIN libro ON libro.id = pivotxpurchasesxuser.id_libro INNER JOIN usuario ON pivotxpurchasesxuser.id_user = :id WHERE usuario.id=:id GROUP BY pivotxpurchasesxuser.order_number;';

        $PDOStament = $conn->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStament->execute(["id" => htmlspecialchars($id)]);
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
        $purchase->librosComprados = [];

        $librosComprados = explode(",", $purchaseArrayAsociativo["librosComprados"]);
        $quantityFinales = explode(",", $purchaseArrayAsociativo["cantidadDeLibros"]);

        $suma = 0;


        for ($i = 0; $i < count($librosComprados); $i++) {
            $libroId = $librosComprados[$i];
            $cantidad = intval($quantityFinales[$i]);
            $suma += $cantidad;
            $libro = (new Libro())->buscar_x_id($libroId);


            $purchase->librosComprados[] = ['libro' => $libro, 'cantidad' => $cantidad];

        }

        $purchase->quantity = $suma;
        return $purchase;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLibrosComprados()
    {
        return $this->librosComprados;
    }

    public function getOrderNumber()
    {
        return $this->order_number;
    }
}