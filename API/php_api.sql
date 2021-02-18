-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 18 fév. 2021 à 08:56
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `releves`
--

CREATE TABLE `releves` (
  `id` int NOT NULL,
  `id_sonde` int NOT NULL,
  `temperature` int NOT NULL,
  `humidite` int NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `modified_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `releves`
--

INSERT INTO `releves` (`id`, `id_sonde`, `temperature`, `humidite`, `created_at`, `modified_at`) VALUES
(1, 1, 2, 60, '15-02-2021 15:33:55', '15-02-2021 16:19:02'),
(3, 1, 8, 60, '16-02-2021 14:19:40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sonde`
--

CREATE TABLE `sonde` (
  `id` int NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `modified_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sonde`
--

INSERT INTO `sonde` (`id`, `lieu`, `nom`, `created_at`, `modified_at`) VALUES
(1, 'école', 'sonde 1', '', ''),
(2, '0', '0', '16-02-2021 14:19:57', '17-02-2021 14:48:57');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `releves`
--
ALTER TABLE `releves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sonde`
--
ALTER TABLE `sonde`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `releves`
--
ALTER TABLE `releves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sonde`
--
ALTER TABLE `sonde`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
