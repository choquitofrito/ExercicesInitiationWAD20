<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class LecteurDVD
    {
        public $marque;
        public $vitesseLecture;

        public function __construct($marque, $vitesseLecture)
        {
            $this->marque = $marque;
            $this->vitesseLecture = $vitesseLecture;
        }

        public function lireDVD()
        {
            echo "<br>Je lis un DVD";
        }
    }

    class LecteurGraveurDVD
    {
        public $marque;
        public $vitesseLecture;
        public $vitesseEnregistrement;

        public function __construct($marque, $vitesseLecture, $vitesseEnregistrement)
        {
            $this->marque = $marque;
            $this->vitesseLecture = $vitesseLecture;
            $this->vitesseEnregistrement = $vitesseEnregistrement;
        }

        public function lireDVD()
        {
            echo "<br>Je lis un DVD";
        }

        public function enregistrerDVD()
        {
            echo "<br>J'enregistre un DVD";
        }
    }

    $l1 = new LecteurDVD("Hitachi", 600);
    $e1 = new LecteurGraveurDVD("Sony", 600, 400);
    $l1->lireDVD();
    $e1->lireDVD();
    $e1->enregistrerDVD();
    var_dump($l1);
    var_dump($e1);






    ?>
</body>

</html>