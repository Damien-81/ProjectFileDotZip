-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 avr. 2021 à 10:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `svs`
--

-- --------------------------------------------------------

--
-- Structure de la table `manifestation`
--

DROP TABLE IF EXISTS `manifestation`;
CREATE TABLE IF NOT EXISTS `manifestation` (
  `NomManifestation` char(100) CHARACTER SET armscii8 NOT NULL,
  `Annee` int(8) NOT NULL,
  `LongitudeMax` float NOT NULL,
  `LatitudeMax` float NOT NULL,
  `LongitudeMin` float NOT NULL,
  `LatitudeMin` float NOT NULL,
  `SiteWeb` char(100) CHARACTER SET armscii8 NOT NULL,
  `Descripton` char(200) CHARACTER SET armscii8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manifestation`
--

INSERT INTO `manifestation` (`NomManifestation`, `Annee`, `LongitudeMax`, `LatitudeMax`, `LongitudeMin`, `LatitudeMin`, `SiteWeb`, `Descripton`, `id`) VALUES
('EcoRace', 2021, 2.09893, 43.9195, 2.12335, 43.9099, 'https://www.albiecorace.com/', 'Manifestation qui a lieu a albi', 1),
('chartres', 2021, 1.38661, 48.4815, 1.58197, 48.4119, 'https://chartres-solarcup.fr/', 'Chartre solar cup', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
