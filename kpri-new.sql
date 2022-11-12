-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2022 at 10:19 PM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iniunda1_wp203`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `id` bigint(20) NOT NULL,
  `peminjam` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` tinyint(4) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tempo` smallint(6) NOT NULL,
  `mulai` date DEFAULT NULL,
  `penghasilan` bigint(20) NOT NULL,
  `slip` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `admin` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`id`, `peminjam`, `tanggal`, `jenis`, `jumlah`, `tempo`, `mulai`, `penghasilan`, `slip`, `status`, `admin`) VALUES
(5, 12345, '2022-11-11', 5, 1000000, 32767, '2022-11-11', 2000000, 'null', 3, 1234567),
(6, 12345, '2022-11-11', 5, 10000000, 32767, '2022-11-11', 10000000, 'null', 5, 1234567),
(7, 12345, '2022-11-11', 5, 10000000, 32767, '2022-11-11', 10000000, 'null', 5, 1234567),
(8, 12345, '2022-11-11', 5, 10000000, 1, '2022-11-11', 2000000, 'null', 5, 1234567),
(9, 1, '2022-11-11', 1, 2000000, 10, '2022-11-11', 2000000, 'null', 3, 1234567);

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nip` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sandi` varchar(30) NOT NULL,
  `kelamin` tinyint(4) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pos` mediumint(9) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `instansi` int(11) NOT NULL,
  `ktp_suami` varchar(200) DEFAULT NULL,
  `ktp_istri` varchar(200) DEFAULT NULL,
  `foto_3x4` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `jabatan` tinyint(4) NOT NULL,
  `gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nip`, `nama`, `sandi`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pos`, `hp`, `instansi`, `ktp_suami`, `ktp_istri`, `foto_3x4`, `status`, `jabatan`, `gabung`) VALUES
(1, 'coba', 'coba', 1, 'jember', '2022-11-08', 'jember', 68164, '081234567890', 3, '1_KTP_SUAMI.jpg', '1_KTP_ISTRI.jpg', '1_3x4.jpg', 1, 1, '2022-11-10'),
(2, 'coba lagi', 'coba', 1, 'jember', '2022-11-01', 'jember', 68164, '081234567890', 3, '2_KTP_SUAMI.jpg', '2_KTP_ISTRI.jpg', '2_3x4.jpg', 1, 1, '2022-11-10'),
(12345, 'RAMADHAN', 'ramaido', 1, 'JEMBER', '1998-05-01', 'Jl Kartika Gg III Dauh Puri Denpasar Barat', 80112, '82144786352', 2, '12345_KTP_SUAMI.jpg', '12345_KTP_ISTRI.jpg', '12345_3x4.jpg', 2, 1, '2022-11-03'),
(50198, 'Nugroho Ari Ramadhan', 'ramaido', 1, 'JEMBER', '1998-01-05', 'Jl Kartika Gg III Dauh Puri Denpasar Barat', 80112, '082144786352', 1, '050198_KTP_SUAMI.jpg', '050198_KTP_ISTRI.jpg', '050198_3x4.jpg', 1, 2, '2022-11-03'),
(765676, 'adi', 'adilasso', 1, 'JEMBER', '1998-01-05', 'Jl Kartika Gg III Dauh Puri Denpasar Barat', 80112, '082144786352', 1, '765676_KTP_SUAMI.jpg', '765676_KTP_ISTRI.jpg', '765676_3x4.jpg', 1, 1, '2022-11-03'),
(1234567, 'ramadhan', '12345', 1, 'JEMBER', '1998-01-05', 'Jl Kartika Gg III Dauh Puri Denpasar Barat', 80112, '082144786352', 1, '1234567_KTP_SUAMI.jpg', '1234567_KTP_ISTRI.jpg', '1234567_3x4.jpg', 1, 3, '2022-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `instansi`, `alamat`) VALUES
(1, 'SMAWON', 'Jl Kartika Gg III Dauh Puri Denpasar Barat'),
(2, 'wiyata usaha', 'Jl Kartika Gg III Dauh Puri Denpasar Barat'),
(3, 'PT Coba', 'Jember');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` tinyint(4) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'Anggota'),
(2, 'Pimpinan'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pinjaman`
--

CREATE TABLE `jenis_pinjaman` (
  `id` tinyint(4) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_pinjaman`
--

INSERT INTO `jenis_pinjaman` (`id`, `jenis`) VALUES
(1, 'USP'),
(2, 'BKE'),
(3, 'Ekstra'),
(4, 'Toko'),
(5, 'Haji');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `id` tinyint(4) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id`, `jenis`) VALUES
(1, 'SP'),
(2, 'SW'),
(3, 'TAB'),
(4, 'SR');

-- --------------------------------------------------------

--
-- Table structure for table `kelamin`
--

CREATE TABLE `kelamin` (
  `id` tinyint(4) NOT NULL,
  `kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelamin`
--

INSERT INTO `kelamin` (`id`, `kelamin`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `sp` bigint(20) DEFAULT NULL,
  `sw` bigint(20) DEFAULT NULL,
  `tab` bigint(20) DEFAULT NULL,
  `sr` bigint(20) DEFAULT NULL,
  `kas` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`sp`, `sw`, `tab`, `sr`, `kas`, `tanggal`) VALUES
(80774738, 89141039, 28193250, 18051408, 6454459, '2017-09-05'),
(61463838, 1620264, 78859158, 43128857, 1741821, '2000-02-24'),
(17728708, 57714554, 33458000, 93703476, 93163109, '1988-08-22'),
(61446593, 77726678, 75179625, 16886989, 99984852, '2014-12-20'),
(46007367, 20384793, 25200594, 40235851, 36174689, '2011-12-09'),
(83537929, 10583710, 63866503, 41117218, 10786696, '1979-11-11'),
(80859094, 79992456, 90456729, 82573805, 12397363, '2018-07-23'),
(14045142, 75353637, 70081007, 57360239, 98306053, '1997-03-16'),
(55027534, 83646719, 20924019, 39801400, 94856311, '2012-01-14'),
(31651836, 29939291, 95448233, 62725332, 27680153, '2006-11-26'),
(70559205, 36852186, 33269491, 14215429, 99691116, '2002-12-17'),
(10224480, 18224635, 87739072, 98769370, 12566127, '1992-03-27'),
(1005841, 91359234, 84960381, 10483413, 74802751, '2021-03-17'),
(90147459, 48319635, 61089824, 42961395, 77472592, '1971-05-27'),
(37456150, 29392125, 87838404, 27699507, 1120458, '1987-09-11'),
(72979686, 19490410, 46900190, 7013992, 60185736, '2017-11-09'),
(30567249, 9603900, 5083585, 39811438, 8379858, '1986-03-22'),
(55579485, 60871911, 39673541, 84460340, 70876422, '2010-09-06'),
(69974281, 96062569, 28881398, 21030500, 55301192, '1981-09-07'),
(39407707, 65791246, 87175917, 18966540, 9085418, '1997-11-25'),
(96419247, 55297163, 63809358, 49625576, 69215029, '1983-07-13'),
(11877659, 97495548, 53392632, 58481591, 94413587, '1997-12-06'),
(3671541, 23916642, 52512894, 6117237, 95286948, '1980-11-20'),
(77390026, 44732070, 83580630, 28945616, 92327384, '1995-01-25'),
(16614190, 59847163, 7518662, 63352752, 49022491, '1971-03-31'),
(25819687, 5772393, 56084617, 51145780, 47248233, '2014-10-17'),
(83067546, 5042579, 20096105, 68340899, 2066944, '2006-10-22'),
(78387194, 24404191, 40170945, 40482530, 41432401, '1995-04-05'),
(64605701, 20962691, 788674, 24969786, 65664887, '1996-12-11'),
(2545349, 19267071, 5861564, 74840307, 4571336, '1982-01-05'),
(78845412, 12045028, 33720236, 82825307, 71891930, '1980-07-13'),
(19541537, 81100469, 62114154, 24063664, 22739762, '1996-10-06'),
(15817197, 11664998, 39896740, 2057848, 24397904, '2015-01-24'),
(87994937, 78132359, 70724108, 56841271, 73767849, '1992-06-26'),
(9857110, 16445670, 38000796, 75222641, 52654114, '2002-06-14'),
(95205560, 12607474, 58085001, 3174927, 35016734, '2015-02-04'),
(86022511, 22147936, 53634598, 52146360, 47318341, '1973-01-25'),
(87293847, 74857604, 28678005, 24675629, 57318159, '1995-08-08'),
(90794510, 63965502, 71507573, 67973436, 11697553, '1994-11-20'),
(9287596, 25272624, 4826877, 35136109, 62322935, '1973-02-10'),
(35192972, 25319839, 49222141, 62708776, 81593914, '2009-09-05'),
(46451454, 6229928, 26292650, 78269313, 40344818, '2008-11-22'),
(35805834, 43193262, 59813840, 401260, 59167681, '1982-04-02'),
(95995922, 18542114, 68716200, 23848080, 66908021, '1975-10-29'),
(57028554, 81625598, 11502707, 78096500, 89549745, '1990-05-31'),
(30503250, 93924022, 28519327, 9287745, 98554555, '2010-04-02'),
(35059733, 27318360, 64196646, 7707033, 61220714, '1979-04-12'),
(3725538, 56028887, 10721958, 85980941, 22789482, '2016-10-20'),
(39981935, 88690589, 67990633, 59876561, 24957422, '1993-09-13'),
(89588713, 46504055, 25325148, 26458055, 81404407, '1997-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) NOT NULL,
  `id_ajuan` bigint(20) NOT NULL,
  `jenis` tinyint(4) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `jasa` bigint(20) NOT NULL,
  `tempo` smallint(6) NOT NULL,
  `angsuran` bigint(20) NOT NULL,
  `potongan` bigint(20) NOT NULL,
  `asuransi` bigint(20) NOT NULL,
  `diterima` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `admin` bigint(20) DEFAULT NULL,
  `pimpinan` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_ajuan`, `jenis`, `jumlah`, `jasa`, `tempo`, `angsuran`, `potongan`, `asuransi`, `diterima`, `mulai`, `admin`, `pimpinan`, `status`) VALUES
(26, 5, 5, 1000000, 15000, 32767, 35031, 10000, 10000, 964969, '2022-11-11', NULL, 50198, 3),
(27, 9, 1, 2000000, 15000, 10, 255000, 20000, 20000, 1745000, '2022-11-11', NULL, 50198, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `nomor` bigint(20) NOT NULL,
  `pemilik` bigint(20) NOT NULL,
  `wajib` bigint(20) DEFAULT NULL,
  `pokok` bigint(20) DEFAULT NULL,
  `tabungan` bigint(20) DEFAULT NULL,
  `sukarela` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`nomor`, `pemilik`, `wajib`, `pokok`, `tabungan`, `sukarela`) VALUES
(1, 2, 0, 0, 0, 0),
(2, 765676, 0, 0, 0, 0),
(3, 1, 0, 0, 0, 0),
(4, 50198, 0, 0, 0, 0),
(5, 12345, 0, 0, 0, 0),
(6, 1234567, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seragam`
--

CREATE TABLE `seragam` (
  `id` bigint(20) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setor_pinjam`
--

CREATE TABLE `setor_pinjam` (
  `id` bigint(20) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `id_peminjaman` bigint(20) NOT NULL,
  `jenis` tinyint(4) NOT NULL,
  `ke` smallint(6) NOT NULL,
  `dari` smallint(6) NOT NULL,
  `pokok` bigint(20) NOT NULL,
  `jasa` bigint(20) NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setor_pinjam`
--

INSERT INTO `setor_pinjam` (`id`, `id_transaksi`, `id_peminjaman`, `jenis`, `ke`, `dari`, `pokok`, `jasa`, `keterangan`) VALUES
(15, 20, 26, 5, 1, 32767, 35031, 15000, 'Angsuran pertama'),
(16, 21, 27, 1, 1, 10, 255000, 15000, 'Angsuran pertama');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id` bigint(20) NOT NULL,
  `rekening` bigint(20) NOT NULL,
  `jenis` tinyint(4) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status_akun`
--

CREATE TABLE `status_akun` (
  `id` tinyint(4) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_akun`
--

INSERT INTO `status_akun` (`id`, `status`) VALUES
(1, 'Aktif'),
(2, 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id` tinyint(4) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id`, `status`) VALUES
(1, 'Selesai'),
(2, 'Acc'),
(3, 'Diangsur'),
(4, 'Ditolak'),
(5, 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) NOT NULL,
  `penyetor` bigint(20) NOT NULL,
  `bulan` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `admin` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `penyetor`, `bulan`, `jumlah`, `tanggal`, `admin`) VALUES
(20, 12345, '2022-11-11', 35031, '2022-11-11', NULL),
(21, 1, '2022-11-11', 255000, '2022-11-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trx_arisan`
--

CREATE TABLE `trx_arisan` (
  `id` bigint(20) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `bulan` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_ajuan` (`admin`),
  ADD KEY `fk_peminjam_ajuan` (`peminjam`),
  ADD KEY `fk_jenis_ajuan` (`jenis`) USING BTREE,
  ADD KEY `fk_status` (`status`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_instansi` (`instansi`),
  ADD KEY `fk_status_akun` (`status`),
  ADD KEY `fk_jabatan` (`jabatan`),
  ADD KEY `fk_kelamin` (`kelamin`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelamin`
--
ALTER TABLE `kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_peminjaman` (`admin`),
  ADD KEY `fk_ajuan` (`id_ajuan`),
  ADD KEY `fk_jenis` (`jenis`),
  ADD KEY `fk_pimpinan_peminjaman` (`pimpinan`),
  ADD KEY `fk_status_peminjaman` (`status`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `fk_pemilik` (`pemilik`);

--
-- Indexes for table `seragam`
--
ALTER TABLE `seragam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_seragam` (`id_transaksi`);

--
-- Indexes for table `setor_pinjam`
--
ALTER TABLE `setor_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_setor_peminjaman` (`id_peminjaman`),
  ADD KEY `fk_setor_transaksi` (`id_transaksi`),
  ADD KEY `fk_setor_jenis` (`jenis`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_simpanan` (`id_transaksi`),
  ADD KEY `fk_jenis_simpanan` (`jenis`),
  ADD KEY `fk_rekening_simpanan` (`rekening`);

--
-- Indexes for table `status_akun`
--
ALTER TABLE `status_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_trx` (`admin`),
  ADD KEY `fk_penyetor` (`penyetor`);

--
-- Indexes for table `trx_arisan`
--
ALTER TABLE `trx_arisan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_arisan` (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelamin`
--
ALTER TABLE `kelamin`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `nomor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seragam`
--
ALTER TABLE `seragam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setor_pinjam`
--
ALTER TABLE `setor_pinjam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_akun`
--
ALTER TABLE `status_akun`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trx_arisan`
--
ALTER TABLE `trx_arisan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `fk_admin_ajuan` FOREIGN KEY (`admin`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jenis_ajuan` FOREIGN KEY (`jenis`) REFERENCES `jenis_pinjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_peminjam_ajuan` FOREIGN KEY (`peminjam`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `status_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_instansi` FOREIGN KEY (`instansi`) REFERENCES `instansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelamin` FOREIGN KEY (`kelamin`) REFERENCES `kelamin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_akun` FOREIGN KEY (`status`) REFERENCES `status_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_admin_peminjaman` FOREIGN KEY (`admin`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ajuan` FOREIGN KEY (`id_ajuan`) REFERENCES `ajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis`) REFERENCES `jenis_pinjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pimpinan_peminjaman` FOREIGN KEY (`pimpinan`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_peminjaman` FOREIGN KEY (`status`) REFERENCES `status_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `fk_pemilik` FOREIGN KEY (`pemilik`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seragam`
--
ALTER TABLE `seragam`
  ADD CONSTRAINT `fk_transaksi_seragam` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `setor_pinjam`
--
ALTER TABLE `setor_pinjam`
  ADD CONSTRAINT `fk_setor_jenis` FOREIGN KEY (`jenis`) REFERENCES `jenis_pinjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_setor_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_setor_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `fk_jenis_simpanan` FOREIGN KEY (`jenis`) REFERENCES `jenis_simpanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekening_simpanan` FOREIGN KEY (`rekening`) REFERENCES `rekening` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_simpanan` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_admin_trx` FOREIGN KEY (`admin`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penyetor` FOREIGN KEY (`penyetor`) REFERENCES `akun` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_arisan`
--
ALTER TABLE `trx_arisan`
  ADD CONSTRAINT `fk_transaksi_arisan` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
