<?php

require_once "../../functions/autoload.php";

(new Autentificacion())->log_out();
(new Alerta())->add_alerta("Se ha cerrado la sesion", "warning");

header("Location: ../index.php?view=login");