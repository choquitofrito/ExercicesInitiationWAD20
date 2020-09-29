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

    // on va créer le callback inline, sans passer par une variable. 
    // on a qu'à incruster le code dans l'appel à array_filter. 
    // Cette facón d'envoyer les fonctiones en paramètre et de les coder dans 
    // un appel est très habituelle
    // Attention aux accolades et parenthéses!

    $tabJPG = array_filter ($tab, function ($lien) {
        if (mb_strpos($lien, ".jpg")) {
            return true;
        }
        else {
            return false;
        }
    });
    var_dump ($tabJPG);

    ?>
</body>

</html>