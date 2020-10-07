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
    $villeDepart = "%".$_POST['villeDepart']."%"; // filter_vars
    $villeDepart = strtoupper($villeDepart);
    
    $sql = "SELECT * FROM trains WHERE villeDepart LIKE :villeDepart";

    
    var_dump ($sql);

    $stmt = $db->prepare($sql); // envoyer la requête au serveur
    $stmt->bindParam (":villeDepart",$villeDepart);    
    
    $stmt->execute(); // lancer la requête

    $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC); // créer un array qui contient des arrays assoc

    var_dump ($arrayResultat);


    // attention à ce qu'on passe à bindParam (référence)
    function changeNomFake ($unNom){
        $unNom = "Lucy";
        echo $unNom;
    }
    $n = "Sophie";
    changeNomFake ($n); 
    // echo $n; // Sophie
    changeNomFake ("Luna");

    function changeNom (&$unNom){
        $unNom = "Lucy";
    }
    $n = "Sophie";
    changeNom ($n);
    // changeNom ("Luna"); // erreur car le param est par référence



    ?>
</body>
</html>