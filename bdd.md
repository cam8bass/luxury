// === Create user table ===

CREATE TABLE `luxury`.`user` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);


// === Create session table ===

CREATE TABLE `luxury`.`session` (
  `idsession` INT NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idsession`));

// === Event clean table ===

ALTER TABLE yourDatabaseName.session ADD createdAt timestamp DEFAULT CURRENT_TIMESTAMP
CREATE EVENT ClearExpiredSessions
ON SCHEDULE EVERY 1 DAY
COMMENT 'Nettoie la table session tous les jours'
DO
DELETE FROM yourDatabaseName.session WHERE DATE_ADD(createdAt, INTERVAL 2 WEEK) < NOW();

// === Create ad table ===

CREATE TABLE `luxury`.`ad` (
  `idAd` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(45) NOT NULL,
  `img` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `area` INT NOT NULL,
  `room` INT NOT NULL,
  `price` INT NOT NULL,
  `location` VARCHAR(45) NOT NULL,
  `description` LONGTEXT NOT NULL,
  PRIMARY KEY (`idAd`));