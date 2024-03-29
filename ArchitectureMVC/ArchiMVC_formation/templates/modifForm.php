<?php
$err1 = "";
$err2 = "";
if (isset($_GET["name"], $_GET["firstname"])&& $_GET["action"]=="modif") {
    $regex = '/^[A-Za-z\-éèïàêîùë]{2,}$/';
    if (!preg_match($regex, $_GET["name"]) || !preg_match($regex, $_GET["firstname"])) {
        if (!preg_match($regex, $_GET["name"])) {
            $err1 = "Le nom doit être écrit avec des caractères (et au moins 2)";
        }
        if (!preg_match($regex, $_GET["firstname"])) {
            $err2 = "Le prénom doit être écrit avec des caractères (et au moins 2)";
        }
    } else {
        $url = $_SERVER["REQUEST_URI"];
        $url = strstr($url, "?");
        header("Location: ../index.php$url");
    }

}elseif (isset($_GET["action"])){
   
        if($_GET["action"]=="annuler"){
            header("Location: ../index.php");
        }
}
    
        
;

$title = "Modification des données d'un stagiaire";
ob_start();
?>
<h1>Modifier les données du stagiaire</h1>
<form action="" method="get">

    <div class="entree"><label for="nom">Nom</label><input type="text" name="name" value=<?= $_GET["name"] ?>><span class="err"><?= $err1 ?></span></div>
    <div class="entree"><label for="prenom">Prénom</label><input type="text" name="firstname" value=<?= $_GET["firstname"] ?>><span class="err"><?= $err2 ?></span></div>
    <input type="hidden" name="id" value='<?= $_GET["id"] ?>'>
    <div class="btn"><button type="submit" name="action" value="modif">Envoyer</button><button type="submit" name="action" value="annuler">Annuler</button></div>

</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>