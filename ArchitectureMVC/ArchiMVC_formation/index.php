<?php

require_once 'controller.php';

try{
    
    if (!isset($_GET["action"]) || ($_GET["action"]=="annuler")) {       
        liste_stagiaires();
    }
    else if(isset($_GET["action"])){
        
        if($_GET["action"]=="suppr"){
           
            if(isset($_GET["id"])){
                supprimer_stagiaire($_GET["id"]);
            }else{
                throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            }
        }
        elseif ($_GET["action"]=="ajout")  {  
            if (isset($_GET["name"],$_GET['firstname']))  {
                if(ajouter_stagiaire($_GET["name"],$_GET["firstname"]))  {
                unset($_GET["name"],$_GET['firstname']);
            }
                else {
                throw new Exception("<span style='color:red'>".$_GET['name']." ". $_GET['firstname']." existe déjà dans la base de données!</span>");
            }
            
            } else {
                throw new Exception("<span style='color:red'>Echec de l'enregistrement</span>");
            } 
        }
        elseif($_GET["action"]=="modif"){
           
            if(isset($_GET["name"],$_GET["firstname"])){
                modifier_stagiaire($_GET["id"],$_GET["name"],$_GET["firstname"]);
            }
            else{
                throw new Exception("<span style='color:red'>Prénom, Nom ou ID manquant</span>");
            }
        }
       

    } else {

        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }

}catch(Exception $e){

    $msgErreur = $e->getMessage();
    echo erreur($msgErreur);
}
?>
