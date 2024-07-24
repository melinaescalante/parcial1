<?php
$user = (new Usuario())->buscar_x_id($_SESSION['login']['id']);
?>
<div class="container">
    <div class="container mx-auto row my-5">
        <div class="col d-flex align-items-center flex-column">
            <h1 class="text-center mb-5 fw-bold">Mi Perfil</h1>
            <p>Informacion Personal</p>
            <ul class="list-group">
                <li class="list-group-item"><?=ucwords($user->getNombreCompleto())?></li>
                <li class="list-group-item"><?=$user->getEmail()?></li>
                <li class="list-group-item">Ordenes Activas:<?php 
                $purchases= (new Purchases())->compras_x_usuario($_SESSION['login']['id']);
                if ($purchases) {
                    for ($i=0; $i < count($purchases); $i++) { 
                        
                        // $librosComprados = $purchases[$i]->getLibrosComprados();
                        // print_r($librosComprados);
                        // foreach ($librosComprados as $librosComprado) {

                            // $libro = $librosComprado['libro'];
                            echo "<span style='display:block'>#". $purchases[$i]->getOrderNumber()."</span>";
                        // }
                    }
                }
                ?></li>
                
            </ul>
        </div>
    </div>
</div>