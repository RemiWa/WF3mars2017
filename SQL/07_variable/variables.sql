--*************************
--variables
--*************************

-- une variable est un espace mémoire nommé qui permet de conserver une valeur.

-- Il est possible de visualiser les variables system:
SHOW VARIABLES;

SELECT @@version; --on met @@ pour accéder à une variable system

--Déterminer nos propres variables:
SET @ecole = 'WF3'; --Déclare une variable école et lui affecte la valeur 'WF3''
SELECT @ecole; --on peut acceder au contenu de cette variable par son nom