<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include "Livre.php";
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

    $l1 = new Livre([
        // 'id' => 1,
        'titre' => 'Coucou',
        'prix' => 22,
        'isbn' => '233242342344'
    ]);
    var_dump ($l1);


    ?>
</body>

</html>