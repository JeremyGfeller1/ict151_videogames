<?php

class PseudoInVideoGame
{
    private $database;
    public function __construct()
    {
        require_once __DIR__ . '/../Database.php';
        $this->database = new Database();
    }

    public function addPseudoInVideoGame($idPseudo, $idVideogame)
    {
        $query = "INSERT INTO pseudos_in_videogames (fkPseudo, fkVideogame) VALUES (:fkPseudo, :fkVideogame)";
        $binds = [
            "fkPseudo" => $idPseudo,
            "fkVideogame" => $idVideogame,
        ];

        $this->database->queryPrepareExecute($query, $binds);
    }
}