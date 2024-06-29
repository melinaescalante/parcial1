<?php

$id = $_GET['id'];
$autor = (new Autor())->buscar_x_id($id);
?>
<h1 class="text-center mt-5">Editar autor</h1>
<form action="action/edit_autor_acc.php" method="POST"
    class="container form-autor row d-flex flex-column align-items-center">
    <div class="form-group col-12 col-lg-4 col-md-6">
    <input type="hidden" name="id" value=<?= htmlspecialchars($autor->getId())  ?> >
        <label class="form-label mb-3" for="nombre">Nombre del Autor</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?=htmlspecialchars( $autor->getAutorNombre())  ?>">


        <label class="form-label mt-3 mb-3" for="biografia">Biografía del Autor</label>
        <textarea class="form-control mb-4" id="biografia" name="biografia"
            rows="10"><?=htmlspecialchars( $autor->getAutorBiografia())  ?></textarea>


        <button type="submit" class="btn btn-primary">Editar Autor</button>
    </div>

    
</form>




</div>