<?php  

require_once ("./Send.php");
require_once ("./SendMethod2.php");
require_once ("./insert.php");

class Contact  {
    private $nom;
    private $prenom;
    private $email;
    private $message;

    function __constructor(String $nom, String $prenom, String $email, String $message)  {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->message=$message;
    }

    function getNom()  {
        return $this->nom;
    }

    function setNom(String $nom): bool {
        $regexNom = "/^[a-zA-Z\-éèïê]{2,20}$/";
        if (preg_match($regexNom, $nom))  {
            $this->nom=$nom;
            return true;
        }    
        else return false;
    }

    function getPrenom()  {
        return $this->prenom;
    }

    function setPrenom(String $prenom): bool {
        $regexPrenom = "/^[a-zA-Z\-éèïê]{2,20}$/";
        if (preg_match($regexPrenom, $prenom))  {
            $this->prenom=$prenom;
            return true;
        }    
        else return false;
    }

    function getEmail()  {
        return $this->email;
    }

    function setEmail(String $mail): bool {
        $regexMail = "/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/";  
        if (preg_match($regexMail, $mail))  {
            $this->email=$mail;
            return true;
        }    
        else return false;
    }

    function getMessage()  {
        return $this->message;
    }

    function setMessage(String $message):void {
        $this->message=$message;
    }

    function remplirTable()  {
           
        insertMySQL($this->nom, $this->prenom, $this->email, $this->message);

    }

    function flagMail()  {
        $sujet="Validation d'un formulaire";
        $message= "Vous avez un nouveau message : <br> Nom: ".$this->nom. "<br> Prenom: ".$this->prenom." <br> Email: " .$this->email. "<br> Message: ". $this->message;
        $client="elphege78@hotmail.com"; 
        try {
            sendEmail2($client,$sujet,$message);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }


}

?>