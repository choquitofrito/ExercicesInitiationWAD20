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



-- après
SELECT auteur.nom, livre.titre FROM livre INNER JOIN auteur 
ON livre.auteur_id = auteur.id;

-- ou la requête équivalente...

SELECT auteur.nom, livre.titre FROM auteur INNER JOIN livre 
ON livre.auteur_id = auteur.id;

