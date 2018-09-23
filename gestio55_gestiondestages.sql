-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 23 Septembre 2018 à 00:08
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestio55_gestiondestages`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateurs`
--

CREATE TABLE IF NOT EXISTS `Administrateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_supp` text COLLATE utf8_unicode_ci,
  `actif` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listemissions`
--

CREATE TABLE IF NOT EXISTS `listemissions` (
  `milieudestage_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listetypeclienteles`
--

CREATE TABLE IF NOT EXISTS `listetypeclienteles` (
  `milieudestage_id` int(11) NOT NULL,
  `typeclientele_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listetypeetablissements`
--

CREATE TABLE IF NOT EXISTS `listetypeetablissements` (
  `milieudestage_id` int(11) NOT NULL,
  `typeetablissement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `milieudestages`
--

CREATE TABLE IF NOT EXISTS `milieudestages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exigence` text COLLATE utf8_unicode_ci NOT NULL,
  `nom_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courriel_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_admin_id` int(11) NOT NULL,
  `facilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tache` text COLLATE utf8_unicode_ci NOT NULL,
  `remarque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_solicitation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_contrat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_milieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autre_info` text COLLATE utf8_unicode_ci NOT NULL,
  `date_inv` datetime NOT NULL,
  `date_rappel` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `milieudestages`
--

INSERT INTO `milieudestages` (`id`, `nom`, `adresse`, `ville`, `province`, `code_postal`, `exigence`, `nom_respo`, `telephone_respo`, `fax_respo`, `courriel_respo`, `adresse_admin`, `ville_admin`, `province_admin`, `code_postal_admin`, `region_admin_id`, `facilite`, `tache`, `remarque`, `info_solicitation`, `info_contrat`, `reponse_milieu`, `autre_info`, `date_inv`, `date_rappel`, `actif`, `user_id`, `created`, `modified`) VALUES
(6, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(27, 'CDJ et soins clientèle hébergée'),
(26, 'Centre de jour'),
(25, 'Centre de jour et hôpital de jour'),
(24, 'Centre de jour et soins à domicile'),
(23, 'Centre de jour, soins de clientèle hébergée'),
(22, 'Hôpital de jour'),
(21, 'Recherche clinique'),
(20, 'Soins clientèle à domicile'),
(19, 'Soins clientèle à domicile et clientèle externe'),
(18, 'Soins clientèle à domicile et en hébergement, Centre de jour'),
(17, 'Soins clientèle externe'),
(16, 'Soins clientèle externe et à domicile'),
(15, 'Soins clientèle externe et hébergée'),
(14, 'Soins clientèle externe et hospitalisée'),
(13, 'Soins clientèle externe et interne'),
(12, 'Soins clientèle externe, rééducation au travail'),
(11, 'Soins clientèle hébergé et possibilité de Centre de jour'),
(10, 'Soins clientèle hébergée'),
(9, 'Soins clientèle hébergée et externe'),
(8, 'Soins clientèle hébergée et hospitalisée'),
(7, 'Soins clientèle hébergée, soins de clientèle en convalescence'),
(6, 'Soins clientèle hospitalisée'),
(5, 'Soins de clientèle externe'),
(4, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail'),
(3, 'Soins de clientèle hébergée et externe'),
(2, 'Soins de clientèle hébergée et hôpital de jour'),
(1, 'UTRF');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE IF NOT EXISTS `offres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tache` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsabilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `milieudestage_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`id`, `titre`, `region`, `tache`, `responsabilite`, `milieudestage_id`, `created`, `modified`) VALUES
(1, 'a', 'a', 'a', 'a', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Structure de la table `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `Roles`
--

INSERT INTO `Roles` (`id`) VALUES
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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `created`, `modified`) VALUES
(9, 'aaaa', '$2y$10$GGIHfJAxWKruVmaULiW3b..7j1VHeniKVQlhwjBVPcZ2mObIpPJn.', 'etudiant', '2018-09-22 22:16:55', '2018-09-22 22:16:55');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administrateurs`
--
ALTER TABLE `Administrateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `listemissions`
--
ALTER TABLE `listemissions`
  ADD PRIMARY KEY (`milieudestage_id`,`mission_id`),
  ADD KEY `mission_id` (`mission_id`),
  ADD KEY `milieudestage_id` (`milieudestage_id`);

--
-- Index pour la table `listetypeclienteles`
--
ALTER TABLE `listetypeclienteles`
  ADD PRIMARY KEY (`milieudestage_id`,`typeclientele_id`),
  ADD KEY `typeclientele_id` (`typeclientele_id`) USING BTREE;

--
-- Index pour la table `listetypeetablissements`
--
ALTER TABLE `listetypeetablissements`
  ADD PRIMARY KEY (`milieudestage_id`,`typeetablissement_id`),
  ADD KEY `typeetablissement_id` (`typeetablissement_id`);

--
-- Index pour la table `milieudestages`
--
ALTER TABLE `milieudestages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_admin_id` (`region_admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milieudestage_id` (`milieudestage_id`) USING BTREE;

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `milieudestages`
--
ALTER TABLE `milieudestages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Administrateurs`
--
ALTER TABLE `Administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `listemissions`
--
ALTER TABLE `listemissions`
  ADD CONSTRAINT `listemissions_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listemissions_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `listetypeclienteles`
--
ALTER TABLE `listetypeclienteles`
  ADD CONSTRAINT `listetypeclienteles_ibfk_1` FOREIGN KEY (`typeclientele_id`) REFERENCES `typeclienteles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listetypeclienteles_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `listetypeetablissements`
--
ALTER TABLE `listetypeetablissements`
  ADD CONSTRAINT `listetypeetablissements_ibfk_1` FOREIGN KEY (`typeetablissement_id`) REFERENCES `typeetablissements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listetypeetablissements_ibfk_2` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `milieudestages`
--
ALTER TABLE `milieudestages`
  ADD CONSTRAINT `milieudestages_ibfk_3` FOREIGN KEY (`region_admin_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieudestages_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`milieudestage_id`) REFERENCES `milieudestages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
