<?php

require_once '../../controllers/PseudoController.php';
$pseudoController = new PseudoController();

if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
  if (isset($_GET['idPseudo'])) {
    $id = $_GET['idPseudo'];
    $pseudoController->defDeletedPseudos($id);
  } else {
    $pseudoController->showDeletedPseudos();
  }
} else {
  header('Location: http://localhost:8000');
  exit;
}