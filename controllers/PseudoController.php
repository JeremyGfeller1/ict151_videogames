<?php

class PseudoController
{
    private $pseudo;
    public function __construct()
    {
        require_once __DIR__ . '/../models/Pseudo.php';
        $this->pseudo = new Pseudo();
    }

    public function show($id)
    {
        $pseudo = $this->pseudo->getPseudoById($id);
        $games = $this->pseudo->getGamesByPseudoById($id);

        if ($pseudo->gender == 'h') {
            $pseudo->gender = 'Homme';
        }

        if ($pseudo->gender == 'w') {
            $pseudo->gender = 'Femme';
        }

        if ($pseudo->gender == 'o') {
            $pseudo->gender = 'Autre';
        }

        include __DIR__ . '/../views/pseudo/show.php';
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}