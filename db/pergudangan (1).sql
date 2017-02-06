-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2015 at 01:32 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pergudangan`
--
CREATE DATABASE IF NOT EXISTS `pergudangan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pergudangan`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nm_barang`, `stok`, `harga`) VALUES
('B-002', 'NIKKY', 25, 9000),
('BR002', 'IMMORTAL', 18, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_rusak`
--

CREATE TABLE IF NOT EXISTS `tbl_barang_rusak` (
  `kd_barang` varchar(15) NOT NULL,
  `kd_supplier` varchar(5) NOT NULL,
  `kd_pembelian` varchar(10) NOT NULL,
  `jumlah_barang_rusak` int(10) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_rusak`
--

INSERT INTO `tbl_barang_rusak` (`kd_barang`, `kd_supplier`, `kd_pembelian`, `jumlah_barang_rusak`) VALUES
('B-002', 'P-002', 'PB-002', 1),
('BR002', 'P-001', 'PB-001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'PT. Smart Company', 'Jl. Veteran, Malang', '085764543217', 'smart@gmail.com', 'http://smart.com', 'Prasojo Surya Gumelar', 'Supplier BArang Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `kd_pegawai` varchar(5) NOT NULL DEFAULT '0',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `username`, `password`, `nama`, `level`) VALUES
('K-001', 'admin', 'admin', 'Admin', 'admin'),
('K-002', 'fita', '20c1a26a55039b30866c9d0aa51953ca', 'Fita Lathifatul M', 'pegawai'),
('K-003', 'pergudangan', 'pergudangan', 'Rayan', 'pergudangan'),
('K-004', 'penjualan', 'penjualan', 'Fita', 'penjualan'),
('K-005', 'HR', 'hr', 'Lidya', 'hr'),
('K-006', 'delivery', 'del', 'Joko', 'delivery'),
('K-007', 'scm', 'scm', 'Paiman', 'scm'),
('K-008', 'AF', 'af', 'Ainin', 'af');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelian` (
  `kd_pembelian` varchar(6) NOT NULL,
  `kd_supplier` varchar(10) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kd_pegawai` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_pembelian`, `kd_supplier`, `total_harga`, `tanggal_pembelian`, `kd_pegawai`) VALUES
('PB-001', 'P-001', 'Rp. 130,000.00', '2014-06-12', 'K-001'),
('PB-002', 'P-002', 'Rp. 1,700,000.00', '2014-06-12', 'K-001'),
('PB-003', 'P-001', 'Rp. 1000.000', '2015-05-28', 'K-001'),
('PB-004', '', 'Rp. ', '2015-06-03', 'K-007');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelian_detail` (
  `kd_pembelian` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian_detail`
--

INSERT INTO `tbl_pembelian_detail` (`kd_pembelian`, `kd_barang`, `qty`, `nm_barang`, `harga`) VALUES
('PB-001', 'BR002', 10, 'IKAN CUPANG', 3000),
('PB-002', 'B-002', 50, 'PASTA GIGI', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_detail` (
  `kd_penjualan` varchar(15) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  KEY `kd_barang` (`kd_barang`),
  KEY `kd_penjualan` (`kd_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`kd_penjualan`, `kd_barang`, `qty`) VALUES
('O-001', 'BR002', 5),
('O-001', 'B-002', 10),
('O-002', 'BR002', 2),
('PJ-00', 'B-002', 4),
('PJ-00', 'B-002', 6),
('PJ-00', 'B-002', 1),
('PJ-00', 'B-002', 3),
('PJ-00', 'BR002', 1),
('PJ-003', 'BR002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_header`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_header` (
  `kd_penjualan` varchar(16) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `kd_pegawai` varchar(5) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Menunggu',
  PRIMARY KEY (`kd_penjualan`),
  KEY `kd_pegawai` (`kd_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_header`
--

INSERT INTO `tbl_penjualan_header` (`kd_penjualan`, `total_harga`, `tanggal_penjualan`, `kd_pegawai`, `status`) VALUES
('O-001', 'Rp. 105,000.00', '2014-06-12', 'K-001', 'Mengunggu'),
('O-002', 'Rp. 6,000.00', '2014-06-12', 'K-002', 'Mengunggu'),
('PJ-00', 'Rp. 36,000.00', '2015-06-03', 'K-004', 'selesai'),
('PJ-003', 'Rp. 3,000.00', '2015-06-03', 'K-004', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `kd_supplier` varchar(5) NOT NULL,
  `nm_supplier` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `email`) VALUES
('P-001', 'PT Sejahtera Sentosa', 'Jl Sentausa', 'sentosa@mail.com'),
('P-002', 'PT IIK', 'Jl Veteran, Malang No ooo', 'ptiik@mail.ub.ac.id');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tbl_barang` (`kd_barang`),
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_3` FOREIGN KEY (`kd_penjualan`) REFERENCES `tbl_penjualan_header` (`kd_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penjualan_header`
--
ALTER TABLE `tbl_penjualan_header`
  ADD CONSTRAINT `tbl_penjualan_header_ibfk_1` FOREIGN KEY (`kd_pegawai`) REFERENCES `tbl_pegawai` (`kd_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
