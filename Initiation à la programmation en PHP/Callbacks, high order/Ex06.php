<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $sommeArray = function ($tab) {
        $somme = 0;
        foreach ($tab as $val) {
            $somme += $val;
        }
        return $somme;
    };
    $somme = $sommeArray ([4,5,10]);
    echo "La somme: " . $somme;

    // la fonction array_sum fait exactement la même chose, 
    // mais c'est bon de savoir un peu d'algorithmique!
    // https://www.php.net/manual/fr/function.array-sum.php
    ?>
</body>

</html>