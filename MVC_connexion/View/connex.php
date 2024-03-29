<?php
$titre = "Page de connexion";
if(isset($_GET["msg"]))  {
    $message = $_GET["msg"];
}
ob_start();

?>
<h1>Connexion MVC</h1>
<form action="../Controller/index.php" method="post">
    <a class="crCpte" href="./ajout.php">Créer un compte</a>
    <div class="entree"><label for="user">Utilisateur:</label><input type="text" name="user" id="user" ></div>
    <div class="entree"><label for="mail">E-mail:</label><input type="text" name="mail" id="mail" ></div>
    <div class="entree"><label for="mdp">Mot de passe:</label><input type="text" name="mdp" id="mdp" ></div>
    <div class="btn"><button type="submit" name="valid">Valider</button><button type="submit" name="annul">Annuler</button></div>
    <span class="messKO"><?= $message ?? "" ?></span>
</form>




<?php
$content = ob_get_clean();
include("./layout.php");
?>