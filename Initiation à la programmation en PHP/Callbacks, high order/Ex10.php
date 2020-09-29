<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // cet exemple est plus difficile à comprendre
    // mais se rapproche beaucoup à la méthode array_map
    // qui existe aussi dans JS (.map())

    function parcourirGenereArray ($unArray, $fonctionARealiser)
    {
        $nouveauTableau = [];
        foreach ($unArray as $val) {
            $nouveauTableau[] = $fonctionARealiser($val);
            // echo "<br>"; // pas d'affichage! 
            // les callbacks renvoient de valeurs, n'affichent rien
        }
        // on renvoie un nouvel array
        return $nouveauTableau;
    }

    $fois10 = function ($val) {
        return $val * 10;
    };
    $capitalize = function ($val) {
        return ucfirst($val);
    };

    $tabFois10 = parcourirGenereArray([10, 30, 40], $fois10);
    $tabCapitalize = parcourirGenereArray(['vin', 'fromage', 'chocolat'], $capitalize);
    var_dump ($tabFois10);
    var_dump ($tabCapitalize);

    ?>
</body>

</html>