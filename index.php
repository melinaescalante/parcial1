<?php 

require_once "content/php/libros.php";
require_once "content/html/header.php";
?>
<body>
<?php  
require_once "content/html/nav.php";
require_once "content/php/funciones.php";
$generoElegido = isset( $_GET["sec"] ) ? $_GET["sec"] : "";

?>
    <h1 class="m-4 p-4 text-center">Elegí tu libro</h1>
    <div class="filtros m-5">
        <a class="border-end text-center border-start p-2 " href="sec=romance" onclick="catalago_x_personajes($Libros,$generoElegido)">Romance</a>
        <a class="border-end text-center p-2" href="sec=drama
        " onclick="catalago_x_personajes($Libros,$generoElegido)">Drama</a>
        <a class="border-end text-center p-2" href="sec=fantasia" onclick="catalago_x_personajes($Libros,$generoElegido)">Fantasia</a>
    </div>
<div class="container-fluid container-xxl row row-gap-5 column-gap-5 m-auto  justify-content-center">
    <?php 
    require_once "content/php/cardMultiplico.php";
   
    ?>
</div>
<?php require_once "content/html/footer.php"?>
</body>
</html>