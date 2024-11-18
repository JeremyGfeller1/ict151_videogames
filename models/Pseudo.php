<?php

class Pseudo
{
    private $database;
    public function __construct()
    {
        // $this->database = Database::class;
        require_once __DIR__ . '/../Database.php';
        $this->database = new Database();
    }

    public function getPseudos()
    {

    }

    public function getPseudoById($id)
    {
        $req = $this->database->queryPrepareExecute('select * from pseudos where id = :id', [ 'id' => $id ]);
        return $this->database->formatOneData($req);
    }

    public function getGamesByPseudoById($id)
    {
        $req = $this->database->queryPrepareExecute('
            select v.noun
            from pseudos as p
            inner join pseudos_in_videogames as pv on pv.fkPseudo = p.id
            inner join videogames as v on pv.fkVideogame = v.id
            where p.id = :id
        ', [ 'id' => $id ]);
        return $this->database->formatData($req);
    }
}