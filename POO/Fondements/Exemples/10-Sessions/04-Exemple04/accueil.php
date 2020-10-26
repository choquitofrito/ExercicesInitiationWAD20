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
    // choix possibles du magasin
    $produits = ['IPhone', 'Galaxy', 'Écran'];

    // vérifier si la variable de session existe et l'initialiser
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }
    // modifier la variable de session
    $produitChoisi = $produits[mt_rand(0, 2)];
    $_SESSION['panier'][] = $produitChoisi;


    ?>

    <a href="./autrePage.php">autre</a>
    <br>
    <a href="./effacerSession.php">effacer session</a>
</body>

</html>