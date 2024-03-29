<?php

require_once("./ticket.php");
require_once("./Database.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles non commandés</title>
    <link rel="stylesheet" href="./style/pageStyle.css">
</head>

<body>
    <?php if ($_SESSION["role"] == 1) : ?>
        <h1>Tableau des articles non vendus</h1>
        <div class="container">
            <table>
                <th>ID_Article</th>
                <th>Designation</th>
                <th>Prix Unitaire(€)</th>
                <th>Catégorie</th>
                <th>Modifier</th>
                <th>Supprimer</th>
                <?php
                $arrayArticlesNC =  Database::ArtNC();
                for ($i = 0; $i < count($arrayArticlesNC); $i++) {
                    echo "<tr>";
                    foreach ($arrayArticlesNC[$i] as $champ => $donnee) {
                        echo "<td>" . $donnee . "</td>";
                    }
                    echo "<td class='link' onclick='modif(\"" . $arrayArticlesNC[$i]["id_article"] . "\")' > Modifier </td>";
                    echo "<td class='link' onclick='supp(\"" . $arrayArticlesNC[$i]["id_article"] . "\")' > Supprimer </td>";


                    echo "</tr>";
                }
                ?>
            </table>
        </div>

    <?php else : ?>
        <h1>Tableau des articles non vendus</h1>
        <div class="container">
            <table>
                <th>ID_Article</th>
                <th>Designation</th>
                <th>Prix Unitaire(€)</th>
                <th>Catégorie</th>
                <?php
                $arrayArticlesNC =  Database::ArtNC();
                for ($i = 0; $i < count($arrayArticlesNC); $i++) {
                    echo "<tr>";
                    foreach ($arrayArticlesNC[$i] as $champ => $donnee) {
                        echo "<td>" . $donnee . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    <?php endif; ?>
    <script>
        function modif(id) {
            window.location = "./modifierArticle.php?id_article=" + id;

        }

        function supp(id) {
            window.location = "./suppArticle.php?id_article=" + id;
        }
    </script>
</body>

</html>