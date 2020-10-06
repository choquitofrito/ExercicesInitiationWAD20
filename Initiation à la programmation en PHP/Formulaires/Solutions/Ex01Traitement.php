<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $prenom = $_POST['prenom'];

    echo "Bienvenu ". $prenom . " " . $_POST['nom'] . " vous avez ". $_POST['age']. " ans";

    ?>
</body>

</html>