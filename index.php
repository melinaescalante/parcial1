<?php 
require_once "content/php/libros.php";
require_once "content/html/header.php";
require_once "content/php/views/busqueda.php";

require_once "content/class/libro.php";


// $miArchivoJson = file_get_contents("content/php/libros.php");
// $MyArray=json_encode($miArchivoJson);
// print_r($MyArray)

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
    if (isset( $_GET["code"] )){
        $bookFound = (new Libro())->buscar_x_id( $_GET["code"]);
        
    }
    require_once "content/php/views/$view.php";
    ?>
</main>
<?php require_once "content/html/footer.php"?>
</body>
</html>