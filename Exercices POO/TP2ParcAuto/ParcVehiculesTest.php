<?php
spl_autoload_register(function($classe){
    include (__DIR__."/Classes/" . $classe . ".php");
   });
   include ("D:\AFPA_sav_0201\Projets\Exercices_AFPA\PHP\Exercices POO\TP2ParcAuto\Classes\ParcVehicules.php");

$tabVehicule =[
     new Voiture("DE LOREAN", "DMC-12",1),
     new Voiture("DODGE", "Charger",1),
     new Voiture("CADILLAC", "Milor-Meteor",3),
     new Voiture("FORD", "Gran Torino",3),
     new Scooter("Piaggo","vespa",5),
     new Scooter("HONDA","Dax",4),
     new Scooter("Peugeot","S57C",2)
];


$parc = new ParcVehicule($tabVehicule);
echo "<pre>";
    var_dump($parc);
echo "</pre>";