<?= (new Alerta())->get_alertas(); ?>
<?php
$users = (new Usuario())->all_users();
?>
<div class="container-xxl mx-auto container-fluid row my-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Administracion de usuarios</h1>
        <div class="row mb-5 d-flex align-items-center justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-lg-5 col-md-4 col-8">ID</th>
                        <th class="col-lg-5 col-md-4 col-8">Nombre</th>
                        <th class="col-lg-5 col-md-4 col-8">Mail</th>
                        <th class="col-lg-5 col-md-4 col-8">Compras Realizadas</th>
                        <th class="col-lg-5 col-md-4 col-8"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {
                        ?>
                        <tr>
                            <td class="col-lg-5 col-md-4 col-8"> <?= htmlspecialchars($user->getId()) ?> </td>
                            <td class="col-lg-5 col-md-4 col-8"><?= htmlspecialchars($user->getNombreCompleto()) ?> </td>
                            <td class="col-lg-5 col-md-4 col-8"><?= htmlspecialchars($user->getEmail()) ?> </td>
                           
                            <td class="col-lg-5 col-md-4 col-8"><?php
                            if ($purchases = (new Purchases())->compras_x_usuario($user->getId())) {
                                for ($i=0; $i < count($purchases); $i++) { 
                                    
                                    $librosComprados = $purchases[$i]->getLibrosComprados();
                                    // print_r($librosComprados);
                                    foreach ($librosComprados as $librosComprado) {
    
                                        $libro = $librosComprado['libro'];
                                        echo "<p>" .$libro->getNombre(). "Orden #".$purchases[$i]->getOrderNumber()."</p>";
                                    }
                                }
                            }
                            ?>

                            </td>
                          

                            <td class="col-lg-2 col-md-2 col-2">
                                <a href="index.php?view=edit_user&id=<?= htmlspecialchars($user->getId()) ?>"
                                    class="d-block btn btn-sm btn-warning .btn-escalante-edit mb-1">Editar</a>
                                <a href="index.php?view=delete_user&id=<?= htmlspecialchars($user->getId()) ?>"
                                    class="d-block btn btn-sm btn-danger btn-escalante-delete">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a style="max-width:50%!important;" href="index.php?view=add_user" class="btn btn-primary mt-5">Agregar
                usuario</a>
        </div>
    </div>
</div>