CREATE TABLE `u223495013_luxury`.`user` (
`idUser` INT NOT NULL AUTO_INCREMENT,
`firstName` VARCHAR(45) NOT NULL,
`lastName` VARCHAR(45) NOT NULL,
`email` VARCHAR(255) NOT NULL,
`password` VARCHAR(255) NOT NULL,
PRIMARY KEY (`idUser`),
UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);

CREATE TABLE `u223495013_luxury`.`session` (
`idsession` CHAR(64) NOT NULL,
`idUser` INT NOT NULL,
PRIMARY KEY (`idsession`));

CREATE TABLE `u223495013_luxury`.`ad` (
`idAd` INT NOT NULL AUTO_INCREMENT,
`status` VARCHAR(45) NOT NULL,
`img` VARCHAR(255) NOT NULL,
`title` VARCHAR(45) NOT NULL,
`area` VARCHAR(45) NOT NULL,
`room` VARCHAR(45) NOT NULL,
`price` VARCHAR(45) NOT NULL,
`location` VARCHAR(45) NOT NULL,
`description` LONGTEXT NOT NULL,
PRIMARY KEY (`idAd`));

ALTER TABLE u223495013_luxury.session ADD createdAt timestamp DEFAULT CURRENT_TIMESTAMP
CREATE EVENT ClearExpiredSessions
ON SCHEDULE EVERY 1 DAY
COMMENT 'Nettoie la table session tous les jours'
DO
DELETE FROM u223495013_luxury.session WHERE DATE_ADD(createdAt, INTERVAL 2 WEEK) < NOW();