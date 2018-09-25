-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 25 sep. 2018 à 07:18
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `advanced`
--

-- --------------------------------------------------------

--
-- Structure de la table `f_categories`
--

DROP TABLE IF EXISTS `f_categories`;
CREATE TABLE IF NOT EXISTS `f_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `f_categories`
--

INSERT INTO `f_categories` (`id`, `nom`) VALUES
(1, 'Programmation'),
(2, 'Securite');

-- --------------------------------------------------------

--
-- Structure de la table `f_messages`
--

DROP TABLE IF EXISTS `f_messages`;
CREATE TABLE IF NOT EXISTS `f_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_topics` int(11) UNSIGNED NOT NULL,
  `id_posteur` int(11) UNSIGNED DEFAULT NULL,
  `date_heure_post` datetime DEFAULT NULL,
  `date_heure_edition` datetime DEFAULT NULL,
  `meilleure_reponse` int(11) DEFAULT NULL,
  `contenu` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `f_messages`
--

INSERT INTO `f_messages` (`id`, `id_topics`, `id_posteur`, `date_heure_post`, `date_heure_edition`, `meilleure_reponse`, `contenu`) VALUES
(1, 1, 3, '2018-09-16 17:42:53', NULL, NULL, '                            \r\n                        slt prof, tu as quel probleme , envoie une image');

-- --------------------------------------------------------

--
-- Structure de la table `f_souscategories`
--

DROP TABLE IF EXISTS `f_souscategories`;
CREATE TABLE IF NOT EXISTS `f_souscategories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_categorie` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `f_souscategories`
--

INSERT INTO `f_souscategories` (`id`, `id_categorie`, `nom`) VALUES
(6, 1, 'Html/css'),
(7, 1, 'php'),
(8, 1, 'css'),
(9, 2, 'hacking'),
(10, 2, 'reseau');

-- --------------------------------------------------------

--
-- Structure de la table `f_topics`
--

DROP TABLE IF EXISTS `f_topics`;
CREATE TABLE IF NOT EXISTS `f_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_createur` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `sujet` tinytext,
  `contenu` text,
  `date_heure_creation` datetime DEFAULT NULL,
  `resolu` int(11) DEFAULT NULL,
  `notif_createur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `f_topics`
--

INSERT INTO `f_topics` (`id`, `id_createur`, `nom`, `sujet`, `contenu`, `date_heure_creation`, `resolu`, `notif_createur`) VALUES
(1, 2, NULL, 'probleme de css', 'slt j\'ai un serieux probleme', '2018-09-16 17:42:14', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `f_topics_categories`
--

DROP TABLE IF EXISTS `f_topics_categories`;
CREATE TABLE IF NOT EXISTS `f_topics_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_topic` int(10) UNSIGNED NOT NULL,
  `id_categorie` int(10) UNSIGNED NOT NULL,
  `id_souscategorie` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `f_topics_categories`
--

INSERT INTO `f_topics_categories` (`id`, `id_topic`, `id_categorie`, `id_souscategorie`) VALUES
(1, 1, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `ict_addcour`
--

DROP TABLE IF EXISTS `ict_addcour`;
CREATE TABLE IF NOT EXISTS `ict_addcour` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_professeur` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_enregistrement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ict_addcour`
--

INSERT INTO `ict_addcour` (`id`, `id_professeur`, `titre`, `photo`, `description`, `id_enregistrement`) VALUES
(1, 1, 'programmer une structure de  donnÃ©es', 'desert.jpg', '	    	\n\n	    sltt je viens de publiÃ© mon premier cour', 'd250112ejesbeer');

-- --------------------------------------------------------

--
-- Structure de la table `ict_addpdf`
--

DROP TABLE IF EXISTS `ict_addpdf`;
CREATE TABLE IF NOT EXISTS `ict_addpdf` (
  `id_pdf` int(11) NOT NULL AUTO_INCREMENT,
  `id_cour` int(11) DEFAULT NULL COMMENT 'id du cour',
  `id_prof` int(11) DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `titrePdf` varchar(100) DEFAULT NULL,
  `descriptionPdf` varchar(255) DEFAULT NULL,
  `idEnregistrementProf` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pdf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ict_addpdf`
--

INSERT INTO `ict_addpdf` (`id_pdf`, `id_cour`, `id_prof`, `pdf`, `titrePdf`, `descriptionPdf`, `idEnregistrementProf`) VALUES
(1, 1, 1, '482-Cours-JS-jQuery.pdf', 'struture partie 1', 'lisez bien ceci', '4259149-jesbeer');

-- --------------------------------------------------------

--
-- Structure de la table `ict_addprofesseur`
--

DROP TABLE IF EXISTS `ict_addprofesseur`;
CREATE TABLE IF NOT EXISTS `ict_addprofesseur` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_secretaire` int(10) UNSIGNED NOT NULL,
  `code_matiere` varchar(100) NOT NULL COMMENT 'code matiere du professeur',
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ict_addsecretaire`
--

DROP TABLE IF EXISTS `ict_addsecretaire`;
CREATE TABLE IF NOT EXISTS `ict_addsecretaire` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ict_professeur`
--

DROP TABLE IF EXISTS `ict_professeur`;
CREATE TABLE IF NOT EXISTS `ict_professeur` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_secretaire` int(10) UNSIGNED DEFAULT NULL,
  `code_matiere` varchar(100) DEFAULT NULL COMMENT 'code_matiere du prof',
  `nom` varchar(155) DEFAULT NULL,
  `prenom` varchar(155) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(2255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `date_derniere_deconnexion` datetime DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `telephone` bigint(11) DEFAULT NULL,
  `jour` int(11) DEFAULT NULL,
  `mois` varchar(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `first_connexion` int(11) DEFAULT NULL,
  `connecter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ict_professeur`
--

INSERT INTO `ict_professeur` (`id`, `id_secretaire`, `code_matiere`, `nom`, `prenom`, `email`, `password`, `avatar`, `sexe`, `date_derniere_connexion`, `date_derniere_deconnexion`, `date_inscription`, `telephone`, `jour`, `mois`, `annee`, `first_connexion`, `connecter`) VALUES
(1, 1, 'ICT 105', 'prof', 'prof', 'prof@yahoo.com', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', 'tof.jpg', NULL, '2018-09-16 17:39:06', NULL, '2018-09-16 17:17:39', NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ict_secretaire`
--

DROP TABLE IF EXISTS `ict_secretaire`;
CREATE TABLE IF NOT EXISTS `ict_secretaire` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(155) DEFAULT NULL,
  `prenom` varchar(155) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `date_derniere_deconnexion` datetime DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `telephone` bigint(11) DEFAULT NULL,
  `jour` int(11) DEFAULT NULL,
  `mois` varchar(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `first_connexion` int(11) DEFAULT NULL,
  `connecter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ict_secretaire`
--

INSERT INTO `ict_secretaire` (`id`, `nom`, `prenom`, `email`, `password`, `avatar`, `sexe`, `date_derniere_connexion`, `date_derniere_deconnexion`, `date_inscription`, `telephone`, `jour`, `mois`, `annee`, `first_connexion`, `connecter`) VALUES
(1, 'secretaire', 'secretaire', 'secretaire@yahoo.fr', '0a9819b7419168b4b9ab2d8563b5983dc818130f', 'tof.jpg', '', '2018-09-16 17:16:13', '2018-09-16 17:16:13', '2018-09-16 17:16:13', NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(155) DEFAULT NULL,
  `prenom` varchar(155) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(2255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `date_derniere_deconnexion` datetime DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `telephone` bigint(11) DEFAULT NULL,
  `jour` int(11) DEFAULT NULL,
  `mois` varchar(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `first_connexion` int(11) DEFAULT NULL,
  `connecter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `password`, `avatar`, `sexe`, `date_derniere_connexion`, `date_derniere_deconnexion`, `date_inscription`, `telephone`, `jour`, `mois`, `annee`, `first_connexion`, `connecter`) VALUES
(1, 'nguimatio', 'jesbeer', 'jesbeer@yahoo.com', '128522e79081bfe0773bebe3cc16165e0085c9af', 'fond6.jpg', NULL, '2018-09-16 17:20:37', '2018-09-23 15:56:34', '2018-09-16 17:20:31', NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_envoie` int(11) DEFAULT NULL,
  `id_destinataire` int(11) DEFAULT NULL,
  `messages` text,
  `date_reception` datetime DEFAULT NULL,
  `date_envoie` datetime DEFAULT NULL,
  `lu` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `id_envoie`, `id_destinataire`, `messages`, `date_reception`, `date_envoie`, `lu`) VALUES
(1, 3, 2, 'slt , monsieu, je suis nouveau', '2018-09-16 17:41:19', '2018-09-16 17:40:49', 1),
(2, 3, 2, 'comment allez vous?', '2018-09-16 17:41:19', '2018-09-16 17:41:06', 1),
(3, 2, 3, 'je vais bien et toi?', '2018-09-16 17:42:38', '2018-09-16 17:41:12', 1),
(4, 2, 1, 'slt', NULL, '2018-09-16 17:41:21', 0);

-- --------------------------------------------------------

--
-- Structure de la table `notify`
--

DROP TABLE IF EXISTS `notify`;
CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cour` int(11) NOT NULL,
  `id_notifieur` int(11) NOT NULL,
  `id_element` int(11) NOT NULL,
  `date_partage` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notify`
--

INSERT INTO `notify` (`id`, `id_cour`, `id_notifieur`, `id_element`, `date_partage`) VALUES
(1, 37, 1, 1, '2018-09-11 05:46:12'),
(2, 38, 2, 2, '2018-09-16 15:05:09');

-- --------------------------------------------------------

--
-- Structure de la table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `public`
--

DROP TABLE IF EXISTS `public`;
CREATE TABLE IF NOT EXISTS `public` (
  `id_personne` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id unique de cette table',
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id dans les autre table',
  `nom` varchar(155) DEFAULT NULL,
  `prenom` varchar(155) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(2255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `date_derniere_deconnexion` datetime DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `telephone` bigint(11) DEFAULT NULL,
  `jour` int(11) DEFAULT NULL,
  `mois` varchar(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `first_connexion` int(11) DEFAULT NULL,
  `connecter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `public`
--

INSERT INTO `public` (`id_personne`, `id`, `nom`, `prenom`, `email`, `password`, `avatar`, `sexe`, `date_derniere_connexion`, `date_derniere_deconnexion`, `date_inscription`, `telephone`, `jour`, `mois`, `annee`, `first_connexion`, `connecter`) VALUES
(1, 1, 'secretaire', 'secretaire', 'secretaire@yahoo.fr', 'secretaire', 'default.jpg', NULL, '2018-09-16 17:16:13', '2018-09-23 15:56:27', '2018-09-16 17:16:13', NULL, NULL, NULL, NULL, NULL, 0),
(2, 1, 'prof', 'prof', 'prof@yahoo.com', 'prof', 'default.jpg', NULL, '2018-09-16 17:39:06', '2018-09-23 15:56:27', '2018-09-16 17:17:39', NULL, NULL, NULL, NULL, NULL, 0),
(3, 1, 'nguimatio', 'jesbeer', 'jesbeer@yahoo.com', '128522e79081bfe0773bebe3cc16165e0085c9af', 'fond6.jpg', NULL, '2018-09-16 17:20:37', '2018-09-23 15:56:34', '2018-09-16 17:20:31', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reception_message`
--

DROP TABLE IF EXISTS `reception_message`;
CREATE TABLE IF NOT EXISTS `reception_message` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_destinataire` int(10) UNSIGNED NOT NULL,
  `mon_id` int(10) UNSIGNED NOT NULL,
  `accept` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reception_message`
--

INSERT INTO `reception_message` (`id`, `id_destinataire`, `mon_id`, `accept`) VALUES
(1, 2, 3, 1),
(2, 3, 2, 1),
(3, 1, 2, 1),
(4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `voir_pdf`
--

DROP TABLE IF EXISTS `voir_pdf`;
CREATE TABLE IF NOT EXISTS `voir_pdf` (
  `id_membre` int(11) NOT NULL,
  `refus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
