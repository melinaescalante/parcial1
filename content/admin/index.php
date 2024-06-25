<?php
require_once 'html/header.php';

?>
<body>
<?php  

require_once '../functions/autoload.php';

$view= isset( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="dashboard";
require_once 'html/nav.php';


?>
<main>
    <?php 
if ($view!=='login' && $view!=='register') {
    (new Usuario())->check_role($_SESSION['login']);

}
    require_once "views/$view.php";
    ?>
</main>
<?php require_once "html/footer.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>