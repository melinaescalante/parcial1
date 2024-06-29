<?php

$id = $_GET['id'];
$genero = (new Genero())->buscar_x_id($id);
?>
<form action="action/edit_genre_acc.php" method="POST"
    class="container form-autor row d-flex flex-column align-items-center">
    <h1 class="text-center m-4">Editar Genero</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
    <input type="hidden" name="id" value=<?=htmlspecialchars( $genero->getId())  ?> >
        <label class="form-label mt-3 mb-3" for="nombre">Nombre del género</label>
        <input type="text" class="form-control mb-4" id="nombre" name="nombre" value="<?= htmlspecialchars($genero->getGeneroTipo())  ?>">

        <button type="submit" class="btn btn-primary">Editar Género</button>
    </div>

    
</form>


</div>