-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 30 avr. 2020 à 15:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `live_question`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_categorie` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `Libelle_categorie`) VALUES
(1, 'Anime'),
(2, 'NSFW'),
(3, 'Voiture'),
(4, 'Informatique'),
(5, 'Coronavirus'),
(6, 'Politique'),
(7, 'VM'),
(8, 'Idols'),
(9, 'K-Pop'),
(10, 'Japon');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `Id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Mail_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `MotDePasse_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Genre_profil` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Image_profil` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description_profil` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `#Id_role` int(11) NOT NULL,
  PRIMARY KEY (`Id_profil`),
  KEY `#Id_role` (`#Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`Id_profil`, `Pseudo_profil`, `Mail_profil`, `MotDePasse_profil`, `Genre_profil`, `Image_profil`, `Description_profil`, `#Id_role`) VALUES
(1, 'Yam', 'root@livequestion.com', '$2y$10$tZjW1sjH3sllXUf98JLqdueBoEvSprB6H9/x5I5PDoQuWaNRxJAte', 'Non-binaire', 'https://pbs.twimg.com/media/ESww5viU4AAdJA7.png', 'uwu', 1),
(2, 'Lythis', 'lythis@morgan.fr', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Homme', './image_profil/lythis.jpg', 'Aucune information disponible.', 1),
(55, 'Kyllian', 'kyllian@joseph.fr', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Homme', './image_profil/kyllian.jpg', 'Aucune information disponible.', 1),
(56, 'Leo', 'leo@stvincent.net', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Hélicoptère d\'attaque', './image_profil/Default.png', 'Aucune information disponible.', 2),
(57, 'Nico Nico Nii', 'nico@stvincent.net', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Non-binaire', './image_profil/Default.png', 'Aucune information disponible.', 2),
(63, 'test', 'me@test', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Femme', './image_profil/Default.png', 'Aucune information disponible.', 2),
(64, 'Jeff', 'jeff@jeff.jeff', '$2y$10$k/bxo39LFYjt28bx3oNM/ePoDjriiygJBNXviYvVJSRusLn/.Emyq', 'Homme', './image_profil/Default.png', 'Super prof des BTS 1 (ils travaillent mais que des fois)', 2),
(65, 'Christopher', 'christopher@gmail.com', '$2y$10$gec1euS8zD7C3iQdZRyiouncOUUdmDfwhozHaLTtyVUT6WAqjxJna', 'Homme', './image_profil/Default.png', 'Aucune information disponible.', 2),
(66, 'Mikaël', 'mikael@mika.fr', '$2y$10$NW9XY69pN37hi/9OuCUf7Op0tx7.FM61VPcZl5RNW.7r.hiADh.1.', 'Homme', './image_profil/Default.png', 'Aucune information disponible.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `Id_question` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_question` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Date_creation_question` date NOT NULL,
  `#Id_profil` int(11) NOT NULL,
  `#Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_question`),
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_categorie` (`#Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`Id_question`, `Titre_question`, `Date_creation_question`, `#Id_profil`, `#Id_categorie`) VALUES
(1, 'Qui est la meilleure waifu/meilleur husbando?', '2020-04-03', 2, 1),
(2, 'J\'aime TELLEMENT les VM, j\'en fais tout les jours, suis-je addicte?', '2020-04-04', 2, 7),
(3, 'Why is Japan such a peaceful land?', '2020-04-04', 1, 10),
(4, 'Comment faire pour que Morgan soit plus intelligent?', '2020-04-05', 1, 5),
(5, 'Who\'s the best idol?', '2020-04-05', 1, 8),
(6, 'Ceci est un test', '2020-04-05', 2, 1),
(45, 'Pourquoi je suis aussi beau?', '2020-04-06', 55, 3),
(46, 'Pourquoi Nico Nico Nii me harcèle même dans mes rêves?', '2020-04-15', 57, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `Id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu_reponse` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Date_reponse` date NOT NULL,
  `#Id_profil` int(11) NOT NULL,
  `#Id_question` int(11) NOT NULL,
  PRIMARY KEY (`Id_reponse`),
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_question` (`#Id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`Id_reponse`, `Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES
(1, 'Astolfo', '2020-04-03', 1, 1),
(2, 'Because it\'s soooo beautiful :3', '2020-04-04', 2, 3),
(3, 'Omg Lythis noticed me!!', '2020-04-04', 1, 3),
(66, ':(', '2020-04-06', 2, 45),
(77, 'Tu es super beau', '2020-04-02', 1, 45),
(78, 'oui', '2020-04-19', 1, 45),
(79, 'test', '2020-04-19', 1, 3),
(85, 'test', '2020-04-21', 1, 45),
(86, 'test2', '2020-04-21', 1, 45),
(91, 'k', '2020-04-22', 1, 46);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_role` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id_role`, `Libelle_role`) VALUES
(1, 'Admin'),
(2, 'Utilisateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_#Id_role` FOREIGN KEY (`#Id_role`) REFERENCES `role` (`Id_role`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_#Id_categorie` FOREIGN KEY (`#Id_categorie`) REFERENCES `categorie` (`Id_categorie`),
  ADD CONSTRAINT `FK_#Id_profil` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `FK_#Id_profil2` FOREIGN KEY (`#Id_profil`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `FK_#Id_question` FOREIGN KEY (`#Id_question`) REFERENCES `question` (`Id_question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
