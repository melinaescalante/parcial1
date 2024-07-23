<div class="container">

    <div class="container mx-auto row my-5">
        <div class="col">
            <h1 class="text-center mb-5 fw-bold">Mis compras</h1>
            <?php
            echo "<pre>";
            print_r((new Purchases())->compras_x_usuario($_SESSION["login"]["id"]));
            echo "</pre>";

            ?>
        </div>
    </div>
</div>