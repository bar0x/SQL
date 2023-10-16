-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Ott 16, 2023 alle 10:55
-- Versione del server: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scuola2324`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `uomo`
--

CREATE TABLE IF NOT EXISTS `uomo` (
`id` int(10) unsigned NOT NULL,
  `nome` varchar(39) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(15) COLLATE utf8_bin NOT NULL,
  `paese` varchar(25) COLLATE utf8_bin NOT NULL,
  `anni` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `uomo`
--

INSERT INTO `uomo` (`id`, `nome`, `cognome`, `paese`, `anni`) VALUES
(1, 'Stefano', 'Rossi', 'Ostiglia', 37),
(2, 'Roberto', 'Saviano', 'Modena', 71),
(3, 'Roberto', 'Saviano', 'Modena', 71),
(4, 'Vito', 'Ciancimino', 'Napoli', 127),
(5, 'Totò', 'Riina', 'Corleone', 96);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uomo`
--
ALTER TABLE `uomo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uomo`
--
ALTER TABLE `uomo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
