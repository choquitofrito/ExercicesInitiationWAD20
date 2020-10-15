<?php 

include_once "./Employe.class.php";

class Manager extends Employe {
    public Departement $departementGere;
    public function __construct($nom, $salaire){
        parent::__construct ($nom,$salaire);
    }
    // injection de dépendances avec un set
    public function setDepartementGere (Departement $departementGere){
        $this->departementGere = $departementGere;
    }
}

