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
    echo $_SESSION['compteur'];
    echo "<br>Les fichiers de session se trouvent ici : ".session_save_path();
    echo "<br>Le serveur vous enverra une cookie qui contient juste un id, le lien entre votre navigateur et le serveur. Cette cookie est effacée si vous fermez la fenêtre du navigateur";
    ?>
    <br>
    <a href="./effacerSession.php">effacer session</a>
</body>
</html>