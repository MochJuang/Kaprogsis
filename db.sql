-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2019 at 02:14 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaprogsisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_jasa`
--

CREATE TABLE `tb_barang_jasa` (
  `kode_barang` varchar(4) NOT NULL,
  `nama_barang_jasa` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kategori` varchar(90) DEFAULT NULL,
  `deskripsi` text,
  `terjual` int(11) DEFAULT NULL,
  `foto` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_loker`
--

CREATE TABLE `tb_data_loker` (
  `id_loker` varchar(3) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `no_loker` varchar(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kamar` varchar(100) DEFAULT NULL,
  `type` enum('Notebook','Laptop') DEFAULT NULL,
  `merek` varchar(100) DEFAULT NULL,
  `warna` varchar(90) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` varchar(6) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id_kas` int(4) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `nominal` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kas`
--

INSERT INTO `tb_kas` (`id_kas`, `tanggal`, `aksi`, `deskripsi`, `nominal`, `saldo`) VALUES
(1, '2019-09-13 07:47:13', 'Pemasukan', 'Loker', 50000, 50000),
(2, '2019-09-13 07:14:14', 'Keluaran', 'Konsumsi', 5000, 45000),
(3, '2019-09-13 07:43:14', 'Pemasukan', 'Pk Uyeh', 2000000, 2045000),
(4, '2019-09-13 07:28:18', 'Keluaran', 'Ngopi', 500000, 1545000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `di_hadiri_oleh` varchar(100) NOT NULL,
  `waktu_kegiatan` varchar(100) NOT NULL,
  `dana` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(10) UNSIGNED ZEROFILL NOT NULL,
  `user` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `pesan` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `user`, `waktu`, `pesan`, `foto`) VALUES
(0000000001, 'Moch Juang P', '2019-09-13 07:23:21', 'Dmn woy', 'juang.jpg'),
(0000000002, 'Yusuf Firdaus', '2019-09-13 07:57:21', 'Di dieu yeuh', 'yusuf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_invoice` varchar(6) DEFAULT NULL,
  `kode_barang` varchar(4) DEFAULT NULL,
  `nama_barang_jasa` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(5) UNSIGNED ZEROFILL NOT NULL,
  `no_loker` varchar(5) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `status` enum('Diambil','Disimpan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_loker` varchar(3) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `no_loker` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role_id`) VALUES
(0000000001, 'aden', '95ba70888cef0e40630221379961273a', 0),
(0000000002, 'alfidoh', '350cf8c538f0ed60cd6dfe12d6477631', 1),
(0000000003, 'andi', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000004, 'asep', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000005, 'dantri', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000006, 'diva', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000007, 'habibah', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000008, 'japar', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000009, 'mms', 'c48c29157e2b358cc144027f3e2d8cb4', 1),
(0000000010, 'mochjuang', 'b81ffa88c49e6641f89a562d0b7fedea', 2),
(0000000011, 'yuniar', '350cf8c538f0ed60cd6dfe12d6477631', 0),
(0000000012, 'yusuf', '350cf8c538f0ed60cd6dfe12d6477631', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_userdetail`
--

CREATE TABLE `tb_userdetail` (
  `id_detail` int(2) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Kelas` varchar(50) DEFAULT NULL,
  `Kamar` varchar(50) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) NOT NULL,
  `golongan` enum('Putra','Putri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_userdetail`
--

INSERT INTO `tb_userdetail` (`id_detail`, `username`, `Nama`, `Kelas`, `Kamar`, `Alamat`, `divisi`, `foto`, `facebook`, `golongan`) VALUES
(1, 'alfidoh', 'Alfidoh Khoirunnisa', 'XI C RPL', '5 Al Badar', 'Tangerang', 'Wakil Ketua', 'alfidoh.jpg', 'Alfidoh Khoirunnisa', 'Putri'),
(2, 'andi', 'Andi Rifqoh', 'XI C Rpl', NULL, NULL, 'Kewirausahaan', 'andi.jpg', 'A. Rifqoh', 'Putri'),
(3, 'asep', 'Asep Abdul Hamid', 'XI A RPL', NULL, NULL, 'Kewirausahaan', 'asep.jpg', '', 'Putra'),
(4, 'dantri', 'Dantri Dhamareza', 'XI C Rpl', NULL, 'Jakarta', 'Sekretaris', 'dantri.jpg', 'Dantri Dhamareza\r\n', 'Putri'),
(5, 'diva', 'Diva Yulliana', 'XI C RPL', 'I An Nur', 'Bekasi', 'Laboran', 'diva.jpg', 'Diva Yulliana', 'Putri'),
(6, 'habibah', 'Habibah Nur Latifah', 'XI C RPL', NULL, NULL, 'Bendahara', 'habibah.jpg', '', 'Putri'),
(7, 'japar', 'Japar Shidiq', 'XI B RPL', NULL, NULL, 'Kebersihan', 'japar.jpg', '', 'Putra'),
(8, 'aden', 'M Shidiq Permana', 'XI A Rpl', 'Mimiyah 4-5', 'Jl. Safiraya no 10 Perum Barus Kota Sukabumi', 'Laboran', 'sidiq.jpg', 'M Shidiq Permana', 'Putra'),
(9, 'mms', 'Messa Sunandang', 'XI A Rpl', 'Mimiyah 3', 'Gekbrong Cianjur', 'Ketua', 'messa.jpg', 'M Messa Sunandang', 'Putra'),
(10, 'mochjuang', 'Moch Juang P', 'XI B Rpl', 'Ruqoyah 6', 'Sukabumi', 'Programmer', 'juang.jpg', 'Moch Juang', 'Putra'),
(11, 'yuniar', 'Yuniar Ayu Wulandari', 'XI C RPL', NULL, NULL, NULL, 'yuniar.jpg', '', 'Putri'),
(12, 'yusuf', 'Yusuf Firdaus', 'XI A RPL', '6 al-ghoniah', 'sukabumi | sukaraja | cimahpar endah 2 | 43192', 'Bendahara', 'yusuf.jpg', 'yunus lutfi m', 'Putra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang_jasa`
--
ALTER TABLE `tb_barang_jasa`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_data_loker`
--
ALTER TABLE `tb_data_loker`
  ADD PRIMARY KEY (`no_loker`),
  ADD KEY `id_loker` (`id_loker`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `dfads` (`user`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD UNIQUE KEY `id_kas` (`id_kas`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`waktu`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `dsfsd` (`user`),
  ADD KEY `tanggal` (`tanggal`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD KEY `tb_transaksi_ibfk_1` (`no_loker`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_userdetail`
--
ALTER TABLE `tb_userdetail`
  ADD PRIMARY KEY (`Nama`),
  ADD KEY `relasi_user` (`username`),
  ADD KEY `id_detail` (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id_kas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_userdetail`
--
ALTER TABLE `tb_userdetail`
  MODIFY `id_detail` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD CONSTRAINT `dfads` FOREIGN KEY (`user`) REFERENCES `tb_userdetail` (`Nama`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `tb_invoice` (`id_invoice`),
  ADD CONSTRAINT `tb_pesanan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang_jasa` (`kode_barang`);

--
-- Constraints for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `dsfsd` FOREIGN KEY (`user`) REFERENCES `tb_userdetail` (`Nama`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`no_loker`) REFERENCES `tb_data_loker` (`no_loker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_userdetail`
--
ALTER TABLE `tb_userdetail`
  ADD CONSTRAINT `relasi_user` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
