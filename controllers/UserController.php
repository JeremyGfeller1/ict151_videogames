<?php

class UserController
{
    private $user;
    public function __construct()
    {
        require __DIR__ . '/../models/User.php';
        $this->user = new User();
        session_start();
    }

    public function login($form)
    {
        $username = $form['username'];
        $password = $form['password'];

        $user = $this->user->login($username, $password);

        if ($user) {
            // définir les sessions
            $_SESSION['username'] = $user->username;
            $_SESSION['is_admin'] = $user->administrator;
        } else {
            // définir la session pour afficher un message d'erreur
            $_SESSION['error'] = "Mot de passe invalide !";
        }

        $this->redirect();
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }

    public function redirect()
    {
        header("Location: http://localhost:8000/");
        exit();
    }
}