<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    require_once  "./LecteurDVD.class.php";
    require_once  "./LecteurGraveurDVD.class.php";
 
    $l1 = new LecteurDVD("Sony", 400);
    $le1 = new LecteurGraveurDVD("Sony", 400,300);
    $l1->lireDVD();
    $le1->lireDVD();
    $le1->enregistrerDVD();
    
    var_dump ($l1);
    var_dump ($le1);

    $a = new AppareilDVD("Sony",900);
    var_dump ($a);
    
    // require_once "./AppareilDVD.class.php";

   
  

 
    




    ?>
</body>
</html>