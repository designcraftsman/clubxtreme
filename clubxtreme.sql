-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 01:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubxtreme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_utulisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id_Club` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entraineur`
--

CREATE TABLE `entraineur` (
  `id_entraineur` int(11) NOT NULL,
  `id_utulisateur` int(11) NOT NULL,
  `specialite` varchar(64) NOT NULL,
  `niveauDeQualification` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id_Evenement` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_membre` int(11) NOT NULL,
  `id_utulisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participationevenements`
--

CREATE TABLE `participationevenements` (
  `id_participationEvenement` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personneladminstratif`
--

CREATE TABLE `personneladminstratif` (
  `id_personnelAdminstratif` int(11) NOT NULL,
  `id_utulisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rapport`
--

CREATE TABLE `rapport` (
  `id_Rapport` int(11) NOT NULL,
  `date` date NOT NULL,
  `auteur` varchar(32) NOT NULL,
  `contenu` varchar(1024) NOT NULL,
  `destinataire` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sceanceentrainement`
--

CREATE TABLE `sceanceentrainement` (
  `id_SeanceEntrainement` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `lieu` varchar(64) NOT NULL,
  `exercices` text NOT NULL,
  `entraineur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `montant` float NOT NULL,
  `date` date NOT NULL,
  `methode` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `modDePasse` varchar(64) NOT NULL,
  `email` int(32) NOT NULL,
  `dateDeNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `adminUser` (`id_utulisateur`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_Club`);

--
-- Indexes for table `entraineur`
--
ALTER TABLE `entraineur`
  ADD PRIMARY KEY (`id_entraineur`),
  ADD KEY `entraineurUser` (`id_utulisateur`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_Evenement`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `memberUser` (`id_utulisateur`);

--
-- Indexes for table `participationevenements`
--
ALTER TABLE `participationevenements`
  ADD PRIMARY KEY (`id_participationEvenement`),
  ADD KEY `evenement` (`id_evenement`),
  ADD KEY `member` (`id_participant`);

--
-- Indexes for table `personneladminstratif`
--
ALTER TABLE `personneladminstratif`
  ADD PRIMARY KEY (`id_personnelAdminstratif`),
  ADD KEY `personnelAdminstratifUser` (`id_utulisateur`);

--
-- Indexes for table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id_Rapport`);

--
-- Indexes for table `sceanceentrainement`
--
ALTER TABLE `sceanceentrainement`
  ADD PRIMARY KEY (`id_SeanceEntrainement`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `transactionMember` (`id_membre`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id_Club` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entraineur`
--
ALTER TABLE `entraineur`
  MODIFY `id_entraineur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_Evenement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participationevenements`
--
ALTER TABLE `participationevenements`
  MODIFY `id_participationEvenement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personneladminstratif`
--
ALTER TABLE `personneladminstratif`
  MODIFY `id_personnelAdminstratif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id_Rapport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sceanceentrainement`
--
ALTER TABLE `sceanceentrainement`
  MODIFY `id_SeanceEntrainement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `adminUser` FOREIGN KEY (`id_utulisateur`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `entraineur`
--
ALTER TABLE `entraineur`
  ADD CONSTRAINT `entraineurUser` FOREIGN KEY (`id_entraineur`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `memberUser` FOREIGN KEY (`id_utulisateur`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `participationevenements`
--
ALTER TABLE `participationevenements`
  ADD CONSTRAINT `evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_Evenement`),
  ADD CONSTRAINT `member` FOREIGN KEY (`id_participant`) REFERENCES `member` (`id_membre`);

--
-- Constraints for table `personneladminstratif`
--
ALTER TABLE `personneladminstratif`
  ADD CONSTRAINT `personnelAdminstratifUser` FOREIGN KEY (`id_utulisateur`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transactionMember` FOREIGN KEY (`id_membre`) REFERENCES `member` (`id_membre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
