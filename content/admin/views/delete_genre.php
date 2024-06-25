<?php

    $id = $_GET["id"] ?? FALSE;
    $genre = (new Genero())->buscar_x_id($id);
?>
<div class="d-flex flex-column p-5">
    <h1>Esta a punto de eliminar al género: "<?=htmlspecialchars($genre->getGeneroTipo()) ?>" está seguro?</h1>
    <a href="action/delete_genre_acc.php?id=<?=htmlspecialchars( $genre->getId())  ?>" class="mt-4 btn btn-escalante-edit">Eliminar</a>
    <a class="mt-4 btn btn-outline-primary" href="index.php?view=manage_genres">Cancelar</a>
</div>