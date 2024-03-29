<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analyse de mails</title>
</head>
<body>

    <?php  
    $tab =array("php7@free.fr","sacha8@gmail.com","ariel3@wanadoo.fr","webmestre@wanadoo.fr","marcelducham9@gmail.com","picasso69@gmail.com","vangogh6@gmail.com","matis63@free.fr","degas45@wanadoo.fr");
    
    foreach($tab as $email)  {
        switch(explode("@",$email)[1])  {
            case "free.fr":
                $email_free[]=$email;
                break;
            case "wanadoo.fr":
                $email_wanadoo[]=$email;
                break;
            case "gmail.com":
                $email_gmail[]=$email;
                break;
            default:
            echo "error";
            break;
        }
    }

    function calcul_affich_Taux($email_separate, $nom_fournisseur)  {
        global $tab;
        echo "<p>Fournisseur d'accès: $nom_fournisseur = ". ((count($email_separate)/count($tab))*100) ."%</p>";
    }
    calcul_affich_Taux($email_free,"free.fr");
    calcul_affich_Taux($email_wanadoo,"wanadoo.fr");
    calcul_affich_Taux($email_gmail,"gmail.com");
    ?>


</body>
</html>