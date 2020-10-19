<?php

class LivreManager {

    public $db;

    public function __construct(PDO $db){
        $this->db = $db; 
    }

    public function selectAll (){
        $sql = "SELECT * FROM livre";
        $stmt = $this->db->prepare ($sql);
        $stmt->execute();
        $arrLivres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // on renvoi un array de livres
        // var_dump ($stmt->errorInfo());
        // die();
      

        $arrObjetsLivres = [];
        // $unLivreArray est un livre sous la forme d'un array
        // $arrLivres est un array qui contient de Livres sous la forme d'array
        // $arrObjetsLivres est un array qui contient de Livres sous la forme d'objets
        foreach ($arrLivres as $unLivreArray){
            $objectLivre = new Livre ($unLivreArray);
            $arrObjetsLivres[] = $objectLivre;
            // var_dump ($unLivreArray);

        }
        // return $arrLivres;
        return $arrObjetsLivres;
    }

}