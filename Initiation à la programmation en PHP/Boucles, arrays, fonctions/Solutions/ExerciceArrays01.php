<?php

// ex.1
$tab = [10, 20, 50];
echo $tab[0];
echo "\n";
echo $tab[1];
echo "\n";
echo $tab[2];

echo "\n";

// ex.2
$tab[] = 8;
$tab[] = 70;

echo "\n";
echo $tab[1];
echo "\n";
echo $tab[4];


// ex.3
$villes = ['Bruxelles', 'Madrid', 'Paris', 'Rome', 'Huelva'];


$i = 0;
while ($i < count($villes)) {
    echo "\n";
    echo $villes[$i];
    $i++;
}
// non!!! $villes[] = ['Namur','Gent'];

$villes[] = 'Namur';
$villes[] = 'Gent';
var_dump($villes);

$villes[0] = 'Quito';

// ex.6
$tableau = [];
for ($i = 0; $i < 20; $i++) {
    $tableau[$i] = $i + 1;
}

$tableau = [];
for ($i = 1; $i <= 20; $i++) {
    $tableau[] = $i;
}

// ex.7
// v1. modifie le tableau original 
for ($i = 0; $i < count($tableau); $i++) {
    $tableau[$i] = $tableau[$i] * 2;
}

// v2. créer un nouveau tableau
$nouveauTab = [];
for ($i = 0; $i < count($tableau); $i++) {
    $nouveauTab[] = $tableau[$i] * 2;
}
var_dump($nouveauTab);

// ex 8.
$notes = [9, 7, 8, 10];

$somme = 0;
foreach ($notes as $val){
    $somme = $somme + $val;
}
$moyenne = $somme / count ($notes);
echo "\nLa moyenne est : " . $moyenne;

// ex 9.
$tab1 = [3,4,5,7];
$tab2 = [10,20,30,40];

$tab3 = [];
for ($i = 0; $i < count ($tab1) ; $i++){
    $tab3[] = $tab1[$i] + $tab2[$i];
}
var_dump ($tab3);


