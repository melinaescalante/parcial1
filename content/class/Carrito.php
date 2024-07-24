<?php

class Carrito
{
    // Agregar item
    public function addItem(int $productoId, int $cantidad)
    {
        $libro = (new Libro())->buscar_x_id($productoId);
        if (isset($_SESSION["carrito"][$productoId])) {
            $_SESSION["carrito"][$productoId]["cantidad"] += $cantidad;
        } else {

            if ($libro) {
                $_SESSION["carrito"][$productoId] = [
                    "titulo" => $libro->getNombre(),
                    "portada" => $libro->getPortada(),
                    "precio" => $libro->getPrice(),
                    "cantidad" => $cantidad
                ];
            }
        }
    }

    // Devolver todo el carrito
    public function getCarrito()
    {
        if (isset($_SESSION["carrito"])) {
            return $_SESSION["carrito"];
        } else {
            return [];
        }
    }
    // Eliminar un item
    public function deleteItem($id)
    {
        print_r($id);
        print_r($_SESSION["carrito"][$id]);
        if (isset($_SESSION["carrito"][$id])) {
            if ($_SESSION["carrito"][$id]["cantidad"] > 1) {

                $_SESSION["carrito"][$id]["cantidad"]--;
            } elseif ($_SESSION["carrito"][$id]["cantidad"] = 1) {
                unset($_SESSION["carrito"][$id]);
                (new Alerta())->add_alerta("No tienes nada en tu carrito", "warning");
            }
        }
    }

    // Vaciar carrito total o de finalizar compra
    public function deleteCarrito()
    {
        $_SESSION["carrito"] = [];
    }
    public function insert(int $id_user, int $idLibro, int $quantity, float|int $price, $date,int  $order_number): void
    {
        
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO pivotxpurchasesxuser VALUES (NULL,:id_user,:quantity,:idLibro,:price,:date,:order_number);";
        
        $PDOStament = $conexion->prepare($query);
        $PDOStament->execute([
            'id_user' => htmlspecialchars($id_user),
            'idLibro' => htmlspecialchars($idLibro),
            'quantity' => htmlspecialchars($quantity),
            'price' => htmlspecialchars($price),
            'date' => htmlspecialchars($date),
            'order_number' => htmlspecialchars($order_number),
        ]);
    }
    
}