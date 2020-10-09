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

-- 15. Obtenez les livres empruntés pendant le mois de Février de 2015
--     (MONTH : <https://www.w3schools.com/sql/func_mysql_month.asp>)

16. Obtenez les livres empruntés après le 1^er^ janvier 2015 (le plus
    récent le premier)

Requêtes avec plusieurs tableaux (jointures -- JOIN)
----------------------------------------------------

Les jointures :

17. Obtenez une liste où on affiche de couples titre du livre -- nom de
    l\'auteur

18. Obtenez une liste de tous les exemplaires de chaque livre

19. Obtenez les titres des livres empruntés par chaque client

20. Obtenez les titres des livres empruntés entre 2008 et 2010

21. Obtenez les noms des clients qui on emprunté les livres d\'Astérix

22. Considérez qu'un emprunt peut durer deux semaines au maximum.
    Obtenez une liste des exemplaires empruntés et des dates limite des
    emprunts (utilisez ADDDATE)

Requêtes diverses
-----------------

23. Obtenez le nombre de clients avec COUNT()
    <https://www.w3schools.com/sql/func_mysql_count.asp>

24. Obtenez le nombre de livres qui se trouvent à la bibliothèque

25. Obtenez le nombre de clients dont le nom contient la lettre 'b'

26. Obtenez le nombre d'exemplaires disponibles

27. Obtenez le nombre d'exemplaires disponibles d'un titre de votre
    choix




-- après
SELECT auteur.nom, livre.titre FROM livre INNER JOIN auteur 
ON livre.auteur_id = auteur.id;

-- ou la requête équivalente...

SELECT auteur.nom, livre.titre FROM auteur INNER JOIN livre 
ON livre.auteur_id = auteur.id;

