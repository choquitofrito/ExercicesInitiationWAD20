<?php


class Chat {
    private $poids;
    private $race;

    public function __construct ($poids, $race){
        $this->setPoids ($poids);
        $this->race = $race;
    }
    public function setPoids($unPoids){
        if ($unPoids < 10){
            $this->poids = $unPoids;
        }
        else {
            throw new Exception ("trop lourd pour un chat");
        }
    }
}
$unChat = new Chat (5000, "luli");
$unChat->setPoids(700);