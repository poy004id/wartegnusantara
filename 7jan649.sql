-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 12:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wn2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(10) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `id_kategori_bahan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama_bahan`, `jumlah`, `satuan`, `id_kategori_bahan`) VALUES
(1, 'Beras', 4556, 'kg', 1),
(2, 'Gula', 40, 'kg', 2),
(3, 'Garam', 500, 'gram', 2),
(5, 'Kangkung', 18, 'ikat', 5),
(7, 'Bawang merah', 20, 'kg', 2),
(8, 'Teh', 100, 'pack', 7),
(9, 'Telur', 30, 'kg', 17),
(10, 'Bawang Putih', 20, 'kg', 2),
(11, 'Tempe', 200, 'pack', 5),
(12, 'Tahu', 200, 'pack', 5),
(13, 'Ayam', 40, 'kg', 17),
(14, 'Tauge', 20, 'kg', 5),
(15, 'Wortel', 20, 'kg', 5),
(16, 'Ikan Tongkol', 5, 'kg', 17),
(17, 'Telur asin', 200, 'butir', 17),
(18, 'Cabai merah', 20, 'kg', 2),
(19, 'Es batu', 200, 'pack', 7),
(20, 'Nutrisari', 200, 'sachet', 7),
(21, 'White Coffe', 200, 'sachet', 7),
(22, 'Susu frisian flag coklat', 200, 'sachet', 7),
(23, 'Susu frisian flag putih', 200, 'sachet', 7),
(24, 'Cabai hijau', 10, 'kg', 2),
(25, 'Coffe goodday', 200, 'sachet', 7),
(26, 'Kopi gilus', 200, 'sachet', 7),
(27, 'Brokoloi', 20, 'kg', 5),
(28, 'Bunga Kol', 20, 'kg', 5),
(29, 'Asam jawa', 20, 'kg', 2),
(30, 'labu siam', 20, 'kg', 5),
(31, 'Terong', 10, 'kg', 5),
(32, 'Kacang panjang', 10, 'kg', 5),
(33, 'Daun salam', 10, 'kg', 5),
(34, 'Tomat', 10, 'kg', 5),
(35, 'Santan', 10, 'liter', 5),
(36, 'Kulit melinjo', 10, 'kg', 5),
(37, 'Jagung manis', 10, 'kg', 5),
(38, 'Air', 800, 'liter', 7),
(39, 'Tepung kentucky', 40, 'kg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(10) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_menu`, `jumlah`, `harga`) VALUES
(1, 301210001, 1, 30, 3000),
(2, 301210002, 1, 20, 3000),
(3, 301210003, 2, 10, 3000),
(4, 701210001, 1, 1, 3000),
(5, 701210001, 5, 1, 500),
(6, 701210001, 13, 1, 4000),
(7, 701210001, 21, 1, 1000),
(8, 701210002, 1, 1, 3000),
(9, 701210002, 5, 1, 500),
(10, 701210002, 17, 1, 500),
(11, 701210002, 6, 1, 5000),
(12, 701210003, 6, 1, 5000),
(13, 701210003, 22, 2, 3000),
(14, 701210003, 1, 3, 3000),
(15, 701210003, 2, 1, 3000),
(16, 701210003, 16, 4, 500),
(17, 701210003, 21, 4, 1000),
(18, 701210004, 1, 6, 3000),
(19, 701210004, 12, 6, 6000),
(20, 701210004, 17, 2, 500),
(21, 701210005, 2, 4, 3000),
(22, 701210005, 8, 4, 3000),
(23, 701210006, 1, 4, 3000),
(24, 701210006, 8, 4, 3000),
(25, 701210007, 1, 5, 3000),
(26, 701210007, 16, 5, 500),
(27, 701210007, 22, 5, 3000),
(28, 701210008, 2, 2, 3000),
(29, 701210008, 6, 2, 5000),
(30, 701210008, 24, 2, 4000),
(31, 701210009, 26, 6, 3000),
(32, 701210010, 2, 3, 3000),
(33, 701210010, 14, 3, 6000),
(34, 701210011, 1, 2, 3000),
(35, 701210011, 11, 2, 800),
(36, 701210011, 23, 2, 3000),
(37, 701210012, 8, 5, 3000),
(38, 701210013, 16, 4, 500),
(39, 701210013, 20, 4, 500),
(40, 701210014, 6, 10, 5000),
(41, 701210015, 20, 6, 500),
(42, 701210015, 21, 6, 1000),
(43, 701210016, 15, 2, 4000),
(44, 701210016, 1, 2, 3000),
(45, 701210017, 2, 6, 3000),
(46, 701210017, 14, 6, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_temp`
--

CREATE TABLE `detail_transaksi_temp` (
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bahan`
--

CREATE TABLE `kategori_bahan` (
  `id` int(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_bahan`
--

INSERT INTO `kategori_bahan` (`id`, `nama_kategori`, `status`) VALUES
(1, 'Makanan Utama', 'inactive'),
(2, 'Bumbu', 'active'),
(5, 'Sayuran', 'active'),
(6, 'Buah', 'active'),
(7, 'Minuman', 'active'),
(14, 'Lain lain', 'active'),
(15, 'Sambal ', 'inactive'),
(16, 'Sambal', 'active'),
(17, 'Lauk-pauk', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id` int(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id`, `nama_kategori`, `status`) VALUES
(1, 'Makanan Utama', 'active'),
(3, 'Lauk Pauk', 'active'),
(4, 'Sayur Mayur', 'active'),
(5, 'Sambal', 'active'),
(6, 'Gorengan', 'active'),
(7, 'Minuman', 'active'),
(8, 'Lain-lain', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `harga` int(5) NOT NULL,
  `id_kategori_menu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `jumlah`, `keterangan`, `harga`, `id_kategori_menu`) VALUES
(1, 'Nasi putih', -4, 'cuma nasi biasa aja bukan nasi kaya', 3000, 1),
(2, 'Nasi uduk', 4, 'rasanya gurih', 3000, 1),
(3, 'Ayam goreng sambal ijo', 28, 'pedas level dewa', 8000, 3),
(5, 'Orek Tempe', 18, 'murrahahah', 500, 3),
(6, 'Semur Jengkol', 73, 'dijamin nagih', 5000, 4),
(8, 'Ikan tongkol masak balado', 187, 'rasa mantab', 3000, 3),
(9, 'Oseng Tauge', 30, 'maknyuss', 500, 4),
(10, 'Oseng kangkung', 20, 'mantab', 500, 4),
(11, 'Orak arik sayur', 18, 'super mantab', 800, 4),
(12, 'Ayam goreng kentucky krispi', 194, 'renyah gurih', 6000, 3),
(13, 'Telur dadar', 19, 'uenaak', 4000, 3),
(14, 'Ikan bandeng goreng telur', 11, 'enak', 6000, 3),
(15, 'Telur balado', 18, 'Pedas', 4000, 3),
(16, 'Sayur lodeh', 17, 'enak', 500, 4),
(17, 'Sayur asem', 17, 'makinyus', 500, 4),
(20, 'Tahu bacem', 10, 'makinyus', 500, 3),
(21, 'Tempe bacem', 9, 'rasanya mantab', 1000, 3),
(22, 'Es teh', -6, '', 3000, 7),
(23, 'Teh panas', -1, '', 3000, 7),
(24, 'Nutrisari', -1, '', 4000, 7),
(25, 'Coffe gooday', 1, '', 5000, 7),
(26, 'Kopi gilus', 94, '', 3000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `id_bahan` int(10) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `id_menu`, `id_bahan`, `jumlah`) VALUES
(1, 13, 9, 50),
(2, 13, 7, 20),
(3, 13, 10, 13),
(4, 13, 18, 80),
(5, 13, 3, 5),
(6, 22, 2, 20),
(7, 22, 14, 5),
(8, 2, 1, 7),
(9, 5, 11, 5),
(10, 5, 10, 3),
(11, 5, 7, 5),
(12, 5, 3, 2),
(13, 24, 20, 1),
(14, 24, 38, 25),
(15, 24, 19, 0),
(16, 25, 25, 1),
(17, 25, 38, 30),
(18, 12, 13, 50),
(28, 16, 10, 10),
(29, 16, 7, 20),
(30, 16, 32, 2),
(31, 16, 12, 10),
(32, 16, 35, 2),
(33, 23, 8, 3),
(34, 23, 38, 5),
(35, 23, 2, 2),
(36, 21, 11, 3),
(37, 21, 2, 2),
(38, 21, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `total_harga`, `id_user`) VALUES
('0301210001', '2021-01-02 17:00:00', 90000, 'admin'),
('0301210002', '2021-01-02 17:00:00', 30000, 'admin'),
('0301210003', '2021-01-02 17:00:00', 30000, 'admin'),
('0701210001', '2021-01-06 21:33:02', 8500, 'admin'),
('0701210002', '2021-01-06 21:36:26', 9000, 'admin'),
('0701210003', '2021-01-06 21:41:34', 29000, 'admin'),
('0701210004', '2021-01-06 21:42:08', 55000, 'admin'),
('0701210005', '2021-01-06 21:42:38', 24000, 'admin'),
('0701210006', '2021-01-06 21:43:39', 24000, 'admin'),
('0701210007', '2021-01-06 21:44:49', 32500, 'admin'),
('0701210008', '2021-01-06 21:45:45', 24000, 'admin'),
('0701210009', '2021-01-06 21:46:26', 18000, 'admin'),
('0701210010', '2021-01-06 21:47:22', 27000, 'admin'),
('0701210011', '2021-01-06 21:48:17', 13600, 'admin'),
('0701210012', '2021-01-06 21:48:46', 15000, 'admin'),
('0701210013', '2021-01-06 21:49:36', 4000, 'admin'),
('0701210014', '2021-01-06 21:50:01', 50000, 'admin'),
('0701210015', '2021-01-06 21:50:41', 9000, 'admin'),
('0701210016', '2021-01-06 21:51:12', 14000, 'admin'),
('0701210017', '2021-01-06 21:52:02', 54000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `No_hp` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `level` enum('admin','kasir','koki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `No_hp`, `status`, `level`) VALUES
(2, 'admin', '$2y$10$O4cuuAOVOAtOq2rxMfErrua7FFSHlKOJDLYqhDFntaEtVTm/5LB9W', 'admin', '1234', 'active', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_bahan` (`nama_bahan`),
  ADD KEY `FKbahan524060` (`id_kategori_bahan`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kategori_bahan`
--
ALTER TABLE `kategori_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_menu` (`nama_menu`),
  ADD KEY `FKmenu181546` (`id_kategori_menu`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `FKresep721401` (`id_menu`),
  ADD KEY `FKresep471503` (`id_bahan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kategori_bahan`
--
ALTER TABLE `kategori_bahan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `FKbahan524060` FOREIGN KEY (`id_kategori_bahan`) REFERENCES `kategori_bahan` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FKmenu181546` FOREIGN KEY (`id_kategori_menu`) REFERENCES `kategori_menu` (`id`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `FKresep471503` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id`),
  ADD CONSTRAINT `FKresep721401` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
