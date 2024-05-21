<?php
$books= (new Libro())->catalago();
?><div class="row my-5">
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
                            <td><img height="100px" width="70px" src="../../<?=$book->getPortada()?>" alt="Imagen de portada de:<?= $book->getNombre() ?> "> </td>
                            <td><?= $book->getAutor() ?> </td>
                            <td><?= $book->getNombre() ?> </td>
                            <td><?= $book->getGenero() ?> </td>
                            <td><?= $book->getSinopsis() ?> </td>
                            <td><?= $book->getPages() ?> </td>
                            <td><?= $book->getPrice() ?> </td>
                            <td><?= $book->getEditorialId() ?> </td>
                            
                            <td>
                                <a href="" class="d-block btn btn-sm btn-warning .btn-escalante-edit mb-1">Editar</a>
                                <a href="actions/delete_books.php?id=<?= $book->getCode() ?>"
                                    class="d-block btn btn-sm btn-danger btn-escalante-delete">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?view=" class="btn btn-primary mt-5">Agregar Autor</a>
        </div>
    </div>
</div>