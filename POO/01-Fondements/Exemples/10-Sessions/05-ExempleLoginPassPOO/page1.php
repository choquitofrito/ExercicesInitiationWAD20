<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    Page 1 du contenu du site
    <?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("location: ./formulaireLogin.php");
    } else {
        echo $_SESSION['email'];
    }

    // on va accèder à un objet stocké dans la session, juste pour essayer
    $unClient = $_SESSION['clientObjet'];
    echo "<br>Vous habitez: " . $unClient->getAdresse();

    ?>
</body>

</html>