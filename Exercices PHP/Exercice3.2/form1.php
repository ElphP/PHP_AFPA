<?php
$tabMail=["jean_valjean@academie.net","steve_ostin@lesseries.org","david_banner@marvel.com"];
$tabMdp=["hugo","3md","hulk"]; 

if(!($_SERVER["REQUEST_METHOD"] == "POST"))  {
    $msg= "Bonjour, la saisie des champs est obligatoire pour entrer sur le site";  
}
elseif($_POST["mail"]=="" || $_POST["pwd"]=="")  {
    $msg="Vous devez renseigner les 2 champs!!";
}
else {
    $erreur=true;
    $mail=$_POST["mail"];
    $pwd=$_POST["pwd"];

    for ($i=0; $i <count($tabMail) ; $i++) { 
       if ($tabMail[$i]===$mail && $tabMdp[$i]===$pwd)  {
        $bool=false; 
        setcookie("user", "Mon cookie perso, vos infos: ".$mail.", ".$pwd);   
        header("Location: ./form2.php");
       }
    } 
    if ($erreur==true)  {
        $msg = "Email ou mot de passe incorrect!";
    } 
     
}
echo $msg;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Identification</title>
</head>
<body> <br><br>
    <form action= "<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
    <label for="mail">Email</label> 
    <input type="email" name="mail" minlength="6">
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd"> <br><br>
    <button type="submit">Valider</button>
</form>
</body>
</html>

