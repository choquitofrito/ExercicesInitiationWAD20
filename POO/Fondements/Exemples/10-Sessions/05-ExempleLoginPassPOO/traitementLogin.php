<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "./ClientManager.php";
    // var_dump($_POST);

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
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    // vérifier si email est null car autrement il faut 
    // arreter le script (die), re-diriger ou exception

    // stocker le mot de pass
    $mot_pass = $_POST['mot_pass'];

    // 3. Chercher le client par email
    $clientManager = new ClientManager($db); // renvoie un array d'objets, même s'il contient qu'un objet
    $clients = $clientManager->selectFiltres(['email' => $email]); // possible dans une ligne...
    var_dump ($clients);
    if (empty($clients)){
        echo "Cette adresse ne correspond à aucun client";
        die(); // ou header, ou exception
    }
    // si pas vide, on continue le code : c'est certain qu'on a trouve le client
    $client = $clients[0];

    // 4. Comparer les passwords : celui du formulaire 
    // et celui de la BD
    $mot_pass_hash_bd = $client->getMot_pass();
    // Ne faites pas $client['mot_pass'] car $client n'est pas un array!!;

    // mot_pass contient la donnée du form
    if (password_verify($mot_pass, $mot_pass_hash_bd) == true) {
        // bon pass
        header("location: ./accueil.php?email=" . $email);
    } else {
        // mauvais pass
        // echo "Mot de pass incorrect"; // on ne verra JAMAIS ce message car on part de la page
        header("location: ./formulaireLogin.php?message=Mauvais pass");
        
        // redirigez vers login, page erreur, utiliser ajax.....
    }
    


    ?>
</body>

</html>