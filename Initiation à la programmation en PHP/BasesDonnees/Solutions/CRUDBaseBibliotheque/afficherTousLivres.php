<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de tous les livres</title>
</head>
<body>
<?php
    include "./config/db.php";
    try {
        // créer une connexion à la BD
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
    }
    catch(Exception $e){
        echo "Il a eu une erreur";
        echo $e->getMessage(); // seulement en dev!!!!
        die();
    }
    echo $titre;

    echo "<input type='text' name='nom'>$titre
    
?>    
</body>
</html>
