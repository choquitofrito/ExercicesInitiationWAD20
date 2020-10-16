<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $isImageType = function ($lien, $type) {
        if (mb_strpos($lien, $type)) {
            return true;
        }
        else {
            return false;
        }
        // essayez avec l'opérateur ternaire si vous voulez
    };
    
    if ($isImageType ('Yevgeny Zamiatin.jpg', '.jpg')){
        echo "<br>Il s'agit d'une image .jpg";
    }
    else {
        echo "<br>Ce n'est pas un .jpg";
    }


    // la fonction array_sum fait exactement la même chose, 
    // mais c'est bon de savoir un peu d'algorithmique!
    // https://www.php.net/manual/fr/function.array-sum.php
    ?>
</body>

</html>