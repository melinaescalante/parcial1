<?php

    $id = $_GET["id"] ?? FALSE;
    $Libro = (new Libro())->buscar_x_id($id);
?>
<div class="d-flex flex-column p-5 align-items-center">
    <h1>Esta a punto de eliminar el libro: "<?=htmlspecialchars($Libro->getNombre()) ;?>" está seguro?</h1>
    <img height="30%" width="30%" src="../../images/catalogo/<?=htmlspecialchars($Libro->getPortada()) ;?>" alt="">
    <a style="width:50%;" href="action/delete_book_acc.php?id=<?=htmlspecialchars( $Libro->getCode()) ;?>" class="mt-4 btn btn-escalante-edit">Eliminar</a>
    <a style="max-width:50%!important;" class="mt-4 btn btn-outline-primary" href="index.php?view=manage_books">Cancelar</a>
</div>