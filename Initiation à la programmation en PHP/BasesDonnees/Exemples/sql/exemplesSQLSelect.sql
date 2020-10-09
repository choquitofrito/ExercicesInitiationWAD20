-- SELECT de toutes les colonnes 
SELECT * FROM trains
-- SELECT de quelques colonnes
SELECT villeDepart, villeDestination FROM trains
-- SELECT avec un filtre simple (WHERE)
SELECT * FROM trains WHERE villeDestination='Anvers' 
-- SELECT avec un friltre composé (WHERE)
SELECT * FROM trains WHERE villeDepart='Bruxelles' AND villeDestination='Anvers' 

-- SELECT avec une fonction
-- https://www.w3schools.com/sql/sql_ref_mysql.asp
SELECT id,code,UPPER(villeDepart),UPPER(villeDestination) FROM trains

-- SELECT avec un filtre et une fonction
SELECT id, code, villeDepart, villeDestination FROM trains WHERE LEFT(villeDepart,3) = 'Bru'
-- ex en PHP : $sql = "SELECT * FROM trains WHERE UPPER(villeDepart)=:villeDepart";

-- LIKE: Selection avec un fragment de la donnée
-- ex: tous les trains dont la ville de départ commence par 'Bru'
SELECT * FROM trains WHERE villeDepart LIKE 'Bru%' 
-- ex: tous les trains dont la ville de départ finit par 's'
SELECT * FROM trains WHERE villeDepart LIKE '%es' 
-- ex: tous les trains dont la ville contient un certain texte
SELECT * FROM trains WHERE villeDepart LIKE '%xe%'
-- ex: recherche par fragment de texte
SELECT * FROM trains WHERE villeDepart LIKE '%rs%' OR villeDestination LIKE '%en%'

-- exemples jointures 

-- vieille notation
SELECT titre, nom, prenom FROM livre, auteur 
WHERE auteur.id = livre.auteur_id
AND livre.prix > 30;
-- "nouvelle" notation 
SELECT titre, nom, prenom FROM auteur
INNER JOIN livre 
ON auteur.id = livre.auteur_id
WHERE livre.prix >30;


-- jointure à trois tableaux!

-- Connaitre les dates d'emprunt et de retour des exemplaires de tous les livres
SELECT livre.titre, exemplaire.id, exemplaire.etat, emprunt.date_retour, emprunt.date_emprunt
FROM livre 
INNER JOIN exemplaire
ON livre.id = exemplaire.livre_id
INNER JOIN emprunt
ON exemplaire.id = emprunt.exemplaire_id
order by livre.titre, emprunt.date_emprunt, emprunt.date_retour, exemplaire.etat


-- Connaitre les dates d'emprunt et de retour de tous les exemplaires 
-- de tous les livres
SELECT livre.titre, exemplaire.id AS idExemplaire, emprunt.date_emprunt, emprunt.date_retour FROM livre 
INNER JOIN exemplaire
ON livre.id = exemplaire.livre_id
INNER JOIN emprunt
ON exemplaire.id = emprunt.exemplaire_id
WHERE titre LIKE "%Asterix%"
ORDER BY livre.titre, exemplaire.id, emprunt.date_emprunt, emprunt.date_retour














