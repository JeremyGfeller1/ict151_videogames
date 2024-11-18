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
        $pseudo->games = $this->pseudo->getGamesByPseudoById($id);

        // Création d'un tableau associatif pour les genre
        $genderMap = [
            'h' => 'Homme',
            'w' => 'Femme',
            'o' => 'Autre'
        ];

        // Comparaison du genre avec celui provenant de la base de données, si la valeur est trouvée dans le tableau genderMap alors la nouvelle valeur (Homme, Femme, Autre) est enregistré dans $pseudo->gender
        // Si la valeur n'est pas trouvé dans le tableau elle restera inchangée dans $pseudo->gender
        $pseudo->gender = $genderMap[$pseudo->gender] ?? $pseudo->gender;

        include __DIR__ . '/../views/pseudo/show.php';
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}