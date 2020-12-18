-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 05:13 AM
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
-- Database: `wartegnusantara`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahanmakanan`
--

CREATE TABLE `bahanmakanan` (
  `ID` int(10) NOT NULL,
  `NamaBahanBaku` varchar(50) NOT NULL,
  `Qty` int(4) NOT NULL,
  `KategoriBahanMakananID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detailpemesanan`
--

CREATE TABLE `detailpemesanan` (
  `ID` int(10) NOT NULL,
  `PemesananID` int(10) NOT NULL,
  `MenuMakananID` int(10) NOT NULL,
  `Qty` int(4) NOT NULL,
  `Harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emailconfig`
--

CREATE TABLE `emailconfig` (
  `id` int(11) NOT NULL,
  `fromemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fromname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protocol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `security` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emailconfig`
--

INSERT INTO `emailconfig` (`id`, `fromemail`, `fromname`, `protocol`, `host`, `username`, `security`, `port`, `password`, `created_at`, `updated_at`) VALUES
(1, 'codeigniter@example.com', 'Codeigniter Auth', 'smtp', 'gmail.google.com', 'official@gmail.com', 'tls', '22', '$2y$10$PK65kpF6SflIk/iAJql6R.PRXX9GEaoRrJHHORqReU2I0E/60pVtC', '2020-08-21 17:43:51', '2020-09-11 14:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `ID` int(10) NOT NULL,
  `NamaJob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategoribahanmakanan`
--

CREATE TABLE `kategoribahanmakanan` (
  `ID` int(10) NOT NULL,
  `NamaKategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategorimakanan`
--

CREATE TABLE `kategorimakanan` (
  `ID` int(10) NOT NULL,
  `KategoryMakanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reference` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `date`, `time`, `reference`, `name`, `ip`, `location`, `browser`, `status`, `created_at`, `updated_at`) VALUES
(13, '2020-11-30', '14:59:13', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-11-30 14:59:13', '2020-11-30 14:59:13'),
(14, '2020-11-30', '15:20:00', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-11-30 15:20:00', '2020-11-30 15:20:00'),
(15, '2020-12-04', '14:20:44', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-04 14:20:44', '2020-12-04 14:20:44'),
(16, '2020-12-04', '14:48:13', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-04 14:48:13', '2020-12-04 14:48:13'),
(17, '2020-12-04', '21:22:34', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-04 21:22:34', '2020-12-04 21:22:34'),
(18, '2020-12-11', '09:36:22', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-11 09:36:22', '2020-12-11 09:36:22'),
(19, '2020-12-14', '09:18:10', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-14 09:18:10', '2020-12-14 09:18:10'),
(20, '2020-12-14', '09:44:39', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-14 09:44:39', '2020-12-14 09:44:39'),
(21, '2020-12-14', '09:48:57', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-14 09:48:57', '2020-12-14 09:48:57'),
(22, '2020-12-14', '09:54:54', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-14 09:54:54', '2020-12-14 09:54:54'),
(23, '2020-12-14', '10:07:27', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-14 10:07:27', '2020-12-14 10:07:27'),
(24, '2020-12-17', '15:26:50', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-17 15:26:50', '2020-12-17 15:26:50'),
(25, '2020-12-17', '17:12:59', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-17 17:12:59', '2020-12-17 17:12:59'),
(26, '2020-12-17', '20:41:59', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-17 20:41:59', '2020-12-17 20:41:59'),
(27, '2020-12-17', '20:42:19', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-17 20:42:19', '2020-12-17 20:42:19'),
(28, '2020-12-17', '20:46:19', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-17 20:46:19', '2020-12-17 20:46:19'),
(29, '2020-12-17', '21:14:01', 1, 'Admin', '::1', NULL, 'Chrome', 'Success', '2020-12-17 21:14:01', '2020-12-17 21:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `menumakanan`
--

CREATE TABLE `menumakanan` (
  `ID` int(10) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `HargaPerPorsi` int(5) NOT NULL,
  `KategoriMakananID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID` int(10) NOT NULL,
  `PembeliID` int(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `TotalBayar` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `usersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `ID` int(10) NOT NULL,
  `MenuMakananID` int(10) NOT NULL,
  `BahanMakananID` int(10) NOT NULL,
  `Qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateformat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timeformat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iprestriction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language`, `timezone`, `dateformat`, `timeformat`, `iprestriction`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Asia/Jakarta', 'yyyy-mm-dd', '24', '', '2020-08-21 17:43:51', '2020-11-30 15:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `new_email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `JobID` int(10) DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activate_hash` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_hash` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_expires` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `new_email`, `password_hash`, `name`, `JobID`, `lastname`, `activate_hash`, `reset_hash`, `reset_expires`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin@example.com', NULL, '$2y$10$/clmNLUUxGnREFHqraU7P.aVfJ5Mk0iEKRgKVz8.ZKOZIUGJGXlya', 'Admin', 0, 'User', 'ZEWv2TUIY5oDqgw9FkjnmAS78zJNKfpL', NULL, NULL, 1, '2020-08-04 16:07:50', '2020-09-11 14:32:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahanmakanan`
--
ALTER TABLE `bahanmakanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKBahanMakan152387` (`KategoriBahanMakananID`);

--
-- Indexes for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  ADD PRIMARY KEY (`ID`,`PemesananID`,`MenuMakananID`),
  ADD KEY `FKDetailPeme798786` (`PemesananID`),
  ADD KEY `FKDetailPeme568681` (`MenuMakananID`);

--
-- Indexes for table `emailconfig`
--
ALTER TABLE `emailconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kategoribahanmakanan`
--
ALTER TABLE `kategoribahanmakanan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kategorimakanan`
--
ALTER TABLE `kategorimakanan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menumakanan`
--
ALTER TABLE `menumakanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKMenuMakana417765` (`KategoriMakananID`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKPemesanan601987` (`UserID`),
  ADD KEY `usersID` (`usersID`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKResep482739` (`MenuMakananID`),
  ADD KEY `FKResep338545` (`BahanMakananID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobID` (`JobID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahanmakanan`
--
ALTER TABLE `bahanmakanan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailconfig`
--
ALTER TABLE `emailconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoribahanmakanan`
--
ALTER TABLE `kategoribahanmakanan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorimakanan`
--
ALTER TABLE `kategorimakanan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `menumakanan`
--
ALTER TABLE `menumakanan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahanmakanan`
--
ALTER TABLE `bahanmakanan`
  ADD CONSTRAINT `FKBahanMakan152387` FOREIGN KEY (`KategoriBahanMakananID`) REFERENCES `kategoribahanmakanan` (`ID`);

--
-- Constraints for table `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  ADD CONSTRAINT `FKDetailPeme568681` FOREIGN KEY (`MenuMakananID`) REFERENCES `menumakanan` (`ID`),
  ADD CONSTRAINT `FKDetailPeme798786` FOREIGN KEY (`PemesananID`) REFERENCES `pemesanan` (`ID`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`JobID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `menumakanan`
--
ALTER TABLE `menumakanan`
  ADD CONSTRAINT `FKMenuMakana417765` FOREIGN KEY (`KategoriMakananID`) REFERENCES `kategorimakanan` (`ID`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `FKResep338545` FOREIGN KEY (`BahanMakananID`) REFERENCES `bahanmakanan` (`ID`),
  ADD CONSTRAINT `FKResep482739` FOREIGN KEY (`MenuMakananID`) REFERENCES `menumakanan` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pemesanan` (`usersID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
