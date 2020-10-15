<?php 

include_once "./Manager.class.php";

class Departement {
    public $nom;
    public Manager $managerDepartement;

    public function __construct ($nom, Manager $managerDepartement){
        $this->nom = $nom;
        $this->managerDepartement = $managerDepartement;
    }
    // public function setManagerDepartement (Manager $managerDepartement){
    //     $this->managerDepartement = $managerDepartement;
    // }
}