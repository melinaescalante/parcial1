<?php
require_once 'html/header.php';

?>
<body>
<?php  
require_once 'html/nav.php';
require_once '../functions/autoload.php';
$view= isset( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="dashboard";


?>
<main class="row">
    <?php 

    require_once "views/$view.php";
    ?>
</main>
<?php require_once "html/footer.php"?>
</body>
</html>