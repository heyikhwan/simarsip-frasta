-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2024 at 05:25 AM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

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
  `id_arsip_dokumentasi` int UNSIGNED NOT NULL,
  `kode_arsip_dokumentasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dokumentasi` date DEFAULT NULL,
  `id_departemen` int UNSIGNED DEFAULT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `file_arsip_dokumentasi` text COLLATE utf8mb4_unicode_ci,
  `user_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_dokumentasi`
--

INSERT INTO `arsip_dokumentasi` (`id_arsip_dokumentasi`, `kode_arsip_dokumentasi`, `tanggal_dokumentasi`, `id_departemen`, `judul`, `deskripsi`, `file_arsip_dokumentasi`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'AD0001', '2024-03-01', 8, 'Acara Seminar BPN DKI Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/tuSgZFonJCBLQh1rwOQV03Bd63hTCxaHY8OgDCqo.jpg', 3, '2024-03-30 20:49:23', '2024-03-30 20:49:23', NULL),
(3, 'AD0002', '2024-03-02', 12, 'Acara Seminar Bank Mandiri', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/vSqUyA4lZWzOil3kgh9ts1SXmLVuubD1pyPuLEAd.jpg', 3, '2024-03-30 20:54:26', '2024-03-30 20:54:26', NULL),
(4, 'AD0003', '2024-03-03', 10, 'Acara Seminar Bank BPD DIY', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/vbcqWJ13wP0o1W4WNnVP5kWwntgaH56yQbh46ZrD.jpg', 3, '2024-03-30 20:55:08', '2024-03-30 20:55:08', NULL),
(5, 'AD0004', '2024-03-04', 9, 'Acara Seminar Bank BRI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/yMBacFDGQX0yoYka8qu1mfANZMD3vX8RaHplCLhA.jpg', 3, '2024-03-30 20:55:32', '2024-03-30 20:55:32', NULL),
(6, 'AD0005', '2024-03-05', 8, 'Acara Seminar Bank BPD DIY', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/j836w5FuCybjPVBRIwrm4DOT8GOx8qE1iI4vWEsd.jpg', 3, '2024-03-30 20:55:58', '2024-03-30 20:55:58', NULL),
(7, 'AD0006', '2024-03-06', 9, 'Acara Seminar Bank BRI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/tri76zvLe9PpENWCURhxQeD0pD8jjxDbioGjLG3Q.jpg', 3, '2024-03-30 20:56:35', '2024-03-30 20:56:35', NULL),
(8, 'AD0007', '2024-03-07', 11, 'Acara Seminar Bank BRI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/igeDcWgqO4smIzBOHwr468OSZSAGCnvxFRsmNqPM.jpg', 3, '2024-03-30 20:57:03', '2024-03-30 20:57:03', NULL),
(9, 'AD0008', '2024-03-08', 11, 'Acara Seminar BPN DKI Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/m5EmUehHL9qOUQWb8t0GvMf1M9IugAqTaPQmluvy.jpg', 3, '2024-03-30 20:57:18', '2024-03-30 20:57:18', NULL),
(10, 'AD0009', '2024-03-09', 11, 'Acara Seminar BPN DKI Jakarta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/gRfKpIiRMTa0SK4itP5YdJ1JYyW8mafZzycTwNEk.jpg', 3, '2024-03-30 20:57:38', '2024-03-30 20:57:38', NULL),
(11, 'AD0010', '2024-03-10', 2, 'Acara Seminar Bank BPD DIY', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/CEnJW73H8GOUsMviaXyt34SMHkpXmtyoxqifC43i.jpg', 3, '2024-03-30 20:58:38', '2024-03-30 20:58:38', NULL),
(12, 'AD0011', '2024-03-11', 11, 'Acara Seminar Bank Mandiri', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/oDpSdRLwnasxFnD6yvAttDgfANd1xPvI4ThsgekF.jpg', 3, '2024-03-30 20:59:17', '2024-03-30 20:59:17', NULL),
(13, 'AD0012', '2024-03-09', 9, 'Acara Seminar Bank BRI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec commodo erat. Nullam ac quam aliquet, posuere sapien ac, tincidunt augue. Pellentesque hendrerit nisl nec leo pulvinar auctor. Praesent a ipsum sit amet augue gravida dapibus nec at justo. Suspendisse elementum feugiat eleifend. Nunc vel dolor odio. Proin id elit id quam ullamcorper egestas. Sed sed tempor diam, at fringilla nisi. Proin sit amet varius elit. Duis quis mattis ante, in cursus nulla. Mauris iaculis facilisis nulla a porta. Fusce vel congue felis.', 'assets/file-arsip-dokumentasi/9PqoaR1AKIkpPOcqVUlOBaw2eVIuSYRsWbAEeawv.jpg', 3, '2024-03-30 20:59:37', '2024-03-30 20:59:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arsip_karyawan`
--

CREATE TABLE `arsip_karyawan` (
  `id_arsip_karyawan` int UNSIGNED NOT NULL,
  `kode_arsip_karyawan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_arsip` int UNSIGNED DEFAULT NULL,
  `id_karyawan` int UNSIGNED DEFAULT NULL,
  `id_departemen` int UNSIGNED DEFAULT NULL,
  `retensi_arsip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_arsip_karyawan` text COLLATE utf8mb4_unicode_ci,
  `user_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_karyawan`
--

INSERT INTO `arsip_karyawan` (`id_arsip_karyawan`, `kode_arsip_karyawan`, `id_kategori_arsip`, `id_karyawan`, `id_departemen`, `retensi_arsip`, `file_arsip_karyawan`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'AK0001', 7, 13, 2, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/kdk5ErAop8cQvn7wYNAudE5aCcXxAan1G9T9qHK5.pdf', 3, '2024-03-30 20:35:46', '2024-03-30 20:35:46', NULL),
(3, 'AK0002', 8, 18, 11, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/yxYrrU7OL16QXjgyR4DAWUNQfeKeVGkonwp82rfy.pdf', 3, '2024-03-30 20:36:54', '2024-03-30 20:36:54', NULL),
(4, 'AK0003', 9, 14, 8, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/iRyvjoblKppvzlDZS7tE825PRnGn8gPgzUpge9yV.pdf', 3, '2024-03-30 20:37:20', '2024-03-30 20:37:20', NULL),
(5, 'AK0004', 10, 18, 11, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/5aW0qcVv4XDNnEG0fdigOdHytoE4JUb4VqptRfST.pdf', 3, '2024-03-30 20:37:42', '2024-03-30 20:37:42', NULL),
(6, 'AK0005', 10, 16, 10, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/jKSfX3SHMNS5lobhPpbVrSGjCMavw41QnMZfGrFF.pdf', 3, '2024-03-30 20:38:34', '2024-03-30 20:38:34', NULL),
(7, 'AK0006', 10, 14, 8, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/LLPEgT3gZ0xz01gLU4VzljQf2UlocAJMcamKEmjg.pdf', 3, '2024-03-30 20:39:11', '2024-03-30 20:39:11', NULL),
(8, 'AK0007', 14, 16, 10, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/4DXNOdERoTB2vZ9MogNAPh1WydQMVtFDksLge8M4.pdf', 3, '2024-03-30 20:39:33', '2024-03-30 20:39:33', NULL),
(9, 'AK0008', 7, 20, 13, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/tdI1QL035QpOHOptWJKfF3ZNSYKZDQK8xqoN80VW.pdf', 3, '2024-03-30 20:39:48', '2024-03-30 20:39:48', NULL),
(10, 'AK0009', 11, 13, 2, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/aH2XbP112YPMuBiuzR6pkS51pa8BKJ1Obn2IG42t.pdf', 3, '2024-03-30 20:40:29', '2024-03-30 20:40:29', NULL),
(11, 'AK0010', 8, 17, 10, '2024-03-01 sampai 2024-03-31', 'assets/file-arsip-karyawan/ZXCRbjrEBy6VnnxpWqeBVzUaPcCiXEJaj4udLW2D.pdf', 3, '2024-03-30 20:40:46', '2024-03-30 20:40:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE `arsip_surat` (
  `id_arsip_surat` int UNSIGNED NOT NULL,
  `kode_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_departemen` int UNSIGNED DEFAULT NULL,
  `id_pengirim_surat` int UNSIGNED DEFAULT NULL,
  `id_penerima_surat` int UNSIGNED DEFAULT NULL,
  `file_arsip_surat` text COLLATE utf8mb4_unicode_ci,
  `tipe_surat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_surat` enum('Pending','Approve','Not Approve','Request Update','Revisi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `user_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`id_arsip_surat`, `kode_surat`, `tanggal_surat`, `tanggal_diterima`, `perihal`, `id_departemen`, `id_pengirim_surat`, `id_penerima_surat`, `file_arsip_surat`, `tipe_surat`, `status_surat`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'SM0001', '2024-03-01', '2024-03-01', 'Surat Pemberitahuan', 2, NULL, 12, 'assets/letter-file/7fKot8vKVTf4m2Ns4aEDmxVtuOO5qnhf0OMPaOnJ.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:55:25', '2024-03-30 20:43:24'),
(4, 'SM0002', '2024-03-02', '2024-03-02', 'Surat Keterangan', 8, NULL, 13, 'assets/letter-file/PvdGxAw5ekCcq0taMA9wTr7AqobrdpjLEJQTnygW.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:56:10', '2024-03-30 20:43:13'),
(5, 'SM0003', '2024-03-03', '2024-03-03', 'Surat Keterangan', 9, NULL, 14, 'assets/letter-file/y38opGYNwUf22KfX6712J0aBE57ppojb2rT5uhQB.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:57:21', '2024-03-30 20:43:04'),
(6, 'SM0004', '2024-03-04', '2024-03-04', 'Surat Keterangan', 10, NULL, 16, 'assets/letter-file/nOsf24mJGB8BFjk3QcoRo3r922cJvLRbSVuDzQaN.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:57:57', '2024-03-30 20:42:54'),
(7, 'SM0005', '2024-03-05', '2024-03-05', 'Surat Tugas', 10, NULL, 16, 'assets/letter-file/ezRQkdhQNydnXyuDnSiWtxvmjT3Ju96Sv5zWp9wt.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:58:42', '2024-03-30 20:42:41'),
(8, 'SM0006', '2024-03-06', '2024-03-06', 'Surat Tugas', 11, NULL, 15, 'assets/letter-file/KfAJkZ1S5csW2OBK7vIqDuo2O4C9iIAU6OZswfLL.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:59:07', '2024-03-30 20:42:29'),
(9, 'SM0007', '2024-03-07', '2024-03-07', 'Surat Tugas', 13, NULL, 19, 'assets/letter-file/d5NowRL7fGmu8ZjRlgZPMDglIQSY9WtDk6UPfKU8.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 19:59:45', '2024-03-30 20:42:23'),
(10, 'SM0008', '2024-03-08', '2024-03-08', 'Surat Tugas', 11, NULL, 15, 'assets/letter-file/Mt0j1IZq2GYCkwF9y5B5Mz1F9CzInJZUZgC8jVLd.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 20:07:26', '2024-03-30 20:42:18'),
(11, 'SM0009', '2024-03-09', '2024-03-09', 'Surat Pemberitahuan Kunjungan Perusahaan', 9, NULL, 14, 'assets/letter-file/AnLuZlEEBgPzwiNDiIjFg8cINd2kmnh7URi2WxNs.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 20:08:13', '2024-03-30 20:42:11'),
(12, 'SM0010', '2024-03-10', '2024-03-10', 'Surat Lamaran Kerja', 12, NULL, 18, 'assets/letter-file/wnRnTsLeuxvYIthG7a5kJOXNUzty314wfZlKyarz.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-30 20:08:46', '2024-03-30 20:42:05'),
(15, 'SK0003', '2024-03-03', '2024-03-03', 'Surat Keterangan Kerja', 9, 13, NULL, 'assets/letter-file/zqTydEGWjFIxNgoFg2KKZsH1QQz97sK9IiEqj5ne.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:29:30', '2024-03-30 20:44:48'),
(16, 'SK0004', '2024-03-04', '2024-03-04', 'Surat Lamaran Kerja', 12, 13, NULL, 'assets/letter-file/mLzaaWUYsFNokOK9wZBlKa9SF4rKP0Y1kftOPck0.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:30:01', '2024-03-30 20:44:40'),
(17, 'SK0005', '2024-03-05', '2024-03-05', 'Surat Lamaran Kerja', 11, 14, NULL, 'assets/letter-file/aDPh6RDzW9E3tbDAHph9GPeN7nQWMbORSoFk7cod.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:30:30', '2024-03-30 20:44:31'),
(18, 'SK0006', '2024-03-06', '2024-03-06', 'Surat Keterangan', 10, 15, NULL, 'assets/letter-file/VqrY8hJFPy5OYzdPgqILjezVcr9JbVjQ4m0azdRT.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:30:58', '2024-03-30 20:44:02'),
(19, 'SK0007', '2024-03-07', '2024-03-07', 'Surat Keterangan', 8, 12, NULL, 'assets/letter-file/CzRJzegEjCdmZVMIOLvzgMmxRu3kjVoX60Png8n1.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:31:59', '2024-03-30 20:43:56'),
(20, 'SK0008', '2024-03-08', '2024-03-08', 'Surat Keterangan', 10, 15, NULL, 'assets/letter-file/H9BVuB6XENsfXn1w2npK7dJuEWGctTPD5YvTmOmU.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:32:30', '2024-03-30 20:43:50'),
(21, 'SK0009', '2024-03-09', '2024-03-09', 'Surat Keterangan Kerja', 8, 12, NULL, 'assets/letter-file/qipUyMyZfffTDjJLtb8V4DQKcdL3bAd72KT6P8tI.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:33:25', '2024-03-30 20:43:41'),
(22, 'SK0010', '2024-03-10', '2024-03-10', 'Surat Lamaran Kerja', 10, 16, NULL, 'assets/letter-file/eTbOX78zbt7Gp0RIXfxgpTtVvrggHhC0XEnrdlRU.pdf', 'Surat Keluar', 'Approve', 3, '2024-03-30 20:34:00', '2024-03-30 20:43:36'),
(23, 'SM0011', '2024-04-12', '2024-04-12', 'Surat Permohonan', 11, NULL, 15, 'assets/letter-file/Xk2yu9PJ41u7Pucukkqi6D5QxJxjwLeqdQHUH3r7.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-31 21:21:47', '2024-04-02 07:06:31'),
(24, 'SM0012', '2024-04-12', '2024-04-12', 'Surat Permohonan', 10, NULL, 16, 'assets/letter-file/GAR5MTijX2KryvWKtrGR5LpnjDv5Vm4KCAWQmiN6.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-31 21:22:53', '2024-04-02 07:06:22'),
(25, 'SM0013', '2024-04-13', '2024-04-13', 'Surat Permohonan', 2, NULL, 12, 'assets/letter-file/H05yq2z9wZFe0uyJOocn3ikMQUwpfCmpG8QLDnFV.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-31 21:23:31', '2024-04-02 07:06:17'),
(26, 'SM0014', '2024-04-14', '2024-04-14', 'Surat Permohonan', 8, NULL, 13, 'assets/letter-file/xm0U5zBFO8DT45LWYb8H8TXL2toQCFpJxV83bO6V.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-31 21:24:12', '2024-04-02 07:06:08'),
(27, 'SM0015', '2024-04-15', '2024-04-15', 'Surat Permohonan', 12, NULL, 18, 'assets/letter-file/VOK2TddYmn1E9mpolJhV6mbIVh5W7cYHSKPTbf04.pdf', 'Surat Masuk', 'Approve', 3, '2024-03-31 21:24:48', '2024-04-02 07:06:00'),
(28, 'SM0016', '2024-04-16', '2024-04-16', 'Surat Permohonan', 10, NULL, 15, 'assets/letter-file/KESMic9cUTVEyPlYwSHKzqjTwpDjJA4TmCe7NgOI.pdf', 'Surat Masuk', 'Approve', 3, '2024-04-03 19:12:14', '2024-04-03 19:12:25'),
(29, 'SM0017', '2024-04-17', '2024-04-17', 'Surat Permohonan', 9, NULL, 14, 'assets/letter-file/6chQJqJocwmUft0Oc4UOtCLvOqPKsUTb8OpvTDvA.pdf', 'Surat Masuk', 'Approve', 3, '2024-04-03 19:13:50', '2024-04-03 19:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int UNSIGNED NOT NULL,
  `nama_departemen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(2, 'IT', '2024-03-26 04:01:02', '2024-03-26 04:01:02'),
(8, 'Office Boy', '2024-03-29 21:17:43', '2024-03-29 21:17:43'),
(9, 'Tool Keeper', '2024-03-29 21:17:47', '2024-03-29 21:17:47'),
(10, 'Akuntansi', '2024-03-29 21:17:53', '2024-03-29 21:17:53'),
(11, 'HRD', '2024-03-29 21:17:57', '2024-03-29 21:17:57'),
(12, 'Lelang', '2024-03-29 21:18:25', '2024-03-29 21:18:25'),
(13, 'Marketing', '2024-03-29 21:18:31', '2024-03-29 21:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int UNSIGNED NOT NULL,
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
(13, 'Ilham Prasetia', '3602110311990001', 'Laki-laki', '1999-03-01', 'Jl. Raya Tajem, Km 2', '083841371071', 'ilhamprasetia@gmail.com', 'Karyawan Kontrak', 'SMA', '2024-03-29 21:19:09', '2024-03-29 21:19:09', NULL),
(14, 'Eko Yulianto', '3602110311990002', 'Laki-laki', '1985-03-02', 'Jl. Parangtritis, No 12', '083841371072', 'ekoyulianto@gmail.com', 'Karyawan Kontrak', 'Paket C', '2024-03-29 21:19:38', '2024-03-29 21:19:38', NULL),
(15, 'Sholich Albar', '3602110311990003', 'Laki-laki', '1999-03-02', 'Jl. Magelang Km 7', '083841371073', 'sholichalbar@gmail.com', 'Karyawan Kontrak', 'SMK', '2024-03-29 21:22:14', '2024-03-29 21:22:14', NULL),
(16, 'Kuma Nirmala', '3602110311990004', 'Perempuan', '1995-12-12', 'Jl. Pleret, Km 10', '083841371074', 'kumanirmala@gmail.com', 'Karyawan Kontrak', 'D3', '2024-03-29 21:23:07', '2024-03-29 21:23:07', NULL),
(17, 'Ririn Dwi Purwanti', '3602110311990005', 'Perempuan', '1985-02-01', 'Jl. Magelang Km 10', '083841371075', 'ririndwipurwanti@gmail.com', 'Karyawan Kontrak', 'SMA', '2024-03-29 21:24:08', '2024-03-29 21:24:08', NULL),
(18, 'Milawati', '3602110311990006', 'Perempuan', '1993-09-11', 'Jl. Godean, Km 10', '083841371076', 'milawati@gmail.com', 'Karyawan Kontrak', 'S1', '2024-03-29 21:24:57', '2024-03-29 21:24:57', NULL),
(19, 'Triawan', '3602110311990007', 'Laki-laki', '1993-08-20', 'Jl. Kadisoka, No 99', '083841371077', 'triawan@gmail.com', 'Karyawan Kontrak', 'S1', '2024-03-29 21:25:54', '2024-03-29 21:25:54', NULL),
(20, 'Chatarina Dian Cristiana Tanjung', '3602110311990008', 'Perempuan', '1985-03-02', 'Jl. Kalasan, Km 12', '083841371078', 'diantanjung@gmail.com', 'Karyawan Tetap', 'S1', '2024-03-29 21:26:52', '2024-03-29 21:26:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_arsip`
--

CREATE TABLE `kategori_arsip` (
  `id_kategori_arsip` int UNSIGNED NOT NULL,
  `nama_kategori_arsip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_arsip`
--

INSERT INTO `kategori_arsip` (`id_kategori_arsip`, `nama_kategori_arsip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'KTP', '2024-03-29 21:29:20', '2024-03-29 21:29:20', NULL),
(8, 'SIM', '2024-03-29 21:29:24', '2024-03-29 21:29:24', NULL),
(9, 'SKCK', '2024-03-29 21:29:30', '2024-03-29 21:29:30', NULL),
(10, 'NPWP', '2024-03-29 21:29:39', '2024-03-29 21:29:39', NULL),
(11, 'Kartu Keluarga', '2024-03-29 21:29:45', '2024-03-29 21:29:45', NULL),
(12, 'Ijazah SMA', '2024-03-29 21:29:50', '2024-03-29 21:29:50', NULL),
(13, 'Ijazah SMK', '2024-03-29 21:29:57', '2024-03-29 21:29:57', NULL),
(14, 'Ijazah D3', '2024-03-29 21:30:08', '2024-03-29 21:30:08', NULL),
(15, 'Ijazah S1', '2024-03-29 21:30:14', '2024-03-29 21:30:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_surat`
--

CREATE TABLE `komentar_surat` (
  `id_komentar` int UNSIGNED NOT NULL,
  `id_arsip_surat` int UNSIGNED DEFAULT NULL,
  `id_user` int UNSIGNED DEFAULT NULL,
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
  `id_notifikasi` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `penerima_id` int UNSIGNED DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `read_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `user_id`, `penerima_id`, `keterangan`, `url`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0001<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/1', '2024-04-04 09:43:35', '2024-03-29 20:27:32', '2024-04-03 19:43:35'),
(2, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/1', '2024-04-04 09:15:25', '2024-03-29 20:42:38', '2024-04-03 19:15:25'),
(3, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0001<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/1', '2024-04-04 09:43:35', '2024-03-29 20:45:14', '2024-04-03 19:43:35'),
(4, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0001<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/1', '2024-04-04 09:43:35', '2024-03-29 20:46:31', '2024-04-03 19:43:35'),
(5, 2, 3, 'Asep Saipul Hamdi Menghapus Surat Masuk<br>Kode :SM0001', 'http://127.0.0.1:8000/admin/letter/surat-masuk', '2024-04-04 09:15:25', '2024-03-29 21:02:58', '2024-04-03 19:15:25'),
(6, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0001<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/2', '2024-04-04 09:43:35', '2024-03-29 21:06:26', '2024-04-03 19:43:35'),
(7, 3, 2, 'Ilham Prasetia Menghapus Surat Keluar<br>Kode :SK0001', 'http://127.0.0.1:8000/admin/letter/surat-keluar', '2024-04-04 09:43:35', '2024-03-29 21:06:48', '2024-04-03 19:43:35'),
(8, 3, 2, 'Ilham Prasetia menghapus arsip karyawan<br>Kode: AK0001', 'http://127.0.0.1:8000/admin/arsip-karyawan', '2024-04-04 09:43:35', '2024-03-29 21:07:20', '2024-04-03 19:43:35'),
(9, 3, 2, 'Ilham Prasetia menghapus arsip dokumentasi<br>Kode: AD0001', 'http://127.0.0.1:8000/admin/documentation', '2024-04-04 09:43:35', '2024-03-29 21:07:25', '2024-04-03 19:43:35'),
(10, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0001<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/3', '2024-04-04 09:43:34', '2024-03-30 19:55:25', '2024-04-03 19:43:34'),
(11, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0002<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/4', '2024-04-04 09:43:34', '2024-03-30 19:56:11', '2024-04-03 19:43:34'),
(12, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0003<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/5', '2024-04-04 09:43:34', '2024-03-30 19:57:21', '2024-04-03 19:43:34'),
(13, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0004<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/6', '2024-04-04 09:43:34', '2024-03-30 19:57:57', '2024-04-03 19:43:34'),
(14, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0005<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/7', '2024-04-04 09:43:34', '2024-03-30 19:58:42', '2024-04-03 19:43:34'),
(15, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0006<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/8', '2024-04-04 09:43:34', '2024-03-30 19:59:08', '2024-04-03 19:43:34'),
(16, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0007<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/9', '2024-04-04 09:43:34', '2024-03-30 19:59:46', '2024-04-03 19:43:34'),
(17, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0008<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/10', '2024-04-04 09:43:34', '2024-03-30 20:07:26', '2024-04-03 19:43:34'),
(18, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0009<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/11', '2024-04-04 09:43:34', '2024-03-30 20:08:14', '2024-04-03 19:43:34'),
(19, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0010<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/12', '2024-04-04 09:43:34', '2024-03-30 20:08:46', '2024-04-03 19:43:34'),
(20, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0001<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/13', '2024-04-04 09:43:34', '2024-03-30 20:09:12', '2024-04-03 19:43:34'),
(21, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0002<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/14', '2024-04-04 09:43:34', '2024-03-30 20:09:42', '2024-04-03 19:43:34'),
(22, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0003<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/15', '2024-04-04 09:43:34', '2024-03-30 20:29:30', '2024-04-03 19:43:34'),
(23, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0004<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/16', '2024-04-04 09:43:34', '2024-03-30 20:30:02', '2024-04-03 19:43:34'),
(24, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0005<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/17', '2024-04-04 09:43:34', '2024-03-30 20:30:30', '2024-04-03 19:43:34'),
(25, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0006<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/18', '2024-04-04 09:43:34', '2024-03-30 20:30:58', '2024-04-03 19:43:34'),
(26, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0007<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/19', '2024-04-04 09:43:34', '2024-03-30 20:31:59', '2024-04-03 19:43:34'),
(27, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0008<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/20', '2024-04-04 09:43:34', '2024-03-30 20:32:30', '2024-04-03 19:43:34'),
(28, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0009<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/21', '2024-04-04 09:43:33', '2024-03-30 20:33:25', '2024-04-03 19:43:33'),
(29, 3, 2, 'Ada Surat Keluar baru<br>Kode :SK0010<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/22', '2024-04-04 09:43:33', '2024-03-30 20:34:00', '2024-04-03 19:43:33'),
(30, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0001<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/2', '2024-04-04 09:43:33', '2024-03-30 20:35:47', '2024-04-03 19:43:33'),
(31, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0002<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/3', '2024-04-04 09:43:33', '2024-03-30 20:36:54', '2024-04-03 19:43:33'),
(32, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0003<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/4', '2024-04-04 09:43:33', '2024-03-30 20:37:20', '2024-04-03 19:43:33'),
(33, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0004<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/5', '2024-04-04 09:43:33', '2024-03-30 20:37:42', '2024-04-03 19:43:33'),
(34, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0005<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/6', '2024-04-04 09:43:33', '2024-03-30 20:38:35', '2024-04-03 19:43:33'),
(35, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0006<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/7', '2024-04-04 09:43:33', '2024-03-30 20:39:11', '2024-04-03 19:43:33'),
(36, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0007<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/8', '2024-04-04 09:43:33', '2024-03-30 20:39:33', '2024-04-03 19:43:33'),
(37, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0008<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/9', '2024-04-04 09:43:33', '2024-03-30 20:39:48', '2024-04-03 19:43:33'),
(38, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0009<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/10', '2024-04-04 09:43:33', '2024-03-30 20:40:29', '2024-04-03 19:43:33'),
(39, 3, 2, 'Ada arsip karyawan baru<br>Kode: AK0010<br>Keterangan: Arsip Karyawan dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/arsip-karyawan/11', '2024-04-04 09:43:33', '2024-03-30 20:40:46', '2024-04-03 19:43:33'),
(40, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/12', '2024-04-04 09:15:24', '2024-03-30 20:42:05', '2024-04-03 19:15:24'),
(41, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/11', '2024-04-04 09:15:24', '2024-03-30 20:42:11', '2024-04-03 19:15:24'),
(42, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/10', '2024-04-04 09:15:24', '2024-03-30 20:42:18', '2024-04-03 19:15:24'),
(43, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/9', '2024-04-04 09:15:24', '2024-03-30 20:42:23', '2024-04-03 19:15:24'),
(44, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/8', '2024-04-04 09:15:24', '2024-03-30 20:42:29', '2024-04-03 19:15:24'),
(45, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/7', '2024-04-04 09:15:24', '2024-03-30 20:42:41', '2024-04-03 19:15:24'),
(46, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/6', '2024-04-04 09:15:24', '2024-03-30 20:42:54', '2024-04-03 19:15:24'),
(47, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/5', '2024-04-04 09:15:24', '2024-03-30 20:43:05', '2024-04-03 19:15:24'),
(48, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/4', '2024-04-04 09:15:24', '2024-03-30 20:43:13', '2024-04-03 19:15:24'),
(49, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/3', '2024-04-04 09:15:24', '2024-03-30 20:43:24', '2024-04-03 19:15:24'),
(50, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/22', '2024-04-04 09:15:24', '2024-03-30 20:43:36', '2024-04-03 19:15:24'),
(51, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/21', '2024-04-04 09:15:24', '2024-03-30 20:43:41', '2024-04-03 19:15:24'),
(52, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/20', '2024-04-04 09:15:24', '2024-03-30 20:43:50', '2024-04-03 19:15:24'),
(53, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/19', '2024-04-04 09:15:24', '2024-03-30 20:43:56', '2024-04-03 19:15:24'),
(54, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/18', '2024-04-04 09:15:24', '2024-03-30 20:44:02', '2024-04-03 19:15:24'),
(55, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/17', '2024-04-04 09:15:24', '2024-03-30 20:44:31', '2024-04-03 19:15:24'),
(56, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/16', '2024-04-04 09:15:24', '2024-03-30 20:44:41', '2024-04-03 19:15:24'),
(57, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/15', '2024-04-04 09:15:24', '2024-03-30 20:44:48', '2024-04-03 19:15:24'),
(58, 2, 3, 'Asep Saipul Hamdi Menghapus Surat Keluar<br>Kode :SK0001', 'http://127.0.0.1:8000/admin/letter/surat-keluar', '2024-04-04 09:15:24', '2024-03-30 20:45:33', '2024-04-03 19:15:24'),
(59, 2, 3, 'Asep Saipul Hamdi Menghapus Surat Keluar<br>Kode :SK0002', 'http://127.0.0.1:8000/admin/letter/surat-keluar', '2024-04-04 09:15:24', '2024-03-30 20:47:09', '2024-04-03 19:15:24'),
(60, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0001<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/2', '2024-04-04 09:43:33', '2024-03-30 20:49:24', '2024-04-03 19:43:33'),
(61, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0002<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/3', '2024-04-04 09:43:33', '2024-03-30 20:54:26', '2024-04-03 19:43:33'),
(62, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0003<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/4', '2024-04-04 09:43:33', '2024-03-30 20:55:08', '2024-04-03 19:43:33'),
(63, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0004<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/5', '2024-04-04 09:43:33', '2024-03-30 20:55:33', '2024-04-03 19:43:33'),
(64, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0005<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/6', '2024-04-04 09:43:33', '2024-03-30 20:55:58', '2024-04-03 19:43:33'),
(65, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0006<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/7', '2024-04-04 09:43:33', '2024-03-30 20:56:36', '2024-04-03 19:43:33'),
(66, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0007<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/8', '2024-04-04 09:43:33', '2024-03-30 20:57:03', '2024-04-03 19:43:33'),
(67, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0008<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/9', '2024-04-04 09:43:32', '2024-03-30 20:57:19', '2024-04-03 19:43:32'),
(68, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0009<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/10', '2024-04-04 09:43:32', '2024-03-30 20:57:38', '2024-04-03 19:43:32'),
(69, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0010<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/11', '2024-04-04 09:43:32', '2024-03-30 20:58:38', '2024-04-03 19:43:32'),
(70, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0011<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/12', '2024-04-04 09:43:32', '2024-03-30 20:59:18', '2024-04-03 19:43:32'),
(71, 3, 2, 'Ada arsip dokumentasi baru<br>Kode: AD0012<br>Keterangan: Arsip Dokumentasi dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/documentation/13', '2024-04-04 09:43:32', '2024-03-30 20:59:37', '2024-04-03 19:43:32'),
(72, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0011<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/23', '2024-04-04 09:43:32', '2024-03-31 21:21:47', '2024-04-03 19:43:32'),
(73, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0012<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/24', '2024-04-04 09:43:32', '2024-03-31 21:22:53', '2024-04-03 19:43:32'),
(74, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0013<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/25', '2024-04-04 09:43:32', '2024-03-31 21:23:31', '2024-04-03 19:43:32'),
(75, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0014<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/26', '2024-04-04 09:43:32', '2024-03-31 21:24:12', '2024-04-03 19:43:32'),
(76, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0015<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/27', '2024-04-04 09:43:32', '2024-03-31 21:24:48', '2024-04-03 19:43:32'),
(77, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/27', '2024-04-04 09:15:24', '2024-04-02 07:06:00', '2024-04-03 19:15:24'),
(78, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/26', '2024-04-04 09:15:24', '2024-04-02 07:06:08', '2024-04-03 19:15:24'),
(79, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/25', '2024-04-04 09:15:23', '2024-04-02 07:06:17', '2024-04-03 19:15:23'),
(80, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/24', '2024-04-04 09:15:23', '2024-04-02 07:06:23', '2024-04-03 19:15:23'),
(81, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/23', '2024-04-04 09:15:23', '2024-04-02 07:06:31', '2024-04-03 19:15:23'),
(82, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/23', '2024-04-04 09:15:23', '2024-04-02 07:06:31', '2024-04-03 19:15:23'),
(83, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0016<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/28', '2024-04-04 09:43:32', '2024-04-03 19:12:14', '2024-04-03 19:43:32'),
(84, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/28', '2024-04-04 09:15:23', '2024-04-03 19:12:25', '2024-04-03 19:15:23'),
(85, 3, 2, 'Ada Surat Masuk baru<br>Kode :SM0017<br> Keterangan: Surat baru dibuat oleh Ilham Prasetia', 'http://127.0.0.1:8000/admin/letter/surat/29', '2024-04-04 09:43:32', '2024-04-03 19:13:50', '2024-04-03 19:43:32'),
(86, 2, 3, 'Dokumen berhasil di approve', 'http://127.0.0.1:8000/admin/letter/surat/29', '2024-04-04 09:15:23', '2024-04-03 19:14:54', '2024-04-03 19:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_surat`
--

CREATE TABLE `penerima_surat` (
  `id_penerima_surat` int UNSIGNED NOT NULL,
  `nama_penerima_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerima_surat`
--

INSERT INTO `penerima_surat` (`id_penerima_surat`, `nama_penerima_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Ilham Prasetia', '2024-03-29 21:28:09', '2024-03-29 21:28:09', NULL),
(13, 'Eko Yulianto', '2024-03-29 21:28:13', '2024-03-29 21:28:13', NULL),
(14, 'Sholich Albar', '2024-03-29 21:28:20', '2024-03-29 21:28:20', NULL),
(15, 'Milawati', '2024-03-29 21:28:39', '2024-03-29 21:28:39', NULL),
(16, 'Kuma Nirmala', '2024-03-29 21:28:46', '2024-03-29 21:28:46', NULL),
(17, 'Ririn Dwi Purwanti', '2024-03-29 21:28:57', '2024-03-29 21:28:57', NULL),
(18, 'Triawan', '2024-03-29 21:29:05', '2024-03-29 21:29:05', NULL),
(19, 'Chatarina Dian Cristiana Tanjung', '2024-03-29 21:29:13', '2024-03-29 21:29:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengirim_surat`
--

CREATE TABLE `pengirim_surat` (
  `id_pengirim_surat` int UNSIGNED NOT NULL,
  `nama_pengirim_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirim_surat`
--

INSERT INTO `pengirim_surat` (`id_pengirim_surat`, `nama_pengirim_surat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Ilham Prasetia', '2024-03-29 21:27:00', '2024-03-29 21:27:00', NULL),
(12, 'Eko Yulianto', '2024-03-29 21:27:05', '2024-03-29 21:27:05', NULL),
(13, 'Sholich Albar', '2024-03-29 21:27:18', '2024-03-29 21:27:18', NULL),
(14, 'Milawati', '2024-03-29 21:27:28', '2024-03-29 21:27:28', NULL),
(15, 'Kuma Nirmala', '2024-03-29 21:27:37', '2024-03-29 21:27:37', NULL),
(16, 'Ririn Dwi Purwanti', '2024-03-29 21:27:42', '2024-03-29 21:27:42', NULL),
(17, 'Triawan', '2024-03-29 21:27:56', '2024-03-29 21:27:56', NULL),
(18, 'Chatarina Dian Cristiana Tanjung', '2024-03-29 21:28:01', '2024-03-29 21:28:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `level` enum('karyawan','admin','manajer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'karyawan',
  `id_departemen` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `email`, `password`, `profile`, `level`, `id_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Subur Permana', 'admin@gmail.com', '$2y$10$qidDRdC0bWeb4hWJF5y7VuTxV/dJiMlnAQ8AJRjT1AjoryELZ52ga', 'assets/profile-images/DSlZXBbDGlNVvANc67vlgNuj33OckGApGWbbNtnn.jpg', 'admin', NULL, '2024-03-26 04:01:02', '2024-03-30 19:43:57'),
(2, 'Asep Saipul Hamdi', 'manajer@gmail.com', '$2y$10$k833SfAkZZpS9LpAQRTituu8WyaeEcbSMgYmgMSHBg7HTHqyoNW5a', 'assets/profile-images/okLC84l5tu0w67Wb9he6MEzCv9qqdXL1kw5ndkNU.jpg', 'manajer', NULL, '2024-03-26 04:01:02', '2024-03-30 19:52:50'),
(3, 'Ilham Prasetia', 'karyawan@gmail.com', '$2y$10$ePA68t6dkyB0JcsizJv/OenhNSoASUQfuhZm32BhO.WNyCAI/0sIu', 'assets/profile-images/ZidwIgWqYKgLveRM2CasbNxRhhcu7LiQKlXCvdNO.jpg', 'karyawan', 2, '2024-03-26 04:01:02', '2024-03-30 19:52:08');

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
  MODIFY `id_arsip_dokumentasi` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `arsip_karyawan`
--
ALTER TABLE `arsip_karyawan`
  MODIFY `id_arsip_karyawan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  MODIFY `id_arsip_surat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori_arsip`
--
ALTER TABLE `kategori_arsip`
  MODIFY `id_kategori_arsip` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `komentar_surat`
--
ALTER TABLE `komentar_surat`
  MODIFY `id_komentar` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `penerima_surat`
--
ALTER TABLE `penerima_surat`
  MODIFY `id_penerima_surat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengirim_surat`
--
ALTER TABLE `pengirim_surat`
  MODIFY `id_pengirim_surat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
