-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 juin 2023 à 10:29
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ia_data`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `Id_Inscription` int(11) NOT NULL,
  `Inscription_Date` date DEFAULT NULL,
  `Id_Plans` int(11) DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`Id_Inscription`, `Inscription_Date`, `Id_Plans`, `Id_User`) VALUES
(1, '2023-06-17', 1, 3),
(2, '2023-06-17', 2, 2),
(5, '2023-06-18', 2, 5),
(6, '2023-06-18', 8, 6),
(17, '2023-06-18', 2, 9),
(18, '2023-06-18', 1, 9),
(19, '2023-06-18', 1, 9),
(20, '2023-06-18', 1, 9),
(21, '2023-06-18', 6, 10),
(22, '2023-06-18', 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `measures`
--

CREATE TABLE `measures` (
  `Id_Measure` int(11) NOT NULL,
  `Height` float DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `Neck` float DEFAULT NULL,
  `Waist` float DEFAULT NULL,
  `Hip` float DEFAULT NULL,
  `Body_Fat` float DEFAULT NULL,
  `BMR` float DEFAULT NULL,
  `BMI` float DEFAULT NULL,
  `Ideal_Weight` float DEFAULT NULL,
  `Id_Inscription` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `measures`
--

INSERT INTO `measures` (`Id_Measure`, `Height`, `Weight`, `Neck`, `Waist`, `Hip`, `Body_Fat`, `BMR`, `BMI`, `Ideal_Weight`, `Id_Inscription`) VALUES
(4, 160, 50, 30, 40, 50, 171.926, 1412.51, 19.53, 56.8819, 5),
(5, 180, 60, 20, 45, 17, 143.694, 1614.08, 18.52, 74.9921, 6),
(7, 175, 70, 20, 20, 20, 3.40282e38, 1752.44, 22.86, 70.4646, 17),
(8, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(9, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(10, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(11, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(12, 200, 2200, 200, 200, 200, 3.40282e38, 30408, 550, 93.1024, 21),
(13, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(14, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(15, 83, 89, 18, 97, 87, 97.4666, 1315.68, 129.19, -12.8425, 21),
(16, 91, 43, 12, 60, 95, 84.3426, 953.932, 51.93, -10.0984, 21),
(17, 34, 34, 56, 24, 79, NULL, 837.013, 294.12, -61.7126, NULL),
(18, 200, 200, 200, 200, 200, 3.40282e38, 2592.16, 50, 93.1024, 21),
(19, 30, 69, 7, 18, 29, 108.082, 953.416, 766.67, -65.3346, 21);

-- --------------------------------------------------------

--
-- Structure de la table `plans`
--

CREATE TABLE `plans` (
  `Id_Plans` int(11) NOT NULL,
  `Plan_name` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plans`
--

INSERT INTO `plans` (`Id_Plans`, `Plan_name`, `Description`) VALUES
(1, 'Weight Loss Plan', 'A comprehensive plan designed to help individuals lose weight through a combination of diet and exer'),
(2, 'Muscle Gain Plan', 'A structured plan focused on building muscle mass and strength through targeted workouts and proper '),
(3, 'Cardiovascular Fitness Plan', 'An aerobic exercise-centered plan to improve cardiovascular endurance and overall fitness.'),
(4, 'Flexibility and Mobility Plan', 'A plan that incorporates stretching and mobility exercises to enhance flexibility and range of motio'),
(5, 'Athletic Performance Plan', 'A specialized plan designed for athletes to enhance performance, agility, and speed.'),
(6, 'Functional Training Plan', 'A plan that focuses on functional movements and exercises to improve everyday movements and prevent '),
(7, 'Yoga and Mindfulness Plan', 'A holistic plan combining yoga, meditation, and mindfulness practices for physical and mental well-b'),
(8, 'Senior Fitness Plan', 'A gentle exercise plan tailored for seniors to improve strength, balance, and overall fitness.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_User` int(11) NOT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `E_mail` varchar(100) DEFAULT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `Role` tinyint(1) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_User`, `First_name`, `Last_name`, `age`, `E_mail`, `Password`, `Role`, `Gender`) VALUES
(1, 'Ilias', 'Anouar', 0, 'ilas.anouar.solicode@gmail.com', '$2y$10$wJAOEA67BG708j0uPz3.g.8X5JaLQn.oasJUX7ZDicKUk/kGiigLG', 1, 'Male'),
(2, 'John', 'Doe', 0, 'johndoe@example.com', 'password123', 0, 'Male'),
(3, 'Jane', 'Smith', 0, 'janesmith@example.com', 'securepass', 0, 'Female'),
(4, 'David', 'Johnson', 19, 'davidjohnson@example.com', 'secretword', 0, 'Female'),
(5, 'user\r\n        ', 'USER', 20, 'user@gmail.com', '$2y$10$.vR6Q/SPJwPi74o10Qqlzeb35B.CMu0SmP53BEB2h25bH42qZeDwG', 0, 'Male'),
(6, 'test', 'test', 25, 'test@gmail.com', '$2y$10$gCwbtODt.8xfqqSMrmc4gef/y6GlsgOHMps7RNbxcfNVTg3SnkPXy', 0, 'Male'),
(9, 'user01', 'user01', 20, 'user01@gmail.com', '$2y$10$1ABhrwteX2eL2ih.yWj45O7aAzpIiPvnLr5ngpR.1LhyJZctSxfcO', 0, 'Male'),
(10, 'ilias', 'anouar', 52, 'ilias@gmail.com', '$2y$10$QFrp..xI7mjrEN27us/XcefVuPb2kmewoZDeU4bjngeNRf4o3uQEe', 0, 'Female');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`Id_Inscription`),
  ADD KEY `Id_Plans` (`Id_Plans`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Index pour la table `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`Id_Measure`),
  ADD KEY `Id_Inscription` (`Id_Inscription`);

--
-- Index pour la table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`Id_Plans`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `Id_Inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `measures`
--
ALTER TABLE `measures`
  MODIFY `Id_Measure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `plans`
--
ALTER TABLE `plans`
  MODIFY `Id_Plans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`Id_Plans`) REFERENCES `plans` (`Id_Plans`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`);

--
-- Contraintes pour la table `measures`
--
ALTER TABLE `measures`
  ADD CONSTRAINT `measures_ibfk_1` FOREIGN KEY (`Id_Inscription`) REFERENCES `inscription` (`Id_Inscription`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
