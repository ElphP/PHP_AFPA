<?php   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de bienvenue</title>
</head>
<body>
    <h1>Hey !  Bienvenue sur ce site...</h1>
    <h4>Je vois que vous avez pu accéder à ce site...</h4>
    <p>C'est donc que votre email correspondait au mot de passe enregistré...(I hope so)</p>
    <p>Vous aimez les cookies?....le voici ci-dessous:</p>
    
    <p><?php
    if(isset($_COOKIE)) {
        
            echo $_COOKIE["user"];
            echo "<br> oups j'en ai trop montré! 😋";
        
    }
    else  { echo "Oups, le cookie n'existe pas!";}
    
     ?></p>
</body>
</html>