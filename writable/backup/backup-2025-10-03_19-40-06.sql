-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: disarpras
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `foto_sarana`
--

DROP TABLE IF EXISTS `foto_sarana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_sarana` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_sarana` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_sarana` (`id_sarana`),
  CONSTRAINT `foto_sarana_ibfk_1` FOREIGN KEY (`id_sarana`) REFERENCES `sarana` (`id_sarana`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_sarana`
--

LOCK TABLES `foto_sarana` WRITE;
/*!40000 ALTER TABLE `foto_sarana` DISABLE KEYS */;
INSERT INTO `foto_sarana` VALUES (5,2,'','1758377518_e8921aa0643d9f19043a.jpg'),(6,1,'','1758379554_d83fbbeb7aeed3b04575.png'),(7,1,'','1758990756_179ea44cb02a73210df9.png');
/*!40000 ALTER TABLE `foto_sarana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `id_jenis` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` VALUES (2,'Olahraga','alat olahraga','1759158538_9550a77613a76f326f97.jpg'),(4,'Elektronik','Barang Elektronik','1758370924_d3ad7abb06853af59f41.png'),(5,'Pakaian','pakeeun','1758990704_5091b7d97bc11b6c2a6c.png');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_sarana` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('pending','disetujui','ditolak','dikembalikan','dipinjam','cancel') DEFAULT 'pending',
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (1,3,1,'2025-09-29','2025-09-29','disetujui'),(2,7,2,'2025-09-30','2025-10-08','disetujui'),(5,3,2,'2025-09-24','2025-09-28','ditolak');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_profil` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (1,'Ahmad Mauludin','Cisarua','9879438787','ahmad.mauludin247@guru.smk.belajar.id','12','aktiv',1);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sarana`
--

DROP TABLE IF EXISTS `sarana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sarana` (
  `id_sarana` int(11) NOT NULL AUTO_INCREMENT,
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
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_sarana`),
  UNIQUE KEY `kode_sarana` (`kode_sarana`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sarana`
--

LOCK TABLES `sarana` WRITE;
/*!40000 ALTER TABLE `sarana` DISABLE KEYS */;
INSERT INTO `sarana` VALUES (1,'123','Bola Basket',2,'Mizuno','M12','234423',30.00,30.00,30.00,1.00,'Karet Mentah','Merah',2,'Baik','Ruang Guru','Tidak','2025-09-01','BOS',23000.00,'Kitu weh'),(2,'345','Laptop',4,'Lenovo','Ideapad Slim 5','87687634543',35.00,30.00,4.00,2.00,'Metal','Silver',3,'Baik','Lab','Boleh','2025-09-04','BOS',5000000.00,'Jaga'),(3,'uyt86','Bola Voly',2,'Mizuno','xncvn','tyrt56765',30.00,30.00,30.00,1.00,'Karet','Silver',2,'Rusak Ringan','Ruang Guru','Boleh','2025-09-20','BOS',23000.00,'jhfgjhfjhf');
/*!40000 ALTER TABLE `sarana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ahmad Mauludin','ahmad','$2y$10$iCFf0dZ4itSOzGM1MwuQZuTUnfwTBS/VCwpo75zcdb2Gncdy3mkda','admin','1758302595_f9f7708b54b2a01e1df7.png','2025-09-19 17:33:28'),(3,'Saheela Meera','saheela','$2y$10$s10ibmJk1XDALP.r0cHJVOmKLvk5GtXPm/u0CLLDUgDeV8sDF.PrK','siswa','1758378047_a917308ada95337e09a4.png','2025-09-20 14:20:47'),(6,'Fauzi Rachman, S.HI','fauzi','$2y$10$VW/aX1JoCIFESduo06DHt.BRY9gzMAnECHCC6sk0QMbg.PG9YsVka','kepsek','1759162776_34b3aacb55bd1eeaf236.png','2025-09-29 16:19:36'),(7,'maldin','maldin','$2y$10$DZ5jfmekNUondDjXp3W2o.3mvgSzbwcwKVMulB6yqDjnXfziNKtjC','guru','1759165989_4c6d6f364fcdd36e6480.png','2025-09-29 17:13:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-04  2:40:07
