<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $tabPrenoms = ['Eduard', 'Ada', 'Nikola', 'Marian'];
    $tabNoms = ['Snowden', 'Lovelace', 'Tesla', 'Rejewski'];
  
    $fusion = function ($val1, $val2){
        return ($val1 . " " . $val2);
    };
    
    $tab = array_map ($fusion, $tabPrenoms, $tabNoms);
    foreach ($tab as $val){
        echo "<br>".$val;
    }
    
    ?>
</body>

</html>