-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 fév. 2024 à 11:56
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `royal_tech`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_gainParCat` (IN `cat` VARCHAR(30))   SELECT   SUM(prix*quantite) 
FROM article as A
JOIN ligne as L using (id_article)
GROUP BY categorie
HAVING categorie=cat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_qteTotaleVendueByArticle` ()   SELECT id_article, designation, prix, categorie, SUM(quantite)
FROM article as A
JOIN ligne as L using (id_article)
GROUP BY id_article$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` varchar(5) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `designation`, `prix`, `categorie`) VALUES
('CA300', 'Canon EOS 3000V zoom 28/80', 300, 'photo'),
('CAS07', 'Cassette DV60 par 5', 26.9, 'divers'),
('CP100', 'Camescope Panasonic SV-AV 100', 1490, 'video'),
('CS330', 'Caméscope Sony DCR-PC330', 1629, 'video'),
('DEL30', 'Portable Dell X300', 1715, 'informatique'),
('DVD75', 'DVD vierge par 3', 17.5, 'divers'),
('HP497', 'PC Bureau HP497 écran TFT', 1500, 'informatique'),
('NIK55', 'Nikon F55+zoom 28/80', 269, 'photo'),
('NIK80', 'Nikon F80', 479, 'photo'),
('SAX15', 'Portable Samsung X15 XVM', 1999, 'informatique'),
('SOXMP', 'PC Portable Sony Z1-XMP', 2399, 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `civilite` enum('M.','Mme','Melle','') NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `civilite`, `nom`, `prenom`, `age`, `adresse`, `ville`, `code_postal`, `mail`) VALUES
(1, 'M.', 'RESTOUEIX', 'Sacha', 36, '5 Avenue Albert Einstein', 'Le Saillant', '19240', 'sacha@gmail.com'),
(2, 'M.', 'Rapp', 'Paul', 44, '32 Avenue Foch', 'Paris', '75001', 'rapp@libert.com'),
(3, 'M.', 'Devos', 'Marie', 18, '75 Boulevard Hochimin', 'Lille', '59000', 'grav@wanadoo.com'),
(4, 'M.', 'Hauchon', 'Paul', 22, '12 Rue Tsétsé', 'Chartres', '28000', 'hauch@gmail.com'),
(5, 'M.', 'Grave', 'Nuyen', 18, '75 Boulevard Hochimin', 'Lille', '59000', 'grave@gmail.com'),
(6, 'Mme', 'Hachette', 'Jeanne', 45, '60 Rue d\'Amiens', 'Versailles', '78000', ''),
(7, 'M.', 'Marti', 'Pierre', 25, '4 Avenue Henry 8', 'Paris', '75008', 'marti@gmail.com'),
(8, 'M.', 'Mac Neal', 'John', 52, '59 Rue Diana', 'Lyon', '69000', 'macneal@gmail.com'),
(9, 'M.', 'Basile', 'Did', 37, '26 Rue Gallas', 'Nantes', '44000', 'bas@walabi.com'),
(10, 'Melle', 'Darc', 'Jeanne', 19, '9 Avenue d\'Orléans', 'Paris', '75012', ''),
(11, 'M.', 'Gate', 'Bill', 75, '9 Boulevard des Bugs', 'Lyon', '78000', 'bill@microhard.be'),
(14, 'M.', 'RESTOUEIX', 'Sacha', 52, '25 Route des ardoises', 'Allassac', '19240', 'sacha@free.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_client` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_comm`, `date`, `id_client`) VALUES
(1, '2012-06-11', 5),
(2, '2012-06-25', 9),
(3, '2012-07-12', 1),
(4, '2012-07-14', 3),
(5, '2012-07-31', 9),
(6, '2012-08-08', 10),
(7, '2012-08-25', 2),
(8, '2012-09-04', 7),
(9, '2012-10-15', 11),
(10, '2012-11-23', 4),
(11, '2013-01-21', 8),
(12, '2013-02-01', 5),
(13, '2013-03-03', 9);

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

CREATE TABLE `ligne` (
  `id_article` varchar(5) NOT NULL,
  `id_comm` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ligne`
--

INSERT INTO `ligne` (`id_article`, `id_comm`, `quantite`, `prix_unit`) VALUES
('CA300', 5, 1, 329),
('CAS07', 1, 3, 26.9),
('CAS07', 6, 3, 26.9),
('CAS07', 12, 4, 26.9),
('CP100', 6, 1, 1490),
('CP100', 8, 1, 1490),
('CS330', 1, 1, 1629),
('CS330', 3, 2, 1629),
('CS330', 12, 3, 1629),
('DEL30', 10, 2, 1715),
('DVD75', 4, 2, 17.5),
('DVD75', 11, 10, 17.5),
('HP497', 2, 2, 1500),
('NIK55', 9, 1, 269),
('NIK80', 3, 5, 479),
('SAX15', 7, 5, 1999),
('SAX15', 10, 1, 1999),
('SAX15', 13, 2, 1999),
('SOXMP', 4, 3, 2399),
('SOXMP', 8, 1, 2399);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` enum('Admin','Editeur','Lecteur','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Editeur'),
(3, 'Lecteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(20) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `id_role` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `mdp`, `id_role`) VALUES
('elphege', '020778', 1),
('jojo', '300582', 2);

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
  ADD PRIMARY KEY (`id_comm`);

--
-- Index pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD PRIMARY KEY (`id_article`,`id_comm`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- procédures stockees: 
-- tableauFact  int Id
-- SELECT id_article, prix_unit, quantite , ROUND(quantite*prix_unit,2) AS prixHT
-- FROM ligne
-- WHERE id_comm=id

-- listComm
-- SELECT id_comm, id_client, civilite, nom, prenom, adresse, ville
-- FROM commande
-- JOIN client using(id_client)

-- get_entetePDF INT id
-- SELECT  CONCAT (civilite, ' ', nom, ' ', prenom) AS Civ, adresse, CONCAT(code_postal,' ',ville) AS CPV,  mail
-- FROM client
-- JOIN commande USING(id_client)
-- WHERE id_comm=id