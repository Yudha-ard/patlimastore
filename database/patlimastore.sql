-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 04:58 PM
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
-- Database: `patlimastore`
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
(4, '2024_06_28_174341_create_product_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` decimal(15,2) NOT NULL,
  `harga_jual` decimal(15,2) NOT NULL,
  `keuntungan` decimal(15,2) GENERATED ALWAYS AS (`harga_jual` - `harga_beli`) STORED,
  `tanggal` date NOT NULL,
  `kondisi` enum('new','second') NOT NULL,
  `transaksi_status` enum('offline','online') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` enum('fashion','gadget') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `nama_barang`, `harga_beli`, `harga_jual`, `tanggal`, `kondisi`, `transaksi_status`, `created_at`, `updated_at`, `category`) VALUES
(1, 1, 'Gazelle low bw 41', 375000.00, 441100.00, '2022-01-04', 'new', 'online', '2024-06-28 03:47:57', '2024-06-28 03:47:57', 'fashion'),
(2, 1, 'Iphone 11 64gb white ibox', 7300000.00, 8151625.00, '2022-01-07', 'second', 'online', '2024-06-28 03:50:20', '2024-06-28 03:50:20', 'gadget'),
(3, 1, 'Aerostreet x boncabe 42', 151059.00, 182040.00, '2022-01-04', 'new', 'online', '2024-06-28 04:22:28', '2024-06-28 04:22:28', 'fashion'),
(4, 1, 'Varsity Kamikaze L', 512000.00, 610000.00, '2022-01-09', 'new', 'online', '2024-06-28 04:38:30', '2024-06-28 04:38:30', 'fashion'),
(5, 1, 'Iphone 11 128gb black ibox', 8700000.00, 9300000.00, '2022-01-15', 'second', 'offline', '2024-06-28 04:39:24', '2024-06-28 04:39:24', 'gadget'),
(6, 1, 'Varsity yamaguci S', 512000.00, 570720.00, '2022-01-19', 'new', 'online', '2024-06-28 04:40:27', '2024-06-28 04:40:27', 'fashion'),
(7, 1, 'Iphone xr 128gb black ibox', 6200000.00, 7300000.00, '2022-01-19', 'second', 'online', '2024-06-28 04:41:23', '2024-06-28 04:41:23', 'gadget'),
(8, 1, 'Aerostreet batik series 39', 148000.00, 151000.00, '2024-06-19', 'new', 'online', '2024-06-28 04:42:06', '2024-06-28 04:42:06', 'fashion'),
(9, 1, 'Aerostreet x gundam 43', 126100.00, 191880.00, '2022-01-21', 'new', 'online', '2024-06-28 04:43:36', '2024-06-30 20:27:31', 'fashion'),
(10, 1, 'Sukajan nekosamurai memphis XL', 602000.00, 688800.00, '2022-01-25', 'new', 'online', '2024-06-28 04:44:28', '2024-06-30 20:27:40', 'gadget'),
(11, 1, 'Aerostreet x boncabe 44', 102000.00, 185000.00, '2022-01-27', 'new', 'online', '2024-06-28 04:45:27', '2024-06-30 20:28:30', 'fashion'),
(12, 1, 'Rucas kos 30', 390000.00, 500000.00, '2022-01-30', 'new', 'online', '2024-06-28 04:46:07', '2024-06-30 22:01:47', 'fashion'),
(13, 1, 'Rucas aop 36', 370000.00, 600000.00, '2022-02-07', 'new', 'online', '2024-06-28 04:47:15', '2024-06-30 22:01:55', 'fashion'),
(14, 1, 'Rucas graphite 34', 600000.00, 729000.00, '2022-02-11', 'second', 'online', '2024-06-28 04:48:08', '2024-06-30 22:02:02', 'fashion'),
(15, 1, 'Iphone xr 128gb black ibox', 7002500.00, 7512500.00, '2022-02-11', 'second', 'offline', '2024-06-28 04:49:37', '2024-06-30 22:04:14', 'gadget'),
(16, 1, 'Iphone xr 128gb white ex ibox', 6300000.00, 7050000.00, '2022-02-12', 'second', 'offline', '2024-06-28 04:50:35', '2024-06-30 22:04:22', 'gadget'),
(17, 1, 'Iphone xr 128gb white ex ibox', 6652500.00, 7406250.00, '2022-02-20', 'second', 'online', '2024-06-28 04:51:39', '2024-06-30 22:04:27', 'gadget'),
(18, 1, 'Aerostreet x boncabe 45', 170000.00, 195000.00, '2022-02-22', 'new', 'online', '2024-06-28 04:52:14', '2024-06-30 22:04:33', 'fashion'),
(19, 1, 'Rucas season 8 30', 299000.00, 390000.00, '2022-02-27', 'new', 'online', '2024-06-28 04:53:00', '2024-06-30 22:04:39', 'fashion'),
(20, 1, 'Rucas aop 32', 390000.00, 550000.00, '2022-03-06', 'new', 'online', '2024-06-28 06:16:19', '2024-06-30 22:04:45', 'fashion'),
(21, 1, 'Rucas aop 34', 390000.00, 580000.00, '2022-03-09', 'new', 'online', '2024-06-28 06:16:48', '2024-06-30 22:05:18', 'fashion'),
(22, 1, 'Iphone 11 64gb ibox 88%', 7400000.00, 8392762.00, '2022-03-11', 'second', 'online', '2024-06-28 06:17:29', '2024-06-30 22:05:23', 'gadget'),
(23, 1, 'Iphone xr 128gb ibox 87%', 6200000.00, 7406250.00, '2022-03-12', 'second', 'online', '2024-06-28 06:18:12', '2024-06-30 22:05:40', 'gadget'),
(24, 1, 'Iphone 11 128gb ibox 94%', 8450000.00, 9600000.00, '2022-03-14', 'second', 'offline', '2024-06-28 06:19:04', '2024-06-30 22:05:47', 'gadget'),
(25, 1, 'Rucas flanel sapphire L', 500000.00, 633750.00, '2024-03-23', 'second', 'online', '2024-06-28 06:21:37', '2024-06-30 22:05:54', 'fashion'),
(26, 1, 'Iphone xr 128gb ibox 89% black', 6550000.00, 7505000.00, '2022-03-28', 'second', 'online', '2024-06-28 06:22:16', '2024-06-30 22:05:59', 'gadget'),
(27, 1, 'aerostreet x na', 139900.00, 210000.00, '2022-04-12', 'new', 'online', '2024-06-28 06:23:27', '2024-06-30 22:06:06', 'fashion'),
(28, 1, 'Rucas x bimopd 33', 650000.00, 828750.00, '2022-04-16', 'second', 'online', '2024-06-28 06:24:10', '2024-06-30 22:06:20', 'fashion'),
(29, 1, 'Rucas caviar long 29', 390000.00, 487500.00, '2022-04-15', 'new', 'online', '2024-06-28 06:25:06', '2024-06-30 22:06:27', 'fashion'),
(30, 1, 'Rucas S8 caviar 34', 320000.00, 425000.00, '2022-04-19', 'new', 'online', '2024-06-28 06:25:48', '2024-06-30 22:06:32', 'fashion'),
(31, 1, 'Aerostreet x le mineral 39', 139900.00, 229125.00, '2022-04-19', 'new', 'online', '2024-06-28 06:26:34', '2024-06-30 22:06:41', 'fashion'),
(32, 1, 'Aerostreet x le mineral 39', 149900.00, 268125.00, '2022-04-19', 'new', 'online', '2024-06-28 06:27:15', '2024-07-02 23:20:24', 'fashion'),
(33, 1, 'Iphone 11 128gb black ibox 96%', 8600000.00, 8887500.00, '2022-04-20', 'second', 'online', '2024-06-28 06:28:22', '2024-07-02 23:20:28', 'gadget'),
(34, 1, 'Rucas kos 32', 390000.00, 575000.00, '2022-04-21', 'new', 'online', '2024-06-28 06:28:50', '2024-07-02 23:20:32', 'fashion'),
(35, 1, 'Compass slip-on 41', 479000.00, 500000.00, '2022-04-23', 'new', 'online', '2024-06-28 06:29:23', '2024-07-02 23:20:37', 'fashion'),
(36, 1, 'Iphone xr black 128gb ibox 88%', 6500000.00, 6863125.00, '2022-04-26', 'second', 'online', '2024-06-28 06:30:23', '2024-07-03 22:25:21', 'gadget'),
(37, 1, 'Rucas S8 caviar 29', 299000.00, 475000.00, '2022-04-28', 'new', 'online', '2024-06-28 06:30:55', '2024-07-03 22:25:27', 'fashion'),
(38, 1, 'Compass retro low bw 41', 620000.00, 650000.00, '2022-04-30', 'new', 'online', '2024-06-28 06:31:22', '2024-07-03 22:25:33', 'fashion'),
(39, 1, 'Compass retro low bw 41', 620000.00, 650000.00, '2022-04-30', 'new', 'online', '2024-06-28 06:31:22', '2024-07-03 22:25:40', 'fashion'),
(40, 1, 'Rucas Jade denim XL', 543000.00, 615000.00, '2022-05-06', 'new', 'online', '2024-06-28 06:32:00', '2024-07-03 22:25:45', 'fashion'),
(41, 1, 'Iphone xr 128gb ibox 87%', 6150000.00, 6517500.00, '2022-05-25', 'second', 'online', '2024-06-28 06:32:40', '2024-07-03 22:25:54', 'gadget'),
(42, 1, 'Rucas graphite 34', 650000.00, 731250.00, '2022-05-30', 'second', 'online', '2024-06-28 06:33:14', '2024-07-03 22:25:59', 'fashion'),
(43, 1, 'Rucas flanel full of surprise M', 306000.00, 390000.00, '2022-05-31', 'new', 'online', '2024-06-28 06:33:50', '2024-07-03 22:26:05', 'fashion'),
(44, 1, 'Iphone 11 64gb black ex ibox 86%', 6800000.00, 7100000.00, '2022-06-04', 'second', 'online', '2024-06-28 06:34:34', '2024-07-03 22:26:11', 'gadget'),
(45, 1, 'Iphone xr 64gb black  ibox 87%', 4750000.00, 5235000.00, '2022-06-14', 'second', 'online', '2024-06-28 06:35:14', '2024-07-03 22:26:17', 'gadget'),
(46, 1, 'Iphone 11 128gb purple  ibox 100%', 8000000.00, 8550000.00, '2022-06-18', 'second', 'online', '2024-06-28 06:35:56', '2024-07-03 22:26:26', 'gadget'),
(47, 1, 'Rucas combination blck 34', 390000.00, 560625.00, '2022-06-24', 'new', 'online', '2024-06-28 06:36:28', '2024-07-03 22:26:32', 'fashion'),
(48, 1, 'Rucas combination blck 30', 390000.00, 511875.00, '2022-06-26', 'new', 'online', '2024-06-28 06:37:02', '2024-07-03 22:26:38', 'fashion'),
(49, 1, 'Rucas combination blck 30', 390000.00, 633750.00, '2022-06-30', 'new', 'online', '2024-06-28 06:37:30', '2024-07-03 22:26:43', 'fashion'),
(50, 1, 'Gazelle low bw 41', 348000.00, 435000.00, '2022-07-05', 'new', 'online', '2024-06-28 06:38:14', '2024-07-03 22:26:50', 'fashion'),
(51, 1, 'Aerostreet hoops low 42', 165300.00, 248625.00, '2022-07-05', 'new', 'online', '2024-06-28 06:38:58', '2024-07-03 22:27:02', 'fashion'),
(52, 1, 'Aerostreet hoops low 44', 165300.00, 243750.00, '2022-07-05', 'new', 'online', '2024-06-28 06:40:06', '2024-07-03 22:27:09', 'fashion'),
(53, 1, 'Aerostreet x sun pride 38', 129900.00, 170625.00, '2022-07-10', 'new', 'online', '2024-06-28 06:41:50', '2024-07-03 22:27:14', 'fashion'),
(54, 1, 'Aerostreet hoops low 43', 301000.00, 365625.00, '2022-07-10', 'new', 'online', '2024-06-28 06:42:35', '2024-07-03 22:27:20', 'fashion'),
(55, 1, 'Iphone xr 128gb white ibox 89%', 5600000.00, 5900000.00, '2022-07-19', 'second', 'online', '2024-06-28 06:44:12', '2024-07-03 22:27:25', 'gadget'),
(56, 1, 'Iphone 11 64gb black ibox 89%', 6600000.00, 7405262.00, '2022-07-22', 'second', 'online', '2024-06-28 06:45:08', '2024-07-03 22:27:31', 'gadget'),
(57, 1, 'Aerostreet x promag 44', 150900.00, 229125.00, '2022-07-26', 'new', 'online', '2024-06-28 06:45:45', '2024-07-03 22:27:37', 'fashion'),
(58, 1, 'Rucas x bimopd 32', 756000.00, 853125.00, '2022-08-04', 'second', 'online', '2024-06-28 06:47:01', '2024-07-03 22:27:42', 'fashion'),
(59, 1, 'Gazelle low bw 41', 348000.00, 463125.00, '2022-08-16', 'new', 'online', '2024-06-28 06:47:37', '2024-07-03 22:27:50', 'fashion'),
(60, 1, 'Iphone xr 128gb black ibox 89%', 5500000.00, 5950000.00, '2022-08-27', 'second', 'offline', '2024-06-28 06:48:45', '2024-07-03 22:27:55', 'gadget'),
(61, 1, 'Iphone xr 128gb putih ibox 89%', 5400000.00, 5900000.00, '2022-08-30', 'second', 'offline', '2024-06-28 06:50:42', '2024-07-03 22:28:06', 'gadget'),
(62, 1, 'Catharsis wolfsbane M', 315600.00, 375375.00, '2022-08-30', 'new', 'online', '2024-06-28 06:51:40', '2024-07-03 22:28:15', 'fashion'),
(63, 1, 'Catharsis scapegoat M', 315600.00, 375375.00, '2022-08-30', 'new', 'online', '2024-06-28 06:52:18', '2024-07-03 22:28:21', 'fashion'),
(64, 1, 'Catharsis hoodie M', 717600.00, 765375.00, '2022-08-31', 'new', 'online', '2024-06-28 06:52:56', '2024-07-03 22:28:28', 'fashion'),
(65, 1, 'Rucas pacifi blue 36', 349000.00, 450000.00, '2022-09-02', 'new', 'offline', '2024-06-28 06:53:32', '2024-07-03 22:28:34', 'fashion'),
(66, 1, 'Iphone xr 64gb black ibox 88%', 4650000.00, 5150000.00, '2022-09-09', 'second', 'offline', '2024-06-28 06:54:47', '2024-07-03 22:28:41', 'gadget'),
(67, 1, 'Iphone xr 64gb black ibox 85%', 4750000.00, 5085625.00, '2022-09-11', 'second', 'online', '2024-06-28 06:57:02', '2024-07-03 22:28:48', 'gadget'),
(68, 1, 'Iphone 11 64gb black ibox 100%', 6400000.00, 7000000.00, '2022-09-14', 'second', 'offline', '2024-06-28 06:58:35', '2024-07-03 22:28:56', 'gadget'),
(69, 1, 'Iphone 11 64gb black ibox 100%', 6400000.00, 7000000.00, '2022-09-14', 'second', 'offline', '2024-06-28 06:58:36', '2024-07-03 22:29:02', 'gadget'),
(70, 1, 'Iphone 11 64gb black ibox 100%', 6700000.00, 7060625.00, '2022-09-16', 'second', 'online', '2024-06-28 06:59:31', '2024-07-03 22:29:13', 'gadget'),
(71, 1, 'Rucas x bimopd 31', 764000.00, 901875.00, '2022-09-18', 'second', 'online', '2024-06-28 07:00:36', '2024-07-03 22:29:27', 'fashion'),
(72, 1, 'Iphone 11 128gb purple ibox 85%', 7700000.00, 7800000.00, '2022-09-21', 'second', 'online', '2024-06-28 07:01:27', '2024-07-03 22:29:34', 'gadget'),
(73, 1, 'Paranoise vol.10 2', 169900.00, 242775.00, '2022-09-24', 'new', 'online', '2024-06-28 07:01:53', '2024-07-03 22:29:43', 'fashion'),
(74, 1, 'Iphone xr 128gb black ibox 96%', 5700000.00, 6350000.00, '2022-09-25', 'second', 'online', '2024-06-28 07:02:44', '2024-07-03 22:29:49', 'gadget'),
(75, 1, 'Tshirt rucas S9 M', 254588.00, 307125.00, '2022-10-01', 'new', 'online', '2024-06-28 07:03:45', '2024-07-03 22:29:58', 'fashion'),
(76, 1, 'Iphone xr 128gb white ibox 90%', 6100000.00, 6600000.00, '2022-10-06', 'second', 'online', '2024-06-28 07:04:35', '2024-07-03 22:30:04', 'gadget'),
(77, 1, 'Rucas classic biker 29', 560000.00, 804375.00, '2022-10-07', 'second', 'online', '2024-06-28 07:05:16', '2024-07-03 22:30:11', 'fashion'),
(78, 1, 'Iphone 11 64gb ibox black 91%', 6600000.00, 7060625.00, '2022-10-08', 'second', 'online', '2024-06-28 07:06:11', '2024-07-03 22:30:19', 'gadget'),
(79, 1, 'Iphone 11 128gb ibox black 84%', 7600000.00, 7900625.00, '2022-10-18', 'second', 'online', '2024-06-28 07:08:03', '2024-07-03 22:30:27', 'gadget'),
(80, 1, 'Hoodie catharsis core L', 717600.00, 772026.00, '2022-10-19', 'new', 'online', '2024-06-28 07:08:37', '2024-07-03 22:30:36', 'fashion'),
(81, 1, 'Iphone xr 64gb red ibox 92%', 5200000.00, 5530000.00, '2022-10-22', 'second', 'online', '2024-06-28 07:09:19', '2024-07-03 22:30:47', 'gadget'),
(82, 1, 'Iphone xr 128gb white ibox 97%', 6000000.00, 6665625.00, '2022-10-31', 'second', 'online', '2024-06-28 07:10:26', '2024-07-03 22:30:53', 'gadget'),
(83, 1, 'Catharsis hoodie L', 717600.00, 850000.00, '2022-11-03', 'new', 'online', '2024-06-28 07:10:54', '2024-07-03 22:30:58', 'fashion'),
(84, 1, 'Iphone 11 64gb purple ibox 95%', 6550000.00, 7700000.00, '2022-11-08', 'second', 'offline', '2024-06-28 07:11:33', '2024-07-03 22:32:13', 'gadget'),
(85, 1, 'Rucas black stripes 31', 300000.00, 438750.00, '2022-11-08', 'new', 'online', '2024-06-28 07:12:13', '2024-07-03 22:32:22', 'fashion'),
(86, 1, 'Iphone xr 128gb red ibox 87%', 5800000.00, 6150000.00, '2022-11-10', 'second', 'offline', '2024-06-28 07:13:01', '2024-07-03 22:32:27', 'gadget'),
(87, 1, 'Rucas tshirt season 10 M', 238500.00, 300000.00, '2022-11-13', 'new', 'online', '2024-06-28 07:13:39', '2024-07-03 22:32:33', 'fashion'),
(88, 1, 'Rucas black stripes 31', 300000.00, 358125.00, '2022-11-13', 'new', 'online', '2024-06-28 07:14:24', '2024-07-03 22:32:43', 'fashion'),
(89, 1, 'Iphone 11 64gb purple ibox 100%', 7100000.00, 7356875.00, '2022-11-15', 'second', 'online', '2024-06-28 07:15:32', '2024-07-03 22:32:49', 'gadget'),
(90, 1, 'Iphone 11 64gb black ibox 88%', 6450000.00, 7110000.00, '2022-11-16', 'second', 'online', '2024-06-28 07:16:20', '2024-07-03 22:32:54', 'gadget'),
(91, 1, 'Aerostreet x sinchan 39', 192400.00, 350000.00, '2022-11-17', 'new', 'online', '2024-06-28 07:17:04', '2024-07-03 22:33:04', 'fashion'),
(92, 1, 'Iphone xr 128gb red ibox 86%', 5700000.00, 6566876.00, '2022-11-26', 'second', 'online', '2024-06-28 07:18:19', '2024-07-03 22:33:10', 'gadget'),
(93, 1, 'Iphone 11 128gb purple ibox 84%', 7000000.00, 7900000.00, '2022-11-28', 'second', 'online', '2024-06-28 07:18:49', '2024-07-03 22:33:15', 'gadget'),
(94, 1, 'Compass x boy pablo 39', 779500.00, 975000.00, '2022-12-06', 'new', 'online', '2024-06-28 07:19:20', '2024-07-03 22:33:20', 'fashion'),
(95, 1, 'Iphone 11 128 black ibox 92%', 7700000.00, 7998750.00, '2022-12-14', 'second', 'online', '2024-06-28 07:19:54', '2024-07-03 22:33:35', 'gadget'),
(96, 1, 'Compass x boy pablo 38', 779500.00, 1100000.00, '2022-12-16', 'new', 'online', '2024-06-28 07:20:29', '2024-07-03 22:33:42', 'fashion'),
(97, 1, 'Rucas tshirt last collection 2022 L', 238500.00, 355875.00, '2022-12-26', 'new', 'online', '2024-06-28 07:21:14', '2024-07-03 22:33:50', 'fashion'),
(98, 1, 'Rucas caviar short white 30', 359500.00, 453375.00, '2022-12-27', 'new', 'online', '2024-06-28 07:21:56', '2024-07-03 22:33:56', 'fashion'),
(99, 1, 'Retro low bw 41', 538000.00, 590000.00, '2022-12-30', 'new', 'online', '2024-06-28 07:22:24', '2024-07-03 22:34:02', 'fashion'),
(100, 1, 'Aerostreet x blibli 43', 162548.00, 240000.00, '2023-01-01', 'new', 'online', '2024-06-29 05:25:49', '2024-07-03 22:34:08', 'fashion'),
(101, 1, 'Iphone 13 128 white ibox 96%', 12500000.00, 13500000.00, '2023-01-02', 'second', 'online', '2024-06-29 05:26:48', '2024-07-03 22:35:41', 'gadget'),
(102, 1, 'Iphone 13 128 midnight ibox 100%', 12500000.00, 13500000.00, '2023-01-04', 'second', 'online', '2024-06-29 05:27:41', '2024-07-03 22:35:47', 'gadget'),
(103, 1, 'Iphone 11 64 purple ibox 99% on', 7300000.00, 7800000.00, '2023-01-22', 'second', 'online', '2024-06-29 05:28:15', '2024-07-03 22:35:52', 'gadget'),
(104, 1, 'Rucas grand combination S9 34', 390000.00, 650000.00, '2023-02-02', 'new', 'online', '2024-06-29 05:28:53', '2024-07-03 22:35:58', 'fashion'),
(105, 1, 'Aerostreet x sinchan 40', 192400.00, 300000.00, '2023-02-06', 'new', 'online', '2024-06-29 05:29:33', '2024-07-03 22:36:02', 'fashion'),
(106, 1, 'Iphone 11 64 white', 7500000.00, 7800000.00, '2023-02-12', 'new', 'offline', '2024-06-29 05:30:06', '2024-07-03 22:36:08', 'gadget'),
(107, 1, 'Sukajan shinjuku L', 464500.00, 600000.00, '2023-03-09', 'new', 'online', '2024-06-29 05:30:52', '2024-07-03 22:36:13', 'fashion'),
(108, 1, 'Iphone 13 pm 128 sierra blue ibox 91%', 16700000.00, 16500000.00, '2023-03-19', 'second', 'offline', '2024-06-29 05:31:27', '2024-07-03 22:36:26', 'gadget'),
(109, 1, 'Iphone 11 64 purple ibox 96%', 6800000.00, 7921800.00, '2023-03-20', 'second', 'online', '2024-06-29 05:32:37', '2024-07-03 22:36:35', 'gadget'),
(110, 1, 'Catharsis walpurgisnacht M', 386000.00, 433000.00, '2023-03-26', 'new', 'online', '2024-06-29 05:33:03', '2024-07-03 22:36:52', 'fashion'),
(111, 1, 'Rucas Longsleeve L', 387000.00, 408000.00, '2023-03-26', 'new', 'online', '2024-06-29 05:33:30', '2024-07-03 22:42:42', 'fashion'),
(112, 1, 'Iphone xr 128 black ibox 87%', 6700000.00, 6998400.00, '2023-04-01', 'second', 'online', '2024-06-29 05:35:38', '2024-07-03 22:42:48', 'gadget'),
(113, 1, 'Rucas S11 caviar grey 29', 428500.00, 600000.00, '2023-04-07', 'new', 'online', '2024-06-29 05:36:03', '2024-07-03 22:42:53', 'fashion'),
(114, 1, 'Rucas x bimopd 32', 684000.00, 888000.00, '2023-04-15', 'second', 'online', '2024-06-29 05:36:43', '2024-07-03 22:43:00', 'fashion'),
(115, 1, 'Aerostreet x tango 41', 159500.00, 215000.00, '2023-04-15', 'new', 'online', '2024-06-29 05:38:37', '2024-07-03 22:43:06', 'fashion'),
(116, 1, 'Iphone 13 PM 128 sierra blue 89%', 14595100.00, 15000000.00, '2023-04-15', 'second', 'offline', '2024-06-29 05:39:26', '2024-07-03 22:43:11', 'gadget'),
(117, 1, 'Rucas flanel Juna M', 372500.00, 432000.00, '2023-04-16', 'new', 'online', '2024-06-29 05:39:57', '2024-07-03 22:43:18', 'fashion'),
(118, 1, 'Aerostreet x khong guan 44', 161900.00, 283200.00, '2023-04-18', 'new', 'online', '2024-06-29 05:41:09', '2024-07-03 22:43:24', 'fashion'),
(119, 1, 'Aerostreet x sinchan 41', 192400.00, 340800.00, '2023-04-18', 'new', 'online', '2024-06-29 05:41:52', '2024-07-03 22:43:31', 'fashion'),
(120, 1, 'Iphone 12 pro 128 pacific blue 87%', 11550000.00, 12206000.00, '2023-04-18', 'second', 'online', '2024-06-29 05:42:32', '2024-07-03 22:43:38', 'gadget'),
(121, 1, 'Rucas Caviar short white 36', 358500.00, 425000.00, '2023-04-24', 'new', 'online', '2024-06-29 05:43:01', '2024-07-03 22:41:26', 'fashion'),
(122, 1, 'Iphone xr 128gb black ex ibox 90%', 5734400.00, 6804000.00, '2023-04-25', 'second', 'online', '2024-06-29 05:43:58', '2024-07-03 22:41:32', 'gadget'),
(123, 1, 'Iphone 11 128 black ibox 100%', 8000000.00, 8550000.00, '2023-04-29', 'second', 'offline', '2024-06-29 05:44:40', '2024-07-03 22:41:38', 'gadget'),
(124, 1, 'Iphone 13 pro 128 sierra blue ibox 87%', 14600000.00, 15350000.00, '2023-05-04', 'second', 'online', '2024-06-29 05:45:21', '2024-07-03 22:41:43', 'gadget'),
(125, 1, 'Iphone xr 64 ex ibox 84%', 5000000.00, 5650000.00, '2023-05-07', 'second', 'online', '2024-06-29 05:45:53', '2024-07-03 22:41:48', 'gadget'),
(126, 1, 'Aerostreet x ken 39', 192350.00, 250000.00, '2023-05-19', 'new', 'online', '2024-06-29 05:46:23', '2024-07-03 22:41:56', 'fashion'),
(127, 1, 'Rucas tshirt S9 L full of surprise', 258500.00, 350000.00, '2023-05-26', 'new', 'online', '2024-06-29 05:46:51', '2024-07-03 22:42:03', 'fashion'),
(128, 1, 'Aerostreet x paddlepop 37', 181900.00, 280000.00, '2023-05-29', 'new', 'offline', '2024-06-29 05:47:27', '2024-07-03 22:42:24', 'fashion'),
(129, 1, 'Aerostreet x paddlepop 39', 187900.00, 300000.00, '2023-05-29', 'new', 'offline', '2024-06-29 05:47:59', '2024-07-03 22:42:29', 'fashion'),
(130, 1, 'Aerostreet x paddlepop 40', 181900.00, 288000.00, '2023-05-30', 'new', 'online', '2024-06-29 05:48:56', '2024-07-03 22:42:35', 'fashion'),
(131, 1, 'Aerostreet x paddlepop 44', 186900.00, 312000.00, '2023-05-30', 'new', 'online', '2024-06-29 05:49:25', '2024-07-03 22:40:16', 'fashion'),
(132, 1, 'Rucas flannel blue gradation S', 372500.00, 450000.00, '2023-06-15', 'new', 'online', '2024-06-29 05:50:58', '2024-07-03 22:40:21', 'fashion'),
(133, 1, 'Iphone 11 128 black ibox garansi oktober 2023 bh 99%', 7800000.00, 8200000.00, '2023-06-19', 'second', 'offline', '2024-06-29 05:51:41', '2024-07-03 22:40:29', 'gadget'),
(134, 1, 'Aerostreet x paddlepop 44', 186900.00, 360000.00, '2023-06-24', 'new', 'online', '2024-06-29 05:52:15', '2024-07-03 22:40:35', 'fashion'),
(135, 1, 'Rucas tshirt palm XL', 258500.00, 350400.00, '2023-06-25', 'new', 'online', '2024-06-29 05:52:50', '2024-07-03 22:40:41', 'fashion'),
(136, 1, 'Rucas x persija M', 280400.00, 336000.00, '2023-06-25', 'new', 'online', '2024-06-29 05:53:30', '2024-07-03 22:40:47', 'fashion'),
(137, 1, 'Iphone 7+ 128 black ibox 100%', 2700000.00, 3000000.00, '2023-06-29', 'second', 'online', '2024-06-29 05:53:56', '2024-07-03 22:40:54', 'gadget'),
(138, 1, 'Iphone xr 64 black ibox 83%', 4800000.00, 5000000.00, '2023-06-30', 'second', 'online', '2024-06-29 05:54:22', '2024-07-03 22:41:02', 'gadget'),
(139, 1, 'Iphone 13 128 ibox black 100% garansi 2024', 11200000.00, 11723400.00, '2023-07-05', 'second', 'online', '2024-06-29 05:55:13', '2024-07-03 22:41:11', 'gadget'),
(140, 1, 'Iphone 12 pro 128 pacific blue ibox 86%', 11700000.00, 11950000.00, '2023-07-06', 'second', 'online', '2024-06-29 05:55:41', '2024-07-03 22:41:18', 'gadget'),
(141, 1, 'Aerostreet x ken 38', 192350.00, 250000.00, '2023-07-08', 'new', 'online', '2024-06-29 05:56:05', '2024-07-03 22:38:59', 'fashion'),
(142, 1, 'Rucas flannel Juna S', 372500.00, 450000.00, '2023-07-14', 'new', 'online', '2024-06-29 05:56:31', '2024-07-03 22:39:04', 'fashion'),
(143, 1, 'Rucas handstitch M longsleeve', 313125.00, 349400.00, '2023-07-29', 'new', 'online', '2024-06-29 05:56:55', '2024-07-03 22:39:09', 'fashion'),
(144, 1, 'Iphone xr 128 black ex ibox 82%', 5300000.00, 5650000.00, '2023-08-02', 'second', 'online', '2024-06-29 05:57:50', '2024-07-03 22:39:15', 'gadget'),
(145, 1, 'Iphone 11 64 black ibox 87%', 6600000.00, 6200000.00, '2023-08-24', 'new', 'online', '2024-06-29 05:58:34', '2024-07-03 22:39:20', 'gadget'),
(146, 1, 'Kanky kemerdekaan 38', 207378.00, 278400.00, '2023-08-24', 'new', 'online', '2024-06-29 05:59:10', '2024-07-03 22:39:44', 'fashion'),
(147, 1, 'Rucas ts skeleton tee S', 284200.00, 379200.00, '2023-08-29', 'new', 'online', '2024-06-29 05:59:49', '2024-07-03 22:39:50', 'fashion'),
(148, 1, 'Rucas ts skeleton tee M', 284200.00, 379200.00, '2023-08-29', 'new', 'online', '2024-06-29 06:00:23', '2024-07-03 22:39:55', 'fashion'),
(149, 1, 'Iphone 11 128 inter 76%', 3000000.00, 3500000.00, '2024-09-02', 'second', 'online', '2024-06-29 06:00:50', '2024-07-03 22:40:01', 'gadget'),
(150, 1, 'Paranoise vol.10 2', 167900.00, 239040.00, '2023-09-04', 'new', 'online', '2024-06-29 06:01:21', '2024-07-03 22:40:08', 'fashion'),
(151, 1, 'Iphone 11 pro 256 inter 81%', 4600000.00, 5150000.00, '2023-09-14', 'second', 'offline', '2024-06-29 06:02:00', '2024-07-03 22:37:26', 'gadget'),
(152, 1, 'Iphone xr 64 putih ibox 88%', 4800000.00, 5491800.00, '2023-09-15', 'second', 'online', '2024-06-29 06:02:59', '2024-07-03 22:37:31', 'gadget'),
(153, 1, 'Iphone xr 64 black ibox 88%', 4800000.00, 5394600.00, '2023-09-15', 'second', 'online', '2024-06-29 06:03:40', '2024-07-03 22:37:37', 'gadget'),
(154, 1, 'Iphone 11 128 inter 96%', 3200000.00, 3600000.00, '2023-09-23', 'second', 'offline', '2024-06-29 06:04:15', '2024-07-03 22:37:42', 'gadget'),
(155, 1, 'Iphone 11 promax 256 inter', 5000000.00, 5200000.00, '2023-09-25', 'second', 'offline', '2024-06-29 06:04:51', '2024-07-03 22:37:48', 'gadget'),
(156, 1, 'Iphone 11 128 black ibox bh 100% garansi on', 7552500.00, 8067600.00, '2023-10-12', 'second', 'online', '2024-06-29 06:05:19', '2024-07-03 22:37:54', 'gadget'),
(157, 1, 'Rucas caviar navy v2 30', 388500.00, 500000.00, '2023-12-03', 'new', 'online', '2024-06-29 06:05:52', '2024-07-03 22:38:00', 'fashion'),
(158, 1, 'Hecate C.Wolf drop 11 L', 317000.00, 400000.00, '2023-11-22', 'new', 'online', '2024-06-29 06:06:24', '2024-07-03 22:38:05', 'fashion'),
(159, 1, 'Catharsis undertaker M', 386000.00, 415000.00, '2023-12-19', 'new', 'online', '2024-06-29 06:07:49', '2024-07-03 22:38:11', 'fashion'),
(160, 1, 'Catharsis undertaker L', 386000.00, 475000.00, '2023-12-20', 'new', 'online', '2024-06-29 06:08:32', '2024-07-03 22:38:17', 'fashion'),
(161, 1, 'Rucas embossed ziphoodie', 491173.00, 552000.00, '2023-11-08', 'new', 'online', '2024-06-29 06:09:09', '2024-07-03 22:38:25', 'fashion'),
(162, 1, 'Iphone xr 128 putih ibox 90%', 5500000.00, 5934750.00, '2023-12-01', 'second', 'online', '2024-06-29 06:09:52', '2024-07-03 22:38:30', 'gadget'),
(163, 1, 'Rucas initial hand stitch M', 291100.00, 329000.00, '2023-12-07', 'new', 'online', '2024-06-29 06:10:16', '2024-07-03 22:38:39', 'fashion'),
(164, 1, 'Iphone 13 pro 128 alpine green ibox garansi oktober 2023 100%', 15000000.00, 15400000.00, '2023-12-04', 'second', 'online', '2024-06-29 06:10:52', '2024-07-03 22:38:45', 'gadget'),
(165, 1, 'Iphone 11 128 putih ibox 90%', 8000000.00, 8400000.00, '2023-12-14', 'second', 'offline', '2024-06-29 06:11:22', '2024-07-03 22:38:51', 'gadget'),
(167, 1, 'kdnapfndv', 2000000.00, 2500000.00, '2024-06-19', 'second', 'online', '2024-07-02 18:48:42', '2024-07-02 22:40:09', 'fashion'),
(168, 1, 'bsfabravv', 125000.00, 300000.00, '2024-07-01', 'second', 'online', '2024-07-05 21:49:15', '2024-07-05 21:49:15', 'fashion'),
(169, 1, 'dandi', 500000.00, 1000000.00, '2024-07-03', 'new', 'online', '2024-07-06 03:00:47', '2024-07-06 03:00:47', 'fashion'),
(170, 2, 'condro', 3000000.00, 4000000.00, '2025-01-16', 'new', 'online', '2024-07-06 03:01:29', '2024-07-09 07:19:10', 'fashion'),
(171, 2, 'kopi', 5000.00, 3000.00, '2024-07-08', 'new', 'online', '2024-07-09 07:17:49', '2024-07-09 07:17:49', 'fashion');

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
('3MvQoYtoLDRbMR4jCxL01uDLHVJopFejOOIGS1Bi', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3JlcG9ydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJBRE5EYlk3akNLb1dVTGVzR3QxWTAwUXBDdlc3QjVsZ3NsZm1BRXg0IjtzOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1720537080);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'patlima', 'patlima@admin.com', NULL, '$2y$12$yGQbYWtZNrKowJ8qtLLCMOqgvWkg2xO7R382anitTOxfgMd6TEOJm', NULL, '2024-07-09 07:04:46', '2024-07-09 07:04:46'),
(2, 'admin', 'admin@admin.com', NULL, '$2y$12$ZUxO5V1br.3/YAxhKTYqmeEKWpWu13QC.gZHJLb7zRuwXWRIcDe.K', NULL, '2024-07-09 07:07:08', '2024-07-09 07:07:08');

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
