--********************
--Fonctions prédéfinies
--********************

--Fonctions prédéfinies  /prévues par le language SQL et exécutée par le developpeur

--DErnier ID inséré:
INSERT INTO abonne (prenom) VALUES ('test');
SELECT LAST_INSERT_ID(); --permet d'afficher le dernier identifiant inséré'

--Fonctions de dates
SELECT *, DATE_FORMAT(dat_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt; --met els dates du champ date_rendu_fr au format français jj / mm / AAAA


SELECT NOW() --Affiche la date et l'heur en cours'

SELECT DATE_FORMAT(NOW();%d-ù%-%Y )

SELECT CURDATE(); --retourne la date du jour toujours au format us)

SELECT CURTIME(); --Retourne l'heure au format HH/MM/SS'

--crypter un mot de passe avec l'algo AES:
SELECT PASSWORD('mypass');--affiche 'mypass' crypté par l'algorythme AES'
INSERT INTO abonne (prenom) VALUES (PASSWORD('my pass')); --insère le mot de passe crypté en abse

--Concaténation
SELECT CONCAT ('a', 'b','c'); --concatène les 3 chaines de caractè_res

SELECT CONCAT_WS(' - ', 'a','b','c'); -- Concatènation avec uns éparateur déclaré en premeier dnas les paraenthèses

--Fonctions sur les chaines de caractères
SELECT SUBSTRING ('bonjour', 1, 3); -- compte 3 à partir de la position 1
SELECT TRIM('    bonjour     ');  --supprime les espaces avant et après la chaine de caractères