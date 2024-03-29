


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice2</title>
</head>

<body>

    <?php
    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";

    $jours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
    $mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    ?>

    <h3> En ce
        <?= getdate()["mday"] . " " . $mois[getdate()["mon"] - 1] ?>, sur le serveur localhost il est
        <?php echo getdate()["hours"] . " h " . getdate()["minutes"] . " mn." ?>
    </h3>
    <br><br>

    <h2>Voici quelques données de l'environnement....</h2>

    <h2>method getenv()</h2>
    <table border="1">
        <thead>
            <td>variable</td>
            <td>valeur</td>
        </thead>
        <?php foreach (getenv()  as $index => $value) {
            echo "<tr><td>$index</td><td <td >$value</td></tr>";
        } ?>
    </table>
    <br><br>
    <h2>Variable $_SERVER</h2>
    <table border="1">
        <thead>
            <td>variable</td>
            <td>valeur</td>
        </thead>
        <?php foreach ($_SERVER as $index => $value) {
            echo "<tr><td>$index</td><td <td >$value</td></tr>";
        } ?>
    </table>
</body>

</html>