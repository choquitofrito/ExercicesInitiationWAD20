<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $chiffre1 = $_POST['chiffre1'];
        $chiffre2 = $_POST['chiffre2'];
        echo ($chiffre1 + $chiffre2) ."<br>";
        echo ($chiffre1 - $chiffre2) ."<br>";
        echo ($chiffre1 / $chiffre2) ."<br>";
        echo ($chiffre1 * $chiffre2) ."<br>";

        
    ?>

</body>
</html>