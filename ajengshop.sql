-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2018 pada 10.59
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `merk`, `stok`, `harga`, `foto`, `status`) VALUES
('BRG003', 'Dress merah', 'KTG003', 'H&M', 1, 200000, 'BRG_20181227_214517images-15.jpg', 'bestseller'),
('BRG004', 'Hem Wanita', 'KTG002', 'H&M', 2, 125000, 'BRG_20181227_220743images-9.jpg', 'bestseller');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `imageproduct`
--

CREATE TABLE `imageproduct` (
  `id_image` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_barang`) VALUES
('KTG001', 'Baju Pria'),
('KTG002', 'Baju Wanita'),
('KTG003', 'Dress Women');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
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
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `no_ktp`, `nama_member`, `email`, `password`, `pertanyaan`, `jawaban`, `isLogin`, `gagallogin`, `ktp`, `lastlogin`) VALUES
('MBR001', '12131212321313213', 'Ndaru', 'kasurmabur@gmail.com', 'Jarumblack123!', 'a', 'b', 'Y', 0, 'beach-exotic-holiday-248797.jp', '1546248448'),
('MBR002', 'Ajeng Wuriprastiwi', 'Ajeng Wuriprastiwi', 'ajeng300@gmail.com', 'Ajengmini123!', 'hallo', 'mini', 'N', 0, 'xxx.jpeg', '1545922850');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_bayar` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `bukti_transaksi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `Nama`, `password`, `pertanyaannya`, `jawabannya`, `level`, `isLogin`, `gagallogin`, `lastlogin`) VALUES
('USR001', 'albertusndarukrismandoko@gmail.com', 'Albertus', '2108', 'a', 'b', 1, 'N', 0, '1545979255'),
('USR002', 'ajengwurip@gmail.com', 'Ajeng WP', 'Ajengmini123!', 'hallo', 'mini', 0, 'Y', 0, '1545923118');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_barang3` (`id_kategori`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_barang1` (`id_barang`),
  ADD KEY `fk_transaksi1` (`id_transaksi`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `jenis_barang` (`jenis_barang`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Ketidakleluasaan untuk tabel `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
