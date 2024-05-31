<?php
$id = $_GET["id"];
$editorials = (new Editorial())->all_editorials();
$autors = (new Autor())->all_autors();
$libro = (new Libro())->buscar_x_id($id)


    ?>
<form action="action/edit_book_acc.php" method="POST" enctype="multipart/form-data"
    class="container form-autor row d-flex flex-column align-items-center">
    <h1 class="text-center m-4">Editá un libro</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
    <input type="hidden" name="id" value=<?= $libro->getCode() ?> >
        <label class="mb-2 mt-2" for="nombre">Nombre del Libro:</label>
        <input value="<?= $libro->getNombre() ?>" type="text" class="form-control" name="nombre" id="nombre"
            placeholder="Nombre">
        <label class="mb-2 mt-2" for="autor_id">Autor Id:</label>
        <select class="form-select" name="autor_id" id="autor_id">
            <option selected disabled>Elija su Autor</option>
            <?php
            foreach ($autors as $autor) { ?>
                <option <?= $autor->getId() == $libro->getAutorId() ? "selected" : "" ?> value="<?= $autor->getId() ?>">
                    <?= $autor->getAutorNombre() ?>
                </option>
                <?php
            }
            ?>
        </select>
        <!-- <label class="mb-2 mt-2" for="genero_id">
            Género:</label>
        <input type="text" class="form-control" name="genero_id" id="genero_id" placeholder="Género"> -->
        <label class="mb-2 mt-2" for="sinopsis">Sinopsis:</label>
        <textarea class="form-control" name="sinopsis" id="sinopsis" placeholder="Sinopsis"
            rows="5"><?= $libro->getSinopsis() ?></textarea>
        <div class="d-flex flex-column">

            <label class="mb-2 mt-2" for="portada_actual">Portada Actual:</label>
            <img height="50%" width="50%" src="../../images/catalogo/<?= $libro->getPortada() ?>"
                alt="Imagen de portada del <?= $libro->getNombre() ?>">
            <input type="hidden" name="portada_original" value="<?= $libro->getPortada() ?>">
        </div>
        <label class="mb-2 mt-2" for="portada">Portada Libro:</label>
        <input type="file" class="form-control" name="portada" id="portada">
        <label class="mb-2 mt-2" for="pages">Páginas totales:</label>
        <input type="text" class="form-control" name="pages" id="pages" placeholder="Páginas"
            value="<?= $libro->getPages() ?>">
        <label class="mb-2 mt-2" for="price">Precio:</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Precio"
            value="<?= $libro->getPrice() ?>">
        <label class="mb-2 mt-2" for="editorial_id">Editorial Id:</label>
        <select class="form-select" name="editorial_id" id="editorial_id">
            <option selected disabled>Elija su editorial</option>
            <?php
            foreach ($editorials as $editorial) { ?>
                <option <?= $editorial->getId() == $libro->getEditorialId() ? "selected" : "" ?>
                    value="<?= $editorial->getId() ?>"> <?= $editorial->getEditorialNombre() ?></option>

                <?php
            }
            ?>
        </select>

    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>