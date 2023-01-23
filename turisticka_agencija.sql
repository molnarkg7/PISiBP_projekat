-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 23, 2023 at 03:28 PM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.0.26

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
  `id_lokacije` int(11) NOT NULL,
  `termin_polazak` date NOT NULL,
  `termin_povratak` date NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `cena` float NOT NULL,
  `napomene` text NOT NULL,
  PRIMARY KEY (`id_aranzmana`),
  KEY `id_programa` (`id_programa`),
  KEY `id_smestaja` (`id_smestaja`),
  KEY `id_lokacije` (`id_lokacije`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

DROP TABLE IF EXISTS `drzava`;
CREATE TABLE IF NOT EXISTS `drzava` (
  `id_drzava` int(11) NOT NULL AUTO_INCREMENT,
  `id_kontinenta` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  PRIMARY KEY (`id_drzava`),
  KEY `id_kontinenta` (`id_kontinenta`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`id_drzava`, `id_kontinenta`, `naziv`) VALUES
(1, 1, 'Japan'),
(2, 1, 'Ujedinjeni Arapski Emirati'),
(3, 1, 'Maldivi'),
(4, 1, 'Kina'),
(5, 1, 'Indija'),
(6, 2, 'Juznoafricka Republika'),
(7, 2, 'Maroko'),
(8, 2, 'Gana'),
(9, 2, 'Tunis'),
(10, 2, 'Egipat'),
(11, 3, 'Novi Juzni Wales'),
(12, 3, 'Viktorija'),
(13, 3, 'Kvinslend'),
(14, 3, 'Zapadna Australija'),
(15, 3, 'Tasmanija'),
(16, 4, 'Srbija'),
(17, 4, 'Rusija'),
(18, 4, 'Grcka'),
(19, 4, 'Bosna i Hercegovina'),
(20, 4, 'Crna Gora'),
(21, 5, 'Argentina'),
(22, 5, 'Brazil'),
(23, 5, 'Kolumbija'),
(24, 5, 'Urugvaj'),
(25, 5, 'Venecuela'),
(26, 6, 'Jamajka'),
(27, 6, 'Kanada'),
(28, 6, 'Kuba'),
(29, 6, 'Meksiko'),
(30, 6, 'SAD');

-- --------------------------------------------------------

--
-- Table structure for table `fakultativne_aktivnosti`
--

DROP TABLE IF EXISTS `fakultativne_aktivnosti`;
CREATE TABLE IF NOT EXISTS `fakultativne_aktivnosti` (
  `id_aktivnosti` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  PRIMARY KEY (`id_aktivnosti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kontinent`
--

DROP TABLE IF EXISTS `kontinent`;
CREATE TABLE IF NOT EXISTS `kontinent` (
  `id_kontinenta` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kontinenta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kontinent`
--

INSERT INTO `kontinent` (`id_kontinenta`, `naziv`) VALUES
(1, 'Azija'),
(2, 'Afrika'),
(3, 'Australija'),
(4, 'Evropa'),
(5, 'Juzna Amerika'),
(6, 'Severna Amerika');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `sifra` varchar(255) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `kontakt_telefon` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_tipa` int(11) NOT NULL,
  PRIMARY KEY (`id_korisnika`),
  KEY `id_tipa` (`id_tipa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnika`, `username`, `sifra`, `ime`, `prezime`, `kontakt_telefon`, `email`, `id_tipa`) VALUES
(2, 'uros', '123', 'Урош', 'Милошевић', '0614111002', 'milosevicurose14@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

DROP TABLE IF EXISTS `lokacija`;
CREATE TABLE IF NOT EXISTS `lokacija` (
  `id_lokacije` int(11) NOT NULL AUTO_INCREMENT,
  `id_drzava` int(11) NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `slika` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lokacije`),
  KEY `id_drzava` (`id_drzava`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`id_lokacije`, `id_drzava`, `mesto`, `slika`) VALUES
(1, 1, 'Fukusima', ''),
(2, 1, 'Hirosima', ''),
(3, 1, 'Tokio', ''),
(4, 2, 'Abu Dabi', ''),
(5, 2, 'Dubai', ''),
(6, 2, 'Kalba', ''),
(7, 3, 'Male', ''),
(8, 3, 'Fuvammulah', ''),
(9, 3, 'Hithadhoo', ''),
(10, 4, 'Sangaj', ''),
(11, 4, 'Peking', ''),
(12, 4, 'Vuhan', ''),
(13, 5, 'Mumbaj', ''),
(14, 5, 'Kolkata', ''),
(15, 5, 'Delhi', ''),
(16, 6, 'Johanezburg', ''),
(17, 6, 'Durban', ''),
(18, 6, 'Rustenburg', ''),
(19, 7, 'Fes', ''),
(20, 7, 'Rabat', ''),
(21, 7, 'Kazablanka', ''),
(22, 8, 'Akra', ''),
(23, 8, 'Kumasi', ''),
(24, 8, 'Tamale', ''),
(25, 9, 'Tunis', ''),
(26, 9, 'Sfax', ''),
(27, 9, 'Ariana', ''),
(28, 10, 'Kairo', ''),
(29, 10, 'Aleksandrija', ''),
(30, 10, 'Giza', ''),
(31, 11, 'Sidnej', ''),
(32, 11, 'Blektaun', ''),
(33, 11, 'Volongong', ''),
(34, 12, 'Melburn', ''),
(35, 12, 'Ostrvo Filip', ''),
(36, 12, 'Gilong', ''),
(37, 13, 'Brisbejn', ''),
(38, 13, 'Kalundra', ''),
(39, 13, 'Kairns', ''),
(40, 14, 'Pert', ''),
(41, 14, 'Rokingam', ''),
(42, 14, 'Bunburi', ''),
(43, 15, 'Lunceston', ''),
(44, 15, 'Hobart', ''),
(45, 15, 'Makaj', ''),
(46, 16, 'Kragujevac', ''),
(47, 16, 'Jagodina', ''),
(48, 16, 'Paracin', ''),
(49, 17, 'Moskva', ''),
(50, 17, 'Novosibirsk', ''),
(51, 17, 'Kazanj', ''),
(52, 18, 'Atina', ''),
(53, 18, 'Solun', ''),
(54, 18, 'Larisa', ''),
(55, 19, 'Banja Luka', ''),
(56, 19, '', 'Bijeljina'),
(57, 19, 'Trebinje', ''),
(58, 20, 'Podgorica', ''),
(59, 20, 'Herceg Novi', ''),
(60, 20, 'Budva', ''),
(61, 21, 'Buenos Ajres', ''),
(62, 21, 'Rosario', ''),
(63, 21, 'Kordoba', ''),
(64, 22, 'Sao Paolo', ''),
(65, 22, 'Rio de Zeneiro', ''),
(66, 22, 'Brazilija', ''),
(67, 23, 'Kali', ''),
(68, 23, 'Bogota', ''),
(69, 23, 'Medelin', ''),
(70, 24, 'Montevideo', ''),
(71, 24, 'Salto', ''),
(72, 24, 'Rivera', ''),
(73, 25, 'Marakaibo', ''),
(74, 25, 'Karakas', ''),
(75, 25, 'Valensija', ''),
(76, 26, 'Kingston', ''),
(77, 26, 'Portmore', ''),
(78, 26, 'Mandevil', ''),
(79, 27, 'Toronto', ''),
(80, 27, 'Montreal', ''),
(81, 27, 'Vankuver', ''),
(82, 28, 'Havana', ''),
(83, 28, 'Kamagej', ''),
(84, 28, 'Santa Klara', ''),
(85, 29, 'Meksiko', ''),
(86, 29, 'Gvadalara', ''),
(87, 29, 'Puebla', ''),
(88, 30, 'Los Andjeles', ''),
(89, 30, 'Nju Jork', ''),
(90, 30, 'Cikago', '');

-- --------------------------------------------------------

--
-- Table structure for table `prevozi`
--

DROP TABLE IF EXISTS `prevozi`;
CREATE TABLE IF NOT EXISTS `prevozi` (
  `id_prevoza` int(255) NOT NULL,
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
  `opis` text NOT NULL,
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
  `nacin_placanja` varchar(255) NOT NULL,
  `broj_dece` int(11) NOT NULL,
  `broj_odraslih` int(11) NOT NULL,
  `komentar` text NOT NULL,
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
-- Table structure for table `smestaj`
--

DROP TABLE IF EXISTS `smestaj`;
CREATE TABLE IF NOT EXISTS `smestaj` (
  `id_smestaja` int(11) NOT NULL AUTO_INCREMENT,
  `tip_smestaja` varchar(255) NOT NULL,
  `naziv_objekta` varchar(255) DEFAULT NULL,
  `br_kreveta` int(11) DEFAULT NULL,
  `kategorija_smestaja` varchar(255) DEFAULT NULL,
  `internet_konekcija` tinyint(1) DEFAULT NULL,
  `tv` tinyint(1) DEFAULT NULL,
  `klima` tinyint(1) DEFAULT NULL,
  `frizider` tinyint(1) DEFAULT NULL,
  `sef` tinyint(1) DEFAULT NULL,
  `slika1` varchar(255) DEFAULT NULL,
  `slika2` varchar(255) DEFAULT NULL,
  `slika3` varchar(255) DEFAULT NULL,
  `slika4` varchar(255) DEFAULT NULL,
  `slika5` varchar(255) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_smestaja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`id_smestaja`, `tip_smestaja`, `naziv_objekta`, `br_kreveta`, `kategorija_smestaja`, `internet_konekcija`, `tv`, `klima`, `frizider`, `sef`, `slika1`, `slika2`, `slika3`, `slika4`, `slika5`, `slika`) VALUES
(1, 'Хотел', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Бунгалов', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

DROP TABLE IF EXISTS `tip_korisnika`;
CREATE TABLE IF NOT EXISTS `tip_korisnika` (
  `id_tipa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`id_tipa`, `naziv_tipa`) VALUES
(1, 'Корисник'),
(2, 'Администратор');

-- --------------------------------------------------------

--
-- Table structure for table `tip_prevoza`
--

DROP TABLE IF EXISTS `tip_prevoza`;
CREATE TABLE IF NOT EXISTS `tip_prevoza` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `br_sedista` int(11) DEFAULT NULL,
  `naziv` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tip_prevoza`
--

INSERT INTO `tip_prevoza` (`id`, `br_sedista`, `naziv`) VALUES
(6, 50, 'Аутобус'),
(7, 300, 'Авион'),
(8, 500, 'Крстарење'),
(9, 150, 'Воз'),
(10, NULL, 'Самостални превоз');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aranzman`
--
ALTER TABLE `aranzman`
  ADD CONSTRAINT `aranzman_ibfk_1` FOREIGN KEY (`id_smestaja`) REFERENCES `smestaj` (`id_smestaja`),
  ADD CONSTRAINT `aranzman_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `program_putovanja` (`id_programa`),
  ADD CONSTRAINT `aranzman_ibfk_3` FOREIGN KEY (`id_lokacije`) REFERENCES `lokacija` (`id_lokacije`);

--
-- Constraints for table `drzava`
--
ALTER TABLE `drzava`
  ADD CONSTRAINT `drzava_ibfk_1` FOREIGN KEY (`id_kontinenta`) REFERENCES `kontinent` (`id_kontinenta`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_tipa`) REFERENCES `tip_korisnika` (`id_tipa`);

--
-- Constraints for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD CONSTRAINT `lokacija_ibfk_1` FOREIGN KEY (`id_drzava`) REFERENCES `drzava` (`id_drzava`);

--
-- Constraints for table `prevozi`
--
ALTER TABLE `prevozi`
  ADD CONSTRAINT `prevozi_ibfk_2` FOREIGN KEY (`id_aranzmana`) REFERENCES `aranzman` (`id_aranzmana`),
  ADD CONSTRAINT `prevozi_ibfk_3` FOREIGN KEY (`id_prevoza`) REFERENCES `tip_prevoza` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
