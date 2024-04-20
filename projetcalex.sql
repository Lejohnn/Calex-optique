-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 avr. 2024 à 05:53
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

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
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `carte_identite` varchar(255) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `diagnostic` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `examen_particulier` text DEFAULT NULL,
  `rendez_vous` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `sexe`, `telephone`, `carte_identite`, `date_naissance`, `lieu_naissance`, `profession`, `societe_attache`, `assurance`, `disciplines_pratiquees`, `date_debut`, `activite_interpelant_vision`, `antecedents_familiaux`, `antecedents_chirurgicaux`, `traitements_en_cours`, `allergies`, `mentions_generales`, `portez_vous_des_lunettes`, `besoin_changer_lunettes`, `autre_choses`, `choix_service`, `created_at`, `updated_at`, `diagnostic`, `prescription`, `examen_particulier`, `rendez_vous`) VALUES
(1, 'Sonkoueee', 'Jonathan', 'M', '658010572', '54678865', '2024-04-10', 'Bafoussam', 'Ingenieur', 'Calex', 'hnhj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2024-04-01 11:33:43', '2024-04-01 11:34:16', NULL, NULL, NULL, NULL),
(2, 'Nkoumou', 'Marie', 'F', '650012346', '123456790', '1981-02-02', 'Cameroun', 'Médecin', 'Hôpital Central', 'AXA', 'Ophtalmologie', '2022-01-01', 'Conduite de nuit', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(3, 'Tchakounte', 'Patrick', 'M', '650012353', '123456797', '1988-09-09', 'Cameroun', 'Enseignant', 'Lycée Bilingue', 'Generali', 'Lecture', '2023-02-15', 'Lecture prolongée', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(4, 'Djomo', 'Rachel', 'F', '650012356', '123456700', '1991-12-12', 'Cameroun', 'Ingénieur', 'Société Tech', 'Allianz', 'Informatique', '2023-05-20', 'Utilisation d\'écrans', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(5, 'Kengne', 'David', 'M', '650012357', '123456701', '1992-01-13', 'Cameroun', 'Avocat', 'Cabinet Juridique', 'AXA', 'Lecture', '2021-07-10', 'Travail sur ordinateur', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(6, 'Nnanga', 'Elisabeth', 'F', '650012358', '123456702', '1993-02-14', 'Cameroun', 'Étudiante', 'Université de Douala', 'Generali', 'Lecture', '2020-09-05', 'Études prolongées', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(7, 'Siewe', 'Roger', 'M', '650012359', '123456703', '1994-03-15', 'Cameroun', 'Comptable', 'Cabinet Comptable ABC', 'Allianz', 'Travail sur ordinateur', '2022-11-30', 'Travail prolongé sur écran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(8, 'Kamga', 'Jean', 'M', '650012345', '123456789', '1980-01-01', 'Cameroun', 'Ingénieur', 'Société Tech', 'AXA', 'Informatique', '2023-10-10', 'Travail prolongé sur écran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(9, 'Ngatchou', 'François', 'M', '650012347', '123456791', '1982-03-03', 'Cameroun', 'Médecin', 'Clinique ABC', 'Generali', 'Consultation', '2021-05-15', 'Travail sur ordinateur', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(10, 'Mendouga', 'Pierre', 'M', '650012349', '123456793', '1984-05-05', 'Cameroun', 'Avocat', 'Cabinet Juridique', 'AXA', 'Consultation', '2020-04-20', 'Conduite de nuit', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(12, 'Tsafack', 'Nicolas', 'M', '650012355', '123456799', '1990-11-11', 'Cameroun', 'Ingénieur', 'Société XYZ', 'Generali', 'Informatique', '2022-07-01', 'Utilisation d\'écrans', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(13, 'Tall', 'Sophie', 'F', '650012366', '123456710', '1989-04-20', 'Yaoundé', 'Enseignant', 'Lycée Bilingue', 'AXA', 'Lecture', '2021-11-12', 'Travail prolongé sur écran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(14, 'Ondoua', 'Thierry', 'M', '650012351', '123456795', '1986-07-07', 'Douala', 'Avocat', 'Cabinet Juridique', 'Generali', 'Consultation', '2020-08-28', 'Conduite de nuit', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, '2024-04-01 13:35:16', '2024-04-01 13:35:16', NULL, NULL, NULL, NULL),
(15, 'Dibong', 'Caroline', 'F', '650012367', '123456711', '1983-09-15', 'Bafoussam', 'Comptable', 'Cabinet Comptable ABC', 'Allianz', 'Travail sur ordinateur', '2023-09-10', 'Lecture prolongée', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, 'service_vente', '2024-04-01 13:35:16', '2024-04-18 21:01:06', 'myopie', 'deux paquets de', 'oui il faut un autre examen', NULL),
(16, 'KenfacK', 'daniel', 'M', '336646633', '2435', '2000-01-01', 'Bafoussam', 'Ingenieur', 'kiki', 'non', 'BASKET', NULL, 'YES', 'RIEN', 'NON', 'YES', 'NON', NULL, 0, 0, 'RIEN D\'AUTRE', NULL, '2024-04-01 15:52:08', '2024-04-01 15:56:39', NULL, NULL, NULL, NULL),
(17, 'Monsieur', 'Marcel', 'M', '658010574', '2337677', '2024-04-19', 'Douala', 'Ingenieur', 'Calex', 'non', 'BASKET', '2024-04-01', 'oui', 'RAS', 'RAS', 'aucun', 'non', 'RAS', 0, 1, 'rien d\'autre à mentionner', NULL, '2024-04-01 16:32:39', '2024-04-01 16:32:39', NULL, NULL, NULL, NULL),
(19, 'FOUNDJE', 'Junior', 'M', '658010572', '5467886533', '2024-04-17', 'Douala', 'Ingenieur', 'kiki', 'non', NULL, NULL, 'YES', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2024-04-12 16:56:26', '2024-04-14 20:10:57', NULL, NULL, NULL, NULL),
(20, 'NGATCHA KAMTCHOUM', 'Pierre Calvin', 'M', '696150429', 'CE08100I5J3KJD4EOH20', '1980-03-14', 'YAOUNDE', 'Opticien', 'CALEX OPTIQUE', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2024-04-14 16:27:25', '2024-04-14 16:27:25', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ID_Client` bigint(20) UNSIGNED NOT NULL,
  `ID_Produit` bigint(20) UNSIGNED NOT NULL,
  `Quantité` int(11) NOT NULL,
  `Date_commande` timestamp NOT NULL DEFAULT '2024-04-18 21:55:01',
  `Status` varchar(255) NOT NULL DEFAULT 'en_attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_01_132610_create_clients_table', 1),
(6, '2024_04_06_000000_create_roles_table', 2),
(7, '2024_04_07_153952_add_additional_columns_to_clients_table', 3),
(8, '2024_04_12_170343_add_choix_service_to_clients_table', 4),
(9, '2024_04_18_231928_drop_administrateur_table', 5),
(10, '2024_04_18_233120_drop_users_and_roles_tables', 5);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Message` text NOT NULL,
  `Lu` tinyint(1) NOT NULL DEFAULT 0,
  `ID_User` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
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
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

CREATE TABLE `prospect` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `nom_commercial` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `heure_prospect` time NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `contact_personne` varchar(255) NOT NULL,
  `heure_rdv` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ID_Client` bigint(20) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, 'caisse', 'La personne qui vend les lunettes au client', NULL, NULL),
(6, 'commercial interne', 'Ceux chargé de faire la prospection pour faire connaitre les services de Calex', NULL, NULL),
(7, 'commercial externe', 'Ceux chargé de faire la prospection pour faire connaitre les services de Calex', NULL, NULL),
(8, 'responsable commercial interne', 'Personne qui coordonne les activités des commerciaux internes', NULL, NULL),
(9, 'responsable commercial externe', 'Personne qui coordonne les activités des commerciaux externes', NULL, NULL),
(10, 'Service Call', 'Ceux qui s\'occupent des rendez-vous, rappels et suivis des clients', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2024-04-01 12:12:18', '2024-04-01 12:12:18'),
(2, 'SONKOUE JONATHAN', 'jonathansonkoue75@gmail.com', '$2y$10$0Cpc7bwMH0v0yPs07RfkgOwjyaludNYA9g33ViaCH4EnMHFLrd4uq', 1, '2024-04-06 16:14:00', '2024-04-06 16:14:00'),
(3, 'Junior', 'sonkouejonathan@yahoo.fr', '$2y$10$Jk87jx/pzx42i0pXbRNI1e5562tQjFIrGj1xgTrheJRBf.jyOG6KC', 1, '2024-04-06 16:16:48', '2024-04-20 01:49:59'),
(5, 'John', 'john@gmail.com', '$2y$10$EnF2o9vChV4vrZpPxTLLSOdbAMWazCcwh6oRaMO5fLedOIJUMlsdu', 2, '2024-04-07 12:30:30', '2024-04-07 12:30:30'),
(6, 'Ekoro', 'ekoro@gmail.com', '$2y$10$9pZEPCMfgjd6EP.uFwdmLuKahsVYeYC1lrqpbTGy7TSo07NV9LmK2', 1, '2024-04-19 23:25:24', '2024-04-20 01:45:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_carte_identite_unique` (`carte_identite`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notification_user` (`ID_User`);

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
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client_id` (`ID_Client`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_user` FOREIGN KEY (`ID_User`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `fk_client_id` FOREIGN KEY (`ID_Client`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
