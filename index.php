<?php 
require_once "content/php/libros.php";
require_once "content/html/header.php";
require_once "content/php/views/busqueda.php";
require_once "content/class/libro.php";

?>
<body>
<?php  
require_once "content/html/nav.php";
$bookFound=0;
$generoElegido = isset( $_GET["sec"] ) ? $_GET["sec"] : "";
$view= isset( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="quienesSomos";


?>
<main>
    <?php 
    if (isset( $_GET["title"] )){
        $bookFound = (new Libro())->buscar_x_id( $_GET["title"]);
        
    }
    require_once "content/php/views/$view.php";
    ?>
</main>
<?php require_once "content/html/footer.php"?>
</body>
</html>