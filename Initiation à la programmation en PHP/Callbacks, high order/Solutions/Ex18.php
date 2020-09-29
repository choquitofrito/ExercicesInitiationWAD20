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

    // on va créer le callback inline, en plus d'une variable externe à la fonction pour choisir le type.
    // ça ne sert à rien de rajouter un paramètre de la forme "function ($lien, $type)" car 
    // array_filter il fait appel à la fonction en lui envoyant uniquement l'élément de l'array, 
    // pas d'autres choses. 
    // mais on peut définir le type dans un scope externe (dans ce cas dans le code principal) :


    // plus besoin : $typeRecherche = ".png"; 
    // pas de variables globales extra, code plus propre et moins de risques

    $filtreArrayPerso = function ($tab, $typeRecherche){
        $tabType = array_filter ($tab, function ($lien) use ($typeRecherche)  {
            if (mb_strpos($lien, $typeRecherche)) {
                return true;
            }
            else {
                return false;
            }
        });
        // n'oubliez pas de le renvoyer
        return $tabType;
    };

    $tabJPGs = $filtreArrayPerso ($tab, ".jpg");
    var_dump ($tabJPGs);
    $tabPNGs = $filtreArrayPerso ($tab, ".png");
    var_dump ($tabPNGs);

    ?>
</body>

</html>