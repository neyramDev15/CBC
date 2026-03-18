Computer Business Center
Description du projet

Computer Business Center est une application web développée avec PHP et Laravel, conçue pour faciliter la gestion d'une boutique informatique spécialisée dans la vente de PC, accessoires et pièces électroniques.

Cette application permet d'automatiser les tâches quotidiennes telles que la gestion des produits, le suivi du stock, l’enregistrement des ventes et la génération de factures.

Objectifs:

    -Simplifier la gestion des ventes

    -Suivre le stock en temps réel

    -Améliorer l'organisation des données clients

    -Automatiser la facturation

    -Offrir une interface simple et intuitive


Fonctionnalités principales:

    -Authentification (connexion / inscription)

    -Gestion des produits (CRUD)

    -Suivi du stock avec alerte de rupture

    -Gestion des ventes avec panier dynamique (+ / -)

    -Gestion des clients

    -Génération de factures PDF

    -Tableau de bord avec statistiques :

        Produits en stock

        Ventes du jour

        Ventes du mois

        Produits en rupture

        Clients enregistrés

Technologies utilisées

    -Backend : PHP (Laravel)

    -Frontend : HTML, CSS, JavaScript, Bootstrap

    -Base de données : PostgreSQL / MySQL

    -Génération PDF : DomPDF

Installation

    1)Cloner le projet :

    2)git clone <url-du-projet>

    3)Installer les dépendances :

    4)composer install

    5)Configurer le fichier .env
        #Configuration de la base de données

            Créer une base de données, par exemple :

            Nom : db_cbc

            Puis configurer le fichier `.env` :

            DB_CONNECTION=pgsql
            DB_HOST=127.0.0.1
            DB_PORT=5432
            DB_DATABASE=dbcbc
            DB_USERNAME=postgres
            DB_PASSWORD=******

            6)Lancer les migrations :

            7)php artisan migrate

            8)Démarrer le serveur :

            9)php artisan serve

Utilisateurs

    -Administrateur : gestion complète

    -Vendeur : gestion des ventes