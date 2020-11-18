<?php



// classe qui gére le CRUD des objets Serie
class SerieManager {
    
    private $bdd; // objet PDO
    
    public function __construct ($uneBdd){
        $this->bdd = $uneBdd;
    }
    
        
    // obtenir une serie par id, renvoie un objet serie
    public function getParId($id){
        $sql = "SELECT * FROM serie WHERE id=:id";
        $statement = $this->bdd->prepare ($sql);
        $statement->bindValue (':id',$id);
        $statement->execute();
        // on obtient une seule ligne (un array associatif)
        $tableauSerie = $statement->fetch(PDO::FETCH_ASSOC);
        if (!is_array($tableauSerie)){
            return null;
        }        
        else {
            $objetSerie = new Serie($tableauSerie);
            return ($objetSerie);
        }
    }
	
    public function getAll (){
        $sql = "SELECT * FROM serie";
        $statement = $this->bdd->prepare ($sql);
        $statement->execute();
        $tableauSeries = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $arrayObjectsSerie = [];
        if (is_array ($tableauSeries)){
            foreach ($tableauSeries as $tableauSerie){
                $objetSerie = new Serie ($tableauSerie);
                $arrayObjectsSerie[] = $objetSerie;
            }
            return ($arrayObjectsSerie);
        
        }
        else {
            return ([]);
        }
         
    }
    
    public function get($arrayFiltres){
        $sql = "SELECT * FROM serie ";
        if (count ($arrayFiltres) > 0){
            // rajouter les filtres
            $sql = $sql."WHERE ";
            $arr = [];
            foreach ($arrayFiltres as $key=>$value){
                $arr[] = $key . "=:" . $key;
            }
            $strFiltres = implode (" AND ",$arr);
            $sql = $sql.$strFiltres;
        }
        
        // dans tous les cas il faut préparer la requête
        $statement = $this->bdd->prepare ($sql);
        
        // check bindValue pour les filtres
        if (count ($arrayFiltres) > 0){
            foreach ($arrayFiltres as $key => $value){
                $statement->bindValue (":".$key, $value);
            }
        }
        // dans tous les cas
        $statement->execute();
        $tableauSeries = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
        $arrayObjectsSerie = [];
        foreach ($tableauSeries as $tableauSerie){
            $objetSerie = new Serie ($tableauSerie);
            $arrayObjectsSerie[] = $objetSerie;
        }
        return ($arrayObjectsSerie);
        
    }
    
    public function insert (Serie $s){
        $sql = "INSERT INTO serie (id, titre, createur, genre) "
                . "VALUES (null, :titre, :createur, :genre)";
        $statement = $this->bdd->prepare ($sql);
        $statement->bindValue (':titre', $s->getTitre());
        $statement->bindValue (':createur', $s->getCreateur());
        $statement->bindValue (':genre', $s->getGenre());
        if (!$statement->execute()){
            echo "<br>Problème d'insertion";
            // en developpement!
            var_dump ( $statement->errorInfo());
        }
        $s->setId($this->bdd->lastInsertId());
    }
    
    // 
    public function insertForEach (Serie $s){
        $sql = "INSERT INTO serie (id, titre, createur, genre) "
                . "VALUES (:id, :titre, :createur, :genre)";
        $statement = $this->bdd->prepare ($sql);
        
        // obtenir les propriétés de l'objet reçu en parametre 
        $reflection = new ReflectionClass($s);
        //var_dump ($reflection->getProperties());
        
        $nomsProprietes = [];
        foreach ($reflection->getProperties() as $objectPropriete){
            $nomProprietes[] = $objectPropriete->getName();
        }
        //var_dump($nomProprietes);
        
        foreach ($nomProprietes as $nom){
            $method = "get".ucfirst($nom);
            $statement->bindValue (":".$nom,$s->$method());
        }
        //var_dump ($statement);
        $statement->execute();
        $s->setId($this->bdd->lastInsertId());
    }
    
    public function delete (Serie $s){
        var_dump ($s);
        $sql = "DELETE FROM serie WHERE id = :id";
        $statement = $this->bdd->prepare ($sql);
        $statement->bindValue (":id", $s->getId());
        if (!$statement->execute()){
            // en developpement uniquement!!
            var_dump ($statement->errorInfo());
            return false;
        }
        else {
            return true;
        }
    }
    
    public function update (Serie $s){
        
        
        $sql = "UPDATE serie SET titre=:titre, createur=:createur, genre=:genre ".
                "WHERE id=:id";
        $statement = $this->bdd->prepare ($sql);
        
        
        
        $statement->bindValue (':titre', $s->getTitre());
        $statement->bindValue (':createur', $s->getCreateur());
        $statement->bindValue (':genre', $s->getGenre());
        $statement->bindValue (':id', $s->getId());
        if (!$statement->execute ()){
            var_dump ($statement->errorInfo());
            return false;
        }
        else {
            return true;
        }
    }
}