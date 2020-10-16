<?php

include_once "./Departement.class.php";

class Employe {
    public $nom;
    public $salaire;
    public Departement $departementTravaille;

    public function __construct ($nom, $salaire){
        $this->nom = $nom;
        $this->salaire = $salaire;
    }
    // injection du departementTravaille avec set
    public function setDepartementTravaille ($departementTravaille){
        $this->departementTravaille = $departementTravaille;
    }


}