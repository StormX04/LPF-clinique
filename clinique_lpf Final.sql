-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 06 avr. 2023 à 10:08
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinique_lpf`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`UserSite`@`localhost` PROCEDURE `modifAuthId` (`ancien` CHAR(30), `nouveau` CHAR(30))  BEGIN
	UPDATE clinique_lpf.authentification SET nom_utilisateur= nouveau WHERE nom_utilisateur= ancien;
END$$

CREATE DEFINER=`admin`@`localhost` PROCEDURE `modifAuthMdp` (`ancien` CHAR(30), `nouveau` CHAR(30))  BEGIN
	UPDATE clinique_lpf.authentification SET Motdepasse = SHA1(nouveau) WHERE Motdepasse= SHA1(ancien);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(100) DEFAULT NULL,
  `Motdepasse` varchar(100) DEFAULT NULL,
  `Id_personnel` int(11) DEFAULT NULL,
  `Id_permissions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id`, `nom_utilisateur`, `Motdepasse`, `Id_personnel`, `Id_permissions`) VALUES
(2, 'DupontJohn', '6d9da63212b828337dadf525bc1513ed416831d6', 2, 1),
(3, 'Hug.Faure', 'cf984324607b3e5eb6cbae068b06940f6f91bbad', 3, 3),
(4, 'Sab.Poirier', '791b78ec22a5b16eca3d49c2415c5fcb92213e98', 4, 2),
(9, 'VE.Ya_LPF', 'edb162f71cfcd8355e59ad3bdb2a06c23c28e564', 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `ID` int(255) NOT NULL,
  `Num_chambre` int(255) NOT NULL,
  `Nmbr_pace` int(255) NOT NULL,
  `Equipement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`ID`, `Num_chambre`, `Nmbr_pace`, `Equipement`) VALUES
(1, 1, 2, 'TV'),
(2, 2, 1, 'Handicape'),
(3, 3, 1, 'TV'),
(4, 10, 3, 'Salle de bain'),
(5, 11, 2, 'TV');

-- --------------------------------------------------------

--
-- Structure de la table `contact_patient`
--

CREATE TABLE `contact_patient` (
  `ID` int(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CP` int(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact_patient`
--

INSERT INTO `contact_patient` (`ID`, `Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`) VALUES
(1, 'Mora', 'florian', '22 ruelle boittiaux', 'quievy', 59214, '0688279399'),
(2, 'Guidez', 'louis', '25 rue louis', 'cambrai', 59400, '0611223344'),
(3, 'lemoine', 'francis', '1 rue de la rue', 'cambrai', 59400, '0707070707'),
(4, 'lemoine', 'claude', '1 rue de la rue', 'cambrai', 59400, '0303030303'),
(5, 'Mora', 'florian', '70 rue de ça mère', 'cambrai', 59400, '0615211489'),
(6, 'Danjou', 'Yvan', '55 rue de la mer', 'audry', 59540, '0610211623'),
(7, 'azerty', 'azerty', '23', 'cauroir', 59400, '0677889988'),
(8, 'azerty', 'qsd', '23', 'cauroir', 59400, '0677889988'),
(9, 'azerty', 'azerty', '23', 'cauroir', 59400, '0677889988'),
(10, 'azerty', 'qsd', '23', 'cauroir', 59400, '0677889988'),
(11, 'fepof', 'dizjd', '45dijso', 'dzjpdij', 62000, '0678787878'),
(12, 'fepazoei', 'oizdjz', 'csk', 'lsdkcjd', 59000, '0678787878'),
(13, 'qzdqzd', 'qzdqzd', 'qzd', 'qzdqzd', 59214, '0688279399'),
(14, 'qzdqz', 'dqzd', 'qzdq', 'zdqzdq', 59214, '0688279399'),
(15, 'gyez', 'marianne', '55 rue de merede', 'ville', 59400, '0652634815'),
(16, 'gggg', 'ggg', '55 ruede gz mere', 'quievu', 53254, '0652634815'),
(17, 'mora', 'florian', '22 ruelle pouter', 'quievy', 59214, '0688279399'),
(18, 'mora', 'florian', '22 ruelle pouter', 'quievy', 59214, '0688279399');

-- --------------------------------------------------------

--
-- Structure de la table `couverture_social`
--

CREATE TABLE `couverture_social` (
  `ID` bigint(255) NOT NULL,
  `Org_secu_social` varchar(255) NOT NULL,
  `Pa_assure` tinyint(1) NOT NULL,
  `Pa_ald` tinyint(1) NOT NULL,
  `Nom_mutuelle` varchar(255) NOT NULL,
  `Num_adherent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couverture_social`
--

INSERT INTO `couverture_social` (`ID`, `Org_secu_social`, `Pa_assure`, `Pa_ald`, `Nom_mutuelle`, `Num_adherent`) VALUES
(1901225666528, 'Fonctionnaire', 1, 1, 'matmut', 1),
(1920525445214, 'Salarie du prive', 1, 0, 'vitale', 21),
(1950225445252, 'Salarie du prive', 1, 1, 'qzdqzd', 9191),
(101105912238450, 'Militaire', 1, 1, 'vitale', 9021),
(175085912210764, 'Activite agricole', 1, 0, 'credits agricole', 112),
(285085912210764, 'Fonctionnaire', 1, 1, 'assurance', 10000);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `ID_Documents` int(11) NOT NULL,
  `Carte_identiteRecto` varchar(255) NOT NULL,
  `Carte_identiteVerso` varchar(255) NOT NULL,
  `Carte_vitale` varchar(255) NOT NULL,
  `Carte_mutuelle` varchar(255) NOT NULL,
  `livret_famille` varchar(255) NOT NULL,
  `autorisation_mineur` varchar(255) DEFAULT NULL,
  `ID_Patient` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`ID_Documents`, `Carte_identiteRecto`, `Carte_identiteVerso`, `Carte_vitale`, `Carte_mutuelle`, `livret_famille`, `autorisation_mineur`, `ID_Patient`) VALUES
(6, 'CarteIdentiteRecto_1600417211304.jpg', 'Fi_IdentiteVerso1600417211304.jpg', 'Fi_Carte_vitale1600417211304.jpg', 'Fi_Carte_Mutuelle1600417211304.jpg', 'Fi_Livret_famille1600417211304.jpg', 'Fi_autorisation1600417211304.', 1600417211304),
(8, 'CarteIdentiteRecto_1901225666528.jpg', 'Fi_IdentiteVerso1901225666528.jpg', 'Fi_Carte_vitale1901225666528.jpg', 'Fi_Carte_Mutuelle1901225666528.jpg', 'Fi_Livret_famille1901225666528.jpg', 'Fi_autorisation1901225666528.', 1901225666528),
(9, 'CarteIdentiteRecto_1920525445214.png', 'Fi_IdentiteVerso1920525445214.png', 'Fi_Carte_vitale1920525445214.png', 'Fi_Carte_Mutuelle1920525445214.png', 'Fi_Livret_famille1920525445214.png', 'Fi_autorisation1920525445214.', 1920525445214),
(7, 'CarteIdentiteRecto_1950225445252.PNG', 'Fi_IdentiteVerso1950225445252.png', 'Fi_Carte_vitale1950225445252.png', 'Fi_Carte_Mutuelle1950225445252.png', 'Fi_Livret_famille1950225445252.png', 'Fi_autorisation1950225445252.', 1950225445252),
(3, 'CarteIdentiteRecto_101105912238450.jpg', 'Fi_IdentiteVerso101105912238450.jpg', 'Fi_Carte_vitale101105912238450.jpg', 'Fi_Carte_Mutuelle101105912238450.jpg', 'Fi_Livret_famille101105912238450.jpg', 'Fi_autorisation101105912238450.', 101105912238450),
(1, 'CarteIdentiteRecto_175085912210764.jpg', 'Fi_IdentiteVerso175085912210764.jpg', 'Fi_Carte_vitale175085912210764.jpg', 'Fi_Carte_Mutuelle175085912210764.jpg', 'Fi_Livret_famille175085912210764.jpg', 'Fi_autorisation175085912210764.', 175085912210764),
(4, 'CarteIdentiteRecto_175085912210770.jpg', 'Fi_IdentiteVerso175085912210770.jpg', 'Fi_Carte_vitale175085912210770.jpg', 'Fi_Carte_Mutuelle175085912210770.jpg', 'Fi_Livret_famille175085912210770.jpg', 'Fi_autorisation175085912210770.', 175085912210770),
(2, 'CarteIdentiteRecto_285085912210764.png', 'Fi_IdentiteVerso285085912210764.png', 'Fi_Carte_vitale285085912210764.png', 'Fi_Carte_Mutuelle285085912210764.png', 'Fi_Livret_famille285085912210764.png', 'Fi_autorisation285085912210764.', 285085912210764);

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisation`
--

CREATE TABLE `hospitalisation` (
  `ID` int(255) NOT NULL,
  `Choix_admission` varchar(255) NOT NULL,
  `Date_hospitalisation` date NOT NULL,
  `Heure_intervention` time(6) NOT NULL,
  `Choix_medecin` int(255) NOT NULL,
  `Chambre` int(255) DEFAULT NULL,
  `idPatient` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hospitalisation`
--

INSERT INTO `hospitalisation` (`ID`, `Choix_admission`, `Date_hospitalisation`, `Heure_intervention`, `Choix_medecin`, `Chambre`, `idPatient`) VALUES
(1, 'Chirurgie', '2023-04-15', '00:00:00.000000', 3, 2, 175085912210764),
(2, 'Chirurgie', '2023-04-27', '10:00:00.000000', 3, 1, 285085912210764),
(3, 'chirurgie ophtalmologique', '2023-04-04', '13:30:00.000000', 11, 1, 101105912238450),
(4, 'Ambulatoire', '2023-04-16', '18:39:00.000000', 1, 1, 175085912210770),
(5, 'chirurgie\r\nurologique', '2023-04-25', '08:00:00.000000', 11, 1, 1600417211304),
(6, 'Chirurgie', '2023-04-28', '17:04:00.000000', 1, 1, 1950225445252),
(7, 'cancérologie', '2023-04-03', '12:00:00.000000', 11, 2, 1901225666528),
(8, 'cancérologie', '2023-04-16', '19:10:00.000000', 1, 1, 1920525445214);

--
-- Déclencheurs `hospitalisation`
--
DELIMITER $$
CREATE TRIGGER `check_medecin_hospitalisation` BEFORE INSERT ON `hospitalisation` FOR EACH ROW BEGIN
    IF EXISTS (SELECT * FROM hospitalisation 
               WHERE Date_hospitalisation = NEW.Date_hospitalisation 
               AND Heure_intervention = NEW.Heure_intervention 
               AND Choix_medecin = NEW.Choix_medecin) THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Le médecin ne peut pas effectuer deux hospitalisations le même jour et à la même heure.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `ID_secu` bigint(255) NOT NULL,
  `Civ` varchar(255) NOT NULL,
  `Nom_naissance` varchar(255) NOT NULL,
  `Nom_epouse` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `CP` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `id_couverture_social` bigint(255) NOT NULL,
  `id_contact_Confiance` int(255) NOT NULL,
  `id_contact_Prevenir` int(255) NOT NULL,
  `ID_Documents` int(255) NOT NULL,
  `id_Hospitalisation` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`ID_secu`, `Civ`, `Nom_naissance`, `Nom_epouse`, `Prenom`, `Date_naissance`, `Adresse`, `CP`, `Ville`, `Email`, `Telephone`, `id_couverture_social`, `id_contact_Confiance`, `id_contact_Prevenir`, `ID_Documents`, `id_Hospitalisation`) VALUES
(1901225666528, 'h', 'Guez', '', 'MLOuis', '2004-04-20', '1254', '59400', 'cambrai', 'gul@bb.fr', '678594857', 1901225666528, 15, 16, 8, 1901225666528),
(1920525445214, 'h', 'Moulin', '', 'JF', '2003-08-10', '25 rue pourty', '59214', 'quievy', 'florian@gmail.com', '655441122', 1920525445214, 17, 18, 9, 1920525445214),
(1950225445252, 'h', 'qzdqzd', '', 'qzdqzdqz', '2021-10-13', 'qzdqzdqzd', '59400', 'qzdqzd', 'qzd@gmail.com', '688544141', 1950225445252, 13, 14, 7, 1950225445252),
(101105912238450, 'h', 'Danjou', '', 'Yvan', '2001-10-21', '55 rue de la mer', '59540', 'caudry', 'danjou@gmail.com', '610211623', 101105912238450, 5, 6, 3, 101105912238450),
(175085912210764, 'h', 'petasse', '', 'arnaud', '1975-08-10', '25 rue louis', '59400', 'cauroir', 'arnaud.petasse@orange.fr', '655447788', 175085912210764, 1, 2, 1, 175085912210764),
(285085912210764, 'f', 'lemoine', '', 'jeanne', '1985-07-12', '13 rue de la rue', '59400', 'cambrai', 'lemoinejeanne@gmail.com', '606060606', 285085912210764, 3, 4, 2, 285085912210764);

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `role_SI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`id`, `role_SI`) VALUES
(1, 'secretaire'),
(2, 'administrateur'),
(3, 'medecin');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `ID` int(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`ID`, `Nom`, `Prenom`, `id_service`) VALUES
(1, 'Smith', 'Jean', 1),
(2, 'Dupont', 'John', 1),
(3, 'Faure', 'Hugues', 11),
(4, 'Poirier', 'Sabine', 18),
(11, 'VERRIEZ', 'Yassine', 12);

--
-- Déclencheurs `personnel`
--
DELIMITER $$
CREATE TRIGGER `supprPersonel` BEFORE DELETE ON `personnel` FOR EACH ROW BEGIN
	UPDATE clinique_lpf.hospitalisation SET Choix_medecin=NULL WHERE Choix_medecin= old.ID;
	DELETE FROM clinique_lpf.authentification WHERE Id_personnel =old.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `ID` int(255) NOT NULL,
  `libelle` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`ID`, `libelle`) VALUES
(1, 'Chirurgie'),
(2, 'chirurgie viscérale'),
(3, 'chirurgie vasculaire'),
(4, 'chirurgie gynécologique'),
(5, 'chirurgie obstétrique'),
(6, 'chirurgie dentaire'),
(7, 'chirurgie orthopédique'),
(8, 'chirurgie O.R.L,'),
(9, 'chirurgie ophtalmologique'),
(10, 'chirurgie\r\nurologique'),
(11, 'neurochirurgie'),
(12, 'cancérologie'),
(13, 'l’endocrinologie'),
(14, 'pédiatrie'),
(15, 'réadaptation cardiaque'),
(16, 'rééducation nutritionnelle '),
(17, 'secretaire'),
(18, 'administrateur réseaux et systèmes'),
(19, 'Hospitalisation'),
(20, 'Ambulatoire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authentification_FK_1` (`Id_permissions`),
  ADD KEY `authentification_FK` (`Id_personnel`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Num_chambre` (`Num_chambre`);

--
-- Index pour la table `contact_patient`
--
ALTER TABLE `contact_patient`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `couverture_social`
--
ALTER TABLE `couverture_social`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Num_adherent` (`Num_adherent`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`ID_Patient`),
  ADD UNIQUE KEY `ID_Documents` (`ID_Documents`),
  ADD KEY `ID_Patient` (`ID_Patient`);

--
-- Index pour la table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Chambre` (`Chambre`),
  ADD KEY `Choix_medecin` (`Choix_medecin`),
  ADD KEY `Choix_medecin_2` (`Choix_medecin`),
  ADD KEY `idPatient` (`idPatient`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID_secu`),
  ADD KEY `id_contact` (`id_contact_Confiance`),
  ADD KEY `id_couverture_social` (`id_couverture_social`),
  ADD KEY `id_contact_Prevenir` (`id_contact_Prevenir`),
  ADD KEY `ID_Documents` (`ID_Documents`),
  ADD KEY `id_Hospitalisation` (`id_Hospitalisation`);

--
-- Index pour la table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact_patient`
--
ALTER TABLE `contact_patient`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `couverture_social`
--
ALTER TABLE `couverture_social`
  MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285085912210765;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `ID_Documents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD CONSTRAINT `authentification_FK` FOREIGN KEY (`Id_personnel`) REFERENCES `personnel` (`ID`),
  ADD CONSTRAINT `authentification_FK_1` FOREIGN KEY (`Id_permissions`) REFERENCES `permission` (`id`);

--
-- Contraintes pour la table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD CONSTRAINT `hospitalisation_FK` FOREIGN KEY (`Choix_medecin`) REFERENCES `personnel` (`ID`),
  ADD CONSTRAINT `hospitalisation_FK_2` FOREIGN KEY (`Chambre`) REFERENCES `chambre` (`Num_chambre`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_FK_1` FOREIGN KEY (`id_couverture_social`) REFERENCES `couverture_social` (`ID`),
  ADD CONSTRAINT `patient_FK_2` FOREIGN KEY (`id_contact_Confiance`) REFERENCES `contact_patient` (`ID`),
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`id_contact_Prevenir`) REFERENCES `contact_patient` (`ID`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`ID_Documents`) REFERENCES `documents` (`ID_Documents`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`id_Hospitalisation`) REFERENCES `hospitalisation` (`idPatient`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
