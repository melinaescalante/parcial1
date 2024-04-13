<?php 
require_once "content/php/libros.php";
require_once "content/html/header.php";
?>
<body>
<?php  
require_once "content/html/nav.php";
require_once "content/php/funciones.php";
$generoElegido = isset( $_GET["sec"] ) ? $_GET["sec"] : "";
$view=( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="quienesSomos";
?>
<main>
    <?php 
    require_once "content/php/views/$view.php";
    ?>


</main>
<?php require_once "content/html/footer.php"?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>