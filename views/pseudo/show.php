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
                    <li><a href="#home">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            
            <!-- Sous-titre -->
            <h2>Liste des pseudos</h2>

            <table style="width: 100%;">
                <tr>
                    <td><?= $pseudo->nickname ?></td>
                    <td><?= $pseudo->gender ?></td>
                    <td>Liste des jeux vidéos</td>
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) : ?>
                        <td>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                            </svg>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td colspan="2">
                        Origine <br/>
                        <?= $pseudo->origin ?>
                    </td>
                    <td colspan="2">
                        <ul>
                            <?php foreach($pseudo->games as $game): ?>
                                <li><?= $game->noun ?></li>
                            <?php endforeach ?>
                        </ul>
                    </td>
                </tr>
            </table>

            <div style="display: flex; justify-content: end; margin-top: 5px;">
                <a href="/index.php">
                    Retour à la page d'accueil
                </a>
            </div>

            <footer>
                <hr>
                <p>Copyright Jérémy Gfeller - 2024</p>
            </footer>
        </div>
    </body>
</html>