<?php

// ce code nous permet de lire du clavier
function read()
{
        $fr=fopen("php://stdin","r");   // open our file pointer to read from stdin
        $input = fgets($fr,128);        // read a maximum of 128 characters
        $input = rtrim($input);         // trim any trailing spaces.
        fclose ($fr);                   // close the file handle
        return $input;                  // return the text entered
}
echo "Vous êtes dans quelle année?";
$annee = read();
echo "Nombre d'absences?";
$nombreAbsences = read();

$totalCours = 50; // même nombre pour toutes les années

if ($annee == 1){
    $minimumPresence = 80 * $totalCours / 100;
    if ($nombreAbsence > ($totalCours - $minimumPresence)){
        
    }
}




?>