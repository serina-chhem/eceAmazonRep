-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 mai 2019 à 09:47
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
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`) VALUES
(24, 'julien ', 'rauber', 36, 'musique'),
(25, 'nicolas', 'dd', 10, 'livres'),
(26, 'ece', 'school', 9000, 'vetements'),
(27, 'end', 'game', 10, 'sportsEtLoisir'),
(28, 'serina', 'na', 100, 'livres'),
(29, 'test1', 'hfriusfherisughzerp_gvih erdgvz \r\n \r\n uiredfhv \r\n \r\n \r\n \r\n \r\n gzr_dfibhvr \r\n \r\n fuidhvuidsfhbv \r\n \r\n \r\n ueisfdhbvsuifdhvnfuis    ', 10, 'musique'),
(30, 'les misÃ©rables', 'Du temps du roi Moabdar, il y avait Ã  Babylone un jeune homme nommÃ© Zadig, nÃ© avec un beau naturel fortifiÃ© par lâ€™Ã©ducation. Quoique riche et jeune, il savait modÃ©rer ses passions ; il nâ€™affectait rien ; il ne voulait point toujours avoir raison, et savait respecter la faiblesse des hommes. On Ã©tait Ã©tonnÃ© de voir quâ€™avec beaucoup dâ€™esprit il nâ€™insultÃ¢t jamais par des railleries Ã  ces propos si vagues, si rompus, si tumultueux, Ã  ces mÃ©disances tÃ©mÃ©raires, Ã  ces dÃ©cisions ignorantes, Ã  ces turlupinades grossiÃ¨res, Ã  ce vain bruit de paroles quâ€™on appelait conversation dans Babylone. Il avait appris dans le premier livre de Zoroastre, que lâ€™amour-propre est un ballon gonflÃ© de vent, dont il sort des tempÃªtes quand on lui a fait une piqÃ»re. Zadig surtout ne se vantait pas de mÃ©priser les femmes et de les subjuguer. Il Ã©tait gÃ©nÃ©reux ; il ne craignait point dâ€™obliger des ingrats, suivant ce grand prÃ©cepte de Zoroastre : Quand tu manges, donne Ã  manger aux chiens, dussent-ils te mordre. Il Ã©tait aussi sage quâ€™on peut lâ€™Ãªtre ; car il cherchait Ã  vivre avec des sages. Instruit dans les sciences des anciens ChaldÃ©ens, il nâ€™ignorait pas les principes physiques de la nature, tels quâ€™on les connaissait alors, et savait de la mÃ©taphysique ce quâ€™on en a su dans tous les Ã¢ges, câ€™est-Ã -dire fort peu de chose. Il Ã©tait fermement persuadÃ© que lâ€™annÃ©e Ã©tait de trois cent soixante et cinq jours et un quart, malgrÃ© la nouvelle philosophie de son temps, et que le soleil Ã©tait au centre du monde ; et quand les principaux mages lui disaient, avec une hauteur insultante, quâ€™il avait de mauvais sentiments, et que câ€™Ã©tait Ãªtre ennemi de lâ€™Ã‰tat que de croire que le soleil tournait sur lui-mÃªme, et que lâ€™annÃ©e avait douze mois, il se taisait sans colÃ¨re et sans dÃ©dain.', 10, 'livres');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `Login` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `imageFond` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`Login`, `Nom`, `Password`, `Photo`, `imageFond`) VALUES
('julien.delgay@edu.ece.fr', 'Julien', 'JulienD1234', 'photoJulienD.jpg', 'photoImageFondJulienD.jpg'),
('raphael.daici@edu.ece.fr', 'Raphael', 'Raph1234', 'photoRaph.jpg', 'photoImageFondRaph.jpg'),
('sawsane.aloui@edu.ece.fr', 'Sawsane', 'Saw1234', 'photoSaw.jpg', 'photoImageFondSaw.jpg');

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
  ADD PRIMARY KEY (`Login`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
