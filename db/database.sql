-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 07:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_tati`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `kode_hasil` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `hasil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`kode_hasil`, `nis`, `hasil`) VALUES
(9, '990236365204', '0,96'),
(10, '990100582059', '0,95'),
(11, '990154873598', '0,81'),
(12, '990493086269', '0,69');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`) VALUES
('KLS004', 'Kelas 4'),
('KLS005', 'Kelas 5'),
('KLS006', 'Kelas 6');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(64) NOT NULL,
  `sifat` varchar(32) NOT NULL,
  `bobot` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `sifat`, `bobot`) VALUES
('C1', 'Nilai Raport', 'Benefit', '35'),
('C2', 'Absensi', 'Cost', '25'),
('C3', 'Sikap', 'Benefit', '25'),
('C4', 'Prestasi Ekstrakulikuler', 'Benefit', '15');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kode_kriteria` varchar(24) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `nis`, `kode_kriteria`, `nilai`) VALUES
(38, '990154873598', 'C1', 90),
(39, '990154873598', 'C2', 3),
(40, '990154873598', 'C3', 4),
(41, '990154873598', 'C4', 70),
(42, '990236365204', 'C2', 5),
(43, '990236365204', 'C1', 80),
(44, '990236365204', 'C3', 5),
(45, '990236365204', 'C4', 95),
(46, '990493086269', 'C1', 80),
(47, '990493086269', 'C2', 2),
(48, '990493086269', 'C3', 3),
(49, '990493086269', 'C4', 80),
(50, '990100582059', 'C1', 90),
(51, '990100582059', 'C2', 5),
(52, '990100582059', 'C3', 4),
(53, '990100582059', 'C4', 95);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jk_siswa` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` text DEFAULT NULL,
  `kode_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `jk_siswa`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `foto`, `kode_kelas`) VALUES
('990040666152', 'Samiah Ella Mandasari S.Kom', 'perempuan', 'Psr. Salak No. 823', 'Kediri', '1973-09-12', NULL, 'KLS006'),
('990100582059', 'Endah Halima Usamah S.Pt', 'perempuan', 'Ds. Sumpah Pemuda No. 210', 'Sibolga', '2006-05-05', NULL, 'KLS006'),
('990154873598', 'Winda Nurul Prastuti M.M.', 'laki-laki', 'Kpg. Perintis Kemerdekaan No. 634', 'Administrasi Jakarta Barat', '2014-05-19', NULL, 'KLS004'),
('990178554693', 'Ajimin Jailani', 'laki-laki', 'Jr. Gatot Subroto No. 405', 'Tarakan', '2010-01-28', NULL, 'KLS005'),
('990236365204', 'Cinthia Paris Maryati', 'laki-laki', 'Dk. Industri No. 586', 'Medan', '2004-07-20', NULL, 'KLS005'),
('990271951857', 'Ilsa Prastuti', 'perempuan', 'Ki. Baing No. 498', 'Tarakan', '1992-01-28', NULL, 'KLS005'),
('990310058857', 'Halima Winarsih', 'laki-laki', 'Ds. Yos Sudarso No. 42', 'Cilegon', '2000-01-15', NULL, 'KLS004'),
('990445322659', 'Siska Nurdiyanti', 'perempuan', 'Ds. Industri No. 907', 'Kotamobagu', '2014-10-03', NULL, 'KLS004'),
('990493086269', 'Dodo Karma Sitorus M.TI.', 'perempuan', 'Jln. Abdul. Muis No. 724', 'Batu', '2017-03-26', NULL, 'KLS005'),
('990735227276', 'Cindy Siti Nurdiyanti', 'perempuan', 'Ds. Villa No. 500', 'Administrasi Jakarta Timur', '1990-01-06', NULL, 'KLS004'),
('990769455699', 'Ciaobella Permata S.Sos', 'perempuan', 'Psr. Kyai Mojo No. 408', 'Semarang', '2008-09-20', NULL, 'KLS004'),
('990855534129', 'Talia Nuraini', 'perempuan', 'Ds. Sunaryo No. 497', 'Singkawang', '1980-02-29', NULL, 'KLS005'),
('990869785296', 'Muni Jarwa Saefullah', 'perempuan', 'Psr. Astana Anyar No. 95', 'Administrasi Jakarta Timur', '1987-12-05', NULL, 'KLS005'),
('991003034758', 'Titin Suartini', 'perempuan', 'Dk. Babakan No. 496', 'Administrasi Jakarta Barat', '1979-07-07', NULL, 'KLS006'),
('991087121344', 'Zizi Purnawati S.Pt', 'laki-laki', 'Ds. Baing No. 735', 'Pangkal Pinang', '1989-10-26', NULL, 'KLS004'),
('991180324807', 'Dadap Permadi', 'laki-laki', 'Jln. Dr. Junjunan No. 229', 'Jayapura', '2016-01-10', NULL, 'KLS006'),
('991245021198', 'Almira Sari Mandasari S.Farm', 'laki-laki', 'Gg. Merdeka No. 619', 'Langsa', '1972-02-01', NULL, 'KLS006'),
('991245949793', 'Balamantri Tampubolon S.H.', 'laki-laki', 'Kpg. Baja No. 712', 'Jayapura', '1982-02-20', NULL, 'KLS006'),
('991259484091', 'Syahrini Tari Wulandari', 'perempuan', 'Kpg. Untung Suropati No. 320', 'Mojokerto', '2007-08-31', NULL, 'KLS005'),
('991265646054', 'Elvin Iswahyudi S.Ked', 'laki-laki', 'Jr. Cokroaminoto No. 294', 'Serang', '1995-01-30', NULL, 'KLS006'),
('991276808455', 'Rahmi Maimunah Yuliarti', 'laki-laki', 'Kpg. Sentot Alibasa No. 10', 'Palembang', '1985-11-29', NULL, 'KLS006'),
('991415044763', 'Aditya Pradana S.Sos', 'perempuan', 'Dk. Basmol Raya No. 345', 'Kotamobagu', '2016-07-28', NULL, 'KLS005'),
('991503731572', 'Zahra Palastri', 'laki-laki', 'Kpg. Bappenas No. 437', 'Tomohon', '2015-01-19', NULL, 'KLS006'),
('991579456673', 'Upik Anggriawan', 'perempuan', 'Gg. Bata Putih No. 47', 'Administrasi Jakarta Selatan', '1978-10-04', NULL, 'KLS004'),
('991598091683', 'Ivan Wibisono', 'laki-laki', 'Psr. Baha No. 61', 'Medan', '1980-03-23', NULL, 'KLS004'),
('991701151006', 'Puspa Sakura Susanti S.I.Kom', 'laki-laki', 'Psr. Suharso No. 825', 'Ternate', '1986-09-30', NULL, 'KLS004'),
('991803251710', 'Budi Irawan', 'laki-laki', 'Ds. Taman No. 966', 'Tual', '2012-09-19', NULL, 'KLS006'),
('991827921997', 'Farhunnisa Winda Riyanti S.E.', 'laki-laki', 'Gg. Sampangan No. 424', 'Balikpapan', '1970-12-09', NULL, 'KLS004'),
('991933620059', 'Jamal Raharja Ramadan S.E.I', 'laki-laki', 'Dk. Bhayangkara No. 277', 'Lhokseumawe', '1996-01-30', NULL, 'KLS005'),
('991989098551', 'Ajimat Uwais', 'perempuan', 'Psr. Daan No. 323', 'Bukittinggi', '2007-11-15', NULL, 'KLS006'),
('992047684421', 'Ellis Permata', 'perempuan', 'Jr. Basoka Raya No. 368', 'Lubuklinggau', '1982-03-10', NULL, 'KLS005'),
('992272060307', 'Asirwada Hutagalung S.T.', 'laki-laki', 'Kpg. Bass No. 975', 'Jayapura', '2003-12-03', NULL, 'KLS004'),
('992324380943', 'Asmadi Murti Habibi', 'perempuan', 'Ki. Baan No. 607', 'Pontianak', '1994-03-05', NULL, 'KLS004'),
('992343366037', 'Darijan Mansur', 'laki-laki', 'Jln. Sudiarto No. 726', 'Tual', '1981-03-30', NULL, 'KLS005'),
('992420036449', 'Budi Natsir', 'laki-laki', 'Jr. Padma No. 137', 'Cirebon', '1990-08-27', NULL, 'KLS004'),
('992667552116', 'Dian Yuniar', 'laki-laki', 'Ds. BKR No. 326', 'Tangerang Selatan', '1999-01-29', NULL, 'KLS005'),
('992759843038', 'Bakijan Kuswoyo', 'perempuan', 'Kpg. Ir. H. Juanda No. 492', 'Batu', '1982-09-05', NULL, 'KLS005'),
('992835526975', 'Cager Nashiruddin S.T.', 'perempuan', 'Gg. Ciumbuleuit No. 442', 'Balikpapan', '1975-10-07', NULL, 'KLS005'),
('992867368054', 'Kamila Winarsih S.T.', 'perempuan', 'Gg. Imam Bonjol No. 411', 'Padangpanjang', '2009-08-21', NULL, 'KLS005'),
('992892203408', 'Limar Lazuardi', 'perempuan', 'Ds. Dahlia No. 820', 'Denpasar', '2019-01-26', NULL, 'KLS005'),
('993090962141', 'Yahya Suryono', 'perempuan', 'Ki. Diponegoro No. 822', 'Palopo', '1985-08-11', NULL, 'KLS006'),
('993148812114', 'Ulya Zulaika', 'laki-laki', 'Ds. Suryo Pranoto No. 533', 'Probolinggo', '2004-07-29', NULL, 'KLS004'),
('993217561034', 'Tirta Latif Uwais S.Kom', 'laki-laki', 'Gg. Soekarno Hatta No. 489', 'Bitung', '1982-09-22', NULL, 'KLS006'),
('993234740884', 'Ira Fitria Fujiati', 'perempuan', 'Ds. R.M. Said No. 951', 'Pagar Alam', '1976-02-27', NULL, 'KLS004'),
('993277096002', 'Kenes Among Mustofa', 'laki-laki', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 169', 'Pagar Alam', '1984-04-11', NULL, 'KLS006'),
('993449060195', 'Irwan Prakasa S.IP', 'laki-laki', 'Jln. Flora No. 239', 'Surabaya', '1997-03-01', NULL, 'KLS004'),
('993473132854', 'Virman Saputra M.Kom.', 'perempuan', 'Kpg. Arifin No. 387', 'Palembang', '1973-05-20', NULL, 'KLS005'),
('993629587315', 'Opan Hasan Pradipta S.Ked', 'perempuan', 'Jln. Sutami No. 566', 'Bandung', '1982-12-21', NULL, 'KLS004'),
('993688730383', 'Estiawan Najmudin', 'perempuan', 'Jr. Sam Ratulangi No. 977', 'Banjarmasin', '1983-12-14', NULL, 'KLS006'),
('993813353079', 'Prayogo Wage Anggriawan', 'laki-laki', 'Jln. Yogyakarta No. 759', 'Surakarta', '1999-02-13', NULL, 'KLS004'),
('993913963346', 'Victoria Sakura Farida', 'perempuan', 'Dk. Dr. Junjunan No. 871', 'Bontang', '1998-07-31', NULL, 'KLS005'),
('994310550194', 'Cindy Mayasari', 'laki-laki', 'Ki. Pacuan Kuda No. 570', 'Bitung', '2004-06-21', NULL, 'KLS005'),
('994601665469', 'Ida Zulaika S.E.I', 'laki-laki', 'Jr. Sugiono No. 93', 'Prabumulih', '1976-05-11', NULL, 'KLS004'),
('994616562677', 'Naradi Sihombing', 'laki-laki', 'Ki. Imam Bonjol No. 551', 'Pangkal Pinang', '1988-07-10', NULL, 'KLS006'),
('994639618895', 'Naradi Maulana', 'perempuan', 'Gg. Untung Suropati No. 991', 'Tangerang Selatan', '1995-01-21', NULL, 'KLS006'),
('994734145223', 'Raden Saefullah', 'perempuan', 'Jr. Agus Salim No. 185', 'Malang', '1990-01-11', NULL, 'KLS004'),
('994878359312', 'Kamaria Agustina', 'perempuan', 'Jr. Abdullah No. 888', 'Bontang', '1995-04-12', NULL, 'KLS006'),
('994918771660', 'Kemal Irawan', 'perempuan', 'Ds. Aceh No. 187', 'Banjarmasin', '1977-11-05', NULL, 'KLS006'),
('995369120766', 'Perkasa Kamal Manullang M.TI.', 'perempuan', 'Ki. Abdul. Muis No. 306', 'Jayapura', '2005-11-18', NULL, 'KLS004'),
('995385136663', 'Elvin Sitorus', 'perempuan', 'Ds. Cikutra Barat No. 275', 'Tangerang', '1977-03-25', NULL, 'KLS005'),
('995636107766', 'Kani Ika Safitri S.Sos', 'perempuan', 'Psr. Kyai Gede No. 411', 'Metro', '2010-12-29', NULL, 'KLS004'),
('995777812681', 'Zelaya Uyainah', 'laki-laki', 'Ki. Bak Air No. 907', 'Sorong', '1978-04-06', NULL, 'KLS004'),
('995881249523', 'Irma Melinda Safitri S.Sos', 'perempuan', 'Dk. Radio No. 574', 'Bandar Lampung', '1992-04-09', NULL, 'KLS004'),
('995898862938', 'Ana Handayani S.Gz', 'perempuan', 'Jln. S. Parman No. 427', 'Mataram', '1987-01-12', NULL, 'KLS004'),
('996149942092', 'Betania Hassanah', 'laki-laki', 'Psr. Gremet No. 874', 'Pontianak', '1977-07-18', NULL, 'KLS005'),
('996180214478', 'Kamal Zulkarnain M.Kom.', 'laki-laki', 'Dk. Bagis Utama No. 652', 'Administrasi Jakarta Utara', '1991-04-10', NULL, 'KLS006'),
('996215967272', 'Galak Wibowo', 'laki-laki', 'Ki. Ronggowarsito No. 743', 'Padangpanjang', '1975-12-30', NULL, 'KLS004'),
('996352018031', 'Nadine Pratiwi S.E.', 'laki-laki', 'Kpg. Jend. Sudirman No. 495', 'Jambi', '2012-04-10', NULL, 'KLS005'),
('996412652921', 'Aditya Kuswoyo M.Ak', 'perempuan', 'Ki. Labu No. 235', 'Padangpanjang', '1999-09-10', NULL, 'KLS004'),
('996435272595', 'Marsito Ardianto', 'perempuan', 'Jln. Barat No. 837', 'Jambi', '2019-07-16', NULL, 'KLS004'),
('996915839640', 'Titin Yuniar', 'laki-laki', 'Gg. Babah No. 929', 'Metro', '1991-07-21', NULL, 'KLS005'),
('996926606361', 'Oskar Pradana S.Psi', 'perempuan', 'Jln. Bahagia No. 972', 'Padangsidempuan', '1979-07-05', NULL, 'KLS004'),
('996993525384', 'Danuja Prabowo S.Pd', 'perempuan', 'Jr. Kiaracondong No. 962', 'Makassar', '1998-05-05', NULL, 'KLS004'),
('997003116665', 'Adikara Jaeman Tampubolon', 'perempuan', 'Jln. Pahlawan No. 110', 'Bau-Bau', '1994-10-09', NULL, 'KLS004'),
('997244506977', 'Gawati Andriani', 'laki-laki', 'Kpg. Bacang No. 370', 'Sabang', '2010-04-13', NULL, 'KLS005'),
('997259416996', 'Raisa Laras Fujiati S.I.Kom', 'laki-laki', 'Jln. Gremet No. 174', 'Cilegon', '2020-06-02', NULL, 'KLS004'),
('997335742555', 'Galuh Haryanto', 'perempuan', 'Dk. Salatiga No. 447', 'Ternate', '1979-09-16', NULL, 'KLS005'),
('997547991325', 'Nasim Samosir', 'laki-laki', 'Kpg. Daan No. 16', 'Malang', '1976-09-18', NULL, 'KLS006'),
('998110305095', 'Suci Belinda Hartati', 'laki-laki', 'Jr. Dewi Sartika No. 846', 'Bengkulu', '1988-10-15', NULL, 'KLS006'),
('998561861774', 'Daliono Sirait', 'laki-laki', 'Kpg. Salam No. 915', 'Padang', '2001-10-02', NULL, 'KLS004'),
('998805323153', 'Anom Tasdik Prabowo', 'perempuan', 'Ki. Bayam No. 382', 'Malang', '2021-05-24', NULL, 'KLS004'),
('998919889244', 'Zizi Wahyuni S.Pd', 'perempuan', 'Psr. Radio No. 763', 'Jayapura', '2009-06-05', NULL, 'KLS006'),
('998982768445', 'Dimaz Caket Budiyanto S.Farm', 'laki-laki', 'Jr. Ki Hajar Dewantara No. 722', 'Pekalongan', '2011-05-27', NULL, 'KLS005'),
('999254913831', 'Janet Tantri Suartini S.E.I', 'perempuan', 'Jr. B.Agam Dlm No. 56', 'Pekanbaru', '1979-03-03', NULL, 'KLS005'),
('999454533352', 'Irwan Jagaraga Sitorus', 'perempuan', 'Gg. Karel S. Tubun No. 595', 'Bandar Lampung', '1971-08-04', NULL, 'KLS006'),
('999566202274', 'Harimurti Marsito Kurniawan', 'perempuan', 'Gg. Jayawijaya No. 73', 'Palangka Raya', '1970-03-17', NULL, 'KLS005'),
('999638857601', 'Lintang Mayasari', 'perempuan', 'Jln. Rajiman No. 656', 'Denpasar', '2020-08-30', NULL, 'KLS005'),
('999688363117', 'Salman Mumpuni Damanik', 'laki-laki', 'Jln. Kyai Mojo No. 65', 'Cirebon', '1971-08-21', NULL, 'KLS005'),
('999781530379', 'Ulva Lailasari', 'laki-laki', 'Ds. Padang No. 990', 'Binjai', '1974-06-05', NULL, 'KLS006'),
('999785484425', 'Zizi Winarsih S.Farm', 'perempuan', 'Dk. Urip Sumoharjo No. 771', 'Blitar', '1972-10-26', NULL, 'KLS004'),
('999838581791', 'Dinda Safitri', 'perempuan', 'Gg. Sam Ratulangi No. 525', 'Palembang', '2010-11-06', NULL, 'KLS006'),
('999968753513', 'Jinawi Hidayat', 'laki-laki', 'Kpg. PHH. Mustofa No. 700', 'Tebing Tinggi', '2021-10-19', NULL, 'KLS006'),
('999998691680', 'Gawati Umi Oktaviani S.Pd', 'perempuan', 'Gg. Rajawali No. 197', 'Pagar Alam', '2012-07-03', NULL, 'KLS004');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kode_subkriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(16) NOT NULL,
  `nilai` varchar(30) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kode_subkriteria`, `kode_kriteria`, `nilai`, `keterangan`) VALUES
(1, 'C2', '5', 'Jumlah Ketidakhadiran 0-2'),
(2, 'C2', '4', 'Jumlah Ketidakhadiran 3-5'),
(3, 'C2', '3', 'Jumlah Ketidakhadiran 6-8'),
(4, 'C2', '2', 'Jumlah Ketidakhadiran 9-10'),
(6, 'C2', '1', 'Jumlah Ketidakhadiran 11 - 15'),
(7, 'C3', '5', 'Sangat Baik'),
(8, 'C3', '4', 'Baik'),
(9, 'C3', '3', 'Cukup'),
(10, 'C3', '2', 'Kurang'),
(11, 'C3', '1', 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$hvZJCXwzIVyZQdJAsvX48ujBR8kRJhfHcK0PamxMH9I.m5gC8M6O2', 'admin'),
(2, 'kepalasekolah', '$2y$10$ynQT5t.m7RDTvNQz9A.XX.2DHknksDsxfsED.8TXpMjZXj1fkXYYu', 'kepalasekolah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode_hasil`),
  ADD KEY `hasil_siswa` (`nis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `nilai_siswa` (`kode_kriteria`),
  ADD KEY `nilai_siswa2` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas_siswa` (`kode_kelas`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kode_subkriteria`),
  ADD KEY `kriterianya` (`kode_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kode_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kode_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_siswa` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_siswa2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `kelas_siswa` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `kriterianya` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
