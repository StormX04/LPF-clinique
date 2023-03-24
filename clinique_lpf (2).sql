-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mars 2023 à 10:56
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinique_lpf`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(100) DEFAULT NULL,
  `Motdepasse` varchar(100) DEFAULT NULL,
  `Id_personnel` int(11) DEFAULT NULL,
  `Id_permissions` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authentification_FK_1` (`Id_permissions`),
  KEY `authentification_FK` (`Id_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id`, `nom_utilisateur`, `Motdepasse`, `Id_personnel`, `Id_permissions`) VALUES
(1, 'medecin_1', 'medecin_1', 2, 1),
(2, 'DupontJohn', 'MedecinDupontJohn2023+', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Num_chambre` int(255) NOT NULL,
  `Nmbr_pace` int(255) NOT NULL,
  `Equipement` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Num_chambre` (`Num_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `contact_patient`;
CREATE TABLE IF NOT EXISTS `contact_patient` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CP` int(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact_patient`
--

INSERT INTO `contact_patient` (`ID`, `Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`) VALUES
(327, 'Guidez', 'louis', '22 rjfjf', 'cambrai', 59214, '0688279399'),
(328, 'Guidez', 'louis', '22 rjfjf', 'cambrai', 59214, '0688279399');

-- --------------------------------------------------------

--
-- Structure de la table `couverture_social`
--

DROP TABLE IF EXISTS `couverture_social`;
CREATE TABLE IF NOT EXISTS `couverture_social` (
  `ID` bigint(255) NOT NULL AUTO_INCREMENT,
  `Org_secu_social` varchar(255) NOT NULL,
  `Pa_assure` tinyint(1) NOT NULL,
  `Pa_ald` tinyint(1) NOT NULL,
  `Nom_mutuelle` varchar(255) NOT NULL,
  `Num_adherent` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Num_adherent` (`Num_adherent`)
) ENGINE=InnoDB AUTO_INCREMENT=102045954425186 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couverture_social`
--

INSERT INTO `couverture_social` (`ID`, `Org_secu_social`, `Pa_assure`, `Pa_ald`, `Nom_mutuelle`, `Num_adherent`) VALUES
(102045954425185, 'Independent', 1, 0, 'vitale', 1120);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `ID_Documents` int(11) NOT NULL AUTO_INCREMENT,
  `Carte_identiteRecto` varchar(255) NOT NULL,
  `Carte_identiteVerso` varchar(255) NOT NULL,
  `Carte_vitale` varchar(255) NOT NULL,
  `Carte_mutuelle` varchar(255) NOT NULL,
  `livret_famille` varchar(255) NOT NULL,
  `autorisation_mineur` varchar(255) DEFAULT NULL,
  `ID_Patient` bigint(11) NOT NULL,
  PRIMARY KEY (`ID_Patient`),
  UNIQUE KEY `ID_Documents` (`ID_Documents`),
  KEY `ID_Patient` (`ID_Patient`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`ID_Documents`, `Carte_identiteRecto`, `Carte_identiteVerso`, `Carte_vitale`, `Carte_mutuelle`, `livret_famille`, `autorisation_mineur`, `ID_Patient`) VALUES
(36, 'CarteIdentiteRecto_102045954425185.png', 'Fi_IdentiteVerso102045954425185.png', 'Fi_Carte_vitale102045954425185.png', 'Fi_Carte_Mutuelle102045954425185.png', 'Fi_Livret_famille102045954425185.png', 'Fi_autorisation102045954425185.png', 102045954425185);

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisation`
--

DROP TABLE IF EXISTS `hospitalisation`;
CREATE TABLE IF NOT EXISTS `hospitalisation` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Choix_admission` varchar(255) NOT NULL,
  `Date_hospitalisation` date NOT NULL,
  `Heure_intervention` varchar(255) NOT NULL,
  `Choix_medecin` int(255) NOT NULL,
  `Chambre` int(255) DEFAULT NULL,
  `idPatient` bigint(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Chambre` (`Chambre`),
  KEY `Choix_medecin` (`Choix_medecin`),
  KEY `Choix_medecin_2` (`Choix_medecin`),
  KEY `idPatient` (`idPatient`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hospitalisation`
--

INSERT INTO `hospitalisation` (`ID`, `Choix_admission`, `Date_hospitalisation`, `Heure_intervention`, `Choix_medecin`, `Chambre`, `idPatient`) VALUES
(30, 'ambulatoire', '2023-03-15', '13:51', 2, 1, 102045954425185);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
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
  `Telephone` int(11) NOT NULL,
  `id_couverture_social` bigint(255) NOT NULL,
  `id_contact_Confiance` int(255) NOT NULL,
  `id_contact_Prevenir` int(255) NOT NULL,
  `ID_Documents` int(255) NOT NULL,
  `id_Hospitalisation` bigint(20) NOT NULL,
  PRIMARY KEY (`ID_secu`),
  KEY `id_contact` (`id_contact_Confiance`),
  KEY `id_couverture_social` (`id_couverture_social`),
  KEY `id_contact_Prevenir` (`id_contact_Prevenir`),
  KEY `ID_Documents` (`ID_Documents`),
  KEY `id_Hospitalisation` (`id_Hospitalisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`ID_secu`, `Civ`, `Nom_naissance`, `Nom_epouse`, `Prenom`, `Date_naissance`, `Adresse`, `CP`, `Ville`, `Email`, `Telephone`, `id_couverture_social`, `id_contact_Confiance`, `id_contact_Prevenir`, `ID_Documents`, `id_Hospitalisation`) VALUES
(102045954425185, 'h', 'mora', '', 'florian', '2002-04-10', '22 ruelle', '59214', 'quievy', 'florian.mora@gmail.com', 688279399, 102045954425185, 327, 328, 36, 102045954425185);

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_SI` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`id`, `role_SI`) VALUES
(1, 'medecin');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`ID`, `Nom`, `Prenom`, `id_service`) VALUES
(1, 'Smith', 'Jean', 1),
(2, 'Dupont', 'John', 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`ID`, `libelle`) VALUES
(1, 'Chirurgie');

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
