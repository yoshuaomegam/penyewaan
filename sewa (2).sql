-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 10:52 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `deskripsi`, `harga`, `stok`, `gambar`) VALUES
(11, 'Tenda ', 'Harga per 1 Tenda/hari, tinggi 3 meter, panjang 2 meter, lebar 2 meter', 250000, 30, 'tenda.jpg'),
(12, 'Sound System', 'Harga per 1 set Sound System/hari', 3000000, 10, 'DSC01461.JPG'),
(13, 'Karpet', 'Harga per hari, panjang 100 meter, lebar 100 meter', 250000, 5, 'karpet.jpg'),
(14, 'HT', 'Harga per 1 HT', 125000, 50, 'ht.jpg'),
(15, 'Kompor Mini', 'Harga per 1 Kompor', 50000, 10, 'kompor.jpg'),
(16, 'Kursi', 'Harga per 1 Kursi gratis selimut', 3000, 100000, 'kursi.jpg'),
(17, 'Terop', 'Harga 1 terop, 1 terop panjang 50 meter, lebar 50 meter perhari', 1500000, 10, 'terop.JPG'),
(18, 'TOA', 'Harga 1 toa perhari', 200000, 5, 'toa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `memesan_barang`
--

CREATE TABLE `memesan_barang` (
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `memesan_barang`
--
DELIMITER $$
CREATE TRIGGER `hapussemua` AFTER DELETE ON `memesan_barang` FOR EACH ROW DELETE FROM pemesanan WHERE id_user=old.id_user
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatestok` AFTER UPDATE ON `memesan_barang` FOR EACH ROW UPDATE barang SET stok = barang.stok-new.qty WHERE barang.id_barang=new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `Nama_Penerima` varchar(30) NOT NULL,
  `Alamat` varchar(3000) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `bukti` text NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `group` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `group`) VALUES
(1, 'rikza', 'rikza79@gmail.com', '123456', '2'),
(2, 'yosua', 'yous@gmail.com', '123456', '2'),
(3, 'Tesa', 'tesa@gmail.com', '123456', '1'),
(4, 'Dino', 'dino09@gmail.com', '123456', '3'),
(5, 'Aldi', 'aldi09@gmail.com', '123456', '3'),
(7, 'Woyo', 'woyo09@gmail.com', '123456', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `memesan_barang`
--
ALTER TABLE `memesan_barang`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `group` (`group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `memesan_barang`
--
ALTER TABLE `memesan_barang`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `memesan_barang`
--
ALTER TABLE `memesan_barang`
  ADD CONSTRAINT `memesan_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pemesanan` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `memesan_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
