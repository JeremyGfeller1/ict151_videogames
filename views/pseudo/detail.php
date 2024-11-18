<?php

require_once '../../controllers/PseudoController.php';
$pseudoController = new PseudoController();

if (isset($_GET['idPseudo'])) {
    $id = $_GET['idPseudo'];
    $pseudoController->show($id);
}