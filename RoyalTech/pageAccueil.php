<?php

require_once('./ticket.php');
$role = $_SESSION["role"];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/pageStyle.css">
    <link rel="stylesheet" href="./style/Article.css">
</head>

<body>
    <?php
    switch ($role) {
        case '1':
            echo '<h1 style="font-size:2.8rem">Page Administrateur</h1>';
            break;
        case '2':
            echo '<h1 style="font-size:2.8rem">Page Editeur</h1>';
            break;
        case '3':
            echo '<h1 style="font-size:2.8rem">Page Lecteur</h1>';
            break;

        default:
            echo 'erreur';
            break;
    }  ?>

    <h1>Liste des articles vendus</h1>
    <?php include_once('./ListeArtVendus.php');
    if ($role == 1) {
        include_once('./listeArtNC.php');
    }
    if ($role == 1 || $role == 2) {
        include_once('./ajouterArticle.php');
        include_once('./listeCommandes.php');
    }


    ?>


    <script>
    function AJAXFn(indice) {
        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById(`${indice}`).setAttribute("title", `${this.responseText}`);
                // ici on peut créer une info-bulle stylisée au lieu d'utiliser l'attribut title->ToDo
            }
        };
        xmlhttp.open("GET", "getHoverValue.php?i=" + indice, true);
        xmlhttp.send();
    }
    </script>
</body>

</html>