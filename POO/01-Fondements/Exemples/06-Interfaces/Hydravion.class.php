<?php

include_once "./Vehicule.class.php";
include_once "./IVolant.php";
include_once "./INaviguant.php";

class Hydravion extends Vehicule implements IVolant,INaviguant {

    // on peut avoir les propriétés et le méthodes qu'on veut

    public function voler(){
        echo "<br>Hydravion qui vole!";

    }
    public function naviguer(){
        echo "<br>Hydravion qui navigue!";

    }
}