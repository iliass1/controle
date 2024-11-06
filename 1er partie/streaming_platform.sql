-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 nov. 2024 à 14:02
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `streaming_platform`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `id_acteur` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id_acteur`, `nom`, `prenom`, `role`, `date_naissance`) VALUES
(1, 'DiCaprio', 'Leonardo', 'principal', '1974-11-11'),
(2, 'Reeves', 'Keanu', 'principal', '1964-09-02'),
(3, 'Travolta', 'John', 'principal', '1954-02-18'),
(4, 'Pacino', 'Al', 'principal', '1940-04-25'),
(5, 'Pesci', 'Joe', 'secondaire', '1943-02-09');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `annee_sortie` year DEFAULT NULL,
  `duree` int DEFAULT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`) VALUES
(1, 'Inception', '2010', 148),
(2, 'The Matrix', '1999', 136),
(3, 'Pulp Fiction', '1994', 154),
(4, 'The Godfather', '1972', 175),
(5, 'Goodfellas', '1990', 146);

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`),
  KEY `id_acteur` (`id_acteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jouer`
--

INSERT INTO `jouer` (`id_film`, `id_acteur`, `role`) VALUES
(1, 1, 'principal'),
(2, 2, 'principal'),
(3, 3, 'principal'),
(4, 4, 'principal'),
(5, 5, 'secondaire');

-- --------------------------------------------------------

--
-- Structure de la table `realisateurs`
--

DROP TABLE IF EXISTS `realisateurs`;
CREATE TABLE IF NOT EXISTS `realisateurs` (
  `id_realisateur` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `realisateurs`
--

INSERT INTO `realisateurs` (`id_realisateur`, `nom`, `prenom`) VALUES
(1, 'Nolan', 'Christopher'),
(2, 'Wachowski', 'Lana'),
(3, 'Tarantino', 'Quentin'),
(4, 'Coppola', 'Francis'),
(5, 'Scorsese', 'Martin');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

DROP TABLE IF EXISTS `realiser`;
CREATE TABLE IF NOT EXISTS `realiser` (
  `id_film` int NOT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_realisateur`),
  UNIQUE KEY `id_film` (`id_film`),
  KEY `id_realisateur` (`id_realisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regarder`
--

DROP TABLE IF EXISTS `regarder`;
CREATE TABLE IF NOT EXISTS `regarder` (
  `id_utilisateur` int NOT NULL,
  `id_film` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_film`),
  KEY `id_film` (`id_film`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




-- 1) Les titres et années de sortie des films du plus récent au plus ancien
SELECT titre, annee_sortie FROM film ORDER BY annee_sortie DESC;

-- 2) La liste des acteurs/actrices principaux pour un film donné
SELECT a.nom, a.prenom FROM acteurs a JOIN jouer j ON a.id_acteur = j.id_acteur JOIN film f ON j.id_film = f.id_film WHERE f.titre = 'Inception' AND j.role = 'principal';

-- 3) La liste des films pour un acteur/actrice donné
SELECT f.titre FROM film f JOIN jouer j ON f.id_film = j.id_film JOIN acteurs a ON j.id_acteur = a.id_acteur WHERE a.nom = 'DiCaprio' AND a.prenom = 'Leonardo';

-- 4) Ajouter un film
INSERT INTO film (id_film, titre, annee_sortie, duree) VALUES (6, 'Django Unchained', 2012, 165);

-- 5) Ajouter un acteur/actrice
INSERT INTO acteurs (id_acteur, nom, prenom, role, date_naissance) VALUES (6, 'Foxx', 'Jamie', 'principal', '1967-12-13');

-- 6) Modifier un film
UPDATE film SET duree = 150 WHERE titre = 'Inception';

-- 7) Supprimer un acteur/actrice
DELETE FROM acteurs WHERE nom = 'Pesci' AND prenom = 'Joe';

-- 8) Afficher les 3 derniers acteurs/actrices ajoutés
SELECT nom, prenom FROM acteurs ORDER BY id_acteur DESC LIMIT 3;

-- 9) Afficher le film le plus ancien
SELECT titre, annee_sortie FROM film ORDER BY annee_sortie ASC LIMIT 1;

-- 10) Afficher l’acteur le plus jeune
SELECT nom, prenom, date_naissance FROM acteurs ORDER BY date_naissance DESC LIMIT 1;

-- 11) Compter le nombre de films réalisés en 1990
SELECT COUNT(*) FROM film WHERE annee_sortie = 1990;

-- 12) Faire la somme de tous les acteurs ayant joué dans un fil
SELECT COUNT(DISTINCT id_acteur) FROM jouer;
