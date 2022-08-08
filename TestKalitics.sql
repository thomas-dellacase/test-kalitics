-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 08, 2022 at 01:52 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TestKalitics`
--

-- --------------------------------------------------------

--
-- Table structure for table `Chantiers`
--

CREATE TABLE `Chantiers` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Chantiers`
--

INSERT INTO `Chantiers` (`id`, `nom`, `adresse`, `Date`, `week`) VALUES
(1, 'EcolePrimaire', '123 rue machin', '2022-09-05', 36),
(2, 'Hopital', '1233642 rue machin', '2022-08-22', 34),
(3, 'Snack', '123765 rue Budule', '2022-08-29', 35),
(5, 'Villa', '123 rue truc', '2022-08-22', 34),
(6, 'Maison', '12498 rue machin', '2022-09-05', 36);

-- --------------------------------------------------------

--
-- Table structure for table `Pointage`
--

CREATE TABLE `Pointage` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_chant` int(11) NOT NULL,
  `duree` varchar(1) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Pointage`
--

INSERT INTO `Pointage` (`id`, `id_user`, `id_chant`, `duree`, `date`, `semaine`) VALUES
(1, 2, 1, '8', '2022-09-09', 36),
(2, 2, 1, '7', '2022-09-08', 36),
(3, 2, 1, '8', '2022-09-07', 36),
(4, 2, 2, '8', '2022-08-15', 33),
(5, 2, 2, '8', '2022-08-16', 33),
(6, 2, 2, '8', '2022-08-17', 33),
(19, 2, 2, '8', '2022-08-18', 33),
(20, 2, 2, '3', '2022-08-19', 33),
(21, 2, 3, '8', '2022-08-29', 35),
(22, 2, 3, '8', '2022-08-30', 35),
(23, 2, 3, '5', '2022-08-31', 35),
(25, 3, 2, '6', '2022-08-15', 33),
(26, 3, 3, '8', '2022-08-17', 33),
(27, 3, 2, '6', '2022-08-19', 33),
(29, 1, 2, '5', '2022-08-16', 33),
(31, 13, 2, '5', '2022-08-16', 33),
(32, 13, 5, '7', '2022-08-16', 33),
(33, 2, 5, '9', '2022-08-24', 34),
(35, 2, 2, '9', '2022-08-23', 34),
(36, 2, 2, '9', '2022-08-29', 35),
(37, 2, 6, '9', '2022-09-05', 36),
(38, 2, 6, '9', '2022-09-07', 36);

-- --------------------------------------------------------

--
-- Table structure for table `Point_Chant`
--

CREATE TABLE `Point_Chant` (
  `id` int(11) NOT NULL,
  `id_chant` int(11) NOT NULL,
  `id_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Point_Utili`
--

CREATE TABLE `Point_Utili` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `matricule` varchar(5) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `matricule`, `password`) VALUES
(1, 'Jean', 'Jean', '12AZE', '$2y$10$0Hd.lqf6K2tgtut7r3wqQ.wiXr7YcIs03a.5Etk15.5bMUzuQ3md6'),
(2, 'Ruben', 'JeanMi', '22EBS', '$2y$10$6ENM25e6IEa.Lh35Cj52R.BqFBRjsXd0SK1OlFQicBQQVp53HvqTu'),
(3, 'Pascal', 'Jean', '14QSD', '$2y$10$9oY6SR6O6oYqMKKIbbGJne/gO6qR8S7LAuBJl5myEwRAgejBT4o5i'),
(13, 'Remy', 'JeanJean', '69NIC', '$2y$10$VKz/QJjcXz4Pu2/QJITaCOea6hnC0dk/zw9EaTYPiC7NzV5z2q9Wu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Chantiers`
--
ALTER TABLE `Chantiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Pointage`
--
ALTER TABLE `Pointage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Point_Chant`
--
ALTER TABLE `Point_Chant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chant` (`id_chant`),
  ADD KEY `id_point` (`id_point`);

--
-- Indexes for table `Point_Utili`
--
ALTER TABLE `Point_Utili`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_point` (`id_point`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Chantiers`
--
ALTER TABLE `Chantiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Pointage`
--
ALTER TABLE `Pointage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Point_Chant`
--
ALTER TABLE `Point_Chant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Point_Utili`
--
ALTER TABLE `Point_Utili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
