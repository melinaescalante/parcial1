<?php 
require_once "content/php/libros.php";
require_once "content/html/header.php";
require_once "content/class/libro.php";
require_once "content/php/funciones.php";
// $MyArray=json_encode($Libros);
// echo $MyArray;

?>
<body>
<?php  
require_once "content/html/nav.php";

$generoElegido = isset( $_GET["sec"] ) ? $_GET["sec"] : "";
$view= isset( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="quienesSomos";
if (isset( $_GET["code"] )){
    $bookFound = (new Libro())->buscar_x_id( $_GET["code"]);
}

?>
<main>
    <?php 
    require_once "content/php/views/$view.php";
    ?>
</main>
<?php require_once "content/html/footer.php"?>
<script src="content/js/main.js" defer ></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>