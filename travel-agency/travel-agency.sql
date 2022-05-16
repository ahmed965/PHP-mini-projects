-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Mai 2022 um 19:20
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `travel-agency`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `continent`
--

CREATE TABLE `continent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `continent`
--

INSERT INTO `continent` (`id`, `name`) VALUES
(1, 'Africa'),
(2, 'Europe'),
(3, 'North america'),
(4, 'Asia'),
(5, 'Sud America');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `travel`
--

INSERT INTO `travel` (`id`, `destination`, `image`, `price`, `start_date`, `duration`, `continent_id`) VALUES
(1, 'Tunisia', 'https://via.placeholder.com/200/0000FF', 600, '2022-06-16', 7, 1),
(2, 'Spain', 'https://via.placeholder.com/200/FF0000', 1000, '2022-04-30', 10, 2),
(3, 'Brazil', 'https://via.placeholder.com/200/008000', 1500, '2022-04-29', 10, 5),
(4, 'Italy', 'https://via.placeholder.com/200/FFFF00', 600, '2022-04-14', 7, 2),
(5, 'Egypt', 'https://via.placeholder.com/200/FF0000', 700, '2022-04-21', 7, 1),
(6, 'Marocco ', 'https://via.placeholder.com/200/0000FF', 1200, '2022-04-13', 10, 1),
(7, 'Mexico', 'https://via.placeholder.com/200/008000', 1500, '2022-04-12', 7, 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `continent`
--
ALTER TABLE `continent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
