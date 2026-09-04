-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pos_mega
CREATE DATABASE IF NOT EXISTS `pos_mega` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pos_mega`;

-- Dumping structure for table pos_mega.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.cache: ~0 rows (approximately)

-- Dumping structure for table pos_mega.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_mega.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos_mega.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `kuantitas` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.item_penjualan: ~26 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 2, 100000, 200000, '2026-08-04 01:34:40', '2026-08-04 01:34:40'),
	(2, 2, 3, 1, 100000, 100000, '2026-08-04 01:34:47', '2026-08-04 01:34:47'),
	(3, 3, 4, 1, 110000, 110000, '2026-08-04 01:35:18', '2026-08-04 01:35:18'),
	(4, 5, 5, 1, 100000, 100000, '2026-08-04 02:00:07', '2026-08-04 02:00:07'),
	(5, 5, 1, 2, 120000, 240000, '2026-08-04 02:00:16', '2026-08-04 02:00:16'),
	(6, 6, 2, 1, 100000, 100000, '2026-08-05 02:38:59', '2026-08-05 02:38:59'),
	(7, 6, 4, 1, 110000, 110000, '2026-08-05 02:39:01', '2026-08-05 02:39:01'),
	(8, 8, 1, 1, 120000, 120000, '2026-08-05 02:59:26', '2026-08-05 02:59:26'),
	(9, 8, 5, 1, 100000, 100000, '2026-08-05 02:59:43', '2026-08-05 02:59:43'),
	(10, 8, 2, 1, 100000, 100000, '2026-08-05 02:59:53', '2026-08-05 02:59:53'),
	(11, 7, 6, 2, 110000, 220000, '2026-08-10 02:38:26', '2026-08-10 02:38:26'),
	(12, 9, 4, 1, 110000, 110000, '2026-08-10 02:40:14', '2026-08-10 02:40:14'),
	(13, 10, 3, 2, 100000, 200000, '2026-08-10 02:40:48', '2026-08-10 02:40:48'),
	(14, 12, 3, 1, 100000, 100000, '2026-08-10 04:27:29', '2026-08-10 04:27:29'),
	(15, 12, 4, 1, 110000, 110000, '2026-08-10 04:27:32', '2026-08-10 04:27:32'),
	(16, 13, 4, 1, 100000, 100000, '2026-08-10 06:54:33', '2026-08-10 06:54:33'),
	(18, 11, 3, 2, 100000, 200000, '2026-08-12 06:28:50', '2026-08-12 06:29:27'),
	(19, 11, 2, 1, 100000, 100000, '2026-08-12 06:29:30', '2026-08-12 06:29:30'),
	(21, 14, 2, 1, 100000, 100000, '2026-08-12 07:01:33', '2026-08-12 07:01:33'),
	(22, 14, 3, 1, 100000, 100000, '2026-08-12 07:01:46', '2026-08-12 07:01:46'),
	(23, 14, 6, 1, 100000, 100000, '2026-08-12 07:01:59', '2026-08-12 07:01:59'),
	(24, 14, 4, 1, 100000, 100000, '2026-08-12 07:02:37', '2026-08-12 07:02:37'),
	(25, 15, 4, 1, 100000, 100000, '2026-08-19 01:23:42', '2026-08-19 01:23:42'),
	(26, 15, 3, 1, 100000, 100000, '2026-08-19 01:23:43', '2026-08-19 01:23:43'),
	(29, 17, 2, 1, 100000, 100000, '2026-08-19 03:47:41', '2026-08-19 03:47:41'),
	(30, 18, 6, 1, 100000, 100000, '2026-08-19 03:48:01', '2026-08-19 03:48:01'),
	(31, 18, 5, 1, 100000, 100000, '2026-08-19 03:48:05', '2026-08-19 03:48:05'),
	(32, 19, 3, 1, 100000, 100000, '2026-08-19 03:48:40', '2026-08-19 03:48:40'),
	(33, 19, 6, 1, 100000, 100000, '2026-08-26 01:52:52', '2026-08-26 01:52:52'),
	(34, 19, 2, 1, 100000, 100000, '2026-08-26 01:52:59', '2026-08-26 01:52:59'),
	(35, 21, 4, 1, 100000, 100000, '2026-08-26 01:53:54', '2026-08-26 01:53:54'),
	(36, 22, 6, 1, 100000, 100000, '2026-09-01 04:07:41', '2026-09-01 04:07:41'),
	(37, 22, 2, 1, 100000, 100000, '2026-09-01 04:07:43', '2026-09-01 04:07:43'),
	(38, 23, 4, 1, 100000, 100000, '2026-09-01 04:28:23', '2026-09-01 04:28:23');

-- Dumping structure for table pos_mega.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.jobs: ~0 rows (approximately)

-- Dumping structure for table pos_mega.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_mega.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_01_15_013242_create_produk_table', 1),
	(6, '2026_01_15_013907_create_penjualan_table', 1),
	(7, '2026_01_15_014833_create_item_penjualan_table', 1);

-- Dumping structure for table pos_mega.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos_mega.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('OPEN','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.penjualan: ~16 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(2, 2, 300000, 'QRIS', 'COMPLETED', '2026-08-04 01:34:31', '2026-08-04 01:34:56'),
	(3, 2, 110000, 'CASH', 'COMPLETED', '2026-08-04 01:35:13', '2026-08-04 01:35:24'),
	(5, 2, 340000, 'QRIS', 'COMPLETED', '2026-08-04 01:59:19', '2026-08-04 02:00:25'),
	(6, 7, 210000, 'CASH', 'COMPLETED', '2026-08-05 02:38:53', '2026-08-05 02:39:10'),
	(7, 7, 220000, 'CASH', 'COMPLETED', '2026-08-05 02:39:47', '2026-08-10 02:38:38'),
	(8, 5, 320000, 'QRIS', 'COMPLETED', '2026-08-05 02:59:02', '2026-08-05 03:00:04'),
	(9, 7, 110000, 'QRIS', 'COMPLETED', '2026-08-10 02:40:11', '2026-08-10 02:40:23'),
	(10, 7, 200000, 'CASH', 'COMPLETED', '2026-08-10 02:40:41', '2026-08-10 02:40:56'),
	(11, 7, 300000, 'CASH', 'COMPLETED', '2026-08-10 04:16:05', '2026-08-12 06:30:04'),
	(12, 3, 210000, 'QRIS', 'COMPLETED', '2026-08-10 04:27:25', '2026-08-10 04:27:40'),
	(13, 1, 100000, 'QRIS', 'COMPLETED', '2026-08-10 06:54:19', '2026-08-10 06:54:45'),
	(14, 7, 400000, 'QRIS', 'COMPLETED', '2026-08-12 07:01:22', '2026-08-12 07:02:46'),
	(15, 7, 200000, 'CASH', 'COMPLETED', '2026-08-19 01:23:37', '2026-08-19 01:24:05'),
	(17, 7, 100000, 'CASH', 'COMPLETED', '2026-08-19 03:47:28', '2026-08-19 03:47:49'),
	(18, 7, 200000, 'CASH', 'COMPLETED', '2026-08-19 03:47:55', '2026-08-19 03:48:11'),
	(19, 7, 300000, 'QRIS', 'COMPLETED', '2026-08-19 03:48:36', '2026-08-26 01:53:14'),
	(20, 3, 0, 'CASH', 'OPEN', '2026-08-19 04:36:25', '2026-08-19 04:36:25'),
	(21, 7, 100000, 'CASH', 'COMPLETED', '2026-08-26 01:53:37', '2026-08-26 01:54:07'),
	(22, 7, 200000, 'QRIS', 'COMPLETED', '2026-09-01 04:07:34', '2026-09-01 04:07:59'),
	(23, 7, 100000, 'QRIS', 'COMPLETED', '2026-09-01 04:28:19', '2026-09-01 04:38:08');

-- Dumping structure for table pos_mega.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_nama_index` (`nama`),
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.produk: ~6 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 7, 'products/FVuDeevUheY7SsZlZA86mobIIK6hKWE5tKUAfGWI.jpg', 'Tres Leches Red Berry', 85000, 100000, 87, '2026-07-31 06:52:19', '2026-09-01 03:51:37'),
	(2, 7, 'products/lW5BcDLQZoKq03vkefXE2fjtQgqxJqMrVmxG7xAX.jpg', 'Mille Feuille', 80000, 100000, 81, '2026-07-31 06:53:27', '2026-09-01 04:07:43'),
	(3, 7, 'products/f25LmJei2oihppk3wSN1y6NBSN4CRzanS77j7C8X.jpg', 'Coco Cake', 79000, 100000, 81, '2026-07-31 06:54:22', '2026-09-01 03:52:50'),
	(4, 7, 'products/Ib4X4Un8xRiK359xsTtmRZ2iU5pSPuUwlovV8epx.jpg', 'Carrot Cake', 80000, 100000, 81, '2026-07-31 06:56:27', '2026-09-01 04:28:23'),
	(5, 7, 'products/5muekP9s77JS6HVHwbmar5uGgxFs8bOTyelQChg5.jpg', 'Mocca Nougat', 85000, 100000, 87, '2026-07-31 06:57:27', '2026-09-01 03:50:13'),
	(6, 7, 'products/DPV6YRpcdMH7CwhmNEznrSu1SSHUYXQ7mgG0UF7O.png', 'Earl Grey Crème', 90000, 100000, 84, '2026-07-31 07:07:20', '2026-09-01 04:07:41');

-- Dumping structure for table pos_mega.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-07-21 21:27:20', '2026-07-21 21:27:20'),
	(2, 'kasir', '2026-07-21 21:27:20', '2026-07-21 21:27:20');

-- Dumping structure for table pos_mega.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('ddtCvWy1oaqTKMgmDudHwoHVHhgURpq5bwy5I30P', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNTNOa0lGNkhGY0k3b3pGODFlYUdydHpUNXRCS1gzejBTQkI1Z0d3byI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5qdWFsYW4iO3M6NToicm91dGUiO3M6MTU6InBlbmp1YWxhbi5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1787709373),
	('RwqVFqu2p2vDYZIjxfFcxdiD7I9hYSGzLKtfUcsD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2IwTUZIY25ZS296UkVMbDRyV0h6c3Y5dnlmcWE0OWg2RVlSeThuSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1787888197);

-- Dumping structure for table pos_mega.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_mega.users: ~7 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Jennyfer rohd', 'gpredovic@example.com', '2026-07-21 21:27:20', '$2y$12$QpP.HtndrVOsCFBlpGcFI.HGsObmHWt9BWHc76LPC7dEf5qvFlvqy', 'VHe2DjDmLqSvriAja5vM7QdZKQPwDq4WnwTuZ7TdsS3AMjmBwlAtgi5siWOn', '2026-07-21 21:27:20', '2026-08-10 04:32:03'),
	(2, 1, 'Dr. Misael Stanton I', 'legros.carolina@example.org', '2026-07-21 21:27:20', '$2y$12$QpP.HtndrVOsCFBlpGcFI.HGsObmHWt9BWHc76LPC7dEf5qvFlvqy', 'QsxqNdd8jFMFbKn8TUo6BxLl664yD41emUn0ry7QBfV7CchH1gXc9dfXrR60', '2026-07-21 21:27:21', '2026-07-21 21:27:21'),
	(3, 2, 'Angelo Kilback', 'vkeebler@example.net', '2026-07-21 21:27:20', '$2y$12$QpP.HtndrVOsCFBlpGcFI.HGsObmHWt9BWHc76LPC7dEf5qvFlvqy', 'GK2wDFKuFjJLFH3BcB6LAGewOx3NJFCronmOGseDFU14aCLFZ5SkmSHMbp3x', '2026-07-21 21:27:21', '2026-07-21 21:27:21'),
	(4, 1, 'Abbigail Runolfsson', 'beatty.otilia@example.org', '2026-07-21 21:27:20', '$2y$12$QpP.HtndrVOsCFBlpGcFI.HGsObmHWt9BWHc76LPC7dEf5qvFlvqy', '4e0ZLQwoBEEG3XhUzufLoYJ0X8sq512DtPYh3bTYbJb1CYepjnSw31lgmrqP', '2026-07-21 21:27:21', '2026-07-21 21:27:21'),
	(5, 2, 'Ms. Juanita Aufderhar', 'dayna.mckenzie@example.net', '2026-07-21 21:27:20', '$2y$12$QpP.HtndrVOsCFBlpGcFI.HGsObmHWt9BWHc76LPC7dEf5qvFlvqy', 'qAOwmceWvopCmTGvCjqCz5rzEM5l9o7pX19C0x0Ddw0YwHXKke4qzy5tuHo3', '2026-07-21 21:27:21', '2026-07-21 21:27:21'),
	(7, 1, 'Mega', 'mega123@gmail.com', NULL, '$2y$12$TWxWzmrA0CTm77TM3HBxyew3tKD.h1ZpLnGbCI1hg5YKA.qj7T65C', NULL, '2026-08-04 01:58:50', '2026-08-04 01:58:50'),
	(9, 2, 'Boni Acimo', 'Boni123@gmail.com', NULL, '$2y$12$IhW0lfTosWqaeTFuf9piOubTtBIoKVCMrCn3kw/pqnmubBOmKQF/S', NULL, '2026-08-28 02:57:13', '2026-08-28 02:57:13');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
