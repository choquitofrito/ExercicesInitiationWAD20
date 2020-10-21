<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    var_dump($_POST);
    
    // 1. Connecter à la BD
    include "./config/db.php";
    // créer une connexion à la BD
    try {
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
    } catch (Exception $e) {
        echo "Erreur";
        die();
    }

    // 2. Obtenir l'email et le mot de pass
    $email = $_POST['email'];
    $mot_pass = $_POST['mot_pass'];

    // 3. Chercher le client par email
    $sql = "SELECT * FROM client WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":email",$email);
    $stmt->execute();
    
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump ($clients);
    
    // 4. Comparer les passwords : celui du formulaire 
    // et celui de la BD
    if (!empty ($clients)){
        $mot_pass_hash_bd = $clients[0]['mot_pass'];

        if (password_verify ($mot_pass, $mot_pass_hash_bd)==true){
            // bon pass
            header ("location: ./accueil.php");
        }
        else { 
            // mauvais pass
            echo "Mot de pass incorrect";
            die();
            // redirigez vers login, page erreur, utiliser ajax.....
        }
    }
    else {
        // il n'y a pas de client avec cet email
        echo "Client pas trouvé";
        die();
        // re-dirigez vers la page de login ou autre

        die();
    }


    ?>
</body>

</html>