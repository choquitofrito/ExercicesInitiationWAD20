<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "Avion.class.php";
    include_once "Hydravion.class.php";
    include_once "Voiture.class.php";
	include_once "Bateau.class.php";
    
    $v1 = new Voiture ("Mazda", 1500);
    $h1 = new Hydravion ("Alessia Co.",8000);
    $a1 = new Avion ("Boeing 757",20000);
	$b1 = new Bateau ("Titanic and CO.",20000);
    $v1->rouler();
    $h1->voler();
    $h1->naviguer();
    $a1->voler();
	$b1->naviguer();
	

    

    ?>
</body>
</html>