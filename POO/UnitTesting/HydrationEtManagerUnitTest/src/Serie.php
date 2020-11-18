<?php

/**
 * Description of Serie
 *
 * @author Bender
 */
// classe Serie 
class Serie {
    private $id;
    private $titre;
    private $createur;
    private $genre;

    function __construct($arrayInit) {
        $this->hydrate($arrayInit);
    }

    function hydrate ($arrayInit){
        
        
        foreach ($arrayInit as $propriete => $valeur){
            $method = "set".ucfirst($propriete);
            if (method_exists($this, $method ) ){
                $this->$method ($valeur);
            }
            else {
                //echo "<BR>La méthode SET de la propriété ".$propriete
                //        . " n'existe pas";
            }
        }
    }

    function getId() {
        return $this->id;
    }

    function getTitre() {
        return $this->titre;
    }

    function getCreateur() {
        return $this->createur;
    }

    function getGenre() {
        return $this->genre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setCreateur($createur) {
        $this->createur = $createur;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

}