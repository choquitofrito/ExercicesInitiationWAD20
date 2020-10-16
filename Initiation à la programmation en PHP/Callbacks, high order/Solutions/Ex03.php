<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $afficheMajs = function ($tableauStrings){
        foreach ($tableauStrings as $unString){
            echo "<br>".mb_strtoupper ($unString)."<br>";
        }
    };

    $tab = ['pizza', 'pasta', 'pierogi','cous cous','frites','chocolat'];
    $afficheMajs ($tab);
    ?>
</body>

</html>