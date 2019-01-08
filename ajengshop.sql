-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 10:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajengshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `merk`, `stok`, `harga`, `foto`, `status`, `deskripsi`) VALUES
('BRG001', 'Spongbob Yellow 2', 'KTG001', 'nice', 10, 200000000, 'BRG_20190102_164609logo-tiket-pesawat-png.png', 'bestseller', 'Baju yang elegan'),
('BRG002', 'Spongbob Yellow', 'KTG001', 'nice', 9, 200000, 'BRG_20190107_114936logo-tiket-pesawat-png.png', 'bestseller', ''),
('BRG003', 'Hijab', 'KTG002', 'nice', 10, 300000, 'BRG_20190107_115654logo-tiket-pesawat-png.png', 'sale', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` varchar(10) NOT NULL,
  `id_transaksi` varchar(10) DEFAULT NULL,
  `id_barang` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL,
  `id_member` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_transaksi`, `id_barang`, `harga`, `tanggal`, `jumlah`, `id_member`, `status`) VALUES
('DTL001', 'TRS001', 'BRG001', 200000000, '2019-01-07 03:45:33', 14, 'MBR001', 1),
('DTL002', 'TRS002', 'BRG002', 200000, '2019-01-07 04:50:52', 11, 'MBR001', 1),
('DTL004', 'TRS003', 'BRG001', 200000000, '2019-01-07 04:51:32', 5, 'MBR001', 1),
('DTL005', 'TRS004', 'BRG002', 200000, '2019-01-07 04:52:11', 1, 'MBR001', 1),
('DTL006', 'TRS005', 'BRG002', 200000, '2019-01-07 04:52:49', 3, 'MBR001', 1),
('DTL007', 'TRS005', 'BRG001', 200000000, '2019-01-07 04:52:51', 1, 'MBR001', 1),
('DTL008', 'TRS006', 'BRG001', 200000000, '2019-01-07 04:57:55', 1, 'MBR001', 1),
('DTL009', 'TRS006', 'BRG002', 200000, '2019-01-07 04:57:55', 6, 'MBR001', 1),
('DTL010', 'TRS006', 'BRG003', 300000, '2019-01-07 04:57:55', 1, 'MBR001', 1),
('DTL011', 'TRS007', 'BRG001', 200000000, '2019-01-08 04:27:01', 7, 'MBR001', 1),
('DTL012', 'TRS007', 'BRG003', 300000, '2019-01-08 04:27:14', 7, 'MBR001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imageproduct`
--

CREATE TABLE `imageproduct` (
  `id_image` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imageproduct`
--

INSERT INTO `imageproduct` (`id_image`, `id_barang`, `name`) VALUES
('IMG001', 'BRG001', 'BRG_20190102_164609logo-tiket-pesawat-png.png'),
('IMG002', 'BRG002', 'BRG_20190107_114936logo-tiket-pesawat-png.png'),
('IMG003', 'BRG002', 'BRG_20190107_114936murni.png'),
('IMG004', 'BRG002', 'BRG_20190107_114936Murnilog.gif'),
('IMG005', 'BRG002', 'BRG_20190107_114936Splash.gif'),
('IMG006', 'BRG003', 'BRG_20190107_115654logo-tiket-pesawat-png.png'),
('IMG007', 'BRG003', 'BRG_20190107_115655murni.png'),
('IMG008', 'BRG003', 'BRG_20190107_115655Murnilog.gif'),
('IMG009', 'BRG003', 'BRG_20190107_115655Splash.gif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_barang`) VALUES
('KTG001', 'Baju Pria'),
('KTG002', 'Baju Wanita'),
('KTG003', 'Dress Women');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(10) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `pertanyaan` varchar(40) NOT NULL,
  `jawaban` varchar(20) NOT NULL,
  `isLogin` varchar(1) NOT NULL DEFAULT 'N',
  `gagallogin` int(11) NOT NULL DEFAULT '0',
  `ktp` varchar(30) NOT NULL,
  `lastlogin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `no_ktp`, `nama_member`, `email`, `password`, `pertanyaan`, `jawaban`, `isLogin`, `gagallogin`, `ktp`, `lastlogin`) VALUES
('MBR001', '12131212321313213', 'Ndaru', 'kasurmabur@gmail.com', 'Jarumblack123!', 'a', 'b', 'N', 0, 'beach-exotic-holiday-248797.jp', '1546921068'),
('MBR002', 'Ajeng Wuriprastiwi', 'Ajeng Wuriprastiwi', 'ajeng300@gmail.com', 'Ajengmini123!', 'hallo', 'mini', 'N', 0, 'xxx.jpeg', '1545922850'),
('MBR003', '312312312312312', 'Ndaru K', 'albertusndarukrismandoko@gmail.com', 'Ndaru123@', 'apa', 'aja', 'Y', 0, 'murni.png', '1546588767');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_bayar` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `bukti_transaksi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `total_bayar`, `Status`, `bukti_transaksi`) VALUES
('TRS001', '2019-01-07 10:45:56', 2147483647, 0, NULL),
('TRS002', '2019-01-07 11:51:09', -252516353, 0, NULL),
('TRS003', '2019-01-07 11:51:37', 1000000000, 0, NULL),
('TRS004', '2019-01-07 11:52:19', 200000, 0, NULL),
('TRS005', '2019-01-07 11:52:56', 200600000, 0, NULL),
('TRS006', '2019-01-07 11:58:00', 201500000, 0, NULL),
('TRS007', '2019-01-08 11:28:13', 1402182000, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `pertanyaannya` varchar(30) NOT NULL,
  `jawabannya` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `isLogin` varchar(1) NOT NULL DEFAULT 'N',
  `gagallogin` int(11) NOT NULL DEFAULT '0',
  `lastlogin` varchar(30) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `Nama`, `password`, `pertanyaannya`, `jawabannya`, `level`, `isLogin`, `gagallogin`, `lastlogin`) VALUES
('USR001', 'albertusndarukrismandoko@gmail.com', 'Albertus', '2108', 'a', 'b', 1, 'N', 0, '1546926364'),
('USR002', 'ajengwurip@gmail.com', 'Ajeng WP', 'Ajengmini123!', 'hallo', 'mini', 0, 'Y', 0, '1545923118');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_barang3` (`id_kategori`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_barang1` (`id_barang`),
  ADD KEY `fk_transaksi1` (`id_transaksi`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `jenis_barang` (`jenis_barang`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
