-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 26 Novembre 2014 à 16:47
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `kof`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE IF NOT EXISTS `joueurs` (
`id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_inscription` date NOT NULL,
  `Pseudo` varchar(10) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'http://placehold.it/50x50'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nom`, `prenom`, `date_inscription`, `Pseudo`, `mdp`, `image`) VALUES
(1, 'BOULKA', 'Etienne', '2014-11-24', 'Coolman', '123', 'http://placehold.it/50x50'),
(2, 'DIDOU', 'Etienne', '2014-11-24', 'Cuisto', '123', 'http://placehold.it/50x50'),
(3, 'BOULKA', 'Jules', '2014-11-24', 'Hotman', '123', 'http://placehold.it/50x50'),
(4, 'PINTOU', 'Jules', '2014-11-24', 'Spiderman', '123', 'http://placehold.it/50x50'),
(5, 'AMARi', 'Sofiane', '2014-11-26', 'Sof', '123', 'http://placehold.it/50x50');

-- --------------------------------------------------------

--
-- Structure de la table `journees`
--

CREATE TABLE IF NOT EXISTS `journees` (
  `date` date NOT NULL,
  `saison` int(11) NOT NULL,
  `journee` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `journees`
--

INSERT INTO `journees` (`date`, `saison`, `journee`) VALUES
('2014-11-01', 1, 1),
('2014-12-01', 1, 2),
('2014-12-02', 2, 2),
('2014-11-08', 1, 3),
('2014-12-08', 2, 3),
('2014-11-15', 1, 4),
('2014-12-15', 2, 4),
('2014-11-22', 1, 5),
('2014-12-22', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `joueur` int(10) NOT NULL,
  `position` int(10) NOT NULL,
  `journee` varchar(6) NOT NULL,
  `saison` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `positions`
--

INSERT INTO `positions` (`joueur`, `position`, `journee`, `saison`) VALUES
(1, 1, '1', 2),
(1, 2, '1', 1),
(1, 3, '2', 1),
(1, 3, '2', 2),
(2, 1, '1', 1),
(2, 1, '2', 1),
(2, 2, '1', 2),
(2, 2, '2', 2),
(3, 1, '2', 2),
(3, 2, '2', 1),
(3, 3, '1', 1),
(3, 3, '1', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `journees`
--
ALTER TABLE `journees`
 ADD PRIMARY KEY (`journee`,`saison`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
 ADD PRIMARY KEY (`joueur`,`position`,`journee`,`saison`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
