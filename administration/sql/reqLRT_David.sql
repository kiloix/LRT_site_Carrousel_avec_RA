-- DROP TABLE Utilisateurs;
CREATE TABLE IF NOT EXISTS Utilisateurs (
   libelle int  AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    id VARCHAR(50) NOT NULL,
	motdepasse varchar(50) NOT NULL,
	CONSTRAINT pk_utilisateurs PRIMARY KEY (libelle)
)ENGINE='InnoDB' DEFAULT CHARSET='UTF8MB4';
	INSERT INTO Utilisateurs VALUES (NULL, cocanalp, jean-marc, 'jm.Cocanalp%2', SHA1('12-Soleil&BOLRT'));




