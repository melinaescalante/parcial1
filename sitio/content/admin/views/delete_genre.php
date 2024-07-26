<?php

    $id = $_GET["id"] ?? FALSE;
    $genre = (new Genero())->buscar_x_id($id);
?>
<div class="d-flex flex-column align-items-center p-5">
    <h1>Esta a punto de eliminar al género: "<?=htmlspecialchars($genre->getGeneroTipo()) ?>" está seguro?</h1>
    <a style="width:50%;" href="action/delete_genre_acc.php?id=<?=htmlspecialchars( $genre->getId())  ?>" class="mt-4 btn btn-escalante-edit">Eliminar</a>
<a style="max-width:50%!important;" class="mt-4 btn btn-outline-primary" href="index.php?view=manage_genres">Cancelar</a>
</div>