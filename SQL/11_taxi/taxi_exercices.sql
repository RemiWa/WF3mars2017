--1 qui conduit la voiture d'id vehicule 503?
SELECT prenom, nom FROM conducteur WHERE id_conducteur IN(SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = '503');

--2 qui conduit quel modèle

SELECT c.prenom, v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur
INNER JOIN  vehicule   V ON a.id_vehicule=v.id_vehicule;

--3. Insérez vous dans la table conducteur Puis afficher tous les conducteurs (même ceux qui n'ont pas de véhicules affectés') ainsi que les modèles de véhicules
INSERT INTO conducteur (id_conducteur, prenom, nom) VALUES ('6','Remi','Warin');

SELECT c.id_conducteur, c.prenom , v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule;


-- 4-Ajouter l'enregistrement suivannt
INSERT INTO vehicule( marque, modele, couleur, immatriculation) VALUES ('renault', 'espace', 'noir', 'ze-123-RT');

SELECT c.prenom , v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v ON a.id_vehicule = v.id_vehicule;


--afficher tous els modèles de véhicules y compris ceux qui n'ont pas de chauffeurs affectés et le prénom des conducteurs'
(SELECT c.prenom , v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule)
UNION
(SELECT c.prenom , v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v ON a.id_vehicule = v.id_vehicule);

--5. Afficher le rpénom des condutceurs y compris ceux qui nont pas de véhiculeset tous les mdoèles y compris ceux qui n'ont pas de chauffeurs'