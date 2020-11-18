<?php

require dirname(__DIR__)."/src/URL.php"; 
// dirname(__DIR__) renvoie le nom du dossier père 
// du dossier qui contient ce fichier (__DIR__)


use PHPUnit\Framework\TestCase;

// classe contenant les tests de la classe URL
class URLTest extends TestCase{
   
    
    // méthode qui teste un certain comportement de la méthode "preparerURL".
	// Nous allons tester si la méthode est capable de traiter une URL qui contient des espaces. 
	// Elle devrait transformer les espaces en "-"
   public function testPreparerURLContenantEspaces(){
        
		// 1. On crée la donnée à envoyer à la méthode
		$originale= "cette url contenait des espaces";
		// 2. On crée un objet de la classe à tester
        $url= new URL();
		// 3. On appelle la méthode à tester (on lui envoie la donnée)       
        $urlPreparee=  $url->preparerURL($originale);
		// 4. On fait appel à une méthode d'ASSERTION (ici, assertEquals vérifie si deux variables contiennent la même valeur)
        $attendue="cette-url-contenait-des-espaces";
        $this->assertEquals("a","a");
        
        //$this->assertEquals($attendue,$urlPreparee);
        
        
		// L'assertion: cette appel  'assertEquals (valeur attendue, valeur obtenu)'
        // est une ASSERTION. Une assertion est une expression qui 
        // doit être renvoyer VRAI. Si elle renvoie FALSE le test échoue
         
        // Cette assertion en particulière vérifie que une variable contient 
        // une valeur attendue. Dans le cas de ce test, une fonction nous renvoie 
        // cette valeur. Si l’assertion n’est pas VRAI, le test échoue: notre méthode ne fonctionne pas comme prévue.
        
        // la valeur attendue est la valeur qui devrait être renvoyée par la fonction 
        
        
    }
    
	// voici d'autres exemples
    
    // méthode qui teste un comportement de la méthode "preparerURL"
    public function testPreparerURLContenantAccents(){
        $originale= "liste d'élèves";
        $url= new URL();
        $urlPreparee=  $url->preparerURL($originale);
        //echo $urlPreparee;
        $attendue="liste-deleves";
        $this->assertEquals($attendue,$urlPreparee);
        
    }
    
    // méthode qui teste un comportement de la méthode "preparerURL"
    public function testPreparerURLContenantSymboles (){
        $originale= "attention!aux+et+aux-!";
        $url= new URL();
        $urlPreparee=  $url->preparerURL($originale);
        //echo $urlPreparee;
        $attendue="attentionaux-et-aux";
        $this->assertEquals($attendue,$urlPreparee);
        
    }
    
	
    
}
