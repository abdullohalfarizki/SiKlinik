-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 06:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `jk_dokter` varchar(11) NOT NULL,
  `telp_dokter` text NOT NULL,
  `alamat_dokter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `jk_dokter`, `telp_dokter`, `alamat_dokter`) VALUES
(1, 'Dr. Jajang Efendi', 'Laki-laki', '0852909954544', 'Bandung'),
(3, 'Dr. Ridya Ananda', 'Perempuan', '0852909921999', 'Jakarta Barat'),
(4, 'Dr. Desi permatasari', 'Perempuan', '0821522625222', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `keterangan`, `harga`) VALUES
(2, 'komik', 'obat batuk aa', '25000'),
(3, 'Obat Merah', 'Menyembuhkan luka pada kulit', '11000'),
(4, 'Misagrip', 'mengatasi flu &amp; batuk', '12000'),
(7, 'Obat Merah', 'Menyembuhkan luka pada kulit', '12500'),
(10, 'Omeprazole', 'Obat untuk masalah maag kronis', '150000'),
(11, 'Mylanta', 'Mengatasi lambung', '110000'),
(12, 'Kortikosteroid', 'obat asma jangka panjang yang paling efektif', '220000'),
(13, 'Festaric', 'Mengatasi Asam urat', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nik_pasien` varchar(16) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(11) NOT NULL,
  `telp_pasien` varchar(20) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tgl_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik_pasien`, `nama_pasien`, `jenis_kelamin`, `usia`, `telp_pasien`, `alamat_pasien`, `username`, `password`, `tgl_pendaftaran`) VALUES
(42, '3205332109000001', 'Ahmad', 'Laki-laki', 25, '085872446655', 'Jl. pasien sejahtera no. 22', 'bujang@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-23 12:51:57'),
(43, '3205332004940005', 'Agni', 'Laki-laki', 40, '085210907277', 'Jl. pasien', 'gani@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-23 10:10:03'),
(44, '32053304040008', 'Sandyana', 'Perempuan', 26, '083874667877', 'Banten', 'sandyana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-22 19:01:27'),
(45, '3205330404000003', 'Melisam Rizky', 'Perempuan', 29, '083874658888', 'Bengawan no 23', 'melisa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-22 19:02:43'),
(46, '325330702000001', 'Putri Arindy', 'Perempuan', 23, '082191772177', 'Bandung Barat', 'putri@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-22 19:03:55'),
(47, '3205332107020003', 'Surya Cipta', 'Laki-laki', 29, '085208782178', 'Cikarang', 'surya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-02-23 06:25:59'),
(48, '3205330408970003', 'lagi', 'Laki-laki', 35, '0899911111', 'Jl. pasien sejahtera', 'lagi@gmail.com', 'e691fe545314b7b56c5d82702f2be359', '2023-02-24 15:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `rekam_medik` int(11) NOT NULL,
  `total_pembayaran` varchar(15) NOT NULL,
  `nominal_uang` varchar(11) NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `rekam_medik`, `total_pembayaran`, `nominal_uang`, `tgl_pembayaran`, `status_pembayaran`) VALUES
(22, 30, '12500', '20000', '2023-02-24 13:08:54', 1),
(23, 31, '12500', '100000', '2023-02-24 13:13:24', 1),
(24, 32, '25000', '500000', '2023-02-24 13:23:29', 1),
(25, 33, '12000', '15000', '2023-02-24 13:32:01', 1),
(26, 34, '110000', '150000', '2023-02-24 17:27:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

CREATE TABLE `rekam_medik` (
  `id_rekam` int(11) NOT NULL,
  `pasien` int(11) NOT NULL,
  `dokter` int(11) NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT current_timestamp(),
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `obat` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medik`
--

INSERT INTO `rekam_medik` (`id_rekam`, `pasien`, `dokter`, `tgl_periksa`, `keluhan`, `diagnosa`, `obat`, `status`) VALUES
(30, 47, 4, '2023-02-24 13:06:07', 'luka luar', 'alergi', 10, 1),
(31, 44, 3, '2023-02-24 13:11:33', 'kembung', 'maag', 11, 1),
(32, 46, 3, '2023-02-24 13:21:44', 'sesak', 'asma', 12, 1),
(33, 42, 4, '2023-02-24 13:28:44', 'pegal-pegal', 'asam urat', 13, 1),
(34, 45, 4, '2023-02-24 13:36:18', 'sakit perut', 'lambung', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `jenis_kelamin`, `telp`, `alamat`, `level`) VALUES
(1, 'Abduloh', 'abduloh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', '08127621212', 'Karawang', 1),
(2, 'Muhammad Ajis', 'muhamad@gmail.com', '', 'Perempuan', '08521190990', 'Cikarang', 2),
(3, 'Dzul Abduloh', 'admin@siklinik.com', '21232f297a57a5a743894a0e4a801fc3', 'Laki-laki', '083872327877', 'Jl. Karawang', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `rekam_medik` (`rekam_medik`);

--
-- Indexes for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD PRIMARY KEY (`id_rekam`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`),
  ADD KEY `obat` (`obat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  MODIFY `id_rekam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`rekam_medik`) REFERENCES `rekam_medik` (`id_rekam`) ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD CONSTRAINT `rekam_medik_ibfk_1` FOREIGN KEY (`pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medik_ibfk_2` FOREIGN KEY (`dokter`) REFERENCES `dokter` (`id_dokter`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medik_ibfk_3` FOREIGN KEY (`obat`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
