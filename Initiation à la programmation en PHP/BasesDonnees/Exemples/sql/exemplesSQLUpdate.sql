-- Changera toutes les villes de départ à 'Gent' !!!
UPDATE trains SET villeDepart = 'Gent'

UPDATE trains SET villeDepart = UPPER(villeDepart)
UPDATE trains SET villeDestination = UPPER(villeDestination)

-- à ne pas faire car on aura probablement de doublons de villes!!!
-- ex: GENT et GENK partagent les trois premières lettres
UPDATE trains SET villeDestination = LEFT(villeDestination,3)

-- UPDATE avec filtre
-- ex: Changer tous les GENT en GENK (villesDepart)
UPDATE trains SET villeDepart = 'GENK' WHERE villeDepart = 'GENT'

-- ex: Changer tous les GENK en GENT (villesDepart et villesArrive)
-- pas possible de cette manière, ça changera les deux villes à GENT 
-- à chaque fois
UPDATE trains SET villeDepart = 'GENT', villeDestination = 'GENT'
WHERE villeDepart = 'GENK' OR villeDestination = 'GENK'

if (villeDepart = 'GENK' OR villeDestination = 'GENK'){
    villeDepart = "GENT";
    villeDestination = "GENT";
}

-- façon correcte: deux lignes
UPDATE trains SET villeDepart = 'GENT' WHERE villeDepart = 'GENK';
UPDATE trains SET villeDestination = 'GENT' WHERE villeDestination = 'GENK';







