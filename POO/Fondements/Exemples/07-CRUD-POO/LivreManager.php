<?php

class LivreManager {

    public $db;

    public function __construct(PDO $db){
        $this->db = $db; 
    }

    public function selectAll (){
        $sql = "SELECT * FROM livre";
        $stmt = $db->prepare ($sql);
        $stmt->execute();
        $arrLivres = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $arrLivres;
    }

}