<?php 

include_once "./Employe.class.php";

class Manager extends Employe {
    public Departement $departementGere;
    public function __construct($nom, $salaire){
        parent::__construct ($nom,$salaire);
    }
    public function setDepartementGere (Departement $departementGere){
        $this->departementGere = $departementGere;
    }
}

// $m1 = new Manager ("Camille", 2000);
// $d1 = new Departement ("Marketing");
// $m1->setDepartementGere ($d1);

// $c1 = new Compte ();
// $p1 = new Personne ("Lala");
// $c1->setTitulaire ($p1);





