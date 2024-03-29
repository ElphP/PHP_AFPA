<?php 

require("../Model/modele.php");

if(!isset($_POST["enreg"],$_POST["valid"]))  {
    header("Location: ../View/connex.php");
}

if(isset($_POST["valid"]))  {
    $userName = sanitize($_POST["user"]);
    $email =  sanitize($_POST["mail"]);
    $mdp = sanitize($_POST["mdp"]); 
       if(!verify($userName,$mdp,$email))  { 
        header("Location: ../View/connex.php?msg=Identifiants non reconnus!");
       }
    //    ici démarre la session!
        else {
            session_start();
        $_SESSION["user"]= $userName;
        unset($_POST);
        header("Location: ../View/pageAccueil.php"); 
    }
}


if(isset($_POST["enreg"])) {
   
    $regexPwd = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$@%*+-_!éàèïîùôö]).{6,}$/";
    $text = "/[A-Za-zéàèïîùôö]{3,30}/";
    $regexMail ="/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[a-z]{2,}$/";
   
    
       $userName = sanitize($_POST["user"]);
       $email =  sanitize($_POST["mail"]);
       $mdp = sanitize($_POST["mdp"]);
       $fctn = sanitize($_POST["fonct"]);
      


       if(preg_match($text,$userName) && preg_match($regexPwd,$mdp) && preg_match($regexMail,$email) && preg_match($text,$fctn))  {
   
         
           
           try {
          
              if(!enregUser($userName,$mdp,$email,$fctn))  {
               throw new Exception("Ce compte existe déjà!", 1);
               
              }else {
                $msg="Votre compte a bien été créé!";
              }; 
              } catch (Exception $e) {
               $msg = $e->getMessage();        
              }
       }
       else if(!(preg_match($text,$userName) && preg_match($regexPwd,$mdp) && preg_match($regexMail,$email) && preg_match($text,$fctn)))  {
        $msg="Une de vos données (au moins) ne correspond pas au format requis, réessayez!";
       }
       
       header("Location: ../View/ajout.php?msg=$msg");

}
elseif(isset($_POST["annul1"]))  {
    header("Location: ../View/ajout.php");
}




function sanitize($data)   {
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
      

?>