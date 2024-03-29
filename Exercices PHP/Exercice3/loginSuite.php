<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (!isset($_SESSION["user"])) { echo "<meta http-equiv='refresh' content='5, URL=\"./login.html\">";} ?>
    <title> <?php  if (!isset($_SESSION["user"]))  {echo "Page d'erreur";} else  {echo "Page d'accueil";} ?></title>
</head>
<body>
    
</body>
</html>

<?php 

if (!isset($_SESSION["user"])) {
    echo "<h1>Erreur de login, vous n'avez pas accès à cette page</h1>";
    echo "<a href=\"./login.html\">Retour vers la page login</a>";

} 
else {

    echo "<h1>Bonjour " . $_SESSION["user"] . "</h1>";
    echo "<p>Au menu pour vous:</p>";
    echo "<ul> 
<li>Sommaire</li>
<li>et aussi...</li>
<li>et encore...</li>
<li>pour finir...</li>
 </ul>";
}?>
