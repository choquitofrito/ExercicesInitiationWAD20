<?php

include_once "Livre.php";

class LivreManager
{

    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM livre";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $arrLivres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // on renvoi un array de livres
        // var_dump ($stmt->errorInfo());
        // die();


        $arrObjetsLivres = [];
        // $unLivreArray est un livre sous la forme d'un array
        // $arrLivres est un array qui contient de Livres sous la forme d'array
        // $arrObjetsLivres est un array qui contient de Livres sous la forme d'objets
        foreach ($arrLivres as $unLivreArray) {
            $objectLivre = new Livre($unLivreArray);
            $arrObjetsLivres[] = $objectLivre;
            // var_dump ($objectLivre);
            // var_dump ($unLivreArray);

        }
        // return $arrLivres; // on ne veut plus un array d'arrays!

        return $arrObjetsLivres;
    }

    // select avec de filtres
    public function selectFiltres($arrayFiltres = null)
    {
        // si vide: SELECT * FROM Livre 
        // si pas vide : SELECT * FROM Livre WHERE cle1 = :cle1 AND cle2 = :cle2 etc...
        // si pas vide : SELECT * FROM Livre WHERE prix = :prix AND titre = :titre etc...
        // $sql = "SELECT * FROM Livre WHERE ";

        // $chaineFiltres = "";
        // foreach ($arrayFiltres as $key => $value){
        //     $sql = $sql . $key . " = :" . $key . " AND "; 
        // }
        // var_dump ($sql);
        // var_dump (array_keys($arrayFiltres));

        if (!is_null($arrayFiltres)) {
            $sql = "SELECT * FROM Livre";
            // on rajoute de couples cle =:cle dans un array 
            $arrayFiltresChaine = [];
            foreach ($arrayFiltres as $cle => $valeur) {
                $arrayFiltresChaine[] = $cle . " =:" . $cle;
            }
            var_dump($arrayFiltresChaine);
            // on crée un string contenant les couples séparées par AND
            $chaineFiltres = implode(" AND ", $arrayFiltresChaine);

            $sql = $sql . " WHERE " . $chaineFiltres;
            $stmt = $this->db->prepare($sql);
            // faire tous les bindValue (":cle",$val)
            foreach ($arrayFiltres as $cle => $val) {
                $stmt->bindValue(":" . $cle, $val);
            }
            $stmt->execute();
            // on obtient un array d'arrays qui représentent les livres
            $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);


            // transformer l'array d'array en array d'objets
            $arrayResultatObjets = [];
            foreach ($arrayResultat as $livreArray) {
                $objetLivre = new Livre($livreArray);
                $arrayResultatObjets[] = $objetLivre;
            }
            //var_dump ($arrayResultatObjets);
            return ($arrayResultatObjets);
        } else {
            $tousLesLivres = $this->selectAll();
            return $tousLesLivres;
        }
    }

    // effacer un objet Livre
    public function delete(Livre $unLivre)
    {
        $sql = "DELETE FROM livre WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $unLivre->getId());
        $stmt->execute();
        // var_dump ($stmt->errorInfo());
    }

    public function deleteParId($id)
    {
        $sql = "DELETE FROM livre WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        // var_dump ($stmt->errorInfo());
    }

    public function insert(Livre $unLivre)
    {
        // INSERT INTO livre (id, titre, prix, description, date_publication, isbn, auteur_id) 
        // VALUES (NULL, :id, :titre, ...)
        $sql = "INSERT INTO livre (id, titre, prix, description, date_publication, isbn, auteur_id) 
         VALUES (NULL, :titre, :prix, :description, :date_publication, :isbn, :auteur_id)";

        $stmt = $this->db->prepare($sql);
        // bindValues ....

        $stmt->bindValue(":titre", $unLivre->getTitre());
        $stmt->bindValue(":prix", $unLivre->getPrix());
        $stmt->bindValue(":description", $unLivre->getDescription());
        $stmt->bindValue(":date_publication", $unLivre->getDate_publication());
        $stmt->bindValue(":isbn", $unLivre->getIsbn());
        $stmt->bindValue(":auteur_id", $unLivre->getAuteur_id());

        $stmt->execute();
        // obtenir le dernier id, l'id du Livre qu'on vient d'insèrer
        $unLivre->setId($this->db->lastInsertId());
        var_dump($stmt->errorInfo());
    }

    public function update($unLivre)
    {
        $sql = "UPDATE livre SET titre = '" . $unLivre->getTitre() . "' , ";
        $sql = $sql . " prix = '" . $unLivre->getPrix() . "' , ";
        $sql = $sql . " description = '" . $unLivre->getDescription() . "' , ";
        $sql = $sql . " date_publication = '" . $unLivre->getDate_publication() . "' , ";
        $sql = $sql . " isbn = '" . $unLivre->getIsbn() . "' , ";
        $sql = $sql . " auteur_id = '" . $unLivre->getAuteur_id() . "' ";
        $sql = $sql . " WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $unLivre->getId());
        $stmt->execute();
        // var_dump ($sql);
        // var_dump ($stmt->errorInfo());

    }

    public function updateAuto($unLivre)
    {
        $sql = "UPDATE livre SET ";
        $proprietes = get_object_vars($unLivre); // on obtient un array avec les propriétés et les valeurs d'un objet
        $arrayPropParam = [];
     
        // rajouter à la requête toutes les couples proprieté = valeur
        // ex: UPDATE Livre SET titre=:titre, prix=:prix
        // sauf l'id, car on ne peut pas faire UPDATE .... set id = :id
        // si on a RESTRICT dans les propriétés de la rélation
        foreach ($proprietes as $nomPropriete => $valPropriete) {
            // nous avons (regardez le code de Livre.php)
            // un array d'exemplaires (rajouté)
            // et un objet Auteur. Ces propriétés 
            // ne doivent pas être utilisées dans l'UPDATE
            // Pour faire la différence entre les proprietés de base
            // et les propriétés liées aux associations, on peut
            // regarder s'il s'agit d'un array ou d'un objet
            // (la liste d'exemplaires est un array, l'auteur est un objet
            if (!is_array($valPropriete)  && (!is_object($valPropriete)) && $nomPropriete!="id") {
                $arrayPropParam[] = $nomPropriete . "=:" . $nomPropriete;
            }
        };

        $sql = $sql .  implode(",", $arrayPropParam);
        // le where, autrement on changera toutes les lignes!!
        $sql = $sql . " WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        // faire les bindValue, on permet l'id car on doit faire bind (il est dns le WHERE)
        foreach ($proprietes as $nomPropriete => $valPropriete) {
            if (!is_array($valPropriete) && (!is_object($valPropriete))) {
                $stmt->bindValue(":" . $nomPropriete, $valPropriete);
            }
        }
        
        
        $stmt->execute();
        //var_dump($stmt->errorInfo());

    }
}
