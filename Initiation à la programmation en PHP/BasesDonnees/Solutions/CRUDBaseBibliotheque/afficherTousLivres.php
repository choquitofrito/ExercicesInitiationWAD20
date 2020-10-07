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
    
?>