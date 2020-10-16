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
    // avec l'usine on crée de fonctions pour filtrer par type et taille maximale 
    // du lien. L'usine renvoie une fonction à chaque appel

    // attention aux deux uses. Et il y a deux paramètres cette fois!
    $factorieFiltres = function ($typeRecherche, $tailleMax){
        // on renvoie la fonction spécialisée pour un type
        return (function ($tab) use ($typeRecherche, $tailleMax) {
            $tabType = array_filter ($tab, function ($lien) use ($typeRecherche, $tailleMax)  {
                return (
                    (mb_strlen($lien) <= $tailleMax && 
                    mb_strpos($lien, $typeRecherche)) 
                    ? true : false); 
            });
            return $tabType;
        });
    };
    

    $factorieJPGLong = $factorieFiltres (".jpg", 15);
    $tabJPG = $factorieJPGLong ($tab); // observez que la fonction crééé par l'usine reçoit seulement le tableau
    var_dump ($tabJPG);


    $factorieJPGCourt = $factorieFiltres (".jpg", 9);
    $tabJPG = $factorieJPGCourt ($tab); // observez que la fonction crééé par l'usine reçoit seulement le tableau
    var_dump ($tabJPG);

    ?>
</body>

</html>