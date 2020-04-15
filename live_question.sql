-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 14:31
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
  `Libelle_categorie` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
  `Pseudo_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Mail_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  `MotDePasse_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Genre_profil` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Image_profil` varchar(255) NOT NULL DEFAULT 'Default.png',
  `Description_profil` text NOT NULL DEFAULT '',
  `#Id_role` int(11) NOT NULL,
  PRIMARY KEY (`Id_profil`),
  KEY `#Id_role` (`#Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`Id_profil`, `Pseudo_profil`, `Mail_profil`, `MotDePasse_profil`, `Genre_profil`, `Image_profil`, `Description_profil`, `#Id_role`) VALUES
(1, 'root', 'root@livequestion.com', '12345', 'Non binaire', 'Default.png', '', 1),
(2, 'Lythis', 'lythis@morgan.fr', '4567', 'Homme', 'lythis.jpg', '', 2),
(55, 'Kyllian', 'kyllian@joseph.fr', '5555', 'Homme', 'kyllian.jpg', '', 1),
(56, 'Léo', 'leo@stvincent.net', 'oui', 'Hélicoptère d\'attaque', 'Default.png', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `Id_question` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_question` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Date_creation_question` date NOT NULL,
  `#Id_profil` int(11) NOT NULL,
  `#Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_question`),
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_categorie` (`#Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

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
(45, 'Pourquoi je suis aussi beau?', '2020-04-06', 55, 3);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `Id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu_reponse` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Date_reponse` date NOT NULL,
  `#Id_profil` int(11) NOT NULL,
  `#Id_question` int(11) NOT NULL,
  PRIMARY KEY (`Id_reponse`),
  KEY `#Id_profil` (`#Id_profil`),
  KEY `#Id_question` (`#Id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`Id_reponse`, `Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES
(1, 'Astolfo', '2020-04-03', 1, 1),
(2, 'Because it\'s soooo beautiful :3', '2020-04-04', 2, 3),
(3, 'Omg Lythis noticed me!!', '2020-04-04', 1, 3),
(66, ':(', '2020-04-06', 2, 45),
(77, 'Tu es super beau', '2020-04-02', 1, 45);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_role` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
