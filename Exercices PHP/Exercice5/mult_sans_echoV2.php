<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplications Version2</title>
    <link rel="stylesheet" href="mult.css">
</head>

<body>
    <h1>Tables de multiplication</h1>
    <table>
        <?php for ($i = 1; $i < 11; $i++) : ?>
        <tr>
            <?php for ($j = 1; $j < 11; $j++) : ?>
            <td><?= $i * $j ?></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
</body>