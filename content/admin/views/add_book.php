<form action="action/add_book_acc.php" method="POST" enctype="multipart/form-data"
    class="container form-autor row d-flex flex-column align-items-center">
    <h1 class="text-center m-4">Agregá un libro</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
        <label class="mb-2 mt-2" for="nombre">Nombre del Libro:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
        <label class="mb-2 mt-2" for="autor_id">Autor Id:</label>
        <input type="text" class="form-control" name="autor_id" id="autor_id" placeholder="Autor ID">
        <!-- <label class="mb-2 mt-2" for="genero_id">
            Género:</label>
        <input type="text" class="form-control" name="genero_id" id="genero_id" placeholder="Género"> -->
        <label class="mb-2 mt-2" for="sinopsis">Sinopsis:</label>
        <input type="text" class="form-control" name="sinopsis" id="sinopsis" placeholder="Sinopsis">
        <label class="mb-2 mt-2" for="portada">Portada Libro:</label>
        <input type="file" class="form-control" name="portada" id="portada">
        <label class="mb-2 mt-2" for="pages">Páginas totales:</label>
        <input type="text" class="form-control" name="pages" id="pages" placeholder="Páginas">
        <label class="mb-2 mt-2" for="price">Precio:</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Precio">
        <label class="mb-2 mt-2" for="price">Editorial Id:</label>
        <input type="text" class="form-control" name="editorial_id" id="editorial_id" placeholder="Editorial ID">
    </div>

    <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>