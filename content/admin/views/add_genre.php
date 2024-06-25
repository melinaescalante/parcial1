
<form action="action/add_genre_acc.php" method="POST"
    class="container form-autor row d-flex flex-column align-items-md-center">
    <h1 class="text-center mt-4 mb-4">Agregá un género</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
        <label class="mb-2" for="genero_nombre">Tipo de Género:</label>
        <input type="text" class="form-control" name="genero_nombre" id="genero_nombre" placeholder="Género">
    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>