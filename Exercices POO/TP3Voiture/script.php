<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP3: Voiture</title>
</head>
<body>
    <header>
        <h1 style="text-align: center";>TP3: Voiture</h1>
    </header>
    <?php  
    require_once(__DIR__."/Classes/Voiture.php");
    $maVoiture = new Voiture("ER-206-JN","Rouge",2,9,60,5);
    $maVoiture->setAssure();
    $maVoiture->Repeindre("Verte");
    $maVoiture->Mettre_essence(54.3);
    $maVoiture->Se_deplacer(1100,51);
    $voiture2= new Voiture("BX-356-NJ","Grise",1,6,42,4);

    ?>
    <br><br>
    <div style="display: flex";>
        <div style="padding:20px">
            <p>Voiture 1</p>
            <span>Message de la voiture:</span> <h3> <?= $maVoiture->getMessage() ?> </h3>
            <?= $maVoiture ?>
           </div>
           <div style="padding:20px">
            <p>Voiture 2</p>
               <span>Message de la voiture:</span> <h3> <?= $voiture2->getMessage() ?> </h3>
               <?= $voiture2 ?>
           </div>
    </div>

<footer style="bottom: 50px; position: absolute">
    <h5 style="text-align: center; width: 100vw">POO - L-FÈJ-P - AFPA2024</h5>
    </footer>
</body>
</html>