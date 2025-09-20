-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disarpras`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_sarana`
--

CREATE TABLE `foto_sarana` (
  `id_foto` int(11) NOT NULL,
  `id_sarana` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_sarana`
--

INSERT INTO `foto_sarana` (`id_foto`, `id_sarana`, `keterangan`, `foto`) VALUES
(5, 2, '', '1758377518_e8921aa0643d9f19043a.jpg'),
(6, 1, '', '1758379554_d83fbbeb7aeed3b04575.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_sarana`
--
ALTER TABLE `foto_sarana`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_sarana` (`id_sarana`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_sarana`
--
ALTER TABLE `foto_sarana`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_sarana`
--
ALTER TABLE `foto_sarana`
  ADD CONSTRAINT `foto_sarana_ibfk_1` FOREIGN KEY (`id_sarana`) REFERENCES `sarana` (`id_sarana`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
