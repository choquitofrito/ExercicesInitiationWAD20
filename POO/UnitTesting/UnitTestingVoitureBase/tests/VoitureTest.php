<?php

require dirname(__DIR__).'/src/Voiture.php';



use PHPUnit\Framework\TestCase;

// classe contenant les tests de la classe URL
class VoitureTest extends TestCase{

	
	// tester le comportement si la nouvelle valeur de vitesse est correcte
        // (l'attribut contiendra la nouvelle vitesse)
	public function testChangerVitesseValeurCorrecte(){
		// on crée l'objet et on appelle la méthode
                
		$voiture = new Voiture ();
		$voiture->changerVitesse(4);
		
		// on fait l'assertion: la valeur de la vitesse après l'appel doit être changée
		
		// trois arguments pour assertAttributeEquals
		// 1. la valeur attendue pour la proprieté du point suivant
		// 2. la proprieté dont on vérifie la valeur
		// 3. l'objet contenant la proprieté (on a crée un dans cette fonction pour realiser le test)
		$this->assertEquals(4,$voiture->vitesse);

		// on pourrait faire ce test en utilisant une méthode get de la classe
		// ex: getVitesse, mais on doit tester
		// chaque méthode de la classe de façon independante (une méthode de test ne doit pas appeler 
		// plusieurs méthodes de la classe qu'on teste)  
	}
	// tester le comportement la nouvelle valeur de vitesse n'est pas correcte
	// (on a décidé dans pendant le developpement de la classe que l'attribut 
	// doit contenir null si on change à une vitesse incorrecte)
	public function testChangerVitesseValeurIncorrecte(){

		$voiture = new Voiture ();
		$voiture->changerVitesse(-4);
		$this->assertEquals(null,$voiture->vitesse);
	}
}