<?php

require_once '../../controllers/UserController.php';
$userController = new UserController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userController->logout();
}