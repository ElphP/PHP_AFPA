<?php // parcAuto.php
spl_autoload_register(function($classe){
 include (__DIR__."/Classes/" . $classe . ".php");
});



$citroen= new Voiture("Citroën","C5",40);
$citroen->afficherInfos();

$citroen->demarrer();
$citroen->afficherEtatReservoir(1);
for ($i=0; $i <6 ; $i++) { 
    
    try {
        $citroen->rouler(10);
        
    }
    catch  (PanneEssenceException $e) {
        echo "Le scooter vient de tomber en panne : " . $e->getMessage() . "<br>Je vais faire le plein.<br>";
        $citroen->faireLePlein(50);
        $citroen->afficherEtatReservoir(1);
    }  
}
$citroen->arreter();
$citroen->afficherConsoTotale();
$citroen->afficherPleins_Reste();


