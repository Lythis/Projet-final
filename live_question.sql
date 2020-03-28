-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Février 2020 à 17:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `live_question`
--
CREATE DATABASE IF NOT EXISTS `live_question` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `live_question`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
    `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
    `Libelle_categorie` varchar(255) CHARACTER SET latin1 NOT NULL,
    PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
    `Id_profil` int(11) NOT NULL AUTO_INCREMENT,
    `Pseudo_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
    `Mail_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
    `MotDePasse_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
    `Genre_profil` varchar(50) CHARACTER SET latin1 NOT NULL,
    `#Id_role` int(11) NOT NULL,
    PRIMARY KEY (`Id_profil`),
    KEY `#Id_role` (`#Id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
    `Id_question` int(11) NOT NULL AUTO_INCREMENT,
    `Titre_question` varchar(255) CHARACTER SET latin1 NOT NULL,
    `Date_creation_question` date NOT NULL,
    `#Id_profil` int(11) NOT NULL,
    `#Id_categorie` int(11) NOT NULL,
    PRIMARY KEY (`Id_question`),
    KEY `#Id_profil` (`#Id_profil`),
    KEY `#Id_categorie` (`#Id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
    `Id_reponse` int(11) NOT NULL AUTO_INCREMENT,
    `Contenu_reponse` varchar(255) CHARACTER SET latin1 NOT NULL,
    `Date_reponse` date NOT NULL,
    `#Id_profil` int(11) NOT NULL,
    `#Id_question` int(11) NOT NULL,
    PRIMARY KEY (`Id_reponse`),
    KEY `#Id_profil` (`#Id_profil`),
    KEY `#Id_question` (`#Id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
    `Id_role` int(11) NOT NULL AUTO_INCREMENT,
    `Libelle_role` varchar(50) CHARACTER SET latin1 NOT NULL,
    PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
