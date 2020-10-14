<?php

class AppareilDVD
{
    public $marque;
    public $vitesseLecture;

    public function __construct($marque, $vitesseLecture)
    {
        $this->marque = $marque;
        $this->vitesseLecture = $vitesseLecture;
    }
    public function lireDVD()
    {
        echo "<br>Je lis un DVD";
    }

    
}
