-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 08:36 PM
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
('KLS001', 'Kelas 1'),
('KLS002', 'Kelas 2'),
('KLS003', 'Kelas 3'),
('KLS004', 'Kelas 4'),
('KLS005', 'Kelas 5'),
('KLS006', 'Kelas 6'),
('xKLS006', 'Kelas 21');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(64) NOT NULL,
  `sifat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `sifat`) VALUES
('KRT001', 'Nilai Raport', 'Benefit'),
('KRT002', 'Absensi', 'Cost'),
('KRT003', 'Sikap', 'Benefit'),
('KRT004', 'Prestasi Ekstrakulikuler', 'Benefit');

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
('990126103545', 'Hartana Perkasa Sitompul', 'laki-laki', 'Jr. Jayawijaya No. 398', 'Batu', '2007-10-23', NULL, 'KLS002'),
('990142555462', 'Gandewa Sitorus', 'perempuan', 'Jln. Badak No. 450', 'Probolinggo', '2010-07-31', NULL, 'KLS001'),
('990154873598', 'Winda Nurul Prastuti M.M.', 'laki-laki', 'Kpg. Perintis Kemerdekaan No. 634', 'Administrasi Jakarta Barat', '2014-05-19', NULL, 'KLS004'),
('990178554693', 'Ajimin Jailani', 'laki-laki', 'Jr. Gatot Subroto No. 405', 'Tarakan', '2010-01-28', NULL, 'KLS005'),
('990236365204', 'Cinthia Paris Maryati', 'laki-laki', 'Dk. Industri No. 586', 'Medan', '2004-07-20', NULL, 'KLS005'),
('990271951857', 'Ilsa Prastuti', 'perempuan', 'Ki. Baing No. 498', 'Tarakan', '1992-01-28', NULL, 'KLS005'),
('990310058857', 'Halima Winarsih', 'laki-laki', 'Ds. Yos Sudarso No. 42', 'Cilegon', '2000-01-15', NULL, 'KLS004'),
('990346882582', 'Salimah Suartini', 'perempuan', 'Psr. Adisucipto No. 528', 'Pekalongan', '1988-10-14', NULL, 'KLS003'),
('990445322659', 'Siska Nurdiyanti', 'perempuan', 'Ds. Industri No. 907', 'Kotamobagu', '2014-10-03', NULL, 'KLS004'),
('990493086269', 'Dodo Karma Sitorus M.TI.', 'perempuan', 'Jln. Abdul. Muis No. 724', 'Batu', '2017-03-26', NULL, 'KLS005'),
('990509170319', 'Maimunah Victoria Pertiwi', 'laki-laki', 'Jln. Muwardi No. 650', 'Padang', '1981-03-31', NULL, 'KLS001'),
('990599683830', 'Galur Setiawan S.Gz', 'perempuan', 'Jr. Muwardi No. 160', 'Sorong', '2016-05-02', NULL, 'KLS003'),
('990662377028', 'Cinta Usada', 'laki-laki', 'Gg. Acordion No. 524', 'Tanjung Pinang', '1995-05-24', NULL, 'KLS002'),
('990722821450', 'Kezia Ulva Suartini M.M.', 'laki-laki', 'Ki. Achmad No. 565', 'Bau-Bau', '2021-09-30', NULL, 'KLS003'),
('990735227276', 'Cindy Siti Nurdiyanti', 'perempuan', 'Ds. Villa No. 500', 'Administrasi Jakarta Timur', '1990-01-06', NULL, 'KLS004'),
('990742358728', 'Kasiyah Iriana Purnawati S.IP', 'laki-laki', 'Dk. Yosodipuro No. 438', 'Samarinda', '1994-07-20', NULL, 'KLS003'),
('990769455699', 'Ciaobella Permata S.Sos', 'perempuan', 'Psr. Kyai Mojo No. 408', 'Semarang', '2008-09-20', NULL, 'KLS004'),
('990823882797', 'Ida Anita Padmasari S.E.', 'perempuan', 'Jln. Moch. Yamin No. 940', 'Denpasar', '2010-01-28', NULL, 'KLS001'),
('990855534129', 'Talia Nuraini', 'perempuan', 'Ds. Sunaryo No. 497', 'Singkawang', '1980-02-29', NULL, 'KLS005'),
('990869785296', 'Muni Jarwa Saefullah', 'perempuan', 'Psr. Astana Anyar No. 95', 'Administrasi Jakarta Timur', '1987-12-05', NULL, 'KLS005'),
('991003034758', 'Titin Suartini', 'perempuan', 'Dk. Babakan No. 496', 'Administrasi Jakarta Barat', '1979-07-07', NULL, 'KLS006'),
('991030740158', 'Endra Iswahyudi', 'laki-laki', 'Kpg. Madiun No. 411', 'Surakarta', '2010-08-27', NULL, 'KLS003'),
('991066940151', 'Cinthia Yulia Novitasari M.TI.', 'perempuan', 'Dk. Kebonjati No. 337', 'Pagar Alam', '1978-05-14', NULL, 'KLS001'),
('991087121344', 'Zizi Purnawati S.Pt', 'laki-laki', 'Ds. Baing No. 735', 'Pangkal Pinang', '1989-10-26', NULL, 'KLS004'),
('991109322672', 'Halim Abyasa Jailani M.Pd', 'perempuan', 'Kpg. Agus Salim No. 55', 'Tanjungbalai', '1976-10-31', NULL, 'KLS002'),
('991180324807', 'Dadap Permadi', 'laki-laki', 'Jln. Dr. Junjunan No. 229', 'Jayapura', '2016-01-10', NULL, 'KLS006'),
('991219652456', 'Titi Vanya Mayasari S.Pd', 'perempuan', 'Ki. Bakti No. 97', 'Magelang', '1998-09-20', NULL, 'KLS002'),
('991245021198', 'Almira Sari Mandasari S.Farm', 'laki-laki', 'Gg. Merdeka No. 619', 'Langsa', '1972-02-01', NULL, 'KLS006'),
('991245949793', 'Balamantri Tampubolon S.H.', 'laki-laki', 'Kpg. Baja No. 712', 'Jayapura', '1982-02-20', NULL, 'KLS006'),
('991259484091', 'Syahrini Tari Wulandari', 'perempuan', 'Kpg. Untung Suropati No. 320', 'Mojokerto', '2007-08-31', NULL, 'KLS005'),
('991265646054', 'Elvin Iswahyudi S.Ked', 'laki-laki', 'Jr. Cokroaminoto No. 294', 'Serang', '1995-01-30', NULL, 'KLS006'),
('991276808455', 'Rahmi Maimunah Yuliarti', 'laki-laki', 'Kpg. Sentot Alibasa No. 10', 'Palembang', '1985-11-29', NULL, 'KLS006'),
('991293211068', 'Heryanto Latif Mangunsong S.Sos', 'laki-laki', 'Kpg. W.R. Supratman No. 182', 'Lubuklinggau', '1973-04-18', NULL, 'KLS003'),
('991307618650', 'Viktor Chandra Santoso', 'laki-laki', 'Psr. Nanas No. 421', 'Padang', '2007-05-13', NULL, 'KLS002'),
('991322706733', 'Nasim Sihombing', 'laki-laki', 'Jr. Labu No. 270', 'Cirebon', '1995-08-04', NULL, 'KLS002'),
('991414787215', 'Patricia Sarah Kuswandari S.I.Kom', 'perempuan', 'Ki. Gajah No. 564', 'Bekasi', '1975-01-24', NULL, 'KLS002'),
('991415044763', 'Aditya Pradana S.Sos', 'perempuan', 'Dk. Basmol Raya No. 345', 'Kotamobagu', '2016-07-28', NULL, 'KLS005'),
('991426982392', 'Laila Nurul Aryani S.Pd', 'laki-laki', 'Kpg. Tentara Pelajar No. 708', 'Palu', '2017-01-23', NULL, 'KLS002'),
('991503731572', 'Zahra Palastri', 'laki-laki', 'Kpg. Bappenas No. 437', 'Tomohon', '2015-01-19', NULL, 'KLS006'),
('991579456673', 'Upik Anggriawan', 'perempuan', 'Gg. Bata Putih No. 47', 'Administrasi Jakarta Selatan', '1978-10-04', NULL, 'KLS004'),
('991581539542', 'Zulfa Agustina', 'perempuan', 'Gg. Honggowongso No. 846', 'Metro', '1986-12-12', NULL, 'KLS002'),
('991598091683', 'Ivan Wibisono', 'laki-laki', 'Psr. Baha No. 61', 'Medan', '1980-03-23', NULL, 'KLS004'),
('991616465969', 'Widya Namaga', 'laki-laki', 'Kpg. Bakhita No. 776', 'Banjarbaru', '1970-07-05', NULL, 'KLS002'),
('991675346512', 'Faizah Maida Uyainah S.Kom', 'laki-laki', 'Ds. Sunaryo No. 925', 'Tomohon', '1992-07-04', NULL, 'KLS002'),
('991701151006', 'Puspa Sakura Susanti S.I.Kom', 'laki-laki', 'Psr. Suharso No. 825', 'Ternate', '1986-09-30', NULL, 'KLS004'),
('991704139465', 'Panji Waskita', 'laki-laki', 'Ki. Yap Tjwan Bing No. 387', 'Tasikmalaya', '1974-02-06', NULL, 'KLS002'),
('991773454382', 'Amalia Paulin Riyanti S.Pd', 'laki-laki', 'Dk. Hang No. 803', 'Ternate', '2011-03-05', NULL, 'KLS001'),
('991794672627', 'Malika Silvia Wijayanti S.Farm', 'laki-laki', 'Gg. Asia Afrika No. 869', 'Sabang', '2010-04-26', NULL, 'KLS002'),
('991803251710', 'Budi Irawan', 'laki-laki', 'Ds. Taman No. 966', 'Tual', '2012-09-19', NULL, 'KLS006'),
('991827921997', 'Farhunnisa Winda Riyanti S.E.', 'laki-laki', 'Gg. Sampangan No. 424', 'Balikpapan', '1970-12-09', NULL, 'KLS004'),
('991853384318', 'Padmi Permata M.Kom.', 'perempuan', 'Gg. Cihampelas No. 199', 'Batu', '1987-07-24', NULL, 'KLS001'),
('991933620059', 'Jamal Raharja Ramadan S.E.I', 'laki-laki', 'Dk. Bhayangkara No. 277', 'Lhokseumawe', '1996-01-30', NULL, 'KLS005'),
('991938404197', 'Gamanto Wawan Latupono S.Farm', 'laki-laki', 'Dk. Hasanuddin No. 450', 'Gorontalo', '2015-03-03', NULL, 'KLS003'),
('991989098551', 'Ajimat Uwais', 'perempuan', 'Psr. Daan No. 323', 'Bukittinggi', '2007-11-15', NULL, 'KLS006'),
('992047684421', 'Ellis Permata', 'perempuan', 'Jr. Basoka Raya No. 368', 'Lubuklinggau', '1982-03-10', NULL, 'KLS005'),
('992056019744', 'Latika Winda Laksita M.M.', 'laki-laki', 'Ds. Imam No. 396', 'Tidore Kepulauan', '1977-12-11', NULL, 'KLS001'),
('992080681090', 'Intan Vivi Widiastuti M.Pd', 'perempuan', 'Gg. Haji No. 427', 'Sawahlunto', '1973-08-19', NULL, 'KLS003'),
('992226535036', 'Fitriani Salsabila Mayasari S.Psi', 'laki-laki', 'Jr. Wahidin No. 532', 'Batam', '1973-03-01', NULL, 'KLS003'),
('992250118237', 'Cemeti Sihombing M.Ak', 'perempuan', 'Kpg. Rajawali Timur No. 438', 'Gunungsitoli', '2022-02-23', NULL, 'KLS002'),
('992272060307', 'Asirwada Hutagalung S.T.', 'laki-laki', 'Kpg. Bass No. 975', 'Jayapura', '2003-12-03', NULL, 'KLS004'),
('992292192268', 'Fitria Zulaika S.Psi', 'perempuan', 'Kpg. Wahid Hasyim No. 926', 'Sorong', '2011-09-30', NULL, 'KLS003'),
('992294081654', 'Danuja Prayoga M.Farm', 'laki-laki', 'Dk. Suniaraja No. 498', 'Tangerang', '1994-06-18', NULL, 'KLS002'),
('992324380943', 'Asmadi Murti Habibi', 'perempuan', 'Ki. Baan No. 607', 'Pontianak', '1994-03-05', NULL, 'KLS004'),
('992343366037', 'Darijan Mansur', 'laki-laki', 'Jln. Sudiarto No. 726', 'Tual', '1981-03-30', NULL, 'KLS005'),
('992409032869', 'Adiarja Arta Pranowo', 'laki-laki', 'Dk. Bank Dagang Negara No. 885', 'Batu', '1973-05-25', NULL, 'KLS002'),
('992420036449', 'Budi Natsir', 'laki-laki', 'Jr. Padma No. 137', 'Cirebon', '1990-08-27', NULL, 'KLS004'),
('992595764904', 'Mahfud Iswahyudi', 'perempuan', 'Psr. Acordion No. 562', 'Tasikmalaya', '2013-09-24', NULL, 'KLS001'),
('992631142584', 'Najwa Uyainah', 'laki-laki', 'Gg. Dr. Junjunan No. 943', 'Samarinda', '1972-01-08', NULL, 'KLS003'),
('992667552116', 'Dian Yuniar', 'laki-laki', 'Ds. BKR No. 326', 'Tangerang Selatan', '1999-01-29', NULL, 'KLS005'),
('992727318813', 'Bagya Maheswara', 'laki-laki', 'Psr. Basoka No. 222', 'Gorontalo', '2014-07-14', NULL, 'KLS003'),
('992747987974', 'Ani Pudjiastuti', 'laki-laki', 'Jln. Sutarto No. 688', 'Tasikmalaya', '1992-12-16', NULL, 'KLS002'),
('992759843038', 'Bakijan Kuswoyo', 'perempuan', 'Kpg. Ir. H. Juanda No. 492', 'Batu', '1982-09-05', NULL, 'KLS005'),
('992812311203', 'Ilsa Riyanti S.E.', 'laki-laki', 'Ki. Surapati No. 151', 'Kupang', '1975-04-24', NULL, 'KLS003'),
('992835526975', 'Cager Nashiruddin S.T.', 'perempuan', 'Gg. Ciumbuleuit No. 442', 'Balikpapan', '1975-10-07', NULL, 'KLS005'),
('992841223294', 'Balamantri Marbun', 'perempuan', 'Ds. Wahidin No. 586', 'Sawahlunto', '1985-07-20', NULL, 'KLS003'),
('992867368054', 'Kamila Winarsih S.T.', 'perempuan', 'Gg. Imam Bonjol No. 411', 'Padangpanjang', '2009-08-21', NULL, 'KLS005'),
('992892203408', 'Limar Lazuardi', 'perempuan', 'Ds. Dahlia No. 820', 'Denpasar', '2019-01-26', NULL, 'KLS005'),
('992989173912', 'Unjani Permata', 'laki-laki', 'Ds. M.T. Haryono No. 607', 'Administrasi Jakarta Timur', '1995-01-10', NULL, 'KLS003'),
('993009569596', 'Yuliana Ifa Pertiwi S.H.', 'perempuan', 'Ds. Gading No. 392', 'Denpasar', '2019-05-22', NULL, 'KLS002'),
('993090962141', 'Yahya Suryono', 'perempuan', 'Ki. Diponegoro No. 822', 'Palopo', '1985-08-11', NULL, 'KLS006'),
('993092056228', 'Olga Artanto Dabukke', 'laki-laki', 'Dk. Mahakam No. 530', 'Sawahlunto', '1970-07-01', NULL, 'KLS001'),
('993148812114', 'Ulya Zulaika', 'laki-laki', 'Ds. Suryo Pranoto No. 533', 'Probolinggo', '2004-07-29', NULL, 'KLS004'),
('993217561034', 'Tirta Latif Uwais S.Kom', 'laki-laki', 'Gg. Soekarno Hatta No. 489', 'Bitung', '1982-09-22', NULL, 'KLS006'),
('993234740884', 'Ira Fitria Fujiati', 'perempuan', 'Ds. R.M. Said No. 951', 'Pagar Alam', '1976-02-27', NULL, 'KLS004'),
('993277096002', 'Kenes Among Mustofa', 'laki-laki', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 169', 'Pagar Alam', '1984-04-11', NULL, 'KLS006'),
('993449060195', 'Irwan Prakasa S.IP', 'laki-laki', 'Jln. Flora No. 239', 'Surabaya', '1997-03-01', NULL, 'KLS004'),
('993473132854', 'Virman Saputra M.Kom.', 'perempuan', 'Kpg. Arifin No. 387', 'Palembang', '1973-05-20', NULL, 'KLS005'),
('993542200817', 'Reksa Siregar', 'perempuan', 'Dk. Basket No. 708', 'Dumai', '1985-10-05', NULL, 'KLS002'),
('993629587315', 'Opan Hasan Pradipta S.Ked', 'perempuan', 'Jln. Sutami No. 566', 'Bandung', '1982-12-21', NULL, 'KLS004'),
('993688730383', 'Estiawan Najmudin', 'perempuan', 'Jr. Sam Ratulangi No. 977', 'Banjarmasin', '1983-12-14', NULL, 'KLS006'),
('993813353079', 'Prayogo Wage Anggriawan', 'laki-laki', 'Jln. Yogyakarta No. 759', 'Surakarta', '1999-02-13', NULL, 'KLS004'),
('993827108307', 'Kiandra Mila Prastuti', 'laki-laki', 'Jln. Bambon No. 47', 'Tomohon', '2019-05-19', NULL, 'KLS003'),
('993836982839', 'Bakidin Siregar', 'perempuan', 'Jln. Daan No. 434', 'Tanjung Pinang', '1970-01-11', NULL, 'KLS002'),
('993913963346', 'Victoria Sakura Farida', 'perempuan', 'Dk. Dr. Junjunan No. 871', 'Bontang', '1998-07-31', NULL, 'KLS005'),
('993921318417', 'Wulan Sudiati', 'laki-laki', 'Ki. Warga No. 419', 'Banda Aceh', '2008-01-30', NULL, 'KLS003'),
('993938083760', 'Unjani Tania Nurdiyanti S.Sos', 'perempuan', 'Ds. Orang No. 341', 'Pariaman', '1987-05-05', NULL, 'KLS003'),
('994086482001', 'Wulan Kiandra Namaga S.Kom', 'laki-laki', 'Psr. Abdul Muis No. 689', 'Sorong', '2013-06-29', NULL, 'KLS003'),
('994310550194', 'Cindy Mayasari', 'laki-laki', 'Ki. Pacuan Kuda No. 570', 'Bitung', '2004-06-21', NULL, 'KLS005'),
('994332784453', 'Tami Latika Wastuti M.M.', 'perempuan', 'Gg. Radio No. 496', 'Banjarmasin', '1991-12-12', NULL, 'KLS002'),
('994567290640', 'Manah Irawan', 'perempuan', 'Psr. Ujung No. 831', 'Bau-Bau', '1971-12-01', NULL, 'KLS002'),
('994595799994', 'Rama Sitompul', 'laki-laki', 'Ki. Thamrin No. 836', 'Pagar Alam', '2005-02-13', NULL, 'KLS002'),
('994601665469', 'Ida Zulaika S.E.I', 'laki-laki', 'Jr. Sugiono No. 93', 'Prabumulih', '1976-05-11', NULL, 'KLS004'),
('994616562677', 'Naradi Sihombing', 'laki-laki', 'Ki. Imam Bonjol No. 551', 'Pangkal Pinang', '1988-07-10', NULL, 'KLS006'),
('994639618895', 'Naradi Maulana', 'perempuan', 'Gg. Untung Suropati No. 991', 'Tangerang Selatan', '1995-01-21', NULL, 'KLS006'),
('994689701240', 'Wadi Dwi Kusumo S.IP', 'perempuan', 'Ds. Babah No. 145', 'Serang', '1972-04-09', NULL, 'KLS001'),
('994734145223', 'Raden Saefullah', 'perempuan', 'Jr. Agus Salim No. 185', 'Malang', '1990-01-11', NULL, 'KLS004'),
('994805850731', 'Sakura Gina Riyanti', 'laki-laki', 'Psr. Industri No. 197', 'Lhokseumawe', '1982-11-07', NULL, 'KLS002'),
('994878359312', 'Kamaria Agustina', 'perempuan', 'Jr. Abdullah No. 888', 'Bontang', '1995-04-12', NULL, 'KLS006'),
('994909896453', 'Janet Nurdiyanti', 'perempuan', 'Kpg. Gambang No. 233', 'Palembang', '1988-01-13', NULL, 'KLS001'),
('994918771660', 'Kemal Irawan', 'perempuan', 'Ds. Aceh No. 187', 'Banjarmasin', '1977-11-05', NULL, 'KLS006'),
('994959813596', 'Yessi Maryati', 'perempuan', 'Jln. Salatiga No. 544', 'Payakumbuh', '1991-12-22', NULL, 'KLS001'),
('994962266523', 'Melinda Hastuti', 'laki-laki', 'Ki. Kebangkitan Nasional No. 414', 'Padangsidempuan', '2021-04-24', NULL, 'KLS003'),
('994995085127', 'Mahmud Yoga Nababan', 'perempuan', 'Jr. Baan No. 207', 'Kupang', '1998-07-30', NULL, 'KLS002'),
('995029437698', 'Dipa Labuh Wasita', 'laki-laki', 'Psr. Baranang Siang No. 87', 'Sawahlunto', '1994-07-16', NULL, 'KLS001'),
('995061294194', 'Vanesa Riyanti', 'laki-laki', 'Jln. Suharso No. 726', 'Administrasi Jakarta Selatan', '1977-04-11', NULL, 'KLS003'),
('995124404568', 'Karma Daruna Manullang M.Kom.', 'perempuan', 'Jln. Barat No. 668', 'Parepare', '2004-05-31', NULL, 'KLS001'),
('995162361067', 'Faizah Farah Usamah S.I.Kom', 'perempuan', 'Ki. Tentara Pelajar No. 683', 'Malang', '2010-04-20', NULL, 'KLS002'),
('995255950765', 'Johan Umay Pranowo S.Farm', 'laki-laki', 'Jr. BKR No. 43', 'Pangkal Pinang', '2016-01-27', NULL, 'KLS002'),
('995369120766', 'Perkasa Kamal Manullang M.TI.', 'perempuan', 'Ki. Abdul. Muis No. 306', 'Jayapura', '2005-11-18', NULL, 'KLS004'),
('995376779198', 'Eko Uda Tampubolon', 'perempuan', 'Ki. Babah No. 434', 'Balikpapan', '2014-05-06', NULL, 'KLS001'),
('995385136663', 'Elvin Sitorus', 'perempuan', 'Ds. Cikutra Barat No. 275', 'Tangerang', '1977-03-25', NULL, 'KLS005'),
('995441845110', 'Marwata Marbun', 'perempuan', 'Jr. Bagas Pati No. 271', 'Kotamobagu', '2017-08-08', NULL, 'KLS002'),
('995479987374', 'Silvia Fitria Farida', 'laki-laki', 'Jr. Salak No. 271', 'Mojokerto', '2009-06-30', NULL, 'KLS001'),
('995636107766', 'Kani Ika Safitri S.Sos', 'perempuan', 'Psr. Kyai Gede No. 411', 'Metro', '2010-12-29', NULL, 'KLS004'),
('995643457757', 'Caraka Widodo', 'laki-laki', 'Ds. Raya Ujungberung No. 813', 'Kupang', '2001-07-03', NULL, 'KLS002'),
('995714684674', 'Rini Astuti M.Kom.', 'laki-laki', 'Ki. Baha No. 823', 'Batu', '1993-10-14', NULL, 'KLS001'),
('995777812681', 'Zelaya Uyainah', 'laki-laki', 'Ki. Bak Air No. 907', 'Sorong', '1978-04-06', NULL, 'KLS004'),
('995830413311', 'Najwa Hafshah Padmasari S.Kom', 'perempuan', 'Jr. Jambu No. 643', 'Lhokseumawe', '2021-02-27', NULL, 'KLS003'),
('995881249523', 'Irma Melinda Safitri S.Sos', 'perempuan', 'Dk. Radio No. 574', 'Bandar Lampung', '1992-04-09', NULL, 'KLS004'),
('995898862938', 'Ana Handayani S.Gz', 'perempuan', 'Jln. S. Parman No. 427', 'Mataram', '1987-01-12', NULL, 'KLS004'),
('996047787598', 'Latif Budi Kuswoyo S.Farm', 'laki-laki', 'Kpg. Barasak No. 920', 'Batu', '2008-08-17', NULL, 'KLS002'),
('996063103935', 'Rahmi Pudjiastuti', 'perempuan', 'Ki. Sutan Syahrir No. 395', 'Gunungsitoli', '1979-01-24', NULL, 'KLS002'),
('996117986563', 'Mala Pratiwi', 'perempuan', 'Ki. Nangka No. 390', 'Probolinggo', '2010-02-14', NULL, 'KLS002'),
('996149942092', 'Betania Hassanah', 'laki-laki', 'Psr. Gremet No. 874', 'Pontianak', '1977-07-18', NULL, 'KLS005'),
('996180214478', 'Kamal Zulkarnain M.Kom.', 'laki-laki', 'Dk. Bagis Utama No. 652', 'Administrasi Jakarta Utara', '1991-04-10', NULL, 'KLS006'),
('996215967272', 'Galak Wibowo', 'laki-laki', 'Ki. Ronggowarsito No. 743', 'Padangpanjang', '1975-12-30', NULL, 'KLS004'),
('996259043692', 'Karma Cecep Marbun M.Kom.', 'perempuan', 'Ds. Bagonwoto  No. 939', 'Bandar Lampung', '2010-12-30', NULL, 'KLS002'),
('996297190647', 'Betania Zaenab Rahmawati', 'perempuan', 'Ds. Casablanca No. 723', 'Pasuruan', '1982-02-26', NULL, 'KLS001'),
('996352018031', 'Nadine Pratiwi S.E.', 'laki-laki', 'Kpg. Jend. Sudirman No. 495', 'Jambi', '2012-04-10', NULL, 'KLS005'),
('996412652921', 'Aditya Kuswoyo M.Ak', 'perempuan', 'Ki. Labu No. 235', 'Padangpanjang', '1999-09-10', NULL, 'KLS004'),
('996435272595', 'Marsito Ardianto', 'perempuan', 'Jln. Barat No. 837', 'Jambi', '2019-07-16', NULL, 'KLS004'),
('996439491348', 'Prabowo Jailani', 'perempuan', 'Ki. Sutarjo No. 77', 'Banda Aceh', '1980-05-04', NULL, 'KLS003'),
('996501637266', 'Dalimin Manullang', 'perempuan', 'Jr. Astana Anyar No. 204', 'Jambi', '1990-02-23', NULL, 'KLS003'),
('996565607761', 'Banawa Darimin Salahudin', 'laki-laki', 'Psr. Bass No. 198', 'Tegal', '2017-02-06', NULL, 'KLS001'),
('996581285858', 'Sabri Saptono', 'perempuan', 'Dk. Yoga No. 246', 'Padangsidempuan', '2023-06-16', NULL, 'KLS001'),
('996893867476', 'Luthfi Adriansyah', 'laki-laki', 'Ki. Taman No. 637', 'Pekanbaru', '1989-03-30', NULL, 'KLS001'),
('996915839640', 'Titin Yuniar', 'laki-laki', 'Gg. Babah No. 929', 'Metro', '1991-07-21', NULL, 'KLS005'),
('996926606361', 'Oskar Pradana S.Psi', 'perempuan', 'Jln. Bahagia No. 972', 'Padangsidempuan', '1979-07-05', NULL, 'KLS004'),
('996993525384', 'Danuja Prabowo S.Pd', 'perempuan', 'Jr. Kiaracondong No. 962', 'Makassar', '1998-05-05', NULL, 'KLS004'),
('996994018462', 'Calista Maryati', 'perempuan', 'Gg. Padang No. 850', 'Cirebon', '2000-11-15', NULL, 'KLS001'),
('997003116665', 'Adikara Jaeman Tampubolon', 'perempuan', 'Jln. Pahlawan No. 110', 'Bau-Bau', '1994-10-09', NULL, 'KLS004'),
('997140182086', 'Nadia Nuraini', 'laki-laki', 'Jr. Kyai Mojo No. 947', 'Binjai', '2005-11-12', NULL, 'KLS002'),
('997244506977', 'Gawati Andriani', 'laki-laki', 'Kpg. Bacang No. 370', 'Sabang', '2010-04-13', NULL, 'KLS005'),
('997259416996', 'Raisa Laras Fujiati S.I.Kom', 'laki-laki', 'Jln. Gremet No. 174', 'Cilegon', '2020-06-02', NULL, 'KLS004'),
('997335742555', 'Galuh Haryanto', 'perempuan', 'Dk. Salatiga No. 447', 'Ternate', '1979-09-16', NULL, 'KLS005'),
('997362534319', 'Mala Rahimah', 'laki-laki', 'Ds. Sadang Serang No. 358', 'Langsa', '2000-02-14', NULL, 'KLS003'),
('997369346979', 'Sari Puti Sudiati', 'laki-laki', 'Dk. W.R. Supratman No. 124', 'Semarang', '2001-11-15', NULL, 'KLS003'),
('997547991325', 'Nasim Samosir', 'laki-laki', 'Kpg. Daan No. 16', 'Malang', '1976-09-18', NULL, 'KLS006'),
('998110305095', 'Suci Belinda Hartati', 'laki-laki', 'Jr. Dewi Sartika No. 846', 'Bengkulu', '1988-10-15', NULL, 'KLS006'),
('998133491452', 'Harsana Prayogo Setiawan S.E.I', 'perempuan', 'Psr. R.E. Martadinata No. 575', 'Padangpanjang', '2020-07-27', NULL, 'KLS001'),
('998188336723', 'Raden Najmudin', 'perempuan', 'Gg. Madrasah No. 54', 'Banda Aceh', '2008-03-19', NULL, 'KLS001'),
('998371169695', 'Martani Lazuardi M.Ak', 'perempuan', 'Dk. Bata Putih No. 687', 'Manado', '1988-07-06', NULL, 'KLS003'),
('998460209492', 'Banawa Wijaya S.Gz', 'perempuan', 'Ds. Flora No. 433', 'Mataram', '1988-05-08', NULL, 'KLS003'),
('998520162056', 'Wawan Nugroho M.TI.', 'laki-laki', 'Gg. Babadan No. 662', 'Bontang', '1980-10-13', NULL, 'KLS003'),
('998556943065', 'Kurnia Asman Januar S.Ked', 'laki-laki', 'Ds. Bah Jaya No. 780', 'Batam', '2022-05-20', NULL, 'KLS003'),
('998561861774', 'Daliono Sirait', 'laki-laki', 'Kpg. Salam No. 915', 'Padang', '2001-10-02', NULL, 'KLS004'),
('998645413632', 'Dinda Patricia Purwanti', 'perempuan', 'Kpg. Bayam No. 513', 'Salatiga', '2007-04-02', NULL, 'KLS002'),
('998793190225', 'Syahrini Novi Pertiwi M.Kom.', 'laki-laki', 'Gg. Dr. Junjunan No. 996', 'Dumai', '1990-11-30', NULL, 'KLS003'),
('998805323153', 'Anom Tasdik Prabowo', 'perempuan', 'Ki. Bayam No. 382', 'Malang', '2021-05-24', NULL, 'KLS004'),
('998806393663', 'Pandu Marpaung S.Pt', 'laki-laki', 'Kpg. Dewi Sartika No. 672', 'Kediri', '1984-03-14', NULL, 'KLS001'),
('998874019761', 'Ira Wulandari S.E.I', 'perempuan', 'Jr. Sutami No. 311', 'Pasuruan', '1982-02-28', NULL, 'KLS002'),
('998919889244', 'Zizi Wahyuni S.Pd', 'perempuan', 'Psr. Radio No. 763', 'Jayapura', '2009-06-05', NULL, 'KLS006'),
('998958375385', 'Cemeti Sitompul', 'laki-laki', 'Psr. Babakan No. 701', 'Tangerang', '2005-11-16', NULL, 'KLS002'),
('998982768445', 'Dimaz Caket Budiyanto S.Farm', 'laki-laki', 'Jr. Ki Hajar Dewantara No. 722', 'Pekalongan', '2011-05-27', NULL, 'KLS005'),
('999026281776', 'Anita Palastri', 'laki-laki', 'Ki. Lada No. 446', 'Tidore Kepulauan', '1995-09-20', NULL, 'KLS001'),
('999041945671', 'Nadia Wulandari', 'laki-laki', 'Jln. Aceh No. 484', 'Semarang', '1992-07-03', NULL, 'KLS003'),
('999150796554', 'Ophelia Puspasari', 'perempuan', 'Gg. Sukabumi No. 424', 'Batu', '2015-02-01', NULL, 'KLS001'),
('999254913831', 'Janet Tantri Suartini S.E.I', 'perempuan', 'Jr. B.Agam Dlm No. 56', 'Pekanbaru', '1979-03-03', NULL, 'KLS005'),
('999422596508', 'Hafshah Hasanah', 'laki-laki', 'Ki. Jamika No. 343', 'Surakarta', '2020-10-17', NULL, 'KLS003'),
('999436522320', 'Atmaja Nugraha Gunawan S.E.', 'perempuan', 'Dk. Supono No. 24', 'Subulussalam', '2020-06-26', NULL, 'KLS003'),
('999454533352', 'Irwan Jagaraga Sitorus', 'perempuan', 'Gg. Karel S. Tubun No. 595', 'Bandar Lampung', '1971-08-04', NULL, 'KLS006'),
('999502503973', 'Gangsar Nababan', 'perempuan', 'Kpg. Karel S. Tubun No. 272', 'Tomohon', '1992-06-10', NULL, 'KLS001'),
('999520067088', 'Irwan Firgantoro', 'perempuan', 'Gg. Bakau Griya Utama No. 155', 'Bandar Lampung', '2011-06-02', NULL, 'KLS001'),
('999530094774', 'Harsaya Marpaung', 'perempuan', 'Gg. Yoga No. 501', 'Langsa', '2003-11-10', NULL, 'KLS003'),
('999566202274', 'Harimurti Marsito Kurniawan', 'perempuan', 'Gg. Jayawijaya No. 73', 'Palangka Raya', '1970-03-17', NULL, 'KLS005'),
('999595080883', 'Safina Andriani', 'perempuan', 'Dk. Jend. A. Yani No. 880', 'Pangkal Pinang', '2013-01-13', NULL, 'KLS003'),
('999598026435', 'Dodo Salahudin', 'laki-laki', 'Jln. Wahidin No. 648', 'Administrasi Jakarta Selatan', '2011-09-19', NULL, 'KLS003'),
('999600873965', 'Virman Wahyudin S.Ked', 'laki-laki', 'Ki. Agus Salim No. 346', 'Bogor', '1996-02-22', NULL, 'KLS002'),
('999607935098', 'Gangsa Himawan Samosir', 'perempuan', 'Ki. Dewi Sartika No. 245', 'Banjar', '2004-04-02', NULL, 'KLS002'),
('999634578784', 'Cengkir Pratama', 'perempuan', 'Gg. Suryo Pranoto No. 163', 'Tebing Tinggi', '1970-04-12', NULL, 'KLS001'),
('999638857601', 'Lintang Mayasari', 'perempuan', 'Jln. Rajiman No. 656', 'Denpasar', '2020-08-30', NULL, 'KLS005'),
('999688363117', 'Salman Mumpuni Damanik', 'laki-laki', 'Jln. Kyai Mojo No. 65', 'Cirebon', '1971-08-21', NULL, 'KLS005'),
('999770073496', 'Okto Hidayat', 'laki-laki', 'Ds. Veteran No. 4', 'Sungai Penuh', '2002-11-26', NULL, 'KLS001'),
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
  `nilai` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kode_subkriteria`, `kode_kriteria`, `nilai`, `keterangan`) VALUES
(1, 'KRT002', 5, 'Jumlah Ketidakhadiran 0-2'),
(2, 'KRT002', 4, 'Jumlah Ketidakhadiran 3-5'),
(3, 'KRT002', 3, 'Jumlah Ketidakhadiran 6-8'),
(4, 'KRT002', 2, 'Jumlah Ketidakhadiran 9-10'),
(6, 'KRT002', 1, 'Jumlah Ketidakhadiran > 10'),
(7, 'KRT003', 5, 'Sangat Baik'),
(8, 'KRT003', 4, 'Baik'),
(9, 'KRT003', 3, 'Cukup'),
(10, 'KRT003', 2, 'Kurang'),
(11, 'KRT003', 1, 'Sangat Kurang');

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
(1, 'admin', '$2y$10$hvZJCXwzIVyZQdJAsvX48ujBR8kRJhfHcK0PamxMH9I.m5gC8M6O2', 'admin');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kode_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
