<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "Animal.class.php";
    require_once "Chat.class.php";
    $animal = new Animal();
    $chat = new Chat();
    var_dump ($animal);
    var_dump ($chat);

    // $animal->respirer();
    // $chat->respirer();
    
    $chat->useRespirer(); 
    // $animal->respirer(); // plante car protected
    // $chat->respirer(); // plante car protected même si hérité
  
    ?>
    
</body>
</html>