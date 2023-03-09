-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 mars 2023 à 14:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `market place`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `ID_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) NOT NULL,
  `Prenom` varchar(128) NOT NULL,
  `Mail` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_admin`, `Nom`, `Prenom`, `Mail`) VALUES
(1, 'Ouannane', 'Ghita', 'ghita.ouannane@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID_article` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) NOT NULL,
  `Prix` float NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Rarete` int(11) NOT NULL,
  `Image_1` varchar(128) NOT NULL,
  `Image_2` varchar(128) NOT NULL,
  `Image_3` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_article`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_article`, `Nom`, `Prix`, `Description`, `Rarete`, `Image_1`, `Image_2`, `Image_3`) VALUES
(1, 'Air-King', 7350, 'Oyster, 40 mm, acier Oystersteel, Homme', 1, '\"Rolex/rolex_noir_homme_1.png\"', '\"Rolex/rolex_noir_homme_2.png\"', '\"Rolex/rolex_noir_homme_3.png\"'),
(2, 'G-shock', 199, 'GA-100RGB11 : Gris, Cadran moyen, Homme', 3, '\"G-shock/g-shock_gris_homme_1.png\"', '\"G-shock/g-shock_gris_homme_2.png\"', '\"G-shock/g-shock_gris_homme_3.png\"'),
(3, 'Le Temps Ne S\'arrete Jamais', 855, 'Acier, cadran bleu, mouvement automatique, Homme', 2, '\"Mauboussin/mauboussin_bleu_homme_1.png\"', '\"Mauboussin/mauboussin_bleu_homme_2.png\"', '\"Mauboussin/mauboussin_bleu_homme_3.png\"');

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `Nom_Proprietaire` varchar(128) NOT NULL,
  `Type_Carte` varchar(128) NOT NULL,
  `Num_carte` varchar(128) NOT NULL,
  `Date_Exp` date NOT NULL,
  `CCV` varchar(4) NOT NULL,
  `Solde` float NOT NULL,
  PRIMARY KEY (`Num_carte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`Nom_Proprietaire`, `Type_Carte`, `Num_carte`, `Date_Exp`, `CCV`, `Solde`) VALUES
('Terrier', 'Visa', '0123456789012345', '2026-05-01', '222', 156000);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) NOT NULL,
  `Prenom` varchar(128) NOT NULL,
  `Adresse` varchar(128) NOT NULL,
  `Mail` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID`, `Nom`, `Prenom`, `Adresse`, `Mail`) VALUES
(1, 'Terrier', 'Christopher', '3 rue beaugrenelle Paris', 'christopher.terrier@edu.ece.fr'),
(14, 'Fabas', 'Arthur', '9 rue beaugrenelle Paris', 'christopher.trr@edu.ece.fr'),
(13, 'Fabas', 'Arthur', '9 rue beaugrenelle Paris', 'arthur.fabas@edu.ece.fr'),
(12, 'Manolo', 'Hina', '10 rue beaugrenelle 75015', 'hina.manolo@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `Mail` varchar(128) NOT NULL,
  `Mot_de_Passe` varchar(128) NOT NULL,
  `Type_de_Compte` int(11) NOT NULL,
  PRIMARY KEY (`Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`Mail`, `Mot_de_Passe`, `Type_de_Compte`) VALUES
('christopher.terrier@edu.ece.fr', 'motdepasseintrouvable', 1),
('leticia.moussaoui@edu.ece.fr', 'leticia', 3),
('ghita.ouannane@edu.ece.fr', 'ghita', 2),
('hina.manolo@edu.ece.fr', 'mdp', 1),
('arthur.fabas@edu.ece.fr', '123', 1),
('christopher.trr@edu.ece.fr', 'arthur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID_vendeur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) NOT NULL,
  `Prenom` varchar(128) NOT NULL,
  `Mail` varchar(128) NOT NULL,
  `Pseudo` varchar(128) NOT NULL,
  `Image de fond` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_vendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_vendeur`, `Nom`, `Prenom`, `Mail`, `Pseudo`, `Image de fond`) VALUES
(1, 'Moussaoui', 'Leticia', 'leticia.moussaoui@edu.ece.fr', 'Rolex', 'Logo_rolex.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
