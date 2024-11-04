<?php

/**
 * 
 * TODO : à compléter
 * 
 * Auteur : 
 * Date : 
 * Description :
 */


 class Database
 {
    // Variable de classe
    private $connector;

    /**
     * TODO: à compléter
     */
    public function __construct()
    {
        // TODO: Se connecter via PDO et utilise la variable de classe $connector
    }

    /**
     * TODO: à compléter
     */
    private function querySimpleExecute($query)
    {
        // TODO: permet de préparer et d’exécuter une requête de type simple (sans where)
    }

    /**
     * TODO: à compléter
     */
    private function queryPrepareExecute($query, $binds)
    {
        // TODO: permet de préparer, de binder et d’exécuter une requête (select avec where ou insert, update et delete)
    }

    /**
     * TODO: à compléter
     */
    private function formatData($req)
    {
        // TODO: traiter les données pour les retourner par exemple en tableau associatif (avec PDO::FETCH_ASSOC)
    }

    /**
     * TODO: à compléter
     */
    private function unsetData($req)
    {
        // TODO: vider le jeu d’enregistrement
    }

    /**
     * TODO: à compléter
     */
    public function getAllPseudos()
    {
        // TODO: récupère la liste de tous les pseudos de la BD
        // TODO: avoir la requête sql
        // TODO: appeler la méthode pour executer la requête
        // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
        // TODO: retour tous les pseudos
    }

    /**
     * TODO: à compléter
     */
    public function getOnePseudo($id)
    {
        // TODO: récupère la liste des informations pour 1 pseudo
        // TODO: avoir la requête sql pour 1 pseudo (utilisation de l'id)
        // TODO: appeler la méthode pour executer la requête
        // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
        // TODO: retour du pseudo
    }

    // + tous les autres méthodes dont vous aurez besoin pour la suite (insertPseudo ... etc)
}

?>