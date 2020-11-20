<?php 

include_once "./Manager.class.php";

class Departement {
    public $nom;
    public Manager $managerDepartement;

    public function __construct ($nom){
        $this->nom = $nom;
    }
    // injection de dépendances avec un set
    public function setManagerDepartement (Manager $managerDepartement){
        $this->managerDepartement = $managerDepartement;
    }
}