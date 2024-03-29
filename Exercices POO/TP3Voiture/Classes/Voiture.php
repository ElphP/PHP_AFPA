<?php

/**
 * Class voiture qui permet de créer une instance de voiture
 */
class Voiture
{
    /**
     * immatriculation
     *
     * @var string
     */
    private string  $immatriculation;
    /**
     * couleur
     *
     * @var string
     */
    private string  $couleur;
    /**
     * poids voiture
     *
     * @var integer
     */
    private int $poids;
    /**
     * puissance voiture
     *
     * @var integer
     */
    private int $puissance;
    /**
     * capacité du réservoir
     *
     * @var float
     */
    private float $cap_reservoir;
    /**
     * niveau d'essance
     *
     * @var float
     */
    private float $niv_essence;
    /**
     * Nombre de places utiles
     *
     * @var integer
     */
    private int $nbr_places;
    /**
     * Est assurée?
     *
     * @var boolean
     */
    private bool $assure;
    /**
     * Message du tableau de bord
     *
     * @var string
     */
    private string $message;


    /**
     * constructor
     *
     * @param string $immat
     * @param string $coul
     * @param int $poids
     * @param int $puiss
     * @param float $cap
     * @param int $nbr_pl
     */

    public function __construct($immat, $coul, $poids, $puiss, $cap, $nbr_pl)
    {
        $this->immatriculation = $immat;
        $this->couleur = $coul;
        $this->poids = $poids;
        $this->puissance = $puiss;
        $this->cap_reservoir = $cap;
        $this->nbr_places = $nbr_pl;
        $this->niv_essence= 5;
        $this->assure=false;
        $this->message= "Bienvenue à bord";
    }
/**
 * getImmatriculation
 *
 * @return string
 */
    public function getImmatriculation():string  {
        return $this->immatriculation;
    }
    /**
     * getCouleur
     *
     * @return string
     */
    public function getCouleur():string  {
        return $this->couleur;
    }
    /**
     * getPoids
     *
     * @return integer
     */
    public function getPoids():int  {
        return $this->poids;
    }
    /**
     * getPuissance
     *
     * @return integer
     */
    public function getPuissance():int  {
        return $this->puissance;
    }
    /**
     * get Capacité du réservoir
     *
     * @return float
     */
    public function getCap_Reservoir():float  {
        return $this->cap_reservoir;
    }
    /**
     * get Niveau d'essence
     *
     * @return float
     */
    public function getNiv_Essence():float  {
        return $this->niv_essence;
    }
    /**
     * get Nombre de places
     *
     * @return integer
     */
    public function getNbr_places():int  {
        return $this->nbr_places;
    }
    /**
     * get booléen d'assurance
     *
     * @return boolean
     */
    public function getAssure():bool  {
        return $this->assure;
    }
    /**
     * setter booléen assurance
     *
     * @return void
     */
    public function setAssure():void  {
        if(!$this->assure) {
            $this->assure= true;
            $this->message="Votre voiture est assurée!";
        }
        else {
            $this->assure= false;
            $this->message="Votre voiture n'est plus assurée!";
        }
    }
    /**
     * get message de tabelau de bord
     *
     * @return string
     */
    public function getMessage():string  {
        return $this->message;
    }

    public function Repeindre($NouvelleCoul):bool  {
        if(isset($NouvelleCoul))  {
            if($NouvelleCoul==$this->couleur)  {
                $this->message = "Merci pour ce rafraîchissement!";
            }
            else {
                $this->couleur = $NouvelleCoul;
                $this->message = "Merci pour cette nouvelle couleur: ".$this->couleur;
            }
            return true;
        }
        else return false;
    }

/**
 * function Mettre de l'essence (faire le plein)
 *
 * @param float $qte
 * @return void
 */
    public function Mettre_essence(float $qte): void   {

            if( $this->cap_reservoir-$this->niv_essence >= $qte  )  {
                $this->niv_essence += $qte;
                $this->message="Le plein a bien été fait, il vous reste ".$this->niv_essence. "L dans le véhicule.";
            }
            else  {
                $this->message = "Nous ne pouvons pas faire le plein, le niveau d'essence est trop haut!";
            }
    }
/**
 * Undocumented function
 *
 * @param float $dist
 * @param float $vit_moy
 * @return void
 */
    public function Se_deplacer($dist, $vit_moy)  {
        if($this->Calcul_conso($dist,$vit_moy)>$this->niv_essence)  {
            $this->message= "Vous ne pouvez pas effectuer ce trajet sans tomber en panne!!";
        } 
        else  {
            $this->niv_essence -= $this->Calcul_conso($dist,$vit_moy);
            $this->message= "Vous avez pu effectuer votre trajet, il vous reste ".$this->niv_essence. " L dans le réservoir après ce trajet.";
        }
    }
/**
 * Undocumented function
 *
 * @param float $dist
 * @param float $vit_moy
 * @return float
 */
    private function Calcul_conso (float $dist,float $vit_moy): float  {
        if($vit_moy<50)  {
            $conso= $dist*0.1;
        }
        elseif($vit_moy>=50 && $vit_moy<90){
            $conso= $dist*0.05;
        }
        elseif($vit_moy>=90 && $vit_moy<130) {
            $conso= $dist*0.08;
        }
        elseif ($vit_moy>=130) {
            $conso= $dist*0.12;
        }
        else  {$conso=0;}

        return $conso;
    }

    public function __toString()
    {
        $text = sprintf("La voiture immatriculée %s a une puissance de %d CV et est de couleur %s!",$this->immatriculation,$this->puissance,$this->couleur);
        return $text;
    }

}
