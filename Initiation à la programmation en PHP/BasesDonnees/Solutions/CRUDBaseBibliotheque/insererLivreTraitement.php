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

    // créer connexion à la DB
    try {
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
    }
    catch (Exception $e){
        echo "Erreur!!";
        echo $e->getMessage();
        die();
    }


    $titre = $_POST['titre'];
    $auteur_id = $_POST['auteur_id'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $date_publication = $_POST['date_publication'];
    $isbn = $_POST['isbn'];

     var_dump ($_POST);
    // die();
    
    $sql = "INSERT INTO livre (id, titre, auteur_id, prix, description, date_publication,isbn ) ".
    "VALUES (null, :titre, :auteur_id, :prix, :description, :date_publication, :isbn)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":auteur_id", $auteur_id);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":description", $description);
    // 2000-12-28, manque le time!
    $stmt->bindParam(":date_publication", $date_publication);
    $stmt->bindParam(":isbn", $isbn);



    $stmt->execute();
    var_dump($stmt->errorInfo());



    ?>
</body>

</html>