<?php
require_once "../../functions/autoload.php";

try {
    (new Editorial())->update(
        $_POST["nombre"],  
        $_POST["id"]
    );
    header("Location: ../index.php?view=manage_editorials");
} catch (Exception $e) {
    echo $e->getMessage();
}