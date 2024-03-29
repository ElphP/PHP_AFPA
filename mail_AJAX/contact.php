<?php
// require_once("./Send.php");
$mess = "";
$messNom = "";
$messPreN = "";
$messMail = "";
$messMess = "";

$regexNom = "/[a-zA-Z\-]{2,20}/";
$regexMail = "/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/";
$regexMess = "/[a-zA-Z\-0-9\*]{5,1000}/";
echo "<pre>";
    var_dump($_POST);
echo "</pre>";
if(isset($_POST["reset"]))  {
unset ($_POST);
}
if (isset($_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["mess"], $_POST["submit"])  ) {
    if ((!empty($_POST["nom"])) && (!empty($_POST["prenom"])) && (!empty($_POST["mail"])) && (($_POST["mess"])!="") && preg_match($regexNom, $_POST["nom"]) && preg_match($regexNom, $_POST["prenom"]) && preg_match($regexMail, $_POST["mail"])) {
        
        // $sujet="Message bien reçu!"
        // $message="Bonjour $_POST['nom] $_POST['prenom]"
        // $client=
        // sendEmail()

        
        $mess = "<p class='green'>Tout s'est bien passé, <br> le mail est parti et la BDD a été remplie!</p>";
    } else {
        $mess = "<p class=\"red\">Tous les champs doivent être remplis et valides!</p>";
        if (!preg_match($regexNom, $_POST["nom"])) {
            $messNom = "<span class=\"red\">Indiquez un nom valide!</span>";
        }
        if (!preg_match($regexNom, $_POST["prenom"])) {
            $messPreN = "<span class=\"red\">Indiquez un prénom valide!</span>";
        }
        if (!preg_match($regexMail, $_POST["mail"])) {
            $messMail = "<span class=\"red\">Indiquez un mail valide!</span>";
        }
        if (empty($_POST["mess"])) {
            $messMess = "<span class=\"red\">Ecrivez ici votre message!</span>";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>

</html>

<form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
    <h1>Formulaire de Contact - PHP-POO</h1>
    <?= $mess  ?>
   
    <div><label for="nom">Nom</label><input type="text" name="nom" id="nom" value=<?= $_POST['nom'] ?? "" ?>> <?= $messNom  ?> </div>
   
    <div><label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom"
            value=<?= $_POST['prenom'] ?? ""  ?>>
            <?= $messPreN  ?>     
    </div>
    <div><label for="mail">E-mail</label><input type="email" name="mail" id="mail" value=<?= $_POST['mail'] ?? ""  ?>>
    <?= $messMail  ?>
    </div>
    <div>
        <label for="mess">Message</label><textarea name="mess" id="mess" cols="30" rows="10"
            placeholder="Votre message ici..."> <?php if (isset($_POST["mess"])) {echo $_POST["mess"];}  ?> </textarea>
            <?= $messMess  ?>
    </div>
    <div class="btn">
        <button type="submit" name="reset" id="reset">Annuler</button>
        <button type="submit" name="submit" id="submit">Envoyer</button>
    </div>
</form>