<form action="action/add_editorial_acc.php" method="POST"
    class="container form-autor row d-flex flex-column align-items-md-center">
    <h1 class="text-center mt-4 mb-4">Agregá una editorial</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
        <label class="mb-2" for="editorial_nombre">Nombre Editorial:</label>
        <input type="text" class="form-control" name="editorial_nombre" id="editorial_nombre" placeholder="Nombre" required>
    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>