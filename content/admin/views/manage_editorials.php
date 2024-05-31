<?php
$editorials= (new Editorial())->all_editorials();
?><div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de editoriales</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Editorial</th>                        

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($editorials as $editorial) { ?>
                        <tr>
                            <td> <?= $editorial->getId() ?>  </td>
                            <td><?= $editorial->getEditorialNombre() ?> </td>
                            
                            <td>
                                <a href="index.php?view=edit_editorial&id=<?= $editorial->getId() ?>" class="d-block btn btn-sm btn-warning .btn-escalante-edit mb-1">Editar</a>
                                <a href="index.php?view=delete_editorial&id=<?= $editorial->getId() ?>"
                                    class="d-block btn btn-sm btn-danger btn-escalante-delete">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?view=add_editorial" class="btn btn-primary mt-5">Agregar Ediorial</a>
        </div>
    </div>
</div>