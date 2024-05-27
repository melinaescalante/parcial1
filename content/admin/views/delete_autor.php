<?php
    $id = $_GET["id"] ?? FALSE;
    $autor = (new Autor())->buscar_x_id($id);
?>
<div class="d-flex flex-column p-5">
    <h1>Esta a punto de eliminar al autor: "<?=$autor->getAutorNombre()?>" está seguro?</h1>
    <a href="action/delete_autor_acc.php?id=<?= $autor->getId() ?>" class="mt-4 btn btn-escalante-edit">Eliminar</a>
    <a class="mt-4 btn btn-outline-primary" href="index.php?view=manage_autors">Cancelar</a>
</div>