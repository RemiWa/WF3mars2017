--Creationd e la bdd

CREATE DATABASE bibliotheque;

USE bibliotheque;

--Copie / colle le contenu de bibliotheque.sql

--**********************
--EXERCICES
--**********************

--Quel est l'id abonné de LAURA?
SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

--L'ID abonné 2 est venu emprunté un livre à quelle date
SELECT date_sortie FROM emprunt WHERE id_abonne = 2 ;

--Combien d'emprunt on été effectués en tout?
SELECT COUNT(id_emprunt) FROM emprunt;

--combien de livres sont sortis le 2011-12-19?
SELECT COUNT(DISTINCT id_abonne) FROM emprunt WHERE date_sortie = '2011-12-19';

--Une vie est de quel auteru?
SELECT auteur FROM livre WHERE titre = 'Une Vie';

--De combien de livre d'Alex Dumas dispose-t-on.
Select COUNT (id_livre) from id_livre where auteur ='Alexandre Dumas';

--Quel Livre est le plsu emprunté ?

--Quel ID abonné emprunte le plus de livres?
select id_abonne, COUNT(id_emprunt) FROM emprunt GROUP BY id_abonne ORDER BY COUNT (id_emprunt) DESC LIMIT 1;








--********************************
--Les requetes imbriquées
--********************************

--Synhtaxe aide mémoire de la requête imbriquée:
--SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

--Afin de réaliser une requête imbriquée, il faut obligatoirement un camp en commun entre les deux tables.

--un champ NULL se teste avec IS NULL:
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- Affiche les id livres non rendus


--Afficher les titres de ces livres non rendus
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- Afficher le numérod es livres que chloé a emprunté ;
SELECT id_livre From emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe');  --quand il y a qu'un seul résultat dnas la requête iimbriquée, on met un signe ='

--Afficher e prénom des abonnés ayant emrpunté un livre le 19-12-2011
SELECT prenom FROM abonne WHERE id_abonne IN(SELECT id_abonne FROM emprunt WHERE date_sortie ='2011-12-19');

--Afficher le prénom des abonnés ayant emprunté un livre d'alphonse daudet'
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN(SELECT id_livre FROM livre WHERE auteur = " ALPHONSE DAUDET" ));

--Afficher les titres de livres que chloé a emprunté
SELECT titre FROM livre WHERE id_livre IN(SELECT id_livre FROM emprunt WHERE id_abonne IN( SELECT id_abonne FROM abonne WHERE prenom = 'chloé'));

--Afficher le titre de livre que CHLOE n'a pas encore rendu
SELECT titre FROM livre where id_livre IN(SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom='chloe'));

--Combien de livre benoit a emprunté
SELECT COUNT(id_abonne) FROM emprunt WHERE id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom ="benoit");

QUI a emprunté le plus de lvires?
SELECT prenom FROM abonne WHERE id_abonne = (SELECT (id_abonne) FROM emprunt ORDER BY COUNT(id_emprunt) DESC LIMIT 1); --remarque : On ne peut pas utiliser LIMIT dans un IN mais obligatoirement dnas un "="






--********************
--JOINTURES INTERNES
--********************

--LEs différences entre une jointure et une requête imbriquée: une requête imbriquée est possible seuelemnt dnas le cas où les champs affichés (ceux qui sont dnas le select) sont issus de la mêem table.
--Avec une reqête de jointure, les champs selectionnés peuvent être issus de table différentes.. Une jointure est une requête permettant de faire des relations entre les différentes tables afin d'avoir des colonnes associées qu ne forment qu'un suel résultat.

--afficher les dates de sortie et de rendu pour l'abonné guiullaume

SELECT a.prenom, e.date_sortie , e.date_rendu
FROM abonne a
INNER JOIN emprunt e 
ON a.id_abonne = e.id_abonne
WHERE a.prenom = 'guillaume';

--1ere ligne: ce que je souhaite afficher
--2eme ligne: la première table d'où proviennent les informations
--3 eme ligne la secnde table d'où proviennent les informations 
--4eme ligne: la jointure qui lie les deux tables avec le champ commun
--5 ligne la ou les conditions supplémentaires

--EXERCICE Connaitre les mouvements des livrres (titre,n date sortie , date rendu, écrits par ALphonse daudet)

SELECT l.titre, l.id_livre, e.date_sortie , e.date_rendu
FROM livre l
INNER JOIN emprunt e 
ON l.id_livre = e.id_livre
WHERE l.auteur = 'ALPHONSE DAUDET';


--QUI a emprunté une vie sur l'année 2011


SELECT a.prenom
FROM abonne a
INNER JOIN  emprunt e ON e.id_abonne = a.id_abonne
INNER JOIN livre l ON l.id_livre = e.id_livre
WHERE l.titre = 'Une Vie' AND e.date_sortie BETWEEN "2011-12-17" AND "2011-12-19";

--AFFICHER kle nombre de livres empruntés par chaque abonnés

SELECT a.prenom, COUNT(e.id_emprunt) AS nombre
FROM abonne a
INNER JOIN emprunt e ON e.id_abonne = a.id_abonne
GROUP BY a.prenom;

--Afficher qui a emprunté quels livres et à quelle datte de sortie
--prenom , date sortie , titre

SELECT a.prenom, l.titre, e.date_sortie  
FROM abonne a
INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
INNER JOIN livre l ON e.id_livre = l.id_livre;

--ICI pasde GEROUP BY car il est normal que les prénoms sortent plusieurs fois (i²ls peuvent emprunter plusieurs livres)

--AFFICHER le prénom des abonnés avec les id livres qu'ils ont emprunté

SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e ON a.id_abonne = e.id_abonne;





--********************
--JOINTURES EXTERNES
--********************


--PErmet de faire des requetes sans correspondances exigées entre le svaleurs requêtées.
--S'ajouter dans al table abonné
INSERT INTO abonne (prenom) VALUES('moi');

--si on relance la dernière requête de jointure intere, nous n'apparaissons pas dasn la liste. Pour y remédier nous faisons une requete externe:

SELECT a.prenom, e.id_livre
FROM abonne a
LEFT JOIN emprunt e
ON e.id_abonne = a.id_abonne;

-- la clause LEFT JOIN permet de rapattrier toutes les données dans la table consdérée comme étant à gauche de l'instruction LEFT JOIN donc "abonnés" dans notre cas sans correspondance exigée dans l'autre table (emprunt ici) 

--VOICI le cas avec un livre supprimé de la bibliotheque
DELETE FROM livre WHERE id_livre = 100;

--on visualise les emprunts avec une jointure interne:
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt 
INNER JOIN livre
ON emprunt.id_livre = livre.ID_livre;

--One ne voit aps dasn cette requete le livre "une vie" qui a été supprimé

--On fait al même chose avec les jointures externes:
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt 
LEFT JOIN livre
ON emprunt.id_livre = livre.ID_livre;

--ICI touis les emprunts sont affichés y compris ceux pour lesquels les titres sont supprimés et remplacés par NULL.




--********************
--UNION
--********************
--UNion permet de fusionner le résultat de duex requetes dans la même liste de résultat
--exemple: si on désinscrit GUillaume (suppression du profild e la table abonné), onn peut afficher à la fois tous les livres empruntés y compris ceux par des lecteurs désisncrits (on affiche null à la place de guillaume), et tous les abonnésy compris ceux qui 'nont rien empruntés (on affiche 'null dans id_livre pour l'abonné 'moi')=
DELETE FROM abonne WHERE id_abonne=1;

--Requete sur les livres empruntes  

(SELECT emprunt.id_livre, abonne.prenom FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne)
UNION
(SELECT emprunt.id_livre, abonne.prenom FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);


