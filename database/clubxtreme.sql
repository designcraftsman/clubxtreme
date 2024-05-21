-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 mai 2024 à 14:04
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
-- Base de données : `clubxtreme`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_personneladministratif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_personneladministratif`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_Club` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `adresse` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_Club`, `nom`, `adresse`) VALUES
(1, 'ClubXtreme', 'Quartier AbdelMoumen , CasaBlanca');

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

CREATE TABLE `entraineur` (
  `id_entraineur` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `specialite` varchar(64) NOT NULL,
  `niveauDeQualification` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`id_entraineur`, `id_utilisateur`, `specialite`, `niveauDeQualification`) VALUES
(1, 2, 'Football', 'First time'),
(3, 8, 'UpdatedSpecialty 6562', 'Entraineur');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_Evenement` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_Evenement`, `nom`, `date`, `lieu`, `description`) VALUES
(15, 'Match Baskett a paris257', '2024-04-22', 'Paris , Club Amanda ', 'Match Baskett a paris'),
(16, 'Event Name', '2024-04-30', 'Event Location', 'Event Description'),
(17, 'Event Name5', '2024-04-30', 'Event Location', 'Random description'),
(18, 'Nom de l\'événement', '2024-04-28', 'Lieu de l\'événement', 'Description de l\'événement'),
(21, 'Darifbdbdbd', '2024-05-16', 'Event Location2', 'Updated event4 description 6323755fnbgn');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id_membre` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id_membre`, `id_utilisateur`) VALUES
(10, 16),
(11, 21);

-- --------------------------------------------------------

--
-- Structure de la table `participationevenements`
--

CREATE TABLE `participationevenements` (
  `id_participationEvenement` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personneladministratif`
--

CREATE TABLE `personneladministratif` (
  `id_personnelAdministratif` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `salaire` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personneladministratif`
--

INSERT INTO `personneladministratif` (`id_personnelAdministratif`, `id_utilisateur`, `fonction`, `dateEmbauche`, `salaire`) VALUES
(1, 1, 'Top Manager', '2024-01-01', 80000),
(2, 9, 'Chef d\'équipe', '2024-01-06', 50100.8);

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `id_Rapport` int(11) NOT NULL,
  `date` date NOT NULL,
  `auteur` int(32) NOT NULL,
  `contenu` varchar(1024) NOT NULL,
  `destinataire` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rapport`
--

INSERT INTO `rapport` (`id_Rapport`, `date`, `auteur`, `contenu`, `destinataire`) VALUES
(2, '2024-04-28', 3, 'Contenu du rapport', 6),
(3, '2024-05-09', 14, 'sdddddddddd', 14);

-- --------------------------------------------------------

--
-- Structure de la table `sceanceentrainement`
--

CREATE TABLE `sceanceentrainement` (
  `id_SeanceEntrainement` int(11) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(64) NOT NULL,
  `exercices` text NOT NULL,
  `entraineur` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sceanceentrainement`
--

INSERT INTO `sceanceentrainement` (`id_SeanceEntrainement`, `date`, `lieu`, `exercices`, `entraineur`) VALUES
(35, '2024-04-28', 'Gym ABS', 'Warm up, Cardio, Strength training, Endurance', 1),
(36, '2024-04-28', 'Gym ABS', 'Warm up, Cardio, Strength training, Endurance', 1);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
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

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_membre`, `montant`, `date`, `methode`, `status`, `type`) VALUES
(10, 11, 3500, '2024-04-20', 'PayPal', 'Payé', 'Subscription payement');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `motDePasse` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `numDeTelephone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `motDePasse`, `email`, `dateDeNaissance`, `numDeTelephone`) VALUES
(1, 'youssef', 'moustaid', 'ssssss5555666333SSSCCd....', 'youssefmoustaid@gmail.com', '1990-01-01', '0634372769'),
(2, 'Oussama', 'Fayz', 'dbffbydndf4n...448f4nJ', 'fayzoussama@gmail.com', '1990-03-03', '0123456789'),
(3, 'John', 'Doe Marna', 'newpasswGDSrd25fb..s-b', 'yassine@gmail.com', '1990-01-01', '0123456789'),
(4, 'John', 'Doe', 'dwGfbfbdgsdms4f.S6_78', 'yassineAllami@gmail.com', '1990-01-01', '0123456789'),
(5, 'John', 'Doe', 'dwGfbfbdgsdms4f.S6_78', 'yassineAllami453@gmail.com', '1990-01-01', '0123456789'),
(6, 'John', 'Doe', 'password123', 'johnWalker@example.com', '1990-01-01', '0123456789'),
(7, 'youssef', 'alfamori55', 'newpasswGDSrd25fb..s-b', 'yy@gmail.com', '1990-01-12', '0634372766'),
(8, 'Ahmed', 'Lemfessal', 'password123', 'AhmedLemfesel@example.com', '1990-01-01', '0123456789'),
(9, 'Ahmed', 'Lemfessalawi', 'password123', 'updatedemail516@example.com', '1990-01-01', '0123456789'),
(10, 'John', 'Doe Marna', 'newpasswGDSrd25fb..s-b', 'yassinePara@gmail.com', '1990-01-01', '0123456789'),
(11, 'youssef', 'moustaid', 'newpasswGDSrd25fb..s-b', 'youssefmoustaid58@gmail.com', '1990-01-01', '0634372762'),
(12, 'youssef', 'moustaid', 'newpasswGDSrd25fb..s-b', 'youssefmoustaid5458@gmail.com', '1990-01-01', '0634372762'),
(13, 'youssef', 'alfamori', 'newpasswGDSrd25fb..s-b', 'yy@gmail.com', '1990-01-01', '0634372762'),
(14, 'John', 'Doe Marna', 'newpasswGDSrd25fb..s-b', 'dd5@gmail.com', '1990-01-01', '0123456789'),
(15, 'youssef', 'alfamori', 'newpasswGDSrd25fb..s-b', 'yy56@gmail.com', '1990-01-01', '0634372762'),
(16, 'John', 'Doe', 'password123', 'john@gmail.com', '1990-01-01', '123456789'),
(17, 'John', 'Doe', 'password123', 'johnmansour@gmail.com', '1990-01-01', '123456789'),
(18, 'John', 'Doe', 'password123', 'jonathan@gmail.com', '1990-01-01', '123456789'),
(19, 'youssef', 'mersoni', 'password123', 'mersoni@gmail.com', '1990-01-01', '123456789'),
(20, 'Farouki', 'Mohamed', 'MedFarouki..5556?', 'MedFarouki@gmail.com', '2000-12-22', '0634372762'),
(21, 'iphone 15 pro 512 Gb', 'alfamori56', 'dateDeNaissance', 'YoussefnumDeTelephoneMoustaid1970@gmail.com', '1999-05-05', '0634372762');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `adminUser` (`id_personneladministratif`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_Club`);

--
-- Index pour la table `entraineur`
--
ALTER TABLE `entraineur`
  ADD PRIMARY KEY (`id_entraineur`),
  ADD KEY `entraineurUser` (`id_utilisateur`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_Evenement`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `memberUser` (`id_utilisateur`);

--
-- Index pour la table `participationevenements`
--
ALTER TABLE `participationevenements`
  ADD PRIMARY KEY (`id_participationEvenement`),
  ADD KEY `evenement` (`id_evenement`),
  ADD KEY `member` (`id_participant`);

--
-- Index pour la table `personneladministratif`
--
ALTER TABLE `personneladministratif`
  ADD PRIMARY KEY (`id_personnelAdministratif`),
  ADD KEY `personnelAdminstratifUser` (`id_utilisateur`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id_Rapport`),
  ADD KEY `destinataire` (`destinataire`),
  ADD KEY `auteur` (`auteur`);

--
-- Index pour la table `sceanceentrainement`
--
ALTER TABLE `sceanceentrainement`
  ADD PRIMARY KEY (`id_SeanceEntrainement`),
  ADD KEY `entraineur` (`entraineur`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `transactionMember` (`id_membre`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_Club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entraineur`
--
ALTER TABLE `entraineur`
  MODIFY `id_entraineur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_Evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `participationevenements`
--
ALTER TABLE `participationevenements`
  MODIFY `id_participationEvenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `personneladministratif`
--
ALTER TABLE `personneladministratif`
  MODIFY `id_personnelAdministratif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id_Rapport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sceanceentrainement`
--
ALTER TABLE `sceanceentrainement`
  MODIFY `id_SeanceEntrainement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `adminUser` FOREIGN KEY (`id_personneladministratif`) REFERENCES `personneladministratif` (`id_personnelAdministratif`);

--
-- Contraintes pour la table `entraineur`
--
ALTER TABLE `entraineur`
  ADD CONSTRAINT `entraineurUser` FOREIGN KEY (`id_entraineur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `memberUser` FOREIGN KEY (`id_utilisateur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `participationevenements`
--
ALTER TABLE `participationevenements`
  ADD CONSTRAINT `evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_Evenement`),
  ADD CONSTRAINT `member` FOREIGN KEY (`id_participant`) REFERENCES `member` (`id_membre`);

--
-- Contraintes pour la table `personneladministratif`
--
ALTER TABLE `personneladministratif`
  ADD CONSTRAINT `personnelAdminstratifUser` FOREIGN KEY (`id_utilisateur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`destinataire`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `rapport_ibfk_2` FOREIGN KEY (`auteur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `sceanceentrainement`
--
ALTER TABLE `sceanceentrainement`
  ADD CONSTRAINT `sceanceentrainement_ibfk_1` FOREIGN KEY (`entraineur`) REFERENCES `entraineur` (`id_entraineur`);

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transactionMember` FOREIGN KEY (`id_membre`) REFERENCES `member` (`id_membre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
