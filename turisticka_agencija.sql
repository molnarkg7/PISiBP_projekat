DROP DATABASE IF EXISTS `turisticka_agencija`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `turisticka_agencija` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `turisticka_agencija`;

DROP TABLE IF EXISTS `aranzman`;
CREATE TABLE IF NOT EXISTS `aranzman` (
  `id_aranzmana` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_aranzmana`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

DROP TABLE IF EXISTS `dani`;
CREATE TABLE IF NOT EXISTS `dani` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `redni_br_dana` int(11) NOT NULL,
  `id_ponude` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `opis` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ponude` (`id_ponude`),
  KEY `id_programa` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

DROP TABLE IF EXISTS `drzava`;
CREATE TABLE IF NOT EXISTS `drzava` (
  `id_drzava` int(11) NOT NULL AUTO_INCREMENT,
  `id_kontinenta` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_drzava`),
  KEY `id_kontinenta` (`id_kontinenta`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

DROP TABLE IF EXISTS `fakultativne_aktivnosti`;
CREATE TABLE IF NOT EXISTS `fakultativne_aktivnosti` (
  `id_aktivnosti` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `opis` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_aktivnosti`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `fakultativne_aktivnosti` (`id_aktivnosti`, `naziv`, `opis`) VALUES
(1, 'Poseta banje', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(2, 'Poseta jezera', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(3, 'Poseta stadiona', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(4, 'Poseta muzeja', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(5, 'Poseta opere', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(6, 'Setnja parkom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(7, 'Zurka u klubu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(8, 'Zurka na brodu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(9, 'Fakultativno krstarenje', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. '),
(10, 'Poseta soping centru', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse interdum consectetur libero id. Proin sagittis nisl rhoncus mattis rhoncus urna. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Suscipit tellus mauris a diam maecenas sed. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Eget sit amet tellus cras adipiscing enim eu turpis egestas. ');

DROP TABLE IF EXISTS `kontinent`;
CREATE TABLE IF NOT EXISTS `kontinent` (
  `id_kontinenta` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_kontinenta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `kontinent` (`id_kontinenta`, `naziv`) VALUES
(1, 'Azija'),
(2, 'Afrika'),
(3, 'Australija'),
(4, 'Evropa'),
(5, 'Juzna Amerika'),
(6, 'Severna Amerika');

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sifra` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kontakt_telefon` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_tipa` int(11) NOT NULL,
  PRIMARY KEY (`id_korisnika`),
  KEY `id_tipa` (`id_tipa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `korisnik` (`id_korisnika`, `username`, `sifra`, `ime`, `prezime`, `kontakt_telefon`, `email`, `id_tipa`) VALUES
(2, 'uros', '123', 'Урош', 'Милошевић', '0614111002', 'milosevicurose14@gmail.com', 1),
(3, 'uross', '123', 'Урош', 'Милошевић', '0614111002', 'milosevicurose14@gmail.com', 1);

DROP TABLE IF EXISTS `lokacija`;
CREATE TABLE IF NOT EXISTS `lokacija` (
  `id_lokacije` int(11) NOT NULL AUTO_INCREMENT,
  `id_drzava` int(11) NOT NULL,
  `mesto` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `slika` longtext COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_lokacije`),
  KEY `id_drzava` (`id_drzava`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
(56, 19, 'Bijeljina', ''),
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

DROP TABLE IF EXISTS `ponuda`;
CREATE TABLE IF NOT EXISTS `ponuda` (
  `id_ponude` int(11) NOT NULL AUTO_INCREMENT,
  `termin_polazak` date NOT NULL,
  `termin_povratak` date NOT NULL,
  `cena_putovanja` float NOT NULL,
  `cena_prevoza` int(11) NOT NULL,
  `id_prevoza` int(11) NOT NULL,
  `id_lokacije_polaska` int(11) NOT NULL,
  PRIMARY KEY (`id_ponude`),
  KEY `id_lokacije_polaska` (`id_lokacije_polaska`),
  KEY `id_prevoza` (`id_prevoza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

DROP TABLE IF EXISTS `program_putovanja`;
CREATE TABLE IF NOT EXISTS `program_putovanja` (
  `id_programa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `program_putovanja` (`id_programa`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50);

DROP TABLE IF EXISTS `provodi`;
CREATE TABLE IF NOT EXISTS `provodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `br_dana` int(11) NOT NULL,
  `id_lokacije` int(11) NOT NULL,
  `id_smestaja` int(11) NOT NULL,
  `id_ponude` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lokacije` (`id_lokacije`),
  KEY `id_smestaja` (`id_smestaja`),
  KEY `id_ponude` (`id_ponude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

DROP TABLE IF EXISTS `sadrzi_ativnosti`;
CREATE TABLE IF NOT EXISTS `sadrzi_ativnosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_programa` int(11) NOT NULL,
  `id_aktivnosti` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aktivnosti` (`id_aktivnosti`),
  KEY `id_programa` (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=853 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `sadrzi_ativnosti` (`id`, `id_programa`, `id_aktivnosti`) VALUES
(616, 4, 3),
(617, 5, 3),
(618, 6, 7),
(682, 3, 1),
(701, 3, 7),
(729, 6, 1),
(730, 7, 10),
(740, 5, 2),
(744, 4, 4),
(751, 2, 6),
(767, 3, 10),
(769, 5, 7),
(773, 4, 1),
(774, 5, 5),
(775, 6, 9),
(781, 4, 8),
(787, 5, 8),
(789, 7, 3),
(790, 8, 2),
(793, 1, 10),
(798, 1, 9),
(800, 2, 2),
(801, 3, 5),
(803, 5, 10),
(804, 6, 10),
(807, 3, 9),
(809, 5, 1),
(812, 3, 8),
(813, 4, 6),
(814, 5, 6),
(815, 6, 6),
(816, 7, 2),
(821, 2, 4),
(823, 1, 2),
(824, 2, 5),
(825, 3, 4),
(826, 4, 2),
(829, 2, 7),
(830, 1, 6),
(831, 2, 3),
(834, 1, 4),
(835, 1, 1),
(837, 2, 8),
(838, 1, 3),
(840, 3, 2),
(841, 4, 10),
(842, 1, 7),
(843, 2, 1),
(844, 3, 3),
(845, 4, 9),
(846, 5, 9),
(847, 1, 5),
(848, 2, 10),
(849, 1, 8),
(850, 2, 9),
(851, 3, 6),
(852, 4, 7);

DROP TABLE IF EXISTS `sadrzi_ponude`;
CREATE TABLE IF NOT EXISTS `sadrzi_ponude` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aranzmana` int(11) NOT NULL,
  `id_ponude` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aranzmana` (`id_aranzmana`,`id_ponude`),
  KEY `id_ponude` (`id_ponude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

DROP TABLE IF EXISTS `smestaj`;
CREATE TABLE IF NOT EXISTS `smestaj` (
  `id_smestaja` int(11) NOT NULL AUTO_INCREMENT,
  `tip_smestaja` int(11) NOT NULL,
  `naziv_objekta` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `br_kreveta` int(11) DEFAULT NULL,
  `kategorija_smestaja` int(11) DEFAULT NULL,
  `internet_konekcija` int(11) DEFAULT NULL,
  `tv` int(11) DEFAULT NULL,
  `klima` int(11) DEFAULT NULL,
  `frizider` int(11) DEFAULT NULL,
  `sef` int(11) DEFAULT NULL,
  `slika1` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  `slika2` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  `slika3` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  `slika4` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  `slika5` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  `slika` longtext COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id_smestaja`),
  KEY `tip_smestaja` (`tip_smestaja`,`br_kreveta`),
  KEY `br_kreveta` (`br_kreveta`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

DROP TABLE IF EXISTS `tip_korisnika`;
CREATE TABLE IF NOT EXISTS `tip_korisnika` (
  `id_tipa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_tipa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `tip_korisnika` (`id_tipa`, `naziv_tipa`) VALUES
(1, 'Корисник'),
(2, 'Администратор');

DROP TABLE IF EXISTS `tip_nocenja`;
CREATE TABLE IF NOT EXISTS `tip_nocenja` (
  `id_tipa` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_tipa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `tip_nocenja` (`id_tipa`, `naziv`) VALUES
(1, 'Хотелски'),
(2, 'Бунгалов');

DROP TABLE IF EXISTS `tip_prevoza`;
CREATE TABLE IF NOT EXISTS `tip_prevoza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `br_sedista` int(11) DEFAULT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `tip_prevoza` (`id`, `br_sedista`, `naziv`) VALUES
(1, 50, 'Аутобус'),
(2, 300, 'Авион'),
(3, 500, 'Крстарење'),
(4, 150, 'Воз'),
(5, NULL, 'Самостални превоз');

DROP TABLE IF EXISTS `tip_smestaja`;
CREATE TABLE IF NOT EXISTS `tip_smestaja` (
  `id_tipa` int(11) NOT NULL,
  `varijanta` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_tipa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `tip_smestaja` (`id_tipa`, `varijanta`) VALUES
(1, '1/1'),
(2, '1/2'),
(3, '1/3'),
(4, '1/2+1'),
(5, '1/3+1'),
(6, '1/4');


ALTER TABLE `dani`
  ADD CONSTRAINT `dani_ibfk_1` FOREIGN KEY (`id_ponude`) REFERENCES `ponuda` (`id_ponude`),
  ADD CONSTRAINT `dani_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `program_putovanja` (`id_programa`);

ALTER TABLE `drzava`
  ADD CONSTRAINT `drzava_ibfk_1` FOREIGN KEY (`id_kontinenta`) REFERENCES `kontinent` (`id_kontinenta`);

ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_tipa`) REFERENCES `tip_korisnika` (`id_tipa`);

ALTER TABLE `lokacija`
  ADD CONSTRAINT `lokacija_ibfk_1` FOREIGN KEY (`id_drzava`) REFERENCES `drzava` (`id_drzava`);

ALTER TABLE `ponuda`
  ADD CONSTRAINT `ponuda_ibfk_1` FOREIGN KEY (`id_prevoza`) REFERENCES `tip_prevoza` (`id`),
  ADD CONSTRAINT `ponuda_ibfk_2` FOREIGN KEY (`id_lokacije_polaska`) REFERENCES `lokacija` (`id_lokacije`);

ALTER TABLE `provodi`
  ADD CONSTRAINT `provodi_ibfk_1` FOREIGN KEY (`id_ponude`) REFERENCES `ponuda` (`id_ponude`),
  ADD CONSTRAINT `provodi_ibfk_2` FOREIGN KEY (`id_lokacije`) REFERENCES `lokacija` (`id_lokacije`),
  ADD CONSTRAINT `provodi_ibfk_3` FOREIGN KEY (`id_smestaja`) REFERENCES `smestaj` (`id_smestaja`);

ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`);

ALTER TABLE `sadrzi_ativnosti`
  ADD CONSTRAINT `sadrzi_ativnosti_ibfk_1` FOREIGN KEY (`id_aktivnosti`) REFERENCES `fakultativne_aktivnosti` (`id_aktivnosti`),
  ADD CONSTRAINT `sadrzi_ativnosti_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `program_putovanja` (`id_programa`);

ALTER TABLE `sadrzi_ponude`
  ADD CONSTRAINT `sadrzi_ponude_ibfk_1` FOREIGN KEY (`id_aranzmana`) REFERENCES `aranzman` (`id_aranzmana`),
  ADD CONSTRAINT `sadrzi_ponude_ibfk_2` FOREIGN KEY (`id_ponude`) REFERENCES `ponuda` (`id_ponude`);

ALTER TABLE `smestaj`
  ADD CONSTRAINT `smestaj_ibfk_1` FOREIGN KEY (`br_kreveta`) REFERENCES `tip_smestaja` (`id_tipa`),
  ADD CONSTRAINT `smestaj_ibfk_2` FOREIGN KEY (`tip_smestaja`) REFERENCES `tip_nocenja` (`id_tipa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
