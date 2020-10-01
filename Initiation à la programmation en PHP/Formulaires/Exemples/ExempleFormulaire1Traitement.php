<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        var_dump ($_POST);
        echo "La ville choisie est : ". $_POST['choixRadio'];
        echo "<img src='chat.jpg'>";


    ?>
    <a href= "./ExempleFormulaire1.php">Re-essayer</a>
</body>

</html>