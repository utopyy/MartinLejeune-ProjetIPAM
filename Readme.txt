===========
VERSION PHP
===========
Le projet fonctionne avec la version 7.3.4 de php.

==============
VERSION JQUERY
==============
Le projet fonctionne avec la version 3.4.1 de jquery.

=================
VERSION BOOTSTRAP
=================
Le projet fonctionne avec la version v4.1.3 de bootstrap.

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

=============
COMPTES CREES
=============
*Utilisateurs
login: user, mdp: user
login: user2, mdp: user2
login: user3, mdp: user3
login: user4, mdp: user4 (compte sans commandes réalisées)

*Administrateur
login: admin, mdp: admin

===============
INFOS PRATIQUES
===============
- Un article supprimé reste dans la db (champ delete = 1), idem pour les utilisateurs.
- Des images de même largeur et hauteur sont disponibles dans un le dossier public>img>imgs_for_test dans le cas où vous voudriez tester l'ajout ou la modification d'une image liée à un article.
(Si l'image upload n'est pas de même largeur/hauteur, l'article ne peut pas être créé/modifié)





