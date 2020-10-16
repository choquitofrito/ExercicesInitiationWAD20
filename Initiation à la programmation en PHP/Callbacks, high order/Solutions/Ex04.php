<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $creerAssoc = function ($tabCles, $tabVals) {
        if (count($tabCles) != count($tabVals)) {
            return NULL;
        } else {
            $newTab = [];
            for ($i = 0; $i < count($tabCles); $i++) {
                $newTab[$tabCles[$i]] = $tabVals[$i];
            }
            return $newTab;
        }
    };

    $tabCles = ['nom', 'prénom', 'profession', 'hobby'];
    $tabVals = ['Groening', 'Matt', 'scénariste', 'dessiner'];
    $tabAssoc = $creerAssoc($tabCles, $tabVals);

    // la fonction is_null compare avec null 
    if ($tabAssoc != NULL) {
        foreach ($tabAssoc as $key => $val) {
            echo "<br>" . $key . " : " . $val;
        }
    }

    var_dump($tabAssoc);

    ?>
</body>

</html>