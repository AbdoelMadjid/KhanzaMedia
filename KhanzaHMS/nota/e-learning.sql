-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2012 at 04:59 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokir` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(20) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `gambar` varchar(150) NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--


-- --------------------------------------------------------

--
-- Table structure for table `detail_guru`
--

CREATE TABLE IF NOT EXISTS `detail_guru` (
  `id_detailguru` int(20) NOT NULL,
  `id_guru` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY (`id_detailguru`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_guru`
--


-- --------------------------------------------------------

--
-- Table structure for table `detail_siswa`
--

CREATE TABLE IF NOT EXISTS `detail_siswa` (
  `id_detailsiswa` int(20) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY (`id_detailsiswa`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_siswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`) VALUES
(1, 'paijo sdsd'),
(2, 'bejo');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_jawab`
--

CREATE TABLE IF NOT EXISTS `konsultasi_jawab` (
  `id_jawab` int(20) NOT NULL,
  `id_tanya` int(20) NOT NULL,
  `id_mapel` int(20) NOT NULL,
  `id_detailguru` int(20) NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam` datetime NOT NULL,
  PRIMARY KEY (`id_jawab`),
  KEY `id_tanya` (`id_tanya`,`id_mapel`,`id_detailguru`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_detailguru` (`id_detailguru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi_jawab`
--


-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_tanya`
--

CREATE TABLE IF NOT EXISTS `konsultasi_tanya` (
  `id_tanya` int(20) NOT NULL,
  `id_mapel` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `id_detailsiswa` int(20) NOT NULL,
  `pertanyaan` text NOT NULL,
  `penanya` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam` datetime NOT NULL,
  PRIMARY KEY (`id_tanya`),
  KEY `id_mapel` (`id_mapel`,`id_kelas`,`id_detailsiswa`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_detailsiswa` (`id_detailsiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi_tanya`
--


-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE IF NOT EXISTS `kuis` (
  `id_kuis` int(20) NOT NULL,
  `judul` text NOT NULL,
  `id_detailguru` int(20) NOT NULL,
  PRIMARY KEY (`id_kuis`),
  KEY `id_detailguru` (`id_detailguru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis`
--


-- --------------------------------------------------------

--
-- Table structure for table `kuis_nilai`
--

CREATE TABLE IF NOT EXISTS `kuis_nilai` (
  `id_nilai` int(20) NOT NULL,
  `id_kuis_soal` int(20) NOT NULL,
  `id_detailsiswa` int(20) NOT NULL,
  `benar` varchar(50) NOT NULL,
  `salah` varchar(50) NOT NULL,
  `kosong` varchar(50) NOT NULL,
  `point` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_kuis_soal` (`id_kuis_soal`,`id_detailsiswa`),
  KEY `id_detailsiswa` (`id_detailsiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis_nilai`
--


-- --------------------------------------------------------

--
-- Table structure for table `kuis_soal`
--

CREATE TABLE IF NOT EXISTS `kuis_soal` (
  `id_soal` int(20) NOT NULL,
  `id_kuis` int(20) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` varchar(20) NOT NULL,
  `pilihan_b` varchar(20) NOT NULL,
  `pilihan_c` varchar(20) NOT NULL,
  `pilihan_d` varchar(20) NOT NULL,
  `jawaban` varchar(20) NOT NULL,
  `publish` enum('1','2') NOT NULL,
  `tipe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `id_kuis` (`id_kuis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis_soal`
--


-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(20) NOT NULL,
  `id_detailguru` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `id_detailguru` (`id_detailguru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--


-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` int(20) NOT NULL,
  `id_detailguru` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` datetime NOT NULL,
  PRIMARY KEY (`id_materi`),
  KEY `id_detailguru` (`id_detailguru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--


-- --------------------------------------------------------

--
-- Table structure for table `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesion`
--

INSERT INTO `sesion` (`user`) VALUES
('ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nip` varchar(25) NOT NULL,
  `usere` varchar(600) NOT NULL DEFAULT '',
  `passwordte` varchar(600) DEFAULT NULL,
  `type` enum('ADMIN','PEGAWAI','DOSEN','OPERATOR') NOT NULL,
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `usere`, `passwordte`, `type`) VALUES
('ADMIN', 'admin', '‘àiˆªH2šHYb9àŠB', 'ADMIN');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_guru`
--
ALTER TABLE `detail_guru`
  ADD CONSTRAINT `detail_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD CONSTRAINT `detail_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `detail_guru` (`id_detailguru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsultasi_jawab`
--
ALTER TABLE `konsultasi_jawab`
  ADD CONSTRAINT `konsultasi_jawab_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_jawab_ibfk_4` FOREIGN KEY (`id_tanya`) REFERENCES `konsultasi_tanya` (`id_tanya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_jawab_ibfk_5` FOREIGN KEY (`id_detailguru`) REFERENCES `detail_guru` (`id_detailguru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsultasi_tanya`
--
ALTER TABLE `konsultasi_tanya`
  ADD CONSTRAINT `konsultasi_tanya_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_tanya_ibfk_3` FOREIGN KEY (`id_detailsiswa`) REFERENCES `detail_siswa` (`id_detailsiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_tanya_ibfk_4` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_ibfk_1` FOREIGN KEY (`id_detailguru`) REFERENCES `detail_guru` (`id_detailguru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuis_nilai`
--
ALTER TABLE `kuis_nilai`
  ADD CONSTRAINT `kuis_nilai_ibfk_1` FOREIGN KEY (`id_kuis_soal`) REFERENCES `kuis_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kuis_nilai_ibfk_2` FOREIGN KEY (`id_detailsiswa`) REFERENCES `detail_siswa` (`id_detailsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuis_soal`
--
ALTER TABLE `kuis_soal`
  ADD CONSTRAINT `kuis_soal_ibfk_1` FOREIGN KEY (`id_kuis`) REFERENCES `kuis` (`id_kuis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_detailguru`) REFERENCES `detail_guru` (`id_detailguru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_detailguru`) REFERENCES `detail_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
