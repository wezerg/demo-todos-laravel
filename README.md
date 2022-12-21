## Définition du projet
Projet Todos avec CRUD sous Laravel

## Pré-requis

Etapes à suivre pour installer le projet en local : 
- Vérifier la présence de php sur votre système avec la commande ```php --version```.
- Vérifier qu'une version de MySql pouvant accueillir la base de données est présente sur votre système.
- Vérifier qu'une version de composer est installé sur votre système avec la commande ```composer --version```.

## Initialisation

Etape à suivre pour initialiser le projet en local :
- Ouvrir un terminal dans votre dossier projet.
- Exécuté la commande ```composer install``` pour récupérer les dépendances utilisées.
- Création d'une base de donnée au nom suivant : laravel_todos.
- N'oubliez pas de mettre le nom de la base de données dans le champs ```DB_DATABASE=``` de votre fichier ".env" ainsi que votre configuration MySql.
- Utilisation de la commande ```php artisan migrate``` pour créer la base de données.
- Exécuté la commande ```php artisan db:seed``` pour remplir la base de données.

## Lancement

- Exécuté la commande ```php artisan serve``` pour démarrer l'application.
