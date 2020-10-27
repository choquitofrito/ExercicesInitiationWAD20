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
    function createCb ($typeRecherche)  {
        // on renvoie une fonction personnalisée pour le type de recherche
        // Le use lie le type de recherche à cette fonction qu'on renvoie
        // plus d'info ici : 
        // https://stackoverflow.com/questions/5482989/php-array-filter-with-arguments/5483102#5483102
        return function ($lien) use ($typeRecherche) {
            if (mb_strpos($lien, $typeRecherche)) {
                return true;
            }
            else {
                return false;
            };
        } ;
    };

    $filtreArrayPerso = function ($tab, $typeRecherche) {
        // createCb (qui reçoit le type) 
        // renvoie une fonction contenant déjà le type de recherche
        // fixé. Cette fonction qu'on n'a même pas stocké dans une variable
        // reçoit juste un paramètre (le lien)
        // Et c'est cette fonction qui est alors appelée par array_filter
        // pour chaque élément de l'array
        $tabType = array_filter ($tab, createCb ($typeRecherche));
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