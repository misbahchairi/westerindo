-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 08:09 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `westerindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmasi`
--

CREATE TABLE IF NOT EXISTS `farmasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `last_stock` int(11) DEFAULT NULL,
  `total_in` int(11) DEFAULT NULL,
  `total_used` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `farmasi`
--

INSERT INTO `farmasi` (`id`, `nama`, `last_stock`, `total_in`, `total_used`) VALUES
(1, 'Amoxan 500mg', 256, NULL, 164),
(3, 'Cefadroxil 500mg', 88, NULL, 60),
(4, 'Sanprima Forte ', 93, NULL, 66);

-- --------------------------------------------------------

--
-- Table structure for table `m_anamnesa`
--

CREATE TABLE IF NOT EXISTS `m_anamnesa` (
  `id_anamnesa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_anamnesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `m_anamnesa`
--

INSERT INTO `m_anamnesa` (`id_anamnesa`, `nama`, `deskripsi`) VALUES
(1, 'batuk', ''),
(2, 'pilek', ''),
(3, 'sakit kepala', ''),
(4, 'sakit perut', ''),
(5, 'pusing', ''),
(6, 'mual', ''),
(7, 'muntah', ''),
(8, 'meriang', ''),
(9, 'pegal pegal', ''),
(10, 'sakit gigi', ''),
(11, 'sakit mata', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_diagnosa`
--

CREATE TABLE IF NOT EXISTS `m_diagnosa` (
  `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `is_aktif` int(11) NOT NULL,
  PRIMARY KEY (`id_diagnosa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_diagnosa`
--

INSERT INTO `m_diagnosa` (`id_diagnosa`, `nama`, `keterangan`, `is_aktif`) VALUES
(1, 'batuk', 'berdahak', 1),
(2, 'asem urat', 'bakso\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_dokter`
--

CREATE TABLE IF NOT EXISTS `m_dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `is_aktif` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `m_dokter`
--

INSERT INTO `m_dokter` (`id_dokter`, `nama`, `spesialis`, `alamat`, `email`, `no_telp`, `is_aktif`, `keterangan`, `username`, `password`, `foto`) VALUES
(5, 'saiful anwar', 'bedah', 'jalan sukun', 'anwar@gmail.com', '089123456789', 1, 'sudah 10 taun', 'anwar', 'dc468c70fb574ebd07287b38d0d0676d', 'uploads/51659bb542a46a8b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_obat`
--

CREATE TABLE IF NOT EXISTS `m_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(20) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `m_obat`
--

INSERT INTO `m_obat` (`id_obat`, `id_kategori`, `nama_obat`, `deskripsi`, `harga`, `stok`) VALUES
(2, '2', 'Puyer Rasa Semangka', 'puyer enak', '200000', 13),
(3, '3', 'Tolak Api', 'penghilang kantuk', '10000', 20);

-- --------------------------------------------------------

--
-- Table structure for table `m_obat_kategori`
--

CREATE TABLE IF NOT EXISTS `m_obat_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `m_obat_kategori`
--

INSERT INTO `m_obat_kategori` (`id`, `nama`) VALUES
(2, 'Obat Batuk'),
(3, 'Obat Pencahar'),
(4, 'Obat Masuk Angin');

-- --------------------------------------------------------

--
-- Table structure for table `m_pasien`
--

CREATE TABLE IF NOT EXISTS `m_pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `separtment` varchar(100) NOT NULL,
  `group` varchar(50) NOT NULL,
  `status_pgw` varchar(50) NOT NULL,
  `pers1` varchar(50) DEFAULT NULL,
  `pers2` varchar(50) DEFAULT NULL,
  `pers3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `m_pasien`
--

INSERT INTO `m_pasien` (`id_pasien`, `nik`, `nama`, `umur`, `sex`, `separtment`, `group`, `status_pgw`, `pers1`, `pers2`, `pers3`) VALUES
(1, '123456789', 'misbah', 18, 'l', 'separt', 'badak', 'kontrak', 'malangsoft', 'surabayasoft', 'jakartasoft'),
(2, '987654321', 'chairi', 19, 'p', 'seart 2', 'rajawali', 'tetap', 'PT. Levite', 'PT. Teh Pucuk', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_pf`
--

CREATE TABLE IF NOT EXISTS `m_pf` (
  `id_pf` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_pf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `m_pf`
--

INSERT INTO `m_pf` (`id_pf`, `nama`, `deskripsi`) VALUES
(1, 'pf pertama', 'yayaya');

-- --------------------------------------------------------

--
-- Table structure for table `m_rujukan`
--

CREATE TABLE IF NOT EXISTS `m_rujukan` (
  `id_rujukan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rs_dr` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `is_aktif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rujukan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `m_rujukan`
--

INSERT INTO `m_rujukan` (`id_rujukan`, `nama_rs_dr`, `alamat`, `no_telp`, `email`, `keterangan`, `is_aktif`) VALUES
(1, 'samsul', 'jalan mangga', '089123456789', 'samsul@gmail.com', 'semoga lekas sembuh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE IF NOT EXISTS `m_unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `m_unit`
--

INSERT INTO `m_unit` (`id_unit`, `kode`, `nama`) VALUES
(1, 'pakebajumerah', 'Jangan Sampe Lolos');

-- --------------------------------------------------------

--
-- Table structure for table `preventif`
--

CREATE TABLE IF NOT EXISTS `preventif` (
  `id_preventif` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `reccurent` varchar(50) NOT NULL,
  `materi1` varchar(255) DEFAULT NULL,
  `materi2` varchar(255) DEFAULT NULL,
  `materi3` varchar(255) DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_preventif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `preventif`
--

INSERT INTO `preventif` (`id_preventif`, `kategori`, `judul`, `deskripsi`, `tgl_kegiatan`, `reccurent`, `materi1`, `materi2`, `materi3`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
(18, '', 'minum tolak angin', 'jam 2-3, 1 liter', '2017-09-17', 'bulanan', 'Tutorial-Admin-Website.pdf', '', NULL, 'uploads/-161659ba2dcf08269.jpg', 'uploads/272859cb60b3b1ed5.jpg', NULL, NULL, NULL),
(19, '', 'berenang', 'biar kuat', '2017-09-14', 'tiga_bulan', 'Java_Printing1.pdf', 'LAPORAN-TUGAS-AKHIR-Dwiky-Alan2.pdf', NULL, 'uploads/111659bb95d6e8409.jpg', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotif`
--

CREATE TABLE IF NOT EXISTS `promotif` (
  `id_promotif` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `materi1` varchar(255) DEFAULT NULL,
  `materi2` varchar(255) DEFAULT NULL,
  `materi3` varchar(255) DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_promotif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `promotif`
--

INSERT INTO `promotif` (`id_promotif`, `judul`, `deskripsi`, `tgl_kegiatan`, `materi1`, `materi2`, `materi3`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
(8, 'Senam Pagi', 'Biar sehat', '2017-09-05', '', '', NULL, 'uploads/-191359b9fefcae9d0.jpg', '', NULL, NULL, NULL),
(9, 'Playon', 'biar sehat juga', '2017-09-08', '36740864-52002799-KAI.pdf', 'Jadwal_Berlaku_02_Jan_2017.pdf', NULL, 'uploads/-181259ba0353c32a5.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tensi`
--

CREATE TABLE IF NOT EXISTS `tensi` (
  `id_tensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `jenkel` varchar(11) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `bp` varchar(50) NOT NULL,
  `obat` varchar(50) NOT NULL,
  `status_minum` varchar(11) NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`id_tensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tensi`
--

INSERT INTO `tensi` (`id_tensi`, `nama`, `umur`, `jenkel`, `departement`, `bp`, `obat`, `status_minum`, `remark`) VALUES
(1, 'misbah', 'obat herbal', 'p', 'kesehatan', 'bepe', 'oba', 'y', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
