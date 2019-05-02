-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 mai 2019 à 15:28
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eceamazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

CREATE TABLE `acheteur` (
  `Login` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `numeroCarte` int(7) NOT NULL,
  `nomCarte` varchar(255) NOT NULL,
  `dateExpiration` date NOT NULL,
  `codeCarte` int(4) NOT NULL,
  `Adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`Login`, `Nom`, `Password`, `numeroCarte`, `nomCarte`, `dateExpiration`, `codeCarte`, `Adresse`) VALUES
('julien.rauber@edu.ece.fr', 'Julien', 'Julien1234', 222, 'Rauber', '2025-01-08', 8888, '20 rue des lilas'),
('nicolas.dumas-delage@edu.ece.fr', 'Nicolas', 'Nicolas1234', 111, 'Dumas-Delage', '2023-04-12', 9999, '12 allée des perdrix'),
('paul.laplaige@edu.ece.fr', 'Paul', 'Paul1234', 333, 'Laplaige', '2022-11-12', 7777, '19 avenue des champs élysées');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'livres'),
(2, 'musique'),
(3, 'vetements'),
(4, 'sportsEtLoisir');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `vendeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `vendeur`) VALUES
(41, 'julien ', 'baraya', 1, 'musique', 'admin'),
(42, 'paulolap', 'blabla', 100, 'livres', 'admin'),
(44, 'test', 'blabla', 10, 'vetements', 'admin'),
(45, 'testo', 'blabla', 10, 'sportsEtLoisir', 'sire'),
(46, 'nicolas', 'blabla', 10, 'musique', 'admin'),
(47, 'polo', 'polochon  ahahahha        ', 2, 'livres', 'paul');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `login`, `nom`, `password`, `pseudo`) VALUES
(1, 'bonjour@ece.fr', 'bonjour', 'bonjour', 'bon'),
(2, 'salut@ece.fr', 'salut', 'salut', 'sal'),
(3, 'sss', 'serina', 'serinana', 'sire'),
(4, 'nicolas.dumas-delage@edu.ece.fr', 'serina', 'serinana', 'sire'),
(5, 'polo@edu.ece.fr', 'paul', 'paul', 'paul');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acheteur`
--
ALTER TABLE `acheteur`
  ADD PRIMARY KEY (`Login`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
