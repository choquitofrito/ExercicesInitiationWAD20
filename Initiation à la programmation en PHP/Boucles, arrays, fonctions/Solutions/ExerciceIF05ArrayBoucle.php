<?php
function read()
{
    $fr = fopen("php://stdin", "r");   // open our file pointer to read from stdin
    $input = fgets($fr, 128);        // read a maximum of 128 characters
    $input = rtrim($input);         // trim any trailing spaces.
    fclose($fr);                   // close the file handle
    return $input;                  // return the text entered
}

$totalCommande = 0;

$produits = [
    "PC" => 10,
    "Laptop" => 5,
    "GSM" => 1
];

echo "\n";
foreach ($produits as $nomProduit => $prix) {
    echo $nomProduit . ":" . $prix . "\n";
}

$quantite = 0;
foreach ($produits as $nomProduit => $prix){
    echo "Combien de " . $nomProduit . " voulez-vous? ";
    $quantite = read();
    if ($quantite > 5){
        $prix = $prix - $prix * 10 / 100;
    }
    $totalCommande += $prix * $quantite;
}
echo "Le prix de la commande sans livraison ni carte est : " . $totalCommande;

echo "\nLivraison chez vous? ";
$livraison = read();
if ($totalCommande <= 100 && $livraison == "oui") {
    $totalCommande = $totalCommande + $totalCommande * 2 / 100;
}
echo "Carte fidélite?";
$carte = read();
if ($carte == "oui") {
    $totalCommande = $totalCommande - $totalCommande * 20 / 100;
}
echo "Le prix de la commande est : " . $totalCommande;

