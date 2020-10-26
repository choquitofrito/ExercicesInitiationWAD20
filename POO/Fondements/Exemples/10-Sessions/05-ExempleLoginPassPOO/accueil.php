<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Bienvenue au site, voici l'accueil, 
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header ("location: ./formulaireLogin.php");   
    // echo "<a href='./formulaireLogin.php'>Login encore</a>";
}
else {
    echo $_SESSION['email'];
}



?>
<br>
<a href="./page1.php">Page 1</a>
<a href="./page2.php">Page 2</a>
</body>
</html>