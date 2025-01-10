<?php

require_once '../../controllers/PseudoController.php';
$pseudoController = new PseudoController();

if (isset($_SESSION['username']) && isset($_SESSION['is_admin'])) {
    if (isset($_GET['idPseudo'])) {
        $id = $_GET['idPseudo'];
        $pseudoController->show($id);
    }
}