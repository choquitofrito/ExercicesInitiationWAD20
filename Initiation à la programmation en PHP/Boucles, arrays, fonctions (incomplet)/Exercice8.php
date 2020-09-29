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


$produits = [
    'oranges'=>2.5,
    'pommes'=>1.9,
    'poires'=>2.5
];

$prixTotal = 0;
foreach ($produits as $key => $val){
    echo PHP_EOL;
    echo $key . " : " . $val;
    echo PHP_EOL;
    echo "Tapez le nombre de " . $key . ": ";
    $quantite = read();
    $prixTotal += $quantite * $val;
}
echo PHP_EOL;
echo "Le total est : " . $prixTotal;



?>

