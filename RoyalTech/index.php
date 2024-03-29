<?php  

require_once ("./Database.php");
if(isset($_POST["login"], $_POST["mdp"])) {
    $log= Database::Sanitize($_POST["login"]);
    $mdp= Database::Sanitize($_POST["mdp"]);
    if(Database::verifUtilisateur($log,$mdp)==NULL)  {
        $erreur="Votre identifiant et/ou votre mot de passe ne sont pas valides!";
    }
    else {
        session_start();
        $_SESSION["role"]= Database::verifUtilisateur($log,$mdp); 
        $_SESSION["user"]= $_POST["login"];
        unset ($_POST);
        header("Location: pageAccueil.php");   
    };
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez Royal Tech!</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="titre">
                <img src="./img/logo_societe.png" alt="logo">
                <h2><span class="red">Back- Office- Royal </span>Tech</h2>
            </div>
            <p class="error"> <?= $erreur ?? "" ; ?></p>
            <div class="form">
                <label class="gras" for="login">Login</label><input type="text" id="login" name="login"
                    placeholder="Entrez ici le login utilisateur">
                <label class="gras" for="mdp">Mot de passe</label><input type="text" id="mdp" name="mdp"
                    placeholder="Entrez ici le mot de passe utilisateur">
                <button type="submit">Login</button>
            </div>

        </form>
    </div>
</body>

</html>