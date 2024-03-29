<?php

require_once("./ticket.php");
require_once("./Database.php");
$arrayArticleByQte =  Database::listeArticleByQte();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'articles</title>
    <link rel="stylesheet" href="./style/pageStyle.css">
</head>

<body>

    <div class="container">

        <table>
            <th>ID_Article</th>
            <th>Designation</th>
            <th>Prix Unitaire(€)</th>
            <th>Catégorie</th>
            <th>Quantité vendue</th>
            <?php
            for ($i = 0; $i < count($arrayArticleByQte); $i++) {
                echo "<tr>";

                foreach ($arrayArticleByQte[$i] as $champ => $donnee) {
                    if ($champ == "categorie") {
                        echo "<td class='link' onmouseover='AJAXFn($i)' id='$i'>" . $donnee . "</td>";
                    } else  echo "<td>" . $donnee . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>