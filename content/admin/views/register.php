
<?= (new Alerta())->get_alertas() ?>
<div class="container form-autor row d-flex flex-column">
<h1 class="text-center mt-3 mb-5">Registro</h1>
    <form action="action/register_acc.php" method="POST" class="d-flex flex-column align-items-center">
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="nombre_completo" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" required>
          
        </div>
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
          
        </div>
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="pass" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <button type="submit" class="btn btn-primary col-12 col-lg-4 col-md-6 mb-3">Registrarme</button>
    </form>
</div>