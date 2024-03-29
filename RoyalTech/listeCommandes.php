<?php

require_once("./ticket.php");
require_once("./Database.php");
$arrayListeComm =  Database::ListeComm();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
    <link rel="stylesheet" href="./style/pageStyle.css">
</head>

<body>
    <h1>Tableau des commandes</h1>
    <div class="container">
        <table>
            <th>ID_Commande</th>
            <th>ID_Client</th>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Facture</th>
            <?php
            for ($i = 0; $i < count($arrayListeComm); $i++) {
                echo "<tr>";
                foreach ($arrayListeComm[$i] as $champ => $donnee) {
                    echo "<td>" . $donnee . "</td>";
                }
                echo "<td class='link' onclick='edit($i+1)' id='$i+1'>Editer</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>




<script>
function edit(id) {
    window.open("./pdf.php?id_comm=" + id);
}
</script>
</body>

</html>