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

    public function addPseudo($form)
    {
        $query = "INSERT INTO pseudos (nickname, gender, origin, since) VALUES (:nickname, :gender, :origin, :since)";
        $binds = [
            "nickname" => $form["nickname"],
            "gender" => $form["gender"],
            "origin" => $form["origin"],
            "since" => $form["since"],
        ];

        $this->database->queryPrepareExecute($query, $binds);
        return $this->database->getLastInsertId();
    }

    public function updatePseudo($form)
    {
        $query = "UPDATE pseudos
            SET nickname = :nickname, gender = :gender, origin = :origin, since = :since
            WHERE id = :id;
        ";
        $binds = [
            "id" => $form["id"],
            "nickname" => $form["nickname"],
            "gender" => $form["gender"],
            "origin" => $form["origin"],
            "since" => $form["since"],
        ];

        $this->database->queryPrepareExecute($query, $binds);
    }

    public function delete($id)
    {
        $query = "DELETE FROM pseudos WHERE id = :id;";
        $binds = [
            "id" => $id,
        ];

        $this->database->queryPrepareExecute($query, $binds);
    }
}