-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 10:03 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_laperless`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_area`
--

CREATE TABLE `tb_area` (
  `id_area` int(11) NOT NULL,
  `nm_area` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_area`
--

INSERT INTO `tb_area` (`id_area`, `nm_area`) VALUES
(1, 'Kantor Area Lampung'),
(2, 'Stasiun Terbanggi Besar'),
(3, 'Stasiun Labuhan Maringgai'),
(4, 'Offtake Sutami'),
(5, 'Offtake Sekampung Udik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerja`
--

CREATE TABLE `tb_kerja` (
  `id_kerja` int(11) NOT NULL,
  `nm_kerja` varchar(255) NOT NULL,
  `no_doc` text NOT NULL,
  `jns_kerja` varchar(128) NOT NULL,
  `doc` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerja`
--

INSERT INTO `tb_kerja` (`id_kerja`, `nm_kerja`, `no_doc`, `jns_kerja`, `doc`) VALUES
(1, 'Pekerjaan Pengadaan Kursi', 'FA-001', '2', 'FA-0011.xlsx'),
(2, 'Pekerjaan Pengadaan Meja', 'FA-002', '1', 'FA-002.xlsx'),
(3, 'Pekerjaan Pengadaan Meja Belajar', 'FA-003', '1', 'FA-003.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerja_update`
--

CREATE TABLE `tb_kerja_update` (
  `id_update` int(11) NOT NULL,
  `kerja_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `tgl_rev` varchar(128) NOT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerja_update`
--

INSERT INTO `tb_kerja_update` (`id_update`, `kerja_id`, `rev_id`, `tgl_rev`, `pegawai_id`) VALUES
(3, 1, 1, '21-11-2019', 1),
(4, 1, 2, '21-11-2019', 1),
(5, 1, 3, '21-11-2019', 1),
(6, 1, 3, '21-11-2019', 1),
(18, 2, 1, '25-11-2019', 1),
(19, 3, 1, '25-11-2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nm_level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nm_level`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nm_menu` varchar(128) NOT NULL,
  `link_menu` varchar(128) NOT NULL,
  `icon_menu` varchar(128) NOT NULL,
  `aktif_menu` varchar(1) NOT NULL,
  `for_menu` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nm_menu`, `link_menu`, `icon_menu`, `aktif_menu`, `for_menu`) VALUES
(1, 'Management Level', 'level', 'fa fa-sort-amount-desc', '1', '1'),
(2, 'Management Menu', 'menu', 'fa fa-book', '1', '1'),
(3, 'Management User', 'muser', 'fa fa-users', '1', '1'),
(4, 'Area Kerja & Rev', 'area', 'fa  fa-building', '1', '1 2'),
(5, 'Vendor Pegawai', 'rekan', 'fa  fa-android', '1', '1 2'),
(6, 'Management Pegawai', 'pegawai', 'fa fa-user-secret', '1', '1 2'),
(7, 'Submit Pekerjaan', 'kerja', 'fa fa-gears', '1', '1 2'),
(8, 'Pinjam Kendaraan', 'mobil', 'fa fa-truck', '0', '1 2 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nm_pegawai` varchar(255) NOT NULL,
  `int_pegawai` varchar(5) NOT NULL,
  `nik_pegawai` varchar(20) NOT NULL,
  `jbt_pegawai` varchar(128) NOT NULL,
  `ft_pegawai` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `rekan_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nm_pegawai`, `int_pegawai`, `nik_pegawai`, `jbt_pegawai`, `ft_pegawai`, `email`, `password`, `rekan_id`, `area_id`, `level_id`, `active`) VALUES
(1, 'Wakim', 'AIM', '2118910164', 'IT Adminitrator', 'thinking-icon-png.png', 'wakim@pgn-solution.co.id', '$2y$10$GzJ58gFNgG2m09Pjp86qFuJ/DFH6sTNjbKBW4WKKwaU0qKyCct1di', 1, 1, 1, 1),
(2, 'Aim', 'TBA', 'TBA', 'TBA', 'default.jpg', 'aim@c.com', '$2y$10$o4t5.qbC47RCgHTuO1gxBuQD5jz8Yz62AL2jSmXqJmeuckaK1Giz6', 1, 1, 3, 1),
(3, 'Sri Sultan Hamangkubuwono', 'SSH', '3212242709910003', 'Admin PGASOL', 'default.jpg', 'admin@pgn-solution.co.id', '$2y$10$DYiqVj/M/wQHmlu2YcINq.7oq0CJHbtaJyKWWIn4rO8j227jmKVf.', 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekan`
--

CREATE TABLE `tb_rekan` (
  `id_rekan` int(11) NOT NULL,
  `nm_rekan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekan`
--

INSERT INTO `tb_rekan` (`id_rekan`, `nm_rekan`) VALUES
(1, 'PT Perusahaan Gas Negara'),
(2, 'PT PGAS Solution'),
(3, 'PT Permata Karya Jasa'),
(4, 'PT Karya Prima Usahatama'),
(5, 'PT Perkasa Abdi Bhuana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rev`
--

CREATE TABLE `tb_rev` (
  `id_rev` int(11) NOT NULL,
  `nm_rev` varchar(128) NOT NULL,
  `des_rev` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rev`
--

INSERT INTO `tb_rev` (`id_rev`, `nm_rev`, `des_rev`) VALUES
(1, 'A', 'Untuk direview'),
(2, 'B', 'Untuk Disetujui'),
(3, '0', 'Untuk Diimplemntasikan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_revisi`
--

CREATE TABLE `tb_revisi` (
  `id_revisi` int(11) NOT NULL,
  `revisi_by` int(11) NOT NULL,
  `des_revisi` text NOT NULL,
  `tgl_revisi` varchar(128) NOT NULL,
  `kerja_id` int(11) NOT NULL,
  `kd_revisi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_revisi`
--

INSERT INTO `tb_revisi` (`id_revisi`, `revisi_by`, `des_revisi`, `tgl_revisi`, `kerja_id`, `kd_revisi`) VALUES
(1, 1, 'Untuk Direview', '21-11-2019', 1, 'A'),
(3, 1, 'Server Detikcom sebenarnya sudah siap diakses pada 30 Mei 1998, namun mulai daring dengan sajian lengkap pada 9 Juli 1998. Tanggal 9 Juli itu akhirnya ditetapkan sebagai hari lahir detikcom yang didirikan Budiono Darsono (eks wartawan DeTik), Yayan Sopyan (eks wartawan DeTik), Abdul Rahman (mantan wartawan Tempo), dan Didi Nugrahadi. Semula peliputan utama detikcom terfokus pada berita politik, ekonomi, dan teknologi informasi. Baru setelah situasi politik mulai reda dan ekonomi mulai membaik, detikcom memutuskan untuk juga melampirkan berita hiburan, dan olahraga.\r\n\r\nDari situlah kemudian tercetus keinginan membentuk detikcom yang update-nya tidak lagi menggunakan karakteristik media cetak yang harian, mingguan, bulanan. Yang dijual detikcom adalah breaking news. Dengan bertumpu pada vivid description macam ini detikcom melesat sebagai situs informasi digital paling populer di kalangan users internet.', '21-11-2019', 1, NULL),
(6, 1, 'Untuk Diimplemntasikan', '21-11-2019', 1, '0'),
(7, 1, 'Untuk Direview', '25-11-2019', 2, 'A'),
(8, 1, 'Untuk Direview', '25-11-2019', 3, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tb_kerja`
--
ALTER TABLE `tb_kerja`
  ADD PRIMARY KEY (`id_kerja`);

--
-- Indexes for table `tb_kerja_update`
--
ALTER TABLE `tb_kerja_update`
  ADD PRIMARY KEY (`id_update`),
  ADD KEY `kerja_in` (`kerja_id`),
  ADD KEY `rev_ke` (`rev_id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekan`
--
ALTER TABLE `tb_rekan`
  ADD PRIMARY KEY (`id_rekan`);

--
-- Indexes for table `tb_rev`
--
ALTER TABLE `tb_rev`
  ADD PRIMARY KEY (`id_rev`);

--
-- Indexes for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  ADD PRIMARY KEY (`id_revisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_kerja`
--
ALTER TABLE `tb_kerja`
  MODIFY `id_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_kerja_update`
--
ALTER TABLE `tb_kerja_update`
  MODIFY `id_update` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_rekan`
--
ALTER TABLE `tb_rekan`
  MODIFY `id_rekan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_rev`
--
ALTER TABLE `tb_rev`
  MODIFY `id_rev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
