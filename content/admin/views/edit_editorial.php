<?php

$id = $_GET['id'];
$editorial = (new Editorial())->buscar_x_id($id);
?>
<h1 class="text-center mt-5">Editar Editorial</h1>
<form action="action/edit_editorial_acc.php" method="POST"
    class="container form-autor row d-flex flex-column align-items-center">
    <div class="form-group col-12 col-lg-4 col-md-6">
    <input type="hidden" name="id" value=<?=htmlspecialchars( $editorial->getId())  ?> >
        <label class="form-label mb-3" for="nombre">Nombre de la Editorial</label>
        <input type="text" class="form-control mb-4" id="nombre" name="nombre" value="<?= htmlspecialchars($editorial->getEditorialNombre())  ?>">

        <button type="submit" class="btn btn-primary">Editar Editorial</button>
    </div>

    
</form>


</div>