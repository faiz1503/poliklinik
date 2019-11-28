-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2019 at 11:01 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `kd_dokter` int(100) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(100) NOT NULL,
  `alamat_dokter` varchar(100) NOT NULL,
  `telp_dokter` varchar(100) NOT NULL,
  `kd_poli` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kd_jadwal` int(100) NOT NULL,
  PRIMARY KEY (`kd_dokter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `nama_dokter`, `alamat_dokter`, `telp_dokter`, `kd_poli`, `gambar`, `kd_jadwal`) VALUES
(1, 'Roby', 'Jalan Jalan', '0812345678', 0, '3333', 0),
(2, 'Faiz', 'jalan jalan', '099773617', 0, 'tidak ada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktek`
--

CREATE TABLE IF NOT EXISTS `jadwal_praktek` (
  `kd_jadwal` int(100) NOT NULL AUTO_INCREMENT,
  `kd_dokter` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  PRIMARY KEY (`kd_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jadwal_praktek`
--

INSERT INTO `jadwal_praktek` (`kd_jadwal`, `kd_dokter`, `tanggal`, `jam_mulai`, `jam_selesai`) VALUES
(1, 0, '2016-03-02', '03:30:00', '04:30:00'),
(2, 0, '2016-03-03', '23:58:00', '21:56:00'),
(3, 0, '2016-03-04', '18:55:00', '16:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_biaya`
--

CREATE TABLE IF NOT EXISTS `jenis_biaya` (
  `kd_jenis_biaya` int(100) NOT NULL AUTO_INCREMENT,
  `nama_biaya` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL,
  PRIMARY KEY (`kd_jenis_biaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_biaya`
--

INSERT INTO `jenis_biaya` (`kd_jenis_biaya`, `nama_biaya`, `tarif`) VALUES
(1, 'Rawat jalan', 500000),
(2, 'Rawat Inap', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'faiz', '9d4d4ab0dfdb72a54b895d78b90b09c7', 'admin'),
(2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kd_obat` int(100) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`, `merk`, `satuan`, `harga_jual`) VALUES
(1, 'faiz', 'faiz', 'faiz', '9999'),
(2, 'tamvan', 'sekali', 'kilo', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `kd_pasien` int(100) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `telp_pasien` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  PRIMARY KEY (`kd_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama_pasien`, `alamat_pasien`, `telp_pasien`, `tgl_lahir`, `jenis_kelamin`, `tgl_registrasi`) VALUES
(1, 'tampan', 'jalanjaln', '098771831', '2016-03-21', 'L', '2016-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` int(100) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) NOT NULL,
  `alamat_pegawai` varchar(100) NOT NULL,
  `telp_pegawai` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `alamat_pegawai`, `telp_pegawai`, `tgl_lahir`, `jenis_kelamin`, `username`, `golongan`, `aktif`) VALUES
(1, 'Faiz Prata', 'jalan', 'jalan', '2016-04-21', 'L', 'Tamvan', 'S3', ''),
(2, 'Faiz Prata', 'jalan', 'jalan', '2016-04-21', 'L', 'Tamvan', 'S3', 'Y'),
(3, 'Faiz Pratama', 'jalan', 'jalan', '2016-04-22', 'L', 'Tamvan', 'S3', 'Y'),
(4, 'Faiz Prata', 'jalan', 'jalan', '0000-00-00', 'L', 'Tamvan', 'S3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `kd_pemeriksaan` int(100) NOT NULL AUTO_INCREMENT,
  `keluhan` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `perawatan` varchar(100) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `tensi_diastolik` varchar(100) NOT NULL,
  `tensi_sistolik` varchar(100) NOT NULL,
  `kd_pendaftaran` int(100) NOT NULL,
  PRIMARY KEY (`kd_pemeriksaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`kd_pemeriksaan`, `keluhan`, `diagnosa`, `perawatan`, `tindakan`, `berat_badan`, `tensi_diastolik`, `tensi_sistolik`, `kd_pendaftaran`) VALUES
(1, 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `kd_pendaftaran` int(100) NOT NULL AUTO_INCREMENT,
  `tgl_pendaftaran` date NOT NULL,
  `kd_pasien` int(100) NOT NULL,
  `no_urut` int(100) NOT NULL,
  `nip` int(100) NOT NULL,
  `kd_jenis_biaya` int(100) NOT NULL,
  `kd_jadwal` int(100) NOT NULL,
  `kd_obat` int(100) NOT NULL,
  PRIMARY KEY (`kd_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`kd_pendaftaran`, `tgl_pendaftaran`, `kd_pasien`, `no_urut`, `nip`, `kd_jenis_biaya`, `kd_jadwal`, `kd_obat`) VALUES
(1, '2016-03-04', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE IF NOT EXISTS `poliklinik` (
  `kd_poli` int(100) NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_poli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `poliklinik`
--


-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `kd_resep` int(100) NOT NULL AUTO_INCREMENT,
  `dosis` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `kd_obat` int(100) NOT NULL,
  `kd_pemeriksaan` int(100) NOT NULL,
  PRIMARY KEY (`kd_resep`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`kd_resep`, `dosis`, `jumlah`, `kd_obat`, `kd_pemeriksaan`) VALUES
(1, '1 Kali sebulan', '5', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
