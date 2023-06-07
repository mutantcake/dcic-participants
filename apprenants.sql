-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 juin 2023 à 16:05
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `d_clic`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenants`
--

CREATE TABLE `apprenants` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(255) NOT NULL,
  `formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenants`
--

INSERT INTO `apprenants` (`id`, `nom`, `prenom`, `date_naissance`, `ville`, `formation`) VALUES
(1, 'BAMOGO', 'Cecile', '1993-01-04', 'KOUDOUGOU', 'DEV_WEB '),
(2, 'SARE', 'Paul', '2015-06-04', 'KOUDOUGOU', 'INFOGRAPHIE'),
(3, 'GAYERI', 'DAVID', '1998-07-08', 'KOUDOUGOU', 'DEV_WEB'),
(4, 'BALI', 'OLLO', '1999-06-06', 'bobo', 'ICONOGRPHIE'),
(5, 'LALA', 'LOLO', '2000-06-03', 'FADA', 'DEV_WEB'),
(6, 'POKO', 'Pogbi', '2001-06-14', 'OUAGADOUGOU', 'DEV_MOBILE'),
(7, 'BAMOGO', 'Cecile', '1993-01-04', 'KOUDOUGOU', 'DEV_WEB '),
(8, 'SARE', 'Paul', '2000-06-04', 'KOUDOUGOU', 'INFOGRAPHIE'),
(9, 'GAYERI', 'DAVID', '1998-07-08', 'KOUDOUGOU', 'DEV_WEB'),
(10, 'BALI', 'OLLO', '1999-06-06', 'bobo', 'ICONOGRPHIE'),
(11, 'LALA', 'LOLO', '2000-06-03', 'FADA', 'DEV_WEB'),
(12, 'POKO', 'Pogbi', '2001-06-14', 'OUAGADOUGOU', 'DEV_MOBILE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
