# Documentation 

## Objet de l'application
 Le projet King of Fighter est un projet de groupe initié dans le cadre de la formation webforce 3, promotion 3 d'octobre 2014 à février 2015.
 Enthousiamés par le jeu vidéo King of Fighter de la fin des années 90, 5 joueurs de la promotion se sont lancés dans une compétition pour determiner le meilleur joueur.
 
 Sommaire:

 - [joueurs.php](doc/joueurs.md)
 - [classement.php](doc/classement.mddown)
 - [ancienClassement.php](doc/anciensClassements.md)
 - [header.php](header-footer.md)
 - [footer.php](header-footer.md)
 - [configuration.php](doc/configuration.md)
 - [kof.php](doc/kof.md)


 
 Sous l'impulsion du professeur de PHP, le projet a permis d'aborder les thèmes techniques suivants:
 
### 1 - Structuration d'un programme informatique de site web via :
- la création d'une documentation sous le [format markdown](http://fr.wikipedia.org/wiki/Markdown)
- l'insertion dans le header et le footer des principales fonctions et variables globales à tout programme et la base de données liée au site
- la création d'un fichier dédié aux principales fonctions communes à tout le programme

### 2 - Création d'une base de donnée sous [phpmyadmin](http://localhost/phpmyadmin) et connexion à un serveur local [xampp](https://www.apachefriends.org/index.html)
Cette base de donnée contient 3 tables :

- la table "joueurs" qui contient: id, nom, prenom, date d'inscription, pseudo, mot de passe et la photo
- la table "journees" qui contient: date, saison, journee 
- la table "positions" qui contient: joueur, position, journee, saison 

A noter que l'ensemble des identifiants de connexion sont inclus dans le fichier "configuration.php".
Pour importer la base de données : importer le fichier "kof.sql" du dossier "base de données" à la racine du projet


### 3 - Initiation aux requêtes SQL par la création d'un site web dont la mise en page est assurée par [Bootsrap](http://getbootstrap.com/css/) et contenant 5 pages:
- l'accueil
- la liste des joueurs
- le classement des 3 premiers joueurs de la dernière journée de la dernière saison
- le classement des 3 premiers joueurs des journees et des saisons précédentes
- la page d'inscription au tournoi


## Rédacteurs et synthèse de l'ensemble des fichiers du site :

#### 3.1 - l'accueil

#### 3.2 - la liste des joueurs: rédacteurs Florian et Alexandro [joueurs.php](doc/joueurs.md)
Afficher la liste de tous les joueurs sous forme de tableau via une requête SQL

#### 3.3 - Le classement des 3 premiers joueurs de la derniere journee de la derniere saison: rédacteurs Alexandre et Julien [classement.php](doc/classement.mddown)
Obtenir le classement de la dernière journée de la dernière saison et afficher le classement des joueurs dans l'ordre croissant via des requêtes SQL

#### 3.4- Le classement des 3 premiers joueurs des journees et des saisons précédentes: rédacteurs Alexandre et Julien [ancienClassement.php](doc/anciensClassements.md)
Obtenir le classement de chaque saison et de chaque journée pour afficher le classement des joueurs dans l'ordre croissant via des requêtes SQL

#### 3.5 - la page d'inscription au tournoi : en cours de construction
_____________

Fichiers de structure :
#### 3.6 - Header, footer et configuration:  rédacteurs Maria et Khaled [header.php](header-footer.md), [footer.php](header-footer.md), [configuration.php](doc/configuration.md)
Insertion dans le header des informations pour la connection au serveur et des propriétés HTML Bootstrap
Insertion dans le footer des script javascript et des informations copyrigth
Insertion dans le fichier de configuration des identifiants et mots de passe de connection à la base de données

#### 3.7 - Fichier dédié aux principales fonctions: redacteurs Paul, Valérian et Kéroan [kof.php](doc/kof.md)
Code des 5 fonctions les plus utilisées :

- création d'une journée de tournoi
- affichage d'un tableau de classement pour une journée
- changement automatique des positions des joueurs après un combat
- récupération de la dernière saison 
- récupération de la dernière journée d'une saison donnée du tournoi


## date de mise à jour : 1/12/14
L'historique des modifications est contenu dans le fichier "changelog.md".