<?php

// ce code nous permet de lire du clavier
function read()
{
    $fr = fopen("php://stdin", "r");   // open our file pointer to read from stdin
    $input = fgets($fr, 128);        // read a maximum of 128 characters
    $input = rtrim($input);         // trim any trailing spaces.
    fclose($fr);                   // close the file handle
    return $input;                  // return the text entered
}

// sans tableau
// $nombreValeurs = 5;

// $i = 0;
// while ($i < $nombreValeurs) {
//     $val = read();
//     echo $val + 1;
//     $i++;
// }

// avec tableau
echo PHP_EOL;
echo "Tapez le nombre de valeurs : ";
echo PHP_EOL;

$nombreValeurs = read();
$i = 0;
$tab1 = [];
while ($i < $nombreValeurs){
    echo "Tapez une valeur: ";
    $tab1[] = read() + 1;
    echo PHP_EOL;
    $i ++;
}
echo PHP_EOL;
echo "Le contenu du tableau est :";
foreach ($tab1 as $val){
    echo $val. "  ";
}