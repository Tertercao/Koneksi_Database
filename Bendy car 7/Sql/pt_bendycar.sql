-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 03:44 PM
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
-- Database: `pt_bendycar`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `status` enum('available','unavailable') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_kendaraan`, `harga_sewa`, `status`, `created_at`) VALUES
(1, 'Toyota Avanza', 300000, 'unavailable', '2024-11-26 03:30:34'),
(2, 'Honda Jazz', 350000, 'available', '2024-11-26 03:30:34'),
(3, 'Suzuki Ertiga', 280000, 'available', '2024-11-26 03:30:34'),
(4, 'Honda Brio', 300000, 'available', '2024-11-28 14:16:22'),
(5, 'Mitsubishi Xpander', 400000, 'available', '2024-11-28 14:16:22'),
(7, 'Daihatsu Ayla', 250000, 'available', '2024-11-28 14:16:22'),
(8, 'Nissan Livina', 380000, 'available', '2024-11-28 14:16:22'),
(9, 'Lamborgini Aventador', 5000000, 'unavailable', '2024-12-09 08:37:56'),
(10, 'Mustang GT', 25000000, 'available', '2024-12-09 08:46:53'),
(11, 'H2', 1500000, '', '2024-12-10 08:38:57'),
(12, 'Fortuner 2022', 2800000, 'unavailable', '2024-12-10 08:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') DEFAULT 'dipinjam',
  `denda` int(11) DEFAULT 0,
  `durasi` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `kendaraan_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `denda`, `durasi`) VALUES
(19, 5, 1, '2024-12-03', NULL, 'dikembalikan', 0, '0000-00-00 00:00:00'),
(20, 5, 2, '2024-12-03', NULL, 'dikembalikan', 0, '0000-00-00 00:00:00'),
(21, 5, 5, '2024-12-03', NULL, 'dikembalikan', 0, '0000-00-00 00:00:00'),
(22, 5, 1, '2024-12-03', NULL, 'dikembalikan', 0, '0000-00-00 00:00:00'),
(23, 5, 2, '2024-12-03', NULL, 'dikembalikan', 0, '0000-00-00 00:00:00'),
(24, 5, 3, '2024-12-03', NULL, 'dikembalikan', 0, '0000-00-00 00:00:00'),
(25, 5, 3, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 12:57:13'),
(26, 5, 3, '2024-12-03', '2024-12-03', 'dikembalikan', 0, '2024-12-03 13:04:23'),
(29, 5, 2, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:06:42'),
(30, 5, 3, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:11:57'),
(31, 5, 5, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:13:36'),
(32, 5, 2, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:15:32'),
(33, 5, 4, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:16:50'),
(34, 5, 7, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:20:15'),
(35, 5, 2, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:24:30'),
(37, 5, 4, '2024-12-03', NULL, 'dikembalikan', 0, '2024-12-03 14:26:15'),
(38, 5, 1, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 09:46:45'),
(39, 5, 1, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 09:48:05'),
(40, 5, 5, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 12:05:16'),
(41, 5, 2, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 12:08:00'),
(42, 5, 1, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 12:08:05'),
(43, 5, 4, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 12:08:10'),
(44, 5, 5, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 12:14:55'),
(45, 5, 1, '2024-12-07', NULL, 'dikembalikan', 0, '2024-12-07 12:15:08'),
(46, 8, 2, '2024-12-09', NULL, 'dikembalikan', 0, '2024-12-09 08:25:01'),
(47, 8, 9, '2024-12-09', NULL, 'dikembalikan', 0, '2024-12-09 08:38:37'),
(48, 8, 10, '2024-12-09', NULL, 'dikembalikan', 0, '2024-12-09 08:47:06'),
(49, 8, 1, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:00'),
(50, 8, 2, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:03'),
(51, 8, 3, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:04'),
(52, 8, 4, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:06'),
(53, 8, 5, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:08'),
(54, 8, 7, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:10'),
(55, 8, 8, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:12'),
(56, 8, 9, '2024-12-10', NULL, 'dipinjam', 0, '2024-12-10 08:55:13'),
(57, 8, 10, '2024-12-10', NULL, 'dikembalikan', 0, '2024-12-10 08:55:15'),
(58, 8, 12, '2024-12-10', NULL, 'dipinjam', 0, '2024-12-10 08:55:17'),
(59, 5, 1, '2024-12-10', NULL, 'dipinjam', 0, '2024-12-10 14:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `role`) VALUES
(5, 'yono', 'yono@gmail.com', '$2y$10$QDsRFnpCEnIz7p9T8ewjAemoqAzHI/Ny2/q.SYASPtJC4oxV/bRai', '2024-12-03 08:28:39', 'user'),
(8, 'aji', 'aji@gmail.com', '$2y$10$olwXY/xbTyHrfhM3W/vTaOIagdBZcdaH8d0Go7ywIr.NwIXFgmrSa', '2024-12-09 08:00:26', 'admin'),
(9, 'iki', 'iki@gmail.com', '$2y$10$b3yI0lEhfqQ6Y/S4DMQsC.QQBx7PXKUPMMe2i95.y9l4Lunby3ivm', '2024-12-10 14:37:53', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kendaraan_id` (`kendaraan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
