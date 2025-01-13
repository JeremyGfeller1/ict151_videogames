<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Pseudos</title>
        <link rel="stylesheet" type="text/css" href="../../style.css">
    </head>
    <body>
        <div class="container">
            <h1>Les Pseudos</h1>
            
            <!-- Barre de navigation -->
            <nav>
                <ul class="nav-links">
                    <li><a href="/index.php">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="views/user/deletedPseudos.php">Pseudos supprimées</a></li>
                </ul>
            </nav>
            
            <!-- Sous-titre -->
            <h2>Liste des pseudos</h2>

            <div class="flex">
                <div class="w1-2">
                    <a href="restorePseudo.php">
                        <button>Tout restaurer</button>
                    </a>
                </div>
            </div>

            <!-- Tableau des pseudos -->
            <table>
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Genre</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pseudos as $pseudo): ?>
                        <tr>
                            <td><?= $pseudo->nickname ?></td>
                            <td>
                                <?php
                                    if ($pseudo->gender == 'h') {
                                        echo 'Homme';
                                    }
                                    if ($pseudo->gender == 'w') {
                                        echo 'Femme';
                                    }
                                    if ($pseudo->gender == 'o') {
                                        echo 'Autre';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) : ?>
                                    <a href="restorePseudo.php?idPseudo=<?= $pseudo->id ?>">
                                        Restaurer
                                    </a>
                                    <a 
                                        href="deletedPseudos.php?idPseudo=<?= $pseudo->id ?>"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pseudo ?');"
                                    >
                                        Supprimer définitivement
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <footer>
                <hr>
                <p>Copyright Jérémy Gfeller - 2024</p>
            </footer>
        </div>
    </body>
</html>