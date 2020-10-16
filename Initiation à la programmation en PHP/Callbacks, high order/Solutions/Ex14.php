<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $tab = [ 22, -21, -45, 2, -8, 11 ];

    $estPaire = function ($val) {
        // utilisons l'opérateur ternaire
        // https://davidwalsh.name/php-shorthand-if-else-ternary-operators
        return ( ($val % 2 == 0 && $val < 0) ? true : false);
    // on peut simplifier l'opération précedante encore plus. Savez vous comment le faire?
    };

    $tabPairs = array_filter ($tab, $estPaire);
    var_dump ($tabPairs);

    ?>
</body>

</html>