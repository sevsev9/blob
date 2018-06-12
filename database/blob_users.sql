-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2018 um 21:36
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `blob_users`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blobs`
--

CREATE TABLE `blobs` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `hat` varchar(45) DEFAULT NULL,
  `eyes` varchar(45) DEFAULT NULL,
  `clothing` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `costume` varchar(45) DEFAULT NULL,
  `mouth` varchar(45) DEFAULT NULL,
  `accessoires` varchar(45) DEFAULT NULL,
  `merkmale` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `blobs`
--

INSERT INTO `blobs` (`id`, `name`, `hat`, `eyes`, `clothing`, `color`, `costume`, `mouth`, `accessoires`, `merkmale`) VALUES
(1, 'Fraunz', 'hat_Beanie', 'eyes_sample', 'clothing_WeisserAnzugMitFliege', '', 'costume_Mario', 'mouth_gluecklich', 'accessories_Galaxienbrille', 'merkmale_GraueRinge');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `id` int(6) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `path` varchar(55) DEFAULT NULL,
  `item_class` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `cost`, `path`, `item_class`) VALUES
(1, 'Roter Hut', 350, 300, 'hat_red.png', 'hat'),
(2, 'Blauer Hut', 350, 300, 'blue_red.png', 'hat');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `schulname` varchar(45) DEFAULT NULL,
  `klasse` varchar(45) DEFAULT NULL,
  `vorname` varchar(45) DEFAULT NULL,
  `nachname` varchar(45) DEFAULT NULL,
  `xp` bigint(8) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `blob_name` varchar(60) DEFAULT NULL,
  `first_login` tinyint(1) DEFAULT NULL,
  `coins` bigint(20) DEFAULT NULL,
  `blob_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `schulname`, `klasse`, `vorname`, `nachname`, `xp`, `lvl`, `blob_name`, `first_login`, `coins`, `blob_id`) VALUES
(1, 'sevsev9', 'seasHTL', 'seas.htl@wels.at', 'hbla wels', '3ahit', 'severin', 'mairinger', 1023, 132, 'Fraunz', 1, 500, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blobs`
--
ALTER TABLE `blobs`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blobs`
--
ALTER TABLE `blobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
