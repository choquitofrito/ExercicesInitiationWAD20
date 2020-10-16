<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $tab = ['biere.jpg','miammiam.jpg','loup.png','souris.png','alien.jpg','demogorgon.gif','BillyJoel.jpg','Santa Claus.gif'];

    // on va créer une usine (factory) de fonctions pour filtrer un array de liens d'image
    // avec l'usine on crée de fonctions pour filtrer par type. L'usine renvoie une fonction
    // à chaque appel

    // attention aux deux uses
    $factorieFiltres = function ($typeRecherche){
        // on renvoie la fonction spécialisée pour un type
        return (function ($tab) use ($typeRecherche) {
            $tabType = array_filter ($tab, function ($lien) use ($typeRecherche)  {
                return (mb_strpos($lien, $typeRecherche) ? true : false); // ternaire
            });
            return $tabType;
        });
    };
    

    $factorieJPG = $factorieFiltres (".jpg");
    $tabJPG = $factorieJPG ($tab); // observez que la fonction crééé par l'usine reçoit seulement le tableau. 
    var_dump ($tabJPG);
    $factoriePNG = $factorieFiltres (".png");
    $tabPNG = $factoriePNG ($tab); // observez que la fonction crééé par l'usine reçoit seulement le tableau. 
    var_dump ($tabPNG);

    ?>
</body>

</html>