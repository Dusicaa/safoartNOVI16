
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2016 at 08:01 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u649158088_sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
  `id_ankete` int(10) NOT NULL AUTO_INCREMENT,
  `pitanje` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aktivna` int(1) NOT NULL,
  PRIMARY KEY (`id_ankete`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_ankete`, `pitanje`, `aktivna`) VALUES
(1, 'Da li volite umetnost?', 1),
(2, 'Da li Vam se svidja sajt?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE IF NOT EXISTS `artikli` (
  `idArtikla` int(100) NOT NULL AUTO_INCREMENT,
  `imeArtikla` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `putanjaArtikla` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cena_artikla` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `naslov_artikla` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idArtikla`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`idArtikla`, `imeArtikla`, `putanjaArtikla`, `cena_artikla`, `naslov_artikla`) VALUES
(1, 'vaza', './galerija/p1.jpg', '5000 rsd', 'Vaza sa cvećem.Tempera na dasci.'),
(2, 'naselje', './galerija/p2.jpg', '1000 rsd', 'Skica sa običnom olovkom...'),
(3, 'tango', './galerija/p3.jpg', '1500 rsd', 'Tango...Radjena pigmentom na pergamentu.'),
(4, 'mačka', './galerija/p4.jpg', '3500rsd', 'Mačka na prozoruuu.Radjena pastelom.'),
(5, 'grad', './galerija/p5.jpg', '4500 rsd', 'Grad na moru.Kombinovana tehnika na platnu.'),
(6, 'pogled', './galerija/p6.jpg', '4500 rsd', 'Pogled sa prozora.Kombinovana tehnika na platnu.');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE IF NOT EXISTS `galerija` (
  `idGal` int(11) NOT NULL AUTO_INCREMENT,
  `imeGal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `putanjaGal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opisGal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idGal`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`idGal`, `imeGal`, `putanjaGal`, `opisGal`) VALUES
(1, 'ikone', './galerija/ikone_1.jpg', 'sveti Jovan'),
(2, 'ikone', './galerija/ikone_2.jpg', 'freska Bogorodice'),
(3, 'ikone', './galerija/ikone_3.jpg', 'arh.Mihail 1'),
(4, 'ikone', './galerija/ikone_4.jpg', 'skidanje Isusa sa krsta'),
(5, 'ikone', './galerija/ikone_5.jpg', 'Isus'),
(6, 'ikone', './galerija/ikone_6.jpg', 'sveti Petar'),
(7, 'ikone', './galerija/ikone_7.jpg', 'arh.Mihail 2'),
(8, 'ikone', './galerija/ikone_8.jpg', 'arh.Mihail 3'),
(9, 'ikone', './galerija/ikone_9.jpg', 'Isus Hrist'),
(20, 'morski', './galerija/morski_1.jpg', 'morski_1'),
(12, 'morski', './galerija/morski_2.jpg', 'morski_2'),
(13, 'morski', './galerija/morski_3.jpg', 'morski_3'),
(14, 'morski', './galerija/morski_4.jpg', 'morski_4'),
(15, 'razno', './galerija/razno_1.jpg', 'razno_1'),
(16, 'razno', './galerija/razno_2.jpg', 'razno_2'),
(17, 'vitezovi', './galerija/vitezovi_1.jpg', 'razočarani pobednici'),
(18, 'vitezovi', './galerija/vitezovi_2.jpg', 'fobos'),
(19, 'vitezovi', './galerija/vitezovi_3.jpg', 'vitezovi_3'),
(10, 'ikone', './galerija/ikone_10.jpg', 'Devica Marija'),
(11, 'ikone', './galerija/ikone_11.jpg', 'Konstantin Veliki');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id_komentara` int(10) NOT NULL AUTO_INCREMENT,
  `id_korisnika` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `poruka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_komentara`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id_komentara`, `id_korisnika`, `poruka`) VALUES
(28, '2', 'Svidjaju mi se slike'),
(29, '2', 'Svidjaju mi se slike'),
(30, '2', 'Svidjaju mi se slike'),
(31, '1', 'hjjikkll');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `ime_prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `god` int(10) NOT NULL,
  `lozinka` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pol` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `id_uloge` int(5) NOT NULL,
  PRIMARY KEY (`id_korisnika`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime_prezime`, `korisnicko_ime`, `mail`, `god`, `lozinka`, `pol`, `id_uloge`) VALUES
(1, 'Admin', 'admin', 'dusicacakic@gmail.com', 9071988, '2005', 'z', 1),
(2, 'Dusica Cakic', 'duca', 'duca@gmail.com', 9071988, '20052010', 'z', 1),
(3, 'Pera Peric', 'pera', 'pera@gmail.com', 507337200, 'pera', 'M', 2),
(5, 'Aca Braca', 'aca', 'acabraca@gmail.com', 510019200, 'asd', 'M', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE IF NOT EXISTS `korpa` (
  `id_korpe` int(10) NOT NULL AUTO_INCREMENT,
  `idArtikla` int(10) NOT NULL,
  `kolicina_artikla` int(10) NOT NULL,
  `id_korisnika` int(20) NOT NULL,
  `datum` char(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_korpe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(50) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `x` int(15) NOT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tezina` int(50) NOT NULL,
  `roditelj` int(50) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `ime`, `x`, `link`, `tezina`, `roditelj`) VALUES
(5, 'Registracija', 5, './registracija.php', 0, 0),
(4, 'O autoru', 4, './oautoru.php', 0, 0),
(2, 'Prodaja slika', 2, './prodaja.php', 0, 0),
(10, 'Admin', 6, './admin.php', 0, 0),
(9, 'razno', 0, './razno.php', 0, 3),
(8, 'vitezovi', 0, './vitezovi.php', 0, 3),
(7, 'ikone i sakralne slike', 0, './ikone.php', 0, 3),
(6, 'morski motivi', 0, './morskimotivi.php', 0, 3),
(3, 'Galerija', 3, '##', 0, 0),
(1, 'Početna', 1, './index.php', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE IF NOT EXISTS `odgovori` (
  `id_odgovori` int(15) NOT NULL AUTO_INCREMENT,
  `id_ankete` int(10) NOT NULL,
  `odgovori` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_odgovori`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id_odgovori`, `id_ankete`, `odgovori`) VALUES
(1, 1, 'Da'),
(2, 1, 'Ne'),
(3, 1, 'Onako');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nazivPosta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `post`, `slika`, `nazivPosta`) VALUES
(1, 'Marija Sapho, je mlada i perspektivna umetnica. Motivi za njena dela su bazirani na različitim temama:ljubav, primorje, istorija i religija. Njena dela rađena po porudzbini, krase neke od bitnijih religijskih institucija u Republici Srbiji. \n<a href=''oautoru.php''>Više o ovome...</a>\n\n', 'galerija/safo.jpg', 'Umetnik|Hobista|Tradicionalna umetnost');

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE IF NOT EXISTS `rezultat` (
  `id_rezultat` int(10) NOT NULL AUTO_INCREMENT,
  `id_ankete` int(10) NOT NULL,
  `id_odgovori` int(10) NOT NULL,
  `rezultat` int(10) NOT NULL,
  PRIMARY KEY (`id_rezultat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rezultat`
--

INSERT INTO `rezultat` (`id_rezultat`, `id_ankete`, `id_odgovori`, `rezultat`) VALUES
(1, 1, 2, 3),
(2, 1, 1, 11),
(3, 1, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `idSlike` int(20) NOT NULL AUTO_INCREMENT,
  `imeSlike` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `putanjaSlike` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opisSlike` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idSlike`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`idSlike`, `imeSlike`, `putanjaSlike`, `opisSlike`) VALUES
(1, 'sliderC', './img/home/slider_3.jpg', 'jezero'),
(2, 'sliderD', './img/home/slider_1.jpg', 'reka'),
(3, 'sliderE', './img/home/slider_2.jpg', 'more');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE IF NOT EXISTS `uloge` (
  `id_uloge` int(11) NOT NULL AUTO_INCREMENT,
  `uloga` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_uloge`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloge`, `uloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
