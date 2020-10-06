<?php

// du texte
echo "Bonjour!";
echo "<h5 id='monH5'>Je suis un h5</h5>\n";

// un div
echo "<div class='maclasse'>Je suis dans un div</div>\n";

// du contenu dynamique simple
echo "<br>";
for ($i = 0; $i < 5; $i ++){
    echo $i . ",";
}

echo "<br>";
$noms = ['Jean','Lucie','Belén'];
foreach ($noms as $unNom){
    echo $unNom . ",";
}

echo "<br>";
echo implode (",", $noms);

// génération d'un select
$paysOrigine = ['Belgique','Italie','Pologne'];

echo "<br>";
echo "<select>\n";
foreach ($paysOrigine as $unPays){
    echo "<option>". $unPays . "</option>\n";
};
echo "</select>\n"; 

echo "<img src='./pizza.jpg'>";

echo "<img src=\"./pizza.jpg\">";










