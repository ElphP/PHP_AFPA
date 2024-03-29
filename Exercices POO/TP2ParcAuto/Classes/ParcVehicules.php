<?php  


class ParcVehicule  {


    private $Parc;

 function __construct($tab) {
    for ($i=0; $i <count($tab) ; $i++) { 
        $this->Parc[$i]=$tab($i);
    }
       
    }

function controlerVehicule()  {
        $this->Parc->VehiculeAMoteur->demarrer();
        try {
            $this->Parc->VehiculeAmoteur->rouler(rand(1,5));
            if($carburant==0)  {
                throw new PanneEssenceException("Panne d'essence", 1);    
            }
        } catch (PanneEssenceException $e) {
            $this->vehiculeAMoteur->faireLePlein(rand(1,10));
        }
}

}

?>