<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./traitementLogin.php" method="POST">
        Email<input type="email" name="email"><br>
        Password<input type="password" name="mot_pass"><br>
        <input type="submit" value="Se connecter">
    </form>
    <?php
    if (isset($_GET['message'])){
        // uniquement quand l'utilisateur tape un mauvais pass
        // le paramètre URL 'message' est uniquement rempli 
        // dans "traitementLogin.php", dans le cas ou 
        // le mot de pass n'est pas correcte
        echo "Problème: ". $_GET['message'];
    }

    ?>
</body>

</html>