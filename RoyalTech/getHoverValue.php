<?php 

require_once ("./Database.php");
$arrayArticleByQte=  Database::listeArticleByQte();
$Cat= $arrayArticleByQte[$_GET["i"]]["categorie"];
 
echo  "Gain pour la catégorie \"".$Cat."\": " . number_format(floor(Database::gainParCat($Cat)),2, ",", " "). " €." ;
?>