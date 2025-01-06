<?php

session_start();
require_once '../../controllers/UserController.php';
$userController = new UserController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['username'])) {
  $userController->login($_POST);
} else {
  $userController->logout();
}