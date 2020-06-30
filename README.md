# Projet-LiveQuestion
Ce projet consiste à réaliser un site interactif en fonction d'un cahier des charges et de maquettes données.
Le site comporte 2 grandes parties : La partie *non-connecté*, avec une page design précise à réaliser, et une partie *connecté*, où l'utilisateur change d'interface et peut envoyer et/ou répondre à des questions.

## Les fonctionnalités du site sont les suivantes :

- L'utilisateur peut *créer* un compte ou *se connecter* s'il en a déjà un.
- L'*email* est utilisé comme moyen d'identification unique. Un pseudo déjà existant peut être réutilisé.
- Le *mot de passe* est *crypté* une fois dans la base de données, aucun moyen d'obtenir le mot de passe d'un compte dedans donc. Le mot de passe est à confirmer 2 fois lors de l'inscription ou de la modification de ce dernier.
- Une fois *connecté*, l'utilisateur peut voir une nouvelle page d'accueil qui regroupe toutes les questions posées de la plus récente à la plus ancienne.
- L'utilisateur peut alors *répondre* à une question ou en *poser* une lui-même.
- L'utilisateur peut aussi *modifier* son profil : son pseudo, son email (s'il n'existe pas déjà), son mot de passe (besoin du mot de passe actuel + double vérification), sa description, son genre et son image de profil.
- Une fonction *supprimer* est également présente : l'utilisateur peut supprimer une question qu'il a posée, ou bien son profil. Un administrateur peut supprimer tout ce dont bon lui semble.
- Les comptes sont mis administrateurs directement depuis la base de données (```#Id_role = 1``` étant égal au status administrateur).
- D'autres fonctionnalités secondaires sont présentes.
- Essayer d'accéder à une page du site partie *connecté* sans être connecté résultera d'un accès refusé.
- **Update 30/06/20** : L'utilisateur possède maintenant une liste d'amis, des questions uniquement pour les amis, un système de triage de questions, un système de like, une meilleure gestion de l'image de profil... Les administrateurs peuvent supprimer/ajouter une catégorie.

## Comment installer le site :

- Télécharger le projet en .zip,
- Démarrer WAMP, dans le dossier www : exporter tout le .zip (à l'exception de fixtures.sql et README.md) dans un dossier du nom de votre choix,
- Créer un nouveau Virtual Host avec un nom au choix et le répertoire www du dossier contenant le projet téléchargé,
- Redémarrer les services WAMP,
- Sur phpMyAdmin, créer une base de données en latin1_general_ci **avec le nom _live_question_** et importer la base de données fixtures.sql en utf-8,
- Le site est maintenant fonctionnel.
- **_Si_ un problème avec la base de données survient : modifiez vos identifiants de connexion ou le nom de la base de données dans _db/base_PDO.php_**.

## Membres du projet :

- Nicolas Valenti ([@YummYume](https://github.com/YummYume))
- Morgan Watbled ([@Lythis](https://github.com/Lythis))
- Kyllian Louis Joseph ([@prxph3te](https://github.com/prxph3te))
