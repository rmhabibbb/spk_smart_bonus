-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2021 at 06:01 AM
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
('a10@gmail.com', '1f2146495ecabe3efed5893468ae28ba', 5, NULL),
('a11@gmail.com', '77d1c3d85cb440c2989a3b325c0d2344', 5, NULL),
('a12@gmail.com', 'eedd5d93c560f941e8632807f2837102', 5, NULL),
('a13@gmail.com', '959cdda709709b8b540e9d8380647ab1', 5, NULL),
('a14@gmail.com', 'a76155825bb19203df428f474b6252f2', 5, NULL),
('a15@gmail.com', 'a9c2747cf9eb2fc0bef97413baa7fae8', 5, NULL),
('a1@gmail.com', 'f8b51ea3dab97270c3d1df3cebd452a1', 5, NULL),
('a2@gmail.com', '0be2e2181e44147226f01f97c939891b', 5, NULL),
('a3@gmail.com', 'ccc0bf40a4ce6f31e511ddf16a32661b', 5, NULL),
('a4@gmail.com', 'ce46c294226006ca45dcc40fc07db941', 5, NULL),
('a5@gmail.com', '51500b906caa1422b9aeb7204aed2096', 5, NULL),
('a6@gmail.com', '0b4c67d0db11a7d4abbacaaf0f601ab0', 5, NULL),
('a7@gmail.com', '6a1c6bb76612218a60ad41f78e8a61e4', 5, NULL),
('a8@gmail.com', 'ab136493bb59068c33ce0d17db8df6ce', 5, NULL),
('a9@gmail.com', '6d255bdf19b0cc632d52f0fc93165c6d', 5, NULL),
('admin.budigemagempita@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
('divisi.administrasi@gmail.com', '162bd148aae25d2097003acfc1886f71', 2, NULL),
('divisi.hse@gmail.com', 'd864b5bcd828f4797796caa1ff2c03a1', 2, NULL),
('divisi.keamanan@gmail.com', 'c8d66b12c31bd0c58575bfb48e8d26e4', 2, NULL),
('divisi.mpqc@gmail.com', '1079378631ceb1e24bd7940e3df6699c', 2, NULL),
('divisi.pm@gmail.com', '12d8f3a08ab12698c9ea7e0154261f9f', 2, NULL),
('divisi.po1@gmail.com', '6cd360836b51c756372aaee1ef8b9570', 2, NULL),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id_bonus`, `periode`, `tahun`, `tgl_buat`, `jumlah_bonus`, `status`, `bataswaktu_penilaian_divisi`, `bataswaktu_penilaian_hrd`) VALUES
(4, 1, 2021, '2021-09-16 16:08:41', 4, 3, '2021-09-18', '2021-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `detailsubkriteria_jobdesk`
--

DROP TABLE IF EXISTS `detailsubkriteria_jobdesk`;
CREATE TABLE IF NOT EXISTS `detailsubkriteria_jobdesk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailsubkriteria_jobdesk`
--

INSERT INTO `detailsubkriteria_jobdesk` (`id`, `id_kriteria`, `keterangan`, `nilai`) VALUES
(1, 1, 'Laporan selesai dibuat 1 minggu setelah terjadi kecelakaan', 3),
(2, 1, 'Laporan selesai dibuat 2 minggu setelah terjadi kecelakaan', 2),
(3, 1, 'Laporan selesai dibuat lebih dari 2 minggu setelah terjadi  kecelakaan', 1),
(4, 2, 'Melakukan pemeriksaan perlengkapan K3 1 minggu sekali', 3),
(5, 2, 'Melakukan pemeriksaan perlengkapan K3 1 bulan sekali', 2),
(6, 2, 'Tidak melakukan pemeriksaan sama sekali', 1),
(7, 3, 'Melakukan pemeriksaan lingkungan tambang setiap hari', 3),
(8, 3, 'Melakukan pemeriksaan lingkungan tambang 3 kali dalam  1 minggu', 2),
(9, 3, 'Melakukan pemeriksaan lingkungan tambang 1 kali dalam  1 minggu', 1),
(10, 4, 'Monitor hasil produksi dilakukan perhari', 3),
(11, 4, 'Monitor hasil produksi dilakukan perminggu', 2),
(12, 4, 'Monitor hasil produksi dilakukan perbulan', 1),
(13, 5, 'Penelitian Kualitas batubara dilakukan setiap hari ', 3),
(14, 5, 'Penelitian Kualitas batubara dilakukan 3 kali dalam 1  minggu', 2),
(15, 5, 'Penelitian Kualitas batubara setiap hari 1 kali dalam 1  minggu', 1),
(16, 6, 'Rencana kerja dibuat dengan sangat baik dan detail', 3),
(17, 6, 'Rencana kerja dibuat dengan sangat baik tapi kurang detail', 2),
(18, 6, 'Rencana kerja dibuat asal-asal', 1),
(19, 7, 'Laporan penggalian dan pengiriman batubara dibuat setiap  hari', 3),
(20, 7, 'Laporan penggalian dan pengiriman batubara dibuat 1  minggu sekali', 2),
(21, 7, 'Laporan penggalian dan pengiriman batubara dibuat 2  minggu sekali', 1),
(22, 8, 'Mengawasi penggalian dan pengiriman setiap hari', 3),
(23, 8, 'Mengawasi penggalian dan pengiriman 3 hari sekali', 2),
(24, 8, 'Tidak mengawasi sama sekali', 1),
(25, 9, '0- 2 kali tidak membawa kelengkapan kerja', 3),
(26, 9, '3 - 7 kali tidak membawa kelengkapan kerja', 2),
(27, 9, '> 7 kali tidak membawa kelengkapan kerja', 1),
(28, 10, 'Jumlah batubara yang dikirim melebihi target pengiriman  batubara ke stockfile', 3),
(29, 10, 'Jumlah batubara yang dikirim sesuai target pengiriman  batubara ke stockfile', 2),
(30, 10, 'Jumlah batubara yang dikirim kurang dari target  pengiriman batubara ke stockfile', 1),
(31, 11, '0-3 kali melanggar prosedur perusahaan', 3),
(32, 11, '4-7 kali melanggar prosedur perusahaan', 2),
(33, 11, '> 7 kali melanggar prosedur perusahaan', 1),
(34, 12, 'Jumlah batubara yang digali melebihi target perusahaan', 3),
(35, 12, 'Jumlah batubara yang digali sesuai dengan target  perusahaan', 2),
(36, 12, 'Jumlah batubara yang digali tidak sesuai dengan target  perusahaan', 1),
(37, 13, 'Melakukan pengecekan mesin alat 1 minggu sekali', 3),
(38, 13, 'Melakukan pengecekan mesin alat 2 minggu sekali', 2),
(39, 13, 'Melakukan pengecekan mesin alat 1 bulan sekali', 1),
(40, 14, 'Memperbaiki alat rusak < 3 hari', 3),
(41, 14, 'Memperbaiki alat rusak 3-7 hari', 2),
(42, 14, 'Memperbaiki alat rusak > 7 hari', 1),
(43, 15, 'Dokumen dibuat < 3 hari', 3),
(44, 15, 'Dokumen dibuat 3-7 hari ', 2),
(45, 15, 'Dokumen dibuat > 7 hari', 1),
(46, 16, 'Data perusahaan selesai diinput < 3 hari', 3),
(47, 16, 'Data perusahaan selesai diinput 3-7 hari', 2),
(48, 16, 'Data perusahaan selesai diinput > 7 hari', 1),
(49, 17, 'Arsip data perusahaan dilakukan perhari', 3),
(50, 17, 'Arsip data perusahaan dilakukan 3 hari sekali', 2),
(51, 17, 'Arsip data perusahaan dilakukan 1 minggu sekali', 1),
(52, 18, 'Terdapat 0-3 kali laporan kehilangan ', 3),
(53, 18, 'Terdapat 4-7 kali laporan kehilangan', 2),
(54, 18, 'Terdapat > 7 kali laporan kehilangan', 1),
(55, 19, 'Melakukan pemeriksaan kepada semua tamu yang datang ', 3),
(56, 19, 'Melakukan pemeriksaan 50% dari tamu yang datang', 2),
(57, 19, 'Tidak pernah memeriksa tamu yang datang', 1),
(58, 20, 'Menggunakan semua kelengkapan kerja security', 3),
(59, 20, 'Menggunakan 50% dari kelengkapan kerja security', 2),
(60, 20, 'Tidak menggunakan kelengkapan kerja security ', 1),
(61, 21, 'Aset perusahaan diperiksa setiap hari', 3),
(62, 21, 'Aset perusahaan diperiksa 1 minggu 3 kali', 2),
(63, 21, 'Aset perusahaan diperiksa 1 minggu 1 kali', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailsubkriteria_umum`
--

DROP TABLE IF EXISTS `detailsubkriteria_umum`;
CREATE TABLE IF NOT EXISTS `detailsubkriteria_umum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailsubkriteria_umum`
--

INSERT INTO `detailsubkriteria_umum` (`id`, `id_kriteria`, `keterangan`, `nilai`) VALUES
(1, 1, 'Tidak hadir <3 Hari – Selalu Hadir', 3),
(2, 1, 'Tidak hadir 3 - 7 Hari', 2),
(3, 1, 'Tidak hadir >7 Hari', 1),
(4, 2, '> 5 kali terlibat dalam kerjasama tim', 3),
(5, 2, '3-5 kali terlibat dalam kerjasama tim', 2),
(6, 2, '<3 kali terlibat dalam kerjasama tim', 1),
(7, 3, '> 5 kali mengikuti kegiatan diluar jobdesk', 3),
(8, 3, '3-5 kali mengikuti kegiatan diluar jobdesk', 2),
(9, 3, '3-5 kali mengikuti kegiatan diluar jobdesk', 1),
(10, 4, '<5 kali melanggar peraturan perusahaan', 3),
(11, 4, '5-10 kali melanggar peraturan perusahaan', 2),
(12, 4, '>10 kali melanggar peraturan perusahaan', 1),
(13, 5, 'Jumlah hari lembur karyawan > 15 kali', 3),
(14, 5, 'Jumlah hari lembur karyawan 8-15 kali', 2),
(15, 5, 'Jumlah hari lembur karyawan < 8 kali', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id_divisi`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `email`, `nama_divisi`, `deskripsi`) VALUES
(1, 'divisi.hse@gmail.com', 'HSE ', '(Health, Safety and Environment)\r\n\r\na) Membuat laporan identifikasi kecelakaan.\r\nb) Melakukan pemeriksaan kelayakan perlengkapan k3 kepada \r\nkaryawan.\r\nc) Memeriksa keadaan lingkungan tambang'),
(2, 'divisi.mpqc@gmail.com', 'Mine Planning & QC', 'a) Memonitor hasil produksi batubara di stockfile agar sesuai target.\r\nb) Meneliti kualitas batubara.\r\nc) Membuat rencana kerja pertambangan.'),
(3, 'divisi.po1@gmail.com', 'Produksi & Operasional Foreman', 'a) Membuat laporan penggalian dan pengiriman batubara.\r\nb) Mengawasi penggalian dan pengiriman sesuai dengan rencana \r\npenambangan. '),
(4, 'divisi.po2@gmail.com', 'Produksi & Operasional Dump Truck', 'a) Membawa kelengkapan kerja (SIM, STNK dan surat jalan).\r\nb) Melakukan pengiriman batubara ke stockfile.'),
(5, 'divisi.po3@gmail.com', 'Produksi & Operasional Excavator', 'a) Melakukan pengoperasian excavator sesuai dengan prosedur \r\nperusahaan.\r\nb) Melakukan penggalian batubara.'),
(6, 'divisi.pm@gmail.com', 'Plan & Maintenance', 'a) Melakukan pengecekan mesin alat berat.\r\nb) Memperbaiki alat rusak.'),
(7, 'divisi.administrasi@gmail.com', 'Administrasi', 'a) Membuat dokumen yang diperlukan perusahaan.\r\nb) Menginput data perusahaan.\r\nc) Menyusun arsip data perusahaan.'),
(8, 'divisi.keamanan@gmail.com', 'Keamanan', 'a) Melakukan pengamanan di perusahaan.\r\nb) Memeriksa tamu yang akan masuk ke lingkungan tambang.\r\nc) Menjaga kelengkapan kerja security');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  PRIMARY KEY (`id_karyawan`),
  UNIQUE KEY `email` (`email`),
  KEY `id_divisi` (`id_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `email`, `nama`, `jk`, `alamat`, `no_telp`, `id_divisi`) VALUES
('A01', 'a1@gmail.com', 'Andrie Gumay', 'Laki - Laki', '-', '-', 1),
('A02', 'a2@gmail.com', 'Erwin Kusuma', 'Laki - Laki', '-', '-', 1),
('A03', 'a3@gmail.com', 'Feriyadi', 'Laki - Laki', '-', '-', 2),
('A04', 'a4@gmail.com', 'Rihan', 'Laki - Laki', '-', '-', 2),
('A05', 'a5@gmail.com', 'Hendrianto', 'Laki - Laki', '-', '-', 3),
('A06', 'a6@gmail.com', 'Welly Dozen', 'Laki - Laki', '-', '-', 4),
('A07', 'a7@gmail.com', 'Deni Krisna', 'Laki - Laki', '-', '-', 4),
('A08', 'a8@gmail.com', 'Eko Cahyono', 'Laki - Laki', '-', '-', 5),
('A09', 'a9@gmail.com', 'Ibnu Hajar', 'Laki - Laki', '-', '-', 5),
('A10', 'a10@gmail.com', 'Nopriansyah', 'Laki - Laki', '-', '-', 5),
('A11', 'a11@gmail.com', 'Robinson', 'Laki - Laki', '-', '-', 6),
('A12', 'a12@gmail.com', 'Sarwani', 'Perempuan', '-', '-', 6),
('A13', 'a13@gmail.com', 'Septia Putri Utami', 'Perempuan', '-', '-', 7),
('A14', 'a14@gmail.com', 'Tarmansyah', 'Laki - Laki', '-', '-', 8),
('A15', 'a15@gmail.com', 'Asmawi', 'Laki - Laki', '-', '-', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_jobdesk`
--

DROP TABLE IF EXISTS `kriteria_jobdesk`;
CREATE TABLE IF NOT EXISTS `kriteria_jobdesk` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` text NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `bobot` float NOT NULL,
  PRIMARY KEY (`id_kriteria`),
  KEY `id_divisi` (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_jobdesk`
--

INSERT INTO `kriteria_jobdesk` (`id_kriteria`, `nama_kriteria`, `id_divisi`, `bobot`) VALUES
(1, 'Membuat laporan identifikasi kecelakaan', 1, 70),
(2, 'Melakukan pemeriksaan kelayakan  perlengkapan K3 kepada karyawan', 1, 50),
(3, 'Memeriksa keadaan lingkungan tambang', 1, 65),
(4, 'Memonitor hasil produksi batubara di  stockfile agar sesuai target', 2, 65),
(5, 'Meneliti kualitas batubara', 2, 75),
(6, 'Membuat rencana kerja pertambangan', 2, 75),
(7, 'Membuat laporan penggalian dan pengiriman  batubara', 3, 95),
(8, 'Membuat laporan penggalian dan pengiriman  batubara', 3, 90),
(9, 'Membawa kelengkapan kerja (SIM, STNK  dan surat jalan)', 4, 90),
(10, 'Membawa kelengkapan kerja (SIM, STNK  dan surat jalan)', 4, 95),
(11, 'Melakukan pengoperasian excavator sesuai  dengan prosedur perusahaan', 5, 90),
(12, 'Melakukan penggalian batubara ', 5, 95),
(13, 'Melakukan pengecekan mesin alat berat', 6, 95),
(14, 'Memperbaiki alat rusak', 6, 90),
(15, 'Membuat dokumen yang diperlukan  perusahaan', 7, 75),
(16, 'Membuat dokumen yang diperlukan  perusahaan', 7, 50),
(17, 'Membuat dokumen yang diperlukan  perusahaan', 7, 60),
(18, 'Melakukan pengamanan di perusahaan', 8, 55),
(19, 'Memeriksa tamu yang akan masuk ke  lingkungan tambang', 8, 60),
(20, 'Menjaga kelengkapan kerja security ', 8, 30),
(21, 'Menjaga dan memelihara aset perusahaan', 8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_umum`
--

DROP TABLE IF EXISTS `kriteria_umum`;
CREATE TABLE IF NOT EXISTS `kriteria_umum` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` text NOT NULL,
  `bobot` float NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_umum`
--

INSERT INTO `kriteria_umum` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Kehadiran', 90),
(2, 'Kerjasama', 85),
(3, 'Keaktifan', 75),
(4, 'Kedisiplinan', 80),
(5, 'Loyalitas', 80);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_divisi`
--

DROP TABLE IF EXISTS `penilaian_divisi`;
CREATE TABLE IF NOT EXISTS `penilaian_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `id_karyawan` varchar(25) NOT NULL,
  `id_bonus` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `id_detail` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `id_bonus` (`id_bonus`),
  KEY `id_karyawan` (`id_karyawan`),
  KEY `id_divisi` (`id_divisi`),
  KEY `id_detail` (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_divisi`
--

INSERT INTO `penilaian_divisi` (`id`, `id_kriteria`, `id_karyawan`, `id_bonus`, `id_divisi`, `nilai`, `keterangan`, `id_detail`) VALUES
(13, 1, 'A01', 4, 1, 2, 'Laporan selesai dibuat 2 minggu setelah terjadi kecelakaan', 2),
(14, 2, 'A01', 4, 1, 3, 'Melakukan pemeriksaan perlengkapan K3 1 minggu sekali', 4),
(15, 3, 'A01', 4, 1, 1, 'Melakukan pemeriksaan lingkungan tambang 1 kali dalam  1 minggu', 9),
(16, 1, 'A02', 4, 1, 1, 'Laporan selesai dibuat lebih dari 2 minggu setelah terjadi  kecelakaan', 3),
(17, 2, 'A02', 4, 1, 3, 'Melakukan pemeriksaan perlengkapan K3 1 minggu sekali', 4),
(18, 3, 'A02', 4, 1, 1, 'Melakukan pemeriksaan lingkungan tambang 1 kali dalam  1 minggu', 9),
(19, 4, 'A03', 4, 2, 3, 'Monitor hasil produksi dilakukan perhari', 10),
(20, 5, 'A03', 4, 2, 1, 'Penelitian Kualitas batubara setiap hari 1 kali dalam 1  minggu', 15),
(21, 6, 'A03', 4, 2, 2, 'Rencana kerja dibuat dengan sangat baik tapi kurang detail', 17),
(22, 4, 'A04', 4, 2, 3, 'Monitor hasil produksi dilakukan perhari', 10),
(23, 5, 'A04', 4, 2, 1, 'Penelitian Kualitas batubara setiap hari 1 kali dalam 1  minggu', 15),
(24, 6, 'A04', 4, 2, 2, 'Rencana kerja dibuat dengan sangat baik tapi kurang detail', 17),
(25, 7, 'A05', 4, 3, 2, 'Laporan penggalian dan pengiriman batubara dibuat 1  minggu sekali', 20),
(26, 8, 'A05', 4, 3, 1, 'Tidak mengawasi sama sekali', 24),
(27, 9, 'A06', 4, 4, 2, '3 - 7 kali tidak membawa kelengkapan kerja', 26),
(28, 10, 'A06', 4, 4, 3, 'Jumlah batubara yang dikirim melebihi target pengiriman  batubara ke stockfile', 28),
(29, 9, 'A07', 4, 4, 1, '> 7 kali tidak membawa kelengkapan kerja', 27),
(30, 10, 'A07', 4, 4, 2, 'Jumlah batubara yang dikirim sesuai target pengiriman  batubara ke stockfile', 29),
(31, 11, 'A08', 4, 5, 2, '4-7 kali melanggar prosedur perusahaan', 32),
(32, 12, 'A08', 4, 5, 2, 'Jumlah batubara yang digali sesuai dengan target  perusahaan', 35),
(33, 11, 'A09', 4, 5, 2, '4-7 kali melanggar prosedur perusahaan', 32),
(34, 12, 'A09', 4, 5, 3, 'Jumlah batubara yang digali melebihi target perusahaan', 34),
(35, 11, 'A10', 4, 5, 1, '> 7 kali melanggar prosedur perusahaan', 33),
(36, 12, 'A10', 4, 5, 2, 'Jumlah batubara yang digali sesuai dengan target  perusahaan', 35),
(37, 13, 'A11', 4, 6, 2, 'Melakukan pengecekan mesin alat 2 minggu sekali', 38),
(38, 14, 'A11', 4, 6, 1, 'Memperbaiki alat rusak > 7 hari', 42),
(39, 13, 'A12', 4, 6, 2, 'Melakukan pengecekan mesin alat 2 minggu sekali', 38),
(40, 14, 'A12', 4, 6, 3, 'Memperbaiki alat rusak < 3 hari', 40),
(41, 15, 'A13', 4, 7, 3, 'Dokumen dibuat < 3 hari', 43),
(42, 16, 'A13', 4, 7, 1, 'Data perusahaan selesai diinput > 7 hari', 48),
(43, 17, 'A13', 4, 7, 2, 'Arsip data perusahaan dilakukan 3 hari sekali', 50),
(44, 18, 'A14', 4, 8, 2, 'Terdapat 4-7 kali laporan kehilangan', 53),
(45, 19, 'A14', 4, 8, 1, 'Tidak pernah memeriksa tamu yang datang', 57),
(46, 20, 'A14', 4, 8, 2, 'Menggunakan 50% dari kelengkapan kerja security', 59),
(47, 21, 'A14', 4, 8, 3, 'Aset perusahaan diperiksa setiap hari', 61),
(48, 18, 'A15', 4, 8, 1, 'Terdapat > 7 kali laporan kehilangan', 54),
(49, 19, 'A15', 4, 8, 3, 'Melakukan pemeriksaan kepada semua tamu yang datang ', 55),
(50, 20, 'A15', 4, 8, 2, 'Menggunakan 50% dari kelengkapan kerja security', 59),
(51, 21, 'A15', 4, 8, 1, 'Aset perusahaan diperiksa 1 minggu 1 kali', 63);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_hrd`
--

DROP TABLE IF EXISTS `penilaian_hrd`;
CREATE TABLE IF NOT EXISTS `penilaian_hrd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` varchar(25) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_bonus` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `id_detail` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `id_bonus` (`id_bonus`),
  KEY `id_detail` (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_hrd`
--

INSERT INTO `penilaian_hrd` (`id`, `id_karyawan`, `id_kriteria`, `id_bonus`, `nilai`, `keterangan`, `id_detail`) VALUES
(6, 'A02', 1, 4, 2, 'Tidak hadir 3 - 7 Hari', 2),
(7, 'A02', 2, 4, 1, '<3 kali terlibat dalam kerjasama tim', 6),
(8, 'A02', 3, 4, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 8),
(9, 'A02', 4, 4, 3, '<5 kali melanggar peraturan perusahaan', 10),
(10, 'A02', 5, 4, 1, 'Jumlah hari lembur karyawan < 8 kali', 15),
(11, 'A03', 1, 4, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(12, 'A03', 2, 4, 2, '3-5 kali terlibat dalam kerjasama tim', 5),
(13, 'A03', 3, 4, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 8),
(14, 'A03', 4, 4, 1, '>10 kali melanggar peraturan perusahaan', 12),
(15, 'A03', 5, 4, 1, 'Jumlah hari lembur karyawan < 8 kali', 15),
(16, 'A04', 1, 4, 1, 'Tidak hadir >7 Hari', 3),
(17, 'A04', 2, 4, 3, '> 5 kali terlibat dalam kerjasama tim', 4),
(18, 'A04', 3, 4, 1, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(19, 'A04', 4, 4, 3, '<5 kali melanggar peraturan perusahaan', 10),
(20, 'A04', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14),
(21, 'A05', 1, 4, 2, 'Tidak hadir 3 - 7 Hari', 2),
(22, 'A05', 2, 4, 1, '<3 kali terlibat dalam kerjasama tim', 6),
(23, 'A05', 3, 4, 3, '> 5 kali mengikuti kegiatan diluar jobdesk', 7),
(24, 'A05', 4, 4, 2, '5-10 kali melanggar peraturan perusahaan', 11),
(25, 'A05', 5, 4, 3, 'Jumlah hari lembur karyawan > 15 kali', 13),
(26, 'A06', 1, 4, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(27, 'A06', 2, 4, 1, '<3 kali terlibat dalam kerjasama tim', 6),
(28, 'A06', 3, 4, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 8),
(29, 'A06', 4, 4, 3, '<5 kali melanggar peraturan perusahaan', 10),
(30, 'A06', 5, 4, 1, 'Jumlah hari lembur karyawan < 8 kali', 15),
(31, 'A07', 1, 4, 1, 'Tidak hadir >7 Hari', 3),
(32, 'A07', 2, 4, 2, '3-5 kali terlibat dalam kerjasama tim', 5),
(33, 'A07', 3, 4, 3, '> 5 kali mengikuti kegiatan diluar jobdesk', 7),
(34, 'A07', 4, 4, 2, '5-10 kali melanggar peraturan perusahaan', 11),
(35, 'A07', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14),
(36, 'A08', 1, 4, 2, 'Tidak hadir 3 - 7 Hari', 2),
(37, 'A08', 2, 4, 3, '> 5 kali terlibat dalam kerjasama tim', 4),
(38, 'A08', 3, 4, 1, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(39, 'A08', 4, 4, 1, '>10 kali melanggar peraturan perusahaan', 12),
(40, 'A08', 5, 4, 3, 'Jumlah hari lembur karyawan > 15 kali', 13),
(41, 'A09', 1, 4, 2, 'Tidak hadir 3 - 7 Hari', 2),
(42, 'A09', 2, 4, 2, '3-5 kali terlibat dalam kerjasama tim', 5),
(43, 'A09', 3, 4, 1, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(44, 'A09', 4, 4, 3, '<5 kali melanggar peraturan perusahaan', 10),
(45, 'A09', 5, 4, 1, 'Jumlah hari lembur karyawan < 8 kali', 15),
(46, 'A10', 1, 4, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(47, 'A10', 2, 4, 1, '<3 kali terlibat dalam kerjasama tim', 6),
(48, 'A10', 3, 4, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 8),
(49, 'A10', 4, 4, 1, '>10 kali melanggar peraturan perusahaan', 12),
(50, 'A10', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14),
(51, 'A11', 1, 4, 1, 'Tidak hadir >7 Hari', 3),
(52, 'A11', 2, 4, 1, '<3 kali terlibat dalam kerjasama tim', 6),
(53, 'A11', 3, 4, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 8),
(54, 'A11', 4, 4, 3, '<5 kali melanggar peraturan perusahaan', 10),
(55, 'A11', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14),
(56, 'A12', 1, 4, 2, 'Tidak hadir 3 - 7 Hari', 2),
(57, 'A12', 2, 4, 2, '3-5 kali terlibat dalam kerjasama tim', 5),
(58, 'A12', 3, 4, 3, '> 5 kali mengikuti kegiatan diluar jobdesk', 7),
(59, 'A12', 4, 4, 1, '>10 kali melanggar peraturan perusahaan', 12),
(60, 'A12', 5, 4, 3, 'Jumlah hari lembur karyawan > 15 kali', 13),
(61, 'A13', 1, 4, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(62, 'A13', 2, 4, 3, '> 5 kali terlibat dalam kerjasama tim', 4),
(63, 'A13', 3, 4, 1, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(64, 'A13', 4, 4, 1, '>10 kali melanggar peraturan perusahaan', 12),
(65, 'A13', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14),
(66, 'A14', 1, 4, 1, 'Tidak hadir >7 Hari', 3),
(67, 'A14', 2, 4, 3, '> 5 kali terlibat dalam kerjasama tim', 4),
(68, 'A14', 3, 4, 2, '3-5 kali mengikuti kegiatan diluar jobdesk', 8),
(69, 'A14', 4, 4, 1, '>10 kali melanggar peraturan perusahaan', 12),
(70, 'A14', 5, 4, 3, 'Jumlah hari lembur karyawan > 15 kali', 13),
(71, 'A15', 1, 4, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(72, 'A15', 2, 4, 2, '3-5 kali terlibat dalam kerjasama tim', 5),
(73, 'A15', 3, 4, 1, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(74, 'A15', 4, 4, 3, '<5 kali melanggar peraturan perusahaan', 10),
(75, 'A15', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14),
(86, 'A01', 1, 4, 3, 'Tidak hadir <3 Hari – Selalu Hadir', 1),
(87, 'A01', 2, 4, 3, '> 5 kali terlibat dalam kerjasama tim', 4),
(88, 'A01', 3, 4, 1, '3-5 kali mengikuti kegiatan diluar jobdesk', 9),
(89, 'A01', 4, 4, 2, '5-10 kali melanggar peraturan perusahaan', 11),
(90, 'A01', 5, 4, 2, 'Jumlah hari lembur karyawan 8-15 kali', 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailsubkriteria_jobdesk`
--
ALTER TABLE `detailsubkriteria_jobdesk`
  ADD CONSTRAINT `detailsubkriteria_jobdesk_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria_jobdesk` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailsubkriteria_umum`
--
ALTER TABLE `detailsubkriteria_umum`
  ADD CONSTRAINT `detailsubkriteria_umum_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria_umum` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria_jobdesk`
--
ALTER TABLE `kriteria_jobdesk`
  ADD CONSTRAINT `kriteria_jobdesk_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_divisi`
--
ALTER TABLE `penilaian_divisi`
  ADD CONSTRAINT `penilaian_divisi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria_jobdesk` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_3` FOREIGN KEY (`id_bonus`) REFERENCES `bonus` (`id_bonus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_4` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_divisi_ibfk_5` FOREIGN KEY (`id_detail`) REFERENCES `detailsubkriteria_jobdesk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_hrd`
--
ALTER TABLE `penilaian_hrd`
  ADD CONSTRAINT `penilaian_hrd_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_hrd_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria_umum` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_hrd_ibfk_3` FOREIGN KEY (`id_bonus`) REFERENCES `bonus` (`id_bonus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_hrd_ibfk_4` FOREIGN KEY (`id_detail`) REFERENCES `detailsubkriteria_umum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
