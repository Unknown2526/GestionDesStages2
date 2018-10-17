-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 11 Octobre 2018 à 02:14
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp1`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `telephone`, `courriel`, `user_id`, `created`, `modified`) VALUES
(1, 'a', 'a', 'adrienthereader@gmail.com', 11, 2018, 10);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_supp` text COLLATE utf8_unicode_ci,
  `actif` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`) VALUES
(11, 'CMS_Creative_164657191_Kingfisher.jpg', 'Files/', 18, 18),
(12, 'track.jpg', 'Files/', 18, 18);

-- --------------------------------------------------------

--
-- Structure de la table `milieudestages`
--

CREATE TABLE IF NOT EXISTS `milieudestages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exigence` text COLLATE utf8_unicode_ci,
  `nom_respo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_respo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_respo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_postal_admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_admin_id` int(11) DEFAULT NULL,
  `facilite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tache` text COLLATE utf8_unicode_ci,
  `remarque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_solicitation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_contrat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reponse_milieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autre_info` text COLLATE utf8_unicode_ci,
  `date_inv` datetime DEFAULT NULL,
  `date_rappel` datetime DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `milieudestages`
--

INSERT INTO `milieudestages` (`id`, `nom`, `adresse`, `ville`, `province`, `code_postal`, `exigence`, `nom_respo`, `telephone_respo`, `fax_respo`, `courriel_respo`, `adresse_admin`, `ville_admin`, `province_admin`, `code_postal_admin`, `region_admin_id`, `facilite`, `tache`, `remarque`, `info_solicitation`, `info_contrat`, `reponse_milieu`, `autre_info`, `date_inv`, `date_rappel`, `actif`, `user_id`, `created`, `modified`) VALUES
(6, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'adrienthereader@gmail.com', 'a', 'a', 'a', 'a', 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2018-09-27 00:03:00', '2018-09-27 00:03:00', 1, 10, '0000-00-00 00:00:00', '2018-09-29 15:50:49'),
(7, 'b', 'b', 'b', 'b', 'b', '', 'b', 'b', 'b', 'adrienthereader@gmail.com', 'b', 'b', 'b', 'b', 5, 'b', 'b', 'b', 'b', 'b', 'b', 'b', NULL, NULL, 0, 11, '2018-10-01 17:10:08', '2018-10-01 17:16:04'),
(8, 'Test', '', '', '', '', '', '', '', '', 'milieu@milieu.milieu', '', '', '', '', NULL, '', '', '', '', '', '', '', NULL, NULL, 0, 37, '2018-10-11 00:21:26', '2018-10-11 00:26:25');

-- --------------------------------------------------------

--
-- Structure de la table `milieudestages_missions`
--

CREATE TABLE IF NOT EXISTS `milieudestages_missions` (
  `milieudestage_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `milieudestages_missions`
--

INSERT INTO `milieudestages_missions` (`milieudestage_id`, `mission_id`) VALUES
(7, 1),
(6, 4),
(6, 5),
(7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `milieudestages_typeclienteles`
--

CREATE TABLE IF NOT EXISTS `milieudestages_typeclienteles` (
  `milieudestage_id` int(11) NOT NULL,
  `typeclientele_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `milieudestages_typeclienteles`
--

INSERT INTO `milieudestages_typeclienteles` (`milieudestage_id`, `typeclientele_id`) VALUES
(6, 5),
(7, 19),
(6, 21);

-- --------------------------------------------------------

--
-- Structure de la table `milieudestages_typeetablissements`
--

CREATE TABLE IF NOT EXISTS `milieudestages_typeetablissements` (
  `milieudestage_id` int(11) NOT NULL,
  `typeetablissement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `milieudestages_typeetablissements`
--

INSERT INTO `milieudestages_typeetablissements` (`milieudestage_id`, `typeetablissement_id`) VALUES
(7, 2),
(6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `missions`
--

INSERT INTO `missions` (`id`, `nom`) VALUES
(1, 'UTRF'),
(2, 'Soins de clientèle hébergée et hôpital de jour'),
(3, 'Soins de clientèle hébergée et externe'),
(4, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail'),
(5, 'Soins de clientèle externe'),
(6, 'Soins clientèle hospitalisée'),
(7, 'Soins clientèle hébergée, soins de clientèle en convalescence'),
(8, 'Soins clientèle hébergée et hospitalisée'),
(9, 'Soins clientèle hébergée et externe'),
(10, 'Soins clientèle hébergée'),
(11, 'Soins clientèle hébergé et possibilité de Centre de jour'),
(12, 'Soins clientèle externe, rééducation au travail'),
(13, 'Soins clientèle externe et interne'),
(14, 'Soins clientèle externe et hospitalisée'),
(15, 'Soins clientèle externe et hébergée'),
(16, 'Soins clientèle externe et à domicile'),
(17, 'Soins clientèle externe'),
(18, 'Soins clientèle à domicile et en hébergement, Centre de jour'),
(19, 'Soins clientèle à domicile et clientèle externe'),
(20, 'Soins clientèle à domicile'),
(21, 'Recherche clinique'),
(22, 'Hôpital de jour'),
(23, 'Centre de jour, soins de clientèle hébergée'),
(24, 'Centre de jour et soins à domicile'),
(25, 'Centre de jour et hôpital de jour'),
(26, 'Centre de jour'),
(27, 'CDJ et soins clientèle hébergée');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE IF NOT EXISTS `offres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `tache` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsabilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `milieudestage_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`id`, `titre`, `region_id`, `tache`, `responsabilite`, `user_id`, `milieudestage_id`, `created`, `modified`) VALUES
(1, 'a', 4, 'a', 'a', 10, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'a', 4, 'a', 'a', 10, 6, '2018-09-27 18:47:30', '2018-10-08 13:32:24');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`, `created`, `modified`) VALUES
(1, 'Bas-Saint-Laurent', NULL, NULL),
(2, 'Saguenay-Lac-Saint-Jean', NULL, NULL),
(3, 'Capitale-Nationale', NULL, NULL),
(4, 'Mauricie', NULL, NULL),
(5, 'Estrie', NULL, NULL),
(6, 'Montréal', NULL, NULL),
(7, 'Outaouais', NULL, NULL),
(8, 'Abitibi-Témiscamingue', NULL, NULL),
(9, 'Côte-Nord', NULL, NULL),
(10, 'Nord-du-Québec', NULL, NULL),
(11, 'Gaspésie-Îles-de-la-Madeleine', NULL, NULL),
(12, 'Chaudières-Appalaches', NULL, NULL),
(13, 'Laval', NULL, NULL),
(14, 'Lanaudière', NULL, NULL),
(15, 'Laurentides', NULL, NULL),
(16, 'Montérégie', NULL, NULL),
(17, 'Centre-du-Québec', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`) VALUES
('admin'),
('etudiant'),
('milieu');

-- --------------------------------------------------------

--
-- Structure de la table `typeclienteles`
--

CREATE TABLE IF NOT EXISTS `typeclienteles` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `typeclienteles`
--

INSERT INTO `typeclienteles` (`id`, `type`) VALUES
(1, 'UTRF'),
(2, 'Soins de clientèle hébergée et hôpital de jour'),
(3, 'Soins de clientèle hébergée et externe'),
(4, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail'),
(5, 'Soins de clientèle externe'),
(6, 'Soins clientèle hospitalisée'),
(7, 'Soins clientèle hébergée, soins de clientèle en convalescence'),
(8, 'Soins clientèle hébergée et hospitalisée'),
(9, 'Soins clientèle hébergée et externe'),
(10, 'Soins clientèle hébergé et possibilité de Centre de jour'),
(11, 'Soins clientèle externe, rééducation au travail'),
(12, 'Soins clientèle externe et interne'),
(13, 'Soins clientèle externe et hospitalisée'),
(14, 'Soins clientèle externe et hébergée'),
(15, 'Soins clientèle externe et à domicile'),
(16, 'Soins clientèle externe'),
(17, 'Soins clientèle à domicile et en hébergement, Centre de jour'),
(18, 'Soins clientèle à domicile et clientèle externe'),
(19, 'Soins clientèle à domicile'),
(20, 'Recherche clinique'),
(21, 'Principalement ortho/rhumato, un peu de perte d''autonomie'),
(22, 'Perte d''autonomie, orthopédie/rhumatologie, neuro, cardiorespiratoire'),
(23, 'Perte d''autonomie, orthopédie/rhumatologie, neuro'),
(24, 'Perte d''autonomie, Orthopédie/rhumatologie'),
(25, 'Perte d''autonomie, orthopédie/rhumato, neuro'),
(26, 'Perte d''autonomie, ortho/rhumato, cardiorespiratoire'),
(27, 'Perte d''autonomie, ortho/rhumato'),
(28, 'Perte d''autonomie, ortho, cardio, neuro'),
(29, 'Perte d''autonomie, neurologie (cas séquélaires et évolutifs)'),
(30, 'Perte d''autonomie, neuro et quelques cas ortho'),
(31, 'Perte d''autonomie, cardiorespiratoire, palliatif'),
(32, 'Perte d''autonomie un peu de neuro et d''ortho'),
(33, 'Perte d''autonomie et ortho/rhumato'),
(34, 'Perte d''autonomie'),
(35, 'Perte autonomie fonctionnelle'),
(36, 'Orthopédie/rhumatologie, Perte d''Autonomie'),
(37, 'Orthopédie/rhumatologie principalement'),
(38, 'Orthopédie/rhumatologie'),
(39, 'Ortho/rhumato et perte d''autonomie'),
(40, 'Ortho/rhumato'),
(41, 'Neurologie, pédiatrie poss d''ortho/rhumato'),
(42, 'Hôpital de jour'),
(43, 'Centre de jour, soins de clientèle hébergée'),
(44, 'Centre de jour et soins à domicile'),
(45, 'Centre de jour et hôpital de jour'),
(46, 'Centre de jour'),
(47, 'CDJ et soins clientèle hébergée');

-- --------------------------------------------------------

--
-- Structure de la table `typeetablissements`
--

CREATE TABLE IF NOT EXISTS `typeetablissements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `typeetablissements`
--

INSERT INTO `typeetablissements` (`id`, `nom`) VALUES
(1, 'CHSLD'),
(2, 'CLSC'),
(3, 'Centre hospitalier'),
(4, 'Centre réadaption'),
(5, 'Clinique privée'),
(6, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verify` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `file_id`, `uuid`, `verify`, `created`, `modified`) VALUES
(10, 'milieu', '$2y$10$R7RWkV8py8eJXYiXkLyOQeJNpsNzfyRBvYnjreIVOsHKTzK277s.e', 'milieu', NULL, '', 1, '2018-09-23 03:17:22', '2018-10-10 04:09:49'),
(11, 'admin', '$2y$10$7RNDHsjqzQmaQ6ICuFsE.eX4zNhEhJz.zs5AUzpCp0E7/RrWoCQnS', 'admin', NULL, '', 1, '2018-09-23 03:18:17', '2018-10-10 03:58:14'),
(37, 'milieu@milieu.milieu', '$2y$10$oIKNUPVDw5QqSl8Ncg/ENObrQhowsshw1RyajUQ97jhv2hxIfFY5W', 'milieu', NULL, '8251588a-3a56-4b1b-b96f-8946632dfe6e', 1, '2018-10-11 00:21:26', '2018-10-11 00:21:36');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `milieudestages`
--
ALTER TABLE `milieudestages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_admin_id` (`region_admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `milieudestages_missions`
--
ALTER TABLE `milieudestages_missions`
  ADD PRIMARY KEY (`milieudestage_id`,`mission_id`),
  ADD KEY `mission_id` (`mission_id`),
  ADD KEY `milieudestage_id` (`milieudestage_id`);

--
-- Index pour la table `milieudestages_typeclienteles`
--
ALTER TABLE `milieudestages_typeclienteles`
  ADD PRIMARY KEY (`milieudestage_id`,`typeclientele_id`),
  ADD KEY `typeclientele_id` (`typeclientele_id`) USING BTREE;

--
-- Index pour la table `milieudestages_typeetablissements`
--
ALTER TABLE `milieudestages_typeetablissements`
  ADD PRIMARY KEY (`milieudestage_id`,`typeetablissement_id`),
  ADD KEY `typeetablissement_id` (`typeetablissement_id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `milieudestage_id` (`milieudestage_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeclienteles`
--
ALTER TABLE `typeclienteles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeetablissements`
--
ALTER TABLE `typeetablissements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `image_id` (`file_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `milieudestages`
--
ALTER TABLE `milieudestages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `typeclienteles`
--
ALTER TABLE `typeclienteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `typeetablissements`
--
ALTER TABLE `typeetablissements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `milieudestages`
--
ALTER TABLE `milieudestages`
  ADD CONSTRAINT `milieudestages_ibfk_3` FOREIGN KEY (`region_admin_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieudestages_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `milieudestages_missions`
--
ALTER TABLE `milieudestages_missions`
  ADD CONSTRAINT `milieudestages_missions_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieudestages_missions_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `milieudestages_typeclienteles`
--
ALTER TABLE `milieudestages_typeclienteles`
  ADD CONSTRAINT `milieudestages_typeclienteles_ibfk_1` FOREIGN KEY (`typeclientele_id`) REFERENCES `typeclienteles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieudestages_typeclienteles_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `milieudestages_typeetablissements`
--
ALTER TABLE `milieudestages_typeetablissements`
  ADD CONSTRAINT `milieudestages_typeetablissements_ibfk_1` FOREIGN KEY (`typeetablissement_id`) REFERENCES `typeetablissements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieudestages_typeetablissements_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offres_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offres_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
