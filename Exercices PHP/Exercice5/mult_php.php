<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplications Version2</title>
    <link rel="stylesheet" href="mult.css">
</head>

<body>
    <?php
    echo "<h1>Tables de multiplication</h1>";
    echo "<table>";
    for ($i = 0; $i < 11; $i++) {
        echo (($i == 0) ?  "<tr class='case_claire'>" :  "<tr>");
        for ($j = 0; $j < 11; $j++) {
            if ($i == 0) {
                echo  "<td class='case_claire'>" . $j  . "</td>";
            } else {
                echo (($j == 0) ?  "<td class='case_claire'>" . $i  . "</td>" :  "<td>" . $i * $j . "</td>");
            }
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>