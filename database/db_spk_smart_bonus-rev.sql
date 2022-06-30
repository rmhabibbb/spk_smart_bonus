-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2021 at 09:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_smart_bonus`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`email`, `password`, `role`, `last_login`) VALUES
('a1@gmail.com', 'f8b51ea3dab97270c3d1df3cebd452a1', 5, NULL),
('a2@gmail.com', '0be2e2181e44147226f01f97c939891b', 5, NULL),
('admin.budigemagempita@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
('divisi.administrasi@gmail.com', '162bd148aae25d2097003acfc1886f71', 2, NULL),
('divisi.hse@gmail.com', 'd864b5bcd828f4797796caa1ff2c03a1', 2, NULL),
('divisi.keamanan@gmail.com', 'c8d66b12c31bd0c58575bfb48e8d26e4', 2, NULL),
('divisi.mpqc@gmail.com', '1079378631ceb1e24bd7940e3df6699c', 2, NULL),
('divisi.pm@gmail.com', '12d8f3a08ab12698c9ea7e0154261f9f', 2, NULL),
('divisi.po1@gmail.com', 'aefd166d9dbd32b59de99a727a797788', 2, NULL),
('divisi.po2@gmail.com', '4dd86d6211ba68d3432cc950eca2b936', 2, NULL),
('divisi.po3@gmail.com', '2521973044a02e097952004451e9efd0', 2, NULL),
('hrd.budigemagempita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, NULL),
('kepalatambang.bgg@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

DROP TABLE IF EXISTS `bonus`;
CREATE TABLE IF NOT EXISTS `bonus` (
  `id_bonus` int(11) NOT NULL AUTO_INCREMENT,
  `periode` int(1) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `jumlah_bonus` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `bataswaktu_penilaian_divisi` date NOT NULL,
  `bataswaktu_penilaian_hrd` date NOT NULL,
  PRIMARY KEY (`id_bonus`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id_bonus`, `periode`, `tahun`, `tgl_buat`, `jumlah_bonus`, `status`, `bataswaktu_penilaian_divisi`, `bataswaktu_penilaian_hrd`) VALUES
(1, 1, 2021, '2021-10-16 15:30:02', 1, 3, '2021-10-17', '2021-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `detailsubkriteria_jobdesk`
--

DROP TABLE IF EXISTS `detailsubkriteria_jobdesk`;
CREATE TABLE IF NOT EXISTS `detailsubkriteria_jobdesk` (
  `id_sub_jobdesk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria_jobdesk` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(3) NOT NULL,
  PRIMARY KEY (`id_sub_jobdesk`),
  KEY `id_kriteria` (`id_kriteria_jobdesk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailsubkriteria_jobdesk`
--

INSERT INTO `detailsubkriteria_jobdesk` (`id_sub_jobdesk`, `id_kriteria_jobdesk`, `keterangan`, `nilai`) VALUES
(1, 'KJ001', 'Laporan selesai dibuat 1 minggu setelah terjadi kecelakaan', 3),
(2, 'KJ001', 'Laporan selesai dibuat 2 minggu setelah terjadi kecelakaan', 2),
(3, 'KJ001', 'Laporan selesai dibuat lebih dari 2 minggu setelah terjadi  kecelakaan', 1),
(5, 'KJ002', 'Melakukan pemeriksaan perlengkapan K3 1 minggu sekali', 3),
(6, 'KJ002', 'Melakukan pemeriksaan perlengkapan K3 1 bulan sekali', 2),
(7, 'KJ002', 'Tidak melakukan pemeriksaan sama sekali', 1),
(8, 'KJ003', 'Melakukan pemeriksaan lingkungan tambang setiap hari', 3),
(9, 'KJ003', 'Melakukan pemeriksaan lingkungan tambang 3 kali dalam  1 minggu', 2),
(10, 'KJ003', 'Melakukan pemeriksaan lingkungan tambang 1 kali dalam  1 minggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailsubkriteria_umum`
--

DROP TABLE IF EXISTS `detailsubkriteria_umum`;
CREATE TABLE IF NOT EXISTS `detailsubkriteria_umum` (
  `id_sub_umum` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria_umum` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(3) NOT NULL,
  PRIMARY KEY (`id_sub_umum`),
  KEY `id_kriteria` (`id_kriteria_umum`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailsubkriteria_umum`
--

INSERT INTO `detailsubkriteria_umum` (`id_sub_umum`, `id_kriteria_umum`, `keterangan`, `nilai`) VALUES
(1, 'KU001', 'Tidak hadir <3 Hari – Selalu Hadir', 3),
(2, 'KU001', 'Tidak hadir 3 - 7 Hari', 2),
(3, 'KU001', 'Tidak hadir >7 Hari', 1),
(5, 'KU002', '> 5 kali terlibat dalam kerjasama tim', 3),
(6, 'KU002', '3-5 kali terlibat dalam kerjasama tim', 2),
(7, 'KU002', '<3 kali terlibat dalam kerjasama tim', 1),
(8, 'KU003', '> 5 kali mengikuti kegiatan diluar jobdesk', 3),
(9, 'KU003', '3-5 kali mengikuti kegiatan diluar jobdesk', 2),
(10, 'KU003', '< 3 mengikuti kegiatan diluar jobdesk ', 1),
(11, 'KU004', '< 5 kali melanggar peraturan perusahaan', 3),
(12, 'KU004', '5-10 kali melanggar peraturan perusahaan', 2),
(13, 'KU004', '> 10 kali melanggar peraturan perusahaan', 1),
(14, 'KU005', 'Jumlah hari lembur karyawan > 15 kali', 3),
(15, 'KU005', 'Jumlah hari lembur karyawan 8-15 kali', 2),
(16, 'KU005', 'Jumlah hari lembur karyawan < 8 kali', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `kd_divisi` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`kd_divisi`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kd_divisi`, `email`, `nama_divisi`, `deskripsi`) VALUES
('D001', 'divisi.hse@gmail.com', 'HSE', '-'),
('D002', 'divisi.mpqc@gmail.com', 'Mine Planning & QC', '-'),
('D003', 'divisi.po1@gmail.com', 'Produksi & Operasional bag. Foreman', '-'),
('D004', 'divisi.po2@gmail.com', 'Produksi & Operasional bag. Dump Truck', '-'),
('D005', 'divisi.po3@gmail.com', 'Produksi & Operasional bag. Excavator', '-'),
('D006', 'divisi.pm@gmail.com', 'Plan & Maintenance', '-'),
('D007', 'divisi.administrasi@gmail.com', 'Administrasi', '-'),
('D008', 'divisi.keamanan@gmail.com', 'Keamanan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `nip` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `kd_divisi` varchar(11) NOT NULL,
  PRIMARY KEY (`nip`),
  UNIQUE KEY `email` (`email`),
  KEY `id_divisi` (`kd_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `email`, `nama`, `jk`, `alamat`, `no_telp`, `kd_divisi`) VALUES
('202000001', 'a1@gmail.com', 'Andrie Gumay', 'Laki - Laki', '-', '-', 'D001'),
('202000002', 'a2@gmail.com', 'Erwin Kusuma', 'Laki - Laki', '-', '-', 'D001');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_jobdesk`
--

DROP TABLE IF EXISTS `kriteria_jobdesk`;
CREATE TABLE IF NOT EXISTS `kriteria_jobdesk` (
  `id_kriteria_jobdesk` varchar(11) NOT NULL,
  `nama_kriteria` text NOT NULL,
  `kd_divisi` varchar(11) NOT NULL,
  `bobot` float NOT NULL,
  PRIMARY KEY (`id_kriteria_jobdesk`),
  KEY `id_divisi` (`kd_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_jobdesk`
--

INSERT INTO `kriteria_jobdesk` (`id_kriteria_jobdesk`, `nama_kriteria`, `kd_divisi`, `bobot`) VALUES
('KJ001', 'Membuat laporan identifikasi kecelakaan', 'D001', 70),
('KJ002', 'Melakukan pemeriksaan kelayakan  perlengkapan K3 kepada karyawan', 'D001', 50),
('KJ003', 'Memeriksa keadaan lingkungan tambang', 'D001', 65);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_umum`
--

DROP TABLE IF EXISTS `kriteria_umum`;
CREATE TABLE IF NOT EXISTS `kriteria_umum` (
  `id_kriteria_umum` varchar(11) NOT NULL,
  `nama_kriteria` text NOT NULL,
  `bobot` float NOT NULL,
  PRIMARY KEY (`id_kriteria_umum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_umum`
--

INSERT INTO `kriteria_umum` (`id_kriteria_umum`, `nama_kriteria`, `bobot`) VALUES
('KU001', 'Kehadiran', 90),
('KU002', 'Kerja Sama', 85),
('KU003', 'Keaktifan', 75),
('KU004', 'Kedisiplinan', 80),
('KU005', 'Loyalitas', 80);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_divisi`
--

DROP TABLE IF EXISTS `penilaian_divisi`;
CREATE TABLE IF NOT EXISTS `penilaian_divisi` (
  `id_penilaian_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria_jobdesk` varchar(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `id_bonus` int(11) NOT NULL,
  `kd_divisi` varchar(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `id_sub_jobdesk` int(11) NOT NULL,
  PRIMARY KEY (`id_penilaian_divisi`),
  KEY `id_kriteria` (`id_kriteria_jobdesk`),
  KEY `id_bonus` (`id_bonus`),
  KEY `id_karyawan` (`nip`),
  KEY `id_divisi` (`kd_divisi`),
  KEY `id_detail` (`id_sub_jobdesk`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_divisi`
--

INSERT INTO `penilaian_divisi` (`id_penilaian_divisi`, `id_kriteria_jobdesk`, `nip`, `id_bonus`, `kd_divisi`, `nilai`, `keterangan`, `id_sub_jobdesk`) VALUES
(7, 'KJ001', '202000001', 1, 'D001', 2, 'Laporan selesai dibuat 2 minggu setelah terjadi kecelakaan', 2),
(8, 'KJ002', '202000001', 1, 'D001', 2, 'Melakukan pemeriksaan perlengkapan K3 1 bulan sekali', 6),
(9, 'KJ003', '202000001', 1, 'D001', 3, 'Melakukan pemeriksaan lingkungan tambang setiap hari', 8),
(10, 'KJ001', '202000002', 1, 'D001', 3, 'Laporan selesai dibuat 1 minggu setelah terjadi kecelakaan', 1),
(11, 'KJ002', '202000002', 1, 'D001', 3, 'Melakukan pemeriksaan perlengkapan K3 1 minggu sekali', 5),
(12, 'KJ003', '202000002', 1, 'D001', 3, 'Melakukan pemeriksaan lingkungan tambang setiap hari', 8);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_hrd`
--

DROP TABLE IF EXISTS `penilaian_hrd`;
CREATE TABLE IF NOT EXISTS `penilaian_hrd` (
  `id_penilaian_hrd` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `id_kriteria_umum` varchar(11) NOT NULL,
  `id_bonus` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `id_sub_umum` int(11) NOT NULL,
  PRIMARY KEY (`id_penilaian_hrd`),
  KEY `id_karyawan` (`nip`),
  KEY `id_kriteria` (`id_kriteria_umum`),
  KEY `id_bonus` (`id_bonus`),
  KEY `id_detail` (`id_sub_umum`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_hrd`
--

INSERT INTO `penilaian_hrd` (`id_penilaian_hrd`, `nip`, `id_kriteria_umum`, `id_bonus`, `nilai`, `keterangan`, `id_sub_umum`) VALUES
(1, '202000001', 'KU001', 1, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(2, '202000001', 'KU002', 1, 3, '> 5 kali terlibat dalam kerjasama tim', 5),
(3, '202000001', 'KU003', 1, 3, '> 5 kali mengikuti kegiatan diluar jobdesk', 8),
(4, '202000001', 'KU004', 1, 3, '< 5 kali melanggar peraturan perusahaan', 11),
(5, '202000001', 'KU005', 1, 3, 'Jumlah hari lembur karyawan > 15 kali', 14),
(16, '202000002', 'KU001', 1, 1, 'Tidak hadir >7 Hari', 3),
(17, '202000002', 'KU002', 1, 1, '<3 kali terlibat dalam kerjasama tim', 7),
(18, '202000002', 'KU003', 1, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(19, '202000002', 'KU004', 1, 1, '> 10 kali melanggar peraturan perusahaan', 13),
(20, '202000002', 'KU005', 1, 3, 'Jumlah hari lembur karyawan > 15 kali', 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailsubkriteria_jobdesk`
--
ALTER TABLE `detailsubkriteria_jobdesk`
  ADD CONSTRAINT `detailsubkriteria_jobdesk_ibfk_1` FOREIGN KEY (`id_kriteria_jobdesk`) REFERENCES `kriteria_jobdesk` (`id_kriteria_jobdesk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailsubkriteria_umum`
--
ALTER TABLE `detailsubkriteria_umum`
  ADD CONSTRAINT `detailsubkriteria_umum_ibfk_1` FOREIGN KEY (`id_kriteria_umum`) REFERENCES `kriteria_umum` (`id_kriteria_umum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`kd_divisi`) REFERENCES `divisi` (`kd_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria_jobdesk`
--
ALTER TABLE `kriteria_jobdesk`
  ADD CONSTRAINT `kriteria_jobdesk_ibfk_1` FOREIGN KEY (`kd_divisi`) REFERENCES `divisi` (`kd_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_divisi`
--
ALTER TABLE `penilaian_divisi`
  ADD CONSTRAINT `penilaian_divisi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_3` FOREIGN KEY (`id_kriteria_jobdesk`) REFERENCES `kriteria_jobdesk` (`id_kriteria_jobdesk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_5` FOREIGN KEY (`kd_divisi`) REFERENCES `divisi` (`kd_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_6` FOREIGN KEY (`id_sub_jobdesk`) REFERENCES `detailsubkriteria_jobdesk` (`id_sub_jobdesk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_hrd`
--
ALTER TABLE `penilaian_hrd`
  ADD CONSTRAINT `penilaian_hrd_ibfk_1` FOREIGN KEY (`id_kriteria_umum`) REFERENCES `kriteria_umum` (`id_kriteria_umum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_hrd_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_hrd_ibfk_4` FOREIGN KEY (`id_sub_umum`) REFERENCES `detailsubkriteria_umum` (`id_sub_umum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
