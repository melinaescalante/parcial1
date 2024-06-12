<?php
?>
<div class="container form-autor row d-flex flex-column">
<h1 class="text-center mt-3 mb-5">Login</h1>
    <form action="action/login_acc.php" method="POST" class="d-flex flex-column align-items-center">
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="nombre_completo" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre_completo" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="col-12 col-lg-4 col-md-6 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary col-12 col-lg-4 col-md-6 mb-3">Ingresar</button>
    </form>
</div>