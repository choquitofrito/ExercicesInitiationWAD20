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
    // unset ($_SESSION['cle']); // efface juste une entrée 
    session_destroy(); // détruit la session, efface tout $_SESSION
    ?>
</body>
</html>