-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 apr 2021 om 16:15
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_token` varchar(255) DEFAULT NULL,
  `password_changed` timestamp NULL DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `email`, `password`, `password_token`, `password_changed`, `datetime`) VALUES
(1, 'test@test.nl', '$2y$10$3eJXM2NBYpOH8opTNAHVye/uRtxMhWNLS0NX9qpp1WqygPBnX4vjS', '', '2021-02-18 16:06:05', '2021-02-17 15:32:17'),
(2, '533187@student.glu.nl', 'GayLord123', '', '0000-00-00 00:00:00', '2021-03-22 15:31:21'),
(3, 'Gay@Lord.nl', '', NULL, NULL, '2021-03-26 10:10:14'),
(5, 'Gavin@gavin.nl', '', NULL, NULL, '2021-04-14 19:29:44'),
(13, '533187@student.glu.nl', 'GayLord11', NULL, NULL, '2021-04-19 15:28:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`, `active`) VALUES
(1, 'tafellamp', 'Tafellampen zijn binnenlampen voor op tafel.', 1),
(2, 'Buitenlamp', 'Buitenlampen zijn voor buiten.', 1),
(3, 'Designlamp', 'Voor mensen die specifiek een lamp zoeken.', 1),
(4, 'Bureaulamp', 'Een lamp voor op je bureau', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category_image`
--

CREATE TABLE `category_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `category_image`
--

INSERT INTO `category_image` (`image_id`, `category_id`, `image`, `active`) VALUES
(1, 2, 'buitenlamp.jpg', 1),
(2, 1, 'tafellamp.png', 1),
(3, 3, 'designlamp.jpg', 1),
(4, 4, 'bureaulamp.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` bigint(20) NOT NULL,
  `house_number_addon` int(11) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `phone` int(200) NOT NULL,
  `emailadres` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `newsletter_subscription` tinyint(1) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `gender`, `first_name`, `middle_name`, `last_name`, `street`, `house_number`, `house_number_addon`, `zip_code`, `city`, `phone`, `emailadres`, `password`, `newsletter_subscription`, `date_added`) VALUES
(1, 'm', 'Darth', '', 'vader', 'Death Star', 22, 0, '1319CA', 'Empire', 640645147, 'Darthvader@gmail.com', 'standaard1103', 1, '2021-03-29'),
(2, 'm', 'Gavin', '', 'Tjin', 'midzwaard', 29, 0, '1319CA', 'Almere', 640645147, '533187@student.glu.nl', 'GayLord1103', 1, '2021-03-29'),
(3, 'v', 'Michelle', 'van', 'Huizen', 'Koningin Wilhelminalaan', 7, 0, '1455AB', 'Utrecht', 64932783, 'Michellevanhuizen@gmail.com', 'standaard1103', 1, '2021-03-29'),
(4, 'v', 'Sarah', 'de', 'Jong', 'computerstraat', 3, 0, '1350HG', 'Rotterdam', 67484688, 'sarahdejong@gmail.com', 'standaard1103', 1, '2021-03-29'),
(9, 'm', 'Albert', '', 'Einstien', 'russialand', 5, 0, '1277AG', 'Groningen', 6748362, 'alberteinstein@gmail.com', 'standaard1103', 1, '2021-03-29');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` text NOT NULL,
  `price` int(11) NOT NULL,
  `price_per_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color` text NOT NULL,
  `weight` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES
(1, 'Arstid', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n', 1, 40, 'wit', 300, 1),
(2, 'Buitenlamp', 'Een lamp voor buiten.', 2, 101, 'geel', 40, 1),
(3, 'Rice Field', 'Een designlamp.', 3, 310, 'wit/geel', 200, 1),
(4, 'Lucide', 'Een lamp voor op je bureau.', 4, 40, 'wit', 300, 1),
(37, 'Leeslamp', 'lamp voor lezen', 1, 200, 'rood', 200, 1),
(38, 'Gamelamp', 'lamp voor gamen', 1, 111, 'geel', 22, 1),
(40, 'hooglamp', 'lamp voor lange mensen', 1, 10000, 'goud', 23, 1),
(41, 'zitlamp', 'lamp voor zitten', 2, 330, 'geel', 40, 1),
(42, 'eetlamp', 'lamp voor eten', 2, 39, 'zilver', 11, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `image`, `active`) VALUES
(1, 1, 'arstid.jpg', 1),
(2, 2, 'buitenlamp.jpg', 1),
(3, 3, 'designlamp.jpg', 1),
(4, 4, 'lucide.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `first_name` tinytext NOT NULL,
  `middle_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `street` mediumtext NOT NULL,
  `house_number` int(11) NOT NULL,
  `house_number_addon` int(11) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `city` mediumtext NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `shipping_costs` int(11) NOT NULL,
  `payment_method` mediumtext NOT NULL,
  `order_date` datetime NOT NULL,
  `shipping_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `product_id`, `first_name`, `middle_name`, `last_name`, `street`, `house_number`, `house_number_addon`, `zip_code`, `city`, `total_price`, `shipping_costs`, `payment_method`, `order_date`, `shipping_date`) VALUES
(21, 26, 'Gavin', 'efwe', 'uhiuhu', 'uhuh', 0, 0, '0', 'iuhu', '0', 0, 'ihuh', '2021-04-19 18:05:43', '0000-00-00'),
(22, 22, 'Goud', 'diamant', 'zilver', 'dwwd', 22, 0, '121', 'dwd', '0', 0, 'wdwd', '2021-04-19 18:08:01', '0000-00-00'),
(23, 3, 'Gavin', 'Tjin', 'Tjin', 'midzwaard', 29, 0, '1319', 'Almere', '330', 20, 'ING', '2021-04-20 12:44:56', '0000-00-00'),
(24, 3, 'Gavin', 'Tjin', 'Tjin', 'midzwaard', 29, 0, '1319', 'Almere', '330', 20, 'ING', '2021-04-20 12:45:55', '0000-00-00'),
(25, 25, 'sq', 'qs', 'qsq', 'qs', 0, 0, '0', 'qs', '50', 20, 'qsq', '2021-04-20 12:49:20', '0000-00-00'),
(26, 2, 'Gvain', '', 'dwd', 'dwdw', 13, 0, 'def', 'd', '121', 20, 'd', '2021-04-21 14:33:08', '0000-00-00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexen voor tabel `category_image`
--
ALTER TABLE `category_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexen voor tabel `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexen voor tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `category_image`
--
ALTER TABLE `category_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
