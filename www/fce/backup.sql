-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pát 29. lis 2019, 12:59
-- Verze serveru: 5.6.40
-- Verze PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databáze: `xnacar00`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `Task`
--

CREATE TABLE IF NOT EXISTS `Task` (
  `ID_task` int(11) NOT NULL AUTO_INCREMENT,
  `real_time` varchar(5) COLLATE utf8_czech_ci DEFAULT '0',
  `description` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `estm_time` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `state` tinyint(1) DEFAULT '1',
  `ID_ticket` int(11) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_task`),
  KEY `ID_user` (`ID_user`),
  KEY `ID_ticket` (`ID_ticket`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=33 ;

--
-- Vypisuji data pro tabulku `Task`
--

INSERT INTO `Task` (`ID_task`, `real_time`, `description`, `estm_time`, `state`, `ID_ticket`, `ID_user`) VALUES
(8, NULL, 'gfd', '5 min', 1, 45, 4),
(9, NULL, 'desc', '30 min', 1, NULL, 3),
(10, NULL, 'dsads', '5 min', 1, NULL, 4),
(11, NULL, 'hgfhghdfdsaf', '5 min', 1, NULL, 4),
(12, NULL, 'hgf', '5 min', 1, NULL, 4),
(13, NULL, 'cxycxy', '5 min', 1, NULL, 4),
(14, NULL, 'jkhk', '5 min', 1, NULL, 4),
(15, NULL, 'dsa', '5 min', 1, NULL, 4),
(16, NULL, 'fds', '5 min', 1, NULL, 4),
(17, NULL, 'dsadsa', '5 min', 1, NULL, 4),
(18, NULL, 'dsad', '5 min', 1, NULL, 4),
(19, NULL, 'dsa', '5 min', 1, NULL, 4),
(20, NULL, 'dsa', '5 min', 1, NULL, 4),
(27, NULL, 'dsa', '5 min', 1, 49, 4),
(28, NULL, 'iuzi', '5 min', 1, 49, 4),
(29, NULL, 'poip', '5 min', 1, 47, 4),
(31, NULL, 'gfdg', '5 min', 1, 51, 3),
(32, NULL, 'dsadsa', '2 hod', 1, 51, 4);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `Task_ibfk_1` FOREIGN KEY (`ID_ticket`) REFERENCES `Ticket` (`ID_ticket`),
  ADD CONSTRAINT `Task_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `User` (`ID_user`),
  ADD CONSTRAINT `Task_ibfk_3` FOREIGN KEY (`ID_ticket`) REFERENCES `Ticket` (`ID_ticket`) ON DELETE CASCADE ON UPDATE CASCADE;
