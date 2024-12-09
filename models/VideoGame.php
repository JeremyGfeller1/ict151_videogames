<?php

class VideoGame
{
    private $database;

    public function __construct()
    {
        require_once __DIR__ . '/../Database.php';
        $this->database = new Database();
    }

    public function getGames()
    {
        $query = 'select * from videogames';

        $req = $this->database->querySimpleExecute($query);
        return $this->database->formatData($req);
    }
}