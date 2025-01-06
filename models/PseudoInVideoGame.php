<?php

class PseudoInVideoGame
{
    private $database;
    public function __construct()
    {
        require_once __DIR__ . '/../Database.php';
        $this->database = new Database();
    }

    // Sélection des jeux vidéos lié à un pseudo dans la DB
    public function getVideogameByPseudoId($fkPseudo)
    {
        $query = 'select * from pseudos_in_videogames where fkPseudo = :fkPseudo';
        $binds = [
            "fkPseudo" => $fkPseudo,
        ];

        $req = $this->database->queryPrepareExecute($query, $binds);
        return $this->database->formatDataAssoc($req);
    }

    // Check si un jeu vidéo se trouve dans la DB
    public function isInTable($fkPseudo, $fkVideogame)
    {
        $query = 'select * from pseudos_in_videogames where fkPseudo = :fkPseudo and fkVideogame = :fkVideogame';
        $binds = [
            "fkPseudo" => $fkPseudo,
            "fkVideogame" => $fkVideogame,
        ];

        $req = $this->database->queryPrepareExecute($query, $binds);
        $res = $this->database->formatOneData($req);

        if (empty($res)) {
            return false;
        }

        return true;
    }

    // Association d'un jeu vidéo à un pseudo dans la DB
    public function addPseudoInVideoGame($fkPseudo, $fkVideogame)
    {
        $query = "INSERT INTO pseudos_in_videogames (fkPseudo, fkVideogame) VALUES (:fkPseudo, :fkVideogame)";
        $binds = [
            "fkPseudo" => $fkPseudo,
            "fkVideogame" => $fkVideogame,
        ];

        $this->database->queryPrepareExecute($query, $binds);
    }

    // Suppression de l'association d'un jeu viédo à un pseudo dans la DB
    public function deleteVideoGameByIds($fkPseudo, $fkVideogame)
    {
        $query = "DELETE FROM pseudos_in_videogames WHERE fkPseudo = :fkPseudo AND fkVideogame = :fkVideogame;";
        $binds = [
            "fkPseudo" => $fkPseudo,
            "fkVideogame" => $fkVideogame,
        ];

        $this->database->queryPrepareExecute($query, $binds);
    }
}