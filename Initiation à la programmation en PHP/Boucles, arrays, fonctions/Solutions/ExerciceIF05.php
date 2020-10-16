<?php
function read()
{
        $fr=fopen("php://stdin","r");   // open our file pointer to read from stdin
        $input = fgets($fr,128);        // read a maximum of 128 characters
        $input = rtrim($input);         // trim any trailing spaces.
        fclose ($fr);                   // close the file handle
        return $input;                  // return the text entered
}

$totalCommande = 0;

$p1 = "PC";
$p2 = "Laptop";
$p3 = "GSM";

$prix1 = 10;
$prix2 = 5;
$prix3 = 1;

echo "\n";
echo $p1.":".$prix1."\n";
echo $p2.":".$prix2."\n";
echo $p3.":".$prix3."\n";


echo "Combien de " . $p1 . " voulez-vous? ";
$quantiteP1 = read();
if ($quantiteP1 > 5){
    $prix1 = $prix1 - $prix1*10/100;
}
$totalCommande += $prix1 * $quantiteP1;


echo "Combien de " . $p2 . " voulez-vous? ";
$quantiteP2 = read();
if ($quantiteP2 > 5){
    $prix2 = $prix2 - $prix2*10/100;
}
$totalCommande += $prix2 * $quantiteP2;

echo "Combien de " . $p3 . " voulez-vous? ";
$quantiteP3 = read();
if ($quantiteP3 > 5){
    $prix3 = $prix3 - $prix3*10/100;
}
$totalCommande += $prix3 * $quantiteP3;

echo "Le prix de la commande sans livraison ni carte est : " . $totalCommande;

echo "\nLivraison chez vous? ";
$livraison = read();
if ($totalCommande <= 100 && $livraison == "oui"){
    $totalCommande = $totalCommande + $totalCommande * 2 / 100;
}
echo "Carte fidélite?";
$carte = read();
if ($carte == "oui"){
    $totalCommande = $totalCommande - $totalCommande * 20 / 100;    
}
echo "Le prix de la commande est : " . $totalCommande;

 
