<?php  

class Moteur  {
    private Float $volumeReservoir;
    private Float $volumeTotal;
    private Float $consoTotale;
    private bool $demarre;

    public function __construct($volumeReservoir, $volumeTotal, $demarre)  {
        $this->volumeReservoir = $volumeReservoir;
        $this->volumeTotal = $volumeTotal;
        $this->demarre = $demarre;
        $this->consoTotale = 0;
    }



function getVolumeReservoir()  {
    return $this->volumeReservoir;
}
function getVolumeTotal()  {
    return $this->volumeTotal;
}
function getDemarre()  {
    return $this->demarre;
}
function getConsoTotale()  {
    return $this->consoTotale;
}

function demarrer()  {
    if($this->volumeReservoir>0.1)  {
        echo "Le véhicule est démarré avec ". $this->volumeReservoir." L d'essence. <br>";
        $this->volumeReservoir -= 0.1; 
        $this->demarre=true;
        return true;
    }
    else return false;
}

function estDemarree()  {
    if($this->demarre) {
        return true;
    }
    else return false;
}

function utiliser($volEssenceTrajet)  {
    $this->consoTotale+=$volEssenceTrajet;
    if(($this->volumeReservoir - $volEssenceTrajet) >= 0)  {
        $this->volumeReservoir = number_format($this->volumeReservoir - $volEssenceTrajet,2);
        return $this->volumeReservoir;
    }
    else {
        $this->volumeReservoir = 0;
        return $this->volumeReservoir;
    } 

}
function faireLePlein($carburant)  {
    $this->volumeReservoir += $carburant;
    $this->volumeTotal += $carburant;
    echo ("Plein effectué avec " . $carburant . " litres.<br>");
}
function arreter()  {
    echo "Le moteur est arrêté.<br>";
}

function afficherInfos()  {
    echo "Le moteur démarre avec ".$this->volumeReservoir. " L de carburant.";
}



}


?>