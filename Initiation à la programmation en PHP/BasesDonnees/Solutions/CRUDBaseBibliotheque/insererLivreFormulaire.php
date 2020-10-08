<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./insererLivreTraitement.php" method="POST">
        Titre du livre :
        <input type="text" name="titre"><br>
        Auteur du livre :
        <!-- "value" d'un option est la valeur envoyée dans le $_POST
        Le text entre les baliss (ex: Zella Kunde) est ce qu'on voit à l'écran -->
        <select name="auteur_id">
        
        <?php
            include "./config/db.php";

            try {
                $db = new PDO(DBDRIVER . ': host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME .
                    ';charset=' . DBCHARSET, DBUSER, DBPASS);
            }
            catch (Exception $e){
                echo "Erreur!!";
                echo $e->getMessage();
                die();
            }
         
            $sqlAuteurs = "SELECT id,nom,prenom FROM Auteur ORDER BY prenom";
            $stmt = $db->prepare ($sqlAuteurs);
            $stmt->execute();
            $arrayAuteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        
            foreach ($arrayAuteurs as $unAuteur){
                echo "<option value='".$unAuteur['id']."'>".$unAuteur['prenom']." ".$unAuteur['nom']."</option>";
            }
                //<option value='2'>Zella Kunde</option> 
        
        ?>     
        </select><br>

        Prix :
        <input type="text" name="prix"><br>
        Description du livre :
        <input type="text" name="description"><br>
        Date publication
        <input type="date" name="date_publication"><br>
        ISBN
        <input type="text" name="isbn"><br>


        <input type="submit" value="Envoyer">
    </form>


</body>

</html>