-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 jan 2021 om 15:32
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fingerscanner`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `voedselbank` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `naam`, `password`, `voedselbank`) VALUES
(1, 'nick', '$2y$10$vc3K6kPIIghDlVeCG.jivu.Ol1VPLEjQlxhGfZsLVSy9nQ/7JE1ta', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `box` varchar(255) NOT NULL,
  `gezin` int(255) NOT NULL,
  `allergie` varchar(255) NOT NULL,
  `voorkeuren` varchar(255) NOT NULL,
  `vingerpint` varchar(255) NOT NULL,
  `voedselbank` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `box`, `gezin`, `allergie`, `voorkeuren`, `vingerpint`, `voedselbank`) VALUES
(0, 'Younes', '2', 3, 'pinda', 'chocola', '224234', '2'),
(1, 'Younes', '2', 3, 'pinda', 'chocola', '123', '2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vingerid`
--

CREATE TABLE `vingerid` (
  `id` int(11) NOT NULL,
  `vinger_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `vingerid`
--

INSERT INTO `vingerid` (`id`, `vinger_id`) VALUES
(1, 224234);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voedselbanken`
--

CREATE TABLE `voedselbanken` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `locatie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `voedselbanken`
--

INSERT INTO `voedselbanken` (`id`, `naam`, `locatie`) VALUES
(1, 'pretpark', 'rijswijk');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `vingerid`
--
ALTER TABLE `vingerid`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `voedselbanken`
--
ALTER TABLE `voedselbanken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `vingerid`
--
ALTER TABLE `vingerid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `voedselbanken`
--
ALTER TABLE `voedselbanken`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
