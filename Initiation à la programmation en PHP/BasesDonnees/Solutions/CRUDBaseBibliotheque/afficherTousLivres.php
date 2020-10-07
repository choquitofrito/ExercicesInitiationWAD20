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
    try {
        // créer une connexion à la BD
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
        
    }
    catch(Exception $e){
        echo "Il a eu une erreur";
        echo $e->getMessage(); // seulement en dev!!!!
    }
    
    function division ($a, $b){ 
        if ($b == 0){
            throw new Exception ("On ne peut pas diviser par zéro");
        }
        else {
            $div = $a / $b;
            return $div;
        }
    };
    
    try {
        echo "<br>".division (5,4);
        echo "<br>".division (10,3);
        echo "<br>".division (10,0);
    }
    catch (Exception $e){
        echo "<h5>Erreur grave</h5>";
        // echo $e->getMessage();
        header("location: http://www.lesoir.be");
    }

    ?>    
</body>
</html>


