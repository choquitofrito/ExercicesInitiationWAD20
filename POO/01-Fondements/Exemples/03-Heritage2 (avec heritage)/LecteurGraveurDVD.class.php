<?php

require_once "./AppareilDVD.class.php";

class LecteurGraveurDVD extends AppareilDVD
{
    public $vitesseEnregistrement;

    public function __construct($marque, $vitesseLecture, $vitesseEnregistrement)
    {
        // propriétés communes
        parent::__construct($marque, $vitesseLecture);
        // propriétés propres
        $this->vitesseEnregistrement = $vitesseEnregistrement;

    }
    public function enregistrerDVD()
    {
        echo "<br>J'enregistre un DVD";
    }
}
