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
        return $arrLivres;
    }

}