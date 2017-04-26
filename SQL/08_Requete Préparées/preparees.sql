********************
--requêtes préparées
********************

--les requetes préparées sont des requêtes qui dissocient les phases analyse / interpréation / Execution. La préparation de la requête consiste à réaliser les étapes d'analyse et d'interprétation. Ensuite, on effectue l'exéctuion à part.

-- la séparation des phaases permet un gaind e perf quand une requête odit être executée plusieurs fois. On execute une seule fois les 2 premières phases et x fois la denrière

---Requête préparée sans marqueur
--1 Preparatio,n

PREPARE req FROM "SELECT * FROM employes WHERE service = 'commercial'";  --déclare une requête ^préparée

--2 executiond e la requête:
EXECUTE req;
--on peut executer la requete plusieurs fois sans refaire le cycle analyse / interpretaiton qui implique un gaind e perfs

--Requetes préparéer avec un marqueur "?"
--1 preparation : 

PREPARE req2 FROM "select * FROM employes WHERE prenom = '?'"; -- le "?" est un marqueur qui attend une valeur

--2 execution
SET @prenom = 'emily'; --Déclare et affecte la variable prenom
EXECUTE req2 USING @prenom;

--supprimer une requête préparée
DROP PREPARE req2;

--les requetes préparées ont une dureée de vie courte. elles sont supprimées des qie l'on quitte la sassion'