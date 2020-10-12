<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // 1. simple, pas get ni set ni constructeur
    class Personne
    {
        public $nom;
        public $prenom;
    }
    $p1 = new Personne();
    $p1->nom = "Liu";
    $p1->prenom = "Lucy";
    echo $p1->nom;
    echo $p1->prenom;


    // 2. simple, sans constructeur mais avec get et set
    class PersonneGS
    {
        private $nom;
        private $prenom;
        
        public function getNom()
        {
            return $this->nom;
        }
        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        public function getPrenom()
        {
            if ($this->prenom == null){
                throw new Exception ("prenom is null");
            } // sans else, juste pour montrer
            return $this->prenom;
        }

        public function setPrenom($prenom)
        {
            if (mb_strlen($prenom)>10){
                throw new Exception ("prenom too long");
            }
            else {
                $this->prenom = $prenom;
            }
        }
    }
    $p2 = new PersonneGS();
    // $p2->nom = "Cuqui"; // pas possible car private
    // echo $ps2->nom ; // pas possible car private
    
    $p2->setNom ("Delacroix");
    $p2->setPrenom ("Sophie");
    echo $p2->getPrenom();
    echo $p2->getNom();
    var_dump ($p1);
    var_dump($p2);


    // 3. Simple, mais avec un constructeur
    class PersonneC {
        private $nom;
        private $prenom;
        
        public function __construct($nom = "", $prenom = "")
        { 
            $this->nom = $nom;
            $this->prenom = $prenom;            
        }

        public function getNom()
        {
            return $this->nom;
        }
        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        public function getPrenom()
        {
            if ($this->prenom == null){
                throw new Exception ("prenom is null");
            } // sans else, juste pour montrer
            return $this->prenom;
        }

        public function setPrenom($prenom)
        {
            if (mb_strlen($prenom)>10){
                throw new Exception ("prenom too long");
            }
            else {
                $this->prenom = $prenom;
            }
        }
    }

    $p2 = new PersonneC("Scorsese", "Martin");
    var_dump ($p2);
    $p3 = new PersonneC("Scorsesi", "Martina");
    $p4 = new PersonneC("Coppola", "Francis");
    $p4->setNom("Lala");
    echo $p4->getPrenom();







    ?>
</body>

</html>