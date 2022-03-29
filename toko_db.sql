-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 05:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', 1, 'Pensil', 'Joyko', '1300', '2000', 'PCS', '14', '2 December 2021, 8:32', NULL),
(2, 'BR002', 1, 'Penggaris', 'Butterfly', '3600', '4000', 'PCS', '2', '2 December 2021, 8:32', NULL),
(3, 'BR003', 2, 'Mie Sedap Goreng', 'Sedap', '2000', '2500', 'PCS', '13', '2 December 2021, 8:33', '2 February 2022, 6:57'),
(6, 'BR004', 3, 'Soda', 'Coca cola', '2700', '3500', 'PCS', '8', '20 January 2022, 7:19', NULL),
(10, 'BR005', 4, 'Beras', 'Panda', '15500', '17000', 'KG', '18', '11 March 2022, 7:32', '11 March 2022, 7:36'),
(12, 'BR006', 6, 'molto', 'mawar', '1800', '2000', 'PCS', '20', '29 March 2022, 8:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(225) NOT NULL,
  `update` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `update`) VALUES
(4, 'test pertama', 'Tester ', 'NEW'),
(5, 'kunto', 'Jakarta Timur ', 'NEW'),
(6, 'julaila', 'Surabaya selatan', 'NEW'),
(7, 'lulu', 'Jakarta Timur ', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(7) NOT NULL,
  `customer_id` int(7) NOT NULL,
  `persen` decimal(3,2) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `tgl_update` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `customer_id`, `persen`, `tanggal_input`, `tgl_update`) VALUES
(14, 5, '2.00', '10 March 2022, 9:06', '11 March 2022, 7:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '2 December 2021, 8:31'),
(2, 'Makanan', '2 December 2021, 8:31'),
(3, 'Minuman', '2 December 2021, 8:32'),
(4, 'Sembako', '5 January 2022, 11:00'),
(5, 'Sabun', '2 February 2022, 7:02'),
(6, 'Pewangi', '2 February 2022, 7:02');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'user', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Praja Muda Karana', 'jl. kuningan biru', '08766284763', '123470@gmail.com', 'WhatsApp Image 2022-01-31 at 12.18.15 (2).jpeg', '1534625700656'),
(2, 'Aurora', 'jl. kuningan biru', '08766284763', 'dah70@gmail.com', 'f76da8a9d3f7bfc38fe909d60e533a91.jpg', '1534625700656');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `bulan`, `tahun`, `periode`) VALUES
(35, 'BR004', 1, '3', '10500', '20 April 2022, 8:45', '04', '2022', '04-2022'),
(42, 'BR001', 1, '1', '2000', '23 February 2022, 6:42', '02', '2022', '02-2022'),
(51, 'BR004', 1, '2', '7000', '23 February 2022, 9:18', '02', '2022', '02-2022'),
(52, 'BR004', 1, '2', '7000', '23 February 2022, 9:18', '02', '2022', '02-2022'),
(53, 'BR004', 1, '1', '3500', '23 February 2022, 9:18', '02', '2022', '02-2022'),
(58, 'BR003', 1, '1', '2500', '20 August 2022, 9:24', '08', '2022', '08-2022'),
(60, 'BR002', 1, '1', '4000', '11 March 2022, 9:14', '03', '2022', '03-2022'),
(61, 'BR002', 1, '2', '8000', '15 March 2022, 9:16', '03', '2022', '03-2022'),
(63, 'BR001', 1, '5', '10000', '18 January 2022, 9:46', '01', '2022', '01-2022'),
(65, 'BR004', 1, '1', '3500', '21 March 2022, 15:04', '03', '2022', '03-2022'),
(66, 'BR004', 1, '2', '7000', '10 January 2022, 15:04', '01', '2022', '01-2022'),
(68, 'BR001', 1, '3', '6000', '29 March 2022, 8:38', '03', '2022', '03-2022'),
(69, 'BR002', 1, '2', '8000', '29 March 2022, 8:38', '03', '2022', '03-2022'),
(70, 'BR003', 1, '1', '2500', '29 March 2022, 8:38', '03', '2022', '03-2022'),
(71, 'BR001', 1, '1', '2000', '29 March 2022, 8:39', '03', '2022', '03-2022'),
(72, 'BR004', 1, '1', '3500', '29 March 2022, 8:54', '03', '2022', '03-2022'),
(73, 'BR004', 1, '1', '3500', '29 March 2022, 8:54', '03', '2022', '03-2022'),
(74, 'BR004', 1, '1', '3500', '29 March 2022, 8:54', '03', '2022', '03-2022');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(225) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `pelanggan` varchar(25) NOT NULL,
  `tanggal_input` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `jumlah`, `total`, `pelanggan`, `tanggal_input`) VALUES
(32, 'BR005', 1, '0', '0', '', '29 March 2022, 10:45'),
(33, 'BR006', 1, '0', '0', '', '29 March 2022, 10:46');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'Toko berkah semua', 'Jl. Simpang Bulan Surabaya', '081256874367', 'Susilo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_ibfk_1` (`id_kategori`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_pelanggan`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
