-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 19 Septembre 2018 à 18:11
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `GestionDeStages02`
--

-- --------------------------------------------------------

--
-- Structure de la table `Etudiants`
--

CREATE TABLE IF NOT EXISTS `Etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_supp` text COLLATE utf8_unicode_ci,
  `actif` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ListeMissions`
--

CREATE TABLE IF NOT EXISTS `ListeMissions` (
  `milieuStage_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ListeTypeClienteles`
--

CREATE TABLE IF NOT EXISTS `ListeTypeClienteles` (
  `milieuStage_id` int(11) NOT NULL,
  `typeClientele_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ListeTypeEtablissements`
--

CREATE TABLE IF NOT EXISTS `ListeTypeEtablissements` (
  `milieuStage_id` int(11) NOT NULL,
  `typeEtab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MilieuStages`
--

CREATE TABLE IF NOT EXISTS `MilieuStages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville_id` int(11) NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exigence` text COLLATE utf8_unicode_ci NOT NULL,
  `nom_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courriel_respo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville_admin_id` int(11) NOT NULL,
  `province_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_admin_id` int(11) NOT NULL,
  `facilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tache` text COLLATE utf8_unicode_ci NOT NULL,
  `remarque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_milieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_famille` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profil_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_solicitation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_contrat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_milieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autre_info` text COLLATE utf8_unicode_ci NOT NULL,
  `date_inv` datetime NOT NULL,
  `date_rappel` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Missions`
--

CREATE TABLE IF NOT EXISTS `Missions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Offres`
--

CREATE TABLE IF NOT EXISTS `Offres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tache` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsabilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `milieuStage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Regions`
--

CREATE TABLE IF NOT EXISTS `Regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TypeClienteles`
--

CREATE TABLE IF NOT EXISTS `TypeClienteles` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TypeEtablissements`
--

CREATE TABLE IF NOT EXISTS `TypeEtablissements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `TypeEtablissements`
--

INSERT INTO `TypeEtablissements` (`id`, `nom`) VALUES
(1, 'CHSLD');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `milieu_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Villes`
--

CREATE TABLE IF NOT EXISTS `Villes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ListeMissions`
--
ALTER TABLE `ListeMissions`
  ADD PRIMARY KEY (`milieuStage_id`,`mission_id`),
  ADD KEY `mission_id` (`mission_id`),
  ADD KEY `etab_id` (`milieuStage_id`);

--
-- Index pour la table `ListeTypeClienteles`
--
ALTER TABLE `ListeTypeClienteles`
  ADD PRIMARY KEY (`milieuStage_id`,`typeClientele_id`),
  ADD KEY `typeClientele_id` (`typeClientele_id`);

--
-- Index pour la table `ListeTypeEtablissements`
--
ALTER TABLE `ListeTypeEtablissements`
  ADD PRIMARY KEY (`milieuStage_id`,`typeEtab_id`),
  ADD KEY `typeEtab_id` (`typeEtab_id`);

--
-- Index pour la table `MilieuStages`
--
ALTER TABLE `MilieuStages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ville_id` (`ville_id`),
  ADD KEY `ville_admin_id` (`ville_admin_id`),
  ADD KEY `region_admin_id` (`region_admin_id`);

--
-- Index pour la table `Missions`
--
ALTER TABLE `Missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `Offres`
--
ALTER TABLE `Offres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milieuStage_id` (`milieuStage_id`);

--
-- Index pour la table `Regions`
--
ALTER TABLE `Regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TypeClienteles`
--
ALTER TABLE `TypeClienteles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TypeEtablissements`
--
ALTER TABLE `TypeEtablissements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`),
  ADD KEY `milieu_id` (`milieu_id`);

--
-- Index pour la table `Villes`
--
ALTER TABLE `Villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `MilieuStages`
--
ALTER TABLE `MilieuStages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Missions`
--
ALTER TABLE `Missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Offres`
--
ALTER TABLE `Offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Regions`
--
ALTER TABLE `Regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `TypeClienteles`
--
ALTER TABLE `TypeClienteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `TypeEtablissements`
--
ALTER TABLE `TypeEtablissements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Villes`
--
ALTER TABLE `Villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ListeMissions`
--
ALTER TABLE `ListeMissions`
  ADD CONSTRAINT `listemissions_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `Missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ListeTypeClienteles`
--
ALTER TABLE `ListeTypeClienteles`
  ADD CONSTRAINT `listetypeclienteles_ibfk_1` FOREIGN KEY (`typeClientele_id`) REFERENCES `TypeClienteles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listetypeclienteles_ibfk_2` FOREIGN KEY (`milieuStage_id`) REFERENCES `MilieuStages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ListeTypeEtablissements`
--
ALTER TABLE `ListeTypeEtablissements`
  ADD CONSTRAINT `listetypeetablissements_ibfk_1` FOREIGN KEY (`typeEtab_id`) REFERENCES `TypeEtablissements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listetypeetablissements_ibfk_2` FOREIGN KEY (`milieuStage_id`) REFERENCES `MilieuStages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `MilieuStages`
--
ALTER TABLE `MilieuStages`
  ADD CONSTRAINT `milieustages_ibfk_1` FOREIGN KEY (`ville_id`) REFERENCES `Villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieustages_ibfk_2` FOREIGN KEY (`ville_admin_id`) REFERENCES `Villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieustages_ibfk_3` FOREIGN KEY (`region_admin_id`) REFERENCES `Regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milieustages_ibfk_4` FOREIGN KEY (`id`) REFERENCES `ListeMissions` (`milieuStage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Offres`
--
ALTER TABLE `Offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`milieuStage_id`) REFERENCES `MilieuStages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `Etudiants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`milieu_id`) REFERENCES `MilieuStages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Villes`
--
ALTER TABLE `Villes`
  ADD CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `Regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
