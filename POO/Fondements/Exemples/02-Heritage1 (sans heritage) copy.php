<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class LecteurDVD {
        public $marque;
        public $vitesseLecture;

        public function __construct($marque,$vitesseLecture)
        {
            $this->marque = $marque;
            $this->vitesseLecture = $vitesseLecture;
        }
    }
    
    class LecteurGraveurDVD {
        public $marque;
        public $vitesseLecture;
        public $vitesseEnregistrement;

        public function __construct($marque,$vitesseLecture, $vitesseEnregistrement)
        {
            $this->marque = $marque;
            $this->vitesseLecture = $vitesseLecture;
            $this->vitesseEnregistrement = $vitesseEnregistrement;
        }
    }
    
    $l1 = new LecteurDVD("Hitachi", 600);
    $e1 = new LecteurGraveurDVD("Sony", 600,400);

    var_dump ($l1);
    var_dump ($e1);

    // Création d'une classe de base

    



    ?>
</body>
</html>