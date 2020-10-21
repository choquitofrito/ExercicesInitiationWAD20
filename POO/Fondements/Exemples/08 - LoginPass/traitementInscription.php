<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        var_dump ($_POST);
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
    

        // 2. Vérifier passwords pareils (du form, pas avec la BD)

        // 3. Hasher le password

        // 4. Créer une requête INSERT


        // 5. Lancer la requête

    ?>
</body>
</html>