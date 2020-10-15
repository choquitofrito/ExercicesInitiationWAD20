<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "./Employe.class.php";
    require_once "./Manager.class.php";
    require_once "./Departement.class.php";

    $employe1 = new Employe ("Nur",30000);
    $employe2 = new Employe ("Camille",3000);
    $employe3 = new Employe ("Joanna",3000);
    $departement = new Departement("Programmation");

    // du côté Departement -> employés qui travaillent
    $employes = [$employe1,$employe2, $employe3];
    $departement->setArrayEmployes($employes);
    
    $employe4 = new Employe ("Thao",10000);
    $departement->rajouterEmploye($employe4);
    var_dump ($departement);
    // du côté Departement -> manager qui gére

    $manager1 = new Manager ("Gloria",90000);
    $departement->setManagerDepartement($manager1);

    



    ?>
</body>
</html>