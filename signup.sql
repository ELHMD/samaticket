-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 10 Septembre 2021 à 14:47
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `signup`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(10) NOT NULL,
  `titre_event` varchar(100) NOT NULL,
  `acteur_event` text NOT NULL,
  `date_event` date NOT NULL,
  `lieu_event` varchar(100) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id_event`, `titre_event`, `acteur_event`, `date_event`, `lieu_event`) VALUES
(1, 'Graduation ESMTIC 2021', '                     Daaradji Family - DIP - ELzo                 ', '2021-12-10', 'Grand Theatre National (GTNDNCR)'),
(2, 'Marathon EIFFAGE 2021', ' EIFFAGE - Total - Orange - Free - Patisen                 ', '2021-09-15', 'Autoroute Apeage '),
(3, 'Soirée Faramareen', 'Wally - Jeeba - Iss814 - Titi - Aida samb ', '2021-12-25', 'Pullman  Hotel');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id_event` int(13) unsigned NOT NULL,
  `id_tick` int(20) NOT NULL AUTO_INCREMENT,
  `cat_ticket` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prix` int(13) unsigned NOT NULL,
  `nbre_place` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id_tick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table de Conception de ticket' AUTO_INCREMENT=10 ;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id_event`, `id_tick`, `cat_ticket`, `prix`, `nbre_place`) VALUES
(1, 2, 'Prestige', 15000, 400),
(1, 3, 'Decouverte', 10000, 1000),
(2, 4, '5 Km', 5000, 400),
(2, 5, '10 Km', 10000, 200),
(2, 6, '41 Km', 20000, 150),
(3, 7, 'VIP', 50000, 200),
(3, 8, 'Prestige', 30000, 350),
(3, 9, 'Decouverte', 15000, 500);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `password`, `type`) VALUES
(1, 'Mtechs', 'elhadjimordiallo@gmail.com', 'Admin@123', 'admin'),
(2, 'Elhmd', 'elhadjimordiallo@icloud.com', 'Elhmd@99', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE IF NOT EXISTS `ventes` (
  `id_tic` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_event` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `type_tic` varchar(100) NOT NULL,
  `nbr_tic` int(4) NOT NULL,
  `prix_tic` int(10) NOT NULL,
  `statut` varchar(20) NOT NULL DEFAULT 'en cours, valider',
  PRIMARY KEY (`id_tic`),
  UNIQUE KEY `id_tic` (`id_tic`),
  KEY `id_event` (`id_event`),
  KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table de vente de ticket' AUTO_INCREMENT=41 ;

--
-- Contenu de la table `ventes`
--

INSERT INTO `ventes` (`id_tic`, `id_event`, `mail`, `type_tic`, `nbr_tic`, `prix_tic`, `statut`) VALUES
(1, 2, 'elhadjimordiallo@gmail.com', '10 Km', 2, 10000, 'en cours'),
(2, 2, 'elhadjimordiallo@gmail.com', '10 Km', 2, 10000, 'en cours'),
(3, 2, 'elhadjimordiallo@gmail.com', '10 Km', 1, 10000, 'en cours'),
(4, 2, 'elhadjimordiallo@gmail.com', '41 Km', 1, 20000, 'en cours'),
(5, 2, 'elhadjimordiallo@gmail.com', '41 Km', 1, 20000, 'en cours'),
(6, 2, 'elhadjimordiallo@gmail.com', '41 Km', 1, 20000, 'en cours'),
(7, 2, 'elhadjimordiallo@gmail.com', '41 Km', 1, 20000, 'en cours'),
(8, 2, 'elhadjimordiallo@gmail.com', '41 Km', 1, 20000, 'en cours'),
(9, 1, 'elhadjimordiallo@gmail.com', 'Decouverte', 1, 10000, 'en cours'),
(10, 1, 'elhadjimordiallo@gmail.com', 'Decouverte', 1, 10000, 'en cours'),
(11, 1, 'elhadjimordiallo@gmail.com', 'Decouverte', 3, 10000, 'en cours'),
(12, 1, 'elhadjimordiallo@gmail.com', 'Decouverte', 1, 10000, 'en cours'),
(13, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 1, 15000, 'en cours'),
(14, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(15, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(16, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 1, 15000, 'en cours'),
(17, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(18, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(19, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(20, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 1, 15000, 'en cours'),
(21, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(22, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(23, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 1, 15000, 'en cours'),
(24, 1, 'elhadjimordiallo@gmail.com', 'Prestige', 1, 15000, 'en cours'),
(25, 2, 'nishant@gmail.com', '5 Km', 1, 5000, 'en cours'),
(26, 2, 'nishant@gmail.com', '5 Km', 3, 5000, 'en cours'),
(27, 2, 'nishant@gmail.com', '5 Km', 3, 5000, 'en cours'),
(28, 2, 'nishant@gmail.com', '5 Km', 3, 5000, 'en cours'),
(29, 2, 'nishant@gmail.com', '5 Km', 1, 5000, 'en cours'),
(30, 2, 'nishant@gmail.com', '10 Km', 1, 10000, 'en cours'),
(31, 2, 'nishant@gmail.com', '41 Km', 1, 20000, 'en cours'),
(32, 1, 'nishant@gmail.com', 'Decouverte', 3, 10000, 'en cours'),
(33, 1, 'nishant@gmail.com', 'Decouverte', 3, 10000, 'en cours'),
(34, 1, 'nishant@gmail.com', 'Decouverte', 1, 10000, 'en cours'),
(35, 3, 'elhadjimordiallo@gmail.com', 'VIP', 1, 50000, 'en cours'),
(37, 1, 'nishant@gmail.com', 'Prestige', 2, 15000, 'en cours'),
(38, 2, 'elhadjimordiallo@gmail.com', '5 Km', 1, 5000, 'en cours'),
(39, 3, 'elhadjimordiallo@gmail.com', 'VIP', 1, 50000, 'en cours'),
(40, 1, 'elhadjimordiallo@icloud.com', 'Decouverte', 1, 10000, 'en cours');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
