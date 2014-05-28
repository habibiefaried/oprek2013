-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 23. Januari 2013 jam 05:40
-- Versi Server: 5.1.55
-- Versi PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=271 ;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(269, 1358885465, '180.245.253.60', '479264'),
(270, 1358886545, '114.79.13.130', '108852');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE IF NOT EXISTS `kehadiran` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `NIM` int(9) NOT NULL,
  `mentor` varchar(100) NOT NULL DEFAULT 'bambang',
  `hadir1in` int(2) NOT NULL DEFAULT '0',
  `hadir1out` int(2) NOT NULL DEFAULT '0',
  `hadir2in` int(2) NOT NULL DEFAULT '0',
  `hadir2out` int(2) NOT NULL DEFAULT '0',
  `hadir3in` int(2) NOT NULL DEFAULT '0',
  `hadir3out` int(2) NOT NULL DEFAULT '0',
  `hadir4in` int(2) NOT NULL DEFAULT '0',
  `hadir4out` int(2) NOT NULL DEFAULT '0',
  `hadir5in` int(2) NOT NULL DEFAULT '0',
  `hadir5out` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `NIM`, `mentor`, `hadir1in`, `hadir1out`, `hadir2in`, `hadir2out`, `hadir3in`, `hadir3out`, `hadir4in`, `hadir4out`, `hadir5in`, `hadir5out`) VALUES
(11, 13511069, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 18211030, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13511073, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 13511029, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 13511090, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 13511083, 'Iskandar Setiadi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 18011009, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 1, 'Habibie Faried', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 2, 'Habibie Faried', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 3, 'Iskandar Setiadi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 13511777, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 18211031, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 13511022, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 13511003, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 16712245, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 18211045, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 18211042, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 16012084, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 16312080, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 16312160, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 16512163, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 16912125, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 16512324, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 10210017, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 16512384, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 1111, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 16712052, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 16012243, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 16512124, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 16512040, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 16512153, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 16512192, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 13511094, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 16712115, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `Deadline1` date NOT NULL,
  `Deadline2` date NOT NULL,
  `Deadline3` date NOT NULL,
  `Deadline4` date NOT NULL,
  `Deadline5` date NOT NULL,
  `Deadline6` date NOT NULL,
  `Deadline7` date NOT NULL,
  `Deadline8` date NOT NULL,
  `Deadline9` date NOT NULL,
  `Deadline10` date NOT NULL,
  `Absen` varchar(100) NOT NULL,
  `id` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`Deadline1`, `Deadline2`, `Deadline3`, `Deadline4`, `Deadline5`, `Deadline6`, `Deadline7`, `Deadline8`, `Deadline9`, `Deadline10`, `Absen`, `id`) VALUES
('2013-02-07', '2013-01-01', '2013-01-15', '2013-01-16', '2013-01-19', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'hadir1in', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Nama_Lengkap` varchar(80) DEFAULT NULL,
  `Hape` varchar(20) NOT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `NIM` int(9) DEFAULT NULL,
  `Jurusan` varchar(40) DEFAULT NULL,
  `Password` varchar(40) DEFAULT NULL,
  `Alamat` text,
  `Peran` int(2) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Skor` int(10) NOT NULL DEFAULT '0',
  `Status` int(1) NOT NULL DEFAULT '0',
  `mentor` varchar(100) NOT NULL DEFAULT 'bambang',
  `divisi` varchar(5) NOT NULL DEFAULT 'galau',
  `Soal` varchar(500) NOT NULL DEFAULT '1',
  `SoalPasswd` varchar(200) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `Nama_Lengkap`, `Hape`, `Email`, `NIM`, `Jurusan`, `Password`, `Alamat`, `Peran`, `Foto`, `Skor`, `Status`, `mentor`, `divisi`, `Soal`, `SoalPasswd`) VALUES
(33, 'Habibie Faried', '08561435232', 'habibiefaried@gmail.com', 13511069, 'Teknik Informatika', 'a82b92bb5aaadc9a848cea8e97d34352', 'Jl. Pelesiran No.19', 1, 'http://oprek.arc.itb.ac.id/Foto/13511069.jpg', 0, 1, 'bambang', 'galau', '<legend>Tugas ke-3</legend>Ganteng', '123'),
(34, 'Andy Primawan', '085794437808', 'andyprimawan@gmail.com', 18211030, 'STI', '820b0d4850cdee4686b36706a3dd7ace', 'Cimahi', 1, 'http://oprek.arc.itb.ac.id/Foto/18211030.jpg', 0, 1, 'bambang', 'galau', '0', '0'),
(35, 'Iskandar Setiadi', '085697681829', 'iskandarsetiadi@students.itb.ac.id', 13511073, 'Teknik Informatika / STEI', '759797edcfc1b9061b2979501bd2f371', 'Jl. Tubagus Ismail VI No. 33', 1, 'http://oprek.arc.itb.ac.id/Foto/13511073.jpg', 0, 1, 'bambang', 'galau', '0', '0'),
(36, 'Sonny Lazuardi Hermawan', '02276274724', 'sonnylazuardi@s.itb.ac.id', 13511029, 'Teknik Informatika', '952da4af823fbb320140fb7fb0d02ecb', 'jl tanjugsari asri no 8 antapani', 1, 'http://oprek.arc.itb.ac.id/Foto/13511029.jpg', 0, 1, 'bambang', 'galau', '0', '0'),
(37, 'Pandu Kartika Putra', '085655837565', 'pandu.putra@students.itb.ac.id', 13511090, 'Teknik Informatika', 'd5969172fdcca41121fecae8063d6639', 'Jl. Sadang Tengah Gg. Intan I No.3 Sadang Serang Bandung', 1, 'http://oprek.arc.itb.ac.id/Foto/13511090.jpg', 0, 1, 'bambang', 'galau', '0', '0'),
(38, 'fawwaz muhammad', '085794936051', 'fawwaz.muhammad@s.itb.ac.id', 13511083, 'Teknik Informatika', 'cfdb2ec4c505047b3a59f31a01890915', 'Taman Kopo Indah Blok F no 51 Bandung', 2, 'http://oprek.arc.itb.ac.id/Foto/13511083.jpg', 0, 0, 'Iskandar Setiadi', 'galau', '0', '0'),
(39, 'Rian Yulianto', '089679121021', 'rianyulianto@s.itb.ac.id', 18011009, 'Teknik Tenaga Listrik', '2c71145d962d409bfa85aeb879687fff', 'Plesiran', 1, 'http://oprek.arc.itb.ac.id/Foto/18011009.jpg', 0, 1, 'bambang', 'galau', '0', '0'),
(40, 'Dummy1', '1', 'dummy@dummy.com', 1, 'Dummy', '8c2753548775b4161e531c323ea24c08', 'j', 2, 'http://oprek.arc.itb.ac.id/Foto/1', 0, 1, 'Habibie Faried', 'galau', '0', '0'),
(41, 'Dummy2', '2', 'dummy@dummy.com', 2, 'Dummy', 'c0c40e7a94eea7e2c238b75273087710', 'dummy', 2, 'http://oprek.arc.itb.ac.id/Foto/2', 0, 1, 'Habibie Faried', 'Net', '0', '0'),
(42, 'Dummy3', '123', 'dummy@dummy.com', 3, 'Dummy', 'ffdc12d8d601ae40f258acf3d6e7e1fb', 'Jl. dummy', 2, 'http://oprek.arc.itb.ac.id/Foto/3', 0, 1, 'Iskandar Setiadi', 'galau', '0', '0'),
(43, 'Dummy1024', '080910007777', 'abcd1234@arc.itb.ac.id', 13511777, 'Sudah Lulus', 'e19d5cd5af0378da05f63f891c7467af', 'Alamat (Singkat Saja)', 2, 'http://oprek.arc.itb.ac.id/Foto/13511777', 0, 0, 'bambang', 'galau', '0', '0'),
(44, 'Nicolas Novian Ruslim', '087823297974', 'nicolasruslim1@gmail.com', 18211031, 'Sistem Teknologi Informasi', 'aae88e0f820326e9568877ecccd47963', 'Jl. Kebon Bibit No.77A/58', 2, 'http://oprek.arc.itb.ac.id/Foto/18211031', 0, 0, 'bambang', 'galau', '0', '0'),
(45, 'Ongki Herlambang', '085378648848', 'ongkiherlambang@gmail.com', 13511022, 'Teknik Informatika', '3d0b471c4d269fa3db5b56ceb09ec860', 'Jalan Cisitu Lama Gg. 1', 2, 'http://oprek.arc.itb.ac.id/Foto/13511022', 0, 0, 'bambang', 'galau', '0', '0'),
(46, 'David Setyanugraha', '081522588295', 'davidlibraboy@gmail.com', 13511003, 'Teknik Informatika', '655bccdfaa7cb35e676ab89f4d0fb982', 'Jl Ciumbeluit', 2, 'http://oprek.arc.itb.ac.id/Foto/13511003', 0, 0, 'bambang', 'galau', '0', '0'),
(47, 'Muhammad Hanief Candra Pradana', '085727056033', 'mhanif720@gmail.com', 16712245, 'FTI', 'fcea920f7412b5da7be0cf42b8c93759', 'cisitu indah 2 a4', 2, 'http://oprek.arc.itb.ac.id/Foto/16712245', 0, 0, 'bambang', 'galau', '0', '0'),
(48, 'Gilang Ramadhan', '083820692221', 'gilangrama@students.itb.ac.id', 18211045, 'Sistem dan Teknologi Informasi', '3ee9c980f1f5148046c4094253a8c8bb', 'Kp. Sayuran No.7, Cijerah, Kota Bandung', 2, 'http://oprek.arc.itb.ac.id/Foto/18211045', 0, 0, 'bambang', 'galau', '0', '0'),
(49, 'Muhammad Fatoni', '085742402498', 'fatony.el.diaz@gmail.com', 18211042, 'STI', 'df079c0d11e04a0a6af868826cd36085', 'Jl. Pelesiran 82/56', 2, 'http://oprek.arc.itb.ac.id/Foto/18211042', 0, 0, 'bambang', 'galau', '0', '0'),
(50, 'Andik Yumantoro', '085712753156', 'andik.yumantoro@students.itb.ac.id', 16012084, 'FMIPA', 'a1fd20b568e6993559a609b059a89b14', 'Cisitu Lama VIII NO.12', 2, 'http://oprek.arc.itb.ac.id/Foto/16012084', 0, 0, 'bambang', 'galau', '0', '0'),
(51, 'Fataa Naufal', '081225419058', 'fataapik@gmail.com', 16312080, 'FITB', 'fe713b372414d2c946a18a64defefe89', 'Jl. Cisitu Indah VII Kompleks Kampoeng Dago 2 KAV. 12A, Dago, Coblong, Bandung', 2, 'http://oprek.arc.itb.ac.id/Foto/16312080', 0, 0, 'bambang', 'galau', '0', '0'),
(52, 'Sonny Prayogo', '082118448048', 'sonny.prayogo@gmail.com', 16312160, 'FITB', '77615bc21df1de21eeae836a9e80c930', 'Sarijadi Blok 3 No.67 Bandung 40151', 2, 'http://oprek.arc.itb.ac.id/Foto/16312160', 0, 0, 'bambang', 'galau', '0', '0'),
(53, 'Evan Sebastian', '087859061670', 'evanlhoini@gmail.com', 16512163, 'STEI', 'a1b57db3f2290002e00f44a504f51e63', 'Tubagus Ismail 7 no 9', 2, 'http://oprek.arc.itb.ac.id/Foto/16512163', 0, 0, 'bambang', 'galau', '0', '0'),
(54, 'Eko Budi Satriyo', '085727193582', 'ekobudisatriyo@gmail.com', 16912125, 'FTMD', 'f95e031537cd617d67347b56dbd3ffce', 'Jalan Pelesiran 77A/58', 2, 'http://oprek.arc.itb.ac.id/Foto/16912125', 0, 0, 'bambang', 'galau', '0', '0'),
(55, 'Tony', '085717566229', 'kaito1412green95@yahoo.com', 16512324, 'STEI', '01a8576a25f7c269673bf95ab20db79b', 'Jl. Cisitu Baru Dalam no. 72', 2, 'http://oprek.arc.itb.ac.id/Foto/16512324', 0, 0, 'bambang', 'galau', '0', '0'),
(56, 'Nur Adhi Nugroho', '085229887980', 'nur.adhi.nugroho@s.itb.ac.id', 10210017, 'Fisika', '2954ca74b316f7245cf06336b9675673', 'Jl. Taman Hewan', 1, 'http://oprek.arc.itb.ac.id/Foto/10210017', 0, 1, 'bambang', 'galau', '0', '0'),
(57, 'M. Aznan Firmansyah. B', '08973308248', 'muh.aznan@gmail.com', 16512384, 'STEI', '1812ce7c465e0fc57855da04734195f5', 'Jalan Pelesiran No. 58/58. ', 2, 'http://oprek.arc.itb.ac.id/Foto/16512384', 0, 0, 'bambang', 'galau', '0', '0'),
(58, 'Dummy17', '+62', 'apaaja', 1111, 'apayahh', '1621a5dc746d5d19665ed742b2ef9736', 'mau tau aja.haha', 2, 'http://oprek.arc.itb.ac.id/Foto/1111', 0, 0, 'bambang', 'galau', '0', '0'),
(59, 'Dimas Priyambodo', '085692628701', 'd_priyambodo@hotmail.com', 16712052, 'FTI', 'd661608aeeb2069a2dcf87a596d2792b', 'Jln Sangkuriang No 57/154E', 2, 'http://oprek.arc.itb.ac.id/Foto/16712052', 0, 0, 'bambang', 'galau', '1', '1'),
(60, 'Aris Budi Wibowo', '083895253929', 'arisbw@students.itb.ac.id', 16012243, 'FMIPA', '6f2828d7f47e90182031a7053308d209', 'Jalan Cisitu Indah No. 14', 2, 'http://oprek.arc.itb.ac.id/Foto/16012243', 0, 0, 'bambang', 'galau', '1', '1'),
(61, 'Syahid Naufal Ramadhan', '085776442166', 'syahid.nr@gmail.com', 16512124, 'STEI', 'be3ea15177549a962974ea0fe50b77cc', 'jalan kalijati 20 no.2 Antapani Bandung', 2, 'http://oprek.arc.itb.ac.id/Foto/16512124', 0, 0, 'bambang', 'galau', '1', '1'),
(62, 'Alvin Natawiguna', '081282222028', 'alvin-nt_gg@hotmail.com', 16512040, 'STEI', '6948e05bdf56921d16b041d8f4e4b935', 'Jl. Ciumbuleuit No. 85', 2, 'http://oprek.arc.itb.ac.id/Foto/16512040', 0, 0, 'bambang', 'galau', '1', '1'),
(63, 'Fajar Nurhaditia Putra', '089636596790', 'fafajar94@gmail.com', 16512153, 'STEI', '46aa6a575c5eabe587c41b7d867eb571', 'Jalan cisitu lama no.5 / 160b Rt7 Rw12 kel.Dago kec.coblong 40136', 2, 'http://oprek.arc.itb.ac.id/Foto/16512153', 0, 0, 'bambang', 'galau', '1', '1'),
(64, 'Gilang Julian Suherik', '083824455975', 'gilang.9h@gmail.com', 16512192, 'STEI', '0cfddb8e15f3673727e68ae0b635dc77', 'jl. sangkuriang dalam no. 55', 2, 'http://oprek.arc.itb.ac.id/Foto/16512192', 0, 0, 'bambang', 'galau', '1', '1'),
(65, 'Dummy120', '08124612888', 'gentaiscool@students.itb.ac.id', 13511094, 'IF', '7a983a2d21d7567d5f10250214e822d0', 'Halo', 2, 'http://oprek.arc.itb.ac.id/Foto/13511094', 0, 0, 'bambang', 'galau', '1', '1'),
(66, 'Muhamad Ikbal', '083876894867', 'ikbal_cyber@yahoo.com', 16712115, 'FTI', '5727e3b328ca69e77bd44867fc24f20d', 'Jl. Sangkuriang no. 57/154 E Rt 4/13', 2, 'http://oprek.arc.itb.ac.id/Foto/16712115', 0, 0, 'bambang', 'galau', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skorparsial`
--

CREATE TABLE IF NOT EXISTS `skorparsial` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `NIM` int(9) NOT NULL,
  `mentor` varchar(100) NOT NULL DEFAULT 'bambang',
  `skor1` int(3) NOT NULL DEFAULT '0',
  `skor2` int(3) NOT NULL DEFAULT '0',
  `skor3` int(3) NOT NULL DEFAULT '0',
  `skor4` int(3) NOT NULL DEFAULT '0',
  `skor5` int(3) NOT NULL DEFAULT '0',
  `skor6` int(5) NOT NULL DEFAULT '0',
  `skor7` int(5) NOT NULL DEFAULT '0',
  `skor8` int(5) NOT NULL DEFAULT '0',
  `skor9` int(5) NOT NULL DEFAULT '0',
  `skor10` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `skorparsial`
--

INSERT INTO `skorparsial` (`id`, `NIM`, `mentor`, `skor1`, `skor2`, `skor3`, `skor4`, `skor5`, `skor6`, `skor7`, `skor8`, `skor9`, `skor10`) VALUES
(11, 13511069, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 18211030, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13511073, 'bambang', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 13511029, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 13511090, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 13511083, 'Iskandar Setiadi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 18011009, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 1, 'Habibie Faried', 10, 200, 10, 0, 0, 0, 0, 0, 0, 0),
(19, 2, 'Habibie Faried', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 3, 'Iskandar Setiadi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 13511777, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 18211031, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 13511022, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 13511003, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 16712245, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 18211045, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 18211042, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 16012084, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 16312080, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 16312160, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 16512163, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 16912125, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 16512324, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 10210017, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 16512384, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 1111, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 16712052, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 16012243, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 16512124, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 16512040, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 16512153, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 16512192, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 13511094, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 16712115, 'bambang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` int(9) NOT NULL,
  `mentor` varchar(100) NOT NULL DEFAULT 'bambang',
  `Tugas1` varchar(100) DEFAULT '0',
  `Tugas2` varchar(100) DEFAULT '0',
  `Tugas3` varchar(100) DEFAULT '0',
  `Tugas4` varchar(100) DEFAULT '0',
  `Tugas5` varchar(100) DEFAULT '0',
  `Tugas6` varchar(100) NOT NULL DEFAULT '0',
  `Tugas7` varchar(100) NOT NULL DEFAULT '0',
  `Tugas8` varchar(100) NOT NULL DEFAULT '0',
  `Tugas9` varchar(100) NOT NULL DEFAULT '0',
  `Tugas10` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `NIM`, `mentor`, `Tugas1`, `Tugas2`, `Tugas3`, `Tugas4`, `Tugas5`, `Tugas6`, `Tugas7`, `Tugas8`, `Tugas9`, `Tugas10`) VALUES
(11, 13511069, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(12, 18211030, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(13, 13511073, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(14, 13511029, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(15, 13511090, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(16, 13511083, 'Iskandar Setiadi', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(17, 18011009, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(18, 1, 'Habibie Faried', 'http://oprek.arc.itb.ac.id/Tug4s4RCB4MB4NGS3K4L1/1Tugas1.zip', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(19, 2, 'Habibie Faried', 'http://oprek.arc.itb.ac.id/Tug4s4RCB4MB4NGS3K4L1/2Tugas1.zip', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(20, 3, 'Iskandar Setiadi', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(21, 13511777, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(22, 18211031, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(23, 13511022, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(24, 13511003, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(25, 16712245, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(26, 18211045, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(27, 18211042, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(28, 16012084, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(29, 16312080, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(30, 16312160, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(31, 16512163, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(32, 16912125, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(33, 16512324, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(34, 10210017, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(35, 16512384, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(36, 1111, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(37, 16712052, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(38, 16012243, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(39, 16512124, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(40, 16512040, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(41, 16512153, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(42, 16512192, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(43, 13511094, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(44, 16712115, 'bambang', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
