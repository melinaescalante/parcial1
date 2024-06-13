<?php

require_once "../../functions/autoload.php";

(new Autentificacion())->log_out();

header("Location: ../index.php?view=login");