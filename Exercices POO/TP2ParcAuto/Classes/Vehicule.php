<?php  
abstract class Vehicule  {
    
    protected string $marque;
    protected string $modele;

    function __construct($marque, $modele)
    {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    abstract public function demarrer(): bool ;
    abstract public function arreter() : void ;
    abstract public function faireLePlein( float $volumeEssence ) : void ;
}

?>