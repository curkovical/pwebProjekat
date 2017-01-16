-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 01:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `administracija`
--

CREATE TABLE `administracija` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administracija`
--

INSERT INTO `administracija` (`adminId`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE `klijent` (
  `idKlijent` int(11) NOT NULL,
  `Ime` varchar(45) DEFAULT NULL,
  `Prezime` varchar(45) DEFAULT NULL,
  `Firma` varchar(45) DEFAULT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `brojTelefona` varchar(45) DEFAULT NULL,
  `Zemlja` varchar(45) DEFAULT NULL,
  `idProjekat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `idPartner` int(11) NOT NULL,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `Firma` varchar(45) DEFAULT NULL,
  `brojTelefona` varchar(30) DEFAULT NULL,
  `Zemlja` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partner_projekta`
--

CREATE TABLE `partner_projekta` (
  `idProjekat` int(11) NOT NULL,
  `idPartner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projekat`
--

CREATE TABLE `projekat` (
  `idProjekat` int(11) NOT NULL,
  `naziv` varchar(80) DEFAULT NULL,
  `Broj_clanova` int(11) DEFAULT NULL,
  `Datum_pocetka` date DEFAULT NULL,
  `Datum_kraja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `idZaposleni` int(11) NOT NULL,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `brojTelefona` varchar(30) DEFAULT NULL,
  `stepenStudija` varchar(10) DEFAULT NULL,
  `Struka` varchar(100) DEFAULT NULL,
  `Plata` int(11) NOT NULL,
  `Zemlja` varchar(45) DEFAULT NULL COMMENT '\n',
  `datumZaposlenja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administracija`
--
ALTER TABLE `administracija`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `klijent`
--
ALTER TABLE `klijent`
  ADD PRIMARY KEY (`idKlijent`),
  ADD KEY `idProjekat` (`idProjekat`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`idPartner`);

--
-- Indexes for table `partner_projekta`
--
ALTER TABLE `partner_projekta`
  ADD KEY `idProjekt` (`idProjekat`),
  ADD KEY `idPartner` (`idPartner`);

--
-- Indexes for table `projekat`
--
ALTER TABLE `projekat`
  ADD PRIMARY KEY (`idProjekat`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`idZaposleni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administracija`
--
ALTER TABLE `administracija`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `klijent`
--
ALTER TABLE `klijent`
  MODIFY `idKlijent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `idPartner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `projekat`
--
ALTER TABLE `projekat`
  MODIFY `idProjekat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `idZaposleni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `klijent`
--
ALTER TABLE `klijent`
  ADD CONSTRAINT `klijent_ibfk_1` FOREIGN KEY (`idProjekat`) REFERENCES `projekat` (`idProjekat`);

--
-- Constraints for table `partner_projekta`
--
ALTER TABLE `partner_projekta`
  ADD CONSTRAINT `partner_projekta_ibfk_1` FOREIGN KEY (`idProjekat`) REFERENCES `projekat` (`idProjekat`),
  ADD CONSTRAINT `partner_projekta_ibfk_2` FOREIGN KEY (`idPartner`) REFERENCES `partner` (`idPartner`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
