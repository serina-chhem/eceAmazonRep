-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Mai 2019 à 16:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `eceamazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

CREATE TABLE IF NOT EXISTS `acheteur` (
  `Login` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `numeroCarte` int(7) NOT NULL,
  `nomCarte` varchar(255) NOT NULL,
  `dateExpiration` date NOT NULL,
  `codeCarte` int(4) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `acheteur`
--

INSERT INTO `acheteur` (`Login`, `Nom`, `Password`, `numeroCarte`, `nomCarte`, `dateExpiration`, `codeCarte`, `Adresse`) VALUES
('julien.rauber@edu.ece.fr', 'Julien', 'Julien1234', 222, 'Rauber', '2025-01-08', 8888, '20 rue des lilas'),
('nicolas.dumas-delage@edu.ece.fr', 'Nicolas', 'Nicolas1234', 111, 'Dumas-Delage', '2023-04-12', 9999, '12 allée des perdrix'),
('paul.laplaige@edu.ece.fr', 'Paul', 'Paul1234', 333, 'Laplaige', '2022-11-12', 7777, '19 avenue des champs élysées');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Livres'),
(2, 'Musique'),
(3, 'Vetements'),
(4, 'Sports Et Loisir');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `vendeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `vendeur`) VALUES
(42, 'Le Labyrinthe', 'Evadez-vous dans cette histoire passionnante au suspens inimittable', 16, 'Livres', 'admin'),
(47, 'Notre-Dame de Paris', 'Avant incendie', 17, 'Livres', 'paul'),
(52, 'Creer un site web', 'Si vous voulez vous aussi crÃ©er un site      ', 18, 'Livres', 'aaa'),
(54, 'Harry Potter 7', 'Mais comment Harry, Ron et Hermione vont-ils vaincre les forces du mal ?', 19, 'Livres', 'admin'),
(55, 'T-shirt Fun', 'Pour les fans de programmation    ', 23, 'Vetements', 'admin'),
(56, 'Stan Smith', 'Chaussures incroyables qui ne souhaitent que vous voir les chausser au plus vite', 79, 'Vetements', 'admin'),
(57, 'Short Tricolore', 'Ce short vous ira Ã  merveille sur les plages cet Ã©tÃ©', 69, 'Vetements', 'admin'),
(58, 'Parka', 'Nous avons pensÃ© aux plus frileux avec cette parka que vous adorerez', 99, 'Vetements', 'admin'),
(59, 'Maillot France Football Femme', 'Soyez prÃªts Ã  soutenir nos bleues pour la coupe du monde en France au mois de juin', 89, 'Sports Et Loisir', 'admin'),
(60, 'Ballon Rugby Japon', 'Ballon officiel de la coupe du monde de Rugby 2019 au Japon', 29, 'Sports Et Loisir', 'admin'),
(61, 'Raquette de Tennis', 'Une raquette qui amÃ©liorera votre performance sur le terrain', 55, 'Sports Et Loisir', 'admin'),
(62, 'Gants de Boxe', 'Ces gants confortables plairont aux amateurs de sport de combat ', 45, 'Sports Et Loisir', 'admin'),
(63, 'Casque Audio', 'Pour Ã©couter vos musiques favorites avec un son de qualitÃ©  ', 79, 'Musique', 'admin'),
(64, 'Enceinte portable', 'IdÃ©ale pour voyager et Ã©couter de la musique avec vos amis', 85, 'Musique', 'admin'),
(65, 'Abbey road', 'Revivez les musiques emblÃ©matiques des Beatles', 35, 'Musique', 'admin'),
(66, 'Guitare', 'Les guitaristes de talent apprÃ©cieront cet instrument', 119, 'Musique', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `login`, `nom`, `password`, `pseudo`) VALUES
(1, 'bonjour@ece.fr', 'bonjour', 'bonjour', 'bon'),
(4, 'nicolas.dumas-delage@edu.ece.fr', 'serina', 'serinana', 'sire'),
(5, 'polo@edu.ece.fr', 'paul', 'paul', 'paul'),
(6, 'a@a.a', 'aaa', 'aaa', 'aaa'),
(7, 'a@a.a', 'aaa', 'aaa', 'aaa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
