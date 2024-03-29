<?php  
class Scooter extends VehiculeAMoteur
{
 

    public function  __construct($marque,$modele,$volumeReservoir)  {
        $this->marque= $marque;
        $this->modele= $modele;
    $this->moteur= new Moteur($volumeReservoir,$volumeReservoir,false);
}
    
    
public function rouler(float $volume) { 
    if ( !$this->moteur->estDemarree() ) {
     $this->moteur->demarrer();
     }
    // if($this->moteur->getVolumeReservoir()>$volume)  {
        if($volume<$this->moteur->getVolumeReservoir())  {
            echo "Le moteur utilise ".$volume. "L de carburant. Il reste " .$this->moteur->getVolumeReservoir()-$volume. " L de carburant.<br>";
        }
        else {
            echo "Le moteur utilise ".$this->moteur->getVolumeReservoir(). "L de carburant. Il reste 0 L de carburant.<br>";
        }
        $carburant = $this->moteur->utiliser($volume);
    
   if($carburant==0)  {
        throw new PanneEssenceException("Panne d'essence", 1);    
    }
   
    
    }


    public function afficher()  {
        echo "Scooter: $this->marque, $this->modele, il reste ". $this->moteur->getVolumeReservoir()." L dans le véhicule. ";
    }
     
    function afficherEtatReservoir($nbrEtat)  {
        switch ($nbrEtat) {
            case '0':
                echo "Le moteur est démarré avec ". $this->moteur->getVolumeReservoir() . " L dans le réservoir. <br>";
                break;
            case '1':
                echo "Après 0.1 L de consommation au démarrage, il reste ". $this->moteur->getVolumeReservoir() . " L dans le réservoir. <br>";
                break;
            case '2':
                echo "Le moteur utilise ".  ", il reste ". $this->moteur->getVolumeReservoir() . " L dans le réservoir. <br>";
                break;
            
            default:
            echo "Oups...problème ";
                break;
        }  
    }
}


?>