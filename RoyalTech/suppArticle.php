<?php

require_once("./ticket.php");
require_once("./Article.php");
require_once("./Database.php");

$mess = "";
$messOK = "";
$_SESSION["id_article"] = $_GET["id_article"];

if (isset($_POST["suppr"])) {
    unset($_POST["suppr"]);
    header("Location: ./pageAccueil.php");
}

if (isset($_GET["id"])) {    
    Article::supprimerArticle($_GET["id"]);
    unset($_GET["id"]);
    header("Location: pageAccueil.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un article</title>
    <link rel="stylesheet" href="./style/Article.css">
</head>

<body>
    <div class="container">
        <h1>Supprimer un article</h1>
        <form action="" method="post">


            <div class="article"> <label for="id_article">ID Article</label>
                <div id="id_article">
                    <?= $_GET["id_article"] ?? "" ?></div>
                <div class="mess id"></div>
            </div>


            <div class="boutons">

                <div class="btn"><button onclick="popupSuppr()">Supprimer</button></div>
                <div class="btn"><button type="submit" name="suppr">Retour</button></div>
            </div>
        </form>
        
    </div>
</body>
<script>
   
    function popupSuppr() {
        popup = window.open("popup.php","child", "toolbar=no,scrollbars=no,resizable=yes,top=200,left=400,width=580,height=350,location=no, title=no");
    }
</script>

</html>