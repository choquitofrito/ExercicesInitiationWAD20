<?php

$tab1 = [3,6];
$tab2 = [4,8,7,12];

$stroumpf = 0;
// 
// $tab1[0] * $tab2[0] + 
// $tab1[0] * $tab2[1] + 
// $tab1[0] * $tab2[2] + 
// .... 
// $tab1[1] * $tab2[0] + 
// $tab1[1] * $tab2[1]
// $tab1[1] * $tab2[2]

$somme = 0;
for ($i = 0; $i < count ($tab1); $i++){
    for ($j = 0; $j < count ($tab2); $j++){
        $somme = $somme + ($tab1 [$i] * $tab2 [$j]);
    }
}
