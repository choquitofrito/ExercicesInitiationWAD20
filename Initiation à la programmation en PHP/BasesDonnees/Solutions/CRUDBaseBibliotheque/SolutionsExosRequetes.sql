-- 1. Obtenez la liste de Client, toutes les informations
SELECT * FROM Client;

-- 2. Obtenez le nom et le prénom de tous les Client
SELECT nom, prenom FROM Client;

-- 3. Obtenez le titre et le prix de tous les Livre
SELECT titre, prix FROM Livre;

-- 4. Obtenez tous les noms de Client en majuscule (UPPER)
SELECT UPPER (nom) FROM Client;

-- 5. Obtenez l'adresse de tous les Client qui s'appellent 'Jones'
SELECT adresse FROM Client WHERE nom='Jones';

-- 6. Obtenez tous les Livre de la collection "Asterix"
SELECT * FROM Livre WHERE titre LIKE '%Asterix%';

-- 7. Obtenez tous les Livre qui coutent plus de 20 euros
SELECT * FROM Livre WHERE prix >20;

-- 8. Obtenez la liste de Livre en ordre alphabétique (ascendant) en utilisant "ORDER BY"
SELECT * FROM Livre ORDER BY titre; -- s'il y avait 

-- 9. Obtenez tous les Client dont le nom commence par 'J' (utilisez LIKE)
SELECT * FROM Client WHERE nom LIKE 'J%';

-- 10. Obtenez tous les Client dont le nom contient la lettre 'e'
SELECT * FROM Client WHERE nom LIKE '%e%';

-- 11. Obtenez tous les livres qui coutent entre 10 et 20 euros
SELECT * FROM Livre WHERE prix >= 10 AND prix <=20;
-- on peut le faire aussi avec BETWEEN... cherchez par vous-mêmes

-- 12. Obtenez tous les livres qui coutent moins de 13 euros et les livres
-- qui coutent plus de 25 dans la même requête
SELECT * FROM Livre WHERE prix < 13 OR prix >25;
-- Comprennez-vous le OR???

-- 13. Obtenez tous les livres de la collection "Asterix" qui coutent
--     moins de 20 euros
SELECT * FROM Livre WHERE titre LIKE '%Asterix%' WHERE prix < 20;

-- 14. Obtenez tous les livres publiés à partir de 2008 (y inclus 2008)
SELECT * FROM Livre WHERE date_publication > "2008-01-01";

-- 15. Obtenez les emprunts pendant le mois de Février de 2015
--     (MONTH : <https://www.w3schools.com/sql/func_mysql_month.asp>)
SELECT * FROM Livre WHERE MONTH(date_publication) = 2 AND YEAR(date_publication) = 2015;


-- 16. Obtenez les emprunts depuis le 1er janvier 2015 (le plus
--     récent le premier)
SELECT * FROM Emprunt WHERE date_emprunt > "2015-1-1" ORDER BY date_emprunt ;

-- Jointures
-- 17. Obtenez une liste où on affiche de couples titre du livre -- nom de l'auteur
SELECT Livre.titre, Auteur.nom, Auteur.prenom FROM auteur
INNER JOIN Livre 
ON auteur.id = livre.auteur_id;

-- 18. Obtenez une liste de tous les exemplaires de chaque livre
SELECT Livre.titre, Exemplaire.id as idExemplaire, Exemplaire.etat FROM Livre
INNER JOIN Exemplaire
ON Exemplaire.livre_id = Livre.id;

-- 19. Obtenez les titres des livres empruntés par chaque client
SELECT Client.nom, Livre.titre FROM Client
INNER JOIN emprunt 
ON emprunt.client_id = client.id
INNER JOIN exemplaire
ON exemplaire.id = emprunt.exemplaire_id
INNER JOIN livre
ON livre.id = exemplaire.livre_id
ORDER BY client.nom, client.prenom, livre.titre;

-- on peut éviter les doublons avec DISTINCT 
SELECT DISTINCT Client.nom, Livre.titre FROM Client
INNER JOIN emprunt 
ON emprunt.client_id = client.id
INNER JOIN exemplaire
ON exemplaire.id = emprunt.exemplaire_id
INNER JOIN livre
ON livre.id = exemplaire.livre_id
ORDER BY client.nom, client.prenom, livre.titre;

-- 20. Obtenez les titres des livres empruntés entre 2008 et 2010

SELECT livre.titre, emprunt.date_emprunt, emprunt.date_retour FROM livre
INNER JOIN exemplaire
ON livre.id = exemplaire.livre_id
INNER JOIN emprunt
ON exemplaire.id = emprunt.exemplaire_id
WHERE YEAR (emprunt.date_emprunt) >= 2008 
AND YEAR(emprunt.date_emprunt) <= 2010
ORDER BY YEAR(emprunt.date_emprunt);
-- notez qu'on peut trier aussi en utilisant une fonction


-- 21. Obtenez les noms des clients qui on emprunté les livres d'Astérix
SELECT DISTINCT Client.nom FROM Client
INNER JOIN emprunt 
ON emprunt.client_id = client.id
INNER JOIN exemplaire
ON exemplaire.id = emprunt.exemplaire_id
INNER JOIN livre
ON livre.id = exemplaire.livre_id
WHERE livre.titre LIKE '%Asterix%'
ORDER BY client.nom, client.prenom, livre.titre;


-- 22. Considérez qu'un emprunt peut durer deux semaines au maximum. Obtenez une liste des exemplaires empruntés et des dates limite des emprunts (utilisez ADDDATE)
SELECT livre.titre, emprunt.date_emprunt, DATE_ADD(emprunt.date_emprunt, INTERVAL 14 DAY) as date_limite FROM livre
INNER JOIN exemplaire
ON livre.id = exemplaire.livre_id
INNER JOIN emprunt
ON exemplaire.id = emprunt.exemplaire_id;
