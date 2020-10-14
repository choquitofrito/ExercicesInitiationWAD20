<?php

require_once "./AppareilDVD.class.php";

class LecteurGraveurDVD extends AppareilDVD
{
    public $vitesseEnregistrement;
    public function __construct($marque, $vitesseLecture, $vitesseEnregistrement)
    {
        $this->marque = $marque;
        $this->vitesseLecture = $vitesseLecture;
        $this->vitesseEnregistrement = $vitesseEnregistrement;
    }
    public function lireDVD()
    {
        echo "<br>Je lis un DVD";
    }

    public function enregistrerDVD()
    {
        echo "<br>J'enregistre un DVD";
    }
}
