
<?=(new Alerta())->get_alertas();?>
<?php
$genres= (new Genero())->all_genres();
?>
<div class=" container-xxl mx-auto container-fluid row my-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Administracion de géneros</h1>
        <div class="row mb-5 d-flex align-items-center justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-lg-5 col-md-4 col-8">ID</th>
                        <th class="col-lg-5 col-md-4 col-8">Nombre Género</th>                        

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($genres as $genre) { ?>
                        <tr>
                            <td class="col-lg-5 col-md-4 col-8"> <?=htmlspecialchars($genre->getId())  ?>  </td>
                            <td class="col-lg-5 col-md-4 col-8"><?= htmlspecialchars($genre->getGeneroTipo()) ?> </td>
                            
                            <td class="col-lg-2 col-md-2 col-2">
                                <a href="index.php?view=edit_genre&id=<?= htmlspecialchars($genre->getId()) ?>" class="d-block btn btn-sm btn-warning .btn-escalante-edit mb-1">Editar</a>
                                <a href="index.php?view=delete_genre&id=<?=htmlspecialchars($genre->getId())  ?>"
                                    class="d-block btn btn-sm btn-danger btn-escalante-delete">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a style="max-width:50%!important;" href="index.php?view=add_genre" class="btn btn-primary mt-5">Agregar género</a>
        </div>
    </div>
</div>