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





INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NULL, '2024-04-01 08:12:18', '2024-04-01 08:12:18'),
(2, 'SONKOUE JONATHAN', 'jonathansonkoue75@gmail.com', NULL, '$2y$10$0Cpc7bwMH0v0yPs07RfkgOwjyaludNYA9g33ViaCH4EnMHFLrd4uq', 1, NULL, '2024-04-06 12:14:00', '2024-04-06 12:14:00'),
(3, 'Junior', 'sonkouejonathan@yahoo.fr', NULL, '$2y$10$Jk87jx/pzx42i0pXbRNI1e5562tQjFIrGj1xgTrheJRBf.jyOG6KC', 1, NULL, '2024-04-06 12:16:48', '2024-04-19 21:49:59'),
(5, 'John', 'john@gmail.com', NULL, '$2y$10$EnF2o9vChV4vrZpPxTLLSOdbAMWazCcwh6oRaMO5fLedOIJUMlsdu', 2, NULL, '2024-04-07 08:30:30', '2024-04-07 08:30:30'),
                                                                                                                                          (6, 'Ekoro', 'ekoro@gmail.com', NULL, '$2y$10$9pZEPCMfgjd6EP.uFwdmLuKahsVYeYC1lrqpbTGy7TSo07NV9LmK2', 1, NULL, '2024-04-19 19:25:24', '2024-04-19 21:45:21'),
                                                                                                                                          (7, 'acceuil', 'acceuil@gmail.com', NULL, '$2y$10$Kj2gPqMEtl/6gBjnP3TNXeC9Gfgw/oWETuaZen1WnpBcnrjnFHlZi', 2, NULL, '2024-04-26 19:11:01', '2024-04-26 19:11:01'),
                                                                                                                                          (8, 'medecin', 'medecin@gmail.com', NULL, '$2y$10$ISnxZ9W9KTU.i.Svfkce2.0tAehUwdBoR9XuRg9hrNvsFb9nuUz3m', 3, NULL, '2024-04-26 22:17:42', '2024-04-26 22:17:42'),
                                                                                                                                          (9, 'atelier', 'atelier@gmail.com', NULL, '$2y$10$zafJ2TLP9u34iZyljcBXQuqbcXstFoHCiNygOX734lnoOPmMwOpU6', 4, NULL, '2024-04-28 04:24:31', '2024-04-28 04:24:31'),
                                                                                                                                          (10, 'caisse', 'caisse@gmail.com', NULL, '$2y$10$JhW73gzLEpjqnVJFRxkq.uhnDl2P2Vh39GLer0zGVOZQfgED1BTlm', 5, NULL, '2024-04-28 04:25:03', '2024-04-28 04:25:03'),
                                                                                                                                          (11, 'commercial_interne', 'commercialinterne@gmail.com', NULL, '$2y$10$L3p3Fp3i5g2KqvdNmdtgAOdo28PWbt/otSQzy.c38nbt/bV13puSi', 6, NULL, '2024-04-28 04:27:07', '2024-04-28 04:27:07'),
                                                                                                                                          (12, 'commercial_externe', 'commercialexterne@gmail.com', NULL, '$2y$10$uBv50qvJ3p2T4InJPFGcieWEi.rWaVZHQKNVt646OuhF3gmK7CmLS', 7, NULL, '2024-04-28 04:28:16', '2024-04-28 04:28:16'),
                                                                                                                                          (13, 'Responsable interne', 'responsableinterne@gmail.com', NULL, '$2y$10$tbEcDw8SVft5G3lyWea3Tu/e6KW2D7uuWwdZLKCV4MIqcX6xgMk5O', 8, NULL, '2024-04-28 04:29:30', '2024-04-28 04:29:30'),
                                                                                                                                          (14, 'Responsable externe', 'responsableexterne@gmail.com', NULL, '$2y$10$xo1qZhj04hC0oJRFRaeu9uyHKdx9vYS2mFkKzauciZB46vm43KCO2', 9, NULL, '2024-04-28 04:30:44', '2024-04-28 04:30:44');



INSERT INTO `clients` (`id`, `nom`, `prenom`, `sexe`, `telephone`, `carte_identite`, `date_naissance`, `lieu_naissance`, `profession`, `societe_attache`, `assurance`, `disciplines_pratiquees`, `date_debut`, `activite_interpelant_vision`, `antecedents_familiaux`, `antecedents_chirurgicaux`, `traitements_en_cours`, `allergies`, `mentions_generales`, `portez_vous_des_lunettes`, `besoin_changer_lunettes`, `autre_choses`, `choix_service`, `diagnostic`, `prescription`, `examen_particulier`, `rendez_vous`, `created_at`, `updated_at`) VALUES
(1, 'Sonkoueee', 'Jonathan', 'M', '658010572', '54678865', '2024-04-10', 'Bafoussam', 'Ingenieur', 'Calex', 'hnhj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, '2024-04-01 07:33:43', '2024-04-26 20:59:13'),
(2, 'Nkoumou', 'Marie', 'F', '650012346', '123456790', '1981-02-02', 'Cameroun', 'Médecin', 'Hôpital Central', 'AXA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-28 05:49:54'),
(3, 'Tchakounte', 'Patrick', 'M', '650012353', '123456797', '1988-09-09', 'Cameroun', 'Enseignant', 'Lycée Bilingue', 'Generali', 'Lecture', '2023-02-15', 'Lecture prolongée', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(4, 'Djomo', 'Rachel', 'F', '650012356', '123456700', '1991-12-12', 'Cameroun', 'Ingénieur', 'Société Tech', 'Allianz', 'Informatique', '2023-05-20', 'Utilisation d\'écrans', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(5, 'Kengne', 'David', 'M', '650012357', '123456701', '1992-01-13', 'Cameroun', 'Avocat', 'Cabinet Juridique', 'AXA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'caisse', NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-05-02 15:17:29'),
(6, 'Nnanga', 'Elisabeth', 'F', '650012358', '123456702', '1993-02-14', 'Cameroun', 'Étudiante', 'Université de Douala', 'Generali', 'Lecture', '2020-09-05', 'Études prolongées', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(7, 'Siewe', 'Roger', 'M', '650012359', '123456703', '1994-03-15', 'Cameroun', 'Comptable', 'Cabinet Comptable ABC', 'Allianz', 'Travail sur ordinateur', '2022-11-30', 'Travail prolongé sur écran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(8, 'Kamga', 'Jean', 'M', '650012345', '123456789', '1980-01-01', 'Cameroun', 'Ingénieur', 'Société Tech', 'AXA', 'Informatique', '2023-10-10', 'Travail prolongé sur écran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(9, 'Ngatchou', 'François', 'M', '650012347', '123456791', '1982-03-03', 'Cameroun', 'Médecin', 'Clinique ABC', 'Generali', 'Consultation', '2021-05-15', 'Travail sur ordinateur', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(10, 'Mendouga', 'Pierre', 'M', '650012349', '123456793', '1984-05-05', 'Cameroun', 'Avocat', 'Cabinet Juridique', 'AXA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-05-02 15:17:48'),
(12, 'Tsafack', 'Nicolas', 'M', '650012355', '123456799', '1990-11-11', 'Cameroun', 'Ingénieur', 'Société XYZ', 'Generali', 'Informatique', '2022-07-01', 'Utilisation d\'écrans', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(13, 'Tall', 'Sophie', 'F', '650012366', '123456710', '1989-04-20', 'Yaoundé', 'Enseignant', 'Lycée Bilingue', 'AXA', 'Lecture', '2021-11-12', 'Travail prolongé sur écran', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(14, 'Ondoua', 'Thierry', 'M', '650012351', '123456795', '1986-07-07', 'Douala', 'Avocat', 'Cabinet Juridique', 'Generali', 'Consultation', '2020-08-28', 'Conduite de nuit', 'Aucun', 'Aucun', 'Aucun', 'Aucun', 'Aucune', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-01 09:35:16'),
(15, 'Dibong', 'Caroline', 'F', '650012367', '123456711', '1983-09-15', 'Bafoussam', 'Comptable', 'Cabinet Comptable ABC', 'Allianz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, '2024-04-01 09:35:16', '2024-04-30 08:16:41'),
(16, 'KenfacK', 'daniel', 'M', '336646633', '2435', '2000-01-01', 'Bafoussam', 'Ingenieur', 'kiki', 'non', 'BASKET', NULL, 'YES', 'RIEN', 'NON', 'YES', 'NON', NULL, 0, 0, 'RIEN D\'AUTRE', NULL, NULL, NULL, NULL, NULL, '2024-04-01 11:52:08', '2024-04-01 11:56:39'),
(17, 'Monsieur', 'Marcel', 'M', '658010574', '2337677', '2024-04-19', 'Douala', 'Ingenieur', 'Calex', 'non', 'BASKET', '2024-04-01', 'oui', 'RAS', 'RAS', 'aucun', 'non', 'RAS', 0, 1, 'rien d\'autre à mentionner', NULL, NULL, NULL, NULL, NULL, '2024-04-01 12:32:39', '2024-04-01 12:32:39'),
(19, 'FOUNDJE', 'Junior', 'M', '658010572', '5467886533', '2024-04-17', 'Douala', 'Ingenieur', 'kiki', 'non', NULL, NULL, 'YES', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:56:26', '2024-04-14 16:10:57'),
(36, 'Foyet Tchale', 'Yves Michel', 'M', '0751232812', '123455', '2024-04-27', 'Baleng', 'Etudiant', 'SG', 'assure', 'ggegeggge', '2024-04-27', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, '2024-04-27 05:40:35', '2024-04-27 05:43:41'),
(37, 'Tchale Foyet', 'Wiliam', 'M', '0610017013', '126788', '2024-04-28', 'Baleng', 'Etudiant', 'SG', 'assure', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, '2024-04-27 05:47:13', '2024-04-27 05:47:13'),
 (38, 'Julien', 'Pena', 'M', '0596007790', '4758690', '2024-04-27', 'Baleng', 'Etudiant', 'SG', 'assure', 'ggegeggge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'entretien_lunettes', NULL, NULL, NULL, NULL, '2024-04-27 05:47:55', '2024-04-27 05:49:39'),
 (40, 'Sonkoue', 'Foundje', 'M', '658010572', '546788655567', '2024-04-25', 'Douala', 'Ingenieur', 'CALEX OPTIQUE', 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, '2024-04-28 16:04:14', '2024-04-28 16:04:14'),
 (43, 'Sonkouez', 'Foundje', 'M', '6580105723', '676578588', '2024-04-26', 'Douala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'consultation', NULL, NULL, NULL, NULL, '2024-04-28 16:07:44', '2024-04-28 16:07:44');


INSERT INTO `notifications` (`id`, `message`, `status`, `visibility`, `user_id`, `client_id`, `created_at`, `updated_at`) VALUES
    (7, 'consultation de Mrs FOYET TCHALE  (cliquez pour acceder)', 1, 1, 3, 36, '2024-04-27 05:40:35', '2024-04-27 05:51:54'),
    (8, 'consultation de Mrs TCHALE FOYET  (cliquez pour acceder)', 1, 1, 3, 37, '2024-04-27 05:47:13', '2024-04-27 05:52:02'),
    (9, 'consultation de Mrs JULIEN  (cliquez pour acceder)', 1, 1, 3, 38, '2024-04-27 05:47:55', '2024-04-27 05:52:09'),
    (10, 'consultation de Mrs SONKOUE  (cliquez pour acceder)', 0, 0, 3, 40, '2024-04-28 16:04:14', '2024-04-28 16:04:14'),
    (11, 'consultation de Mrs SONKOUEZ  (cliquez pour acceder)', 0, 0, 3, 43, '2024-04-28 16:07:44', '2024-04-28 16:07:44');


INSERT INTO `prospects` (`id`, `date`, `commercial_name`, `entreprise_nom`, `entreprise_responsable`, `entreprise_contact`, `entreprise_heure`, `rdv_nom_prenom`, `rdv_contact`, `rdv_societe`, `rdv_heure`, `nettoyage_nom_prenom`, `nettoyage_contact`, `nettoyage_societe`, `nettoyage_heure`, `user_id`, `created_at`, `updated_at`, `date_rdv`, `statut`) VALUES
(1, '2024-04-24', 'OKITA', 'Chococam', 'Atangana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-28 10:49:10', '2024-05-02 08:41:04', '2024-05-26', 'verifie'),
(2, '2024-04-24', 'okiaa', 'Chococam', 'Atangana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-28 10:49:41', '2024-05-02 08:45:43', '2024-05-25', 'pas_encore'),
(4, '2024-04-24', 'okia', 'Chococam', 'Atangana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-28 10:53:20', '2024-04-28 10:53:20', NULL, NULL),
(6, '2024-04-24', 'john', 'IUSJ', 'JEAN HERVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-28 10:54:54', '2024-04-28 10:54:54', NULL, NULL),
(7, '2024-04-01', 'Marcel', NULL, NULL, NULL, NULL, 'Kenfack Franc', '689875645', 'Grentech', '15h', NULL, NULL, NULL, NULL, 1, '2024-04-28 12:03:08', '2024-05-02 09:13:46', '2024-04-29', 'ok'),
(8, '2024-04-14', 'Rhodia', 'NZING AFRIC', 'SOLO', '655986554', '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-30 08:22:22', '2024-05-02 14:33:50', '2024-05-12', 'verifie'),
(9, '2024-05-10', 'Jonathan', NULL, NULL, NULL, NULL, 'Kenfack Didier', '678987809', 'Oilraf', '17H30', NULL, NULL, NULL, NULL, 1, '2024-05-02 09:00:11', '2024-05-02 09:00:26', '2024-05-21', 'pas_bon');


