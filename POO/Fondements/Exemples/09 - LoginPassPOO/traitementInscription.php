<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // var_dump($_POST);
    
    include "./ClientManager.php";

    // 0. Connecter à la BD

    include "./config/db.php";
    // créer une connexion à la BD
    try {
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
    } catch (Exception $e) {
        echo "Erreur";
        die();
    }

    // 1. Vérifier si le client existe déjà
    // EXO!
    // 1.1. Chercher par mail le Client
 

    // 2. Vérifier passwords pareils (du form, pas avec la BD)
    $mot_pass = $_POST['mot_pass'];
    $mot_pass_copy = $_POST['mot_pass_copy'];
    if ($mot_pass != $mot_pass_copy){
        echo "Les passwords ne coincident pas";
        die();
        // header ("location: ....")
    } 
    // 3. Hasher le password
    $mot_pass_hash = password_hash($mot_pass, PASSWORD_DEFAULT, ['cost'=>12]);
    // 4. Créer une requête INSERT
    var_dump ($mot_pass_hash);

    // prendre les données du formulaire et les stocker dans de variables
    // pour les filtrer après (pas fait encore)
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    
    // 5. Lancer la requête
    $clientManager = new ClientManager($db);
    // $nouveauClient = new Client()
    var_dump ($_POST);



    ?>
</body>

</html>