<?php

class Client {
    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $email;
    public $mot_pass;

    // chaque objet Client aura un ensemble d'objets Emprunt
    // On utilise un array, liste, vecteur... d'objets Emprunt
    public $emprunts = [];

    public function __construct($arrayInit){
        $this->hydrate($arrayInit);
    }
    
    public function hydrate($arrayInit){
        foreach ($arrayInit as $propriete => $valeur){
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mot_pass
     */ 
    public function getMot_pass()
    {
        return $this->mot_pass;
    }

    /**
     * Set the value of mot_pass
     *
     * @return  self
     */ 
    public function setMot_pass($mot_pass)
    {
        $this->mot_pass = $mot_pass;

        return $this;
    }

    /**
     * Get the value of emprunts
     */ 
    public function getEmprunts()
    {
        return $this->emprunts;
    }

    /**
     * Set the value of emprunts
     *
     * @return  self
     */ 
    public function setEmprunts($emprunts)
    {
        $this->emprunts = $emprunts;

        return $this;
    }

    // rajouterEmprunt (Emprunt $unEmprunt)
    public function rajouterEmprunt ($unEmprunt){
        
    }
    
    // effacerEmprunt (Emprunt $unEmprunt)
    // effacerEmpruntPos ($pos) // rare... on ne connait pas la position d'un emprunt dans la liste




}