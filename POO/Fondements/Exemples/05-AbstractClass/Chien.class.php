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
    // on écrase la méthode du parent, mais elle doit avoir le même 
    // nombre de paramètres
    // juste un exemple: ce n'est pas dans le diagramme
    public function manger(){
        echo "<br>Je mange comme un chien!";
    }
}