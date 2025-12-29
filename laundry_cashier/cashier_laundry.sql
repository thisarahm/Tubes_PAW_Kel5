-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 08:43 AM
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
-- Database: `cashier_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laundries`
--

CREATE TABLE `laundries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_baju` varchar(255) NOT NULL,
  `jenis_laundry` varchar(255) NOT NULL,
  `berat` decimal(8,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL,
  `status` enum('ongoing','selesai') NOT NULL DEFAULT 'ongoing',
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_08_141011_create_laundries_table', 1),
(5, '2025_12_15_121836_create_transaksi_table', 1),
(6, '2025_12_16_020909_create_pelanggans_table', 1),
(7, '2025_12_16_030958_create_transaksi_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `kode`, `nama`, `no_telp`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'NJW001', 'Najwa', '089237827', 'Najwa@gmail.com', 'jl. Ancol Selatan no111', '2025-12-15 21:01:55', '2025-12-16 00:56:13'),
(2, 'AQL002', 'Nisa', '0818729277', 'nisa@gmail.com', 'Jl. Taman Raya no.33', '2025-12-15 21:17:59', '2025-12-16 00:57:08'),
(3, 'SRH003', 'Sarah', '0812937837', 'sarah@gmail.com', 'JL. Tangerang no.33', '2025-12-16 00:56:59', '2025-12-16 00:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FikWfvvEvjGUIhhfKPoI424L4Pxquj76RqOA7OGX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFQ1SW5EMW5RUk14T3ZaaTJUbEhENTEwdzVtNmFQQnNybW5oeThjVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rYXNpci90cmFuc2Frc2ktcGVuanVhbGFuIjtzOjU6InJvdXRlIjtzOjE1OiJrYXNpci50cmFuc2Frc2kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1766234652);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_terima` date NOT NULL,
  `kode` varchar(255) NOT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `pelanggan` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('ONGOING','DITERIMA','BELUM_DIAMBIL','SELESAI') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `tgl_terima`, `kode`, `tgl_ambil`, `pelanggan`, `total`, `status`, `created_at`, `updated_at`) VALUES
(4, '2025-12-19', 'ND03', '2025-12-25', 'NANDY', 63000, 'DITERIMA', '2025-12-15 21:16:40', '2025-12-16 23:20:46'),
(5, '2025-12-16', 'RJ02', '2025-12-19', 'ROJAK', 81000, 'DITERIMA', '2025-12-15 23:12:48', '2025-12-16 00:58:31'),
(6, '2025-12-26', 'ND01', '2025-12-27', 'NADIA', 105000, 'DITERIMA', '2025-12-15 23:19:45', '2025-12-16 23:20:39'),
(9, '2025-12-17', 'AQL002', '2025-12-18', 'NISA', 20000, 'BELUM_DIAMBIL', '2025-12-16 23:00:18', '2025-12-16 23:23:36'),
(10, '2025-12-17', 'AWAA007', '2025-12-26', 'NAJWA', 130000, 'SELESAI', '2025-12-16 23:10:39', '2025-12-16 23:23:01'),
(11, '2025-12-17', 'PLG001', '2025-12-18', 'NADIA', 14000, 'SELESAI', '2025-12-16 23:20:26', '2025-12-16 23:25:01'),
(13, '2025-12-17', 'AQL002', NULL, 'JULE', 21000, 'DITERIMA', '2025-12-17 00:16:51', '2025-12-17 00:16:51'),
(14, '2025-12-25', 'JULE', '2025-12-29', 'JULE', 15000, 'DITERIMA', '2025-12-17 00:37:38', '2025-12-17 00:37:38'),
(15, '2025-12-20', 'JHS005', '2025-12-21', 'Joshua', 51000, 'DITERIMA', '2025-12-20 04:51:02', '2025-12-20 04:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_items`
--

CREATE TABLE `transaksi_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_items`
--

INSERT INTO `transaksi_items` (`id`, `transaksi_id`, `item`, `harga`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(6, 4, 'Baju', 7000, 1, 7000, '2025-12-15 21:16:40', '2025-12-15 21:16:40'),
(7, 4, 'Celana', 7000, 2, 14000, '2025-12-15 21:16:40', '2025-12-15 21:16:40'),
(8, 4, 'Sprei', 10000, 0, 0, '2025-12-15 21:16:40', '2025-12-15 21:16:40'),
(9, 4, 'Selimut', 15000, 8, 120000, '2025-12-15 21:16:40', '2025-12-15 21:16:40'),
(10, 4, 'Jaket', 7000, 0, 0, '2025-12-15 21:16:40', '2025-12-15 21:16:40'),
(11, 5, 'Baju', 7000, 1, 7000, '2025-12-15 23:12:48', '2025-12-15 23:12:48'),
(12, 5, 'Celana', 7000, 2, 14000, '2025-12-15 23:12:48', '2025-12-15 23:12:48'),
(13, 5, 'Sprei', 10000, 1, 10000, '2025-12-15 23:12:48', '2025-12-15 23:12:48'),
(14, 5, 'Selimut', 15000, 1, 15000, '2025-12-15 23:12:48', '2025-12-15 23:12:48'),
(15, 5, 'Jaket', 7000, 1, 7000, '2025-12-15 23:12:48', '2025-12-15 23:12:48'),
(16, 6, 'Baju', 7000, 1, 7000, '2025-12-15 23:19:45', '2025-12-15 23:19:45'),
(17, 6, 'Celana', 7000, 0, 0, '2025-12-15 23:19:45', '2025-12-15 23:19:45'),
(18, 6, 'Sprei', 10000, 4, 40000, '2025-12-15 23:19:45', '2025-12-15 23:19:45'),
(19, 6, 'Selimut', 15000, 0, 0, '2025-12-15 23:19:45', '2025-12-15 23:19:45'),
(20, 6, 'Jaket', 7000, 0, 0, '2025-12-15 23:19:45', '2025-12-15 23:19:45'),
(31, 9, 'Baju', 7000, 2, 14000, '2025-12-16 23:00:19', '2025-12-16 23:00:19'),
(32, 9, 'Celana', 7000, 0, 0, '2025-12-16 23:00:19', '2025-12-16 23:00:19'),
(33, 9, 'Sprei', 10000, 0, 0, '2025-12-16 23:00:19', '2025-12-16 23:00:19'),
(34, 9, 'Selimut', 15000, 0, 0, '2025-12-16 23:00:19', '2025-12-16 23:00:19'),
(35, 9, 'Jaket', 7000, 0, 0, '2025-12-16 23:00:19', '2025-12-16 23:00:19'),
(36, 10, 'Baju', 7000, 7, 49000, '2025-12-16 23:10:39', '2025-12-16 23:10:39'),
(37, 10, 'Celana', 7000, 7, 49000, '2025-12-16 23:10:39', '2025-12-16 23:10:39'),
(38, 10, 'Sprei', 10000, 1, 10000, '2025-12-16 23:10:39', '2025-12-16 23:10:39'),
(39, 10, 'Selimut', 15000, 1, 15000, '2025-12-16 23:10:39', '2025-12-16 23:10:39'),
(40, 10, 'Jaket', 7000, 1, 7000, '2025-12-16 23:10:39', '2025-12-16 23:10:39'),
(41, 11, 'Baju', 7000, 4, 28000, '2025-12-16 23:20:26', '2025-12-16 23:20:26'),
(42, 11, 'Celana', 7000, 0, 0, '2025-12-16 23:20:26', '2025-12-16 23:20:26'),
(43, 11, 'Sprei', 10000, 0, 0, '2025-12-16 23:20:26', '2025-12-16 23:20:26'),
(44, 11, 'Selimut', 15000, 0, 0, '2025-12-16 23:20:26', '2025-12-16 23:20:26'),
(45, 11, 'Jaket', 7000, 0, 0, '2025-12-16 23:20:26', '2025-12-16 23:20:26'),
(51, 13, 'Baju', 7000, 2, 14000, '2025-12-17 00:16:51', '2025-12-17 00:16:51'),
(52, 13, 'Celana', 7000, 1, 7000, '2025-12-17 00:16:51', '2025-12-17 00:16:51'),
(53, 13, 'Sprei', 10000, 0, 0, '2025-12-17 00:16:51', '2025-12-17 00:16:51'),
(54, 13, 'Selimut', 15000, 0, 0, '2025-12-17 00:16:51', '2025-12-17 00:16:51'),
(55, 13, 'Jaket', 7000, 0, 0, '2025-12-17 00:16:51', '2025-12-17 00:16:51'),
(56, 14, 'Cucian', 7000, 0, 0, '2025-12-17 00:37:38', '2025-12-17 00:37:38'),
(57, 14, 'Celana', 7000, 0, 0, '2025-12-17 00:37:38', '2025-12-17 00:37:38'),
(58, 14, 'Sprei', 10000, 0, 0, '2025-12-17 00:37:38', '2025-12-17 00:37:38'),
(59, 14, 'Selimut panjang', 15000, 1, 15000, '2025-12-17 00:37:38', '2025-12-17 00:37:38'),
(60, 14, 'Jaket Tebal', 7000, 0, 0, '2025-12-17 00:37:38', '2025-12-17 00:37:38'),
(61, 15, 'Cuci Kering', 7000, 3, 21000, '2025-12-20 04:51:02', '2025-12-20 04:51:02'),
(62, 15, 'Cuci Kering + Setrika', 15000, 2, 30000, '2025-12-20 04:51:02', '2025-12-20 04:51:02'),
(63, 15, 'Setrika', 10000, 0, 0, '2025-12-20 04:51:02', '2025-12-20 04:51:02'),
(64, 15, 'Cuci Express', 15000, 0, 0, '2025-12-20 04:51:02', '2025-12-20 04:51:02'),
(65, 15, 'Cuci MAX (Bahan Tebal)', 15000, 0, 0, '2025-12-20 04:51:02', '2025-12-20 04:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','kasir') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kasir', 'kasir@gmail.com', NULL, '$2y$12$5vwS4EA8NGyLfGiIifc/QegsLRZLDDwZG1nbKvM97PZC10C2YxUzm', 'kasir', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundries`
--
ALTER TABLE `laundries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundries_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelanggans_kode_unique` (`kode`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_items_transaksi_id_foreign` (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundries`
--
ALTER TABLE `laundries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundries`
--
ALTER TABLE `laundries`
  ADD CONSTRAINT `laundries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD CONSTRAINT `transaksi_items_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
