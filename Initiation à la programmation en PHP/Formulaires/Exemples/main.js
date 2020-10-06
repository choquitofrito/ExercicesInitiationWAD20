console.log("je suis là, le script js");

// exemples d'affichage 
console.log (document.getElementById ("btnHello"));
console.log (document.getElementById("monH5"));

var btn = document.getElementById ("btnHello");

btn.addEventListener ("click", function (){
    console.log ("on a cliqué sur moi!");
});
// dans une seule ligne
document.getElementById ("monH5").addEventListener ("mouseover", function (){
    console.log ("on passe sur h5");
});



