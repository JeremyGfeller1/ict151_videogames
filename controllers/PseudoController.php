<?php

class PseudoController
{
    private $pseudo;
    private $videoGame;
    private $pseudoInVideoGame;
    public function __construct()
    {
        session_start();
        require __DIR__ . '/../models/Pseudo.php';
        require __DIR__ . '/../models/VideoGame.php';
        require __DIR__ . '/../models/PseudoInVideoGame.php';
        $this->pseudo = new Pseudo();
        $this->videoGame = new VideoGame();
        $this->pseudoInVideoGame = new PseudoInVideoGame();
    }

    public function show($id)
    {
        // Récupération des infos d'un pseudo et des jeux vidéos qui lui sont associés
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
        // Récupération des jeux vidéos
        $games = $this->videoGame->getGames();

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
        // Récupération des informations d'un jeu vidéo
        $pseudo = $this->pseudo->getPseudoById($id);
        $games = $this->videoGame->getGames();
        $gamesSelectedForPseudo = $this->pseudoInVideoGame->getVideogameByPseudoId($id);

        // Affichage de la vue avec les données provenant de la DB (variables du dessus)
        include __DIR__ . '/../views/pseudo/update.php';
    }

    public function updatePseudo($form)
    {
        // Mis à jour dans la base de donnée d'un pseudo
        $this->pseudo->updatePseudo($form);
        $id = $form['id'];

        // Mis à jour des jeux vidéos associés au pseudo
        $gamesSelectedForPseudo = $this->pseudoInVideoGame->getVideogameByPseudoId($id);

        foreach ($form['fkVideogame'] as $fkVideogame) {
            // Association d'un jeu vidéo à un pseudo
            if (!$this->pseudoInVideoGame->isInTable($id, $fkVideogame)) {
                $this->pseudoInVideoGame->addPseudoInVideoGame($id, $fkVideogame);
            }

            // Suppression de l'assocation d'un jeu viédo à un pseudo
            $arraysDiff = array_diff(array_column($gamesSelectedForPseudo, 'fkVideogame'), $form['fkVideogame']);
            if (count($arraysDiff) > 0) {
                foreach ($arraysDiff as $fkVideogame) {
                    $this->pseudoInVideoGame->deleteVideoGameByIds($id, $fkVideogame);
                }
            }
        }

        $this->redirect();
    }

    public function showDeletedPseudos()
    {
        $pseudos = $this->pseudo->getDeletedPseudos();

        include __DIR__ . '/../views/pseudo/showDeletedPseudos.php';
    }

    public function delete($id)
    {
        // Décommenter si dans la DB nous n'avons pas mis le 'ON DELETE CASCADE' pour les clés étrangères dans la table 'pseudos_in_videogames'
        // foreach ($this->pseudoInVideoGame->getVideogameByPseudoId($id) as $game) {
        //     $this->pseudoInVideoGame->deleteVideoGameByIds($id, $game->id);
        // }

        $this->pseudo->delete($id);

        $this->redirect();
    }

    public function defDeletedPseudos($id)
    {
        $this->pseudo->defDelete($id);

        $this->redirect();
    }

    public function restorePseudo($id)
    {
        $this->pseudo->restorePseudo($id);

        $this->redirect();
    }

    public function redirect()
    {
        header("Location: http://localhost:8000/");
        exit();
    }
}