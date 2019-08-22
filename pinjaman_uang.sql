-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 04:04 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjaman_uang`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nominal_pembayaran` int(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `tanggal_pembayaran`, `nominal_pembayaran`, `bukti_pembayaran`, `status`) VALUES
(4, 7, '2019-05-01', 200000, '9f268c6bfae4a598e7bc7210f41c393a.jpg', 'Pembayaran Sukses'),
(6, 7, '2019-05-01', 200000, '9f268c6bfae4a598e7bc7210f41c393a.jpg', 'Pembayaran Sukses'),
(7, 6, '2019-05-02', 200000, '651634ab512acc17066f04f94a31d049.png', 'Pembayaran Sukses');

-- --------------------------------------------------------

--
-- Table structure for table `persaratan`
--

CREATE TABLE `persaratan` (
  `id_persaratan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nominal_gajih` int(50) NOT NULL,
  `nik` int(20) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `foto_diri` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persaratan`
--

INSERT INTO `persaratan` (`id_persaratan`, `id_user`, `tanggal_lahir`, `alamat`, `pekerjaan`, `nominal_gajih`, `nik`, `ktp`, `foto_diri`, `status`) VALUES
(6, 7, '1998-08-01', 'garut', 'PNS', 5000000, 123456789, '2.png', '1.png', 'Persaratan Lengkap'),
(7, 6, '1998-02-03', 'GArut', 'PNS', 100000, 123456789, '32fd7abf2dc939faee954072a7090862.jpg', '32fd7abf2dc939faee954072a7090862.jpg', 'Persaratan Lengkap'),
(8, 8, '2019-05-07', 'garut', 'PNS', 1000000, 12345, '9f268c6bfae4a598e7bc7210f41c393a.jpg', '9f268c6bfae4a598e7bc7210f41c393a.jpg', 'Persaratan Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `nominal_pinjam` int(50) NOT NULL,
  `rekening` int(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_user`, `tanggal_pinjam`, `nominal_pinjam`, `rekening`, `status`) VALUES
(8, 7, '2019-05-01', 500000, 1234567, 'Sukses'),
(9, 7, '2019-05-01', 200000, 1234567, 'Sukses'),
(10, 6, '2019-05-02', 500000, 1234567, 'Sukses'),
(11, 8, '2019-05-02', 400000, 1234567, 'Sedang di Tinjau');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `foto_user`, `username`, `password`, `level`) VALUES
(5, 'Faisal Dipki Hermawan', '9f268c6bfae4a598e7bc7210f41c393a.jpg', 'faisaldipkih', '123', 'admin'),
(6, 'Nirwan', '85cee0449b288bd7dbb2e646b39fa0f2--pastel-goth-dark-anime.jpg', 'ewok', '123', 'nasabah'),
(7, 'Sherin', '74fee802e44650cdc72caedd670f8733de83fd5c_hq.jpg', 'cein', '123', 'nasabah'),
(8, 'syahril', 'AICL2240.jpg', 'aril', '123', 'nasabah'),
(10, 'doni', 'Koala.jpg', 'don', '123', 'nasabah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_nasabah` (`id_user`);

--
-- Indexes for table `persaratan`
--
ALTER TABLE `persaratan`
  ADD PRIMARY KEY (`id_persaratan`),
  ADD KEY `id_nasabah` (`id_user`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_nasabah` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `persaratan`
--
ALTER TABLE `persaratan`
  MODIFY `id_persaratan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `persaratan`
--
ALTER TABLE `persaratan`
  ADD CONSTRAINT `persaratan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
