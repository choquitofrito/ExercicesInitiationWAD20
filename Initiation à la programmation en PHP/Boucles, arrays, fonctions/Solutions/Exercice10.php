<?php

for ($i = 0; $i < 24; $i++) {
    echo $i . "h.\n";
    for ($j = 0; $j < 60; $j += 5) {
        echo "\t" . $j . "m.\n";
        for ($k = 0; $k < 60; $k += 10) {
            echo "\t\t" . $k . "s.\n";
        }
    }
}

$tab=[];
for ($i = 1; $i <= 20; $i++) {
    $tab[] = $i;
}
