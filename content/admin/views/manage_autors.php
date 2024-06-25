<?php

$autores= (new Autor())->all_autors();
?>
<?=(new Alerta())->get_alertas();?>
<div class="container-fluid container-xxl mx-auto row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de autores</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Biografía</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autores as $autor) { ?>
                        <tr>
                            <td> <?=htmlspecialchars($autor->getId())  ?>  </td>
                            <td><?=htmlspecialchars($autor->getAutorNombre())  ?> </td>
                            <td><?=htmlspecialchars($autor->getAutorBiografia())  ?></td>
                            <td>
                                <a href="index.php?view=edit_autor&id=<?= htmlspecialchars($autor->getId()) ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <a href="index.php?view=delete_autor&id=<?=htmlspecialchars($autor->getId())  ?>"
                                    class="d-block btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?view=add_autor" class="btn btn-primary mt-5">Agregar Autor</a>
        </div>
    </div>
</div>