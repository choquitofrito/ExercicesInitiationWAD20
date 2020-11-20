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
    // 3. prendre les données du formulaire et les stocker dans de variables
    // pour les filtrer après (pas fait encore).

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    
    // 4. Hasher le password
    $mot_pass_hash = password_hash($mot_pass, PASSWORD_DEFAULT, ['cost'=>12]);

    // 5. Filtrer les variables prises du POST
    // filtrer à la main... cauchemar!!

    // if (!mb_strpos("@", $email)){
    //     echo "Le mail n'est pas correct";
    //     die();
    //     // redirection, re-affichage...
    // }
    
    // Utilisez filter_vars, ou une librairie déjà faite
    $email = filter_var ($email,FILTER_SANITIZE_EMAIL); // enlever des caractères illegaux d'un mail
    $email = filter_var ($email,FILTER_VALIDATE_EMAIL); // verifier format adresse valide (ex: "@")
                                                        // la fonction renvoie le mail si ok

    
    // si email invalide on obtient null: il faut lancer exception ou re-diriger
    // même chose pour le reste de valeurs du form
    

    // 6. Créer l'entité à insérer après avoir appliqué les filtres 
    $client = new Client (['nom' => $nom,
                            'prenom'=> $prenom,
                            'email'=> $email,
                            'adresse' => $adresse,
                            'mot_pass'=> $mot_pass_hash]);


    // Insérer dans la BD
    $clientManager = new ClientManager($db);
    $nouveauClient = new Client($client);

    // 7. Insérer en utilisant le modèle
    $clientManager->insert($nouveauClient);

    var_dump ($nouveauClient);

    var_dump ($_POST);



    ?>
</body>

</html>