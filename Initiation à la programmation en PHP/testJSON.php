<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // une fonction qui crée un nouvel array et le renvoie (pas d'affichage)
    function fois2($arr)
    {
        $nouvelArray = [];
        foreach ($arr as $val) {
            $nouvelArray[] = $val * 2;
        }
        return $nouvelArray;
    }
    $unArray = [4, 4, 3, 3];
    $arrayFois2 = fois2($unArray);
    var_dump ($arrayFois2);


    $unArray = [4, 5, 7];
    var_dump($unArray);

    echo json_encode($unArray);
    echo "<br>";
    $personne = [
        'nom' => 'Dupont',
        'prenom' => 'Jeanne'
    ];

    echo json_encode($personne);
    echo "<br>";
    $personne1 = [
        'nom' => 'Hermant',
        'prenom' => 'Jeanne'
    ];
    $personne2 = [
        'nom' => 'De la Lumière',
        'prenom' => 'Jeanne'
    ];
    echo "<br>";
    $personnes = [$personne1, $personne2];
    echo json_encode($personnes);


    ?>
</body>

</html>