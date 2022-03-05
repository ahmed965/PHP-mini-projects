-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Mrz 2022 um 21:54
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
-- Datenbank: `languages-courses`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`id`, `text`, `author`, `date`, `id_course`) VALUES
(2, 'this is  my second comment', 'Ahmed', '2022-03-04 20:47:41', 1),
(18, 'this is my first comment', 'Ahmed', '2022-03-05 10:13:49', 1),
(22, 'Evening courses are nice', 'Max', '2022-03-05 15:50:33', 2),
(24, 'test comment', 'test', '2022-03-05 17:02:35', 1),
(25, 'dsfdf', 'fddf', '2022-03-05 17:03:20', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `courses`
--

INSERT INTO `courses` (`id`, `titel`, `price`, `description`, `image`, `start_date`) VALUES
(1, 'German intensive courses ', '300 Euro', 'Intensive courses at the language levels A1 to C2', 'https://via.placeholder.com/200/00000', '2022-03-10'),
(2, 'German evening courses', '400 Euro', 'Evening courses at the language levels A1 to C2', 'https://via.placeholder.com/200/0000FF', '2022-03-17'),
(3, 'German courses on weekends', '150 Euro', 'Weekend courses at the language levels A1 to C2', 'https://via.placeholder.com/200/FF0000', '2022-03-23'),
(4, 'German courses for children', '200 Euro', 'Children courses at the language levels A1 to C2', 'https://via.placeholder.com/200/FFFF00\r\n', '2022-03-26');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_courses_comments` (`id_course`);

--
-- Indizes für die Tabelle `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_courses_comments` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
