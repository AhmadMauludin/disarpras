-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 06:26 PM
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
-- Table structure for table `sarana`
--

CREATE TABLE `sarana` (
  `id_sarana` int(11) NOT NULL,
  `kode_sarana` varchar(20) NOT NULL,
  `nama_sarana` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `nomor_seri` varchar(100) DEFAULT NULL,
  `panjang` decimal(10,2) DEFAULT NULL,
  `lebar` decimal(10,2) DEFAULT NULL,
  `tinggi` decimal(10,2) DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `bahan` varchar(100) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL DEFAULT 'Baik',
  `lokasi` varchar(100) NOT NULL,
  `pinjam` enum('Boleh','Tidak') NOT NULL DEFAULT 'Boleh',
  `tanggal_pengadaan` date NOT NULL,
  `sumber_anggaran` varchar(100) DEFAULT 'Sekolah',
  `harga_satuan` decimal(15,2) DEFAULT 0.00,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sarana`
--

INSERT INTO `sarana` (`id_sarana`, `kode_sarana`, `nama_sarana`, `id_jenis`, `merk`, `tipe`, `nomor_seri`, `panjang`, `lebar`, `tinggi`, `berat`, `bahan`, `warna`, `jumlah`, `kondisi`, `lokasi`, `pinjam`, `tanggal_pengadaan`, `sumber_anggaran`, `harga_satuan`, `keterangan`) VALUES
(1, '123', 'Bola Basket', 2, 'Mizuno', 'M12', '234423', 30.00, 30.00, 30.00, 1.00, 'Karet Mentah', 'Merah', 2, 'Baik', 'Ruang Guru', 'Tidak', '2025-09-01', 'BOS', 23000.00, 'Kitu weh'),
(2, '345', 'Laptop', 4, 'Lenovo', 'Ideapad Slim 5', '87687634543', 35.00, 30.00, 4.00, 2.00, 'Metal', 'Silver', 3, 'Baik', 'Lab', 'Boleh', '2025-09-04', 'BOS', 5000000.00, 'Jaga'),
(3, 'uyt86', 'Bola Voly', 2, 'Mizuno', 'xncvn', 'tyrt56765', 30.00, 30.00, 30.00, 1.00, 'Karet', 'Silver', 2, 'Rusak Ringan', 'Ruang Guru', 'Boleh', '2025-09-20', 'BOS', 23000.00, 'jhfgjhfjhf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`id_sarana`),
  ADD UNIQUE KEY `kode_sarana` (`kode_sarana`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id_sarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
