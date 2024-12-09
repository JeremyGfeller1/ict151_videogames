<?php

class PseudoController
{
    private $pseudo;
    private $videoGame;
    private $pseudoInVideoGame;
    public function __construct()
    {
        require __DIR__ . '/../models/Pseudo.php';
        require __DIR__ . '/../models/VideoGame.php';
        require __DIR__ . '/../models/PseudoInVideoGame.php';
        $this->pseudo = new Pseudo();
        $this->videoGame = new VideoGame();
        $this->pseudoInVideoGame = new PseudoInVideoGame();
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

    public function create()
    {
        $games = $this->game->getGames();

        include __DIR__ . '/../views/pseudo/create.php';
    }

    public function store($form)
    {
        $idPseudo = $this->pseudo->addPseudo($form);

        // VERSION SELECT SIMPLE
        // $this->pseudoInVideoGame->addPseudoInVideoGame($idPseudo, $form['fkVideogame']);

        // VERSION SELECT MULTIPLE
        foreach ($form['fkVideogame'] as $fkVideogame) {
            $this->pseudoInVideoGame->addPseudoInVideoGame($idPseudo, $fkVideogame);
        }

        $this->redirect();
    }

    public function update($id)
    {
        $pseudo = $this->pseudo->getPseudoById($id);
        $games = $this->videoGame->getGames();
        $gamesSelectedForPseudo = $this->pseudoInVideoGame->getVideogameByPseudoId($id);

        include __DIR__ . '/../views/pseudo/update.php';
    }

    public function updatePseudo($form)
    {
        $this->pseudo->updatePseudo($form);
        $id = $form['id'];

        $gamesSelectedForPseudo = $this->pseudoInVideoGame->getVideogameByPseudoId($id);

        foreach ($form['fkVideogame'] as $fkVideogame) {
            if (!$this->pseudoInVideoGame->isInTable($id, $fkVideogame)) {
                $this->pseudoInVideoGame->addPseudoInVideoGame($id, $fkVideogame);
            }

            $arraysDiff = array_diff(array_column($gamesSelectedForPseudo, 'fkVideogame'), $form['fkVideogame']);
            if (count($arraysDiff) > 0) {
                foreach ($arraysDiff as $fkVideogame) {
                    $this->pseudoInVideoGame->deleteVideoGameByIds($id, $fkVideogame);
                }
            }
        }

        $this->redirect();
    }

    public function redirect()
    {
        header("Location: http://localhost:8000/");
        exit();
    }
}