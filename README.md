

Boutique enligne - Solution E-commerce PHP & MySQL



Ce site de démonstration est hébergé sur le service d'hébergement gratuit **InfinityFree** et est accessible à l'adresse suivante :


Accéder à la Boutique en Ligne **(http://jero.infinityfreeapp.com/)**



###  Informations de l'Espace Administration

Pour tester l'espace d'administration (CRUD produits), veuillez utiliser les identifiants de démonstration suivants :

 e-mail  | Mot de Passe  |
| `jero@admin` | `boutique#1234` |

**Note Importante :** L'espace d'administration est un environnement de démonstration. Toutes les modifications effectuées peuvent être réinitialisées périodiquement.

1- Description du Projet

Ce projet est une solution complète de boutique en ligne (e-commerce) développée avec du PHP procédural et une interface utilisateur construite avec Bootstrap 5 pour garantir une conception moderne et responsive.

Le site se compose d'une interface publique pour les clients (affichage des produits) et d'un espace d'administration sécurisé pour la gestion du catalogue.

2 -Fonctionnalités Clés

Partie Front-end (Client)
Catalogue de Produits : Affichage dynamique de tous les produits stockés dans la base de données.

Design Responsive : Mise en page optimisée pour les ordinateurs de bureau, tablettes et mobiles grâce à Bootstrap.

Partie Back-end (Administrateur)
Connexion Sécurisée : Accès à l'espace admin via un système d'authentification par identifiant/mot de passe (gestion des accès stockée dans la table admin).

CRUD Produits : L'administrateur peut effectuer les opérations suivantes sur le catalogue de produits :

Créer (Ajouter un nouveau produit)

Read (Afficher la liste et les détails des produits)

Update (Modifier les informations d'un produit existant)

Delete (Supprimer un produit)

3- Technologies Utilisées

Langage	PHP 
CSS Framework	Bootstrap 5
Base de Données	MySQL / MariaDB
Déploiement	GitHub Actions (Déploiement automatique vers InfinityFree)

Exporter vers Sheets
⚙️ Installation et Démarrage Local
Pour installer et exécuter ce projet en local, vous avez besoin d'un environnement de développement PHP (comme XAMPP, WAMP, ou MAMP).

1. Cloner le dépôt
Bash

git clone https://github.com/jerome-byte/Boutique-en-ligne.git
cd NOM_DU_DEPOT

2. Configuration de la Base de Données (MySQL)
Créez une base de données MySQL nommée NOM_DE_VOTRE_BDD.

Importez les tables nécessaires. (Vous devez fournir le fichier .sql ou les requêtes).

Table produits : (id, nom, description, prix, image_url, stock, etc.)

Table admin : (id, username, password)

Insérez un premier compte administrateur dans la table admin (le mot de passe doit être chiffré si vous utilisez password_hash() dans votre code).

3. Fichier de Configuration
Modifiez le fichier de connexion à la base de données (probablement config.php ou db_connect.php) pour correspondre à vos identifiants locaux :

Paramètre	Valeur Locale Exemple
DB_HOST	localhost
DB_USER	root
DB_PASS	(vide ou votre mot de passe)
DB_NAME	NOM_DE_VOTRE_BDD

Exporter vers Sheets
4. Lancement
Démarrez votre serveur local (Apache/Nginx) et ouvrez votre navigateur à l'adresse du projet (ex: http://localhost/NOM_DU_DEPOT/).

🔑 Accès à l'Espace Administration
L'espace de gestion est accessible via : \https://my.du.edu//administrateur/login.php (ou le chemin exact de votre page de connexion admin).

Rôle	URL
Espace Admin	index.php (dans le dossier administrateur/)
Page de Connexion	login.php (dans le dossier administrateur/)

Exporter vers Sheets
 Déploiement (GitHub Actions)
Ce projet utilise un workflow GitHub Actions pour un déploiement continu vers un hébergeur (comme InfinityFree) via FTP.

Le fichier de configuration est situé dans : .github/workflows/infinityfree.yml

Le déploiement se déclenche automatiquement à chaque push sur la branche master.

Variables de Déploiement
Les identifiants de connexion FTP sont stockés en toute sécurité dans les Secrets GitHub :

FTP_USERNAME

FTP_PASSWORD

 