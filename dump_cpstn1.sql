-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.26 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table compostron. bacs_du_site
DROP TABLE IF EXISTS `bacs_du_site`;
CREATE TABLE IF NOT EXISTS `bacs_du_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appartient_site` int(10) unsigned DEFAULT NULL,
  `type_de_bacs` varchar(64) DEFAULT NULL,
  `niveau_de_remplissage` varchar(64) DEFAULT NULL,
  `Commentaires` text,
  PRIMARY KEY (`id`),
  KEY `appartient_site` (`appartient_site`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.bacs_du_site : 8 rows
/*!40000 ALTER TABLE `bacs_du_site` DISABLE KEYS */;
INSERT INTO `bacs_du_site` (`id`, `appartient_site`, `type_de_bacs`, `niveau_de_remplissage`, `Commentaires`) VALUES
	(1, 1, 'Dépôt', '<25%', 'Pour le dépôt de matières VMH & BDS'),
	(2, 1, 'Fermentation', '<25%', '<div><span style="font-size: 11.998px;"><b>Consignes d’utilisation :</b></span></div><div><span style="font-size: 11.998px;">- Lors du retournement dans ce bac,&nbsp;</span>vérifier l\'humidité des matières</div><div><span style="font-size: 11.998px;">- Surveiller la température régulièrement</span></div><div><span style="font-size: 11.998px;">- Après une baisse de température,&nbsp;</span>brasser avec le Brass\'Compost</div><div><div><span style="font-size: 11.998px;">- Ne rien déposer dans ce bac,&nbsp;</span>le compost travaille et se constitue</div><div><span style="font-size: 11.998px;">- Ne pas ouvrir, ne pas arroser</span></div></div>'),
	(3, 1, 'Maturation', '<25%', '<div><span style="font-size: 11.998px;"><b>Consignes d’utilisation :</b></span></div><div><div><span style="font-size: 11.998px;">- Lors du retournement dans ce bac,&nbsp;</span>vérifier l\'humidité des matières</div><div><span style="font-size: 11.998px;">- Vérifier la présence de petits animaux&nbsp;</span>(cloportes, vers rouges)</div></div><div><div><span style="font-size: 11.998px;">- Ne pas brasser</span></div><div><span style="font-size: 11.998px;">- Ne rien déposer dans ce bac,&nbsp;</span>le compost travaille et se constitue</div><div><span style="font-size: 11.998px;">- Ne pas ouvrir, ne pas arroser</span></div></div>'),
	(4, 1, 'Affinage', '<25%', '<div><span style="font-size: 11.998px;"><b>Consignes d’utilisation :</b></span></div><div><div><span style="font-size: 11.998px;">- Laisser reposer plusieurs mois sans y toucher, le compost&nbsp;</span>termine de se fabriquer pour être au meilleur de sa forme !</div><div><span style="font-size: 11.998px;">- Ne pas brasser</span></div><div><span style="font-size: 11.998px;">- Ne rien déposer dans ce bac</span></div><div><span style="font-size: 11.998px;">- Ne pas ouvrir, ne pas arroser</span></div></div>'),
	(5, 5, 'Dépôt', '<25%', 'Pour le dépôt de matières VMH &amp; BDS'),
	(6, 5, 'Fermentation', '<25%', '<div><span style="font-size: 11.998px;"><b>Consignes d’utilisation :</b></span></div><div><span style="font-size: 11.998px;">- Lors du retournement dans ce bac,&nbsp;</span>vérifier l\'humidité des matières</div><div><span style="font-size: 11.998px;">- Surveiller la température régulièrement</span></div><div><span style="font-size: 11.998px;">- Après une baisse de température,&nbsp;</span>brasser avec le Brass\'Compost</div><div><div><span style="font-size: 11.998px;">- Ne rien déposer dans ce bac,&nbsp;</span>le compost travaille et se constitue</div><div><span style="font-size: 11.998px;">- Ne pas ouvrir, ne pas arroser</span></div></div>'),
	(7, 5, 'Maturation', '<25%', '<div><span style="font-size: 11.998px;"><b>Consignes d’utilisation :</b></span></div><div><div><span style="font-size: 11.998px;">- Lors du retournement dans ce bac,&nbsp;</span>vérifier l\'humidité des matières</div><div><span style="font-size: 11.998px;">- Vérifier la présence de petits animaux&nbsp;</span>(cloportes, vers rouges)</div></div><div><div><span style="font-size: 11.998px;">- Ne pas brasser</span></div><div><span style="font-size: 11.998px;">- Ne rien déposer dans ce bac,&nbsp;</span>le compost travaille et se constitue</div><div><span style="font-size: 11.998px;">- Ne pas ouvrir, ne pas arroser</span></div></div>'),
	(8, 5, 'Affinage', '<25%', '<div><span style="font-size: 11.998px;"><b>Consignes d’utilisation :</b></span></div><div><div><span style="font-size: 11.998px;">- Laisser reposer plusieurs mois sans y toucher, le compost&nbsp;</span>termine de se fabriquer pour être au meilleur de sa forme !</div><div><span style="font-size: 11.998px;">- Ne pas brasser</span></div><div><span style="font-size: 11.998px;">- Ne rien déposer dans ce bac</span></div><div><span style="font-size: 11.998px;">- Ne pas ouvrir, ne pas arroser</span></div></div>');
/*!40000 ALTER TABLE `bacs_du_site` ENABLE KEYS */;

-- Listage de la structure de la table compostron. depots
DROP TABLE IF EXISTS `depots`;
CREATE TABLE IF NOT EXISTS `depots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sur_le_site` int(10) unsigned DEFAULT NULL,
  `par_le_membre` int(10) unsigned DEFAULT NULL,
  `dans_le_bac` int(10) unsigned DEFAULT NULL,
  `jour_heure` datetime DEFAULT NULL,
  `qte_vmh` decimal(10,2) DEFAULT NULL,
  `qte_bds` decimal(10,2) DEFAULT NULL,
  `niveau_du_bac` varchar(64) DEFAULT NULL,
  `cree_par` varchar(64) DEFAULT NULL,
  `date_maj` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sur_le_site` (`sur_le_site`),
  KEY `par_le_membre` (`par_le_membre`),
  KEY `dans_le_bac` (`dans_le_bac`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.depots : 3 rows
/*!40000 ALTER TABLE `depots` DISABLE KEYS */;
INSERT INTO `depots` (`id`, `sur_le_site`, `par_le_membre`, `dans_le_bac`, `jour_heure`, `qte_vmh`, `qte_bds`, `niveau_du_bac`, `cree_par`, `date_maj`) VALUES
	(1, 1, NULL, 1, '2020-03-26 09:43:47', 2.00, 3.00, '<25%', 'chrisagon', NULL),
	(2, 5, NULL, 5, '2020-03-26 10:02:13', 2.00, 0.00, '<25%', 'chrisagon', NULL),
	(3, 1, NULL, 1, '2020-03-26 11:26:40', 3.00, NULL, '<25%', 'habitant1', NULL);
/*!40000 ALTER TABLE `depots` ENABLE KEYS */;

-- Listage de la structure de la table compostron. intervention
DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `demande_par` int(10) unsigned DEFAULT NULL,
  `realise_par` int(10) unsigned DEFAULT NULL,
  `pour_site` int(10) unsigned DEFAULT NULL,
  `pour_bac` int(10) unsigned DEFAULT NULL,
  `type_intervention` varchar(64) NOT NULL DEFAULT 'Transfert',
  `description` text,
  `cree_par` varchar(64) DEFAULT NULL,
  `date_maj` timestamp NULL DEFAULT NULL,
  `statut_intervention` varchar(64) NOT NULL DEFAULT 'En attente',
  `field10` varchar(40) DEFAULT NULL,
  `date_demande` datetime DEFAULT NULL,
  `date_realisation` datetime DEFAULT NULL,
  `field11` varchar(40) DEFAULT NULL,
  `field12` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demande_par` (`demande_par`),
  KEY `realise_par` (`realise_par`),
  KEY `pour_site` (`pour_site`),
  KEY `pour_bac` (`pour_bac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.intervention : 0 rows
/*!40000 ALTER TABLE `intervention` DISABLE KEYS */;
/*!40000 ALTER TABLE `intervention` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membership_grouppermissions
DROP TABLE IF EXISTS `membership_grouppermissions`;
CREATE TABLE IF NOT EXISTS `membership_grouppermissions` (
  `permissionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` int(10) unsigned DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) NOT NULL DEFAULT '0',
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`permissionID`),
  UNIQUE KEY `groupID_tableName` (`groupID`,`tableName`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membership_grouppermissions : 24 rows
/*!40000 ALTER TABLE `membership_grouppermissions` DISABLE KEYS */;
INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
	(1, 2, 'site_compostage', 1, 3, 3, 3),
	(2, 2, 'bacs_du_site', 1, 3, 3, 3),
	(3, 2, 'membres', 1, 3, 3, 3),
	(4, 2, 'depots', 1, 3, 3, 3),
	(5, 2, 'transferts', 1, 3, 3, 3),
	(6, 2, 'intervention', 1, 3, 3, 3),
	(28, 3, 'membres', 1, 2, 1, 1),
	(27, 3, 'bacs_du_site', 0, 3, 0, 0),
	(26, 3, 'site_compostage', 0, 3, 0, 0),
	(25, 3, 'depots', 1, 1, 1, 1),
	(34, 4, 'membres', 1, 2, 1, 1),
	(33, 4, 'bacs_du_site', 0, 2, 2, 0),
	(32, 4, 'site_compostage', 0, 3, 2, 0),
	(31, 4, 'depots', 1, 2, 1, 1),
	(19, 5, 'site_compostage', 0, 3, 0, 0),
	(20, 5, 'bacs_du_site', 1, 3, 1, 1),
	(21, 5, 'membres', 0, 3, 1, 0),
	(22, 5, 'depots', 0, 3, 0, 0),
	(23, 5, 'transferts', 1, 2, 2, 1),
	(24, 5, 'intervention', 1, 2, 2, 1),
	(29, 3, 'transferts', 0, 0, 0, 0),
	(30, 3, 'intervention', 0, 0, 0, 0),
	(35, 4, 'transferts', 0, 2, 0, 0),
	(36, 4, 'intervention', 1, 1, 1, 1);
/*!40000 ALTER TABLE `membership_grouppermissions` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membership_groups
DROP TABLE IF EXISTS `membership_groups`;
CREATE TABLE IF NOT EXISTS `membership_groups` (
  `groupID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`groupID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membership_groups : 5 rows
/*!40000 ALTER TABLE `membership_groups` DISABLE KEYS */;
INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
	(1, 'anonymous', 'Anonymous group created automatically on 2020-03-24', 0, 0),
	(2, 'Admins', 'Admin group created automatically on 2020-03-24', 0, 1),
	(3, 'habitants', 'Ce groupe d\'utilisateur ne peut faire que des dépot', 1, 0),
	(4, 'Animateurs', 'Groupe dédié aux animateurs qui encadrent les cantines', 1, 1),
	(5, 'techniciens', 'Groupe des techniciens d\'intervention', 1, 1);
/*!40000 ALTER TABLE `membership_groups` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membership_userpermissions
DROP TABLE IF EXISTS `membership_userpermissions`;
CREATE TABLE IF NOT EXISTS `membership_userpermissions` (
  `permissionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `memberID` varchar(100) NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) NOT NULL DEFAULT '0',
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`permissionID`),
  UNIQUE KEY `memberID_tableName` (`memberID`,`tableName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membership_userpermissions : 0 rows
/*!40000 ALTER TABLE `membership_userpermissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `membership_userpermissions` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membership_userrecords
DROP TABLE IF EXISTS `membership_userrecords`;
CREATE TABLE IF NOT EXISTS `membership_userrecords` (
  `recID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(100) DEFAULT NULL,
  `dateAdded` bigint(20) unsigned DEFAULT NULL,
  `dateUpdated` bigint(20) unsigned DEFAULT NULL,
  `groupID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`recID`),
  UNIQUE KEY `tableName_pkValue` (`tableName`,`pkValue`(150)),
  KEY `pkValue` (`pkValue`),
  KEY `tableName` (`tableName`),
  KEY `memberID` (`memberID`),
  KEY `groupID` (`groupID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membership_userrecords : 16 rows
/*!40000 ALTER TABLE `membership_userrecords` DISABLE KEYS */;
INSERT INTO `membership_userrecords` (`recID`, `tableName`, `pkValue`, `memberID`, `dateAdded`, `dateUpdated`, `groupID`) VALUES
	(1, 'site_compostage', '1', 'chrisagon', 1585070746, 1585125283, 2),
	(2, 'bacs_du_site', '1', 'chrisagon', 1585211790, 1585211790, 2),
	(3, 'bacs_du_site', '2', 'chrisagon', 1585211795, 1585212071, 2),
	(4, 'bacs_du_site', '3', 'chrisagon', 1585212085, 1585212140, 2),
	(5, 'bacs_du_site', '4', 'chrisagon', 1585212158, 1585212182, 2),
	(6, 'depots', '1', 'chrisagon', 1585212255, 1585212255, 2),
	(7, 'site_compostage', '2', 'chrisagon', 1585212486, 1585212486, 2),
	(8, 'site_compostage', '3', 'chrisagon', 1585212511, 1585212583, 2),
	(9, 'site_compostage', '4', 'chrisagon', 1585212608, 1585212656, 2),
	(10, 'site_compostage', '5', 'chrisagon', 1585212701, 1585212750, 2),
	(11, 'bacs_du_site', '5', 'chrisagon', 1585212792, 1585212806, 2),
	(12, 'bacs_du_site', '6', 'chrisagon', 1585212820, 1585212826, 2),
	(13, 'bacs_du_site', '7', 'chrisagon', 1585212836, 1585212843, 2),
	(14, 'bacs_du_site', '8', 'chrisagon', 1585212860, 1585212869, 2),
	(15, 'depots', '2', 'chrisagon', 1585213350, 1585213350, 2),
	(16, 'depots', '3', 'habitant1', 1585218466, 1585218466, 3);
/*!40000 ALTER TABLE `membership_userrecords` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membership_users
DROP TABLE IF EXISTS `membership_users`;
CREATE TABLE IF NOT EXISTS `membership_users` (
  `memberID` varchar(100) NOT NULL,
  `passMD5` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) unsigned DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text,
  `pass_reset_key` varchar(100) DEFAULT NULL,
  `pass_reset_expiry` int(10) unsigned DEFAULT NULL,
  `flags` text,
  PRIMARY KEY (`memberID`),
  KEY `groupID` (`groupID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membership_users : 5 rows
/*!40000 ALTER TABLE `membership_users` DISABLE KEYS */;
INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`, `pass_reset_key`, `pass_reset_expiry`, `flags`) VALUES
	('guest', NULL, NULL, '2020-03-24', 1, 0, 1, NULL, NULL, NULL, NULL, 'Anonymous member created automatically on 2020-03-24', NULL, NULL, NULL),
	('chrisagon', '$2y$10$TOA41pvBqYSy0twiAY30j.Tc5R4.MwQd4YXAnfcaQmFLs/yreZxy6', 'christophe.thomas@fesc.asso.fr', '2020-03-24', 2, 0, 1, NULL, NULL, NULL, NULL, 'Admin member created automatically on 2020-03-24', NULL, NULL, NULL),
	('habitant1', '$2y$10$sLEzs8ojUesuWMdb8cznEe8Edul9K9Y8KwX/bKved3JSkE4qavaUC', 'chrisagon@gmail.com', '2020-03-26', 3, 0, 1, 'Habitant de démo', '', '', '', '', NULL, NULL, NULL),
	('technicien1', '$2y$10$JIRs/F/lLrxsYpVZNEzlreyUlPoeaW0OjJuJfxZ7.8aiaV8FglA3y', 'technicien1@gmail.com', '2020-03-26', 5, 0, 1, 'technicien1 de démo', '', '', '', '', NULL, NULL, NULL),
	('animateur1', '$2y$10$nLsSC/voaDd1..RfRXT.0e.QYMpcczPDgPlQaFJiAT0Rwp5e6qDJG', 'animateur1@gmail.com', '2020-03-26', 4, 0, 1, 'animateur1 de démo', '', '', '', '', NULL, NULL, NULL);
/*!40000 ALTER TABLE `membership_users` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membership_usersessions
DROP TABLE IF EXISTS `membership_usersessions`;
CREATE TABLE IF NOT EXISTS `membership_usersessions` (
  `memberID` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `expiry_ts` int(10) unsigned NOT NULL,
  UNIQUE KEY `memberID_token_agent` (`memberID`,`token`,`agent`),
  KEY `memberID` (`memberID`),
  KEY `expiry_ts` (`expiry_ts`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membership_usersessions : 0 rows
/*!40000 ALTER TABLE `membership_usersessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `membership_usersessions` ENABLE KEYS */;

-- Listage de la structure de la table compostron. membres
DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(64) DEFAULT NULL,
  `prenom` varchar(64) DEFAULT NULL,
  `statut` varchar(64) DEFAULT 'habitant',
  `adresse_du_membre` text,
  `email_membre` varchar(64) DEFAULT NULL,
  `Telephone_membre` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.membres : 0 rows
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;

-- Listage de la structure de la table compostron. site_compostage
DROP TABLE IF EXISTS `site_compostage`;
CREATE TABLE IF NOT EXISTS `site_compostage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_du_site` varchar(64) DEFAULT NULL,
  `acces_au_site` text,
  `type_de_site` varchar(64) DEFAULT NULL,
  `nom_du_responsable` varchar(64) DEFAULT NULL,
  `email_du_responsable` varchar(64) DEFAULT 'adresse@email.com',
  `Telephone_du_responsable` varchar(64) DEFAULT NULL,
  `Commentaires` text,
  `adresse_postale` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.site_compostage : 5 rows
/*!40000 ALTER TABLE `site_compostage` DISABLE KEYS */;
INSERT INTO `site_compostage` (`id`, `nom_du_site`, `acces_au_site`, `type_de_site`, `nom_du_responsable`, `email_du_responsable`, `Telephone_du_responsable`, `Commentaires`, `adresse_postale`) VALUES
	(1, 'Ecole Jean Zay', 'https://www.google.fr/maps/place/Collège+Jean-Zay/@48.963796,2.2791038,17z/data=!4m8!1m2!2m1!1secole+jean+zay+saint+gratien+95210!3m4!1s0x0:0x573e863a0016a6be!8m2!3d48.9636367!4d2.279704', 'Ecole', 'Christophe THOMAS', 'adresse@email.com', NULL, 'Ce site est réservé à la cantine de l\'école', NULL),
	(2, 'Ecole Raymond Logeais', 'https://www.google.fr/maps/place/96+Rue+du+Général+Leclerc,+95210+Saint-Gratien/@48.9641955,2.2922297,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6689a35a31261:0x7d5968bde319d68d!8m2!3d48.9641955!4d2.2944184', 'Ecole', 'Alfred Logeais', 'adresse@email.com', NULL, '<br>', '96 rue du Général Leclerc 95210 Saint Gratien'),
	(3, 'Ecole Pauline Kergomard', 'https://www.google.fr/maps/place/18+Rue+Parmentier,+95210+Saint-Gratien/@48.9683232,2.2782937,17z/data=!3m1!4b1!4m5!3m4!1s0x47e66626000e4ccf:0xc239b70faa4cd99!8m2!3d48.9683232!4d2.2804824', 'Ecole', 'Pauline Compostron', 'adresse@email.com', NULL, '<br>', '18 rue Parmentier 95210 Saint Gratien'),
	(4, 'Ecole Jules Ferry', 'https://www.google.fr/maps/place/5+Avenue+de+Catinat,+95210+Saint-Gratien/@48.970262,2.2867423,17z/data=!3m1!4b1!4m5!3m4!1s0x47e66882fda7a5c3:0x1a041c54577569ba!8m2!3d48.970262!4d2.288931', 'Ecole', 'Jules Compostron', 'adresse@email.com', NULL, '<br>', '5 avenue Catinat 95210 Saint Gratien'),
	(5, 'Ecole Jean Sarrailh', 'https://www.google.fr/maps/place/33+Rue+des+Raguenets,+95210+Saint-Gratien/@48.961079,2.2844515,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6689e31f05261:0x47aa1b05e6e90c0c!8m2!3d48.961079!4d2.2866402', 'Ecole', 'Jean Compostron', 'adresse@email.com', NULL, '<br>', '33 rue des Raguenets 95210 Saint Gratien');
/*!40000 ALTER TABLE `site_compostage` ENABLE KEYS */;

-- Listage de la structure de la table compostron. transferts
DROP TABLE IF EXISTS `transferts`;
CREATE TABLE IF NOT EXISTS `transferts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sur_le_site` int(10) unsigned DEFAULT NULL,
  `par_le_membre` int(10) unsigned DEFAULT NULL,
  `jour_heure` datetime DEFAULT NULL,
  `du_bac` varchar(64) DEFAULT NULL,
  `vers_bac` varchar(64) DEFAULT NULL,
  `quantite` decimal(10,2) DEFAULT NULL,
  `cree_par` varchar(64) DEFAULT NULL,
  `date_maj` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sur_le_site` (`sur_le_site`),
  KEY `par_le_membre` (`par_le_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Listage des données de la table compostron.transferts : 0 rows
/*!40000 ALTER TABLE `transferts` DISABLE KEYS */;
/*!40000 ALTER TABLE `transferts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
