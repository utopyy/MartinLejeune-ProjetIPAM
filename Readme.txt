===========
VERSION PHP
===========
Le projet fonctionne avec la version 7.3.4 de php.


================
CONFIGURATION DB
================
Editer les constantes HOST, PORT, DBNAME, ROOTDB, PASSDB dans le fichier models/db.php.

HOST: chemin vers votre db MySQL
PORT: port de connexion
DBNAME: nom de la db MySQL
ROOTDB : utilisateur ayant accès en lecture/écriture à la db.
PASSDB : mot de passe de l'utilisateur utilisé pour la connexion à la db.

Créer une base de données MySQL ayant pour nom "wayprotein" et procéder au restore du dump du fichier wayprotein.sql accessible à la racine du répertoire.

============
INFOS UTILES
============

- Si vous ne voulez pas créer un compte, 
un utilisateur a été créé: login=user, password = user
un admin a été créé: login=admin, password = admin

- Le code a été commenté au mieux pour faciliter votre lecture du code.

- Pas encore implémenté:
	- "Achats" d'articles (et tout ce qui en découle: commandes, historique, panier, ...)
	- Modules javascript
	- Stats pour l'admin



