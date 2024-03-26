-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2024 at 11:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarsip_frasta`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_dokumentasi`
--

CREATE TABLE `arsip_dokumentasi` (
  `id_arsip_dokumentasi` bigint UNSIGNED NOT NULL,
  `kode_arsip_dokumentasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dokumentasi` date DEFAULT NULL,
  `id_departemen` bigint UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `file_arsip_dokumentasi` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_karyawan`
--

CREATE TABLE `arsip_karyawan` (
  `id_arsip_karyawan` bigint UNSIGNED NOT NULL,
  `kode_arsip_karyawan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_arsip` bigint UNSIGNED NOT NULL,
  `id_karyawan` bigint UNSIGNED NOT NULL,
  `id_departemen` bigint UNSIGNED NOT NULL,
  `retensi_arsip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_arsip_karyawan` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE `arsip_surat` (
  `id_arsip_surat` bigint UNSIGNED NOT NULL,
  `kode_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_departemen` bigint UNSIGNED NOT NULL,
  `id_pengirim_surat` bigint UNSIGNED DEFAULT NULL,
  `id_penerima_surat` bigint UNSIGNED DEFAULT NULL,
  `file_arsip_surat` text COLLATE utf8mb4_unicode_ci,
  `tipe_surat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_surat` enum('Pending','Approve','Not Approve','Request Update','Revisi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id_avatar` bigint UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id_avatar`, `url`, `created_at`, `updated_at`) VALUES
(1, 'assets/avatar/avatar-1.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(2, 'assets/avatar/avatar-2.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(3, 'assets/avatar/avatar-3.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(4, 'assets/avatar/avatar-4.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(5, 'assets/avatar/avatar-5.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(6, 'assets/avatar/avatar-6.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(7, 'assets/avatar/avatar-7.png', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(8, 'assets/avatar/avatar-8.png', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(9, 'assets/avatar/avatar-9.png', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(10, 'assets/avatar/avatar-10.png', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(11, 'assets/avatar/avatar-11.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(12, 'assets/avatar/avatar-12.jpg', '2024-03-26 11:01:02', '2024-03-26 11:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` bigint UNSIGNED NOT NULL,
  `nama_departemen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Legal', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(2, 'IT', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(3, 'HRD', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(4, 'Akuntansi', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(5, 'Lelang', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(6, 'Marketing', '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(7, 'Office Boy', '2024-03-26 11:01:02', '2024-03-26 11:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` bigint UNSIGNED NOT NULL,
  `nama_karyawan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_karyawan` enum('Karyawan Kontrak','Karyawan Tetap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `kontak`, `email`, `status_karyawan`, `pendidikan_terakhir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ambrosius Melmambessy', '3233445566778877', 'Laki-laki', '1999-12-31', 'Jl. Maluku Utara', '083812121212', 'amboganteng@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-05 08:58:15', '2024-01-05 22:01:31', NULL),
(2, 'Mahmudi', '32343536373839', 'Laki-laki', '1999-07-01', 'Jl. Madura Jaya', '0838413777778', 'mahmudi@gmail.com', 'Karyawan Kontrak', 'S1 Sistem ', '2023-10-11 02:39:24', '2024-01-05 21:06:49', NULL),
(3, 'Mendhy Nisya Salsadila', '3344556677889900', 'Perempuan', '2000-11-01', 'Jl .Kalimantan Timur', '089627561122', 'mendhy12@gmail.com', 'Karyawan Kontrak', 'SMA', '2023-10-11 02:40:49', '2024-01-04 23:19:55', NULL),
(4, 'Fahri Arya Firnando', '31234566778899', 'Laki-laki', '2000-02-25', 'Jl. Banguntapan No. 12', '087774156711', 'fahriarya@gmail.com', 'Karyawan Kontrak', 'SMA', '2023-10-11 02:42:27', '2023-10-11 02:46:52', NULL),
(5, 'Andri Suhendar', '313132323333343435', 'Laki-laki', '2000-02-02', 'Jl. Prambanan No. A1', '083813131313', 'andrisuhendar@gmail.com', 'Karyawan Kontrak', 'SMA', '2023-10-11 02:48:29', '2023-10-11 02:48:29', NULL),
(6, 'Sunita Rospa', '36373839404142', 'Perempuan', '2000-01-02', 'Jl. Saren No. A2', '083815151515', 'nitarospa@gmail.com', 'Karyawan Tetap', 'S1 Sistem ', '2023-10-11 02:50:16', '2023-10-11 02:50:16', NULL),
(7, 'Mersyana Joko Sena', '298979695949', 'Perempuan', '2000-09-08', 'Jl. Saren No. A2', '083812131415', 'mersyanajokosena@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:05:34', '2023-10-11 03:05:34', NULL),
(8, 'Erfan Efendi', '39001002456654', 'Laki-laki', '1999-10-10', 'Jl. Candi Gebang No. 11', '081345677654', 'erfanefendi@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:08:43', '2023-10-11 03:08:43', NULL),
(9, 'Tanzilul Furqon', '3132313244556677', 'Laki-laki', '1999-06-08', 'Dsn. Gowok No. 13', '0877745679876', 'tanzilulfurqon@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:10:42', '2023-10-11 03:10:42', NULL),
(10, 'Nafa Septiana', '313344555667788', 'Perempuan', '1999-11-18', 'Jl. Kledokan No. A4', '081345678765', 'nafaseptiana@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:45:33', '2023-10-11 03:45:33', NULL),
(11, 'Ilham Prasetia', '3602110311990005', 'Laki-laki', '1998-11-03', 'Jl. Siliwangi No. 9', '083841371077', 'ilhamprasetia44@gmail.com', 'Karyawan Tetap', 'SMA', '2024-01-08 19:20:49', '2024-01-08 19:20:49', NULL),
(12, 'Miftahul Arifin', '371212131314140001', 'Laki-laki', '2000-01-03', 'Jl. Tresno No. A2', '081910894911', 'miftahularifin@gmail.com', 'Karyawan Kontrak', 'SMA', '2024-01-08 19:22:43', '2024-03-13 07:34:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_arsip`
--

CREATE TABLE `kategori_arsip` (
  `id_kategori_arsip` bigint UNSIGNED NOT NULL,
  `nama_kategori_arsip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_arsip`
--

INSERT INTO `kategori_arsip` (`id_kategori_arsip`, `nama_kategori_arsip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SKCK', '2024-03-26 11:01:02', '2024-03-26 11:01:02', NULL),
(2, 'KTP', '2024-03-26 11:01:02', '2024-03-26 11:01:02', NULL),
(3, 'Ijazah SMA', '2024-03-26 11:01:02', '2024-03-26 11:01:02', NULL),
(4, 'Ijazah S1', '2024-03-26 11:01:02', '2024-03-26 11:01:02', NULL),
(5, 'Lisensi SKB', '2024-03-26 11:01:02', '2024-03-26 11:01:02', NULL),
(6, 'Lisensi ASKB', '2024-03-26 11:01:02', '2024-03-26 11:01:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_surat`
--

CREATE TABLE `komentar_surat` (
  `id_komentar` bigint UNSIGNED NOT NULL,
  `id_arsip_surat` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_22_113017_create_departemen_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_22_104805_create_avatar_table', 1),
(7, '2024_03_22_105351_create_notifikasi_table', 1),
(8, '2024_03_22_105706_create_kategori_arsip_table', 1),
(9, '2024_03_22_105950_create_karyawan_table', 1),
(10, '2024_03_22_110312_create_penerima_surat_table', 1),
(11, '2024_03_22_110407_create_pengirim_surat_table', 1),
(12, '2024_03_22_110642_create_arsip_dokumentasi_table', 1),
(13, '2024_03_22_111138_create_arsip_karyawan_table', 1),
(14, '2024_03_22_111350_create_arsip_surat_table', 1),
(15, '2024_03_26_172827_create_komentar_surat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` bigint UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `penerima_id` bigint UNSIGNED NOT NULL,
  `read_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerima_surat`
--

CREATE TABLE `penerima_surat` (
  `id_penerima_surat` bigint UNSIGNED NOT NULL,
  `nama_penerima_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerima_surat`
--

INSERT INTO `penerima_surat` (`id_penerima_surat`, `nama_penerima_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ivan Rakitic', '2023-10-05 07:31:55', '2024-01-08 19:30:19', NULL),
(2, 'Dani Alves', '2023-10-11 04:39:53', '2024-01-08 19:29:26', NULL),
(3, 'Mascherano', '2023-10-11 04:40:10', '2024-01-08 19:28:57', NULL),
(4, 'Jordi Alba', '2023-10-11 04:42:35', '2024-01-08 19:28:27', NULL),
(5, 'Ter Stegen', '2023-10-11 04:43:40', '2024-01-08 19:27:36', NULL),
(6, 'Neymar Jr', '2023-11-23 19:09:58', '2024-01-08 19:27:24', NULL),
(7, 'Lionel Messi', '2023-11-23 19:10:06', '2024-01-08 19:27:11', NULL),
(8, 'Luis Suarez', '2023-11-23 19:10:15', '2024-01-08 19:27:00', NULL),
(9, 'Sergio Busquets', '2023-11-23 19:10:23', '2024-01-08 19:26:49', NULL),
(10, 'Andreas Iniesta', '2023-11-23 19:10:31', '2024-01-08 19:26:04', NULL),
(11, 'Xavi', '2024-01-02 19:52:43', '2024-01-08 19:25:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim_surat`
--

CREATE TABLE `pengirim_surat` (
  `id_pengirim_surat` bigint UNSIGNED NOT NULL,
  `nama_pengirim_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirim_surat`
--

INSERT INTO `pengirim_surat` (`id_pengirim_surat`, `nama_pengirim_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casemiro', '2022-01-03 06:49:49', '2024-01-08 19:23:45', NULL),
(2, 'Pepe', '2023-10-11 04:31:17', '2024-01-08 19:24:11', NULL),
(3, 'Luca Modric', '2023-10-11 04:33:30', '2024-01-08 19:23:30', NULL),
(4, 'Toni Kroos', '2023-10-11 04:35:25', '2024-01-06 00:46:39', NULL),
(5, 'Sergio Ramos', '2023-10-11 04:37:49', '2024-01-05 22:56:51', NULL),
(6, 'Karim Benzema', '2023-11-23 19:08:29', '2024-01-05 22:56:38', NULL),
(7, 'Gareth Bale', '2023-11-23 19:08:48', '2024-01-05 22:56:27', NULL),
(8, 'Iker Casillas', '2023-11-23 19:09:14', '2024-01-05 22:03:45', NULL),
(9, 'Cristiano Ronaldo', '2023-11-23 19:09:26', '2024-01-05 22:03:15', NULL),
(10, 'Dani Carvajal', '2024-01-08 19:24:43', '2024-01-08 19:25:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `level` enum('karyawan','admin','manajer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'karyawan',
  `id_departemen` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `email`, `password`, `profile`, `level`, `id_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Subur Permana', 'admin@gmail.com', '$2y$10$qidDRdC0bWeb4hWJF5y7VuTxV/dJiMlnAQ8AJRjT1AjoryELZ52ga', 'assets/profile-images/17101254507367.jpg', 'admin', 2, '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(2, 'Asep Saipul Hamdi', 'manajer@gmail.com', '$2y$10$k833SfAkZZpS9LpAQRTituu8WyaeEcbSMgYmgMSHBg7HTHqyoNW5a', 'assets/profile-images/17101254507367.jpg', 'manajer', 1, '2024-03-26 11:01:02', '2024-03-26 11:01:02'),
(3, 'Ilham Prasetia', 'karyawan@gmail.com', '$2y$10$ePA68t6dkyB0JcsizJv/OenhNSoASUQfuhZm32BhO.WNyCAI/0sIu', 'assets/profile-images/17101254507367.jpg', 'karyawan', 3, '2024-03-26 11:01:02', '2024-03-26 11:01:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_dokumentasi`
--
ALTER TABLE `arsip_dokumentasi`
  ADD PRIMARY KEY (`id_arsip_dokumentasi`),
  ADD KEY `arsip_dokumentasi_id_departemen_foreign` (`id_departemen`),
  ADD KEY `arsip_dokumentasi_user_id_foreign` (`user_id`);

--
-- Indexes for table `arsip_karyawan`
--
ALTER TABLE `arsip_karyawan`
  ADD PRIMARY KEY (`id_arsip_karyawan`),
  ADD KEY `arsip_karyawan_id_kategori_arsip_foreign` (`id_kategori_arsip`),
  ADD KEY `arsip_karyawan_id_karyawan_foreign` (`id_karyawan`),
  ADD KEY `arsip_karyawan_id_departemen_foreign` (`id_departemen`),
  ADD KEY `arsip_karyawan_user_id_foreign` (`user_id`);

--
-- Indexes for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD PRIMARY KEY (`id_arsip_surat`),
  ADD KEY `arsip_surat_id_departemen_foreign` (`id_departemen`),
  ADD KEY `arsip_surat_id_pengirim_surat_foreign` (`id_pengirim_surat`),
  ADD KEY `arsip_surat_id_penerima_surat_foreign` (`id_penerima_surat`),
  ADD KEY `arsip_surat_user_id_foreign` (`user_id`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id_avatar`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_arsip`
--
ALTER TABLE `kategori_arsip`
  ADD PRIMARY KEY (`id_kategori_arsip`);

--
-- Indexes for table `komentar_surat`
--
ALTER TABLE `komentar_surat`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_surat_id_arsip_surat_foreign` (`id_arsip_surat`),
  ADD KEY `komentar_surat_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `notifikasi_user_id_foreign` (`user_id`),
  ADD KEY `notifikasi_penerima_id_foreign` (`penerima_id`);

--
-- Indexes for table `penerima_surat`
--
ALTER TABLE `penerima_surat`
  ADD PRIMARY KEY (`id_penerima_surat`);

--
-- Indexes for table `pengirim_surat`
--
ALTER TABLE `pengirim_surat`
  ADD PRIMARY KEY (`id_pengirim_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_departemen_foreign` (`id_departemen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_dokumentasi`
--
ALTER TABLE `arsip_dokumentasi`
  MODIFY `id_arsip_dokumentasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arsip_karyawan`
--
ALTER TABLE `arsip_karyawan`
  MODIFY `id_arsip_karyawan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  MODIFY `id_arsip_surat` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id_avatar` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori_arsip`
--
ALTER TABLE `kategori_arsip`
  MODIFY `id_kategori_arsip` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar_surat`
--
ALTER TABLE `komentar_surat`
  MODIFY `id_komentar` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerima_surat`
--
ALTER TABLE `penerima_surat`
  MODIFY `id_penerima_surat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengirim_surat`
--
ALTER TABLE `pengirim_surat`
  MODIFY `id_pengirim_surat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_dokumentasi`
--
ALTER TABLE `arsip_dokumentasi`
  ADD CONSTRAINT `arsip_dokumentasi_id_departemen_foreign` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `arsip_dokumentasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `arsip_karyawan`
--
ALTER TABLE `arsip_karyawan`
  ADD CONSTRAINT `arsip_karyawan_id_departemen_foreign` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `arsip_karyawan_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `arsip_karyawan_id_kategori_arsip_foreign` FOREIGN KEY (`id_kategori_arsip`) REFERENCES `kategori_arsip` (`id_kategori_arsip`),
  ADD CONSTRAINT `arsip_karyawan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD CONSTRAINT `arsip_surat_id_departemen_foreign` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `arsip_surat_id_penerima_surat_foreign` FOREIGN KEY (`id_penerima_surat`) REFERENCES `penerima_surat` (`id_penerima_surat`),
  ADD CONSTRAINT `arsip_surat_id_pengirim_surat_foreign` FOREIGN KEY (`id_pengirim_surat`) REFERENCES `pengirim_surat` (`id_pengirim_surat`),
  ADD CONSTRAINT `arsip_surat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `komentar_surat`
--
ALTER TABLE `komentar_surat`
  ADD CONSTRAINT `komentar_surat_id_arsip_surat_foreign` FOREIGN KEY (`id_arsip_surat`) REFERENCES `arsip_surat` (`id_arsip_surat`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_surat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_departemen_foreign` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
