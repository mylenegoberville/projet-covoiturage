-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-carpooling.alwaysdata.net
-- Generation Time: Jul 07, 2020 at 11:50 AM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpooling_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

CREATE TABLE `trajet` (
  `id` int(10) NOT NULL,
  `depart` varchar(350) NOT NULL,
  `arrivee` varchar(350) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `place` int(10) NOT NULL,
  `escale` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transporter`
--

CREATE TABLE `transporter` (
  `idT` int(10) NOT NULL,
  `idU` int(10) NOT NULL,
  `etat` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(20) NOT NULL,
  `nom` varchar(350) NOT NULL,
  `prenom` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `dateNaiss` date NOT NULL,
  `tel` int(10) NOT NULL,
  `codeP` int(5) NOT NULL,
  `ville` varchar(350) NOT NULL,
  `statut` varchar(35) DEFAULT NULL,
  `admin` int(2) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `dateNaiss`, `tel`, `codeP`, `ville`, `statut`, `admin`, `mdp`, `voiture`) VALUES
(1, 'guilherme', 'heine', 'guilherme.heine@kaina-com.fr', '2020-07-07', 606060606, 77000, 'melun', NULL, 2, 'test2020', 0),
(3, 'goberville', 'mylene', 'mylenegoberville@gmail.com', '1998-03-15', 606060606, 77000, 'coubert', NULL, 1, '$2y$10$Gy0ntWG99zV3qdCZnXKNpuIRRSfuSXmyt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `marque` varchar(11) NOT NULL,
  `modele` varchar(11) NOT NULL,
  `couleur` varchar(11) NOT NULL,
  `immatriculation` varchar(11) NOT NULL,
  `distinction` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `marque`, `modele`, `couleur`, `immatriculation`, `distinction`) VALUES
(1, 'opel', 'corsa', 'blanc', '44-ZQT-50', NULL),
(2, 'opel', 'safira', 'noir', '55-TGR-89', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transporter`
--
ALTER TABLE `transporter`
  ADD PRIMARY KEY (`idT`,`idU`),
  ADD KEY `idU` (`idU`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transporter`
--
ALTER TABLE `transporter`
  ADD CONSTRAINT `transporter_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transporter_ibfk_2` FOREIGN KEY (`idT`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
