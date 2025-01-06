<?php

class User
{
  private $database;
  public function __construct()
  {
    require_once __DIR__ . '/../Database.php';
    $this->database = new Database();
  }

  function getUserByID($id) {}

  function login($username, $password)
  {
    // requête à la DB
    $query = "select * from users where username = :username";
    $binds = [
      "username" => $username
    ];

    $req = $this->database->queryPrepareExecute($query, $binds);
    $user = $this->database->formatOneData($req);

    // $username et $password => ils proviennent du formulaire
    if ($user && password_verify($password, $user->pass)) {
      return $user;
    }

    return false;
  }

  // function register($username, $password)
  // {
  //   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  // }
}