<?php

class Voiture {
	public $marque;
	public $modele;
	public $vitesse;
	
	public function demarrer(){
		echo "romrommmm je demarre!!";
		return true;
	}
	
	
	public function changerVitesse($nouvelleVitesse){
		if ($nouvelleVitesse<=6 && $nouvelleVitesse>0){
			$this->vitesse= $nouvelleVitesse;
			echo "On change la vitesse: ".$nouvelleVitesse;
			return true;
		}
		else {
			$this->vitesse=null;
		}
	}
}

// $v1= new Voiture();
// $v1->demarrer();
// $v1->changerVitesse(4);
// $v1->changerVitesse(9);

