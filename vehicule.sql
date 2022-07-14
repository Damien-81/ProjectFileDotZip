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
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `NomVehicule` char(100) CHARACTER SET armscii8 NOT NULL,
  `Propietaire` char(100) CHARACTER SET armscii8 NOT NULL,
  `Solaire` tinyint(1) NOT NULL,
  `PuissanceCrete` int(8) NOT NULL,
  `ReferenceMoteur` char(100) CHARACTER SET armscii8 NOT NULL,
  `CapaciteBt` int(11) NOT NULL,
  `TechnologieBt` char(100) CHARACTER SET armscii8 NOT NULL,
  `Descripton` char(200) CHARACTER SET armscii8 NOT NULL,
  `Longitude` float NOT NULL,
  `Latitude` float NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`NomVehicule`, `Propietaire`, `Solaire`, `PuissanceCrete`, `ReferenceMoteur`, `CapaciteBt`, `TechnologieBt`, `Descripton`, `Longitude`, `Latitude`, `id`) VALUES
('Fiat multiplat', 'Lilian', 0, 0, '182B6000', 0, 'aucune', 'Fiat de lilian', 2.11545, 43.9125, 1),
('Tricycle', 'Damien', 0, 0, 'AIE92L2', 100, 'ions', 'Velo electrique de damien quand il vient au lycee en Y', 2.10506, 43.9138, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
