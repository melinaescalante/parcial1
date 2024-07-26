<?php
$id = $_GET['id'];
$user = (new Usuario())->buscar_x_id($id);
?>
<h1 class="text-center mt-5">Editar usuario</h1>
<form action="action/edit_user_acc.php" method="POST"
    class="container form-autor row">
    <div class="d-flex align-items-center flex-column">

        <div class="form-group col-12 col-lg-4 col-md-6">
            <input type="hidden" name="id" value=<?= htmlspecialchars($user->getId()) ?>>
            <label class="form-label mb-3" for="nombre">Nombre del usuario</label>
            <input type="text" class="form-control mb-4" id="nombre" name="nombre"
                value="<?= htmlspecialchars($user->getNombreCompleto()) ?>">
            <label class="form-label mb-3" for="Email">Email</label>
            <input type="email" class="form-control mb-4" id="email" name="email"
                value="<?= htmlspecialchars($user->getEmail()) ?>">
            <label class="form-label mb-3" for="nombre">Rol</label>
            <select name="rol" id="rol" class="form-select mb-2">
                <option <?= $user->getRol() == "admin" ? "selected" : "" ?> value="admin">
                    Administrador
                </option>
                <option <?= $user->getRol() == "usuario" ? "selected" : "" ?> value="usuario">
                    Usuario
                </option>

            </select>

        </div>
        <div>

            <button type="submit" class="btn btn-primary mt-3 mb-3">Editar Usuario</button>
        </div>
    </div>


</form>