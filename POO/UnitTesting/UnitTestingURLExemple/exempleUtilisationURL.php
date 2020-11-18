<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    require "./src/URL.php";

    $url = new URL();
    echo $url->preparerURL ("www.vive/la!v/ie!");
    echo "<br>".$url->preparerURL ("sncb.be");
    echo "<br>".$url->preparerURL ("http://DASOIADSF#$3--adsf.com!");
?>    
</body>
</html>
