<?php
include_once "./Vehicule.class.php";
include_once "./IVolant.php";

class Avion extends Vehicule implements IVolant {

    // on peut avoir les propriétés et le méthodes qu'on veut

    public function voler(){
        echo "<br>Avion qui vole!";

    }
    
}