<form action="action/add_autor.php" method="POST" class="container form-autor row d-flex flex-column align-items-center">
    <h1 class="text-center m-4">Agregá un autor</h1>
    <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
    <label class="mb-2" for="autor_nopmbre">Autor Nombre:</label>
    <input type="text" class="form-control" name="autor_nombre" id="autor_nombre" placeholder="Nombre">

  </div>
  <div class="form-group col-12 col-lg-4 col-md-6 mt-4">
    <label class="mb-2" for="autor_biografía">Autor Biografía:</label>
    <input type="text" class="form-control" name="autor_biografia" id="autor_biografia" placeholder="Biografía">
  </div>

  <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
</form>
