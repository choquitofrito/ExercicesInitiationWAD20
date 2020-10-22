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
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    // vérifier si email est null car autrement il faut 
    // arreter le script (die), re-diriger ou exception

    // stocker le mot de pass
    $mot_pass = $_POST['mot_pass'];

    // 3. Chercher le client par email
    $clientManager = new ClientManager($db);
    $client = $clientManager->selectFiltres(['email' => $email]);

    var_dump($client);
    die();

    // 4. Comparer les passwords : celui du formulaire 
    // et celui de la BD
    if (!empty($clients)) {
        $mot_pass_hash_bd = $clients[0]['mot_pass'];

        if (password_verify($mot_pass, $mot_pass_hash_bd) == true) {
            // bon pass
            header("location: ./accueil.php?email=" . $email);
        } else {
            // mauvais pass
            echo "Mot de pass incorrect";
            die();
            // redirigez vers login, page erreur, utiliser ajax.....
        }
    } else {
        // il n'y a pas de client avec cet email
        echo "Client pas trouvé";
        die();
        // re-dirigez vers la page de login ou autre

        die();
    }


    ?>
</body>

</html>