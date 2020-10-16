<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // cet exemple n'est pas réaliste car il nous oblige 
    // à fixer la présentation du résultat (le <br> à l'intérieur de la fonction)
    // mais c'est assez facile à comprendre. 
    // l'exercice suivant est plus pratique
    function parcourirArray($unArray, $fonctionARealiser)
    {
        foreach ($unArray as $val) {
            $fonctionARealiser($val);
            echo "<br>"; // bfffffffffffffff nonono....
        }
        

    }

    $fois10 = function ($val) {
        echo $val * 10;
    };
    $capitalize = function ($val) {
        echo ucfirst($val);
    };

    parcourirArray([10, 30, 40], $fois10);
    parcourirArray(['vin', 'fromage', 'chocolat'], $capitalize);


    ?>
</body>

</html>