<?php
try{
    $db= new PDO (DBDRIVER.': host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME.';charset='.DBCHARSET, DBUSER, DBPASS); 
} 
catch (Exception $ex) {
    die('Erreur ; '.$ex->getMessage()); // pas en production!!
}

// $sql="SELECT * FROM concerts";
// $stmt= $db->prepare($sql);
// $stmt->execute();

// $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
// $stmt->closeCursor();