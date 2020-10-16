<?php 

include_once "./Manager.class.php";

class Departement {
    public $nom;
    public Manager $managerDepartement;
    public $arrayEmployes = []; // array des Employes

    public function __construct ($nom){
        $this->nom = $nom;
    }
    // injection de dépendances avec un set pour le Manager
    public function setManagerDepartement (Manager $managerDepartement){
        $this->managerDepartement = $managerDepartement;
        // $managerDepartement->setDepartementGere($this);
    }

    // injection de dépendances avec un set pour les Employes
    public function setArrayEmployes ($arrayEmployes){
        $this->arrayEmployes = $arrayEmployes;
    }
    // rajouter des employés
    public function rajouterEmploye ($unEmploye){
        $this->arrayEmployes[] = $unEmploye;
    }


    
}