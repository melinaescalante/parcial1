<?php
$editorials = (new Editorial())->all_editorials();
$autors = (new Autor())->all_autors();
$generos = (new Genero())->all_genres();

?>
<h1 class="text-center mb-3 mt-5">Agregá un libro</h1>
<form action="action/add_book_acc.php" method="POST" enctype="multipart/form-data"
    class="container form-autor row d-flex flex-column justify-content-center align-items-center">
    <div class=" d-flex flex-column form-group col-11 col-lg-4 col-md-6">
        <label class="mb-2 mt-2" for="nombre">Nombre del Libro:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
        <label class="mb-2 mt-2" for="autor_id">Autor Id:</label>
        <select class="form-select" name="autor_id" id="autor_id">
            <option selected disabled>Elija su Autor</option>
            <?php
            foreach ($autors as $autor) { ?>

                <option value="<?= $autor->getId() ?>"><?= $autor->getAutorNombre() ?></option>
                <?php
            }
            ?>
        </select required>
        <label class="mb-2 mt-2" for="genero">
            Género/s:</label>
        <div class="d-flex flex-column">

            <?php foreach ($generos as $genero) { ?>
                <div>

                    <input type="checkbox" name="generos[]" id="<?= $genero->getId() ?>" value="<?= $genero->getId() ?>" >
                    <label for="<?= $genero->getId() ?>"><?= $genero->getGeneroTipo() ?></label>
                    </div>
                    <?php
            } ?>
        </div>
        <label class="mb-2 mt-2" for="sinopsis">Sinopsis:</label>
        <input type="text" class="form-control" name="sinopsis" id="sinopsis" placeholder="Sinopsis">
        <label class="mb-2 mt-2" for="portada">Portada Libro:</label>
        <input type="file" class="form-control" name="portada" id="portada" required>
        <label class="mb-2 mt-2" for="pages">Páginas totales:</label>
        <input type="text" class="form-control" name="pages" id="pages" placeholder="Páginas" required>
        <label class="mb-2 mt-2" for="price">Precio:</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Precio" required>
        <label class="mb-2 mt-2" for="editorial_id">Editorial Id:</label>
        <select class="form-select" name="editorial_id" id="editorial_id">
            <option selected disabled>Elija su editorial</option>
            <?php
            foreach ($editorials as $editorial) { ?>

                <option value="<?= $editorial->getId() ?>"><?= $editorial->getEditorialNombre() ?></option>
                <?php
            }
            ?>
        </select>

    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>