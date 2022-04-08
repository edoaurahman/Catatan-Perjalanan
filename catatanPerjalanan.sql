-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2022 at 02:20 AM
-- Server version: 10.7.3-MariaDB
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catatanPerjalanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id`, `NIK`, `tanggal`, `jam`, `lokasi`, `suhu`) VALUES
(3, '3522110504040006', '2022-03-08', '00:25:00', 'SMKN 4 Bojonegoro', '36,7'),
(5, '3522110504040006', '2022-03-08', '02:37:00', 'Rumah', '38'),
(6, '3522110504040006', '2022-04-08', '02:00:00', 'SMKN 4 Bojonegoro', '36'),
(7, '3522110504040006', '2022-04-08', '02:16:00', 'KDS Bojonegoro', '37,5');

-- --------------------------------------------------------

--
-- Table structure for table `maps_location`
--

CREATE TABLE `maps_location` (
  `id_maps` int(11) NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_catatan` int(11) NOT NULL,
  `NIK` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps_location`
--

INSERT INTO `maps_location` (`id_maps`, `latitude`, `longitude`, `id_catatan`, `NIK`) VALUES
(2, '-7.180832576775863', '111.90812319472046', 3, '3522110504040006'),
(4, '-7.096005878047547', '112.02552795410156', 5, '3522110504040006'),
(5, '-7.1806922283407735', '111.90815448760986', 6, '3522110504040006'),
(6, '-7.162723639455065', '111.89695358276367', 7, '3522110504040006');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NIK`, `nama`, `foto`, `password`, `level`) VALUES
(1, '3522110504040006', 'Edo', 'pas foto.png', 'edo24123', 'user'),
(2, '3522110504040007', 'admin', 'pas foto.png', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `maps_location`
--
ALTER TABLE `maps_location`
  ADD PRIMARY KEY (`id_maps`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIK` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `maps_location`
--
ALTER TABLE `maps_location`
  MODIFY `id_maps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `users` (`NIK`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
