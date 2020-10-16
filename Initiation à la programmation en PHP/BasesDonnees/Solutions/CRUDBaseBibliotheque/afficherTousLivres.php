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
        die();
    }

    $sql = "SELECT id,titre, prix, description , date_publication, isbn, auteur_id FROM livre";
    $objetRequete = $db->prepare($sql);
    $objetRequete->execute();
    $arrayResultat = $objetRequete->fetchAll(PDO::FETCH_ASSOC);



    for ($i = 0; $i < count($arrayResultat); $i++) {
        foreach ($arrayResultat[$i] as $key => $value) {
            echo $key.":".$value."<br>";
        }
        echo "<br>";
    }

    ?>
</body>

</html>