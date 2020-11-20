<?php
include_once "./Vehicule.class.php";
include_once "./INaviguant.php";

class Bateau extends Vehicule implements INaviguant {

    // on peut avoir les propriétés et le méthodes qu'on veut

    public function naviguer(){
        echo "<br>Bateau dans l'eau la riviere la riviere qui vole!";

    }
    
}