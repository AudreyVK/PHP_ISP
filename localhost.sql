-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2022 at 07:34 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h206165_speisekarte`
--
CREATE DATABASE IF NOT EXISTS `h206165_speisekarte` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `h206165_speisekarte`;

-- --------------------------------------------------------

--
-- Table structure for table `Kategorien`
--

CREATE TABLE `Kategorien` (
  `Kat_ID` int(11) NOT NULL,
  `Kat_Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Kategorien`
--

INSERT INTO `Kategorien` (`Kat_ID`, `Kat_Name`) VALUES
(1, 'Vorspeise'),
(2, 'Hauptspeise'),
(3, 'Nachspeise'),
(4, 'Getränke'),
(5, 'Test'),
(6, 'Testung');

-- --------------------------------------------------------

--
-- Table structure for table `Speisen`
--

CREATE TABLE `Speisen` (
  `Speise_ID` int(11) NOT NULL,
  `Speise_Name` varchar(50) NOT NULL,
  `Speise_Preis` decimal(2,2) DEFAULT NULL,
  `Kategorien_ID` int(11) DEFAULT NULL,
  `Speise_Beschreibung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Speisen`
--

INSERT INTO `Speisen` (`Speise_ID`, `Speise_Name`, `Speise_Preis`, `Kategorien_ID`, `Speise_Beschreibung`) VALUES
(1, 'Schnitzel', '0.99', 2, 'Putenschnitzel mit Pommes'),
(2, 'Tiramisu', '0.99', 3, 'Lecker mit Espressobohne'),
(3, 'Cola', '0.99', 4, '0,5l'),
(4, 'Fanta', '0.99', 4, '0,5l'),
(5, 'Salat', '0.99', 1, 'Kleiner Gemischter Salat'),
(6, 'Vorspeisenteller', '0.99', 1, 'Gefüllte Weinblätter, Hirtenkäse und Brot'),
(7, 'Kartoffelgratin', '0.99', 2, 'Mit Schinkenwürfel und Käse überbacken');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Kategorien`
--
ALTER TABLE `Kategorien`
  ADD PRIMARY KEY (`Kat_ID`);

--
-- Indexes for table `Speisen`
--
ALTER TABLE `Speisen`
  ADD PRIMARY KEY (`Speise_ID`),
  ADD KEY `Kategorien_ID` (`Kategorien_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Kategorien`
--
ALTER TABLE `Kategorien`
  MODIFY `Kat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Speisen`
--
ALTER TABLE `Speisen`
  MODIFY `Speise_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Speisen`
--
ALTER TABLE `Speisen`
  ADD CONSTRAINT `Speisen_ibfk_1` FOREIGN KEY (`Kategorien_ID`) REFERENCES `Kategorien` (`Kat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
