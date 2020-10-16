<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Bonjour, bienvenue à notre site!";

    // $arr1 = [4, 9, 15];
    // $arr1bis = ['Alessia', 'Joanna'];

    // echo $arr1[2];

    // $arr2 = [
    //     'age' => 27,
    //     'hobby' => 'lire',
    //     'nationalite' => 'Belge'
    // ];
    // echo $arr2['hobby'];
    // echo $arr2[2]; // la clé 2 n'existe pas!!
    
    echo "<br>";
    echo "Votre nom: " . $_POST['nom'];
    echo "<br>";
    echo "Votre prénom: " . $_POST['prenom'];
    
    

    ?>
</body>

</html>