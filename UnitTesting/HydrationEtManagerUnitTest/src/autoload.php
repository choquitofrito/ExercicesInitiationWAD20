<?php

function __autoload ($nomClasse){
    if (!class_exists($nomClasse)){
        require_once "./".$nomClasse.".php";
    }
}

