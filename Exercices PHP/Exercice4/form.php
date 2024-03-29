<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse</title>
</head>

<body>

    <h4>Bonjour <?= $_GET["nom"];  ?></h4>
    <p>Vous avez <?= $_GET["age"]; ?> ans, vous êtes <?php switch ($_GET["marit"]) {
                                                            case "marié":
                                                                echo "marié(e)";
                                                                break;
                                                            case "veuf":
                                                                echo "veuf(ve)";
                                                                break;
                                                            case "celib":
                                                                echo "célibataire";
                                                                break;
                                                            default:
                                                                echo "error";
                                                                break;
                                                        }  ?> et vos centres d'intérêts sont:
    <ul> <?php
            if (isset($_GET["int"])) {
                echo "<li> Internet</li>";
            }
            if (isset($_GET["inf"])) {
                echo "<li> Informatique</li>";
            }
            if (isset($_GET["jeux_video"])) {
                echo "<li> Jeux Vidéos</li>";
            }
            ?></ul>
    </p>
    <p>Je m'empresse d'envoyer la requête suivante: </p>
    <p><strong>INSERT INTO mytable VALUES
            (<?= $_GET['nom'] . " , " . $_GET['age'] . " , " . $_GET['marit'] . " , " . ((isset($_GET['int'])) ? 1 : 0) . "," . ((isset($_GET['inf'])) ? 1 : 0) . "," . ((isset($_GET['jeux_video'])) ? 1 : 0) ?>)
        </strong> <br> à notre base de données!

    </p>

</body>

</html>
