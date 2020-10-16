<?php

require_once "./AppareilDVD.class.php";

class LecteurDVD extends AppareilDVD
{
    public function __construct($marque, $vitesseLecture)
    {
        parent::__construct($marque, $vitesseLecture);
        
    }

}
