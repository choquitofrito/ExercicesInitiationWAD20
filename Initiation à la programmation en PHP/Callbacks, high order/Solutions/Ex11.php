<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $fois10 = function ($val) {
        return $val * 10;
    };
    $capitalize = function ($val) {
        return ucfirst($val);
    };

    $tabFois10 = array_map($fois10, [10, 30, 40]);
    $tabCapitalize = array_map($capitalize, ['vin', 'fromage', 'chocolat']);
    var_dump($tabFois10);
    var_dump($tabCapitalize);

    ?>
</body>

</html>