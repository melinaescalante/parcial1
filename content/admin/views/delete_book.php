<?php
    $id = $_GET["id"] ?? FALSE;
    $Libro = (new Libro())->buscar_x_id($id);
?>
<div class="d-flex flex-column p-5 align-items-center">
    <h1>Esta a punto de eliminar el libro: "<?=$Libro->getNombre();?>" está seguro?</h1>
    <img height="50%" width="50%" src="../../images/catalogo/<?=$Libro->getPortada();?>" alt="">
    <a style="width:inherit;" href="action/delete_book_acc.php?id=<?= $Libro->getCode();?>" class="mt-4 btn btn-escalante-edit">Eliminar</a>
    <a class="mt-4 btn btn-outline-primary" href="index.php?view=manage_books">Cancelar</a>
</div>