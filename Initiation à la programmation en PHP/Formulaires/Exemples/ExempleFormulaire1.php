<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./ExempleFormulaire1Traitement.php" method="POST">
        Nom<input type="text" name="nom">
        Prix<input type="number" name="prix"> 
        <br>

        <select name="menu">
            <option>Pizza</option>
            <option>Pasta</option>
        </select>
        <br>
        Bruxelles<input type="radio" name="choixRadio" value="Bruxelles">
        Gent<input type="radio" name="choixRadio" value="Gent">
        Seville<input type="radio" name="choixRadio" value="Seville">
 
        <br>        
        <input type="submit">

    </form> 


</body>
</html>