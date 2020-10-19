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
    try {
        $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
        ';charset=' . DBCHARSET, DBUSER, DBPASS);
    }
    catch (Exception $e){
        echo "Erreur";
        die();
    }
    include_once "Livre.php";
    include_once "LivreManager.php";


    // $l1 = new Livre (1,"Coucou",45.... etc...)
    // $l1 = new Livre (,,45.... etc...) // non!
    // $l1 = new Livre([
    //     'id' => 1,
    //     'titre' => 'Coucou',
    //     'prix' => 22
    // ]);

    // $l2 = new Livre([
    //     'titre' => 'Coucou'
    // ]);

    // $l2->hydrate(['id' => 2,
    //         'prix' => 22]);

    // créer un objet
    // $l1 = new Livre([
    //     // 'id' => 1,
    //     'titre' => 'Coucou',
    //     'prix' => 22,
    //     'isbn' => '233242342344'
    // ]);
    // var_dump($l1);

    // $l1->setTitre("Lala");
    // $l1->setIsbn(324234234);
    // $l1->setPrix(22);
    // trop long!!!

    // si on veut changer un objet déjà créé
    // $l1->hydrate([
    //     'titre' => 'Lala',
    //     'prix' => 22
    // ]);






    ?>
</body>

</html>