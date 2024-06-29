<?php

$autores= (new Autor())->all_autors();
?>
<?=(new Alerta())->get_alertas();?>
<div class="container-fluid container-xxl mx-auto row my-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Administracion de autores</h1>
        <div class="row mb-5 d-flex align-items-center justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Biografía</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autores as $autor) { ?>
                        <tr>
                            <td class="col-lg-2 col-md-2 col-sm-1"> <?=htmlspecialchars($autor->getId())  ?>  </td>
                            <td class="col-lg-5 col-md-4 col-sm-2"><?=htmlspecialchars($autor->getAutorNombre())  ?> </td>
                            <td class="col-lg-5 col-md-4 col-sm-2"><?=htmlspecialchars($autor->getAutorBiografia())  ?></td>
                            <td class="col-lg-2 col-md-2 col-1">
                                <a href="index.php?view=edit_autor&id=<?= htmlspecialchars($autor->getId()) ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?view=delete_autor&id=<?=htmlspecialchars($autor->getId())  ?>"
                                    class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a style="max-width:50%!important;" href="index.php?view=add_autor" class="btn btn-primary mt-5">Agregar Autor</a>
        </div>
    </div>
</div>