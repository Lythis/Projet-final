# Projet-LiveQuestion
Ce projet consiste à réaliser un site interactif en fonction d'un cahier des charges et de maquettes données.
Le site comporte 2 grandes parties : La partie non-connecté, avec une page design précise à réaliser, et une partie connecté, où l'utilisateur change d'interface et peut envoyer et répondre à des questions.

## Les fonctionnalités du site sont les suivantes :

- L'utilisateur peut créer un compte ou se connecter s'il en a déjà un.
- L'email est utilisé comme moyen d'identification unique. Un pseudo déjà existant peut être réutilisé.
- Une fois connecté, l'utilisateur peut voir une nouvelle page d'accueil qui regroupe toutes les questions posées de la plus récente à la plus ancienne.
- L'utilisateur peut alors répondre à une question ou en poser une lui-même.
- L'utilisateur peut aussi modifier son profil : son pseudo, son email (s'il n'existe pas déjà), son mot de passe (besoin du mot de passe actuel), sa description, son genre et son image de profil.
- Une fonction supprimer est également présente : l'utilisateur peut supprimer une question qu'il a posé, ou bien son profil. Un administrateur peut supprimer tout ce que bon lui semble.
- Les comptes sont mis administrateurs directement depuis la base de données.

## Comment installer le site :

- Télécharger le projet en .zip
- Démarrer WAMP et créer un nouveau virtual host avec un nom au choix
- Tout exporter dans le répertoire www créé (à l'exeption de fixtures.sql et README.md
- Sur phpmyadmin, créer une base de données live_question et importer la base de données
- Le site est maintenant fonctionnel

## Membres du projet :
- Nicolas Valenti (@YummYume)
- Morgan Watbled (@Lythis)
- Kyllian Louis Joseph (@prxph3te)
