<?php

$piste1Nom = "Bad";
$piste1Duree = 300;
$piste1Auteur = "Michael Jackson";

$piste2Nom = "Thriller";
$piste2Duree = 350;
$piste2Auteur = "Michael Jackson";

$piste1 = [
    'nom' => 'Bad',
    'duree' => 300,
    'auteur' => 'Michael Jackson'
];

$piste2 = [
    'nom' => 'Thriller',
    'duree' => 350,
    'auteur' => 'Michael Jackson'
];

$voiture1 = [
    'marque' => 'Seat',
    'vitesse' => 180
];

$compte1 = [
    'IBAN' => '4453534534534',
    'solde' => 4000,
    'type' => 'epargne'
];

$compte2 = [
    'IBAN' => '2345234523452',
    'solde' => 2000,
    'type' => 'epargne'
];

$sql = "INSERT INTO Clients (adsfasdf, dsaf,sdaf,asd,f) VALUES (:aadf,:asdfasdf: adf"


$sql = "INSERT INTO Clients (adsfasdf, dsaf,sdaf,asd,f) VALUES (:aadf,:asdfasdf: adf"


$sql = "INSERT INTO Clients (adsfasdf, dsaf,sdaf,asd,f) VALUES (aadf,:asdfasdf: adf"

// CRUD de base orienté objet
$clientManager->insert ($client1);
$arrayClient = $clientManager->chercher (['nom'=>'Camille']);
$clientManager->delete ($client1);

$arrayCompteBancaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
$compte1 = $arrayCompteBancaires[0];
echo $compte1['solde'];
$compte1->retirer(400);

print (strtoupper("coucou"));
function afficher ($mot){
    //
}
afficher ("lalalala");

class Livre {
    public $titre;  // une propriété
    private $code;
    public function afficher (){  // une méthode
        echo $this->titre;
    }
    private function setCode ($val){
        $this->code = $val;
    }
}

$v1 = new Voiture();
$v1->titre = "lala";

function modifieLivre(){
    $titre = ....
}

$li1 = new Livre();

$li1->titre = "1984";

$li1->afficher();
$li1->setCode (99); // on ne peut pas le lancer

$li1->setTitre("1984");

$li2 = new Livre();
$li2->titre = "Iliade";
$li2->afficher();



// voici la structure d'un Livre
$li3 = ['nom' => 'A brave new world', 'code' => 999];
function afficherLivre ($livre){
    //
}






$livre->afficher();













// include "voiture"

function retirer(&$unCompte, $montant)
{
    $unCompte['solde'] -= $montant;
}

function eliminer(&$unCompte)
{
    // effacer un compte
}

function accelerer (&$uneVoiture, $montant){
    // modifier la vitesse  
}

function eliminer(&$uneVoiture)
{
    // effacer une voiture
}


// reste du code