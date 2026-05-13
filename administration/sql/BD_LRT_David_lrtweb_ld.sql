  -- phpMyAdmin SQL Dump
  -- version 5.2.0
  -- https://www.phpmyadmin.net/
  --
  -- Hôte : localhost
  -- Généré le : mar. 18 fév. 2025 à 05:19
  -- Version du serveur : 10.5.15-MariaDB-0+deb11u1
  -- Version de PHP : 8.1.8

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Base de données : `LRT_David`
  --

  -- --------------------------------------------------------

  --
  -- Structure de la table `Utilisateurs`
  --
CREATE TABLE IF NOT EXISTS Utilisateurs (
    `libelle` INT AUTO_INCREMENT,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `id` VARCHAR(50) NOT NULL,
    `motdepasse` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;  --
  -- Déchargement des données de la table `Utilisateurs`
  --
  INSERT INTO `Utilisateurs` (`libelle`, `nom`, `prenom`, `id`, `motdepasse`) 
  VALUES (NULL, "cocanalp", "jean-marc", 'jm.Cocanalp%2', SHA1('12-Soleil&BOLRT'));
  -- Structure de la table `categorieAge`
  --

  CREATE TABLE `categorieAge` (
    `code` varchar(3) NOT NULL,
    `libelle` varchar(25) DEFAULT NULL,
    `ageDebut` smallint(6) DEFAULT NULL,
    `ageFin` smallint(6) DEFAULT NULL,
    PRIMARY KEY (`code`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Déchargement des données de la table `categorieAge`
  --

  INSERT INTO `categorieAge` (`code`, `libelle`, `ageDebut`, `ageFin`) VALUES
  ('JUF', 'Junior Femme', 18, 19),
  ('JUM', 'Junior Homme', 18, 19),
  ('SEF', 'Sénior Femme', 20, 39),
  ('SEM', 'Sénior Homme', 20, 39),
  ('VEF', 'Vétéran Femme', 40, 99),
  ('VEM', 'Vétéran Homme', 40, 99);

  -- --------------------------------------------------------

  --
  -- Structure de la table `club`
  --

  CREATE TABLE `club` (
    `code` varchar(8) NOT NULL,
    `nom` varchar(40) DEFAULT NULL,
    `adresseRue` varchar(100) DEFAULT NULL,
    `codePostal` char(5) DEFAULT NULL,
    `ville` varchar(50) DEFAULT NULL,
    `nomPresident` varchar(50) DEFAULT NULL,
    `numTelephone` char(10) DEFAULT NULL,
    `mail` varchar(100) DEFAULT NULL,
    `urlSiteWeb` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`code`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Déchargement des données de la table `club`
  --

  INSERT INTO `club` (`code`, `nom`, `adresseRue`, `codePostal`, `ville`, `nomPresident`, `numTelephone`, `mail`, `urlSiteWeb`) VALUES
  ('974ASTSP', 'AS Triathlon Saint-Pierre', '32 Avenue Stanislas', '97410', 'SAINT-PIERRE', 'Henri HOARAU', '0262458791', 'astriathlonSP@gmail.com', 'http://www.AS-Triathlon-Saint-Pierre.org'),
  ('974BNT', 'Bois-de-Nèfles Triathlon', '71 Route du piton BDN', '97490', 'SAINT-DENIS', 'Laurent BEGUE', '0692114477', 'bdntriathlon@gmail.com', 'http://www.bdntriathlon.re'),
  ('974CAC', 'Club Aquatique du Chaudron', '3 rue Frédéric de Salm', '97490', 'SAINT-DENIS', 'Marie BENEDIK', '0692409132', 'cac-chadron@orange.fr', 'http://cactriathlon-reunion.com'),
  ('974CNPO', 'Club Nautique de la Possession', '9 rue de la Naux', '97419', 'LA POSSESSION', 'Jean SAVIGNOL', '0692205122', 'cnpo.nautiquen@gmail.com', NULL),
  ('974CTPB', 'Club Triathlon de Bras Panon', '6 impasse Bellevue', '97412', 'BRAS-PANON', 'Kevin HOARAU', '0262809132', 'ctpb@gmail.com', NULL),
  ('974LTC', 'LTC Saint-Leu', '18 rue Roncevaux', '97416', 'SAINT-LEU', 'Jean-Pierre MARRAND', '0692109112', 'leu-triathlon@gmail.com', 'https://leu-traithlon.re'),
  ('974TCSA', 'Triathlon Club de Saint-André', '10 allée des gormets', '97440', 'SAINT-ANDRE', 'Sarah SULLY', '0262503102', 'tcsa@yahoo.fr', 'http://tcsa-97440.re'),
  ('974TCSD', 'Triathlon Club de Saint-Denis', '26 rue Edouard Deligny', '97400', 'SAINT-DENIS', 'Laura MOUSSET', '0693307102', 'tcsdsaintdenis@free.fr', 'https://facebook.com/tcsdsaintdenis/'),
  ('974USTT', 'UST Tampon', '12 Avenue de la République', '97430', 'LE TAMPON', 'David FONT', '0692862016', 'ust-tampon@free.fr', NULL);

  -- --------------------------------------------------------

  --
  -- Structure de la table `ddeInformation`
  --

  CREATE TABLE `ddeInformation` (
    `numTriathlon` smallint(6) NOT NULL,
    `idTriathlete` smallint(6) NOT NULL,
    `dateDde` date DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  -- --------------------------------------------------------

  --
  -- Structure de la table `triathlete`
  --

  CREATE TABLE `triathlete` (
    `id` smallint(6) NOT NULL,
    `numLicence` varchar(10) DEFAULT NULL,
    `nom` varchar(25) DEFAULT NULL,
    `prenom` varchar(25) DEFAULT NULL,
    `genre` char(1) DEFAULT NULL,
    `adresseRue` varchar(100) DEFAULT NULL,
    `codePostal` char(5) DEFAULT NULL,
    `ville` varchar(50) DEFAULT NULL,
    `dateNaissance` date DEFAULT NULL,
    `mail` varchar(100) DEFAULT NULL,
    `codeClub` varchar(8) DEFAULT NULL,
    `codeCategorie` varchar(3) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Déchargement des données de la table `triathlete`
  --

  INSERT INTO `triathlete` (`id`, `numLicence`, `nom`, `prenom`, `genre`, `adresseRue`, `codePostal`, `ville`, `dateNaissance`, `mail`, `codeClub`, `codeCategorie`) VALUES
  (1, 'L974-24001', 'BETTE', 'Emma', 'F', '77 Avenue du Général Ch de Gaulle', '97416', 'SAINT-LEU', '2001-10-08', 'emma.bette@gmail.com', '974LTC', 'SEF'),
  (2, 'L974-24002', 'BENNIE', 'Julie', 'F', '15 rue de Marsannay', '97440', 'SAINT-ANDRE', '2002-09-29', 'juju.bennie@gmail.com', '974TCSA', 'SEF'),
  (3, 'L974-24003', 'BENNIE', 'Sylvain', 'M', '29 rue Constant Piérrot', '97490', 'SAINTE-CLOTILDE', '2005-07-02', 'sylvainben275.bette@gmail.com', '974CAC', 'JUM'),
  (4, 'L974-24004', 'AUDILE', 'Nancy', 'F', '10 Rue du Chintre', '97400', 'SAINT-DENIS', '1988-11-12', 'nancyodile974@gmail.com', '974TCSD', 'SEF'),
  (5, 'L974-24005', 'GUYANT', 'Jean-yves', 'M', '5 rue des Champ Moreaux', '97490', 'SAINTE-CLOTILDE', '1987-02-09', 'jean-yves.guyant@gmail.com', '974CAC', 'SEM'),
  (6, 'L974-24006', 'ALLONS', 'Kévin', 'M', '52 rue Montchapet', '97419', 'LA POSSESSION', '1999-12-10', 'allons.kevin@gmail.com', '974CNPO', 'SEM'),
  (7, 'L974-24007', 'JANNE', 'Andréa', 'F', '12 rue Michel Servet', '97440', 'SAINT-ANDRE', '1977-10-09', 'andreajanne@gmail.com', '974TCSA', 'VEF'),
  (8, 'L974-24008', 'CORTE', 'Marie', 'F', '1 rue de la Renardière', '97400', 'SAINT-DENIS', '2003-06-01', 'marie-elie.corte@gmail.com', '974TCSD', 'SEF'),
  (9, 'L974-24009', 'KOPE', 'Paul', 'M', '4 Boulevard Pierre de Coubertin', '97416', 'SAINT-LEU', '1966-12-03', 'paul.koppe@gmail.com', '974LTC', 'VEM'),
  (10, 'L974-24010', 'GUIMOT', 'Jean', 'M', '34 rue de la Bergerie', '97400', 'SAINT-DENIS', '1978-07-16', 'jean-marie.guimot@gmail.com', '974TCSD', 'VEM'),
  (11, 'L974-24011', 'DOPE', 'Isabelle', 'F', 'Place Paul Langevin', '97400', 'SAINT-DENIS', '1978-04-23', 'isadope974@gmail.com', '974TCSD', 'VEF'),
  (12, 'L974-24012', 'DEMANT', 'Gilles', 'M', '12 rue de l\'Arquebuse', '97400', 'SAINT-DENIS', '1975-12-12', 'gillles.demant@gmail.com', '974TCSD', 'VEM'),
  (13, 'L974-24013', 'LABORY', 'Luc', 'M', '20 rue du 8 mai 1945', '97440', 'SAINT-ANDRE', '2004-01-09', 'luclabory@gmail.com', '974TCSA', 'SEM'),
  (14, 'L974-24014', 'GONTIER', 'Louis', 'M', '15 avenue de la libération', '97490', 'SAINTE-CLOTILDE', '1962-06-14', 'louisgtier@gmail.com', '974CAC', 'VEM'),
  (15, 'L974-24015', 'LOUMI', 'Samuel', 'M', '36 Rue Saint-Georges', '97416', 'PITON SAINT-LEU', '2004-06-30', 'samuelloumi@gmail.com', '974LTC', 'JUM'),
  (16, 'L974-24016', 'ROY', 'Jean', 'M', '1 rue de la Croisette', '97400', 'SAINT-DENIS', '1990-05-15', 'jean-marie.roy@gmail.com', '974TCSD', 'SEM'),
  (17, 'L974-24017', 'LAVOIE', 'Marine', 'F', '67 route des Thibourins', '97440', 'SAINT-ANDRE', '2005-04-05', 'marine.lavoiegmail.com', '974TCSA', 'JUF'),
  (18, 'L974-24018', 'PELLETIER', 'Léa', 'F', '17 Place de la liberté', '97419', 'LA POSSESSION', '1972-06-07', 'leafelletierpro@gmail.com', '974CNPO', 'VEF'),
  (19, 'L974-24019', 'LEBLANC', 'Sacha', 'M', '19 avenue Yver', '97490', 'SAINTE-CLOTILDE', '1958-11-04', 'sacha.leblanc@gmail.com', '974CAC', 'VEM'),
  (20, 'L974-24020', 'GIRARD', 'Nathan', 'M', '23 avenue de l\'Europe', '97412', 'BRAS-PANON', '1985-04-24', 'nathan.gigard974@gmail.com', '974CTPB', 'SEM'),
  (21, 'L974-24021', 'LECLERC', 'Clhoé', 'F', '4 grande rue', '97400', 'SAINT-DENIS', '1982-10-30', 'cloleclerc@gmail.com', '974TCSD', 'VEF'),
  (22, 'L974-24022', 'POIRIER', 'Alice', 'F', '100 rue de la république', '97440', 'SAINT-ANDRE', '2000-04-21', 'alice.poirier@gmail.com', '974TCSA', 'SEF'),
  (23, 'L974-24023', 'FOURNIER', 'Nina', 'F', '5 rue de Beaumont', '97419', 'LA POSSESSION', '1986-12-01', 'ninaF974@gmail.com', '974CNPO', 'SEF'),
  (24, 'L974-24024', 'CLOUTIER', 'Bastien', 'M', '18 route de Sanvignes', '97412', 'BRAS-PANON', '2004-03-21', 'cloutier.bastien@gmail.com', '974CTPB', 'JUM'),
  (25, 'L974-24025', 'POULIN', 'Laura', 'F', '31 rue Saint-Georges', '97419', 'LA POSSESSION', '2005-06-15', 'lauraPoulin@gmail.com', '974CNPO', 'JUF'),
  (26, 'L974-24026', 'MARTEL', 'Paul', 'M', '6 rue Claude Debussy', '97440', 'SAINT-ANDRE', '1982-08-26', 'paulMartel@gmail.com', '974TCSA', 'SEM'),
  (27, 'L974-24027', 'BERNIER', 'Agathe', 'F', '17 Place de la Liberté', '97416', 'SAINT-LEU', '2003-10-30', 'bernier.Agathe@gmail.com', '974LTC', 'SEF'),
  (28, 'L974-24028', 'BEGUE', 'Justine', 'F', 'Avenue Front de mer', '97410', 'Saint-Pierre', '2005-01-17', 'begue.just@gmail.com', '974ASTSP', 'JUF'),
  (29, 'L974-24029', 'GILBERT', 'Hubert', 'M', '120 Rue du Four à Chaux', '97410', 'Saint-Pierre', '2003-12-12', 'gilbert.hubert@gmail.com', '974ASTSP', 'SEM'),
  (30, 'L974-24030', 'JULLIEN', 'Hanissa', 'F', '25 rue Saint-Expédit', '97410', 'Saint-Pierre', '1999-05-04', 'hanissaje@gmail.com', '974ASTSP', 'SEF'),
  (31, 'L974-24031', 'DUPOND', 'Martin', 'M', '22 Impasse Jean Moulin', '97430', 'Le Tampon', '1990-01-21', 'dupondmartin@gmail.com', '974USTT', 'SEM'),
  (32, 'L974-24032', 'JOUBERT', 'Louise', 'F', '134 Chemin Adam de Villiers', '97430', 'Le Tampon', '2004-10-14', 'joubertl@gmail.com', '974USTT', 'SEF');

  -- --------------------------------------------------------

  --
  -- Structure de la table `triathlon`
  --

  CREATE TABLE `triathlon` (
    `numero` smallint(6) NOT NULL,
    `nom` varchar(50) DEFAULT NULL,
    `typeTriathlon` varchar(50) DEFAULT NULL,
    `lieu` varchar(100) DEFAULT NULL,
    `dateTriathlon` date DEFAULT NULL,
    `clubOrga` varchar(8) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Déchargement des données de la table `triathlon`
  --

  INSERT INTO `triathlon` (`numero`, `nom`, `typeTriathlon`, `lieu`, `dateTriathlon`, `clubOrga`) VALUES
  (1, 'Triathlon des plaines', 'M', 'Plaines des cafres', '2024-08-12', '974CTPB'),
  (2, 'Triathlon Romaric', 'S', 'la plaine Saint-Paul', '2024-12-10', '974CNPO'),
  (3, 'Fèt Kaf Triathlon', 'XS', 'Saint-Denis', '2024-12-20', '974CAC'),
  (4, 'Triathlon vert Lagon', 'XS', 'Saint-Gilles', '2025-02-26', '974TCSD'),
  (5, 'Triathlon de Salazie', 'S', 'Bras Panon', '2025-03-12', '974CTPB'),
  (6, 'Triathlon des salines', 'S', 'Saint-Leu', '2025-04-23', '974LTC'),
  (7, 'Triathlon du Colosse', 'S', 'Saint-André', '2025-05-14', '974TCSA');
  
  CREATE TABLE `sponsor` (
    `id` smallint(6) NOT NULL,
    `nom` varchar(50) DEFAULT NULL,
    `cheminLogo` varchar(100) DEFAULT NULL,
    `idCompetition` smallint(6) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Déchargement des données de la table `triathlon`
  --

  INSERT INTO `sponsor` (`numero`, `nom`, `typeTriathlon`, `lieu`, `dateTriathlon`, `clubOrga`) VALUES
  (1, 'Triathlon des plaines', 'M', 'Plaines des cafres', '2024-08-12', '974CTPB'),
  (2, 'Triathlon Romaric', 'S', 'la plaine Saint-Paul', '2024-12-10', '974CNPO'),
  (3, 'Fèt Kaf Triathlon', 'XS', 'Saint-Denis', '2024-12-20', '974CAC'),
  (4, 'Triathlon vert Lagon', 'XS', 'Saint-Gilles', '2025-02-26', '974TCSD'),
  (5, 'Triathlon de Salazie', 'S', 'Bras Panon', '2025-03-12', '974CTPB'),
  (6, 'Triathlon des salines', 'S', 'Saint-Leu', '2025-04-23', '974LTC'),
  (7, 'Triathlon du Colosse', 'S', 'Saint-André', '2025-05-14', '974TCSA');

  CREATE TABLE `competition` (
    `code` smallint(6) NOT NULL,
    `nom` varchar(50) DEFAULT NULL,
    -- `dateDebut` date DEFAULT,
    `ville` varchar(50) DEFAULT NULL,
    `idEnregistrement` smallint(6) DEFAULT NULL,
    `idClub` smallint(6) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Déchargement des données de la table `triathlon`
  --

  INSERT INTO `competition` (`code`, `nom`, `typeTriathlon`, `lieu`, `dateTriathlon`, `clubOrga`) VALUES
  (1, 'Triathlon des plaines', 'M', 'Plaines des cafres', '2024-08-12', '974CTPB'),
  (2, 'Triathlon Romaric', 'S', 'la plaine Saint-Paul', '2024-12-10', '974CNPO'),
  (3, 'Fèt Kaf Triathlon', 'XS', 'Saint-Denis', '2024-12-20', '974CAC'),
  (4, 'Triathlon vert Lagon', 'XS', 'Saint-Gilles', '2025-02-26', '974TCSD'),
  (5, 'Triathlon de Salazie', 'S', 'Bras Panon', '2025-03-12', '974CTPB'),
  (6, 'Triathlon des salines', 'S', 'Saint-Leu', '2025-04-23', '974LTC'),
  (7, 'Triathlon du Colosse', 'S', 'Saint-André', '2025-05-14', '974TCSA');

  --
  -- Index pour les tables déchargées
  --

  --
  -- Index pour la table `Utilisateurs`
  --
  -- ALTER TABLE `Utilisateurs`
  --   ADD PRIMARY KEY (`libelle`);
  -- --
  -- -- Index pour la table `categorieAge`
  -- --
  -- ALTER TABLE `categorieAge`
  --   ADD PRIMARY KEY (`code`);

  -- --
  -- -- Index pour la table `club`
  -- --
  -- ALTER TABLE `club`
  --   ADD PRIMARY KEY (`code`);

  --
  -- Index pour la table `ddeInformation`
  --
  ALTER TABLE `ddeInformation`
    ADD PRIMARY KEY (`numTriathlon`,`idTriathlete`),
    ADD KEY `ddeInfoTriathleteFK` (`idTriathlete`);

  --
  -- Index pour la table `triathlete`
  --
  ALTER TABLE `triathlete`
    ADD PRIMARY KEY (`id`),
    ADD KEY `triatheteClubFK` (`codeClub`),
    ADD KEY `triathleteCategFK` (`codeCategorie`);

  --
  -- Index pour la table `triathlon`
  --
  ALTER TABLE `triathlon`
    ADD PRIMARY KEY (`numero`),
    ADD KEY `triathlonClubFK` (`clubOrga`);

  --
  -- AUTO_INCREMENT pour les tables déchargées
  --

  --
  -- AUTO_INCREMENT pour la table `triathlete`
  --
  ALTER TABLE `triathlete`
    MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

  --
  -- AUTO_INCREMENT pour la table `triathlon`
  --
  ALTER TABLE `triathlon`
    MODIFY `numero` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

  --
  -- Contraintes pour les tables déchargées
  --

  --
  -- Contraintes pour la table `ddeInformation`
  --
  ALTER TABLE `ddeInformation`
    ADD CONSTRAINT `ddeInfoTriathleteFK` FOREIGN KEY (`idTriathlete`) REFERENCES `triathlete` (`id`),
    ADD CONSTRAINT `ddeInfoTriathlonFK` FOREIGN KEY (`numTriathlon`) REFERENCES `triathlon` (`numero`);

  --
  -- Contraintes pour la table `triathlete`
  --
  ALTER TABLE `triathlete`
    ADD CONSTRAINT `triatheteClubFK` FOREIGN KEY (`codeClub`) REFERENCES `club` (`code`),
    ADD CONSTRAINT `triathleteCategFK` FOREIGN KEY (`codeCategorie`) REFERENCES `categorieAge` (`code`);

  --
  -- Contraintes pour la table `triathlon`
  --
  ALTER TABLE `triathlon`
    ADD CONSTRAINT `triathlonClubFK` FOREIGN KEY (`clubOrga`) REFERENCES `club` (`code`);
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
