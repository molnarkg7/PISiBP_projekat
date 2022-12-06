-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2022 at 02:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turisticka_agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `aranzman`
--

DROP TABLE IF EXISTS `aranzman`;
CREATE TABLE IF NOT EXISTS `aranzman` (
  `id_aranzmana` int(11) NOT NULL AUTO_INCREMENT,
  `id_programa` int(11) NOT NULL,
  `id_smestaja` int(11) NOT NULL,
  `termin_polazak` date NOT NULL,
  `termin_povratak` date NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `cena` float NOT NULL,
  `napomene` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_aranzmana`),
  KEY `id_programa` (`id_programa`),
  KEY `id_smestaja` (`id_smestaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `fakultativne_aktivnosti`
--

DROP TABLE IF EXISTS `fakultativne_aktivnosti`;
CREATE TABLE IF NOT EXISTS `fakultativne_aktivnosti` (
  `id_aktivnosti` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `opis` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_aktivnosti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kontakt_telefon` int(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_tipa` int(11) NOT NULL,
  PRIMARY KEY (`id_korisnika`),
  KEY `id_tipa` (`id_tipa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

DROP TABLE IF EXISTS `lokacija`;
CREATE TABLE IF NOT EXISTS `lokacija` (
  `id_lokacije` int(11) NOT NULL AUTO_INCREMENT,
  `mesto` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `drzava` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kontinent` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_lokacije`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prevozi`
--

DROP TABLE IF EXISTS `prevozi`;
CREATE TABLE IF NOT EXISTS `prevozi` (
  `id_prevoza` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `id_aranzmana` int(11) NOT NULL,
  KEY `id_prevoza` (`id_prevoza`),
  KEY `id_aranzmana` (`id_aranzmana`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `program_putovanja`
--

DROP TABLE IF EXISTS `program_putovanja`;
CREATE TABLE IF NOT EXISTS `program_putovanja` (
  `id_programa` int(11) NOT NULL AUTO_INCREMENT,
  `opis` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `id_rezervacije` int(11) NOT NULL AUTO_INCREMENT,
  `id_aranzmana` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `nacin_placanja` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `broj_dece` int(11) NOT NULL,
  `broj_odraslih` int(11) NOT NULL,
  `komentar` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_rezervacije`),
  KEY `id_aranzmana` (`id_aranzmana`),
  KEY `id_korisnika` (`id_korisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sadrzi_ativnosti`
--

DROP TABLE IF EXISTS `sadrzi_ativnosti`;
CREATE TABLE IF NOT EXISTS `sadrzi_ativnosti` (
  `id_programa` int(11) NOT NULL,
  `id_aktivnosti` int(11) NOT NULL,
  KEY `id_aktivnosti` (`id_aktivnosti`),
  KEY `id_programa` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `se_nalazi`
--

DROP TABLE IF EXISTS `se_nalazi`;
CREATE TABLE IF NOT EXISTS `se_nalazi` (
  `id_programa` int(11) NOT NULL,
  `id_lokacije` int(11) NOT NULL,
  `br_sati` int(11) NOT NULL,
  KEY `id_lokacije` (`id_lokacije`),
  KEY `id_programa` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

DROP TABLE IF EXISTS `smestaj`;
CREATE TABLE IF NOT EXISTS `smestaj` (
  `id_smestaja` int(11) NOT NULL AUTO_INCREMENT,
  `tip_smestaja` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `naziv_objekta` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `br_kreveta` int(11) NOT NULL,
  `kategorija_smestaja` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `internet_konekcija` tinyint(1) NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `klima` tinyint(1) NOT NULL,
  `frizider` tinyint(1) NOT NULL,
  `sef` tinyint(1) NOT NULL,
  `slika1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `slika2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `slika3` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `slika4` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `slika5` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_smestaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

DROP TABLE IF EXISTS `tip_korisnika`;
CREATE TABLE IF NOT EXISTS `tip_korisnika` (
  `id_tipa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_tipa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tip_prevoza`
--

DROP TABLE IF EXISTS `tip_prevoza`;
CREATE TABLE IF NOT EXISTS `tip_prevoza` (
  `vin` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `br_sedista` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aranzman`
--
ALTER TABLE `aranzman`
  ADD CONSTRAINT `aranzman_ibfk_1` FOREIGN KEY (`id_smestaja`) REFERENCES `smestaj` (`id_smestaja`),
  ADD CONSTRAINT `aranzman_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `program_putovanja` (`id_programa`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_tipa`) REFERENCES `tip_korisnika` (`id_tipa`);

--
-- Constraints for table `prevozi`
--
ALTER TABLE `prevozi`
  ADD CONSTRAINT `prevozi_ibfk_1` FOREIGN KEY (`id_prevoza`) REFERENCES `tip_prevoza` (`vin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prevozi_ibfk_2` FOREIGN KEY (`id_aranzmana`) REFERENCES `aranzman` (`id_aranzmana`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`),
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`id_aranzmana`) REFERENCES `aranzman` (`id_aranzmana`);

--
-- Constraints for table `sadrzi_ativnosti`
--
ALTER TABLE `sadrzi_ativnosti`
  ADD CONSTRAINT `sadrzi_ativnosti_ibfk_1` FOREIGN KEY (`id_aktivnosti`) REFERENCES `fakultativne_aktivnosti` (`id_aktivnosti`),
  ADD CONSTRAINT `sadrzi_ativnosti_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `program_putovanja` (`id_programa`);

--
-- Constraints for table `se_nalazi`
--
ALTER TABLE `se_nalazi`
  ADD CONSTRAINT `se_nalazi_ibfk_1` FOREIGN KEY (`id_lokacije`) REFERENCES `lokacija` (`id_lokacije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `se_nalazi_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `program_putovanja` (`id_programa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
