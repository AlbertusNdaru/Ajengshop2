-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 06:27 AM
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
  `status` varchar(20) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `merk`, `stok`, `harga`, `foto`, `status`) VALUES
('BRG003', 'Dress merah', 'KTG003', 'H&M', 0, 120000, 'BRG_20181227_214517images-15.jpg', 'new'),
('BRG004', 'Hem Wanita', 'KTG002', 'H&M', 0, 125000, 'BRG_20181227_220743images-9.jpg', 'new');

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
('DTL001', 'TRS001', 'BRG001', 200000000, '2018-12-27 09:53:06', 4, 'MBR001', 1),
('DTL002', 'TRS002', 'BRG001', 200000000, '2018-12-27 09:53:42', 4, 'MBR001', 1),
('DTL003', 'TRS003', 'BRG002', 200000000, '2018-12-27 14:00:48', 1, 'MBR001', 1),
('DTL004', 'TRS003', 'BRG001', 200000000, '2018-12-27 14:00:48', 1, 'MBR001', 1),
('DTL005', 'TRS004', 'BRG001', 200000000, '2018-12-27 14:12:23', 1, 'MBR002', 1),
('DTL006', 'TRS004', 'BRG002', 200000000, '2018-12-27 14:12:27', 1, 'MBR002', 1),
('DTL007', 'TRS005', 'BRG003', 120000, '2018-12-27 14:57:50', 1, 'MBR002', 1),
('DTL008', 'TRS006', 'BRG003', 120000, '2018-12-27 15:00:50', 1, 'MBR002', 1),
('DTL009', 'TRS006', 'BRG003', 120000, '2018-12-27 15:00:50', 1, 'MBR002', 1),
('DTL010', 'TRS007', 'BRG003', 120000, '2018-12-28 03:41:40', 2, 'MBR001', 1),
('DTL011', 'TRS007', 'BRG004', 125000, '2018-12-28 03:48:39', 5, 'MBR001', 1),
('DTL012', 'TRS008', 'BRG003', 120000, '2018-12-28 03:58:06', 1, 'MBR001', 1),
('DTL013', 'TRS008', 'BRG004', 125000, '2018-12-28 03:58:10', 1, 'MBR001', 1),
('DTL014', 'TRS009', 'BRG004', 125000, '2018-12-28 04:06:40', 1, 'MBR001', 1),
('DTL015', 'TRS009', 'BRG003', 120000, '2018-12-28 04:32:19', 4, 'MBR001', 1),
('DTL016', NULL, 'BRG003', 120000, '2018-12-28 04:32:31', 17, 'MBR001', 0);

--
-- Triggers `detail`
--
DELIMITER $$
CREATE TRIGGER `kurangggg` AFTER UPDATE ON `detail` FOR EACH ROW begin
declare x,y,z integer;
select old.jumlah from detail where id_detail=old.id_detail and old.id_transaksi IS null  into x;
select new.jumlah from detail where id_detail=new.id_detail and old.id_transaksi IS null  into y;
set z=y-x;
update barang set stok=stok-z where id_barang=new.id_barang;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangstokk` AFTER INSERT ON `detail` FOR EACH ROW begin
declare x integer;
select stok from barang where id_barang = new.id_barang into x;
if x>0 then 
update barang set stok = stok - new.jumlah 
where id_barang=new.id_barang;
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahhh` BEFORE DELETE ON `detail` FOR EACH ROW begin 
update barang set stok= stok + old.jumlah where id_barang = old.id_barang;
end
$$
DELIMITER ;

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
('MBR001', '12131212321313213', 'Ndaru', 'kasurmabur@gmail.com', 'Jarumblack123!', 'a', 'b', 'N', 0, 'beach-exotic-holiday-248797.jp', '1545971539'),
('MBR002', 'Ajeng Wuriprastiwi', 'Ajeng Wuriprastiwi', 'ajeng300@gmail.com', 'Ajengmini123!', 'hallo', 'mini', 'N', 0, 'xxx.jpeg', '1545922850');

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
('TRS001', '2018-12-27 16:53:19', 800000000, 0, NULL),
('TRS002', '2018-12-27 16:53:49', 800000000, 0, NULL),
('TRS003', '2018-12-27 21:00:58', 400000000, 0, NULL),
('TRS004', '2018-12-27 21:12:34', 400000000, 0, NULL),
('TRS005', '2018-12-27 21:58:46', 120000, 0, NULL),
('TRS006', '2018-12-27 22:01:06', 240000, 0, NULL),
('TRS007', '2018-12-28 10:54:57', 865000, 0, NULL),
('TRS008', '2018-12-28 10:58:21', 245000, 0, NULL),
('TRS009', '2018-12-28 11:32:24', 605000, 0, NULL);

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
('USR001', 'albertusndarukrismandoko@gmail.com', 'Albertus', '2108', 'a', 'b', 1, 'Y', 0, '1545967907'),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
