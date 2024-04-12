<?php 
function catalago_x_personajes($libros,$genero){
    $librosArray=[];
    foreach ($libros as $libro) {
        if ($libro["genero"]==$genero){
            array_push($librosArray,$genero);
        }
    }
    print_r($librosArray);
    return $librosArray;
}