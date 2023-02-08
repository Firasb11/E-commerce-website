-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 avr. 2022 à 23:59
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae23`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` char(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `categorie` enum('Tous','Video','Photo','Téléphonie','Informatique','Divers') NOT NULL DEFAULT 'Tous',
  `nom_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `designation`, `prix`, `categorie`, `nom_image`) VALUES
('1', 'Canon P352', '210.00', 'Video', ''),
('12', 'Canon EOS 2000D', '800.00', 'Photo', 'Article_472.jpg'),
('18', 'NIKON D810', '870.00', 'Photo', 'Article_453.jpg'),
('189', 'MSI GeForce RTX 3060 TI', '15.00', 'Informatique', 'Article_968.jpg'),
('40', 'Samsung Galaxy20 Gris', '1120.00', 'Téléphonie', 'Article_491.png'),
('5', 'pc lap', '1500.00', 'Informatique', 'Article_928.jpg'),
('7', 'JVC GY-HM180E', '1500.00', 'Video', 'Article_646.jpg'),
('9', 'Samsung UE65MU9000T', '1200.00', 'Video', 'Article_474.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` mediumint(9) NOT NULL,
  `nom` char(40) NOT NULL,
  `prenom` char(40) NOT NULL,
  `adresse` char(40) NOT NULL,
  `ville` char(40) NOT NULL,
  `mail` char(40) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` mediumint(8) UNSIGNED NOT NULL,
  `id_client` mediumint(9) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`) VALUES
(1),
(5),
(5),
(5),
(1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `mot_de_passe`, `nom`) VALUES
(2, 'firasbl123', 'firas');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comm`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_comm` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
