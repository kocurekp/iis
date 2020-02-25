-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 02. pro 2019, 23:25
-- Verze serveru: 5.6.40
-- Verze PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databáze: `xnacar00`
--
CREATE DATABASE IF NOT EXISTS `xnacar00` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `xnacar00`;

-- --------------------------------------------------------

--
-- Struktura tabulky `Comment`
--

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE IF NOT EXISTS `Comment` (
  `ID_comment` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `ID_ticket` int(11) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_comment`),
  KEY `ID_ticket` (`ID_ticket`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=59 ;

--
-- Vypisuji data pro tabulku `Comment`
--

-- INSERT INTO `Comment` (`ID_comment`, `description`, `ID_ticket`, `ID_user`, `ts_create`) VALUES
-- (1, 'this is a comment', 29, 1, '2019-11-28 19:55:50');

-- --------------------------------------------------------

--
-- Struktura tabulky `Image`
--

DROP TABLE IF EXISTS `Image`;
CREATE TABLE IF NOT EXISTS `Image` (
  `ID_image` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=52 ;

--
-- Vypisuji data pro tabulku `Image`
--

-- INSERT INTO `Image` (`ID_image`, `ticket_name`, `name`, `image`) VALUES
-- (28, '96336525', 'man-fakes-death-cat-q6u_2z9w.png', '../upload/man-fakes-death-cat-q6u_2z9w.png');


-- --------------------------------------------------------

--
-- Struktura tabulky `Product`
--

DROP TABLE IF EXISTS `Product`;
CREATE TABLE IF NOT EXISTS `Product` (
  `ID_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=23 ;

--
-- Vypisuji data pro tabulku `Product`
--

-- INSERT INTO `Product` (`ID_product`, `name`, `description`, `ID_user`) VALUES
-- (2, 'nwname', '7', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `Task`
--

DROP TABLE IF EXISTS `Task`;
CREATE TABLE IF NOT EXISTS `Task` (
  `ID_task` int(11) NOT NULL AUTO_INCREMENT,
  `real_time` varchar(5) COLLATE utf8_czech_ci NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `estm_time` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `state` tinyint(1) DEFAULT '1',
  `ID_ticket` int(11) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_task`),
  KEY `ID_user` (`ID_user`),
  KEY `ID_ticket` (`ID_ticket`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=45 ;

--
-- Vypisuji data pro tabulku `Task`
--

-- INSERT INTO `Task` (`ID_task`, `real_time`, `description`, `estm_time`, `state`, `ID_ticket`, `ID_user`) VALUES
-- (33, '0', 'kokotina', '4 hod', 1, 49, 4);


-- --------------------------------------------------------

--
-- Struktura tabulky `Ticket`
--

DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE IF NOT EXISTS `Ticket` (
  `ID_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `state` tinyint(1) DEFAULT '1',
  `description` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ticket`),
  KEY `ID_user` (`ID_user`),
  KEY `ID_product` (`ID_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=133 ;

--
-- Vypisuji data pro tabulku `Ticket`
--

-- INSERT INTO `Ticket` (`ID_ticket`, `name`, `state`, `description`, `ID_user`, `ID_product`) VALUES
-- (1, 'ticket', 1, 'desc', NULL, NULL);

-- -- --------------------------------------------------------

--
-- Struktura tabulky `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=23 ;

--
-- Vypisuji data pro tabulku `User`
--

INSERT INTO `User` (`ID_user`, `username`, `password`, `role`) VALUES
(3, 'zakaznik', '$2y$10$5qst1/hsB9TTmVI2t9Q2b.3sTle5usGo2OmeiLuHXV8pfev18t1P2', 0),
(4, 'zakaznik2', '$2y$10$5qst1/hsB9TTmVI2t9Q2b.3sTle5usGo2OmeiLuHXV8pfev18t1P2', 1),
(5, 'x', '$2y$10$CJTaPF/9pDbv2IkDffFSaOErupE79gbsQCTAheKnA9zjHFg1cqetC', 4),
(18, 'manager', '$2y$10$LdTCnLPNcJohJTJjdUaBCelzpTDicGt0NRXwYLvbFWZnMHlA7KbFS', 2),
(19, 'vedouci', '$2y$10$02zdrD8c.E38w5H3BUf3EO.8MNOwqA./B1Ft4yjv8L3HetnYRcQMG', 3),
(20, 'frajer', '$2y$10$9jazrAsqKe7zyCmqrgwEmetkRMTxRxowdgxaVHhm8B2kDSYSWDcsS', 0),
(21, 'jezisek', '$2y$10$i.8/xbBLeHEzG7GY2wvuUu6RBoKaRJY7LZroRo9/c9KdsI.e4nPyu', 4)

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`ID_ticket`) REFERENCES `Ticket` (`ID_ticket`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Comment_ibfk_3` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Comment_ibfk_4` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Comment_ibfk_5` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`);

--
-- Omezení pro tabulku `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `Task_ibfk_1` FOREIGN KEY (`ID_ticket`) REFERENCES `Ticket` (`ID_ticket`),
  ADD CONSTRAINT `Task_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Task_ibfk_3` FOREIGN KEY (`ID_ticket`) REFERENCES `Ticket` (`ID_ticket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `Ticket_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Ticket_ibfk_2` FOREIGN KEY (`ID_product`) REFERENCES `Product` (`ID_product`),
  ADD CONSTRAINT `Ticket_ibfk_3` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Ticket_ibfk_4` FOREIGN KEY (`ID_product`) REFERENCES `Product` (`ID_product`),
  ADD CONSTRAINT `Ticket_ibfk_5` FOREIGN KEY (`ID_product`) REFERENCES `Product` (`ID_product`);
