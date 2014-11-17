-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Novembre 2014 à 11:18
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bilingue`
--

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

CREATE TABLE IF NOT EXISTS `mots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frenchWord` varchar(255) NOT NULL,
  `englishWord` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `mots`
--

INSERT INTO `mots` (`id`, `frenchWord`, `englishWord`) VALUES
(1, 'un', 'one'),
(2, 'deux', 'two'),
(3, 'trois', 'three'),
(4, 'quatre', 'four'),
(6, 'mot', 'word'),
(7, 'chien', 'dog'),
(8, 'arbre', 'tree'),
(9, 'rouge', 'red'),
(10, 'bleu', 'blue'),
(11, 'vert', 'green'),
(12, 'chat', 'cat'),
(13, 'maison', 'house'),
(14, 'verre', 'glass'),
(15, 'fenetre', 'window'),
(16, 'oiseau', 'bird'),
(17, 'orange', 'orange'),
(18, 'jaune', 'yellow'),
(19, 'grise', 'grey'),
(20, 'chanter', 'sing'),
(39, 'bonjour', 'hello'),
(40, 'essai', 'try'),
(41, 'noir', 'black'),
(47, 'feu', 'fire'),
(48, 'police', 'police'),
(49, 'nom', 'name'),
(50, 'requete', 'query'),
(51, 'pluie', 'rain'),
(52, 'rire', 'laugh');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `score`
--

INSERT INTO `score` (`id`, `player`, `score`) VALUES
(6, 'Olivier', 8),
(7, 'Pierre', 3),
(8, 'Olivier', 2),
(10, 'Jean-Luc', 4),
(12, 'Roger', 3),
(13, 'Roger', 2),
(19, 'Pierre-Roger', 14),
(20, 'Joueur anonyme', 3),
(21, 'Joueur anonyme', 0),
(22, 'Olivier', 0),
(23, 'Olivier', 1),
(24, 'Olivier', 2),
(25, 'Olivier', 0),
(26, 'Olivier', 9),
(27, 'Olivier', 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
