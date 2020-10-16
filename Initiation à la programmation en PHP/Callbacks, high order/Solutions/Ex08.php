<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function afficheElemsArray($unArray)
    {
        foreach ($unArray as $val) {
            echo "<br>" . $val;
        }
    }
    afficheElemsArray([10,20,30]);

    ?>


</body>

</html>