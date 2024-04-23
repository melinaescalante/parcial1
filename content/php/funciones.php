    
    <?php 
    $id= $_GET['code'];
    echo $id;
    $LibrosTotal= (new Libro())->catalago();
    // // $LibroEncontrado= (new Libro())->buscar_x_id($id);
    // echo $LibroEncontrado;
    function buscar_x_id($id){
        $LibrosTotal= (new Libro())->catalago();
        foreach ($LibrosTotal as $libro) {
            $idlibro=$libro->getCode();
            echo $idlibro;
            echo $LibrosTotal;
            // if ($libro->code==$id){
            // return $libro;  
            // }
        }
    }
    // buscar_x_id($id);

