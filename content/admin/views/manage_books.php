<?php
$books= (new Libro())->catalago();
?><div class="container-xxl mx-auto row my-5 container-fluid">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de libros</h1>
        <div class="row mb-5 d-flex align-items-center">
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
                            <td> <?= $book->getCode() ?>  </td>
                            <td><img height="100px" width="70px" src="../../images/catalogo/<?=$book->getPortada()?>" alt="Imagen de portada de:<?= $book->getNombre() ?> "> </td>
                            <td><?= $book->getAutor() ?> </td>
                            <td><?= $book->getNombre() ?> </td>
                            <td></*?= $book->getGenero() ?*/> </td>
                            <td><?= $book->getSinopsis() ?> </td>
                            <td><?= $book->getPages() ?> </td>
                            <td><?= $book->getPrice() ?> </td>
                            <td><?= $book->getEditorial() ?> </td>
                            
                            <td>
                                <a href="index.php?view=edit_book&id=<?= $book->getCode() ?>" class="d-block btn btn-sm btn-warning .btn-escalante-edit mb-1">Editar</a>
                                <a href="index.php?view=delete_book&id=<?= $book->getCode() ?>"
                                    class="d-block btn btn-sm btn-danger btn-escalante-delete">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?view=add_book" class="btn btn-primary mt-5">Agregar Libro</a>
        </div>
    </div>
</div>