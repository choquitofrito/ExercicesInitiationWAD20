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

    $departement = new Departement("Analyse");
    var_dump ($departement);
    $manager = new Manager ("Shin Yu",5000);
    var_dump ($manager);
    $manager->setDepartementGere($departement);
    var_dump ($manager);
    $departement->setManagerDepartement($manager);


    ?>
</body>
</html>