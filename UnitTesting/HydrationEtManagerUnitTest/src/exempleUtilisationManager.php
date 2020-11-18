<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            //1. Importer la config et créer l'objet connexion
            include "./config/config.php";

            $bdd = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
                ';dbname='.DBNAME.';charset='.DBCHARSET,DBUSER,DBPASS); 
        }
        catch (Exception $e){
            echo $e->getMessage();
            //var_dump ($e);
            //echo "Un erreur s'est produite!";
            //header ("location: http://www.lesoir.be");
            die();
        }
        
        // créer un manager
        include "./autoload.php";
        
        /////
        $serieManager = new SerieManager($bdd);
        
        // getParId - sélection (un seul objet)
        $uneSerie = $serieManager->getParId (2000);
        var_dump ($uneSerie);
        
        // getAll (array d'objets)
        $toutesLesSeries = $serieManager->getAll();
      
        // 
        $seriesFiltres = $serieManager->get (['titre'=>'Buffy']
                                                );
        var_dump ($seriesFiltres);
        
        // exemple Implode (outile pour le filtre multiple)
        // $arrTest2 = ['titre'];
        // $strTest2 = implode (" tururu ",$arrTest2);
        
        // insertion
        
        
        // création et mise à jour d'une serie dans la BD
        //$s1 = new Serie (['titre'=>'Allons à la maison',
        //                    'createur'=>'X',
        //                    'genre'=>'Y']);
        
        // $serieManager->insert($s1);
        $s1 = $serieManager->getParId(19);
        $s1->setCreateur('Julio César');
        $s1->setGenre ('Drame');
        $serieManager->update ($s1);
        
        
        
        
        
        
        
        // $serieManager->delete ($s1);
        // var_dump ($s1);
        
        
        
        
        ?>
    </body>
</html>
