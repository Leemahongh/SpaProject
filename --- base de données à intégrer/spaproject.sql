-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 fév. 2019 à 10:49
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `spaproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20190112182126'),
('20190112190423'),
('20190112192118'),
('20190112193352'),
('20190121205951'),
('20190121210448'),
('20190121211419');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `birthday`, `ADMIN`, `created_at`, `adress`, `postal_code`, `city`, `password`, `email`, `username`) VALUES
(1, 'Viault Chervier', 'Anne-Cécile', '1960-01-01 00:00:00', 1, '2018-12-20 19:14:42', '27 Bis Rue de l\'Agnel', '13770', 'Venelles', '$2y$12$4kF7k85I.PQ7RAL8IMZv0OM9qcikxfqjNdEPr84P/9S3kG8Y7zYcu', 'Spaproject@gmail.com', 'admin'),
(2, 'Durand', 'Arnaud', '1980-08-31 00:00:00', 1, '2018-12-20 19:14:42', '6 Clos St Victor', '84120', 'Beaumont de Pertuis', '$2y$12$x/th1bYujaFu8hdUSIhnIeQGNnlWIk20GHScMu0C.xffqmsQRUxZm', 'a.durand@live.fr', 'nox'),
(3, 'Zyner', 'Andy', '1981-08-22 00:00:00', 0, '2018-12-26 18:21:41', '1 rue Adobe', '13013', 'Marseille', '$2y$12$m06gUtgSMngFS1erxaMzjesaor/ven0cEqQZ2BQpY0h2GjRxyAuJC', 'andy.ziner@protonmail.com', 'Picasso'),
(4, 'Dupont', 'Natacha', '1990-11-21 00:00:00', 0, '2018-12-26 18:21:41', '24 rue de la république ', '84120', 'Pertuis', '$2y$12$.lIpH6cJCv.wTq1bNFYoCuH/3DxdTmAnUWCnKrJKeflEWi3eYUOOS', 'n.dupont@gmail.com', 'petitchat'),
(5, 'Romana', 'Nadia', '1994-04-10 00:00:00', 0, '2018-12-26 18:21:41', '18 imp. du puit en feu', '84120', 'Pertuis', '$2y$12$Bp1SW5fDIuaq.2vvhYVelOIncYQsdJN2hvnFYnrRiboIEmmlPJGR6', 'n.romana@gmail.com', 'NadiaR'),
(6, 'Sidouin', 'Carla', '1987-01-24 00:00:00', 0, '2018-12-26 18:21:41', '1 ch du dernier samaritain', '13170', 'Les Pennes Mirabeau', '$2y$12$.lIpH6cJCv.wTq1bNFYoCuH/3DxdTmAnUWCnKrJKeflEWi3eYUOOS', 'badgirl@hotmail.fr', 'CSID');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
