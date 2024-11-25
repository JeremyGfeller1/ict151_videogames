<?php

require_once '../../controllers/PseudoController.php';
$pseudoController = new PseudoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudoController->store($_POST);
}

$pseudoController->create();