<?php
$user = (new Usuario())->buscar_x_id($_SESSION['login']['id']);
if ($_SESSION["login"]) {

?>
<div class="container">
    <div class="container mx-auto row my-5">
        <div class="col d-flex align-items-center flex-column">
            <h1 class="text-center mb-4 fw-bold">Mi Perfil</h1>
            <p>Informacion Personal</p>
            <ul class="list-group">
                <li class="list-group-item"><i style="color:rgb(89 170 157)" class="fa-solid fa-user me-2"></i><?=ucwords($user->getNombreCompleto())?></li>
                <li class="list-group-item"><i style="color:rgb(89 170 157)" class="fa-solid fa-envelope me-2"></i><?=$user->getEmail()?></li>
                <?php
                ?>
                <?php 
                $purchases= (new Purchases())->compras_x_usuario($_SESSION['login']['id']);
                if ($purchases) {
                    ?><li class="list-group-item"><i  style="color:rgb(89 170 157)" class="fa-solid fa-cart-shopping me-2"></i>Ordenes Activas:<?php 
                    for ($i=0; $i < count($purchases); $i++) { 

                        echo "<span class='ms-4' style='display:block'>#". $purchases[$i]->getOrderNumber()."</span>";
                        
                    }
                        ?></li><?php
                }?>
                
            </ul>
        </div>
    </div>
</div>
<?php
}else {
    header("Location:index.php");
}