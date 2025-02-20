-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2025 at 02:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `id_user`, `aksi`, `deskripsi`, `timestamp`) VALUES
(1, 75, 'Edit Tugas', 'Tugas capek telah diedit.', '2025-02-18 21:02:56'),
(2, 75, 'Tambah Tugas', 'Tugas capek ditambahkan.', '2025-02-18 21:06:45'),
(3, 75, 'Edit Tugas', 'Tugas jjj telah diedit.', '2025-02-18 21:07:46'),
(4, 75, 'Edit Tugas', 'Tugas k telah diedit.', '2025-02-18 21:07:59'),
(5, 75, 'Edit Tugas', 'Tugas okeee telah diedit.', '2025-02-18 21:09:15'),
(6, 75, 'Edit Tugas', 'Tugas dd telah diedit.', '2025-02-18 21:09:39'),
(7, 75, 'Edit Tugas', 'Tugas akhirnyaa telah diedit.', '2025-02-18 21:10:16'),
(8, 75, 'Edit Tugas', 'Tugas dd telah diedit.', '2025-02-18 21:10:25'),
(9, 75, 'Edit Tugas', 'Tugas woi telah diedit.', '2025-02-18 21:10:31'),
(10, 75, 'Edit Tugas', 'Tugas ff telah diedit.', '2025-02-18 21:12:31'),
(11, 75, 'Edit Tugas', 'Tugas yeee telah diedit.', '2025-02-18 21:12:42'),
(12, 75, 'Edit User', 'User admin telah diedit.', '2025-02-18 21:17:11'),
(13, 75, 'Hapus User', 'User james telah dihapus.', '2025-02-18 21:17:16'),
(14, 75, 'Tambah User', 'User frederick ditambahkan.', '2025-02-18 21:17:36'),
(15, 75, 'Edit User', 'User eta telah diedit.', '2025-02-18 21:17:44'),
(16, 75, 'Edit User', 'User bebek telah diedit.', '2025-02-18 21:17:54'),
(17, 75, 'Tambah Tugas', 'Tugas woi ditambahkan.', '2025-02-18 21:18:06'),
(18, 75, 'Edit Tugas', 'Tugas ok telah diedit.', '2025-02-18 21:18:19'),
(19, 75, 'Tambah Tugas', 'Tugas okeee ditambahkan.', '2025-02-18 20:35:52'),
(20, 75, 'Edit Tugas', 'Tugas dd telah diedit.', '2025-02-18 20:39:01'),
(21, 75, 'Edit Tugas', 'Tugas okeee telah diedit.', '2025-02-18 20:39:10'),
(22, 75, 'Tambah Tugas', 'Tugas woi ditambahkan.', '2025-02-18 21:05:47'),
(23, 75, 'Tambah Tugas', 'Tugas jmmm ditambahkan.', '2025-02-18 21:05:57'),
(24, 75, 'Tambah Tugas', 'Tugas capek ditambahkan.', '2025-02-18 21:06:09'),
(25, 75, 'Tambah Tugas', 'Tugas jjj ditambahkan.', '2025-02-18 21:06:23'),
(26, 75, 'Edit Tugas', 'Tugas yaudah telah diedit.', '2025-02-18 21:06:37'),
(27, 75, 'Edit Tugas', 'Tugas okee3 telah diedit.', '2025-02-18 21:08:16'),
(28, 75, 'Tambah Tugas', 'Tugas heheh ditambahkan.', '2025-02-18 21:08:41'),
(29, 75, 'Edit Tugas', 'Tugas dd telah diedit.', '2025-02-18 21:09:13'),
(30, 75, 'Edit Profil', 'Profil  telah diedit.', '2025-02-18 20:26:25'),
(31, 75, 'Tambah Tugas', 'Tugas dd ditambahkan.', '2025-02-18 20:27:10'),
(32, 75, 'Edit Tugas', 'Tugas ddhh telah diedit.', '2025-02-18 20:27:28'),
(33, 75, 'Edit Website', 'Website  telah diedit.', '2025-02-18 20:29:16'),
(34, 75, 'Edit Website', 'Website  telah diedit.', '2025-02-18 20:29:30'),
(35, 75, 'Edit Website', 'Website  telah diedit.', '2025-02-18 20:29:41'),
(36, 75, 'Edit Website', 'Website  telah diedit.', '2025-02-18 20:29:46'),
(37, 75, 'Edit Profil', 'Profil  telah diedit.', '2025-02-18 20:37:47'),
(38, 75, 'Edit Profil', 'Profil  telah diedit.', '2025-02-18 20:40:31'),
(39, 75, 'Logout', 'User logout.', '2025-02-18 20:40:52'),
(40, 86, 'Login', 'User admin berhasil login.', '2025-02-18 20:48:17'),
(41, 86, 'Logout', 'User logout.', '2025-02-18 20:48:21'),
(42, 85, 'Login', 'User eta berhasil login.', '2025-02-18 20:48:29'),
(43, 85, 'Tambah User', 'User eek ditambahkan.', '2025-02-18 20:48:49'),
(44, 85, 'Edit User', 'User kk telah diedit.', '2025-02-18 20:49:02'),
(45, 85, 'Hapus User', 'User kk telah dihapus.', '2025-02-18 20:49:09'),
(46, 85, 'Edit Profil', 'Profil  telah diedit.', '2025-02-18 20:49:15'),
(47, 85, 'Edit Profil', 'Profil  telah diedit.', '2025-02-18 20:52:42'),
(48, 85, 'Edit User', 'User james telah diedit.', '2025-02-18 20:56:43'),
(49, 85, 'Edit Profil', 'Profil  telah diedit.', '2025-02-18 21:03:16'),
(50, 85, 'Edit User', 'User donkey telah diedit.', '2025-02-18 21:04:06'),
(51, 85, 'Edit Website', 'Website  telah diedit.', '2025-02-18 21:04:11'),
(52, 85, 'Tambah User', 'User Tomoe ditambahkan.', '2025-02-18 21:04:44'),
(53, 85, 'Edit Tugas', 'Tugas aloha telah diedit.', '2025-02-18 21:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `judul_website` varchar(255) DEFAULT NULL,
  `logo_website` varchar(255) DEFAULT NULL,
  `logo_login` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `judul_website`, `logo_website`, `logo_login`) VALUES
(2, 'To do List', 'images/1739885370_fff0575d916aadaefad5.jpg', 'images/1739885385_8d5d50f26ea6cadc0adf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `prioritas` enum('Rendah','Sedang','Tinggi') NOT NULL,
  `status` enum('Belum Selesai','Selesai') NOT NULL DEFAULT 'Belum Selesai',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `prioritas`, `status`, `tanggal`) VALUES
(5, 'okeee', 'Tinggi', 'Selesai', '2025-02-13'),
(7, 'yaudah', 'Sedang', 'Selesai', '2025-02-19'),
(9, 'okee3', 'Sedang', 'Selesai', '2025-02-24'),
(12, 'Menyelesaikan laporan proyek', 'Tinggi', 'Belum Selesai', '2025-02-20'),
(13, 'Meeting dengan tim', 'Sedang', 'Belum Selesai', '2025-02-21'),
(14, 'Review desain UI aplikasi', 'Rendah', 'Selesai', '2025-02-18'),
(15, 'Mengirim email ke klien', 'Sedang', 'Selesai', '2025-02-19'),
(16, 'Update dokumentasi sistem', 'Tinggi', 'Belum Selesai', '2025-02-22'),
(17, 'Memperbaiki bug pada sistem', 'Tinggi', 'Belum Selesai', '2025-02-23'),
(18, 'Membuat proposal proyek baru', 'Sedang', 'Belum Selesai', '2025-02-24'),
(19, 'Menyusun jadwal kerja', 'Rendah', 'Selesai', '2025-02-17'),
(20, 'Pelatihan karyawan baru', 'Tinggi', 'Belum Selesai', '2025-02-25'),
(21, 'Backup data server', 'Sedang', 'Selesai', '2025-02-16'),
(22, 'Menyelesaikan laporan proyek', 'Tinggi', 'Belum Selesai', '2025-02-20'),
(23, 'Meeting dengan tim', 'Sedang', 'Belum Selesai', '2025-02-21'),
(24, 'Review desain UI aplikasi', 'Rendah', 'Selesai', '2025-02-18'),
(25, 'Mengirim email ke klien', 'Sedang', 'Selesai', '2025-02-19'),
(26, 'Update dokumentasi sistem', 'Tinggi', 'Belum Selesai', '2025-02-22'),
(27, 'Memperbaiki bug pada sistem', 'Tinggi', 'Belum Selesai', '2025-02-23'),
(28, 'Membuat proposal proyek baru', 'Sedang', 'Belum Selesai', '2025-02-24'),
(29, 'Menyusun jadwal kerja', 'Rendah', 'Selesai', '2025-02-17'),
(30, 'Pelatihan karyawan baru', 'Tinggi', 'Belum Selesai', '2025-02-25'),
(31, 'Backup data server', 'Sedang', 'Selesai', '2025-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `no_telp` int(11) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `username`, `no_telp`, `password`, `level`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(75, NULL, 'admin', NULL, 1, '1', '1739700071_31ff3a342d5a012d81a6.webp', '2025-02-16 08:55:28', '2025-02-18 01:19:46', '2025-02-18 08:19:46'),
(76, NULL, 'lolipop', NULL, 2, '1', '1739697933_2464354c5b6f9ac7973c.jpg', '2025-02-15 20:20:54', '2025-02-18 01:08:54', '2025-02-18 08:08:54'),
(77, NULL, 'eta', NULL, 2, '', '1739699918_0ab25b5272bfaf120fc5.webp', '2025-02-15 20:50:13', '2025-02-18 01:19:49', '2025-02-18 08:19:49'),
(79, NULL, 'james', NULL, 0, '1', '1739888052_6a8f833f2e377a3d708f.jpg', '2025-02-15 21:04:45', '2025-02-18 01:17:16', '2025-02-18 08:17:16'),
(80, NULL, 'bebek', NULL, 1, '2', '1739888043_c1e1cad377a61ae0d392.jpg', '2025-02-15 20:54:42', '2025-02-18 01:17:54', NULL),
(82, NULL, 'pookie', NULL, 123, '1', '1739701811_c6d933a4442e78e9ab58.png', '2025-02-15 21:23:32', '2025-02-18 01:07:37', '2025-02-18 08:07:37'),
(83, NULL, 'eeee', NULL, 0, '1', '1739887910_0e1f6da042041cec236f.png', '2025-02-18 14:11:50', '2025-02-18 00:47:23', '2025-02-18 07:47:23'),
(84, NULL, 'ok', NULL, 0, '2', '1739888374_4066fa4d4abcc2a8cc16.jpg', '2025-02-18 14:19:15', '2025-02-18 01:19:37', '2025-02-18 08:19:37'),
(85, NULL, 'eta', NULL, 3, '1', '1739887425_a61cc776412972b070f6.jpg', '2025-02-18 13:37:39', '2025-02-18 14:03:45', NULL),
(86, NULL, 'admin', NULL, 1, '1', '1739888084_eea0fbf889c3223964fe.png', '2025-02-18 14:14:44', '2025-02-18 01:17:11', NULL),
(87, NULL, 'donkey', NULL, 2, '2', '1739887446_51806d4d2b67c0edb2e6.jpg', '2025-02-18 14:17:36', '2025-02-18 01:04:06', NULL),
(88, NULL, 'james', NULL, 123, '1', '1739887003_46a357ef813d1783b0fe.jpg', '2025-02-18 00:41:21', '2025-02-18 00:56:43', NULL),
(89, NULL, 'kk', NULL, 34, '1', '1739886529_94823a06c9744e83a8b3.jpg', '2025-02-18 13:48:49', '2025-02-18 00:49:09', '2025-02-18 07:49:09'),
(90, NULL, 'Tomoe', NULL, 123, '2', '1739887483_448f05b0a217e6946b20.jpg', '2025-02-18 14:04:44', '2025-02-18 14:04:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`) USING BTREE;

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
