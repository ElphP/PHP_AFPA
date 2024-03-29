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
        <?php for ($i = 0; $i < 11; $i++) : ?>
            <?php if ($i == 0) : ?> <tr class='case_claire'>
                <?php else : ?>
                <tr>
                <?php endif; ?>
                <?php for ($j = 0; $j < 11; $j++) : ?>
                    <?php if ($i == 0) : ?>
                        <td class='case_claire'> <?= $j  ?></td>
                    <?php else : ?>
                        <?php if ($j == 0) : ?>
                            <td class='case_claire'> <?= $i  ?></td>
                        <?php else : ?>
                            <td><?= $i * $j ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>
                </td>
                </tr>
            <?php endfor; ?>
    </table>
</body>