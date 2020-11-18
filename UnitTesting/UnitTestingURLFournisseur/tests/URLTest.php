<?php


require dirname(__DIR__)."/src/URL.php"; 
// dirname(__DIR__) renvoie le nom du dossier père 
// du dossier qui contient ce fichier (__DIR__)



// classe contenant les tests de la classe URL
class URLTest extends \PHPUnit_Framework_TestCase{
    
    // cette méthode reçoit les couples de valeurs utilisées dans les assertions
    // de la méthode étant le fournisseur de données ('dataProvider')
    // ça nous épargne la création de plusieurs méthodes qui contiennent le même code
    // attentions aux annotations, qui indiquent qui est le fournisseur
	// de données pour chaque méthode de test
    
    /**
     * @dataProvider providerTestPreparerURLRenvoieURLCorrecte
     */
    public function testPreparerURLRenvoieURLCorrecte($urlOriginal,$urlAttendue){
        $url=new URL();
        $urlPreparee= $url->preparerURL($urlOriginal);
        $this->assertEquals ($urlAttendue,$urlPreparee);
    }
    
    
    public function providerTestPreparerURLRenvoieURLCorrecte(){
        
        return array(
            array ("cette url contenait des espaces","cette-url-contenait-des-espaces"),
            array ("liste d'élèves","liste-deleves"),
            array ("attention!aux+et+aux-!","attentionaux-et-aux")
        );
        
    }
    
    
    
    
}
