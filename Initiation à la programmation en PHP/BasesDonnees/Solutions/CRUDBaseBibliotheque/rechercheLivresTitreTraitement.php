<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // afficher les résultats de la recherche par titre
    include "./config/db.php";
    try {
        // créer une connexion à la BD
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
    } catch (Exception $e) {
        echo "Il a eu une erreur";
        echo $e->getMessage(); // seulement en dev!!!!
        die();
    }

    $titre = $_POST['titre'];
    $sql = "SELECT * FROM livre WHERE titre LIKE '%" . $titre . "%'";
    // $sql  = "SELECT * FROM livre WHERE titre LIKE $titre";
    $objetrequete = $db->prepare($sql);
    $objetrequete->execute();

    $arrayResultat = $objetrequete->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < count($arrayResultat); $i++) {
        foreach ($arrayResultat[$i] as $key => $value) {
            echo "$key : $value <br>";
        }
    }

    // var_dump($arrayResultat);


    ?>
</body>

</html>