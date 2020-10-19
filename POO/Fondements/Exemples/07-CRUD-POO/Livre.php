<?php

class Livre {
    public $id;
    public $titre;
    public $prix;
    public $description;
    public $date_publication;
    public $isbn;
    public $auteur_id;

    public function __construct($arrayInit){
        $this->hydrate($arrayInit);
    }
    public function hydrate($arrayInit){
        foreach ($arrayInit as $propriete => $valeur){
            // echo "<br>";
            // echo $propriete;
            // echo ":";
            // echo $valeur;
            $methode = "set".ucfirst($propriete); // un string contenant 
                                                // setTitre au lieu de 
                                                // settitre
            $this->$methode ($valeur);         
        }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of date_publication
     */ 
    public function getDate_publication()
    {
        return $this->date_publication;
    }

    /**
     * Set the value of date_publication
     *
     * @return  self
     */ 
    public function setDate_publication($date_publication)
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of auteur_id
     */ 
    public function getAuteur_id()
    {
        return $this->auteur_id;
    }

    /**
     * Set the value of auteur_id
     *
     * @return  self
     */ 
    public function setAuteur_id($auteur_id)
    {
        $this->auteur_id = $auteur_id;

        return $this;
    }
}