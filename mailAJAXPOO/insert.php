<?php  

require_once ("./connectionPDO.php");
function insertMySQL($nom, $prenom, $email, $message)  {
    $connexion= connexion();

   
  try {
    $sql= "INSERT INTO messagerie  VALUES (NULL, :nom, :prenom, :email, :mess)";
    $reponse= $connexion->prepare($sql);

    $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
    $reponse->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $reponse->bindValue(":email", $email, PDO::PARAM_STR);
    $reponse->bindValue(":mess", $message, PDO::PARAM_STR);
    $reponse->execute();
  } catch (PDOException $e) {
    printf("Echec connexion : %s\n", $e->getMessage());
  }
   
}

?>