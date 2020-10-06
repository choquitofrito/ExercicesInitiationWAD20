<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "./config/db.php";
    // créer une connexion à la BD
    $db= new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.
                ';charset='.DBCHARSET, DBUSER, DBPASS); 

    // $db = new PDO ("mysql:host=localhost;port=3360;dbname=faketrains;charset=utf8","root","");

    var_dump ($db);

    ?>
</body>
</html>