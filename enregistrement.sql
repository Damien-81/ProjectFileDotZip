-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 avr. 2021 à 10:42
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
-- Structure de la table `enregistrement`
--

DROP TABLE IF EXISTS `enregistrement`;
CREATE TABLE IF NOT EXISTS `enregistrement` (
  `Vitesse` double NOT NULL,
  `Distance parcourue` double NOT NULL,
  `Temperature` double NOT NULL,
  `Cadence` int(60) NOT NULL,
  `Puissance humaine` int(50) NOT NULL,
  `Couple pedalier` int(50) NOT NULL,
  `Signal accelerateur` int(10) NOT NULL,
  `Signal controleur` int(10) NOT NULL,
  `Entree aux` int(5) NOT NULL,
  `Drapeaux` int(8) NOT NULL,
  `Freinage` int(8) NOT NULL,
  `DateHeure` datetime NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `Altitude` double NOT NULL,
  `NomVehicule` text NOT NULL,
  `Manifestation` text NOT NULL,
  `Parcours` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enregistrement`
--

INSERT INTO `enregistrement` (`Vitesse`, `Distance parcourue`, `Temperature`, `Cadence`, `Puissance humaine`, `Couple pedalier`, `Signal accelerateur`, `Signal controleur`, `Entree aux`, `Drapeaux`, `Freinage`, `DateHeure`, `Latitude`, `Longitude`, `Altitude`, `NomVehicule`, `Manifestation`, `Parcours`, `id`) VALUES
(4521, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-04-02 12:37:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 1),
(100, 200, 90, 120, 100, 99, 16, 16, 1, 1, 1, '2021-04-02 10:37:00', 100, 100, 100, 'Smart500', 'EcoRace', 'EcoRace', 2),
(86, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:00:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 3),
(60, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:02:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 4),
(50, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:03:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 5),
(68, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:05:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 6),
(62, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:06:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 7),
(67, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:08:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 8),
(70, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:09:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 9),
(51, 10000, 38, 60, 200, 3, 1, 1, 1, 0, 0, '2021-03-04 14:10:00', 2.12, 43.91, 169, 'Fiat multiplat', 'EcoRace', 'Parcours1', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
