-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Lun 07 Décembre 2020 à 21:30
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_resources`
--

-- --------------------------------------------------------

--
-- Structure de la table `entrepot`
--

CREATE TABLE IF NOT EXISTS `entrepot` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `marchandise_ID` tinyint(3) unsigned NOT NULL,
  `joueur_ID` tinyint(3) unsigned NOT NULL default '1',
  `niveau` tinyint(3) unsigned NOT NULL default '0',
  `stock` bigint(20) unsigned NOT NULL default '0',
  `moment` int(11) NOT NULL,
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `unicité_entrepot` (`marchandise_ID`,`joueur_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

--
-- Contenu de la table `entrepot`
--

INSERT INTO `entrepot` (`ID`, `marchandise_ID`, `joueur_ID`, `niveau`, `stock`, `moment`, `ordre_affichage`) VALUES
(1, 3, 1, 159, 112760000, 2020, 0),
(2, 4, 1, 4, 0, 2020, 0),
(3, 5, 1, 78, 4500, 2020, 0),
(4, 6, 1, 2, 0, 2020, 0),
(5, 7, 1, 5, 0, 2020, 0),
(6, 8, 1, 8, 0, 2020, 0),
(7, 9, 1, 10, 9, 2020, 0),
(8, 10, 1, 8, 57896540, 2020, 0),
(0, 11, 1, 8, 0, 2020, 0),
(10, 12, 1, 7, 0, 2020, 0),
(11, 13, 1, 4, 0, 2020, 0),
(12, 14, 1, 5, 0, 2020, 0),
(13, 15, 1, 6, 0, 2020, 0),
(14, 16, 1, 3, 0, 2020, 0),
(15, 17, 1, 35, 946000, 2020, 0),
(16, 18, 1, 1, 0, 2020, 0),
(17, 19, 1, 0, 0, 2020, 0),
(18, 20, 1, 0, 0, 2020, 0),
(19, 21, 1, 0, 0, 2020, 0),
(20, 22, 1, 0, 0, 2020, 0),
(21, 23, 1, 105, 15000000, 2020, 0),
(22, 24, 1, 109, 35000000, 2020, 0),
(23, 25, 1, 0, 0, 2020, 0),
(24, 26, 1, 0, 0, 2020, 0),
(25, 27, 1, 0, 0, 2020, 0),
(26, 28, 1, 0, 0, 2020, 0),
(27, 29, 1, 0, 0, 2020, 0),
(28, 30, 1, 0, 0, 2020, 0),
(29, 3, 2, 10, 0, 2020, 0),
(30, 4, 2, 11, 22, 2020, 0),
(31, 31, 1, 10, 11, 2020, 0),
(32, 32, 1, 99, 1, 2020, 0),
(33, 33, 1, 0, 65, 2020, 0),
(34, 34, 1, 88, 999, 2020, 0),
(35, 35, 1, 4, 5, 2020, 0),
(36, 36, 1, 6, 333, 2020, 0),
(37, 37, 1, 61, 245, 2020, 0),
(38, 38, 1, 44, 4445, 2020, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
