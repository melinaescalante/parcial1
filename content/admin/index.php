<?php
require_once 'html/header.php';

?>
<body>
<?php  

require_once '../functions/autoload.php';
// require_once 'action/login_acc.php';
$view= isset( $_GET["view"] ) ? $_GET["view"] :$_GET["view"]="dashboard";
require_once 'html/nav.php';


?>
<main>
    <?php 
    require_once "views/$view.php";
    ?>
</main>
<?php require_once "html/footer.php"?>
</body>
</html>