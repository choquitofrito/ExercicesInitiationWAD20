<?php

include_once "./Animal.class.php";
class Chien extends Animal {
    public function __construct ($nom, $poids){
        parent::__construct($nom,$poids);

    }
    public function ramenerBalle (){
        echo "<br>Wuaf wuaf voici la balle!";
    }
    public function cri(){
        echo "<br>Guau guau guau!!!";
    }
    public function manger(){
        echo "<br>Je mange comme un chien!";
    }
}