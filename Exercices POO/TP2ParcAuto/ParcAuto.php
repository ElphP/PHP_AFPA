<?php // parcAuto.php
spl_autoload_register(function($classe){
 include (__DIR__ . "/TP2ParcAuto/Classes/" . $classe . ".php");
});




echo "Bonjour\n";

$laguna = new Voiture("Renault", "Laguna",30);
$laguna->afficherInfos();

$laguna->afficherEtatReservoir(0);
$laguna->demarrer();
$laguna->afficherEtatReservoir(1);

$laguna->afficherEtatReservoir(2);
$laguna->afficherInfos();
try {
    $laguna->rouler(50);
   } catch (PanneEssenceException $e) {

    echo "La laguna vient de tomber en panne : " . $e->getMessage() . "<br>";
   }
   $laguna->afficherInfos();