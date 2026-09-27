
===================================
#         PHPSTORE
===================================

Ce projet est un TRAVAIL DE FIN DE MODULE DE PROJET DE DEVELOPPEMENT  WEB.

Le projet est une application web dynamique développée en utilisant le couple PHP-MySQL. Il suit l'architecture MVC (Modèle-Vue-Contrôleur) et l'approche orientée objet pour organiser le code de manière efficace et maintenable.

L'application comprend plusieurs fonctionnalités telles que l'authentification des utilisateurs, la gestion des produits, et l'accès restreint à certaines pages basées sur les rôles des utilisateurs.


# Shema Structure
=================
phpstore/
│
├── assets/ `fichiers statics tels que css, js, img, etc...`
│
├── controllers/ `logiques de controle et interaction avec les modèles et les vues.`
│   ├── HomeController.php
│   ├── LoginController.php
│   ├── RegisterController.php
│	├── UserController.php
│	├── AdminController.php
│   └── ...
│
├── models/ `implémentation et gestion de la base de données`
│   ├── Database.php
│   └── User.php
│   ├── Product.php
│   ├── creation_base.sql
│   └── ...
│
├── views/ `affichage des pages`
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   └── user.php
│   ├── shop.php
│   └── ...
│
├── .gitignore `Exclusion des informations sensibles de configuration de la base de données`
├── config.php `Fichier de configuration des info de connexion de la base de donnée`
├── index.php `Point d'entrée unique et routage vers les contrôleurs appropriés`
└── README.md

`PROJECT_BASE_URL = http://localhost/phpstore/`

# Quick start
==============
1. Cloner le repo  sur GitHub::

      git clone  https://github.com/patrickgagli/phpstore.git

2. Placer le dossier dans le repertoire www de WAMP
3. Créer la base de données avec PhpMyAdmin et le fichier /models/_creation_base.sql
4. Créer un Virtual Host pour le projet 


# Principaux composants de l'application
=========================================
- Modèles (Models) : Ils représentent les données de l'application et interagissent avec la base de données MySQL pour effectuer des opérations de lecture, écriture, mise à jour et suppression.

- Contrôleurs (Controllers) : Ils orchestrent le flux de données entre les modèles et les vues. Ils traitent les requêtes des utilisateurs, effectuent les opérations nécessaires sur les données, et chargent les vues appropriées pour afficher les résultats.

- Vues (Views) : Elles sont responsables de l'interface utilisateur et de l'affichage des données. Les vues récupèrent les données des contrôleurs et les présentent de manière appropriée pour les utilisateurs.


# SERVICES PROPOSES PAR L'APPLICATION :
=======================================
Les services dépendent du statut de l'utilisateur/visiteur selon qu'il soit utilisateur enregistré ou « membre »(ci-après UM) ou selon qu'il soit utilisateur non enregistré ou « non membre »(ci-après UNM).
Un UM non authentifié/non connecté est assimilé à un UNM
On distingue également l'administrateur du site qui doit avoir accès à des services réservés.

Le site propose, de manière générale, un espace accueil, une rubrique mini-chat, une rubrique « Blog/News » du site, un espace de vente de matériels, une rubrique permettant soit à un UM de s'identifier ou modifier des éléments de son « profil », soit à un UNM de s'inscrire.
Le site contiendra également un espace réservé à l'administrateur du site.
Les pages d'accès aux différents services seront accessibles sur chaque page du site sous la forme d'un menu simplifié.
Le seul élément du menu à modifier concerne le lien vers la rubrique « s'inscrire/se connecter » qui sera remplacé par « modifier profil/se déconnecter » dès que l'UM se sera authentifié.

##	ACCUEIL :
La page d'accueil est évidemment accessible à tous.
Elle contiendra une description des services fournis en distinguant ceux accessibles aux UM connectés de ceux accessibles aux UNM ou autres utilisateurs assimilés.
Elle contiendra également une zone de saisie d'informations permettant à l'UM de s'identifier et d'ainsi avoir directement accès aux services qui lui sont réservés.
En clair, une zone permettant la vérification d'informations de type login/nom d'utilisateur et mot de passe d'accès.

##	MINI-CHAT :
Les services de l'espace mini-chat sont exclusivement réservés aux UM authentifiés.
Le mini-chat propose une liste des 10 derniers messages postés par les différents UM connectés, accompagnés chacun du pseudo utilisé au choix par chaque UM tout au long de sa connexion.
A vous de limiter la longueur maximale de chaque message pouvant être édité par les UM connectés.

L'UNM ou l'UM « non connecté » se verront proposer de s'inscrire comme UM ou de s'authentifier en cas de tentative d'accès à l'espace mini-chat.

##	BLOG/NEWS
L'espace blog/news du site contient une série de « billets » (articles) comportant chacun un titre, du texte et un lien vers les commentaires éventuels  liés à chaque billet.

Chaque billet ne pourra être édité que par l'administrateur du site.
Tout UM authentifié ou UNM pourra consulter les billets édités ainsi que les commentaires éventuels qui y sont liés.
Par contre la faculté d'ajouter un commentaire ne sera possible que pour l'administrateur ou un UM authentifié.
L'UNM ou l'UM « non connecté » se verront proposer de s'inscrire comme UM ou de s'authentifier en cas de tentative d'édition d'un commentaire.

Un moteur de recherche simplifié permettra pour tous les utilisateurs de rechercher et d'afficher les billets dont le titre contient une chaîne de caractères entrée comme critère de recherche.

##	INSCRIPTION/AUTHENTIFICATION/MODIFICATION DE PROFIL :
Cet espace permet à l 'UNM de s'inscrire en tant qu’UM.
Les informations minimales à fournir lors de  l'inscription sont les suivantes : nom, prénom, adresse, code postal, date de naissance, adresse email, pseudo/login utilisé et mot de passe.
L'inscription permet (il ne s'agit pas d'une obligation !) aussi à l'UM de télécharger sur le serveur un fichier image au format « .gif » ou « .jpeg ».
Dans ce cas, l'image téléchargée s'affichera au sein de chaque page consultée par l'UM authentifié.

L'UM authentifié possèdera également la faculté de modifier les éléments de son adresse postale, de son adresse email ainsi que son mot de passe d'accès aux services du site.

##	ACHAT DE MATERIELS :
Cet espace permet à tout UM authentifié et à lui seul d'effectuer des achats parmi 3 catégories d'articles : informatique, livre, et hi-fi.
Pour chaque catégorie d'articles 5 ou 6 articles différents de votre choix seront proposés à la vente, chacun avec son prix unitaire.

La liste des matériels en vente, classée par catégorie avec le prix de chaque article, sera accessible à tout utilisateur, qu'il soit UM authentifié ou non ou UNM.
Un achat ne peut porter qu’au maximum sur 10 articles identiques, le nombre total d'articles différents achetés est libre ainsi que les catégories d’articles.
Les informations concernant le type et la quantité d'articles achetés ainsi que le prix unitaire et le montant total des achats effectués seront mise à jour de manière « instantanée » et seront toujours visibles pour l’utilisateur tout au long du processus.
En d’autres termes un panier mis à jour sera toujours accessible à l’UM durant le processus d’achat.
Tout UM authentifié aura la faculté de consulter la liste des achats qu'il a effectués depuis son inscription en tant qu’UM, ordonnée par date d'achat avec le montant total de chaque achat.
Il pourra également consulter les détails de chaque achat.

 L'UNM ou l'UM « non connecté » se verra proposer de s'inscrire comme UM ou de s'authentifier en cas de tentative d'achat.
 
##	ADMINISTRATION DU SITE :
Espace uniquement accessible à l'administrateur du site.
Celui-disposera des possibilités suivantes :

	- participer au mini-chat;
	- éditer de nouveaux billets et des commentaires;
	- consulter les données du profil d'un UM de son choix;
    - consulter le nombre de « connexions » d'un UM;
	- consulter la liste des achats effectués par un UM ordonnée par date d’achat, ainsi que 	      	 consulter les détails relatifs à chaque achat;
	- consulter les 5 derniers commentaires édités par un UM dans la section blog/news;
	- ajouter/supprimer un article de l'espace « vente de matériels »;
	- bloquer l'accès aux services réservés à un UM jugé indésirable 



## Licence & Auteur
Projet académique PHPSTORE (usage pédagogique).
Privé — pas ouvert aux contributions externes. Propriété de l'auteur.  
Conçu avec ❤️ par [PG](https://patrickgagli.github.io/pgdigital/)
