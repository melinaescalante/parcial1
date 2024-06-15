<?php 
require_once "content/html/header.php";
require_once "content/functions/autoload.php";

?>
<body>
<?php  
require_once "content/html/nav.php";
$bookFound=0;
$generoElegido = isset( $_GET["sec"] ) ? $_GET["sec"] : "";
$view= isset( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="quienesSomos";
// Procesa informacion del form de consultas y devuelve el mail en este caso.
// if(isset($_POST["email"]) ){

//     echo "gracias x tu mensaje". ($_POST["email"]);
    
// }

?>
<main class="row">
    <?php 
    if (isset( $_GET["title"] )){
        $bookFound = (new Libro())->buscar_x_coincidencia( $_GET["title"]);
        
    }
    require_once "content/php/views/$view.php";
    ?>
</main>
<?php require_once "content/html/footer.php"?>
</body>
</html>