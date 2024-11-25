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

            <div style="margin-top: 30px;">
                <h3>Ajout d'un Pseudo</h3>
            </div>

            <div class="flex" style="width: 50%;">
                <form action="./addPseudo.php" method="post">
                    <div class="flex">
                        <input type="radio" id="men" name="gender" value="h">
                        <label for="men">Homme</label>
                        <input type="radio" id="woman" name="gender" value="w">
                        <label for="woman">Femme</label>
                        <input type="radio" id="other" name="gender" value="o" default>
                        <label for="other">Autre</label>
                    </div>

                    <div class="addPadding">
                        <label>Pseudo: </label>
                        <input type="text" name="nickname" required />
                    </div>

                    <div class="addPadding">
                        <label>Date: </label>
                        <input type="date" name="since" required  />
                    </div>

                    <div class="addPadding">
                        <label>Origine: </label>
                        <textarea type="text" name="origin" rows="5" required ></textarea>
                    </div>

                    <div class="addPadding">
                        <select name="fkVideogame[]" id="videogame" multiple>
                            <?php foreach($games as $game): ?>
                                <option value="<?= $game->id ?>"><?= $game->noun ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <button type="submit">Ajouter</button>
                    <input type="reset" value="Effacer">
                </form>
            </div>

            <div class="flex" style="justify-content: end; margin-top: 5px;">
                <a href="/index.php">
                    Retour à la page d'accueil
                </a>
            </div>
        </div>

        <footer>
            <hr>
            <p>Copyright Jérémy Gfeller - 2024</p>
        </footer>
    </body>
</html>
