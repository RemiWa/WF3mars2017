--*************************
--TABLES VIRTUELLES : VUES
--*************************

--les vues ou tables virtuelles sont des objets de la base de donénes constituées d'un nom, et d'une requete de séléction.

--Une fois une vue définie, on peut l(utiliser comme on le ferait avec uen table, laquelle serait constituée des donénes selectionnées par al requête desfinissant la vue.

USE entreprise;

--creationd 'une vue
CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm';
--cette instruction crée une table virtuelle remplie avec les données du select

--Une seconde requête effectuée sur la vue:
SELECT prenom FROM vue_homme; --on peut effectuer toutes les opérations habituellesq sur cette table virtuelle vue_homme

--S'il y a un changement dnas la tbale d'origine, la vue est corrigée  dynamiquement car elle enregistre la requête select qui pointe vers la table d'origine. Inversement, s'il y a un changement dnas la table virtuelle, il s'impacte dans la table d'origine.
--il y a intéret à faire des vues en terme de gain de ressources , ou quand il ya des requêtes complexes à exécuter

SHOW TABLES; --cette vue est visible dnas la liste des tables avec cette instruction

--Supprimer une vue
DROP VIEW vue_homme;


--*************************
--TABLES temporaires
--*************************

--pour créer une table temporaire on fait

CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f'; --crée une table temporarie avec les données du SELECT précisée. Cette table s'afface quand on quitte la session et n'est pas lisible dans la liste des tables avec show tables

--Utiliser une table temporariie:
SELECT prenom FROM temp;--Affiche les prénoms de la table temporarie . COntrairement aux tables virtuelles, s'il y aun changement dnas la table d'origine, il n'est aps impacté dnas la tbale temporaire,e t inversement (car celle ci est une copie à un instant T) : Les donénes sont dupliquées.