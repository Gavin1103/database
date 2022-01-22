-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 nov 2021 om 14:37
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `apikey` varchar(32) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `access`
--

INSERT INTO `access` (`id`, `apikey`, `user`) VALUES
(1, 'd1bf93299de1b68e6d382c893bf1215f', 'gavin'),
(2, '317c02f9a89c57b5e177472de5669d6c', 'LordVader');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `naam` varchar(256) NOT NULL,
  `beschrijving` text NOT NULL,
  `toegevoegd_op` datetime NOT NULL,
  `gewijzigd_op` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`id`, `naam`, `beschrijving`, `toegevoegd_op`, `gewijzigd_op`) VALUES
(1, 'Frisdrank', 'er zit prik in', '2021-10-14 18:02:05', '2021-10-14 16:02:28'),
(2, 'Alcohol', 'hierdoor word je dronken.', '2021-11-12 10:26:31', '2021-11-12 09:27:13');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `naam` varchar(32) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(6,2) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `toegevoegd_op` datetime NOT NULL,
  `gewijzigd_op` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `naam`, `beschrijving`, `prijs`, `categorie_id`, `toegevoegd_op`, `gewijzigd_op`) VALUES
(1, 'Cola', 'Frisdrank', '3.00', 1, '2021-10-14 13:43:13', '2021-10-14 11:43:43'),
(2, 'sprite', 'frisdrank', '4.00', 1, '2021-10-14 20:45:56', '2021-10-14 18:46:11'),
(3, 'Fanta', 'drank met prik er in', '5.00', 1, '2021-11-12 10:25:13', '2021-11-12 09:26:19'),
(5, 'Jagermeister', 'alcoholistische drank', '99.00', 2, '2021-11-12 10:30:53', '2021-11-12 09:31:51'),
(11, 'UGO', 'PRIK', '4.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'UGO', 'PRIK', '4.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'taxi', 'drank', '5.99', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
