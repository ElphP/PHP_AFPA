<?php
if(isset($_GET["msg"]))  {
    $mess=$_GET["msg"];
} else $mess="";
$titre = "Ajouter un utilisateur";
ob_start();
?>

<h1>Créer un compte</h1>
<form action="../Controller/index.php" method="post">

    <div class="entree"><label for="user">Utilisateur:</label><input type="text" name="user" id="user"><span id="messUser"></span></div>
    <div class="entree"><label for="mdp">Mot de passe:</label><input type="text" name="mdp" id="mdp"><span id="messMdp"></span></div>
    <div class="entree"><label for="mail">E-mail:</label><input type="text" name="mail" id="mail"><span id="messMail"></span></div>
    <div class="entree"><label for="fonct">Fonction:</label><input type="text" name="fonct" id="fonct"><span id="messFctn"></span></div>
    <div class="btn"><button type="submit" name="enreg">Enregistrer</button><button type="submit" name="annul1">Annuler</button></div>
   
    <!-- affichage message retour -->
   <?php  if($mess=="Ce compte existe déjà!"  || $mess=="Une de vos données (au moins) ne correspond pas au format requis, réessayez!")  {
    echo "<p class='messKO'> $mess </p>";
   } 
   elseif ($mess=="Votre compte a bien été créé!") {
    echo "<p class='messOK'> $mess </p>";
   }
   ?>
   

    <a class="crUser " href="./connex.php">Retour à l'accueil</a>
</form>

<?php
$content = ob_get_clean();
include("./layout.php");
?>
<script>
    let regexPwd = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$@%*+-_!éàèïîùôö]).{6,}$/;
    let text = /^[A-Za-zéàèïîùôö]{3,30}$/;
    let regexMail = /^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[a-z]{2,}$/;

    document.getElementById("user").addEventListener("input", () => {

        if (!(document.getElementById("user").value.match(text))) {

            document.getElementById("messUser").innerHTML = "Entrez un nom valide."
        } else {
            document.getElementById("messUser").innerHTML = "";
        }
    })
    document.getElementById("mdp").addEventListener("input", () => {

        if (!(document.getElementById("mdp").value.match(regexPwd))) {

            document.getElementById("messMdp").innerHTML = " <br>Entrez un mot de passe valide:<br> 1 lettre majuscule, 1 lettre minuscule, 1 chiffre, 1 caractère spécial. <br> 6 caractères au minimum."
        } else {
            document.getElementById("messMdp").innerHTML = "";
        }
    })
    document.getElementById("mail").addEventListener("input", () => {

        if (!(document.getElementById("mail").value.match(regexMail))) {

            document.getElementById("messMail").innerHTML = "Entrez un mail valide."
        } else {
            document.getElementById("messMail").innerHTML = "";
        }
    })
    document.getElementById("fonct").addEventListener("input", () => {

        if (!(document.getElementById("fonct").value.match(text))) {

            document.getElementById("messFctn").innerHTML = "Entrez un texte valide."
        } else {
            document.getElementById("messFctn").innerHTML = "";
        }
    })
</script>