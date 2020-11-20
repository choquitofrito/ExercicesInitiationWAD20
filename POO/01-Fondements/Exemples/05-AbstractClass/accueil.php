<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "./Chien.class.php";
        include_once "./Chat.class.php";
        
        $chien1 = new Chien("Lassie",12);
        $chat1 = new Chat ("Azrael", 5);
        $chien1->ramenerBalle();
        $chat1->griffer();
        $chien1->cri();
        $chat1->cri();
        $chien1->manger();


    ?>
</body>
</html>