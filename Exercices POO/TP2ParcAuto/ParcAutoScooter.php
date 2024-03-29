<?php // parcAuto.php
spl_autoload_register(function($classe){
 include (__DIR__."/Classes/" . $classe . ".php");
});
include ("D:\AFPA_sav_0201\Projets\Exercices_AFPA\PHP\Exercices POO\TP2ParcAuto\Classes\VehiculeAMoteur.php");


$scooter1 = new Scooter ("YAMAHA", "X-MAX", 20);
$scooter1->afficher(); echo"<br> <p>Parcours de 3fois 10</p>";

$scooter1->demarrer();
$scooter1->afficherEtatReservoir(1);
for ($i=0; $i <3 ; $i++) { 
    
    try {
        $scooter1->rouler(10);
        
    }
    catch  (PanneEssenceException $e) {
        echo "Le scooter vient de tomber en panne : " . $e->getMessage() . "<br>Je vais faire le plein.<br>";
        $scooter1->faireLePlein(15);
        $scooter1->afficherEtatReservoir(1);
    }  
}
$scooter1->arreter();


