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

    $isImageJpg = function ($lien) {
        if (mb_strpos($lien, ".jpg")) {
            return true;
        }
        else {
            return false;
        }
    };

    $tabJPG = array_filter ($tab, $isImageJpg);
    var_dump ($tabType);

    ?>
</body>

</html>