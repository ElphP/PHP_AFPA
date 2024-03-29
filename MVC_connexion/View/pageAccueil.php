<?php
session_start();
$titre = "Page de connexion";


if(isset($_SESSION["user"]))  { 
    $name= $_SESSION["user"]; 
}
else  {
    header("Location: ../Controller/index.php?msg=Cette session n'existe pas...");
    
}
ob_start();
?>

<h1>Bonjour <?= $name ?>!</h1>

<?php   
$content = ob_get_clean();
include("./layout.php");
?>