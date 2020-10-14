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


-- 23. Obtenez le nombre de clients avec COUNT()
-- function COUNT compte le nombre de lignes. 
-- ATTENTION! pas d'espace entre COUNT et la parenthèse! étrange de la part des DEVs :/
SELECT COUNT(*) FROM client;

-- on peut choisir aussi un champ et COUNT comptera le nombre de lignes où le champ n'est pas null 
-- Dans notre BD il n'y a pas de nulls, le "" n'est pas null
SELECT COUNT(client.nom) FROM client;

-- 24. Obtenez le nombre de livres qui se trouvent à la bibliothèque
SELECT COUNT(*) FROM livre;

-- 25. Obtenez le nombre de clients dont le nom contient la lettre 'b'
SELECT COUNT(*) FROM client WHERE nom LIKE '%b%';

-- 26. Obtenez le nombre d'exemplaires disponibles
-- le tout...
SELECT COUNT(*) FROM exemplaire
INNER JOIN emprunt 
ON exemplaire.id = emprunt.exemplaire_id;
-- ou le nombre de disponibles à la date d'aujourd'hui
-- Pour tester, mettez une date de retour dans le futur car les 
-- randoms de Faker vont jusqu'à la date de la génération des données
SELECT COUNT(*) FROM exemplaire 
INNER JOIN emprunt 
ON exemplaire.id = emprunt.exemplaire_id
WHERE date_retour < CURRENT_DATE;

-- 27. Obtenez le nombre d'exemplaires disponibles d'un titre de votre choix
SELECT Livre.titre, Exemplaire.id as idExemplaire, Exemplaire.etat FROM Livre
INNER JOIN Exemplaire
ON Exemplaire.livre_id = Livre.id
WHERE Livre.titre = 'Les aventures de Matilde'; -- attention : il faut avoir au moins un exemplaire du livre choisi! 


-- 28. Obtenez tous les livres dont le titre commence par 'V'
SELECT * FROM livre WHERE titre LIKE 'V%';
-- ou avec LEFT
SELECT * FROM livre WHERE LEFT(titre,1) = 'V';

-- GROUP BY!


-- 29. Obtenez le nombre d'exemplaires de chaque livre (afficher le code du
-- livre, pas besoin du titre)
select livre.id,count(*) FROM exemplaire
inner join livre 
on exemplaire.livre_id = livre.id
group by livre.id;

-- 30. Obtenez le nombre d'exemplaires de chaque livre (afficher le titre
--     du livre aussi)
select livre.id,livre.titre,count(*) FROM exemplaire
inner join livre 
on exemplaire.livre_id = livre.id
group by livre.id, livre.titre; 
-- observer que, quand on utilise GROUP BY, 
-- si la colonne est dans les select elle doit être aussi dans le group by


-- 31. Obtenez la liste d'exemplaires qui ont été empruntés cette année
SELECT exemplaire.* FROM exemplaire
INNER JOIN emprunt 
ON exemplaire.id = emprunt.exemplaire_id
WHERE YEAR (date_emprunt) = YEAR (CURRENT_DATE);

-- 32. Obtenez le nombre d'emprunts par année
SELECT YEAR(emprunt.date_emprunt),COUNT(*) FROM emprunt
GROUP BY YEAR(emprunt.date_emprunt)
ORDER BY YEAR(emprunt.date_emprunt),COUNT(*); -- si c'est dans le select, c'est dans le GROUP BY

-- 33. Obtenez le nombre de emprunts réalisés par chaque client
SELECT client.id, client.nom, client.prenom, COUNT(*) FROM emprunt
INNER JOIN client
ON client.id = emprunt.client_id
GROUP BY client.id, client.nom, client.prenom




