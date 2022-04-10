-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 04:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tertanggung` varchar(100) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `no_sim` varchar(20) DEFAULT NULL,
  `no_rangka` varchar(20) DEFAULT NULL,
  `merk_kendaraan` varchar(25) DEFAULT NULL,
  `warna` varchar(25) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `no_polisi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table bengkel.tbl_customer: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `bengkel`.`tbl_customer`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerusakan`
--

CREATE TABLE `tbl_kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `kerusakan` text,
  `biaya` mediumint(9) NOT NULL,
  `status` enum('Konfirmasi','Belum Konfirmasi','Tolak') NOT NULL DEFAULT 'Belum Konfirmasi',
  `id_rekap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kerusakan`
--

INSERT INTO `tbl_kerusakan` (`id_kerusakan`, `kerusakan`, `biaya`, `status`, `id_rekap`) VALUES
(3, 'Rusak Semua', 1000000, 'Konfirmasi', 3),
(4, 'Rusak Semua', 500000, 'Konfirmasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_user`, `username`, `password`, `status`) VALUES
(16, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(17, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2'),
(18, 'ida', 'bf4ce4b62d3f793dc8f229bd7b4bf703', '1'),
(19, 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekap`
--

CREATE TABLE `tbl_rekap` (
  `id` int(11) NOT NULL,
  `nama_tertanggung` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `no_sim` varchar(20) DEFAULT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `merk_kendaraan` varchar(25) DEFAULT NULL,
  `warna_kendaraan` varchar(25) DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `no_rangka` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekap`
--

INSERT INTO `tbl_rekap` (`id`, `nama_tertanggung`, `no_hp`, `no_sim`, `no_polisi`, `merk_kendaraan`, `warna_kendaraan`, `tahun`, `no_rangka`) VALUES
(3, 'Bayu Aji', '081373221842', '999999999999', 'BG 117 A', 'Toyota', '0', 2016, '9999999999'),
(4, 'Bambang Susilo', '082177399948', '999999999999', 'AA-1 D', 'Audi', '0', 2016, '9999999999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`),
  ADD KEY `id_rekap` (`id_rekap`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `tbl_customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_login` (`id_user`);

--
-- Constraints for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD CONSTRAINT `tbl_kerusakan_ibfk_2` FOREIGN KEY (`id_rekap`) REFERENCES `tbl_rekap` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
