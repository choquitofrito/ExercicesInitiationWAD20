<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Bienvenue au magasin!</h3>
    <?php
        // On doit créer/accèder à la session à chaque fois 
        // qu'on veut stocker/lire une variable de session

        session_start(); // toujours au début. Initialiser la session

        $panier = [];

        $panier[] = "lit";
        $panier[] = "armoire";


        // array associatif $_SESSION pour stocker toutes les variables de session
        $_SESSION['nom'] = "Gloria";
        $_SESSION['panier'] = $panier;

    

        echo "Contenu du panier : <br>";
        foreach ($panier as $val){
            echo "<br>".$val;

        }

    ?>
    <br>
    <a href="./autrePage.php">autre page</a>
</body>

</html>