--***********************
--Transaction 
--***********************

--Un transaction permet de lancer des requêtes tellees que des modifications,et des annuler si besoin , conne si vous pouviez faire un "rctrl z


--transactions Simples:

START TRANSACTION; --on démarre la transaction
SELECT * FROM employes; --pour voir la table avant modification
UPDATE employes SET prenom = 'ALLO' WHERE id_employes= 739;


ROLLBACK;  --Donne l'ordre à MySql d'annuler la transaction, l'employé reprennant son prénom

COMMIT;  --VALIDE l'ensemble de la transaction

--si on ne fait ni rollback, ni commit,avant la déconnexion au SGBD, c'est un ROLLback qui s'effectue par défaut.



--TRANSACTION AVANCEE
START TRANSACTION;
SAVEPOINT point1;  --point  de sauvegarde appelé point 1
UPDATE employes SET prenom = "julien A" WHERE id_employes = 699;
SAVEPOINT point2;
UPDATE employes SET prenom = "julien B" WHERE id_employes = 699;

ROLLBACK TO point2;

--SOit 
ROLLBACK; -- ceci annule toute la trnsaction  -> On garde julien en base

--ou
COMMIT; --pour valider les opérations de la transaction -> on obtient julien B en base
