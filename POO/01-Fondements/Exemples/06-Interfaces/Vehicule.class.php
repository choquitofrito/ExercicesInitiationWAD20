<?php

class Vehicule {
    public $modele;
    public $poids;

    public function __construct ($modele, $poids){
        $this->modele = $modele;
        $this->poids = $poids;
    }
    public function demarrer(){
        echo "<br>Je demarre";

    }


}