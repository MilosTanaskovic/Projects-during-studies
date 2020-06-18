-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 10:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilni_telefoni`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_anketa` int(5) NOT NULL,
  `odgovor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rezultat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `odgovor`, `rezultat`) VALUES
(1, 'Nokia', 11),
(2, 'Samsung', 10),
(3, 'Huawei', 6);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id_grad` int(5) NOT NULL,
  `naziv_grada` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pos_broj` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id_grad`, `naziv_grada`, `pos_broj`) VALUES
(1, 'Beograd', '11000'),
(2, 'Cacak', '32000');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici1`
--

CREATE TABLE `korisnici1` (
  `id_korisnik1` int(5) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_grad` int(5) NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici1`
--

INSERT INTO `korisnici1` (`id_korisnik1`, `ime`, `adresa`, `mail`, `pol`, `id_grad`, `user`, `password`) VALUES
(1, 'Milos Tanaskovic', 'Mije Kovacica 8', 'milostanaskovic12@gmail.com', 'muski', 2, 'admin', 'admin'),
(2, 'Dragana', 'vrancin', 'gidra@jj.com', 'zenski', 1, 'korisnici', 'korisnici'),
(4, 'Milos Tanaskovic', 'Mije Kovacica 3', 'milostanas@12gmail.com', 'M', 1, '', ''),
(5, 'Milos Tanaskovic', 'Mije Kovacica 3', 'milostanas12@gmail.com', 'M', 1, 'nikola', 'nikola'),
(6, 'Nikola Jankovic', 'klklkslaksl', 'milostanas@12gmail.com', 'M', 1, 'kalja', 'kalja'),
(7, 'Ime Prezime', 'Takovska 2', 'igor@gmailk.com', 'M', 1, 'lolipop', 'lolipop'),
(8, 'Milos Tanaskovic', 'mkjlklskklkl 3', 'milostanas12@gmail.com', 'M', 1, 'koloko', 'koloko'),
(9, 'Milos Tanaskovic', 'Mije Milogfgd 3', 'lklklklklk@l', 'M', 1, 'milos', 'milos');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id_meni` int(5) NOT NULL,
  `ime_linka` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `roditelj` int(5) NOT NULL,
  `id_uloge` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `ime_linka`, `link`, `roditelj`, `id_uloge`) VALUES
(1, 'POCETNA STRANA', 'index.php', 0, 2),
(2, 'UPIS', 'unos.php', 0, 1),
(3, 'KONTAKT', 'sidebar.php', 0, 2),
(4, 'GALERIJA', 'index.php', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int(5) NOT NULL,
  `id_proizvodjac` int(5) NOT NULL,
  `naziv_modela` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `link_model` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `id_proizvodjac`, `naziv_modela`, `link_model`) VALUES
(1, 1, 'Lumia 1020', 'galerija.php'),
(2, 1, 'Lumia 1320', 'galerija.php'),
(3, 1, 'Lumia 1520', 'galerija.php'),
(4, 1, 'Lumia 510', 'galerija.php'),
(5, 2, 'Galaxy Xcover 4', 'galerija.php'),
(6, 2, 'Galaxy C7 Pro', 'galerija.php'),
(7, 2, 'Galaxy J2 Ace', 'galerija.php'),
(8, 2, 'Galaxy J1', 'galerija.php'),
(9, 2, 'Galaxy A7 ', 'galerija.php'),
(10, 2, 'Galaxy A5', 'galerija.php'),
(11, 3, 'Huawei P9', ''),
(12, 3, 'Huawei Y6', ''),
(13, 3, 'Huawei Y5 II dual', ''),
(14, 3, 'Huawei P8 Lite dual', ''),
(15, 3, 'Huawei P9 Lite', '');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `id_proizvodjac` int(5) NOT NULL,
  `naziv_proizvodjaca` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`id_proizvodjac`, `naziv_proizvodjaca`) VALUES
(1, 'NOKIA'),
(2, 'SAMSUNG'),
(3, 'HUAWEI');

-- --------------------------------------------------------

--
-- Table structure for table `telefon`
--

CREATE TABLE `telefon` (
  `id_telefon` int(5) NOT NULL,
  `id_model` int(5) NOT NULL,
  `boja` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kamera` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status_slika` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `godina_proizvodnje` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telefon`
--

INSERT INTO `telefon` (`id_telefon`, `id_model`, `boja`, `kamera`, `status`, `slika`, `status_slika`, `cena`, `godina_proizvodnje`) VALUES
(1, 1, 'crna', 'Orijentacija sočiva: sa prednje strane,\r\nBroj piksela senzora: 1.2 megapiksela,\r\nRez. videa: 720px.', 'Novi', 'lumia1020.jpg', '0', 35000, 2012),
(2, 4, 'crna', 'trenutno nema kameru', 'Polovan', 'lumia510.jpg', '1', 15000, 2012),
(3, 6, 'bela', 'Broj piksela senzora : 5 megapiksela,\r\nRezolucija fotografija : 2592x1944 piksela.\r\n', 'Nov', 'galaxyc7.jpg', '0', 21000, 2016),
(4, 8, 'bela', 'Primarna kamera	5 MP,\r\nVideo	720p@30fps,\r\nPomoćna kamera	VGA.', 'Nov', 'galaxyj1.jpg', '1', 32000, 2015),
(5, 10, 'pink', '\r\nBroj piksela senzora : 16 megapiksela,\r\nRezolucija videa : (1080p) 1920x1080 piksela,\r\n', 'Polovan', 'galaxya5.jpg', '0', 27000, 2009),
(6, 3, 'crna', '20 MP, 4992 х 3744 pixels, Carl Zeiss optics, optical image stabilization, autofocus, dual-LED flash', 'Nov', 'lumia1520.jpg', '0', 42000, 2013),
(7, 7, 'pink', 'Prednja kamera rezolucije 5MP, glavna kamera 13MP sa autofokusom, video snimanje 1080p (30fps).', 'Polovan', 'galaxyj2ace.jpg', '0', 23000, 2013),
(8, 2, 'crna', 'Video zapip: check quality,\r\nZadnja kamera: 5 MP, 2592 х 1944, autofocus, LED flash, check quality.', 'Nov', 'lumia1320.jpg', '0', 31000, 0),
(9, 9, 'bela', 'Broj piksela senzora : 13.0 megapiksela,\r\nRezolucija fotografija : 4128x3096 piksela.', 'Nov', 'galaxyj1.jpg', '0', 28000, 2016),
(10, 5, 'siva', '2 MP prednja kamera, 5MP glavna kamera sa autofokusom, LED blic', 'Polovan', 'galaxy4.jpg', '1', 26000, 2010),
(11, 11, 'crna', '12 MP / 8 MP kamere', 'Nov', 'huaweip7.png', '0', 25000, 2014),
(12, 15, 'crna', '13 MP / 8 MP kamere', 'Nov', 'huaweip9.png', '1', 28000, 2016),
(13, 13, 'crna', '8 MP / 2 MP kamere,\r\nQuad-core / 1 GB platforma', 'Polovan', 'huaweiy6.png', '0', 18000, 2014),
(14, 12, 'crna', '8 MP / 2 MP kamere,\r\nQuad-core / 1 GB platforma', 'Nov', 'huaweiy5.png', '1', 29000, 2016),
(15, 14, 'crna', '13 MP / 5 MP kamere,\r\nOcta-core / 2 GB platforma', 'Nov', 'huaweip8.png', '1', 29000, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `uloga_korisnici`
--

CREATE TABLE `uloga_korisnici` (
  `id_uloga_korisnici` int(5) NOT NULL,
  `id_uloge` int(5) NOT NULL,
  `id_korisnik1` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga_korisnici`
--

INSERT INTO `uloga_korisnici` (`id_uloga_korisnici`, `id_uloge`, `id_korisnik1`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id_uloge` int(5) NOT NULL,
  `naziv_uloge` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloge`, `naziv_uloge`) VALUES
(1, 'admin'),
(2, 'korisnici');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id_grad`);

--
-- Indexes for table `korisnici1`
--
ALTER TABLE `korisnici1`
  ADD PRIMARY KEY (`id_korisnik1`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD PRIMARY KEY (`id_proizvodjac`);

--
-- Indexes for table `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`id_telefon`),
  ADD KEY `slika` (`slika`),
  ADD KEY `slika_2` (`slika`),
  ADD KEY `slika_3` (`slika`),
  ADD KEY `slika_4` (`slika`);

--
-- Indexes for table `uloga_korisnici`
--
ALTER TABLE `uloga_korisnici`
  ADD PRIMARY KEY (`id_uloga_korisnici`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id_uloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_anketa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id_grad` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `korisnici1`
--
ALTER TABLE `korisnici1`
  MODIFY `id_korisnik1` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  MODIFY `id_proizvodjac` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `telefon`
--
ALTER TABLE `telefon`
  MODIFY `id_telefon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `uloga_korisnici`
--
ALTER TABLE `uloga_korisnici`
  MODIFY `id_uloga_korisnici` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id_uloge` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
