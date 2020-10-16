<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $estPaire = function ($val) {
        // utilisons l'opérateur ternaire
        // https://davidwalsh.name/php-shorthand-if-else-ternary-operators
        return ($val % 2 == 0 ? true : false);
        // on peut simplifier l'opération précedante encore plus. Savez vous comment le faire?
    };
    // aussi ici, opérateur ternaire! 
    echo "<br>";
    echo $estPaire(10) ? "La valeur est paire!" : "La valeur est impaire!";
    echo "<br>";
    echo $estPaire(11) ? "La valeur est paire!" : "La valeur est impaire!";
    ?>
</body>

</html>