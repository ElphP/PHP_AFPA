<?php
require_once 'modele.php';

function liste_stagiaires(){
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

function supprimer_stagiaire($id){

    delete_stagiaire_by_id($id);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
   
}
function modifier_stagiaire($id,$nom,$prenom){

    modif_stagiaire($id,$nom,$prenom);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
   
}
function ajouter_stagiaire($nom,$prenom){
    
   if(!add_stagiaire($nom,$prenom)) {
    return false;
   };
   
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
    return true;
}

// function verif_redirect()  {

// }

// Affiche une erreur dans une vue erreur.php 
// qui centralise toutes les levées d'Exceptions 
function erreur($msgErreur) {
    require 'templates/erreur.php';
}
?>



