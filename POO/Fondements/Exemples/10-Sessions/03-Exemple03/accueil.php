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

    if (!isset($_SESSION['compteur'])){
        $_SESSION['compteur'] = 0; // on stocke la variable compteur dans la session
                            // ET on la met à 0
    }
    // la première fois il n'y a pas d'incrémentation si je met un else
    else {
        $_SESSION['compteur']++; // on incrémente la variable
    }
    ?>
    <a href="./autrePage.php">autre</a>
    <br>
    <a href="./effacerSession.php">effacer session</a>
</body>
</html>