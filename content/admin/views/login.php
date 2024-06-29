<?= (new Alerta())->get_alertas() ?>


<div class="container form-autor row d-flex flex-column">
<h1 class="text-center mt-3 mb-5">Login</h1>
    <form action="action/login_acc.php" method="POST" class="d-flex flex-column align-items-center">
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
       
        </div>
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <button type="submit" class="btn btn-primary col-12 col-lg-4 col-md-6 mb-3">Ingresar</button>
    </form>
</div>