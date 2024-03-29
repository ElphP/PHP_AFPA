<?php
require_once("./Article.php");
require_once("./Database.php");

$mess = "";
if (isset($_POST["id_article"], $_POST["designation"], $_POST["prix"], $_POST["categorie"])) {


    if (isset($_POST["id_article"], $_POST["designation"], $_POST["prix"], $_POST["categorie"]) &&  !empty($_POST["id_article"] && !empty($_POST["prix"]) && !empty($_POST["designation"]))) {
        $regexId = "/^[A-Za-z0-9]{5}$/";
        $regexText = "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\-\s]{5,100}$/";
        $regexPrix = "/^[0-9]+(?:\.[0-9]{1,2})?$/";

        $id = $_POST["id_article"];
        $designation = $_POST["designation"];
        $prix = $_POST["prix"];
        switch ($_POST["categorie"]) {
            case "div":
                $cat = "divers";
                break;
            case "video":
                $cat = "video";
                break;
            case "photo":
                $cat = "photo";
                break;
            case "info":
                $cat = "informatique";
                break;
            case "tel":
                $cat = "telephonie";
                break;
            default:
                $mess = "erreur";
        };



        if (preg_match($regexId, $id) && preg_match($regexText, $designation) && preg_match($regexPrix, $prix)) {
            $id = strtoupper($id);

            $designation = Database::Sanitize($designation);
            $designation = ucfirst($designation);
            $article = new Article($id, $designation, $prix, $cat);
            $reponse = $article->ajouterArticle();
            $mess = $reponse;
            header("Location: pageAccueil.php");
        }
    } else $mess = "Tous les champs doivent être renseignés!";
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="./style/Article.css">
</head>

<body>
    <h1>Ajouter des articles</h1>
    <div class="container">

        <form action="" method="post">


            <div class="article"> <label for="id_article">ID Article</label><input type="text" name="id_article" id="id_article" value=<?= $_POST["id_article"] ?? "" ?>>
                <div class="mess id"></div>
            </div>

            <div class="designation"><label for="designation">Désignation du produit</label><input type="text" name="designation" id="designation" value=<?= $_POST["designation"] ?? "" ?>>
                <div class="mess design"></div>
            </div>
            <div class="prix"><label for="prix">Prix</label><input name="prix" id="prix" value=<?= $_POST["prix"] ?? "" ?>>
                <div class="mess price"></div>
            </div>

            <div class="cat"><label for="categorie">Catégorie</label>
                <select type="text" name="categorie" id="categorie" value=<?= $_POST["categorie"] ?? "" ?>>
                    <option value="div">divers</option>
                    <option value="photo">photos</option>
                    <option value="video">vidéos</option>
                    <option value="info">informatique</option>
                    <option value="tel">téléphonie</option>
                </select>
                <div class="mess"></div>
            </div>
            <div class="btn"><button type="submit">Enregistrer</button></div>
        </form>
        <div class="messNO"><?= $mess  ?></div>
    </div>
</body>
<script>
    let regexId = /^[A-Za-z0-9]{5}$/;
    let regexText = /^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-\s]{5,100}$/;
    let regexPrix = /^[0-9]+(?:\.[0-9]{1,2})?$/;
    document.getElementById("id_article").addEventListener("keyup", () => {
        console.log(document.getElementById("id_article").value);
        if (regexId.test(document.getElementById("id_article").value)) {

            document.querySelector(".id").innerHTML = "";
            document.getElementById("id_article").style.border = "3px solid green";
        } else {
            document.querySelector(".id").innerHTML = "L'ID article doit être composé de 5 caractères(alphaNum)!";
            document.getElementById("id_article").style.border = "3px solid red";
        }
    })
    document.getElementById("designation").addEventListener("keyup", () => {
        if (regexText.test(document.getElementById("designation").value)) {

            document.querySelector(".design").innerHTML = "";
            document.getElementById("designation").style.border = "3px solid green";
        } else {
            document.querySelector(".design").innerHTML = "Le texte doit contenir entre 5 et 100 caractères!";
            document.getElementById("designation").style.border = "3px solid red";
        }
    })
    document.getElementById("prix").addEventListener("keyup", () => {
        if (regexPrix.test(document.getElementById("prix").value)) {

            document.querySelector(".price").innerHTML = "";
            document.getElementById("prix").style.border = "3px solid green";
        } else {
            document.querySelector(".price").innerHTML =
                "Le prix doit être un décimal positif (2 chiffres après le \".\" au maximum)!";
            document.getElementById("prix").style.border = "3px solid red";
        }
    })
</script>

</html>