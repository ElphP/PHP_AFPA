<?php
require("connect.php");

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD,$option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

// Création de la liste des Stagiaires
function get_all_stagiaires(){

    $connexion = connect_db();
    $stagiaires = array();
    $sql = "SELECT * from Membres";

    foreach ($connexion->query($sql) as $row) {
        $stagiaires[] = $row;
    }
    return $stagiaires;
}

// Suppression d'un stagiaire par id
function delete_stagiaire_by_id($id){

    $connexion = connect_db();
    $sql= "DELETE FROM membres WHERE id_membre = :id ";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":id", intval($_GET["id"]), PDO::PARAM_INT);
    $reponse->execute();
 
}

// Ajout d'un stagiaire
function add_stagiaire($nom,$prenom){
    // on vérifie d'abord qu'il n'y aie pas de doublons....
    $connexion = connect_db();
    $sql= "SELECT nom_membre, login_membre FROM Membres";
    foreach ($connexion->query($sql) as $row) {
        $stagiaires[] = $row;
    }
    foreach($stagiaires as $stagiaire)  {
        if(($stagiaire["login_membre"]==$prenom)&&($stagiaire["nom_membre"]==$nom))  {
            return false;
        }
    }
    // si tout va bien on enregistre!
    $sql= "INSERT INTO  membres VALUES (NULL, :nom, :prenom)";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
    $reponse->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $reponse->execute();
    return true;
}

// Modification d'un stagiaire
function modif_stagiaire($id,$nom,$prenom){

    $connexion = connect_db();
    $sql= "UPDATE membres SET nom_membre=:nom, login_membre=:prenom  WHERE id_membre = :id ";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
    $reponse->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $reponse->bindValue(":id", (int)$id, PDO::PARAM_INT);
    $reponse->execute();
 
}


?>