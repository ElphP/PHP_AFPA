<?php
abstract class VehiculeAMoteur extends Vehicule
{
    protected $moteur;

 

    public function demarrer(): bool
    {
        return $this->moteur->demarrer();
    }

    public function arreter(): void
    {
        $this->moteur->arreter();
    }

    public function faireLePlein($carburant) :void  {
        $this->moteur->arreter();
        $this->moteur->faireLePlein($carburant);
        $this->moteur->demarrer();
    } 
    
 
    
    
}
