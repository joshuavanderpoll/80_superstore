-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 04 sep 2019 om 07:41
-- Serverversie: 10.1.40-MariaDB
-- PHP-versie: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supershop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL,
  `price` double NOT NULL,
  `storage` int(11) NOT NULL,
  `category` varchar(32) NOT NULL,
  `sub_category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `name`, `description`, `price`, `storage`, `category`, `sub_category`) VALUES
(1, 'Tiger T-Shirt', 'Mr Gugu & Miss Go Tiger T-Shirt', 20, 0, 'Shirts', ''),
(2, 'Back to the 80\'s', 'Back to the 80\'s Hoodu', 18.99, 0, 'Hoodies', ''),
(3, 'Retro 80\'s', 'Retro 80\'s Ski Jacket', 36.88, 0, 'Jackets', ''),
(4, 'Vintage 80\'s Trousers', 'High-Waisted Urban Trousers', 69, 0, 'Trousers', ''),
(5, 'Shoes', 'Ik kan de naam niet meer vinden ;-;', 420.69, 0, 'Shoes', ''),
(6, '80s Pop', 'Annual LP', 929456754, 0, 'Pop', ''),
(7, 'Dance On', 'Dance LP', 34, 0, 'Dance', ''),
(8, 'Rofo', 'Yoyo gang gang ik weet geen teksten omdat het 2 uur snachts is en ik geen zin had om dit te doen eerder', 12, 0, 'Disco', ''),
(9, 'Val Young Solution', 'De afbeelding is wazig dus kan geen info vinden', 11, 0, 'Funk', ''),
(10, 'Oui', 'Een of ander frans ding van google', 21, 0, 'Soul', ''),
(11, 'Wham! Make it big', 'Ok', 54, 0, 'Rock', ''),
(12, 'Snelle Planga', 'Ye lets go made in china', 1000000, 0, 'Glasses', ''),
(13, 'Tertis', 'Minecraft heeft meer sales oof', 23, 0, 'Games', ''),
(14, 'Walkman', 'Gekke mp3 spelers toen', 12, 0, 'Radios', ''),
(15, 'Turntable', 'Volg me op insta @joshuavdpoll', 1, 0, 'Turntables', ''),
(16, 'A Car', 'Ja idk ben alle namen kwijt en volg me op insta @joshuavdpoll', 111, 0, 'Cars', ''),
(17, 'Badges', 'Volg me op insta @joshuavdpoll', 1111, 0, 'Badges', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten_images`
--

CREATE TABLE `producten_images` (
  `id` int(11) NOT NULL,
  `source` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkelwaggie`
--

CREATE TABLE `winkelwaggie` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `winkelwaggie`
--

INSERT INTO `winkelwaggie` (`id`) VALUES
(7),
(16);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
