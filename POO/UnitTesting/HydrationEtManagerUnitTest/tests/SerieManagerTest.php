<?php

require dirname (__DIR__)."/src/SerieManager.php";
require dirname (__DIR__)."/src/Serie.php";



class SerieManagerTest extends \PHPUnit\Framework\TestCase {
	
	public function testGetParIdTrouve (){
		// BD, normalement on fera cette opération ailleurs
		try {
			include_once (__DIR__)."/../src/config/config.php";
			$bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
				';dbname='.DBNAME.';charset='.DBCHARSET,DBUSER,DBPASS); 
		}
		catch (Exception $e){
			echo $e->getMessage();
			die();
		}

		$serieManager = new SerieManager($bdd);
        
        // getParId - sélection (un seul objet)
        $uneSerie = $serieManager->getParId (2000); // on obtiendra une erreur, il n'y a pas de serie avec l'id 2000
        // on doit obtenir un objet
		$this->assertInstanceOf (Serie::class, $uneSerie);
		
	}
	
	
}