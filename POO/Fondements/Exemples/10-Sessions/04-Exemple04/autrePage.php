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

    var_dump ($_SESSION);
    ?>
    <br>
    <a href="./effacerSession.php">effacer session</a>
</body>
</html>