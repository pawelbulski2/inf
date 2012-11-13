-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 13 Lis 2012, 15:16
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `uslugi`
--
CREATE DATABASE `uslugi` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `uslugi`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IdT` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Slug` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Photo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`ID`, `IdT`, `Name`, `Slug`, `Photo`) VALUES
(1, 0, 'Motoryzacja', 'motoryzacja', 'automotive.png'),
(2, 0, 'Komputery i Internet', 'komputery-i-internet', 'computer-and-internet.png'),
(3, 0, 'Uroda i kosmetyka', 'uroda-i-kosmetyka', 'beauty-and-personal-care.png'),
(4, 0, 'Języki obce', 'jezyki-obce', 'foreign-languages.png'),
(5, 0, 'Sprzedaż i marketing', 'sprzedaz-i-marketing', 'sales-and-marketing.png'),
(7, 0, 'Dla dzieci', 'dla-dzieci', 'for-children.png'),
(8, 0, 'Sport i rekreacja', 'sport-i-rekreacja', 'sports-and-Leisure.png'),
(9, 0, 'Firma i biuro', 'firma-i-biuro', 'business-and-office.png'),
(10, 0, 'Budowa i remont', 'budowa-i-remont', 'construction-and-renovation.png'),
(12, 0, 'Medycyna i zdrowie', 'medycyna-i-zdrowie', 'medicine-and-health.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
