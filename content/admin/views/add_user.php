
<form action="action/add_user_acc.php" method="POST"
    class="container form-autor row d-flex flex-column align-items-md-center">
    <h1 class="text-center mt-4 mb-4">Agregá un usuario</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
        <label class="mb-2" for="nombre_completo">Nombre Completo:</label>
        <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" placeholder="Nombre" required>
        <label class="mb-2 mt-2" for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        <label class="mb-2 mt-2" for="rol">Rol:</label>
        <select class="form-select" name="rol" id="rol">
            <option disabled selected>Elegir rol</option>
            <option value="admin">Administrador</option>
            <option value="usuario">Usuario</option>
        </select>

        <label class="mb-2 mt-2" for="password">Contraseña:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Crear Usuario</button>
</form>