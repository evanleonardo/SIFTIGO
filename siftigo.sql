-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 11:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siftigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `EmailMhs` varchar(30) NOT NULL,
  `NIM` char(8) NOT NULL,
  `NamaMhs` varchar(100) DEFAULT NULL,
  `PassMhs` text NOT NULL,
  `tahun` char(4) DEFAULT NULL,
  `IdTim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pgw`
--

CREATE TABLE `pgw` (
  `EmailPgw` varchar(30) NOT NULL,
  `NIK` char(8) NOT NULL,
  `NamaPgw` varchar(100) DEFAULT NULL,
  `PassPgw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `IdTim` int(11) NOT NULL,
  `EmailPgw` varchar(30) DEFAULT NULL,
  `NamaTim` varchar(100) NOT NULL,
  `PoinTim` int(11) DEFAULT NULL,
  `stattim` tinyint(4) DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `IdTodo` int(11) NOT NULL,
  `tahun` char(4) DEFAULT NULL,
  `NamaTodo` varchar(100) NOT NULL,
  `StatTodo` tinyint(1) NOT NULL,
  `KetTodo` text NOT NULL,
  `EmailPgw` varchar(30) NOT NULL,
  `TglMTodo` datetime NOT NULL,
  `TglSTodo` datetime NOT NULL,
  `Lat` decimal(8,6) DEFAULT NULL,
  `Lng` decimal(9,6) DEFAULT NULL,
  `PoinTodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uptodomhs`
--

CREATE TABLE `uptodomhs` (
  `IdUp` int(11) NOT NULL,
  `IdTodo` int(11) NOT NULL,
  `EmailMhs` varchar(30) NOT NULL,
  `TglUp` datetime NOT NULL,
  `KetUp` text NOT NULL,
  `FotoUp` varchar(50) DEFAULT NULL,
  `LatitudesUp` decimal(8,6) DEFAULT NULL,
  `LongitudesUp` decimal(9,6) DEFAULT NULL,
  `poinup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`EmailMhs`),
  ADD UNIQUE KEY `EmailMhs` (`EmailMhs`),
  ADD UNIQUE KEY `NIM` (`NIM`),
  ADD KEY `FK_TIMMHSS` (`IdTim`);

--
-- Indexes for table `pgw`
--
ALTER TABLE `pgw`
  ADD PRIMARY KEY (`EmailPgw`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD UNIQUE KEY `EmailPgw` (`EmailPgw`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`IdTim`),
  ADD KEY `FK_EmailTim` (`EmailPgw`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`IdTodo`),
  ADD KEY `FK_TodoPgw` (`EmailPgw`);

--
-- Indexes for table `uptodomhs`
--
ALTER TABLE `uptodomhs`
  ADD PRIMARY KEY (`IdUp`),
  ADD KEY `FK_UpTodo` (`IdTodo`),
  ADD KEY `FK_UpMhs` (`EmailMhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `IdTim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `IdTodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `uptodomhs`
--
ALTER TABLE `uptodomhs`
  MODIFY `IdUp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `FK_TIMMHSS` FOREIGN KEY (`IdTim`) REFERENCES `tim` (`IdTim`);

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `FK_EmailTim` FOREIGN KEY (`EmailPgw`) REFERENCES `pgw` (`EmailPgw`);

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `FK_TodoPgw` FOREIGN KEY (`EmailPgw`) REFERENCES `pgw` (`EmailPgw`);

--
-- Constraints for table `uptodomhs`
--
ALTER TABLE `uptodomhs`
  ADD CONSTRAINT `FK_UpMhs` FOREIGN KEY (`EmailMhs`) REFERENCES `mhs` (`EmailMhs`),
  ADD CONSTRAINT `FK_UpTodo` FOREIGN KEY (`IdTodo`) REFERENCES `todo` (`IdTodo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
