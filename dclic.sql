-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 06:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dclic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `level`) VALUES
(1, 'Zoundi', 'Michel', 'zoundi@test.com', '4a7d1ed414474e4033ac29ccb8653d9b', '1'),
(7, 'Nignan', 'Marchel', 'zoubga@test.com', '4a7d1ed414474e4033ac29ccb8653d9b', '2');

-- --------------------------------------------------------

--
-- Table structure for table `apprenants`
--

CREATE TABLE `apprenants` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apprenants`
--

INSERT INTO `apprenants` (`id`, `nom`, `prenom`, `date_naissance`, `ville`, `formation`) VALUES
(21, 'Mamadou', 'Mamadou', '2004-08-28', 'Koudougou', 'Marketing numérique'),
(24, 'Sophie', 'Sophie', '1995-03-13', 'Ouahigouya', 'Design graphique'),
(26, 'Aïssatou', 'Aïssatou', '1997-11-30', 'Koudougou', 'Design graphique'),
(27, 'Mamadou', 'Mamadou', '1993-02-14', 'Bobo-Dioulasso', 'Data science'),
(28, 'Nignan', 'Aïssatou', '1992-01-23', 'Banfora', 'Marketing numérique'),
(29, 'Noel', 'Noel', '2000-04-04', 'Koudougou', 'Marketing numérique'),
(30, 'Bamogo', 'Aïssatou', '2003-12-12', 'Ouagadougou', 'Cybersécurité'),
(31, 'John', 'John', '2005-11-09', 'Koudougou', 'Développement web'),
(32, 'Laura', 'Laura', '1991-12-26', 'Ouagadougou', 'Marketing numérique'),
(35, 'Noel', 'Noel', '1994-10-28', 'Banfora', 'Data science'),
(36, 'Kabore', 'Laura', '2003-03-07', 'Banfora', 'Design graphique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
