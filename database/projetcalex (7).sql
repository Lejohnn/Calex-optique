-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 juin 2024 à 12:56
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetcalex`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `carte_identite` varchar(191) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `societe_attache` varchar(255) DEFAULT NULL,
  `assurance` varchar(255) DEFAULT NULL,
  `disciplines_pratiquees` varchar(255) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `activite_interpelant_vision` varchar(255) DEFAULT NULL,
  `antecedents_familiaux` text DEFAULT NULL,
  `antecedents_chirurgicaux` text DEFAULT NULL,
  `traitements_en_cours` text DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `mentions_generales` text DEFAULT NULL,
  `portez_vous_des_lunettes` tinyint(1) DEFAULT NULL,
  `besoin_changer_lunettes` tinyint(1) DEFAULT NULL,
  `autre_choses` text DEFAULT NULL,
  `choix_service` varchar(255) DEFAULT NULL,
  `diagnostic` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `examen_particulier` text DEFAULT NULL,
  `rendez_vous` datetime DEFAULT NULL,
  `canal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entretien` varchar(255) DEFAULT NULL,
  `montant` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `sexe`, `telephone`, `carte_identite`, `date_naissance`, `lieu_naissance`, `profession`, `societe_attache`, `assurance`, `disciplines_pratiquees`, `date_debut`, `activite_interpelant_vision`, `antecedents_familiaux`, `antecedents_chirurgicaux`, `traitements_en_cours`, `allergies`, `mentions_generales`, `portez_vous_des_lunettes`, `besoin_changer_lunettes`, `autre_choses`, `choix_service`, `diagnostic`, `prescription`, `examen_particulier`, `rendez_vous`, `canal`, `created_at`, `updated_at`, `entretien`, `montant`) VALUES
(1, 'Sonkoueee', 'Jonathan', 'M', '658010572', '54678865', '2024-04-10', 'Bafoussam', 'Ingenieur', 'Calex', 'hnhj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-04-01 07:33:43', '2024-04-26 20:59:13', NULL, NULL),
(2, 'Nkoumou', 'Marie', 'F', '650012346', '123456790', '1981-02-02', 'Cameroun', 'MÃ©decin', 'HÃ´pital Central', 'AXA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-28 05:49:54', NULL, NULL),
(3, 'Tchakounte', 'Patrick', 'M', '650012353', '123456797', '1988-09-09', 'Cameroun', 'Enseignant', 'LycÃ©e Bilingue', 'Generali', 'Lecture', '2023-02-15', 'Lecture prolongÃ©e', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(4, 'Djomo', 'Rachel', 'F', '650012356', '123456700', '1991-12-12', 'Cameroun', 'IngÃ©nieur', 'SociÃ©tÃ© Tech', 'Allianz', 'Informatique', '2023-05-20', 'Utilisation d\'Ã©crans', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(5, 'Kengne', 'David', 'M', '650012357', '123456701', '1992-01-13', 'Cameroun', 'Avocat', 'Cabinet Juridique', 'AXA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'caisse', NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-05-02 15:17:29', NULL, NULL),
(6, 'Nnanga', 'Elisabeth', 'F', '650012358', '123456702', '1993-02-14', 'Cameroun', 'Ã‰tudiante', 'UniversitÃ© de Douala', 'Generali', 'Lecture', '2020-09-05', 'Ã‰tudes prolongÃ©es', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(7, 'Siewe', 'Roger', 'M', '650012359', '123456703', '1994-03-15', 'Cameroun', 'Comptable', 'Cabinet Comptable ABC', 'Allianz', 'Travail sur ordinateur', '2022-11-30', 'Travail prolongÃ© sur Ã©cran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(8, 'Kamga', 'Jean', 'M', '650012345', '123456789', '1980-01-01', 'Cameroun', 'IngÃ©nieur', 'SociÃ©tÃ© Tech', 'AXA', 'Informatique', '2023-10-10', 'Travail prolongÃ© sur Ã©cran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(9, 'Ngatchou', 'FranÃ§ois', 'M', '650012347', '123456791', '1982-03-03', 'Cameroun', 'MÃ©decin', 'Clinique ABC', 'Generali', 'Consultation', '2021-05-15', 'Travail sur ordinateur', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(10, 'Mendouga', 'Pierre', 'M', '650012349', '123456793', '1984-05-05', 'Cameroun', 'Avocat', 'Cabinet Juridique', 'AXA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-05-02 15:17:48', NULL, NULL),
(12, 'Tsafack', 'Nicolas', 'M', '650012355', '123456799', '1990-11-11', 'Cameroun', 'IngÃ©nieur', 'SociÃ©tÃ© XYZ', 'Generali', 'Informatique', '2022-07-01', 'Utilisation d\'Ã©crans', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(13, 'Tall', 'Sophie', 'F', '650012366', '123456710', '1989-04-20', 'YaoundÃ©', 'Enseignant', 'LycÃ©e Bilingue', 'AXA', 'Lecture', '2021-11-12', 'Travail prolongÃ© sur Ã©cran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16', NULL, NULL),
(15, 'Dibongué', 'Caroline', 'F', '650012367', '123456711', '1983-09-15', 'Bafoussam', 'Comptable', 'Cabinet Comptable ABC', 'Allianz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, 'Jonathan', '2024-04-01 09:35:16', '2024-06-19 07:29:38', 'payant', 4000),
(16, 'KenfacK', 'daniel', 'M', '336646633', '2435', '2000-01-01', 'Bafoussam', 'Ingenieur', 'kiki', 'non', 'BASKET', NULL, 'YES', 'RIEN', 'NON', 'YES', 'NON', NULL, 0, 0, 'RIEN D\'AUTRE', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 11:52:08', '2024-04-01 11:56:39', NULL, NULL),
(17, 'Monsieur', 'Marcel', 'M', '658010574', '2337677', '2024-04-19', 'Douala', 'Ingenieur', 'Calex', 'non', 'BASKET', '2024-04-01', 'oui', 'RAS', 'RAS', 'aucun', 'non', 'RAS', 0, 1, 'rien d\'autre Ã  mentionner', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 12:32:39', '2024-04-01 12:32:39', NULL, NULL),
(19, 'FOUNDJE', 'Junior', 'M', '658010572', '5467886533', '2024-04-17', 'Douala', 'Ingenieur', 'kiki', 'non', NULL, NULL, 'YES', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:56:26', '2024-04-14 16:10:57', NULL, NULL),
(36, 'Foyet Tchale', 'Yves Michel', 'M', '0751232812', '123455', '2024-04-27', 'Baleng', 'Etudiant', 'SG', 'assure', 'ggegeggge', '2024-04-27', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-04-27 05:40:35', '2024-04-27 05:43:41', NULL, NULL),
(37, 'Tchale Foyet', 'Wiliam', 'M', '0610017013', '126788', '2024-04-28', 'Baleng', 'Etudiant', 'SG', 'assure', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-04-27 05:47:13', '2024-04-27 05:47:13', NULL, NULL),
(38, 'Julien', 'Pena', 'M', '0596007790', '4758690', '2024-04-27', 'Baleng', 'Etudiant', 'SG', 'assure', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-04-27 05:47:55', '2024-05-06 10:33:09', NULL, NULL),
(40, 'Sonkoue', 'Foundje', 'M', '658010572', '546788655567', '2024-04-25', 'Douala', 'Ingenieur', 'CALEX OPTIQUE', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'visite_simple', NULL, NULL, NULL, NULL, NULL, '2024-04-28 16:04:14', '2024-05-24 23:08:30', NULL, NULL),
(43, 'Sonkouez', 'Foundje', 'M', '6580105723', '676578588', '2024-04-26', 'Douala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-04-28 16:07:44', '2024-04-28 16:07:44', NULL, NULL),
(44, 'Tsopté', 'Pena', 'M', '690413097', '12563726', '2024-05-14', 'Bafoussam', 'Data Analys', 'Institut Saint Jean', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, '2024-05-31 00:00:00', NULL, '2024-05-06 10:27:14', '2024-05-06 10:29:37', NULL, NULL),
(45, 'Kenfack', 'Duboit', 'M', '657897635', '12323422', '2024-05-25', 'Douala', 'Professeur', 'Lybimbo', 'oui', NULL, '2024-05-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-06 13:49:14', '2024-05-06 13:52:59', NULL, NULL),
(46, 'Nsengue', 'David', 'M', '658595588', '122455', '2000-01-20', 'Bafoussam', 'Ingenieur', 'CALEX OPTIQUE', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, '2024-05-27 00:00:00', NULL, '2024-05-16 16:49:53', '2024-05-24 17:13:15', 'non payant', NULL),
(47, 'TEKEM', 'Marius', 'M', '658010522', '24534355', '1998-12-28', 'YAOUNDE', 'Opticien', 'Institut Saint Jean', 'non', NULL, NULL, 'oui', 'oui', NULL, NULL, 'non', NULL, 0, 0, 'non non', 'caisse', 'besoin de lunettes', 'verres', 'on verra', '2024-05-25 00:00:00', NULL, '2024-05-16 17:07:57', '2024-05-16 17:11:48', NULL, NULL),
(48, 'Margueton', 'François', 'M', '6580105722', '24353443', '1994-02-02', 'Lylle', 'Medecin', 'Uber', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-05-24 16:59:34', '2024-05-24 16:59:34', 'non payant', NULL),
(49, 'Eto\'o', 'Magelan', 'M', '658054572', '12743', '2024-05-30', 'Nkonsamba', 'Dev Ops', 'ISJ', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-24 20:11:35', '2024-06-03 05:39:20', 'payant', 13355),
(51, 'Etoo', 'Magelan', 'M', '658054572', '12743095', '2024-05-30', 'Nkonsamba', 'Dev Ops', 'ISJ', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-24 20:13:04', '2024-05-24 22:21:23', 'non payant', 0),
(53, 'Etoo', 'Magelan', 'M', '658054572', '1274309599', '2024-05-30', 'Nkonsamba', 'Dev Ops', 'ISJ', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-24 20:57:05', '2024-05-24 23:26:35', 'non payant', NULL),
(54, 'Sonkoue', 'Jonathan', 'M', '658010572', '2222222', '2024-05-27', 'thh(y', 'thythty', 'Institut Saint Jean', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-24 21:47:31', '2024-05-24 21:47:31', NULL, NULL),
(55, 'MICHEL', 'FOYETAMOL', 'M', '658010555', '11113331', '2024-05-07', 'Bafoussam', 'Dev Ops', 'Institut Saint Jean', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'caisse', NULL, NULL, NULL, NULL, NULL, '2024-05-24 21:49:07', '2024-05-24 21:49:07', NULL, NULL),
(56, 'TETE', 'TITI', 'M', '658015543', '19865333', '2024-05-01', 'Bafoussam', 'Dev Ops', 'ISJ', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-24 22:00:24', '2024-05-24 22:00:24', NULL, NULL),
(57, 'TPTO', 'TUTU', 'M', '658011212', '12340865', '2024-05-19', 'Bafoussam', 'Ingenieur', 'Calex', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'visite_simple', NULL, NULL, NULL, NULL, NULL, '2024-05-24 22:01:27', '2024-05-24 23:08:14', NULL, NULL),
(58, 'FOKOU', 'Ludovick', 'M', '658650572', '009876', '2000-01-01', 'KRIBI', 'Opticien', 'Calex', 'non', 'BASKET', NULL, 'YES', 'non', NULL, 'zef', 'oui', NULL, 0, 1, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-05-28 17:00:46', '2024-06-01 01:40:07', NULL, NULL),
(59, 'FOKOU', 'François', 'M', '654568645', '00000031', '2013-01-30', 'Nkonsamba', 'Medecin', 'ISJ', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, NULL, '2024-05-28 17:02:36', '2024-06-03 02:34:24', 'payant', 34000),
(60, 'FOKOU', 'Francine', 'F', '654354423', '00112233', '2015-12-28', 'Douala', 'Professeur', 'CALEX OPTIQUE', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'caisse', NULL, NULL, NULL, NULL, NULL, '2024-05-28 17:04:29', '2024-05-28 17:04:29', NULL, NULL),
(65, 'Sonkoue', 'Nathan', 'M', '655555', '54678865123', '2024-06-21', 'Bafoussam', NULL, 'Institut Saint Jean', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'consultation', NULL, NULL, NULL, NULL, NULL, '2024-06-01 01:23:01', '2024-06-01 01:23:01', NULL, NULL),
(66, 'NTATO', 'Iness', 'F', '696849985', '1086533134', '2024-06-22', 'Bafoussam', 'Responsable Commercial', 'Calex', 'oui', 'Foot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'caisse', NULL, NULL, NULL, NULL, NULL, '2024-06-03 05:29:33', '2024-06-03 05:32:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commercials`
--

CREATE TABLE `commercials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commercials`
--

INSERT INTO `commercials` (`id`, `full_name`, `start_date`, `points`, `created_at`, `updated_at`) VALUES
(2, 'Sonkoue Jonathan', '2024-06-04', 2, '2024-06-04 09:34:42', '2024-06-19 08:51:54'),
(4, 'Junior', '2024-05-27', 6, '2024-06-04 09:57:19', '2024-06-19 08:50:47'),
(5, 'Johnny', '2024-06-13', 0, '2024-06-04 10:03:12', '2024-06-19 08:46:14'),
(6, 'Marcel', '2024-06-01', 4, '2024-06-05 12:14:40', '2024-06-19 08:54:24');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_facture` date NOT NULL,
  `produits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`produits`)),
  `montant_total_ht` decimal(10,2) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `autre_nom` varchar(255) DEFAULT NULL,
  `societe` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `medecin` varchar(255) DEFAULT NULL,
  `sphere_od` varchar(255) DEFAULT NULL,
  `sphere_og` varchar(255) DEFAULT NULL,
  `cylindre_od` varchar(255) DEFAULT NULL,
  `cylindre_og` varchar(255) DEFAULT NULL,
  `axe_od` varchar(255) DEFAULT NULL,
  `axe_og` varchar(255) DEFAULT NULL,
  `add_od` varchar(255) DEFAULT NULL,
  `add_og` varchar(255) DEFAULT NULL,
  `avance` decimal(10,2) DEFAULT NULL,
  `reste` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `date_facture`, `produits`, `montant_total_ht`, `client_id`, `created_at`, `updated_at`, `autre_nom`, `societe`, `telephone`, `medecin`, `sphere_od`, `sphere_og`, `cylindre_od`, `cylindre_og`, `axe_od`, `axe_og`, `add_od`, `add_og`, `avance`, `reste`) VALUES
(1, '2024-05-16', '\"{\\\"noms\\\":[\\\"Iphone\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"1200\\\"],\\\"reductions\\\":[null]}\"', 4800.00, 5, '2024-05-16 14:25:58', '2024-05-16 14:25:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-05-16', '\"{\\\"noms\\\":[\\\"Iphone\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"1200\\\"],\\\"reductions\\\":[null]}\"', 4800.00, 5, '2024-05-16 14:26:01', '2024-05-16 14:26:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2024-05-14', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-16 16:30:17', '2024-05-16 16:30:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2024-05-14', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-16 16:30:21', '2024-05-16 16:30:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 40000.00, 5, '2024-05-18 17:06:53', '2024-05-18 17:06:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 40000.00, 5, '2024-05-18 17:06:55', '2024-05-18 17:06:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 5, '2024-05-18 17:43:21', '2024-05-18 17:43:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 5, '2024-05-18 17:43:24', '2024-05-18 17:43:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 5, '2024-05-18 17:45:27', '2024-05-18 17:45:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 5, '2024-05-18 17:45:29', '2024-05-18 17:45:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 5, '2024-05-18 18:10:01', '2024-05-18 18:10:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2024-05-16', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 5, '2024-05-18 18:10:05', '2024-05-18 18:10:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:08:28', '2024-05-22 19:08:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:08:32', '2024-05-22 19:08:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:20:49', '2024-05-22 19:20:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:20:51', '2024-05-22 19:20:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:22:32', '2024-05-22 19:22:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:22:34', '2024-05-22 19:22:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:29:13', '2024-05-22 19:29:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:29:16', '2024-05-22 19:29:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:52:55', '2024-05-22 19:52:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:52:57', '2024-05-22 19:52:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:56:04', '2024-05-22 19:56:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:56:06', '2024-05-22 19:56:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:57:38', '2024-05-22 19:57:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 19:57:40', '2024-05-22 19:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 20:00:27', '2024-05-22 20:00:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2024-05-09', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"4\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1600.00, 5, '2024-05-22 20:00:28', '2024-05-22 20:00:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:02:35', '2024-05-22 20:02:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:02:37', '2024-05-22 20:02:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:04:36', '2024-05-22 20:04:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:04:37', '2024-05-22 20:04:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:08:24', '2024-05-22 20:08:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:08:56', '2024-05-22 20:08:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:11:31', '2024-05-22 20:11:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:11:42', '2024-05-22 20:11:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:18:08', '2024-05-22 20:18:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:18:10', '2024-05-22 20:18:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:22:13', '2024-05-22 20:22:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:22:15', '2024-05-22 20:22:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:23:16', '2024-05-22 20:23:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:23:19', '2024-05-22 20:23:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:24:49', '2024-05-22 20:24:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:24:52', '2024-05-22 20:24:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:27:07', '2024-05-22 20:27:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:27:10', '2024-05-22 20:27:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:29:08', '2024-05-22 20:29:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:29:11', '2024-05-22 20:29:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:32:57', '2024-05-22 20:32:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:33:00', '2024-05-22 20:33:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:34:05', '2024-05-22 20:34:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:34:07', '2024-05-22 20:34:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:36:01', '2024-05-22 20:36:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:36:03', '2024-05-22 20:36:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:37:07', '2024-05-22 20:37:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:37:09', '2024-05-22 20:37:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:37:29', '2024-05-22 20:37:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:37:31', '2024-05-22 20:37:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:38:28', '2024-05-22 20:38:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:38:30', '2024-05-22 20:38:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:39:13', '2024-05-22 20:39:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:39:16', '2024-05-22 20:39:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:41:17', '2024-05-22 20:41:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:41:20', '2024-05-22 20:41:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:49:35', '2024-05-22 20:49:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:49:37', '2024-05-22 20:49:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:50:23', '2024-05-22 20:50:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '2024-05-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 800.00, 5, '2024-05-22 20:50:29', '2024-05-22 20:50:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 10:18:58', '2024-05-23 10:18:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 10:19:00', '2024-05-23 10:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 10:54:41', '2024-05-23 10:54:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 10:54:42', '2024-05-23 10:54:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:03:11', '2024-05-23 11:03:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:03:13', '2024-05-23 11:03:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:12:33', '2024-05-23 11:12:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:12:35', '2024-05-23 11:12:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:25:25', '2024-05-23 11:25:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:25:27', '2024-05-23 11:25:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:34:44', '2024-05-23 11:34:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:34:48', '2024-05-23 11:34:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:46:19', '2024-05-23 11:46:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:46:22', '2024-05-23 11:46:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:51:42', '2024-05-23 11:51:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:51:44', '2024-05-23 11:51:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:55:17', '2024-05-23 11:55:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 11:55:19', '2024-05-23 11:55:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 12:10:30', '2024-05-23 12:10:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 12:10:32', '2024-05-23 12:10:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 12:13:34', '2024-05-23 12:13:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 12:13:36', '2024-05-23 12:13:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 12:18:01', '2024-05-23 12:18:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '2024-05-17', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-05-23 12:18:03', '2024-05-23 12:18:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:21:45', '2024-05-23 12:21:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:21:47', '2024-05-23 12:21:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:22:23', '2024-05-23 12:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:22:25', '2024-05-23 12:22:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:24:10', '2024-05-23 12:24:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:24:12', '2024-05-23 12:24:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:24:50', '2024-05-23 12:24:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:24:52', '2024-05-23 12:24:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:25:53', '2024-05-23 12:25:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:25:55', '2024-05-23 12:25:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:27:05', '2024-05-23 12:27:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:27:07', '2024-05-23 12:27:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:28:37', '2024-05-23 12:28:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:29:09', '2024-05-23 12:29:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:31:27', '2024-05-23 12:31:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:31:29', '2024-05-23 12:31:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:33:45', '2024-05-23 12:33:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:33:47', '2024-05-23 12:33:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:35:14', '2024-05-23 12:35:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:35:15', '2024-05-23 12:35:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:36:00', '2024-05-23 12:36:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '2024-05-02', '\"{\\\"noms\\\":[\\\"Verres\\\",\\\"cadres\\\",\\\"sc\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"3\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\",\\\"10000\\\",\\\"500\\\"],\\\"reductions\\\":[null,null,null]}\"', 31400.00, 40, '2024-05-23 12:36:02', '2024-05-23 12:36:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '2024-05-07', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"3\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1200.00, 40, '2024-05-24 17:29:48', '2024-05-24 17:29:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '2024-05-07', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"3\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[null]}\"', 1200.00, 40, '2024-05-24 17:29:53', '2024-05-24 17:29:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '2024-05-28', '\"{\\\"noms\\\":[\\\"Cadres\\\",\\\"verres\\\"],\\\"quantites\\\":[\\\"2\\\",\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"2000\\\",\\\"90000\\\"],\\\"reductions\\\":[null,null]}\"', 94000.00, 60, '2024-05-28 17:11:33', '2024-05-28 17:11:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '2024-05-28', '\"{\\\"noms\\\":[\\\"Cadres\\\",\\\"verres\\\"],\\\"quantites\\\":[\\\"2\\\",\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"2000\\\",\\\"90000\\\"],\\\"reductions\\\":[null,null]}\"', 94000.00, 60, '2024-05-28 17:11:38', '2024-05-28 17:11:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '2024-06-08', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"15000\\\"],\\\"reductions\\\":[null]}\"', 30000.00, 5, '2024-06-03 05:37:51', '2024-06-03 05:37:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '2024-06-08', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"15000\\\"],\\\"reductions\\\":[null]}\"', 30000.00, 5, '2024-06-03 05:37:53', '2024-06-03 05:37:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '2024-06-13', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"1\\\"]}\"', 792.00, 60, '2024-06-18 09:02:10', '2024-06-18 09:02:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '2024-06-13', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"1\\\"]}\"', 792.00, 60, '2024-06-18 09:02:14', '2024-06-18 09:02:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '2024-06-12', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-06-18 09:39:05', '2024-06-18 09:39:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '2024-06-12', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-06-18 09:39:07', '2024-06-18 09:39:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '2024-06-12', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-06-18 10:52:45', '2024-06-18 10:52:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '2024-06-12', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"400\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 800.00, 5, '2024-06-18 10:52:47', '2024-06-18 10:52:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:38:53', '2024-06-18 11:38:53', NULL, 'JOHNNY LA QUALITE', '658010572', 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(128, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:39:00', '2024-06-18 11:39:00', NULL, 'JOHNNY LA QUALITE', '658010572', 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(129, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:40:09', '2024-06-18 11:40:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:40:10', '2024-06-18 11:40:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:50:18', '2024-06-18 11:50:18', NULL, 'JOHNNY LA QUALITE', NULL, 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(132, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:50:21', '2024-06-18 11:50:21', NULL, 'JOHNNY LA QUALITE', NULL, 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(133, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:52:39', '2024-06-18 11:52:39', NULL, 'JOHNNY LA QUALITE', NULL, 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(134, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:52:42', '2024-06-18 11:52:42', NULL, 'JOHNNY LA QUALITE', NULL, 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(135, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:56:13', '2024-06-18 11:56:13', NULL, 'JOHNNY LA QUALITE', NULL, 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(136, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\",\\\"VERRES\\\"],\\\"quantites\\\":[\\\"1\\\",\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\",\\\"45000\\\"],\\\"reductions\\\":[null,null]}\"', 120000.00, 66, '2024-06-18 11:56:15', '2024-06-18 11:56:15', NULL, 'JOHNNY LA QUALITE', NULL, 'SIMON', '+0,00', '+0,25', '-0,25', NULL, '90°', NULL, '+1,00', '+1,00', NULL, NULL),
(137, '2024-06-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 55, '2024-06-18 12:25:24', '2024-06-18 12:25:24', NULL, 'Orange', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', NULL, NULL),
(138, '2024-06-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 55, '2024-06-18 12:25:26', '2024-06-18 12:25:26', NULL, 'Orange', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', NULL, NULL),
(139, '2024-06-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 55, '2024-06-18 12:26:25', '2024-06-18 12:26:25', NULL, 'Orange', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', NULL, NULL),
(140, '2024-06-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 55, '2024-06-18 12:26:27', '2024-06-18 12:26:27', NULL, 'Orange', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', NULL, NULL),
(141, '2024-06-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 47, '2024-06-18 13:30:25', '2024-06-18 13:30:25', NULL, 'MTN', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 10000.00, 10000.00),
(142, '2024-06-18', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 20000.00, 47, '2024-06-18 13:30:26', '2024-06-18 13:30:26', NULL, 'MTN', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 10000.00, 10000.00),
(143, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:25:15', '2024-06-18 14:25:15', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(144, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:25:18', '2024-06-18 14:25:18', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(145, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:29:01', '2024-06-18 14:29:01', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(146, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:29:03', '2024-06-18 14:29:03', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(147, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:29:40', '2024-06-18 14:29:40', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(148, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:29:42', '2024-06-18 14:29:42', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(149, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:37:14', '2024-06-18 14:37:14', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(150, '2024-06-05', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[\\\"0\\\"]}\"', 80000.00, 60, '2024-06-18 14:37:16', '2024-06-18 14:37:16', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 15000.00, 65000.00),
(151, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\"],\\\"quantites\\\":[\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 10000.00, 5, '2024-06-18 20:20:35', '2024-06-18 20:20:35', NULL, 'Orange', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 10000.00, 0.00),
(152, '2024-06-19', '\"{\\\"noms\\\":[\\\"MONTURE\\\"],\\\"quantites\\\":[\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"10000\\\"],\\\"reductions\\\":[null]}\"', 10000.00, 5, '2024-06-18 20:20:41', '2024-06-18 20:20:41', NULL, 'Orange', '65555555', 'JONATHAN', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 10000.00, 0.00),
(153, '2024-06-19', '\"{\\\"noms\\\":[\\\"montre\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\"],\\\"reductions\\\":[null]}\"', 60000.00, 60, '2024-06-18 21:31:39', '2024-06-18 21:31:39', NULL, 'MTN', '6580105722', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '5T', '+1,00', '+1,00', 40000.00, 20000.00),
(154, '2024-06-19', '\"{\\\"noms\\\":[\\\"montre\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\"],\\\"reductions\\\":[null]}\"', 60000.00, 60, '2024-06-18 21:31:41', '2024-06-18 21:31:41', NULL, 'MTN', '6580105722', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '5T', '+1,00', '+1,00', 40000.00, 20000.00),
(155, '2024-06-19', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\"],\\\"reductions\\\":[null]}\"', 60000.00, 60, '2024-06-19 11:31:18', '2024-06-19 11:31:18', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 40000.00, 20000.00),
(156, '2024-06-19', '\"{\\\"noms\\\":[\\\"Verres\\\"],\\\"quantites\\\":[\\\"2\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\"],\\\"reductions\\\":[null]}\"', 60000.00, 60, '2024-06-19 11:31:21', '2024-06-19 11:31:21', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '+1,00', '+1,00', 40000.00, 20000.00),
(157, '2024-06-22', '\"{\\\"noms\\\":[\\\"MONTURE\\\"],\\\"quantites\\\":[\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[null]}\"', 40000.00, 47, '2024-06-22 08:04:16', '2024-06-22 08:04:16', NULL, 'MTN', '675985490', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '76', '21', 40000.00, 0.00);
INSERT INTO `factures` (`id`, `date_facture`, `produits`, `montant_total_ht`, `client_id`, `created_at`, `updated_at`, `autre_nom`, `societe`, `telephone`, `medecin`, `sphere_od`, `sphere_og`, `cylindre_od`, `cylindre_og`, `axe_od`, `axe_og`, `add_od`, `add_og`, `avance`, `reste`) VALUES
(158, '2024-06-22', '\"{\\\"noms\\\":[\\\"MONTURE\\\"],\\\"quantites\\\":[\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"40000\\\"],\\\"reductions\\\":[null]}\"', 40000.00, 47, '2024-06-22 08:04:24', '2024-06-22 08:04:24', NULL, 'MTN', '675985490', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '76', '21', 40000.00, 0.00),
(159, '2024-06-22', '\"{\\\"noms\\\":[\\\"MONTURE\\\"],\\\"quantites\\\":[\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\"],\\\"reductions\\\":[null]}\"', 30000.00, 55, '2024-06-22 08:12:54', '2024-06-22 08:12:54', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '76', '+1,00', 30000.00, 0.00),
(160, '2024-06-22', '\"{\\\"noms\\\":[\\\"MONTURE\\\"],\\\"quantites\\\":[\\\"1\\\"],\\\"prix_unitaires\\\":[\\\"30000\\\"],\\\"reductions\\\":[null]}\"', 30000.00, 55, '2024-06-22 08:13:01', '2024-06-22 08:13:01', NULL, 'MTN', '6580105723', 'SIMON', '+0,00', '+0,25', '-0,25', '0,00', '90°', '21', '76', '+1,00', 30000.00, 0.00);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2014_10_11_000000_create_roles_table', 1),
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_resets_table', 1),
(48, '2019_08_19_000000_create_failed_jobs_table', 1),
(49, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(50, '2024_04_01_132610_create_clients_table', 1),
(51, '2024_04_26_131313_create_notifications_table', 1),
(52, '2024_04_26_150245_create_products_table', 1),
(53, '2024_04_26_150458_create_orders_table', 1),
(54, '2024_04_26_151259_create_prospects_table', 1),
(55, '2024_04_26_151833_create_appointments_table', 1),
(56, '2024_04_28_085240_create_prospects_table', 2),
(57, '2024_04_29_180637_add_date_rdv_to_prospects_table', 3),
(58, '2024_05_02_095520_add_statut_to_prospects_table', 4),
(60, '2024_05_15_204003_create_facture_table', 5),
(61, '2024_05_22_135100_add_entretien_and_montant_to_clients_table', 6),
(62, '2024_05_25_131313_create_notifications_table', 7),
(63, '2024_06_03_020351_create_prescriptions_table', 8),
(64, '2024_06_04_104200_create_commercials_table', 9),
(65, '2024_06_04_085240_create_prospects_table', 10),
(66, '2024_06_05_083228_add_commercial_id_to_prospects_table', 11),
(67, '2024_06_06_104613_add_fields_to_prospects_table', 12),
(68, '2024_06_06_143512_create_monthly_performances_table', 13),
(69, '2024_06_10_121409_create_service_call_interactions_table', 14),
(70, '2024_06_18_124051_add_details_to_factures_table', 15),
(71, '2024_06_18_150826_add_avance_and_reste_to_factures_table', 16),
(72, '2024_06_18_154247_create_receipts_table', 17),
(73, '2024_06_18_134247_create_receipts_table', 18),
(74, '2024_06_18_231746_add_autre_versement_to_receipts_table', 19),
(75, '2024_06_19_091527_add_canal_to_clients_table', 20);

-- --------------------------------------------------------

--
-- Structure de la table `monthly_performances`
--

CREATE TABLE `monthly_performances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commercial_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL,
  `month` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `monthly_performances`
--

INSERT INTO `monthly_performances` (`id`, `commercial_id`, `points`, `month`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2024-05-01', '2024-06-06 14:05:42', '2024-06-06 14:05:42'),
(2, 4, 0, '2024-05-01', '2024-06-06 14:05:42', '2024-06-06 14:05:42'),
(3, 5, 3, '2024-05-01', '2024-06-06 14:05:42', '2024-06-06 14:05:42'),
(4, 6, 0, '2024-05-01', '2024-06-06 14:05:42', '2024-06-06 14:05:42');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `visibility` int(11) NOT NULL DEFAULT 0,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `status`, `visibility`, `role_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'gestion de Mrs ETOO (cliquez pour accéder)', 1, 0, 4, 53, '2024-05-24 20:57:05', '2024-05-24 23:26:35'),
(5, 'caisse de Mrs TPTO (cliquez pour accéder)', 1, 0, 5, 57, '2024-05-24 22:01:27', '2024-05-24 23:08:14'),
(6, 'consultation de Mrs FOKOU (cliquez pour accéder)', 1, 0, 3, 58, '2024-05-28 17:00:46', '2024-06-01 01:40:07'),
(7, 'entretien_lunettes de Mrs FOKOU (cliquez pour accéder)', 1, 0, 4, 59, '2024-05-28 17:02:36', '2024-06-03 02:34:24'),
(8, 'caisse de Mrs FOKOU (cliquez pour accéder)', 1, 0, 5, 60, '2024-05-28 17:04:29', '2024-05-28 17:28:22'),
(9, 'consultation de Mrs SONKOUE (cliquez pour accéder)', 0, 0, 3, 65, '2024-06-01 01:23:01', '2024-06-01 01:23:01'),
(10, 'consultation de Mrs NTATO (cliquez pour accéder)', 1, 0, 3, 66, '2024-06-03 05:29:33', '2024-06-03 05:32:56');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'en_attente',
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_patient` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL,
  `sph_od` varchar(255) DEFAULT NULL,
  `cyl_od` varchar(255) DEFAULT NULL,
  `axe_od` varchar(255) DEFAULT NULL,
  `add_od` varchar(255) DEFAULT NULL,
  `sph_og` varchar(255) DEFAULT NULL,
  `cyl_og` varchar(255) DEFAULT NULL,
  `axe_og` varchar(255) DEFAULT NULL,
  `add_og` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `nom_patient`, `age`, `date`, `sph_od`, `cyl_od`, `axe_od`, `add_od`, `sph_og`, `cyl_og`, `axe_og`, `add_og`, `created_at`, `updated_at`) VALUES
(1, 'Sonkoue Jonathan', 24, '2024-06-03', 'ZE2', '23', 'T4', 'T5', '45', '34', '21', '21', '2024-06-03 00:08:29', '2024-06-03 00:08:29'),
(3, 'TEMKEU MARIUS', 12, '2024-06-05', '23', '25', '12', '76', 'HY', '54', '5T', '45', '2024-06-03 01:03:15', '2024-06-03 01:03:15'),
(4, 'TEMKEU MARIUS', 12, '2024-06-05', '23', '25', '12', '76', 'HY', '54', '5T', '45', '2024-06-03 01:03:19', '2024-06-03 01:03:19'),
(5, 'Tamko', 14, '2020-02-13', 'ZE2', '25', 'T4', '76', 'HY', '34', '5T', '21', '2024-06-03 01:09:53', '2024-06-03 01:09:53'),
(6, 'Tamko', 14, '2020-02-13', 'ZE2', '25', 'T4', '76', 'HY', '34', '5T', '21', '2024-06-03 01:09:56', '2024-06-03 01:09:56'),
(7, 'Johnson', 17, '2024-06-01', '23', '23', 'T4', '76', 'HY', '34', '5T', '21', '2024-06-03 01:18:44', '2024-06-03 01:18:44'),
(8, 'Johnson', 17, '2024-06-01', '23', '23', 'T4', '76', 'HY', '34', '5T', '21', '2024-06-03 01:18:47', '2024-06-03 01:18:47'),
(9, 'Sonkoue Jonathan', 36, '2024-06-21', '45', '76', '98', '34', '87', '6Y', '87', '56', '2024-06-03 05:34:51', '2024-06-03 05:34:51'),
(10, 'Sonkoue Jonathan', 36, '2024-06-21', '45', '76', '98', '34', '87', '6Y', '87', '56', '2024-06-03 05:34:54', '2024-06-03 05:34:54');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospects`
--

CREATE TABLE `prospects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `commercial_name` varchar(255) NOT NULL,
  `date_rdv` date DEFAULT NULL,
  `rdv_heure` varchar(255) DEFAULT NULL,
  `entreprise_heure` varchar(255) DEFAULT NULL,
  `rubrique` varchar(255) NOT NULL,
  `entreprise_nom` varchar(255) DEFAULT NULL,
  `entreprise_responsable` varchar(255) DEFAULT NULL,
  `entreprise_contact` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commercial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `validation_status` enum('pending','confirmed','denied','peace','no_response') NOT NULL DEFAULT 'pending',
  `validation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prospects`
--

INSERT INTO `prospects` (`id`, `date`, `commercial_name`, `date_rdv`, `rdv_heure`, `entreprise_heure`, `rubrique`, `entreprise_nom`, `entreprise_responsable`, `entreprise_contact`, `statut`, `user_id`, `created_at`, `updated_at`, `commercial_id`, `validation_status`, `validation_date`) VALUES
(1, '2024-06-08', 'Jonathan', '2024-06-13', '18H40', '14h-00', 'Rendez-vous', 'Chococam', 'Atangana', '678765456', 'ok', 2, '2024-06-04 14:40:59', '2024-06-04 14:48:10', NULL, 'pending', NULL),
(2, '2024-06-05', 'Sonkoue Jonathan', '2024-06-11', '17H30', '14h', 'Nettoyage', 'NZING AFRIC', 'SOLO', '678567656', 'ok', 2, '2024-06-05 07:01:46', '2024-06-19 08:51:54', 2, 'confirmed', NULL),
(3, '2024-06-28', 'Junior', '2024-06-26', '17H30', '16H', 'Entreprise', 'NZING AFRIC', 'SOLO', '687564345', 'ok', 2, '2024-06-05 07:18:26', '2024-06-06 11:32:43', 4, 'confirmed', NULL),
(4, '2024-06-15', 'Johnny', '2024-06-15', '10h', '14h', 'Rendez-vous', 'Chococam', 'JEAN HERVE', '675687909', NULL, 2, '2024-06-05 07:44:06', '2024-06-19 08:46:14', 5, 'peace', NULL),
(5, '2024-06-15', 'Sonkoue Jonathan', '2024-06-07', '15h', '14h-00', 'Rendez-vous', 'CAMTEL', 'ATEBA JUDITH', '654454345', NULL, 2, '2024-06-05 08:13:41', '2024-06-06 10:41:33', 2, 'confirmed', NULL),
(6, '2024-06-06', 'Junior', '2024-06-22', '09H57', '14h-00', 'Nettoyage', 'NZING AFRIC', 'ASONWA', '677857904', NULL, 2, '2024-06-06 06:54:16', '2024-06-19 08:50:16', 4, 'confirmed', NULL),
(7, '2024-06-15', 'Junior', '2024-06-13', '14h', '14h', 'Entreprise', 'JLQ', 'FOUNDJE', '658010572', NULL, 2, '2024-06-06 08:11:48', '2024-06-06 11:29:57', 4, 'confirmed', NULL),
(8, '2024-06-07', 'Junior', '2024-06-17', '13h35', '14h', 'Entreprise', 'Calex', 'Atangana', '655667788', NULL, 2, '2024-06-06 09:36:06', '2024-06-06 11:30:16', 4, 'confirmed', NULL),
(9, '2024-06-16', 'Junior', '2024-06-29', '13H44', '14h', 'Rendez-vous', 'TESLA', 'BOOCH', '655555555', NULL, 2, '2024-06-06 09:44:54', '2024-06-06 11:30:33', 4, 'confirmed', NULL),
(10, '2024-06-06', 'Junior', '2024-06-10', '14h02', '16H', 'Nettoyage', 'COCA COLA', 'SONWA', '677777777', NULL, 2, '2024-06-06 10:02:38', '2024-06-19 08:50:47', 4, 'peace', NULL),
(11, '2024-06-06', 'Junior', '2024-06-13', '10h', '14h', 'Entreprise', 'MTN', 'MOMO', '677686765', NULL, 2, '2024-06-06 11:22:31', '2024-06-06 11:25:14', 4, 'confirmed', NULL),
(12, '2024-06-03', 'Marcel', '2024-06-08', '14h53', '14h', 'Entreprise', 'Chococam', 'Test', '655554433', NULL, 2, '2024-06-06 11:54:30', '2024-06-19 08:42:19', 6, 'peace', NULL),
(13, '2024-06-06', 'Marcel', '2024-06-07', '15h', '14h-00', 'Entreprise', 'Chococam', 'Testa', '654543423', NULL, 2, '2024-06-06 11:57:41', '2024-06-19 08:54:24', 6, 'confirmed', NULL),
(14, '2024-06-06', 'Marcel', '2024-06-07', '14H58', '14h-00', 'Entreprise', 'Chococam', 'Teste', '654324345', NULL, 2, '2024-06-06 11:58:37', '2024-06-06 12:03:19', 6, 'confirmed', NULL),
(15, '2024-06-06', 'Marcel', '2024-06-13', '15h00', '16H00', 'Entreprise', 'Chococam', 'Testu', '65555557', NULL, 2, '2024-06-06 11:59:51', '2024-06-06 12:03:25', 6, 'confirmed', NULL),
(16, '2024-06-06', 'Marcel', '2024-06-12', '15h', '14h00', 'Entreprise', 'Chococam', 'Testi', '655555763', NULL, 2, '2024-06-06 12:02:03', '2024-06-06 12:03:31', 6, 'confirmed', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `date_reception` date NOT NULL,
  `montant_du` decimal(10,2) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `reste` decimal(10,2) NOT NULL,
  `autre_versement` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `receipts`
--

INSERT INTO `receipts` (`id`, `nom_client`, `date_reception`, `montant_du`, `montant`, `reste`, `autre_versement`, `created_at`, `updated_at`) VALUES
(1, 'FOKOU', '2024-06-18', 80000.00, 15000.00, 0.00, -8000.00, '2024-06-18 14:37:14', '2024-06-18 21:27:37'),
(3, 'Kengne', '2024-06-18', 10000.00, 10000.00, 0.00, 0.00, '2024-06-18 20:20:35', '2024-06-18 20:20:35'),
(5, 'FOKOU', '2024-06-18', 60000.00, 40000.00, 0.00, 10000.00, '2024-06-18 21:31:39', '2024-06-18 21:32:33'),
(6, 'FOKOU', '2024-06-18', 60000.00, 40000.00, 20000.00, 0.00, '2024-06-18 21:31:41', '2024-06-18 21:31:41'),
(7, 'FOKOU', '2024-06-19', 60000.00, 40000.00, 20000.00, 0.00, '2024-06-19 11:31:18', '2024-06-19 11:31:18'),
(8, 'FOKOU', '2024-06-19', 60000.00, 40000.00, 20000.00, 0.00, '2024-06-19 11:31:21', '2024-06-19 11:31:21'),
(9, 'TEKEM', '2024-06-22', 40000.00, 40000.00, 0.00, 0.00, '2024-06-22 08:04:16', '2024-06-22 08:04:16'),
(10, 'TEKEM', '2024-06-22', 40000.00, 40000.00, 0.00, 0.00, '2024-06-22 08:04:24', '2024-06-22 08:04:24'),
(11, 'MICHEL', '2024-06-22', 30000.00, 30000.00, 0.00, 0.00, '2024-06-22 08:12:54', '2024-06-22 08:12:54'),
(12, 'MICHEL', '2024-06-22', 30000.00, 30000.00, 0.00, 0.00, '2024-06-22 08:13:01', '2024-06-22 08:13:01');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', 'Celui qui a accès à tous les privilèges', NULL, NULL),
(2, 'accueil', 'La personne qui reçoit les clients de l\'entreprise', NULL, NULL),
(3, 'medecin', 'Celui qui consulte le client', NULL, NULL),
(4, 'atelier de montage', 'Celui qui monte les verres et les entretiens', NULL, NULL),
(5, 'caisse', 'La personne qui encaisse l\'argent lié aux achats du client', NULL, NULL),
(6, 'commercial interne', 'Ceux chargés de faire la prospection pour faire connaitre les services de Calex', NULL, NULL),
(7, 'commercial externe', 'Ceux chargés de faire la prospection pour faire connaitre les services de Calex', NULL, NULL),
(8, 'responsable commercial interne', 'Personne qui coordonne les activités des commerciaux internes', NULL, NULL),
(9, 'responsable commercial externe', 'Personne qui coordonne les activités des commerciaux externes', NULL, NULL),
(10, 'Service Call', 'Ceux qui s\'occupent des rendez-vous, rappels et suivis des clients', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `service_call_interactions`
--

CREATE TABLE `service_call_interactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('relance_confirmation_rdv','annonce_confirmation_rdv','relance_satisfaction','relance_proposition_reduction','relance_info_lunettes_disponibles','renseignements_retrait') NOT NULL,
  `details` text DEFAULT NULL,
  `interaction_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service_call_interactions`
--

INSERT INTO `service_call_interactions` (`id`, `client_id`, `type`, `details`, `interaction_date`, `created_at`, `updated_at`) VALUES
(2, 15, 'relance_confirmation_rdv', 'Nous avons appelé Madame Dibongué pour lui confirmer que le prochain rendez-vous c\'est le 16 Juin', '2024-06-05 22:00:00', '2024-06-10 12:16:14', '2024-06-10 12:37:35'),
(3, 15, 'relance_satisfaction', 'Yes, le client est bel et bien satisfait', '2024-05-05 22:00:00', '2024-06-10 12:36:42', '2024-06-10 12:37:53'),
(4, 15, 'relance_satisfaction', 'on doit verifier si le client est satisfait', '2024-06-09 22:00:00', '2024-06-10 17:28:54', '2024-06-10 17:28:54'),
(12, 4, 'relance_confirmation_rdv', 'cdcdv', '2024-06-20 22:00:00', '2024-06-18 07:59:59', '2024-06-18 07:59:59'),
(13, 4, 'renseignements_retrait', 'besoin de renseignement par rapport au retrait', '2024-06-18 22:00:00', '2024-06-18 08:06:23', '2024-06-18 08:06:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NULL, '2024-04-01 08:12:18', '2024-04-01 08:12:18'),
(2, 'SONKOUE JONATHAN', 'jonathansonkoue75@gmail.com', NULL, '$2y$10$0Cpc7bwMH0v0yPs07RfkgOwjyaludNYA9g33ViaCH4EnMHFLrd4uq', 1, NULL, '2024-04-06 12:14:00', '2024-04-06 12:14:00'),
(3, 'Junior', 'sonkouejonathan@yahoo.fr', NULL, '$2y$10$Jk87jx/pzx42i0pXbRNI1e5562tQjFIrGj1xgTrheJRBf.jyOG6KC', 1, NULL, '2024-04-06 12:16:48', '2024-04-19 21:49:59'),
(5, 'John', 'john@gmail.com', NULL, '$2y$10$EnF2o9vChV4vrZpPxTLLSOdbAMWazCcwh6oRaMO5fLedOIJUMlsdu', 2, NULL, '2024-04-07 08:30:30', '2024-04-07 08:30:30'),
(6, 'Ekoro', 'ekoro@gmail.com', NULL, '$2y$10$9pZEPCMfgjd6EP.uFwdmLuKahsVYeYC1lrqpbTGy7TSo07NV9LmK2', 1, NULL, '2024-04-19 19:25:24', '2024-04-19 21:45:21'),
(7, 'accueil', 'acceuil@gmail.com', NULL, '$2y$10$Kj2gPqMEtl/6gBjnP3TNXeC9Gfgw/oWETuaZen1WnpBcnrjnFHlZi', 2, NULL, '2024-04-26 19:11:01', '2024-04-26 19:11:01'),
(8, 'medecin', 'medecin@gmail.com', NULL, '$2y$10$ISnxZ9W9KTU.i.Svfkce2.0tAehUwdBoR9XuRg9hrNvsFb9nuUz3m', 3, NULL, '2024-04-26 22:17:42', '2024-04-26 22:17:42'),
(9, 'atelier', 'atelier@gmail.com', NULL, '$2y$10$zafJ2TLP9u34iZyljcBXQuqbcXstFoHCiNygOX734lnoOPmMwOpU6', 4, NULL, '2024-04-28 04:24:31', '2024-04-28 04:24:31'),
(10, 'caisse', 'caisse@gmail.com', NULL, '$2y$10$JhW73gzLEpjqnVJFRxkq.uhnDl2P2Vh39GLer0zGVOZQfgED1BTlm', 5, NULL, '2024-04-28 04:25:03', '2024-04-28 04:25:03'),
(11, 'commercial_interne', 'commercialinterne@gmail.com', NULL, '$2y$10$L3p3Fp3i5g2KqvdNmdtgAOdo28PWbt/otSQzy.c38nbt/bV13puSi', 6, NULL, '2024-04-28 04:27:07', '2024-04-28 04:27:07'),
(12, 'commercial_externe', 'commercialexterne@gmail.com', NULL, '$2y$10$uBv50qvJ3p2T4InJPFGcieWEi.rWaVZHQKNVt646OuhF3gmK7CmLS', 7, NULL, '2024-04-28 04:28:16', '2024-04-28 04:28:16'),
(13, 'Responsable interne', 'responsableinterne@gmail.com', NULL, '$2y$10$tbEcDw8SVft5G3lyWea3Tu/e6KW2D7uuWwdZLKCV4MIqcX6xgMk5O', 8, NULL, '2024-04-28 04:29:30', '2024-04-28 04:29:30'),
(14, 'Responsable externe', 'responsableexterne@gmail.com', NULL, '$2y$10$xo1qZhj04hC0oJRFRaeu9uyHKdx9vYS2mFkKzauciZB46vm43KCO2', 9, NULL, '2024-04-28 04:30:44', '2024-04-28 04:30:44'),
(15, 'ComInterne', 'cominterne@gmail.com', NULL, '$2y$10$zXxGa8rZk.DnXYUCn4N.YuOrlqpVqYbrE.8wqxp6F1qYubOuAg7jy', 6, NULL, '2024-05-06 10:47:02', '2024-05-06 10:47:02'),
(16, 'RespInterne', 'respinterne@gmail.com', NULL, '$2y$10$l.w8ZwiPn5LzaWm47hVqRuxbbJFQ2v.TIma0o4PBQ3Av06rbqQdD2', 8, NULL, '2024-05-06 10:47:53', '2024-05-06 10:47:53'),
(17, 'Call', 'servicecall@gmail.com', NULL, 'call', 10, NULL, '2024-05-06 10:48:50', '2024-05-06 10:48:50'),
(18, 'chosen', 'chosen@gmail.com', NULL, '$2y$10$MQPnkkLQqDVDcIwfz5xc5un9Ax7JvWSBB9T5GzxXrqozfpYj8tsBO', 10, NULL, '2024-05-24 23:13:27', '2024-05-24 23:13:27'),
(19, 'Franck', 'franck@gmail.com', NULL, '$2y$10$BOlaWxKMXZSBV.uyIiQtx.gK4Vp8d3v8d6eO4brsw3XB4TM63zI6u', 6, NULL, '2024-06-03 05:42:56', '2024-06-03 05:42:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_client_id_foreign` (`client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_carte_identite_unique` (`carte_identite`);

--
-- Index pour la table `commercials`
--
ALTER TABLE `commercials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factures_client_id_foreign` (`client_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `monthly_performances`
--
ALTER TABLE `monthly_performances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_performances_commercial_id_foreign` (`commercial_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_role_id_foreign` (`role_id`),
  ADD KEY `notifications_client_id_foreign` (`client_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prospects_user_id_foreign` (`user_id`),
  ADD KEY `prospects_commercial_id_foreign` (`commercial_id`);

--
-- Index pour la table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_call_interactions`
--
ALTER TABLE `service_call_interactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_call_interactions_client_id_foreign` (`client_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `monthly_performances`
--
ALTER TABLE `monthly_performances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `service_call_interactions`
--
ALTER TABLE `service_call_interactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `monthly_performances`
--
ALTER TABLE `monthly_performances`
  ADD CONSTRAINT `monthly_performances_commercial_id_foreign` FOREIGN KEY (`commercial_id`) REFERENCES `commercials` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prospects`
--
ALTER TABLE `prospects`
  ADD CONSTRAINT `prospects_commercial_id_foreign` FOREIGN KEY (`commercial_id`) REFERENCES `commercials` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `prospects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `service_call_interactions`
--
ALTER TABLE `service_call_interactions`
  ADD CONSTRAINT `service_call_interactions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
