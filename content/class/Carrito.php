<?php
// Deberia pushear datosa db al finalizar compra
class Carrito
{
    // Agregar item
    public function addItem(int $productoId, int $cantidad)
    {
        $libro = (new Libro())->buscar_x_id($productoId);
        if(isset($_SESSION["carrito"][$productoId])){
            $_SESSION["carrito"][$productoId]["cantidad"] += $cantidad;
        }else{

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
    // Eliminar item
    // Devolver todo el carrito
    public function getCarrito()
    {
        if (isset($_SESSION["carrito"])) {
            return ($_SESSION["carrito"]);
        } else {
            return [];
        }
    }
    // Eliminar un item
    public function deleteItem($id)
    {
        print_r(($id));
        print_r(($_SESSION["carrito"][$id]));
        if (isset($_SESSION["carrito"][$id])) {
            if ($_SESSION["carrito"][$id]["cantidad"] > 1) {

                $_SESSION["carrito"][$id]["cantidad"]--;
            } elseif($_SESSION["carrito"][$id]["cantidad"]= 1){
                unset($_SESSION["carrito"][$id]);
                (new Alerta())->add_alerta("No tienes nada en tu carrito", "warning");
            }
        }
    }

    // Vaciar carrito total
    public function deleteCarrito()
    {
        $_SESSION["carrito"] = [];
    }

}