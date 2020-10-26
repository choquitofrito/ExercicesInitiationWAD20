<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    echo "Bienvenue, ";
    echo $_SESSION['nom']; // variable qui a été créé dans une autre page
    echo "<br>Je suis dans une autre page, autre contenu du site<br>Voici le panier:<br>";

    // afficher une variable de session (panier)
    var_dump ($_SESSION['panier']);
    // afficher le contenu total de la session
    var_dump ($_SESSION);


    ?>
</body>
</html>