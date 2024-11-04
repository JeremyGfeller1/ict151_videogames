<?php
    $connector = new PDO('mysql:host=127.0.0.1;dbname=ict151_videogames;charset=utf8', 'root', '');

    $req = $connector->query('select * from pseudos');
    $pseudos = $req->fetchALL(PDO::FETCH_OBJ);

    $req = $connector->query('select * from videogames');
    $games = $req->fetchALL(PDO::FETCH_OBJ);

    echo json_encode($pseudos);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des pseudos et jeux vidéos</title>
    </head>
    <body>
        <ul>
            <?php foreach($pseudos as $pseudo): ?>
                <li><?= $pseudo->nickname ?></li>
            <?php endforeach ?>
        </ul>
        <ul>
            <?php foreach($games as $game): ?>
                <li><?= $game->noun ?></li>
            <?php endforeach ?>
        </ul>
    </body>
</html>