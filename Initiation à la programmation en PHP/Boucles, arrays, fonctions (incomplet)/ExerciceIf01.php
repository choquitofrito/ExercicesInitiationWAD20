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

// if (6 > 5){
//     echo "6 > 5\n";    
// }

// if (true){
//     echo "true!\n";
// }

// $a = 6;
// $b = 8;
// if ($a < $b){
//     echo '$a < $b';
//     echo "\n";
// }

// $a = 7;
// $b = 8;
// if ($a = $b){   // if (8)
//     echo 'affectation!';
//     echo "\n";
// }

// $a = 7;
// $b = 0;
// if ($a = $b){   // if (0)
//     echo 'affectation à 0!';
//     echo "\n";
// }

// if ("false"){
//     echo "false en string";
// }

// différence entre ==  et === (types aussi)
echo "\n";
$a = 8;
$b = 8;
if ($a == $b){
    echo '1. $a == $b!';
    echo "\n";
}

$a = "8";
$b = 8;
if ($a == $b){
    echo '2. $a == $b!';
    echo "\n";
}


$a = "8";
$b = 8;
if ($a === $b){
    echo '3. $a === $b!';
    echo "\n";
}

if ("" == false){
    echo 'ok, les deux sont faux'; 
    echo "\n";   
}












