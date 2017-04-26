--ouvrir la console SQL sous XAMPP:


    --Setting environment for using XAMPP for Windows.
    --Etudiant@WF3-P14202 c:\xampp
    -- # cd c:\xampp\mysql\bin
   -- mysql.exe -u root --password


-- lignes de commentaires en sql débutent par "--"

--les requetes ne sont aps sensibles à la casse, cependant, par convention, on écrit tous les mots clés en majuscules.


--***************************************

--Requetes génrales

--***************************************

CREATE DATABASE entreprise; -- créer une nouvelle base de données appelée "entreprise"


SHOW DATABASES; --popur afficher les bases de donénes existantes

--Ne pas utiliser dnas la console

DROP DATABASE entreprise; --supprimer une base de données avec tout son contenu

DROP TABLE employes; --supprimer uen table employés

TRUNCATE employes; --vide la table employes de son contenu

--on peu coller dans la console

USE entreprise;;  --se connecter à la BDD entreprise

SHOW TABLES; --permet de listeer des tables dela bdd en cours d'utilisation


DESC employes; --permet d'observer la structure de la table ainsi que les champs (DESC pour describe)'


--***************************************

--Requetes de sélections

--***************************************

SELECT nom, prenom FROM employes; -- Affiche (selectionne) le nopm et le prénom de la table employés. Selec selectionne le nom des champs indiqués, From la ou les tables utilisées

SELECT service FROM employes;

--Distinct
--Pour éliminer les doublons, on utilise distinct:
SELECT DISTINCT service FROM employes ; 


--aLL ou *
--On peut afficher toutes les informations issues d'une table avec une "*" pour dire all'

SELECT * FROM employes; --affichje toute la table employes

--Clause WHERE
SELECT prenom, nom FROM employes WHERE service = 'informatique'; --affiche le prénom et le nom des employés du service infomatique .Le nom des champs ou des tables ne prennnent pas de '' alors que les valeurs en prennent. Cepedant, s'il s'agit d'un chiffre on ne met pas de Quotes'

--Between

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; --affiche les employés dont la date d'embauche est entre 2006 et 201°'

--LIKE 
SELECT prenom FROM employes WHERE prenom LIKE 's%'; --affiche le prénome des employés commencant par s. Le signe % est un joker qui remplace 

SELECT prenom FROM employes WHERE prenom LIKE '%-%'; --affiche les prenomsqui contienntn un tirer. Like est utilisé en outre pour les formulaires de recher sur le ssites

--opérateurs de comparaison:
SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; --affiche les prenoms et le nom des employes n'étant pas du service informatique'

--ORDER BY pour faiire des tris
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire; --affiche les employes apr salaire en ordre croissant (par defaut)

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenome DESC; --ASC pour un tri ascendant, DESC pour un tri DESCENDANT. ici on tri les salaires par ordre croissant, puis à salaire identique les prenoms par ordre decroissant*

--LIMIT
SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1; --affiche l'employé ayant le salaire le plsu élevé; on trie d'abor les salaires apr ordre décroissant (pour avoir le plus élevé en premier) puis on limite le résultat au premier enregistrement avec LIMIT 0,1. Le 0 signinfie le point de départ de lLIMIt et le 1 signifie prendre 1 enregistrmeemnt. On utilise LIMIt dans la pagination sur les sites.

--AS (pour alias)
SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes; --affiche le salaire sur 12 mois des employes. Salaire annuel est un alias qui stocke la valeur de ce qu'il précède'

--SUM 
SELECT SUM(salaire*12) FROM employes; --affiche le salaire total annuel de tous els employés. SµUM permet d'additionner des valeurs de champs différents'

--MIN et MAX
SELECT MIN(salaire) FROM emmployes -- affiche le saliare le plus bas
SELECT MAX(salaire) FROM employes; 

SELECT prenom, MIN(salaire) FROM employes; ---ne donne pasz le résultat attendu, car affiche le premier prénom rencontré dans la tabele (ean pierre). Il faut utiliser ORDER BY et LIMIT au dessus.
SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

--AVG
SELECT AVG(salaire) FROM employes; --affiche le salaire moyen de l'entreprise'

--ROUND
SELECT ROUND(AVG(salaire), 1) FROM employes; --affiche le salaire moyen arrondi à 1 chiffre après la virgule

--Count
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; --affiche le nombred'employes féminins'

--IN
SELECT prenom, nom, service FROM employes WHERE service IN('comptabilite', 'informatique'); --affiche les employés appartenant à la comptabilité ou à l'infomratique'

--NOT IN
SELECT prenom, nom, service FROM employes WHERE service NOT IN('comptabilite', 'informatique'); --affiche les employ's n'appartenant pas à la comta ou à l'info'

--AND et OR
SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND  salaire < 2000 ; --affiche le rpénom des commerciaux dont le salaires est inferieur ou égal à 2000

SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300;

--GROUP BY
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service; --Affiche le nombre d'employés par service.'GROUP BY distribue les résultats du comptage par les services correspondants$

--GROUP BY ... HAVING
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING  nombre > 1; --affiche des service ou il y a plus d'un employé' Having remplace whrer dans un GROUP BY








--***************************************

--Requetes d'insertion'

--***************************************

SELECT * FROM employes; --on observe la table avant de la modifier

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800); --insertion d'un employé. Notez que l'ordre des champs ennoncés entre les 2 parenthèses doit êtr ele même

--une reqête sans préciser els champs concernés
INSERT INTO employes VALUES(8060, 'test','test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop') --insertion d'un employé sans préciser la liste des champs si et seulemetn si le nombre et l'ordre des valeurs atendues sont rscpectées. ici erreur car il ya une valeur en trop.§











--***************************************

--Requetes de modification

--***************************************

UPDATE employes SET salaire = 1870 WHERE nom = 'cottet'; --modifie le salaire de l'employé de nom côttet'

UPDATE employes SET salaire = 1871 WHERE id_employes = 699; --il est recommandé de faire des modifications de données par les id car ils sont uniques. Cela évite d'updater plusieurs enregistrements à la fois.'

UPDATE employes SET salaire = 1872, service =  "autre" WHERE id_employes = 699; --on modifie deux valeur s dans la même requête

-- A ne pas faire : un update sans clause W§HERE --ici les salaires de tous les employés seraient à 1870


--REPLACE

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600); ---- L'id employé 2000 n'existant pas, REPLACE se coporet comme un insert

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2601); -- là il se comporte comme un update




--***************************************

--Requetes de suppression

--***************************************

--DELETE

DELETE FROM employes WHERE id_employes = 900; --suppression de l'employe dont l'id est 900

DELETE FROM employes WHERE service = 'informatique' AND ID_employes != 802; --supprime tous les informaticiens sauf 1 dont l'id est 802'

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990; --OR supprime duex employes qui n'ont pas de points communs. il s'agit d'un OR et non pas d'un AND car un employé ne peut pas avoir deux ID employés différents


-- A ne pas faire: un DELETE sans clause WHERE:
DELETE  FROM employes; --revient a faire un TRUCATE de table qui est irréversible



--***************************************

--EXERCICE

--***************************************

-- AFFCiher le servide de l'employé 547
SELECT service FROM employes WHERE id_employes = 547;

-- Afficher la date d'embauche d'Amandine
SELECT date_embauche FROM employes WHERE prenom  = 'Amandine';

--3 Afficher le nombre de commerciaux
SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

--4 afficher le cout des commericaux sur 1 an
SELECT SUM(salaire) FROM employes WHERE service ='commercial';

--5 Afficher le salire moyen par service
SELECT AVG(salaire), service FROM employes GROUP BY service;

--6 Afficher le nombre de recrutements sur l'année 2010 
SELECT COUNT(date_embauche) FROM EMPLOYES WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31'; 

--7 Augmenter le salaire de chaque employe de 100€
UPDATE employes SET salaire = salaire + 100;

--8 Afficher le nombre de services différents 
SELECT COUNT(DISTINCT service) FROM employes;

-- 9 Aaficher le nombre d'employés par services 
SELECT COUNT(id_employes) FROM employes GROUP BY service;
--10 Afficher les infos de l'employé du service commercial ayant le salaire le plus élevé
SELECT nom, prenom, sexe, salaire, service, id_employes FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 0,1;

--11 Affcher l'employé ayant été embauché en derneir.'
SELECT id_employes, prenom FROM employes ORDER BY date_embauche DESC LIMIT 0,1;