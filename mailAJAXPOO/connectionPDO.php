<?php 


function connexion() {
$dsn= "mysql:host=localhost; port= 3306; dbname=formulaire; ";
try {
    $option= array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $connexion= new PDO($dsn, "root", "",$option);
   
} catch (PDOException $e) {
    printf("Echec connexion : %s\n", $e->getMessage());
}
return $connexion;
}
?>