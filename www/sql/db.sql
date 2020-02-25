DROP DATABASE db;
CREATE DATABASE db;
USE db;

DROP USER IF EXISTS ''admin''@''localhost'';
CREATE USER ''admin''@''localhost'' IDENTIFIED BY ''password'';
GRANT ALL ON `db`.* TO ''admin''@''localhost'';

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `Task`;
DROP TABLE IF EXISTS `Product`;
DROP TABLE IF EXISTS `Ticket`;
DROP TABLE IF EXISTS `Comment`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `User` (
  `ID_user`		INT NOT NULL AUTO_INCREMENT,
  `username` 		varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `password` 	varchar(60) COLLATE latin2_czech_cs NOT NULL,
  `role` 		int(1) NOT NULL,
  PRIMARY KEY (`ID_user`)
);

CREATE TABLE `Task` (
	`ID_task`		INT NOT NULL AUTO_INCREMENT,
	`time` 			DATETIME NOT NULL,
	`description` 	varchar(500) COLLATE latin2_czech_cs NOT NULL,
	`estm_time` 	DATETIME NOT NULL,
	`state` 		BOOLEAN DEFAULT 1,
	PRIMARY KEY (`ID_task`)
);

CREATE TABLE `Product` (
	`ID_product`	INT NOT NULL AUTO_INCREMENT,
	`name` 			varchar(50) COLLATE latin2_czech_cs NOT NULL,
	`description` 	varchar(500) COLLATE latin2_czech_cs NOT NULL,
	PRIMARY KEY (`ID_product`)
);

CREATE TABLE `Ticket` (
	`ID_ticket`	INT NOT NULL AUTO_INCREMENT,
	`name` 		varchar(50) COLLATE latin2_czech_cs NOT NULL,
	`state` 	BOOLEAN DEFAULT 1, -- stav jestli je tiket vyřízený
	`description` 	varchar(500) COLLATE latin2_czech_cs NOT NULL,
    `ID_user`		INT NOT NULL,
	PRIMARY KEY (`ID_ticket`),
	FOREIGN KEY (`ID_user`) REFERENCES User(`ID_user`)
);

CREATE TABLE `Comment` (
	`ID_comment`	INT NOT NULL AUTO_INCREMENT,
	`description` 	varchar(500) COLLATE latin2_czech_cs NOT NULL,
	PRIMARY KEY (`ID_comment`)
);

-- ALTER TABLE `Ticket`
-- ADD `UserTicket` INT Unsigned not null
-- ADD FOREIGN KEY `UserTicket` REFERENCES `User` (`ID_user`);

-- ALTER TABLE `Ticket` ADD ''ID_product''
-- ALTER TABLE `Ticket` ADD FOREIGN KEY (`ID_user`)
-- REFERENCES `User`(`ID_user`)
-- ON DELETE RESTRICT ON UPDATE RESTRICT;

