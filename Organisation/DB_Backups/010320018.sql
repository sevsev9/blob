-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Erstellungszeit: 01. Jun 2018 um 09:53
-- Server-Version: 5.7.22
-- PHP-Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Fraunz', 'hat_Beanie', 'eyes_sample', 'clothing_WeisserAnzugMitFliege', '', 'costume_Mario', 'mouth_gluecklich', 'accessories_Galaxienbrille', 'merkmale_Ringe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `id` int(6) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `path` varchar(55) DEFAULT NULL,
  `item_class` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `path`, `item_class`) VALUES
(1, 'Roter Hut', 350, 'hat_red.png', 'hat'),
(2, 'Blauer Hut', 350, 'blue_red.png', 'hat'),
(3, 'Riesenkolben', 50, 'accessories_Riesenkolben.png', 'accessoires'),
(4, 'Brille', 100, 'accessoires_Brille.png', 'accessoires'),
(5, 'Sonnenbrille', 200, 'accessories_Sonnenbrille.png', 'accessoires'),
(6, 'Galaxienbrille', 300, 'accessories_Galaxienbrille.png', 'accessoires'),
(7, 'Lakritztapete', 25, 'wallpapers_cyan.png', 'wallpapers'),
(8, 'Sonnentapete', 50, 'wallpapers_gelb.png', 'wallpapers'),
(9, 'Himbeertapete', 75, 'wallpapers_pink.png', 'wallpapers'),
(10, 'Blaubeertapete', 100, 'wallpapers_lila.png', 'wallpapers'),
(11, 'Lakritz-Sterntapete', 125, 'wallpapers_cyanPremium.png', 'wallpapers'),
(12, 'Sonnen-Sterntapete', 150, 'wallpapers_gelbPremium.png', 'wallpapers'),
(13, 'Seifenblasentapete', 175, 'wallpapers_Seifenblasen.png', 'wallpapers'),
(14, 'Landhaus', 300, 'wallpapers_Landhaus.png', 'wallpapers'),
(15, 'Strandhaus', 350, 'wallpapers_Strandhaus.png', 'wallpapers'),
(16, 'Grauer Anzug mit Krawatte', 200, 'clothing_GrauerAnzugMitKrawatte.png', 'clothing'),
(17, 'Grauer Anzug mit Fliege', 250, 'clothing_GrauerAnzugMitFliege.png', 'clothing'),
(18, 'Schwarzer Anzug mit Krawatte', 300, 'clothing_SchwarzerAnzugMitKrawatte.png', 'clothing'),
(19, 'Schwarzer Anzug mit Fliege', 350, 'clothing_SchwarzerAnzugMitFliege.png', 'clothing'),
(20, 'Weißer Anzug mit Krawatte', 400, 'clothing_WeißerAnzugMitKrawatte.png', 'clothing'),
(21, 'Weißer Anzug mit Fliege', 450, 'clothing_WeißerAnzugMitFliege.png', 'clothing'),
(22, 'Latzhose', 500, 'clothing_Latzhose.png', 'clothing'),
(23, 'Vanille', 0, 'color_Vanille.png', 'color'),
(24, 'Blaubeere', 100, 'color_Blaubeere.png', 'color'),
(25, 'Erdbeere', 100, 'color_Erdbeere.png', 'color'),
(26, 'Himbeere', 100, 'color_Himbeere.png', 'color'),
(27, 'Kaffee', 100, 'color_Kaffee.png', 'color'),
(28, 'Marzipan', 100, 'color_Marzipan.png', 'color'),
(29, 'Melone', 100, 'color_Melone.png', 'color'),
(30, 'Orange', 100, 'color_Orange.png', 'color'),
(31, 'Pistazie', 100, 'color_Pistazie.png', 'color'),
(32, 'Schokolade', 100, 'color_Schokolade.png', 'color'),
(33, 'Traube', 100, 'color_Traube.png', 'color'),
(34, 'Zitrone', 100, 'color_Zitrone.png', 'color'),
(35, 'Trainingsanzug', 200, 'costume_Jogger.png', 'costume'),
(36, 'Darth Vader', 500, 'costume_DarthVader.png', 'costume'),
(37, 'Mario', 500, 'costume_Mario.png', 'costume'),
(38, 'Naruto', 500, 'costume_Naruto.png', 'costume'),
(39, 'Superman', 300, 'costume_Superman.png', 'costume'),
(40, 'normal', 0, 'eyes_erstaunt.png', 'eyes'),
(41, 'zwinkernd', 50, 'eyes_zwinkernd.png', 'eyes'),
(42, 'müde', 75, 'eyes_Augenringe.png', 'eyes'),
(43, 'K.O.', 100, 'eyes_ko.png', 'eyes'),
(44, 'glücklich', 200, 'eyes_gluecklich.png', 'eyes'),
(45, 'Fischerhut beige', 100, 'hat_FischerhutBeige.png', 'hat'),
(46, 'Fischerhut türkis', 100, 'hat_FischerhutTuerkis.png', 'hat'),
(47, 'Beanie', 200, 'hat_Beanie.png', 'hat'),
(48, 'Kopfhörer', 250, 'hat_Kopfhoerer.png', 'hat'),
(49, 'Sommersprossen', 100, 'merkmale_Sommersprossen.png', 'merkmale'),
(50, 'Ringe', 200, 'merkmale_Ringe.png', 'merkmale'),
(51, 'Spinnennetze', 300, 'merkmale_Spinnennetze.png', 'merkmale'),
(52, 'grinsend', 0, 'mouth_grinsend.png', 'mouth'),
(53, 'lächelnd', 25, 'mouth_laechelnd.png', 'mouth'),
(54, 'pfeifend', 50, 'mouth_pfeifend.png', 'mouth'),
(55, 'glücklich', 75, 'mouth_gluecklich.png', 'mouth'),
(56, 'Kawaii', 100, 'mouth_Kawaii.png', 'mouth'),
(57, 'schreiend', 125, 'mouth_schreiend.png', 'mouth'),
(58, 'lachend', 150, 'mouth_lachend.png', 'mouth');

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
  `first_login` tinyint(1) DEFAULT NULL,
  `coins` bigint(20) DEFAULT NULL,
  `blob_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `schulname`, `klasse`, `vorname`, `nachname`, `xp`, `lvl`, `first_login`, `coins`, `blob_id`) VALUES
(1, 'sevsev9', 'seasHTL', 'seas.htl@wels.at', 'hbla wels', '3ahit', 'severin', 'mairinger', 1023, 132, 1, 500, 1);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
