<?php

include_once "Client.php";

class ClientManager
{

    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM client";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $arrClients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arrObjetsClients = [];
        foreach ($arrClients as $unClientArray) {
            $objectClient = new Client($unClientArray);
            $arrObjetsClients[] = $objectClient;

        }

        return $arrObjetsClients;
    }

    // select avec de filtres
    public function selectFiltres($arrayFiltres = null)
    {
        if (!is_null($arrayFiltres)) {
            $sql = "SELECT * FROM Client";
            // on rajoute de couples cle =:cle dans un array 
            $arrayFiltresChaine = [];
            foreach ($arrayFiltres as $cle => $valeur) {
                $arrayFiltresChaine[] = $cle . " =:" . $cle;
            }
            var_dump($arrayFiltresChaine);
            $chaineFiltres = implode(" AND ", $arrayFiltresChaine);

            $sql = $sql . " WHERE " . $chaineFiltres;
            $stmt = $this->db->prepare($sql);
            // faire tous les bindValue (":cle",$val)
            foreach ($arrayFiltres as $cle => $val) {
                $stmt->bindValue(":" . $cle, $val);
            }
            $stmt->execute();
            $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);


            // transformer l'array d'array en array d'objets
            $arrayResultatObjets = [];
            foreach ($arrayResultat as $clientArray) {
                $objetClient = new Client($clientArray);
                $arrayResultatObjets[] = $objetClient;
            }
            //var_dump ($arrayResultatObjets);
            return ($arrayResultatObjets);
        } else {
            $tousLesClients = $this->selectAll();
            return $tousLesClients;
        }
    }

    // effacer un objet Client
    public function delete(Client $unClient)
    {
        $sql = "DELETE FROM client WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $unClient->getId());
        $stmt->execute();
        // var_dump ($stmt->errorInfo());
    }

    public function deleteParId($id)
    {
        $sql = "DELETE FROM client WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        // var_dump ($stmt->errorInfo());
    }

    public function insert(Client $unClient)
    {
        // INSERT INTO client (id, titre, prix, description, date_publication, isbn, auteur_id) 
        // VALUES (NULL, :id, :titre, ...)
        $sql = "INSERT INTO client (id, nom, prenom, adresse,email, mot_pass) 
         VALUES (NULL,:nom, :prenom,:adresse, :email, :mot_pass )";

        $stmt = $this->db->prepare($sql);
        // bindValues ....

        $stmt->bindValue(":nom", $unClient->getNom());
        $stmt->bindValue(":prenom", $unClient->getPrenom());
        $stmt->bindValue(":adresse", $unClient->getAdresse());
        $stmt->bindValue(":email", $unClient->getEmail());
        $stmt->bindValue(":mot_pass", $unClient->getMot_pass());
       
        $stmt->execute();
        // obtenir le dernier id, l'id du Client qu'on vient d'insèrer
        $unClient->setId($this->db->lastInsertId());
        var_dump($stmt->errorInfo());
    }

    // adapter à la class Client, car c'est une méthode de Livre
    public function update($unClient)
    {
        // $sql = "UPDATE client SET titre = '" . $unClient->getTitre() . "' , ";
        // $sql = $sql . " prix = '" . $unClient->getPrix() . "' , ";
        // $sql = $sql . " description = '" . $unClient->getDescription() . "' , ";
        // $sql = $sql . " date_publication = '" . $unClient->getDate_publication() . "' , ";
        // $sql = $sql . " isbn = '" . $unClient->getIsbn() . "' , ";
        // $sql = $sql . " auteur_id = '" . $unClient->getAuteur_id() . "' ";
        // $sql = $sql . " WHERE id=:id";
        // $stmt = $this->db->prepare($sql);
        // $stmt->bindValue(":id", $unClient->getId());
        // $stmt->execute();
        // var_dump ($sql);
        // var_dump ($stmt->errorInfo());

    }

    public function updateAuto($unClient)
    {
        $sql = "UPDATE client SET ";
        $proprietes = get_object_vars($unClient); // on obtient un array avec les propriétés et les valeurs d'un objet
        $arrayPropParam = [];
     
        // rajouter à la requête toutes les couples proprieté = valeur
        // ex: UPDATE Client SET nom=:nom, prenom=:prenom
        // sauf l'id, car on ne peut pas faire UPDATE .... set id = :id
        // si on a RESTRICT dans les propriétés de la rélation
        foreach ($proprietes as $nomPropriete => $valPropriete) {
            // nous avons (regardez le code de Client.php)
            // un array d'emprunts (rajouté)
            // Pour faire la différence entre les proprietés de base
            // et les propriétés liées aux associations, on peut
            // regarder s'il s'agit d'un array ou d'un objet
            // (la liste d'emprunts est un array, l'auteur (ici il n'y a pas) serait 
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
