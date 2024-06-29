<?php

$id = $_GET["id"];
$editorials = (new Editorial())->all_editorials();
$autors = (new Autor())->all_autors();
$libro = (new Libro())->buscar_x_id($id);
$generos = (new Genero())->all_genres();



    ?>
<form action="action/edit_book_acc.php" method="POST" enctype="multipart/form-data"
    class="container form-autor row d-flex flex-column align-items-center">
    <h1 class="text-center m-4">Editá un libro</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
    <input type="hidden" name="id" value=<?=htmlspecialchars( $libro->getCode())  ?> >
        <label class="mb-2 mt-2" for="nombre">Nombre del Libro:</label>
        <input value="<?=htmlspecialchars( $libro->getNombre())  ?>" type="text" class="form-control" name="nombre" id="nombre"
            placeholder="Nombre">
        <label class="mb-2 mt-2" for="autor_id">Autor Id:</label>
        <select class="form-select" name="autor_id" id="autor_id">
            <option selected disabled>Elija su Autor</option>
            <?php
            foreach ($autors as $autor) { ?>
            
                <option <?= $autor->getId() == $libro->getAutorId() ? "selected" : "" ?> value="<?=htmlspecialchars( $autor->getId())  ?>">
                    <?=htmlspecialchars( $autor->getAutorNombre())  ?>
                </option>
                <?php
            }
            ?>
        </select>
        <label class="mb-2 mt-2" for="genero">
            Género/s:</label>
        <div class="d-flex flex-column">

            <?php foreach ($generos as $genero) { 
                $genreSelect=explode(",", $libro->getAllGenres());
                ?>
                <div>

                    <input type="checkbox" name="generos[]" id="<?= $genero->getId() ?>" value="<?= $genero->getId() ?>"<?=in_array($genero->getId(),$genreSelect)? "checked": ""?>>
                    <label for="<?= $genero->getId() ?>"><?= $genero->getGeneroTipo() ?></label>
                    </div>
                    <?php
            } ?>
        </div>
        <label class="mb-2 mt-2" for="sinopsis">Sinopsis:</label>
        <textarea class="form-control" name="sinopsis" id="sinopsis" placeholder="Sinopsis"
            rows="5"><?=htmlspecialchars( $libro->getSinopsis())  ?></textarea>
        <div class="d-flex flex-column">

            <label class="mb-2 mt-2" for="portada_actual">Portada Actual:</label>
            <img height="50%" width="50%" src="../../images/catalogo/<?=htmlspecialchars( $libro->getPortada())  ?>"
                alt="Imagen de portada del <?=htmlspecialchars( $libro->getNombre())  ?>">
            <input type="hidden" name="portada_original" value="<?=htmlspecialchars( $libro->getPortada())  ?>">
        </div>
        <label class="mb-2 mt-2" for="portada">Portada Libro:</label>
        <input type="file" class="form-control" name="portada" id="portada">
        <label class="mb-2 mt-2" for="pages">Páginas totales:</label>
        <input type="text" class="form-control" name="pages" id="pages" placeholder="Páginas"
            value="<?=htmlspecialchars( $libro->getPages())  ?>">
        <label class="mb-2 mt-2" for="price">Precio:</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Precio"
            value="<?=htmlspecialchars( $libro->getPrice())  ?>">
        <label class="mb-2 mt-2" for="editorial_id">Editorial Id:</label>
        <select class="form-select" name="editorial_id" id="editorial_id">
            <option selected disabled>Elija su editorial</option>
            <?php
            foreach ($editorials as $editorial) { ?>
                <option <?= $editorial->getId() == $libro->getEditorialId() ? "selected" : "" ?>
                    value="<?=htmlspecialchars( $editorial->getId())  ?>"> <?= htmlspecialchars($editorial->getEditorialNombre())  ?></option>

                <?php
            }
            ?>
        </select>

    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>