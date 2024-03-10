-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 06:29 PM
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
-- Database: `simarsip_frasta`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_dokumentasi`
--

CREATE TABLE `arsip_dokumentasi` (
  `id_arsip_dokumentasi` int(11) NOT NULL,
  `kode_arsip_dokumentasi` varchar(100) NOT NULL,
  `tanggal_dokumentasi` date NOT NULL,
  `id_karyawan` bigint(20) NOT NULL,
  `id_departemen` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `file_arsip_dokumentasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_dokumentasi`
--

INSERT INTO `arsip_dokumentasi` (`id_arsip_dokumentasi`, `kode_arsip_dokumentasi`, `tanggal_dokumentasi`, `id_karyawan`, `id_departemen`, `keterangan`, `file_arsip_dokumentasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'AD0001', '2024-01-04', 9, 2, 'asdas', 'assets/file-arsip-dokumentasi/92tJ3a7QgZNipWDrkgn43j2oQBQzEdLc22qXIAcb.jpg', '2024-01-03 22:43:34', '2024-01-03 22:43:34', NULL),
(10, 'AD0002', '2024-01-10', 9, 1, 'Foto ini diambil pada saat buka bersama 2023', 'assets/file-arsip-dokumentasi/WcmCFUiNoM0nZdACFJvY2TgIlVzgKiNRiGiHsfDt.jpg', '2024-01-09 03:20:54', '2024-01-09 03:20:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arsip_karyawan`
--

CREATE TABLE `arsip_karyawan` (
  `id_arsip_karyawan` int(11) NOT NULL,
  `kode_arsip_karyawan` varchar(255) NOT NULL,
  `id_kategori_arsip` bigint(20) NOT NULL,
  `id_karyawan` bigint(20) NOT NULL,
  `id_departemen` bigint(20) NOT NULL,
  `retensi_arsip` varchar(100) NOT NULL,
  `file_arsip_karyawan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_karyawan`
--

INSERT INTO `arsip_karyawan` (`id_arsip_karyawan`, `kode_arsip_karyawan`, `id_kategori_arsip`, `id_karyawan`, `id_departemen`, `retensi_arsip`, `file_arsip_karyawan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'AK0001', 3, 3, 3, '2024-01-25 sampai 2024-01-31', 'assets/file-arsip-karyawan/nvKsrLAGcv1BZa7RI6sdfxTukQeflTEReQnBdwIJ.pdf', '2024-01-03 22:41:00', '2024-01-03 22:43:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE `arsip_surat` (
  `id_arsip_surat` bigint(20) UNSIGNED NOT NULL,
  `kode_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `id_departemen` bigint(20) UNSIGNED NOT NULL,
  `id_pengirim_surat` bigint(20) DEFAULT NULL,
  `id_penerima_surat` bigint(11) DEFAULT NULL,
  `file_arsip_surat` varchar(255) NOT NULL,
  `tipe_surat` varchar(255) NOT NULL,
  `status_surat` enum('pending','Approve','Not Approve','Request Update','Revisi') NOT NULL DEFAULT 'pending',
  `komentar` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`id_arsip_surat`, `kode_surat`, `tanggal_surat`, `tanggal_diterima`, `perihal`, `id_departemen`, `id_pengirim_surat`, `id_penerima_surat`, `file_arsip_surat`, `tipe_surat`, `status_surat`, `komentar`, `user_id`, `created_at`, `updated_at`) VALUES
(22, 'SM0001', '2024-01-04', '2024-01-04', 'tes', 2, NULL, 3, 'assets/letter-file/lltyYPhqOcHGgQbSxs5lUQBAIMAfafbMb7ffY3C8.pdf', 'Surat Masuk', 'Not Approve', '', NULL, '2024-01-03 22:38:58', '2024-01-03 22:39:36'),
(23, 'SK0001', '2024-01-04', '2024-01-05', 'asdas', 2, 5, NULL, 'assets/letter-file/EhMxi9xzgxe7ov75Q7wevAQ5kwjSrZLNlzfT1Drq.pdf', 'Surat Keluar', 'Approve', '', NULL, '2024-01-03 22:40:01', '2024-01-03 22:40:37'),
(24, 'SM0002', '2024-01-04', '2024-01-04', 'Kerja Sama Perusahaan', 1, NULL, 1, 'assets/letter-file/4HJcNxmoVrBYNQqZeC5h0kwnno1TLpILrjVXzwGa.pdf', 'Surat Masuk', 'Approve', '', NULL, '2024-01-04 03:12:14', '2024-01-04 03:14:46'),
(26, 'SM0003', '2024-03-04', '2024-03-06', 'Hamdan', 4, NULL, 3, 'assets/letter-file/bVMJBqZT06L5PzaBwOsXza8x7K3vtnovBTqm9s4S.pdf', 'Surat Masuk', 'pending', '', NULL, '2024-03-03 10:05:44', '2024-03-03 10:12:50'),
(27, 'SM0004', '2024-03-04', '2024-03-06', 'jajanan', 2, NULL, 6, 'assets/letter-file/8GQMCgZgahVHb9Bj5GfGx9zjNVSiNwb0Wtn20Onl.pdf', 'Surat Masuk', 'Approve', '', NULL, '2024-03-03 10:07:54', '2024-03-03 10:14:01'),
(28, 'SK0002', '2024-03-05', '2024-03-08', 'Ham', 5, 4, NULL, 'assets/letter-file/pAVEKup0TdD5ISIFaM9UkxMAG7G2hcqzA1RFmvt4.pdf', 'Surat Keluar', 'pending', '', NULL, '2024-03-03 10:15:24', '2024-03-03 10:15:24'),
(29, 'SM0005', '2024-03-04', '2024-03-07', 'jajanan', 6, NULL, 5, 'assets/letter-file/ziPcFbExEFyzAZlJK8YIZLesS3OYWisI0AMma3re.pdf', 'Surat Masuk', 'pending', '', NULL, '2024-03-03 19:57:21', '2024-03-03 19:57:21'),
(30, 'SM0006', '2024-03-04', '2024-03-08', 'as', 4, NULL, 5, 'assets/letter-file/onju33Zt9QcjLCxuSc9hYIb8Cps1voTxFEG8qIGQ.pdf', 'Surat Masuk', 'Request Update', '', NULL, '2024-03-03 20:00:39', '2024-03-04 08:06:05'),
(31, 'SM0007', '2024-03-04', '2024-03-08', 'bandung', 1, NULL, 5, 'assets/letter-file/IZTmFoTQfyidsPkDZmq8X4UmH0nbfnpJHMVXwvoj.pdf', 'Surat Masuk', 'Request Update', '', 13, '2024-03-03 20:02:04', '2024-03-04 02:53:54'),
(32, 'SM0008', '2024-03-04', '2024-03-06', 'Bandung Lautan Api', 4, NULL, 5, 'assets/letter-file/IBJD0DVg23aGOtlY50j3wIbjJLyQ5KeRKo0byLY6.pdf', 'Surat Masuk', 'Approve', '', 13, '2024-03-04 08:14:10', '2024-03-04 09:12:29'),
(33, 'SM0009', '2024-03-04', '2024-03-09', 'Bandung', 4, NULL, 5, 'assets/letter-file/1BFGUP6pgwjEgZGkpKZEW1bLTEfXvmFxVVaFCnCC.pdf', 'Surat Masuk', 'pending', NULL, 13, '2024-03-04 09:15:31', '2024-03-04 09:15:31'),
(34, 'SK0003', '2024-03-04', '2024-03-06', '1', 3, 5, NULL, 'assets/letter-file/W14BcIEyvRoRALsZfWw8bXOvVg29Cx2VJygczM5l.pdf', 'Surat Keluar', 'Request Update', 'misalkan', 13, '2024-03-04 09:17:34', '2024-03-04 09:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` bigint(20) UNSIGNED NOT NULL,
  `nama_departemen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Legal', '2022-01-03 06:44:22', '2023-10-16 18:46:45'),
(2, 'IT', '2023-10-03 07:13:53', '2023-10-16 18:46:34'),
(3, 'HRD', '2023-10-10 18:09:26', '2023-10-16 18:46:15'),
(4, 'Akuntansi', '2023-10-10 18:12:34', '2023-10-16 18:46:07'),
(5, 'Lelang', '2023-10-10 18:13:43', '2023-10-16 18:45:57'),
(6, 'Marketing', '2023-10-16 18:45:39', '2023-10-16 18:45:39'),
(7, 'Office Boy', '2023-10-16 18:45:49', '2023-10-16 18:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_karyawan` enum('Karyawan Kontrak','Karyawan Tetap') NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `kontak`, `email`, `status_karyawan`, `pendidikan_terakhir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ambrosius Melmambessy', '3233445566778877', 'Laki-laki', '1999-12-31', 'Jl. Maluku Utara', '083812121212', 'amboganteng@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-05 08:58:15', '2024-01-05 22:01:31', NULL),
(2, 'Mahmudi', '32343536373839', 'Laki-laki', '1999-07-01', 'Jl. Madura Jaya', '0838413777778', 'mahmudi@gmail.com', 'Karyawan Kontrak', 'S1 Sistem Informasi', '2023-10-11 02:39:24', '2024-01-05 21:06:49', NULL),
(3, 'Mendhy Nisya Salsadila', '3344556677889900', 'Perempuan', '2000-11-01', 'Jl .Kalimantan Timur', '089627561122', 'mendhy12@gmail.com', 'Karyawan Kontrak', 'SMA', '2023-10-11 02:40:49', '2024-01-04 23:19:55', NULL),
(4, 'Fahri Arya Firnando', '31234566778899', 'Laki-laki', '2000-02-25', 'Jl. Banguntapan No. 12', '087774156711', 'fahriarya@gmail.com', 'Karyawan Kontrak', 'SMA', '2023-10-11 02:42:27', '2023-10-11 02:46:52', NULL),
(5, 'Andri Suhendar', '313132323333343435', 'Laki-laki', '2000-02-02', 'Jl. Prambanan No. A1', '083813131313', 'andrisuhendar@gmail.com', 'Karyawan Kontrak', 'SMA', '2023-10-11 02:48:29', '2023-10-11 02:48:29', NULL),
(6, 'Sunita Rospa', '36373839404142', 'Perempuan', '2000-01-02', 'Jl. Saren No. A2', '083815151515', 'nitarospa@gmail.com', 'Karyawan Tetap', 'S1 Sistem Informasi', '2023-10-11 02:50:16', '2023-10-11 02:50:16', NULL),
(7, 'Mersyana Joko Sena', '298979695949', 'Perempuan', '2000-09-08', 'Jl. Saren No. A2', '083812131415', 'mersyanajokosena@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:05:34', '2023-10-11 03:05:34', NULL),
(8, 'Erfan Efendi', '39001002456654', 'Laki-laki', '1999-10-10', 'Jl. Candi Gebang No. 11', '081345677654', 'erfanefendi@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:08:43', '2023-10-11 03:08:43', NULL),
(9, 'Tanzilul Furqon', '3132313244556677', 'Laki-laki', '1999-06-08', 'Dsn. Gowok No. 13', '0877745679876', 'tanzilulfurqon@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:10:42', '2023-10-11 03:10:42', NULL),
(10, 'Nafa Septiana', '313344555667788', 'Perempuan', '1999-11-18', 'Jl. Kledokan No. A4', '081345678765', 'nafaseptiana@gmail.com', 'Karyawan Tetap', 'SMA', '2023-10-11 03:45:33', '2023-10-11 03:45:33', NULL),
(13, 'Ilham Prasetia', '3602110311990005', 'Laki-laki', '1998-11-03', 'Jl. Siliwangi No. 9', '083841371077', 'ilhamprasetia44@gmail.com', 'Karyawan Tetap', 'SMA', '2024-01-08 19:20:49', '2024-01-08 19:20:49', NULL),
(14, 'Miftahul Arifin', '371212131314140001', 'Laki-laki', '2000-01-03', 'Jl. Tresno No. A2', '081910894911', 'miftahularifin@gmail.com', 'Karyawan Kontrak', 'SMA', '2024-01-08 19:22:43', '2024-01-08 19:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_arsip`
--

CREATE TABLE `kategori_arsip` (
  `id_kategori_arsip` bigint(20) NOT NULL,
  `nama_kategori_arsip` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_arsip`
--

INSERT INTO `kategori_arsip` (`id_kategori_arsip`, `nama_kategori_arsip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SKCK', '2023-10-05 09:34:22', '2023-10-05 09:34:22', NULL),
(3, 'KTP', '2023-10-11 04:44:11', '2023-10-11 04:44:11', NULL),
(4, 'Ijazah SMA', '2023-10-11 04:50:00', '2023-10-11 04:50:00', NULL),
(5, 'Ijazah S1', '2023-10-11 04:50:08', '2023-10-11 04:50:08', NULL),
(6, 'Lisensi SKB', '2023-10-11 10:03:00', '2023-10-11 10:03:00', NULL),
(7, 'Lisensi ASKB', '2023-10-11 10:03:11', '2023-10-11 10:03:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_arsip_surat` bigint(20) NOT NULL,
  `level` enum('karyawan','admin','manajer') NOT NULL DEFAULT 'karyawan',
  `tipe_arsip` enum('surat','karyawan') NOT NULL DEFAULT 'surat',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `keterangan`, `id_arsip_surat`, `level`, `tipe_arsip`, `read_at`, `created_at`, `updated_at`) VALUES
(77, 'Ada Surat Masuk baru<br>Kode :SM0001<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 22, 'manajer', 'surat', '2024-01-03 22:39:15', '2024-01-03 22:38:58', '2024-01-03 22:39:15'),
(78, 'Surat Masuk Not Approve<br>Kode :SM0001<br> Keterangan: salahhh', 22, 'karyawan', 'surat', '2024-01-03 22:40:06', '2024-01-03 22:39:36', '2024-01-03 22:40:06'),
(79, 'Ada Surat Keluar baru<br>Kode :SK0001<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 23, 'manajer', 'surat', '2024-01-03 22:40:27', '2024-01-03 22:40:01', '2024-01-03 22:40:27'),
(80, 'Surat Keluar Approve<br>Kode :SK0001', 23, 'karyawan', 'surat', '2024-01-03 22:40:43', '2024-01-03 22:40:37', '2024-01-03 22:40:43'),
(81, 'Masa berlaku arsip karyawan sebentar lagi habis<br>Kode :AK0001', 7, 'karyawan', 'karyawan', '2024-01-03 22:41:05', '2024-01-03 22:41:00', '2024-01-03 22:41:05'),
(82, 'Ada Surat Masuk baru<br>Kode :SM0002<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 24, 'manajer', 'surat', '2024-01-04 03:14:34', '2024-01-04 03:12:14', '2024-01-04 03:14:34'),
(83, 'Surat Masuk Approve<br>Kode :SM0002', 24, 'karyawan', 'surat', '2024-01-09 03:15:25', '2024-01-04 03:14:46', '2024-01-09 03:15:25'),
(84, 'Ada Surat Masuk baru<br>Kode :SM0003<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 25, 'manajer', 'surat', '2024-01-09 03:16:33', '2024-01-09 03:15:05', '2024-01-09 03:16:33'),
(85, 'Surat Masuk Request Update<br>Kode :SM0003<br> Keterangan: tolong diupdate lagi, ada yang salah', 25, 'karyawan', 'surat', '2024-01-09 03:18:38', '2024-01-09 03:18:18', '2024-01-09 03:18:38'),
(86, 'Masa berlaku arsip karyawan sebentar lagi habis<br>Kode :AK0001', 7, 'karyawan', 'karyawan', '2024-01-09 03:25:24', '2024-01-09 03:19:23', '2024-01-09 03:25:24'),
(87, 'Masa berlaku arsip karyawan sebentar lagi habis<br>Kode :AK0001', 7, 'karyawan', 'karyawan', NULL, '2024-03-03 16:48:09', '2024-03-03 16:48:09'),
(88, 'Ada Surat Masuk baru<br>Kode :SM0003<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 26, 'manajer', 'surat', NULL, '2024-03-03 17:05:44', '2024-03-03 17:05:44'),
(89, 'Ada Surat Masuk baru<br>Kode :SM0004<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 27, 'manajer', 'surat', NULL, '2024-03-03 17:07:55', '2024-03-03 17:07:55'),
(90, 'Update Surat Masuk<br>Kode :SM0004<br> Keterangan: Surat telah di update oleh Ilham Prasetia', 27, 'manajer', 'surat', NULL, '2024-03-03 17:09:03', '2024-03-03 17:09:03'),
(91, 'Update Surat Masuk<br>Kode :SM0003<br> Keterangan: Surat telah di update oleh Ilham Prasetia', 26, 'manajer', 'surat', NULL, '2024-03-03 17:12:51', '2024-03-03 17:12:51'),
(92, 'Surat Masuk Approve<br>Kode :SM0004', 27, 'karyawan', 'surat', NULL, '2024-03-03 17:14:01', '2024-03-03 17:14:01'),
(93, 'Ada Surat Keluar baru<br>Kode :SK0002<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 28, 'manajer', 'surat', NULL, '2024-03-03 17:15:25', '2024-03-03 17:15:25'),
(94, 'Ada Surat Masuk baru<br>Kode :SM0005<br> Keterangan: Surat baru dibuat oleh Bandung@gmail.com', 29, 'manajer', 'surat', NULL, '2024-03-04 02:57:21', '2024-03-04 02:57:21'),
(95, 'Ada Surat Masuk baru<br>Kode :SM0006<br> Keterangan: Surat baru dibuat oleh Bandung@gmail.com', 30, 'manajer', 'surat', NULL, '2024-03-04 03:00:40', '2024-03-04 03:00:40'),
(96, 'Ada Surat Masuk baru<br>Kode :SM0007<br> Keterangan: Surat baru dibuat oleh Bandung@gmail.com', 31, 'manajer', 'surat', NULL, '2024-03-04 03:02:05', '2024-03-04 03:02:05'),
(97, 'Masa berlaku arsip karyawan sebentar lagi habis<br>Kode :AK0001', 7, 'karyawan', 'karyawan', NULL, '2024-03-04 09:47:03', '2024-03-04 09:47:03'),
(98, 'Surat Masuk Request Update<br>Kode :SM0007<br> Keterangan: betul ada', 31, 'karyawan', 'surat', NULL, '2024-03-04 09:53:54', '2024-03-04 09:53:54'),
(99, 'Surat Masuk Request Update<br>Kode :SM0006<br> Keterangan: `1', 30, 'karyawan', 'surat', NULL, '2024-03-04 15:06:05', '2024-03-04 15:06:05'),
(100, 'Ada Surat Masuk baru<br>Kode :SM0008<br> Keterangan: Surat baru dibuat oleh Bandung@gmail.com', 32, 'manajer', 'surat', NULL, '2024-03-04 15:14:10', '2024-03-04 15:14:10'),
(101, 'Ada komentar untuk kode surat SM0008', 32, 'manajer', 'surat', NULL, '2024-03-04 15:27:15', '2024-03-04 15:27:15'),
(102, 'Ada komentar untuk kode surat SM0008', 32, 'manajer', 'surat', NULL, '2024-03-04 15:27:58', '2024-03-04 15:27:58'),
(103, 'Ada komentar untuk kode surat SM0008', 32, 'manajer', 'surat', NULL, '2024-03-04 15:33:54', '2024-03-04 15:33:54'),
(104, 'Upload Dokumen Arsip Surat Baru dari kode surat SM0008', 32, 'karyawan', 'surat', NULL, '2024-03-04 15:49:46', '2024-03-04 15:49:46'),
(105, 'Ada komentar untuk kode surat SM0008', 32, 'manajer', 'surat', NULL, '2024-03-04 15:57:49', '2024-03-04 15:57:49'),
(106, 'Upload Dokumen Arsip Surat Baru dari kode surat SM0008', 32, 'karyawan', 'surat', NULL, '2024-03-04 15:58:56', '2024-03-04 15:58:56'),
(107, 'Dokumen berhasil di approve', 32, 'manajer', 'surat', NULL, '2024-03-04 16:12:29', '2024-03-04 16:12:29'),
(108, 'Ada Surat Masuk baru<br>Kode :SM0009<br> Keterangan: Surat baru dibuat oleh Bandung@gmail.com', 33, 'manajer', 'surat', NULL, '2024-03-04 16:15:31', '2024-03-04 16:15:31'),
(109, 'Ada Surat Keluar baru<br>Kode :SK0003<br> Keterangan: Surat baru dibuat oleh Bandung@gmail.com', 34, 'manajer', 'surat', NULL, '2024-03-04 16:17:35', '2024-03-04 16:17:35'),
(110, 'Ada komentar untuk kode surat SK0003', 34, 'manajer', 'surat', NULL, '2024-03-04 16:29:21', '2024-03-04 16:29:21'),
(111, 'Upload Dokumen Arsip Surat Baru dari kode surat SK0003', 34, 'karyawan', 'surat', NULL, '2024-03-04 16:32:27', '2024-03-04 16:32:27'),
(112, 'Ada komentar untuk kode surat SK0003', 34, 'manajer', 'surat', NULL, '2024-03-04 16:40:51', '2024-03-04 16:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_surat`
--

CREATE TABLE `penerima_surat` (
  `id_penerima_surat` bigint(11) NOT NULL,
  `nama_penerima_surat` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_pengirim_surat` bigint(20) UNSIGNED NOT NULL,
  `nama_pengirim_surat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirim_surat`
--

INSERT INTO `pengirim_surat` (`id_pengirim_surat`, `nama_pengirim_surat`, `created_at`, `updated_at`) VALUES
(2, 'Casemiro', '2022-01-03 06:49:49', '2024-01-08 19:23:45'),
(3, 'Pepe', '2023-10-11 04:31:17', '2024-01-08 19:24:11'),
(4, 'Luca Modric', '2023-10-11 04:33:30', '2024-01-08 19:23:30'),
(5, 'Toni Kroos', '2023-10-11 04:35:25', '2024-01-06 00:46:39'),
(6, 'Sergio Ramos', '2023-10-11 04:37:49', '2024-01-05 22:56:51'),
(7, 'Karim Benzema', '2023-11-23 19:08:29', '2024-01-05 22:56:38'),
(8, 'Gareth Bale', '2023-11-23 19:08:48', '2024-01-05 22:56:27'),
(9, 'Iker Casillas', '2023-11-23 19:09:14', '2024-01-05 22:03:45'),
(10, 'Cristiano Ronaldo', '2023-11-23 19:09:26', '2024-01-05 22:03:15'),
(16, 'Dani Carvajal', '2024-01-08 19:24:43', '2024-01-08 19:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `level` enum('karyawan','admin','manajer') NOT NULL DEFAULT 'karyawan',
  `id_departemen` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `email`, `password`, `profile`, `level`, `id_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Subur Permana', 'admin@gmail.com', '$2a$12$hufEzqWdxOY173bdg1AgPeh6kQQQgkIInTzO7vV/bocM6ryzjIUae', 'assets/profile-images/0jbnvp8Y48HvZAkxRAxD2hSD7EI2LrtlFkAP1KSU.jpg', 'admin', 2, '2022-01-03 00:21:03', '2024-01-02 18:04:09'),
(2, 'Asep Saipul Hamdi', 'manajer@gmail.com', '$2a$12$ZGGDuYoGTtdKkBTp5NSsYebj6wXOwmmCj4ifk/SHA4booJT6LTz3S', NULL, 'manajer', 1, '2023-10-03 07:02:43', '2024-01-02 18:02:16'),
(9, 'Ilham Prasetia', 'karyawan@gmail.com', '$2y$10$e1KSghBnG5WH7V6pEewRfOA7mKIuWqgHlj9NHFG5QkIZ87diUkQ.S', 'assets/profile-images/ejHgivyaurjnISGVHn752wQS4DuufSlZWrT8dDh4.jpg', 'karyawan', 5, '2023-10-11 10:31:55', '2024-01-09 03:25:04'),
(13, 'Bandung@gmail.com', 'bandung@gmail.com', '$2y$10$0PrKlnaUeWedi.i4E08uuOV1RjtmYV0mLw0geq2vDevawp17WTCne', NULL, 'karyawan', 5, '2024-03-03 10:02:14', '2024-03-03 10:02:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_dokumentasi`
--
ALTER TABLE `arsip_dokumentasi`
  ADD PRIMARY KEY (`id_arsip_dokumentasi`);

--
-- Indexes for table `arsip_karyawan`
--
ALTER TABLE `arsip_karyawan`
  ADD PRIMARY KEY (`id_arsip_karyawan`);

--
-- Indexes for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD PRIMARY KEY (`id_arsip_surat`);

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
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_dokumentasi`
--
ALTER TABLE `arsip_dokumentasi`
  MODIFY `id_arsip_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `arsip_karyawan`
--
ALTER TABLE `arsip_karyawan`
  MODIFY `id_arsip_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  MODIFY `id_arsip_surat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_arsip`
--
ALTER TABLE `kategori_arsip`
  MODIFY `id_kategori_arsip` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `penerima_surat`
--
ALTER TABLE `penerima_surat`
  MODIFY `id_penerima_surat` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengirim_surat`
--
ALTER TABLE `pengirim_surat`
  MODIFY `id_pengirim_surat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
