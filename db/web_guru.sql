-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 10:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_kuis`
--

CREATE TABLE `t_kuis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nama_metode` varchar(50) NOT NULL,
  `jumlah_siswa` varchar(150) NOT NULL,
  `jumlah_pertemuan` varchar(150) NOT NULL,
  `ukuran_kelas` varchar(150) NOT NULL,
  `modalitas_belajar` varchar(150) NOT NULL,
  `nama_kelas` varchar(150) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `updated_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kuis`
--

INSERT INTO `t_kuis` (`id`, `user_id`, `status`, `nama_metode`, `jumlah_siswa`, `jumlah_pertemuan`, `ukuran_kelas`, `modalitas_belajar`, `nama_kelas`, `periode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(23, 12, 0, 'Jigsaw', '10-20', '2 kali', '31-45m2', 'visual dan auditory', 'Sastra Inggris', '2025', '2022-01-24 21:43:18', '2022-01-25 04:30:09', '', ''),
(24, 12, 0, 'Savi', '0-10', '2 kali', '16-30m2', 'kinestik visual dan auditory', 'Teknik Informatika', '2022', '2022-01-24 21:44:51', '2022-01-25 04:30:09', '', ''),
(33, 20, 0, 'Problem Solving', '10-20', 'lebih dari 3', '31-45m2', 'visual dan kinestik', 'Teknik Industri', '2024', '2022-01-30 03:57:27', '2022-01-30 03:57:27', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_metode`
--

CREATE TABLE `t_metode` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(50) DEFAULT NULL,
  `jumlah_siswa` varchar(50) DEFAULT NULL,
  `ukuran_kelas` varchar(50) DEFAULT NULL,
  `pertemuan` varchar(50) DEFAULT NULL,
  `modalitas` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_metode`
--

INSERT INTO `t_metode` (`id`, `nama_metode`, `jumlah_siswa`, `ukuran_kelas`, `pertemuan`, `modalitas`, `created_at`, `updated_at`) VALUES
(1, 'Problem Solving', '10-20', '31-45m2', 'lebih dari 3', 'visual dan kinestik', '2022-01-23 04:27:12', '2022-01-23 04:27:12'),
(2, 'Savi', '0-10', '16-30m2', '2 kali', 'kinestik visual dan auditory', '2022-01-25 03:41:11', '2022-01-25 03:41:11'),
(3, 'Jigsaw', '10-20', '31-45m2', '2 kali', 'visual dan auditory', '2022-01-22 12:18:19', '2022-01-22 12:17:43'),
(4, 'TTW (Think Talk Write )', '10-20', '31-45m2', '1 kali', 'kinestik visual dan auditory', '2022-01-25 03:41:26', '2022-01-25 03:41:26'),
(5, 'Role Playing', '0-10', '16-30m2', 'lebih dari 3', 'kinestik visual dan auditory', '2022-01-25 03:37:20', '2022-01-25 03:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `updated_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `phone`, `username`, `email`, `password`, `created_at`, `updated_at`, `status`, `created_by`, `updated_by`) VALUES
(12, 'kristiyono', '2015141093', '087889963015', 'admin', 'bayu@gmail.com', '$2y$10$apMML/0w8vp/iwhVSQ2yf.qJosTQgU9576UErRi6OKy.M4HIGytPG', '2022-01-15 06:21:45', '2022-02-17 03:51:12', 0, '', ''),
(20, 'bayu', '2015141094', '087889963014', 'bayu', 'bayu@gmail.com', '$2y$10$6LZVZbbDnYOq5Tv3HotrqOWzA0flu3eDuOkAJ7MMydQfQHWf7QPCi', '2022-02-17 02:57:46', '2022-02-17 03:51:12', 0, 'bayu', 'bayu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_kuis`
--
ALTER TABLE `t_kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_metode`
--
ALTER TABLE `t_metode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_kuis`
--
ALTER TABLE `t_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `t_metode`
--
ALTER TABLE `t_metode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
