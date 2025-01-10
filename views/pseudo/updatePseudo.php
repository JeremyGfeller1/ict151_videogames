<?php

require_once '../../controllers/PseudoController.php';
$pseudoController = new PseudoController();

if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    if (isset($_GET['idPseudo'])) {
        $id = $_GET['idPseudo'];
        $pseudoController->update($id);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pseudoController->updatePseudo($_POST);
    }
} else {
    header('Location: http://localhost:8000');
    exit;
}