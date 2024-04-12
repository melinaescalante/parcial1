<?php 

require_once "content/php/libros.php";
require_once "content/html/header.php";
?>
<body>
<?php  
require_once "content/html/nav.php";
require_once "content/php/funciones.php";
$generoElegido = isset( $_GET["sec"] ) ? $_GET["sec"] : "";
$view=isset( $_GET["view"] ) ? $_GET["view"] : "";
?>
    <h1 class="m-4 p-4 text-center">Elegí tu libro</h1>
    <div class="filtros m-5">
        <a class="border-end text-center border-start p-2 " href="index.php?sec=romance&view=catalogo">Romance</a>
        <a class="border-end text-center p-2" href="index.php?sec=drama&view=catalogo
        ">Drama</a>
        <a class="border-end text-center p-2" href="index.php?sec=fantasia&view=catalogo">Fantasia</a>
    </div>
<div class="container-fluid container-xxl row row-gap-5 column-gap-5 m-auto  justify-content-center">
    <?php 
    require_once "content/php/views/$view.php";
   
    ?>
</div>
<?php require_once "content/html/footer.php"?>
</body>
</html>