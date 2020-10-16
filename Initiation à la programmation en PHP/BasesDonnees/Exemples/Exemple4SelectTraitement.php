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

    // prise de données d'un formulaire
    $villeDepart = $_POST['villeDepart']; // filter_vars
    $villeDestination = $_POST['villeDestination'];

    $sql = "SELECT * FROM trains WHERE villeDepart=:villeDepart AND villeDestination=:villeDestination";

    var_dump ($sql);

    $stmt = $db->prepare($sql); // envoyer la requête au serveur
    $stmt->bindParam (":villeDepart",$villeDepart);    
    $stmt->bindParam (":villeDestination",$villeDestination);    
    
    
    $stmt->execute(); // lancer la requête

    $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC); // créer un array qui contient des arrays assoc

    var_dump ($arrayResultat);


    ?>
</body>
</html>