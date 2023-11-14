-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 nov. 2023 à 17:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `ID_Agence` int NOT NULL AUTO_INCREMENT,
  `NomAgence` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_agence` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NumeroTelephone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Agence`)
) ENGINE=MyISAM AUTO_INCREMENT=401 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`ID_Agence`, `NomAgence`, `email_agence`, `NumeroTelephone`, `ville`) VALUES
(400, 'Y', 'y@gmail.com', '07652357', 'paris');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Date_Naissance` date NOT NULL,
  `situation_familiale` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CIN_client` varchar(50) NOT NULL,
  `Numero_Telephone` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_client`)
) ENGINE=MyISAM AUTO_INCREMENT=502 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_client`, `Nom`, `Prenom`, `Date_Naissance`, `situation_familiale`, `adresse`, `email`, `CIN_client`, `Numero_Telephone`) VALUES
(500, 'hassani', 'khadija', '2023-11-08', 'celiba', 'x', 'kh@gmail.com', 'CD123556', '07123457654'),
(501, 'bennani', 'amal', '2023-03-08', 'mariée', 'Y', 'amal@gmail.fr', 'CD09876543', '074543212455');

-- --------------------------------------------------------

--
-- Structure de la table `compte_bancaire`
--

DROP TABLE IF EXISTS `compte_bancaire`;
CREATE TABLE IF NOT EXISTS `compte_bancaire` (
  `ID_Compte` int NOT NULL AUTO_INCREMENT,
  `SoldeInitial` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateOuverture` date NOT NULL,
  `ID_Client` int NOT NULL,
  `ID_Type` int NOT NULL,
  `ID_Conseiller` int NOT NULL,
  PRIMARY KEY (`ID_Compte`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `compte_bancaire`
--

INSERT INTO `compte_bancaire` (`ID_Compte`, `SoldeInitial`, `dateOuverture`, `ID_Client`, `ID_Type`, `ID_Conseiller`) VALUES
(100, '10000', '2020-10-02', 500, 200, 300),
(101, '657', '2023-08-01', 501, 200, 300),
(102, '600', '2023-09-13', 501, 201, 300);

-- --------------------------------------------------------

--
-- Structure de la table `conseiller_bancaire`
--

DROP TABLE IF EXISTS `conseiller_bancaire`;
CREATE TABLE IF NOT EXISTS `conseiller_bancaire` (
  `ID_Conseiller` int NOT NULL AUTO_INCREMENT,
  `nom_conseiller` varchar(50) NOT NULL,
  `prenom_conseiller` varchar(50) NOT NULL,
  `numero_telephone` varchar(50) NOT NULL,
  `email_conseiller` varchar(50) NOT NULL,
  `ID_agence` int NOT NULL,
  `CIN` varchar(50) NOT NULL,
  `Date_de_Naissance` date NOT NULL,
  `SituationFamiliale` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `MotDePasse` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Conseiller`)
) ENGINE=MyISAM AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `conseiller_bancaire`
--

INSERT INTO `conseiller_bancaire` (`ID_Conseiller`, `nom_conseiller`, `prenom_conseiller`, `numero_telephone`, `email_conseiller`, `ID_agence`, `CIN`, `Date_de_Naissance`, `SituationFamiliale`, `Adresse`, `MotDePasse`) VALUES
(300, 'A', 'AA', '076523568', 'A@gmail.com', 400, 'CF122763', '1994-11-08', 'celi', 'A@gmail.fr', 'aa');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_compte`
--

DROP TABLE IF EXISTS `ligne_compte`;
CREATE TABLE IF NOT EXISTS `ligne_compte` (
  `ID_Ligne` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `Montant` varchar(50) NOT NULL,
  `date_transaction` date NOT NULL,
  `ID_compte` int NOT NULL,
  PRIMARY KEY (`ID_Ligne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

DROP TABLE IF EXISTS `typecompte`;
CREATE TABLE IF NOT EXISTS `typecompte` (
  `ID_TypeCompte` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_TypeCompte`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `typecompte`
--

INSERT INTO `typecompte` (`ID_TypeCompte`, `nom`) VALUES
(200, 'S'),
(201, 'U');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
