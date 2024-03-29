-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 fév. 2024 à 16:47
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
-- Base de données : `formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `nom_membre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_membre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `nom_membre`, `login_membre`) VALUES
(1, 'KIROULE', 'Pierre'),
(2, 'GATOR', 'Ali'),
(3, 'TERIEUR', 'Alain'),
(4, 'TOMIE', 'Anna'),
(5, 'CONNERY', 'Aretha'),
(6, 'CELERT', 'Jacques'),
(7, 'ONETTE', 'Camille'),
(8, 'DURE', 'Laure'),
(9, 'DELION', 'Dan'),
(10, 'GOCHE', 'Elvira'),
(11, 'TOUILLE', 'Sacha'),
(12, 'MANVUSSA', 'Gerard'),
(110, 'Dupont', 'Alfred'),
(112, 'Du', 'Alfred'),
(113, 'Larcher', 'Gérard'),
(114, 'Larcher', 'Gérald');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
