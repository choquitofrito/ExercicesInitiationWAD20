<?php
include_once "./Vehicule.class.php";
include_once "./IRoulant.php";


class Voiture extends Vehicule implements IRoulant {

    // on peut avoir les propriétés et le méthodes qu'on veut

    public function rouler(){
        echo "<br>Vrrrommmm je suis une voiture qui roule!";

    }
}