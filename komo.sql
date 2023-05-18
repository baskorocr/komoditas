-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komo`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakomoditas`
--

CREATE TABLE `datakomoditas` (
  `kode` varchar(4) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakomoditas`
--

INSERT INTO `datakomoditas` (`kode`, `nama`) VALUES
('K001', 'terigu'),
('K002', 'serai'),
('K003', 'padi'),
('K004', 'beras');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `date` date NOT NULL,
  `komoditas_kode` varchar(4) NOT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`date`, `komoditas_kode`, `jumlah`) VALUES
('2022-10-05', 'K002', 70000),
('2022-10-08', 'K002', 50),
('2022-10-15', 'K001', 40000),
('2022-10-16', 'K001', 50000),
('2022-10-17', 'K001', 50000),
('2022-10-20', 'K001', 50000),
('2022-10-25', 'K001', 40000),
('2022-10-29', 'K002', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakomoditas`
--
ALTER TABLE `datakomoditas`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`date`),
  ADD KEY `kode_FK_1` (`komoditas_kode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `kode_FK_1` FOREIGN KEY (`komoditas_kode`) REFERENCES `datakomoditas` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
