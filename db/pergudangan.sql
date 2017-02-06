-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2014 pada 04.18
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `pergudangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nm_barang`, `stok`, `harga`) VALUES
('B-002', 'PASTA GIGI', 40, 9000),
('BR002', 'IKAN CUPANG', 3, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_rusak`
--

CREATE TABLE IF NOT EXISTS `tbl_barang_rusak` (
  `kd_barang` varchar(5) NOT NULL,
  `kd_supplier` varchar(5) NOT NULL,
  `kd_pembelian` varchar(10) NOT NULL,
  `jumlah_barang_rusak` int(10) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_contact`
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
-- Dumping data untuk tabel `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'PT. Sejahtera Sentosa', 'Jl. Veteran, Malang', '1233456789', 'kita@gmail.com', 'http://kita.com', 'Kita', 'Supplier Barang Elektronik ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `kd_pegawai` varchar(5) NOT NULL DEFAULT '0',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('pegawai','admin') DEFAULT 'pegawai',
  PRIMARY KEY (`kd_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `username`, `password`, `nama`, `level`) VALUES
('K-001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin'),
('K-002', 'mila', 'f562f7f28a039094f7b602c033f106a4', 'Mila Anggraini', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
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
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_pembelian`, `kd_supplier`, `total_harga`, `tanggal_pembelian`, `kd_pegawai`) VALUES
('PB-001', 'P-001', 'Rp. 130,000.00', '2014-06-12', 'K-001'),
('PB-002', 'P-002', 'Rp. 1,700,000.00', '2014-06-12', 'K-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelian_detail` (
  `kd_pembelian` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian_detail`
--

INSERT INTO `tbl_pembelian_detail` (`kd_pembelian`, `kd_barang`, `qty`, `nm_barang`, `harga`) VALUES
('PB-001', 'BR002', 10, 'IKAN CUPANG', 3000),
('PB-002', 'B-002', 50, 'PASTA GIGI', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_detail` (
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  KEY `kd_barang` (`kd_barang`),
  KEY `kd_penjualan` (`kd_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`kd_penjualan`, `kd_barang`, `qty`) VALUES
('O-001', 'BR002', 5),
('O-001', 'B-002', 10),
('O-002', 'BR002', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_header`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_header` (
  `kd_penjualan` varchar(5) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `kd_pegawai` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kd_penjualan`),
  KEY `kd_pegawai` (`kd_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan_header`
--

INSERT INTO `tbl_penjualan_header` (`kd_penjualan`, `total_harga`, `tanggal_penjualan`, `kd_pegawai`) VALUES
('O-001', 'Rp. 105,000.00', '2014-06-12', 'K-001'),
('O-002', 'Rp. 6,000.00', '2014-06-12', 'K-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `kd_supplier` varchar(5) NOT NULL,
  `nm_supplier` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `email`) VALUES
('P-001', 'PT Sejahtera Sentosa', 'Jl Sentausa', 'sentosa@mail.com'),
('P-002', 'PT IIK', 'Jl Veteran, Malang No ooo', 'ptiik@mail.ub.ac.id');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tbl_barang` (`kd_barang`),
  ADD CONSTRAINT `tbl_penjualan_detail_ibfk_3` FOREIGN KEY (`kd_penjualan`) REFERENCES `tbl_penjualan_header` (`kd_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan_header`
--
ALTER TABLE `tbl_penjualan_header`
  ADD CONSTRAINT `tbl_penjualan_header_ibfk_1` FOREIGN KEY (`kd_pegawai`) REFERENCES `tbl_pegawai` (`kd_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
