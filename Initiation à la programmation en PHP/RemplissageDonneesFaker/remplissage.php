<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Cette page remplira la BD Bibliotheque avec de données fictifs

    // https://github.com/fzaninotto/Faker

    // Si vous voulez l'utiliser facile et rapidement, suivez ce tuto
    // http://zetcode.com/php/faker/

    // Vous devez installer le logiciel Composer et connaitre un minimum la POO pour 
    // réaliser ces exemples 
    // C'est une librairie extremmement simple à utiliser et très utile

    // 0. Connexion standard à la BD
    include "./config/db.php";
    try {
        // créer une connexion à la BD
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
            ';charset=' . DBCHARSET, DBUSER, DBPASS);
    } catch (Exception $e) {
        echo "Il a eu une erreur";
        echo $e->getMessage(); // seulement en dev!!!!
    }



    // 1. Création d'un object Faker (pas de new, on utilise une Factory)
    require('vendor/autoload.php'); // permet de charger automatiquement les classes quand on les appelle
    $faker = Faker\Factory::create();

    // 2. Remplissage du tableau Client
    // adresse, nom, prenom, email

    $sql = "INSERT INTO Client (adresse,nom,prenom,email) VALUES (:adresse,:nom,:prenom,:email)";

    $stmt = null;

    for ($i = 0; $i < 100; $i++) {

        $stmt = $db->prepare($sql);

        // création de données
        $adresse = $faker->address;
        // adress, name etc.. ne sont pas proprement de méthodes, mais en accédant on fait appel à une automatiquement 
        // (méthode magique __get : https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-methode-magique/)
        // La raison de cette implementation est de s'epargner les () probablement...
        $nom = $faker->lastName;
        $prenom = $faker->firstName;
        $email = $faker->email;

        $stmt->bindValue("adresse", $adresse);
        $stmt->bindValue("nom", $nom);
        $stmt->bindValue("prenom", $prenom);
        $stmt->bindValue("email", $email);

        $stmt->execute(); // decommentez pour lancer cette ligne
        // si vous le lancez par erreur, vous pouvez toujours effacer les tableaux (TRUCATE TABLE) dans "Opérations" dans phpmyadmin
        // ou vous faire une page PHP pour effacer vos tableaux au choix!
        // echo "<br>".$adresse;
        // echo "<br>".$nom;
        // echo "<br>".$prenom;
        // echo "<br>".$email;



    }


    // 3. Remplissage du tableau Auteur
    // adresse, nom, prenom, email
    $sql = "INSERT INTO Auteur (nom,prenom,nationalite) VALUES (:nom,:prenom,:nationalite)";

    $stmt = null;

    for ($i = 0; $i < 30; $i++) {

        $stmt = $db->prepare($sql);

        // création de données
        // adress, name etc.. ne sont pas proprement de méthodes, mais en accédant on fait appel à une automatiquement 
        // (méthode magique __get : https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-methode-magique/)
        // La raison de cette implementation est de s'epargner les () probablement...
        $nom = $faker->lastName;
        $prenom = $faker->firstName;
        $nationalite = $faker->country;

        $stmt->bindValue("nom", $nom);
        $stmt->bindValue("prenom", $prenom);
        $stmt->bindValue("nationalite", $nationalite);

        $stmt->execute(); // decommentez pour lancer cette ligne
        // si vous le lancez par erreur, vous pouvez toujours effacer les tableaux (TRUCATE TABLE) dans "Opérations" dans phpmyadmin
        // ou vous faire une page PHP pour effacer vos tableaux au choix!

        // echo "<br>".$adresse;
        // echo "<br>".$nom;
        // echo "<br>".$prenom;
        // echo "<br>".$nationalite;
    }


    // 4. Remplissage du tableau Livre
    // adresse, nom, prenom, email
    $sql = "INSERT INTO Livre (titre,prix,description,date_publication,isbn,auteur_id) " .
        "VALUES (:titre,:prix,:description,:date_publication,:isbn,:auteur_id)";

    $stmt = null;

    $sqlAuteurs = "SELECT id FROM Auteur"; // on va prendre tous les Auteurs pour pouvoir affecter l'id_auteur
    $stmtAuteurs = $db->prepare($sqlAuteurs);
    $stmtAuteurs->execute();
    $arrayIdAuteurs = $stmtAuteurs->fetchAll(PDO::FETCH_ASSOC); // voici un array d'id d'Auteurs!

    for ($i = 0; $i < 300; $i++) {

        $stmt = $db->prepare($sql);

        // array random...
        $titres = [
            "Les aventures de " . $faker->firstName,
            $faker->firstName .  " va faire la fête",
            $faker->firstName . " et " . $faker->firstName . " partent à la campagne",
            mt_rand(50, 200) . " shades of Gray",
            "Asterix en " . $faker->country,
            "Le grand amour de " . $faker->firstName,
            "La guerre de " . $faker->country,
            $faker->realText(20)
            // etc...
        ];


        $titre = $titres[array_rand($titres)];
        $prix = mt_rand(10, 35);
        $description = "Bla bla bla " . $titre;
        $date_publication = $faker->date('Y-m-d');
        $isbn = mt_rand(1000000000000000, 10000000000000000 - 1);

        $indexAuteur = mt_rand(1, count($arrayIdAuteurs) - 1); // on prend un id d'un Auteur au hasard de l'array obtenu. Assurez-vous que vos
        // Auteurs commencent par l'id 1. Autrement il faut elaborer plus les requêtes.
        $auteur_id = $arrayIdAuteurs[$indexAuteur]['id'];


        $stmt->bindValue("titre", $titre);
        $stmt->bindValue("prix", $prix);
        $stmt->bindValue("description", $description);
        $stmt->bindValue("date_publication", $date_publication);
        $stmt->bindValue("isbn", $isbn);
        $stmt->bindValue("auteur_id", $auteur_id);
        $stmt->execute(); // decommentez pour lancer cette ligne

        // echo "<br>" . $titre;
        // echo "<br>" . $prix;
        // echo "<br>" . $description;
        // echo "<br>" . $date_publication;
        // echo "<br>" . $isbn;
        // echo "<br>" . $auteur_id;

        // etc...
    }
    var_dump($stmt->errorInfo());


    // 5. Remplissage du tableau Exemplaire
    // livre_id, etat
    $sql = "INSERT INTO Exemplaire (livre_id, etat) 
            VALUES (:livre_id,:etat)";

    $stmt = null;

    $sqlLivres = "SELECT id FROM Livre"; // on va prendre tous les Livres pour pouvoir affecter l'id_livre
    $stmtLivres = $db->prepare($sqlLivres);
    $stmtLivres->execute();
    $arrayIdLivres = $stmtLivres->fetchAll(PDO::FETCH_ASSOC); // voici un array d'id d'Livres!

    for ($i = 0; $i < 300; $i++) {

        $stmt = $db->prepare($sql);

        // array random pour les états
        $etats = [
            'nouveau',
            'vieux',
            'taché de café',
            'taché de Cola-cao',
            'taché de Tropico',
            'mangé par un chat',
            'mangé par une souris',
            'brûlé'
            // etc ...
        ];


        $etat = $etats[array_rand($etats)];

        $indexLivre = mt_rand(1, count($arrayIdLivres) - 1); // on prend un id d'un Livre au hasard de l'array obtenu. Assurez-vous que vos
        // Livres commencent par l'id 1. Autrement il faut elaborer plus les requêtes.
        $livre_id = $arrayIdLivres[$indexLivre]['id'];

        $stmt->bindValue("etat", $etat);
        $stmt->bindValue("livre_id", $livre_id);
        
        $stmt->execute(); // decommentez pour lancer cette ligne
        // echo "<br>" . $etat;
        // echo "<br>" . $auteur_id;

        // etc...
    }

    // 6. Remplissage du tableau Emprunt
    // client_id, exemplaire_id, date_emprunt, date_retour, commentaires
    $sql = "INSERT INTO Emprunt (client_id, exemplaire_id, date_emprunt, date_retour, commentaires) 
            VALUES (:client_id, :exemplaire_id, :date_emprunt, :date_retour, :commentaires)";

    $stmt = null;
    for ($i=0;$i<500;$i++){
    
        
        $sqlExemplaires = "SELECT id FROM Exemplaire"; // on va prendre tous les Exemplaires pour pouvoir affecter l'id_exemplaire
        $stmtExemplaires = $db->prepare($sqlExemplaires);
        $stmtExemplaires->execute();
        $arrayIdExemplaires = $stmtExemplaires->fetchAll(PDO::FETCH_ASSOC); // voici un array d'id d'Exemplaires!

        $indexExemplaire = mt_rand(1, count($arrayIdExemplaires) - 1); // on prend un id d'un Exemplaire au hasard de l'array obtenu. Assurez-vous que vos
        // Exemplaire commencent par l'id 1. Autrement il faut elaborer plus les requêtes.
        $exemplaire_id = $arrayIdExemplaires[$indexExemplaire]['id'];

        $sqlClients = "SELECT id FROM Client"; // on va prendre tous les Clients pour pouvoir affecter l'id_client
        $stmtClients = $db->prepare($sqlClients);
        $stmtClients->execute();
        $arrayIdClients = $stmtClients->fetchAll(PDO::FETCH_ASSOC); // voici un array d'id d'Clients!
        
        $indexClient = mt_rand(1, count($arrayIdClients) - 1); // on prend un id d'un Client au hasard de l'array obtenu. Assurez-vous que vos
        // Client commencent par l'id 1. Autrement il faut elaborer plus les requêtes.
        $client_id = $arrayIdClients[$indexClient]['id'];
        var_dump ($client_id);

        $date_emprunt = $faker->date("Y-m-d"); // string
        $date_retour_objet = new DateTime ($date_emprunt); // on copie la date_emprunt
        $date_retour_string = $date_retour_objet->add(new DateInterval('P15D'))->format("Y-m-d"); // increment et format
        print_r($date_emprunt);
        print_r($date_retour_objet->format("Y-m-d"));
        $commentaires = $faker->realText(80);

        $stmt = $db->prepare($sql);
        

        $stmt->bindValue(":client_id",$client_id);
        $stmt->bindValue(":exemplaire_id",$exemplaire_id);
        $stmt->bindValue(":date_emprunt",$date_emprunt );
        $stmt->bindValue(":date_retour",$date_retour_string );
        $stmt->bindValue(":commentaires",$commentaires );
        

       $stmt->execute(); // decommentez pour lancer cette ligne
    
    }




    var_dump($stmt->errorInfo());











    ?>
</body>

</html>