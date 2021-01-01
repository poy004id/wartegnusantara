-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 06:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wn`
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
(1, 'Berass', 100, 'kg', 1),
(2, 'Gula', 40, 'kg', 2),
(3, 'Garam', 500, 'gram', 2),
(5, 'Kangkung', 18, 'ikat', 5),
(7, 'Bawang merah', 20, 'kg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(10) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_menu`, `jumlah`, `harga`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 6, 1, 0);

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
(6, 'buah', 'active'),
(7, 'Minuman', 'active'),
(14, 'Lain lain', 'active'),
(15, 'Sambal ', 'inactive');

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
(6, 'Gorengan', 'active');

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
(1, 'Nasi putih', 100, 'cuma nasi biasa aja bukan nasi kaya', 3000, 1),
(2, 'Nasi uduk', 40, 'rasanya gurih', 3000, 1),
(3, 'Ayam goreng sambal ijo', 28, 'pedas level dewa', 8000, 3),
(5, 'Orek Tempe', 0, 'murrahahah', 500, 3),
(6, 'Semur Jengkol', 87, 'dijamin nagih', 5000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `id_menu_makanan` int(10) NOT NULL,
  `id_bahan` int(10) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `total_harga`, `id_user`) VALUES
(1, '0000-00-00 00:00:00', 0, 2);

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
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FKdetail_ord790250` (`id_transaksi`),
  ADD KEY `FKdetail_ord273329` (`id_menu`);

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
  ADD KEY `FKresep721401` (`id_menu_makanan`),
  ADD KEY `FKresep471503` (`id_bahan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKorder606041` (`id_user`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_bahan`
--
ALTER TABLE `kategori_bahan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `FKbahan524060` FOREIGN KEY (`id_kategori_bahan`) REFERENCES `kategori_bahan` (`id`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `FKdetail_ord273329` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `FKdetail_ord790250` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);

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
  ADD CONSTRAINT `FKresep721401` FOREIGN KEY (`id_menu_makanan`) REFERENCES `menu` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FKorder606041` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKUser483024` FOREIGN KEY (`id_job`) REFERENCES `job` (`id_job`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table bahan
--

--
-- Metadata for table detail_transaksi
--

--
-- Metadata for table kategori_bahan
--

--
-- Metadata for table kategori_menu
--

--
-- Metadata for table menu
--

--
-- Metadata for table resep
--

--
-- Metadata for table transaksi
--

--
-- Metadata for table user
--

--
-- Metadata for database wn
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
