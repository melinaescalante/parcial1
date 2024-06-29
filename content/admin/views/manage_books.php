<?php

$books = (new Libro())->catalago();

?>
<?= (new Alerta())->get_alertas(); ?>
<div class="container-xxl mx-auto row my-5 container-fluid">

    <h1 class="text-center mb-5 fw-bold">Administracion de libros</h1>
    <div class="row mb-5 d-flex align-items-center justify-content-center">
        <div style="max-width: 90vw;" class="border rounded-5">


            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Portada</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Género</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Páginas</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Editorial</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book) { ?>
                            <tr>
                                <td><?= htmlspecialchars($book->getCode()) ?></td>
                                <td>
                                    <img height="100px" width="70px"
                                    src="../../images/catalogo/<?= htmlspecialchars($book->getPortada()) ?>"
                                    alt="Imagen de portada de: <?= htmlspecialchars($book->getNombre()) ?>">
                                </td>
                                <td><?= htmlspecialchars($book->getNombre()) ?></td>
                                <td><?= htmlspecialchars($book->getAutor()) ?></td>
                                <td><?= htmlspecialchars($book->getAllGenres()) ?></td>
                                <td><?= htmlspecialchars($book->getSinopsis()) ?></td>
                                <td><?= htmlspecialchars($book->getPages()) ?></td>
        
                                <td><?= htmlspecialchars($book->getPrice()) ?></td>
                                <td><?= htmlspecialchars($book->getEditorial()) ?></td>
                                <td>
                                    <a href="index.php?view=edit_book&id=<?= htmlspecialchars($book->getCode()) ?>"
                                        class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                    <a href="index.php?view=delete_book&id=<?= htmlspecialchars($book->getCode()) ?>"
                                        class="d-block btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="index.php?view=add_book" class="btn btn-primary mt-5">Agregar Libro</a>
    </div>

</div>