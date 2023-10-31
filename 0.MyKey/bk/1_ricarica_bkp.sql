-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Ott 25, 2023 alle 17:49
-- Versione del server: 5.7.11
-- Versione PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykey`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ricarica`
--

CREATE TABLE `ricarica` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(15) COLLATE utf8_bin NOT NULL,
  `saldo` decimal(3,2) NOT NULL,
  `data_transazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `ricarica`
--

INSERT INTO `ricarica` (`id`, `nome`, `cognome`, `saldo`, `data_transazione`) VALUES
(1, 'Mattia', 'Baroni', '4.00', '2023-09-14'),
(2, 'Mattia', 'Baroni', '3.50', '2023-09-20'),
(3, 'Mattia', 'Baroni', '2.50', '2023-09-21'),
(4, 'Mattia', 'Baroni', '2.00', '2023-09-24'),
(5, 'Jacopo', 'Savazzi', '9.00', '2023-09-24'),
(6, 'Mattia', 'Baroni', '4.00', '2023-09-28'),
(7, 'Mattia', 'Baroni', '2.15', '2023-10-03'),
(8, 'Jacopo', 'Savazzi', '8.00', '2023-10-03'),
(9, 'Mattia', 'Baroni', '4.00', '2023-10-09'),
(10, 'Davide', 'Bertoni', '6.00', '2023-10-09'),
(11, 'Mattia', 'Baroni', '3.70', '2023-10-11'),
(12, 'Mattia', 'Baroni', '5.50', '2023-10-13'),
(13, 'Jacopo', 'Savazzi', '6.71', '2023-10-14'),
(14, 'Mattia', 'Baroni', '1.50', '2023-10-18'),
(15, 'Mattia', 'Baroni', '5.21', '2023-10-25');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ricarica`
--
ALTER TABLE `ricarica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ricarica`
--
ALTER TABLE `ricarica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
