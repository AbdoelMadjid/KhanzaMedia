-- MySQL dump 10.13  Distrib 5.1.33, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: sik
-- ------------------------------------------------------
-- Server version	5.1.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `usere` text,
  `passworde` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (AES_ENCRYPT('spv','nur'),AES_ENCRYPT('server','windi'));
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ambil_premi`
--

DROP TABLE IF EXISTS `ambil_premi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambil_premi` (
  `tgl` date NOT NULL,
  `id` int(11) NOT NULL,
  `id_premi` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `jamhm` int(11) NOT NULL,
  PRIMARY KEY (`tgl`,`id`),
  KEY `id` (`id`),
  KEY `id_premi` (`id_premi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambil_premi`
--

LOCK TABLES `ambil_premi` WRITE;
/*!40000 ALTER TABLE `ambil_premi` DISABLE KEYS */;
/*!40000 ALTER TABLE `ambil_premi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `post` datetime DEFAULT NULL,
  `pengirim` varchar(50) DEFAULT NULL,
  `page` enum('artikel','home','kontak') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikel`
--

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asuransi`
--

DROP TABLE IF EXISTS `asuransi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asuransi` (
  `stts` char(5) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`stts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asuransi`
--

LOCK TABLES `asuransi` WRITE;
/*!40000 ALTER TABLE `asuransi` DISABLE KEYS */;
/*!40000 ALTER TABLE `asuransi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangsal`
--

DROP TABLE IF EXISTS `bangsal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangsal` (
  `kd_bangsal` char(5) NOT NULL,
  `nm_bangsal` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_bangsal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangsal`
--

LOCK TABLES `bangsal` WRITE;
/*!40000 ALTER TABLE `bangsal` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangsal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barcode`
--

DROP TABLE IF EXISTS `barcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcode` (
  `nip` varchar(20) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  PRIMARY KEY (`nip`),
  UNIQUE KEY `barcode` (`barcode`),
  CONSTRAINT `barcode_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcode`
--

LOCK TABLES `barcode` WRITE;
/*!40000 ALTER TABLE `barcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `barcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bayar_piutang`
--

DROP TABLE IF EXISTS `bayar_piutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bayar_piutang` (
  `tgl_bayar` date NOT NULL,
  `no_rkm_medis` varchar(10) NOT NULL,
  `besar_cicilan` double NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `no_rawat` varchar(17) NOT NULL,
  PRIMARY KEY (`tgl_bayar`,`no_rkm_medis`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  KEY `nota_piutang` (`no_rawat`),
  CONSTRAINT `bayar_piutang_ibfk_1` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bayar_piutang`
--

LOCK TABLES `bayar_piutang` WRITE;
/*!40000 ALTER TABLE `bayar_piutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `bayar_piutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beri_obat_operasi`
--

DROP TABLE IF EXISTS `beri_obat_operasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beri_obat_operasi` (
  `no_rawat` varchar(17) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_obat` varchar(15) NOT NULL,
  `hargasatuan` double NOT NULL,
  `jumlah` double NOT NULL,
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_obat` (`kd_obat`),
  CONSTRAINT `beri_obat_operasi_ibfk_2` FOREIGN KEY (`kd_obat`) REFERENCES `obatbhp_ok` (`kd_obat`) ON UPDATE CASCADE,
  CONSTRAINT `beri_obat_operasi_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beri_obat_operasi`
--

LOCK TABLES `beri_obat_operasi` WRITE;
/*!40000 ALTER TABLE `beri_obat_operasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `beri_obat_operasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biaya_harian`
--

DROP TABLE IF EXISTS `biaya_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biaya_harian` (
  `kd_kamar` varchar(15) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `besar_biaya` double NOT NULL,
  `jml` int(11) NOT NULL,
  PRIMARY KEY (`kd_kamar`,`nama_biaya`),
  CONSTRAINT `biaya_harian_ibfk_1` FOREIGN KEY (`kd_kamar`) REFERENCES `kamar` (`kd_kamar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biaya_harian`
--

LOCK TABLES `biaya_harian` WRITE;
/*!40000 ALTER TABLE `biaya_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `biaya_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biaya_sekali`
--

DROP TABLE IF EXISTS `biaya_sekali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biaya_sekali` (
  `kd_kamar` varchar(8) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `besar_biaya` double NOT NULL,
  PRIMARY KEY (`kd_kamar`,`nama_biaya`),
  KEY `kd_kamar` (`kd_kamar`),
  CONSTRAINT `biaya_sekali_ibfk_1` FOREIGN KEY (`kd_kamar`) REFERENCES `kamar` (`kd_kamar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biaya_sekali`
--

LOCK TABLES `biaya_sekali` WRITE;
/*!40000 ALTER TABLE `biaya_sekali` DISABLE KEYS */;
/*!40000 ALTER TABLE `biaya_sekali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing` (
  `noindex` int(100) NOT NULL AUTO_INCREMENT,
  `no_rawat` varchar(17) NOT NULL,
  `tgl_byr` date DEFAULT NULL,
  `no` varchar(50) NOT NULL,
  `nm_perawatan` varchar(200) NOT NULL,
  `pemisah` char(1) NOT NULL,
  `biaya` double NOT NULL,
  `jumlah` double NOT NULL,
  `tambahan` double NOT NULL,
  `totalbiaya` double NOT NULL,
  `status` enum('Obat','Ranap Dokter','Ranap Paramedis','Ralan Dokter','Ralan Paramedis','Tambahan','Potongan','Administrasi','Kamar','-','Registrasi','Harian','TtlObat','TtlRanap Dokter','TtlRanap Paramedis','TtlRalan Dokter','TtlRalan Paramedis','TtlKamar','Dokter','Perawat','TtlTambahan','Retur Obat','TtlRetur Obat','Resep Pulang','TtlResep Pulang','TtlPotongan') NOT NULL,
  PRIMARY KEY (`noindex`),
  KEY `no_rawat` (`no_rawat`),
  CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing`
--

LOCK TABLES `billing` WRITE;
/*!40000 ALTER TABLE `billing` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_bayi`
--

DROP TABLE IF EXISTS `billing_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `biaya_rw_jl_dr` double DEFAULT NULL,
  `biaya_rw_inap_dr` double DEFAULT NULL,
  `biaya_rw_jl_pr` double DEFAULT NULL,
  `biaya_rw_inap_pr` double DEFAULT NULL,
  `biaya_obat` double DEFAULT NULL,
  `biaya_infus` double DEFAULT NULL,
  `biaya_kamar` double DEFAULT NULL,
  `biaya_registrasi` double DEFAULT NULL,
  `biaya_lain` double DEFAULT NULL,
  `potongan` double DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  `tgl_byr` date DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  CONSTRAINT `billing_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_bayi`
--

LOCK TABLES `billing_bayi` WRITE;
/*!40000 ALTER TABLE `billing_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_ibu`
--

DROP TABLE IF EXISTS `billing_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `biaya_rw_jl_dr` double DEFAULT NULL,
  `biaya_rw_inap_dr` double DEFAULT NULL,
  `biaya_rw_jl_pr` double DEFAULT NULL,
  `biaya_rw_inap_pr` double DEFAULT NULL,
  `biaya_obat` double DEFAULT NULL,
  `biaya_infus` double DEFAULT NULL,
  `biaya_kamar` double DEFAULT NULL,
  `biaya_registrasi` double DEFAULT NULL,
  `biaya_lain` double DEFAULT NULL,
  `potongan` double DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  `tgl_byr` date DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  CONSTRAINT `billing_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_ibu`
--

LOCK TABLES `billing_ibu` WRITE;
/*!40000 ALTER TABLE `billing_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `databarang`
--

DROP TABLE IF EXISTS `databarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `databarang` (
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(50) DEFAULT NULL,
  `kode_sat` char(3) DEFAULT NULL,
  `letak_barang` varchar(50) DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `h_distributor` double DEFAULT NULL,
  `h_grosir` double DEFAULT NULL,
  `h_retail` double DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `kdjns` char(4) DEFAULT NULL,
  `kapasitas` double NOT NULL,
  PRIMARY KEY (`kode_brng`),
  KEY `kode_sat` (`kode_sat`),
  KEY `kdjns` (`kdjns`),
  CONSTRAINT `databarang_ibfk_1` FOREIGN KEY (`kode_sat`) REFERENCES `kodesatuan` (`kode_sat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `databarang_ibfk_2` FOREIGN KEY (`kdjns`) REFERENCES `jenis` (`kdjns`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `databarang`
--

LOCK TABLES `databarang` WRITE;
/*!40000 ALTER TABLE `databarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `databarang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datasuplier`
--

DROP TABLE IF EXISTS `datasuplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datasuplier` (
  `kode_suplier` char(5) NOT NULL,
  `nama_suplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`kode_suplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datasuplier`
--

LOCK TABLES `datasuplier` WRITE;
/*!40000 ALTER TABLE `datasuplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `datasuplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_beri_diet`
--

DROP TABLE IF EXISTS `detail_beri_diet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_beri_diet` (
  `no_rawat` varchar(17) NOT NULL,
  `kd_kamar` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` enum('Pagi','Siang','Sore','Malam') NOT NULL,
  `kd_diet` varchar(3) NOT NULL,
  PRIMARY KEY (`no_rawat`,`kd_kamar`,`tanggal`,`waktu`),
  KEY `kd_kamar` (`kd_kamar`),
  KEY `kd_diet` (`kd_diet`),
  CONSTRAINT `detail_beri_diet_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_beri_diet_ibfk_2` FOREIGN KEY (`kd_kamar`) REFERENCES `kamar` (`kd_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_beri_diet_ibfk_3` FOREIGN KEY (`kd_diet`) REFERENCES `diet` (`kd_diet`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_beri_diet`
--

LOCK TABLES `detail_beri_diet` WRITE;
/*!40000 ALTER TABLE `detail_beri_diet` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_beri_diet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pemberian_infus`
--

DROP TABLE IF EXISTS `detail_pemberian_infus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pemberian_infus` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_pemberian` time NOT NULL DEFAULT '00:00:00',
  `kd_jns_infus` varchar(7) NOT NULL DEFAULT '',
  `biaya_infus` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`tgl_perawatan`,`jam_pemberian`,`kd_jns_infus`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_jns_infus` (`kd_jns_infus`),
  CONSTRAINT `detail_pemberian_infus_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_infus_ibfk_2` FOREIGN KEY (`kd_jns_infus`) REFERENCES `jenis_infus` (`kd_jns_infus`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pemberian_infus`
--

LOCK TABLES `detail_pemberian_infus` WRITE;
/*!40000 ALTER TABLE `detail_pemberian_infus` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemberian_infus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pemberian_infus_bayi`
--

DROP TABLE IF EXISTS `detail_pemberian_infus_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pemberian_infus_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_pemberian` time NOT NULL DEFAULT '00:00:00',
  `kd_jns_infus` varchar(7) NOT NULL DEFAULT '',
  `biaya_infus` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`tgl_perawatan`,`jam_pemberian`,`kd_jns_infus`),
  KEY `kd_jns_infus` (`kd_jns_infus`),
  CONSTRAINT `detail_pemberian_infus_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_infus_bayi_ibfk_2` FOREIGN KEY (`kd_jns_infus`) REFERENCES `jenis_infus` (`kd_jns_infus`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pemberian_infus_bayi`
--

LOCK TABLES `detail_pemberian_infus_bayi` WRITE;
/*!40000 ALTER TABLE `detail_pemberian_infus_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemberian_infus_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pemberian_infus_ibu`
--

DROP TABLE IF EXISTS `detail_pemberian_infus_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pemberian_infus_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_pemberian` time NOT NULL DEFAULT '00:00:00',
  `kd_jns_infus` varchar(7) NOT NULL DEFAULT '',
  `biaya_infus` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`tgl_perawatan`,`jam_pemberian`,`kd_jns_infus`),
  KEY `kd_jns_infus` (`kd_jns_infus`),
  CONSTRAINT `detail_pemberian_infus_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_infus_ibu_ibfk_2` FOREIGN KEY (`kd_jns_infus`) REFERENCES `jenis_infus` (`kd_jns_infus`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pemberian_infus_ibu`
--

LOCK TABLES `detail_pemberian_infus_ibu` WRITE;
/*!40000 ALTER TABLE `detail_pemberian_infus_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemberian_infus_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pemberian_obat`
--

DROP TABLE IF EXISTS `detail_pemberian_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pemberian_obat` (
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam` time NOT NULL DEFAULT '00:00:00',
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `diagnosa` text,
  `kode_brng` varchar(15) NOT NULL,
  `biaya_obat` double DEFAULT NULL,
  `jml` double NOT NULL,
  `tambahan` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`tgl_perawatan`,`jam`,`no_rawat`,`kd_penyakit`,`kode_brng`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `detail_pemberian_obat_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_obat_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_obat_ibfk_4` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pemberian_obat`
--

LOCK TABLES `detail_pemberian_obat` WRITE;
/*!40000 ALTER TABLE `detail_pemberian_obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemberian_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pemberian_obat_bayi`
--

DROP TABLE IF EXISTS `detail_pemberian_obat_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pemberian_obat_bayi` (
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam` time NOT NULL DEFAULT '00:00:00',
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `diagnosa` text,
  `kode_brng` varchar(15) NOT NULL,
  `biaya_obat` double DEFAULT NULL,
  `jml` int(11) NOT NULL,
  `tambahan` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`tgl_perawatan`,`jam`,`no_rawat`,`kd_penyakit`,`kode_brng`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `detail_pemberian_obat_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_obat_bayi_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_obat_bayi_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pemberian_obat_bayi`
--

LOCK TABLES `detail_pemberian_obat_bayi` WRITE;
/*!40000 ALTER TABLE `detail_pemberian_obat_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemberian_obat_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pemberian_obat_ibu`
--

DROP TABLE IF EXISTS `detail_pemberian_obat_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pemberian_obat_ibu` (
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam` time NOT NULL DEFAULT '00:00:00',
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `diagnosa` text,
  `kode_brng` varchar(15) NOT NULL,
  `biaya_obat` double DEFAULT NULL,
  `jml` int(11) NOT NULL,
  `tambahan` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`tgl_perawatan`,`jam`,`no_rawat`,`kd_penyakit`,`kode_brng`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `detail_pemberian_obat_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_obat_ibu_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pemberian_obat_ibu_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pemberian_obat_ibu`
--

LOCK TABLES `detail_pemberian_obat_ibu` WRITE;
/*!40000 ALTER TABLE `detail_pemberian_obat_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemberian_obat_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_periksa_lab`
--

DROP TABLE IF EXISTS `detail_periksa_lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_periksa_lab` (
  `no_rawat` varchar(17) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `jam` time NOT NULL,
  `id_template` int(11) NOT NULL,
  `nilai` varchar(60) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`tgl_periksa`,`jam`,`id_template`),
  KEY `id_template` (`id_template`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  CONSTRAINT `detail_periksa_lab_ibfk_4` FOREIGN KEY (`id_template`) REFERENCES `template_laboratorium` (`id_template`) ON UPDATE CASCADE,
  CONSTRAINT `detail_periksa_lab_ibfk_6` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `detail_periksa_lab_ibfk_7` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_periksa_lab`
--

LOCK TABLES `detail_periksa_lab` WRITE;
/*!40000 ALTER TABLE `detail_periksa_lab` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_periksa_lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detailbeli`
--

DROP TABLE IF EXISTS `detailbeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailbeli` (
  `no_faktur` varchar(15) NOT NULL,
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `kode_sat` char(3) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `dis` double NOT NULL,
  `besardis` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`no_faktur`,`kode_brng`),
  KEY `no_faktur` (`no_faktur`),
  KEY `kode_brng` (`kode_brng`),
  KEY `kode_sat` (`kode_sat`),
  CONSTRAINT `detailbeli_ibfk_5` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `detailbeli_ibfk_6` FOREIGN KEY (`kode_sat`) REFERENCES `kodesatuan` (`kode_sat`) ON UPDATE CASCADE,
  CONSTRAINT `detailbeli_ibfk_7` FOREIGN KEY (`no_faktur`) REFERENCES `pembelian` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailbeli`
--

LOCK TABLES `detailbeli` WRITE;
/*!40000 ALTER TABLE `detailbeli` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailbeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detailjual`
--

DROP TABLE IF EXISTS `detailjual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailjual` (
  `nota_jual` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `kode_sat` char(3) DEFAULT NULL,
  `h_jual` double DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `dis` double DEFAULT NULL,
  `bsr_dis` double DEFAULT NULL,
  `tambahan` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`nota_jual`,`kode_brng`),
  KEY `nota_jual` (`nota_jual`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `detailjual_ibfk_1` FOREIGN KEY (`nota_jual`) REFERENCES `penjualan` (`nota_jual`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detailjual_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailjual`
--

LOCK TABLES `detailjual` WRITE;
/*!40000 ALTER TABLE `detailjual` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailjual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detailjurnal`
--

DROP TABLE IF EXISTS `detailjurnal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailjurnal` (
  `no_jurnal` varchar(8) DEFAULT NULL,
  `kd_rek` char(5) DEFAULT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  KEY `no_jurnal` (`no_jurnal`),
  KEY `kd_rek` (`kd_rek`),
  CONSTRAINT `detailjurnal_ibfk_1` FOREIGN KEY (`no_jurnal`) REFERENCES `jurnal` (`no_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detailjurnal_ibfk_2` FOREIGN KEY (`kd_rek`) REFERENCES `rekening` (`kd_rek`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailjurnal`
--

LOCK TABLES `detailjurnal` WRITE;
/*!40000 ALTER TABLE `detailjurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailjurnal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detailpiutang`
--

DROP TABLE IF EXISTS `detailpiutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailpiutang` (
  `nota_piutang` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `kode_sat` char(3) DEFAULT NULL,
  `h_jual` double DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `dis` double DEFAULT NULL,
  `bsr_dis` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`nota_piutang`,`kode_brng`),
  KEY `nota_jual` (`nota_piutang`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `detailpiutang_ibfk_1` FOREIGN KEY (`nota_piutang`) REFERENCES `piutang` (`nota_piutang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detailpiutang_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailpiutang`
--

LOCK TABLES `detailpiutang` WRITE;
/*!40000 ALTER TABLE `detailpiutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailpiutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detreturbeli`
--

DROP TABLE IF EXISTS `detreturbeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detreturbeli` (
  `no_retur_beli` varchar(8) NOT NULL DEFAULT '',
  `no_faktur` varchar(15) NOT NULL,
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `kode_sat` char(3) DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `jml_beli` double DEFAULT NULL,
  `h_retur` double DEFAULT NULL,
  `jml_retur` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`no_retur_beli`,`no_faktur`,`kode_brng`),
  KEY `no_retur_beli` (`no_retur_beli`),
  KEY `no_faktur` (`no_faktur`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `detreturbeli_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `detreturbeli_ibfk_3` FOREIGN KEY (`no_retur_beli`) REFERENCES `returbeli` (`no_retur_beli`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detreturbeli`
--

LOCK TABLES `detreturbeli` WRITE;
/*!40000 ALTER TABLE `detreturbeli` DISABLE KEYS */;
/*!40000 ALTER TABLE `detreturbeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detreturjual`
--

DROP TABLE IF EXISTS `detreturjual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detreturjual` (
  `no_retur_jual` varchar(8) NOT NULL DEFAULT '',
  `nota_jual` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `kode_sat` char(3) DEFAULT NULL,
  `jml_jual` double DEFAULT NULL,
  `h_jual` double DEFAULT NULL,
  `jml_retur` double DEFAULT NULL,
  `h_retur` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`no_retur_jual`,`nota_jual`,`kode_brng`),
  KEY `no_retur_jual` (`no_retur_jual`),
  KEY `nota_jual` (`nota_jual`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `detreturjual_ibfk_1` FOREIGN KEY (`no_retur_jual`) REFERENCES `returjual` (`no_retur_jual`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detreturjual_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detreturjual`
--

LOCK TABLES `detreturjual` WRITE;
/*!40000 ALTER TABLE `detreturjual` DISABLE KEYS */;
/*!40000 ALTER TABLE `detreturjual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detreturpiutang`
--

DROP TABLE IF EXISTS `detreturpiutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detreturpiutang` (
  `no_retur_piutang` varchar(8) NOT NULL DEFAULT '',
  `nota_piutang` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `kode_sat` char(3) DEFAULT NULL,
  `jml_piutang` double DEFAULT NULL,
  `h_piutang` double DEFAULT NULL,
  `jml_retur` double DEFAULT NULL,
  `h_retur` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`no_retur_piutang`,`nota_piutang`,`kode_brng`),
  KEY `no_retur_piutang` (`no_retur_piutang`),
  KEY `nota_piutang` (`nota_piutang`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `detreturpiutang_ibfk_4` FOREIGN KEY (`no_retur_piutang`) REFERENCES `returpiutang` (`no_retur_piutang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detreturpiutang_ibfk_5` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detreturpiutang`
--

LOCK TABLES `detreturpiutang` WRITE;
/*!40000 ALTER TABLE `detreturpiutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `detreturpiutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diet`
--

DROP TABLE IF EXISTS `diet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diet` (
  `kd_diet` varchar(3) NOT NULL,
  `nama_diet` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_diet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diet`
--

LOCK TABLES `diet` WRITE;
/*!40000 ALTER TABLE `diet` DISABLE KEYS */;
/*!40000 ALTER TABLE `diet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokter` (
  `kd_dokter` varchar(20) NOT NULL,
  `nm_dokter` varchar(40) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tmp_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gol_drh` enum('A','B','O','AB','-') DEFAULT NULL,
  `agama` varchar(12) DEFAULT NULL,
  `almt_tgl` varchar(60) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `stts_nikah` enum('SINGLE','MENIKAH','JANDA','DUDHA') DEFAULT NULL,
  `kd_sps` char(5) DEFAULT NULL,
  `alumni` varchar(60) DEFAULT NULL,
  `no_ijn_praktek` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kd_dokter`),
  KEY `kd_sps` (`kd_sps`),
  CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`kd_sps`) REFERENCES `spesialis` (`kd_sps`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudangbarang`
--

DROP TABLE IF EXISTS `gudangbarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudangbarang` (
  `kode_brng` varchar(15) NOT NULL,
  `kd_bangsal` char(5) NOT NULL DEFAULT '',
  `stok` double NOT NULL,
  PRIMARY KEY (`kd_bangsal`,`kode_brng`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `gudangbarang_ibfk_1` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE,
  CONSTRAINT `gudangbarang_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudangbarang`
--

LOCK TABLES `gudangbarang` WRITE;
/*!40000 ALTER TABLE `gudangbarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `gudangbarang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris`
--

DROP TABLE IF EXISTS `inventaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris` (
  `no_inventaris` varchar(20) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `asal_barang` enum('Beli','Bantuan','Hibah','-') DEFAULT NULL,
  `tgl_pengadaan` date DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `status_barang` enum('Ada','Rusak','Hilang','Perbaikan','Dipinjam','-') DEFAULT NULL,
  `id_ruang` char(5) DEFAULT NULL,
  `no_rak` char(3) DEFAULT NULL,
  `no_box` char(3) DEFAULT NULL,
  PRIMARY KEY (`no_inventaris`),
  KEY `kode_barang` (`kode_barang`),
  KEY `kd_ruang` (`id_ruang`),
  CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `inventaris_barang` (`kode_barang`) ON UPDATE CASCADE,
  CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `inventaris_ruang` (`id_ruang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris`
--

LOCK TABLES `inventaris` WRITE;
/*!40000 ALTER TABLE `inventaris` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_barang`
--

DROP TABLE IF EXISTS `inventaris_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_barang` (
  `kode_barang` varchar(10) NOT NULL DEFAULT '',
  `nama_barang` varchar(60) DEFAULT NULL,
  `jml_barang` int(11) DEFAULT NULL,
  `kode_produsen` varchar(10) DEFAULT NULL,
  `id_merk` varchar(7) DEFAULT NULL,
  `thn_produksi` year(4) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `id_kategori` char(5) DEFAULT NULL,
  `id_jenis` char(5) DEFAULT NULL,
  PRIMARY KEY (`kode_barang`),
  KEY `kode_produsen` (`kode_produsen`),
  KEY `id_merk` (`id_merk`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_jenis` (`id_jenis`),
  CONSTRAINT `inventaris_barang_ibfk_5` FOREIGN KEY (`kode_produsen`) REFERENCES `inventaris_produsen` (`kode_produsen`) ON UPDATE CASCADE,
  CONSTRAINT `inventaris_barang_ibfk_6` FOREIGN KEY (`id_merk`) REFERENCES `inventaris_merk` (`id_merk`) ON UPDATE CASCADE,
  CONSTRAINT `inventaris_barang_ibfk_7` FOREIGN KEY (`id_kategori`) REFERENCES `inventaris_kategori` (`id_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `inventaris_barang_ibfk_8` FOREIGN KEY (`id_jenis`) REFERENCES `inventaris_jenis` (`id_jenis`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_barang`
--

LOCK TABLES `inventaris_barang` WRITE;
/*!40000 ALTER TABLE `inventaris_barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_jenis`
--

DROP TABLE IF EXISTS `inventaris_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_jenis` (
  `id_jenis` char(5) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_jenis`
--

LOCK TABLES `inventaris_jenis` WRITE;
/*!40000 ALTER TABLE `inventaris_jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_kategori`
--

DROP TABLE IF EXISTS `inventaris_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_kategori` (
  `id_kategori` char(5) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_kategori`
--

LOCK TABLES `inventaris_kategori` WRITE;
/*!40000 ALTER TABLE `inventaris_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_merk`
--

DROP TABLE IF EXISTS `inventaris_merk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_merk` (
  `id_merk` varchar(7) NOT NULL,
  `nama_merk` varchar(40) NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_merk`
--

LOCK TABLES `inventaris_merk` WRITE;
/*!40000 ALTER TABLE `inventaris_merk` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_merk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_peminjaman`
--

DROP TABLE IF EXISTS `inventaris_peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_peminjaman` (
  `peminjam` varchar(50) NOT NULL DEFAULT '',
  `tlp` varchar(13) NOT NULL,
  `no_inventaris` varchar(20) NOT NULL DEFAULT '',
  `tgl_pinjam` date NOT NULL DEFAULT '0000-00-00',
  `tgl_kembali` date DEFAULT NULL,
  `nip` varchar(20) NOT NULL DEFAULT '',
  `status_pinjam` enum('Masih Dipinjam','Sudah Kembali') DEFAULT NULL,
  PRIMARY KEY (`peminjam`,`no_inventaris`,`tgl_pinjam`,`nip`),
  KEY `no_inventaris` (`no_inventaris`),
  KEY `nip` (`nip`),
  CONSTRAINT `inventaris_peminjaman_ibfk_1` FOREIGN KEY (`no_inventaris`) REFERENCES `inventaris` (`no_inventaris`) ON UPDATE CASCADE,
  CONSTRAINT `inventaris_peminjaman_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_peminjaman`
--

LOCK TABLES `inventaris_peminjaman` WRITE;
/*!40000 ALTER TABLE `inventaris_peminjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_produsen`
--

DROP TABLE IF EXISTS `inventaris_produsen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_produsen` (
  `kode_produsen` varchar(10) NOT NULL,
  `nama_produsen` varchar(40) DEFAULT NULL,
  `alamat_produsen` varchar(70) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `website_produsen` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_produsen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_produsen`
--

LOCK TABLES `inventaris_produsen` WRITE;
/*!40000 ALTER TABLE `inventaris_produsen` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_produsen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaris_ruang`
--

DROP TABLE IF EXISTS `inventaris_ruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris_ruang` (
  `id_ruang` varchar(5) NOT NULL,
  `nama_ruang` varchar(40) NOT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris_ruang`
--

LOCK TABLES `inventaris_ruang` WRITE;
/*!40000 ALTER TABLE `inventaris_ruang` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaris_ruang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `kd_jbtn` char(4) NOT NULL DEFAULT '',
  `nm_jbtn` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kd_jbtn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `kd_dokter` varchar(20) NOT NULL,
  `hari_kerja` enum('SENIN','SELASA','RABU','KAMIS','JUMAT','SABTU','AKHAD') NOT NULL DEFAULT 'SENIN',
  `jam_mulai` time NOT NULL DEFAULT '00:00:00',
  `jam_selesai` time DEFAULT NULL,
  `kd_poli` char(5) DEFAULT NULL,
  PRIMARY KEY (`kd_dokter`,`hari_kerja`),
  KEY `kd_dokter` (`kd_dokter`),
  KEY `kd_poli` (`kd_poli`),
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kd_poli`) REFERENCES `poliklinik` (`kd_poli`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jamsostek`
--

DROP TABLE IF EXISTS `jamsostek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jamsostek` (
  `stts` char(5) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`stts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamsostek`
--

LOCK TABLES `jamsostek` WRITE;
/*!40000 ALTER TABLE `jamsostek` DISABLE KEYS */;
/*!40000 ALTER TABLE `jamsostek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jasa_lain`
--

DROP TABLE IF EXISTS `jasa_lain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jasa_lain` (
  `thn` year(4) NOT NULL,
  `bln` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `bsr_jasa` double NOT NULL,
  `ktg` varchar(40) NOT NULL,
  PRIMARY KEY (`thn`,`bln`,`id`,`bsr_jasa`,`ktg`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jasa_lain`
--

LOCK TABLES `jasa_lain` WRITE;
/*!40000 ALTER TABLE `jasa_lain` DISABLE KEYS */;
/*!40000 ALTER TABLE `jasa_lain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `kdjns` char(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kdjns`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_infus`
--

DROP TABLE IF EXISTS `jenis_infus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_infus` (
  `kd_jns_infus` varchar(7) NOT NULL DEFAULT '',
  `nama_jenis_infus` varchar(30) DEFAULT NULL,
  `harga_per_botol` double DEFAULT NULL,
  PRIMARY KEY (`kd_jns_infus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_infus`
--

LOCK TABLES `jenis_infus` WRITE;
/*!40000 ALTER TABLE `jenis_infus` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_infus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jgmlm`
--

DROP TABLE IF EXISTS `jgmlm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jgmlm` (
  `tgl` date NOT NULL,
  `id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  PRIMARY KEY (`tgl`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jgmlm`
--

LOCK TABLES `jgmlm` WRITE;
/*!40000 ALTER TABLE `jgmlm` DISABLE KEYS */;
/*!40000 ALTER TABLE `jgmlm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jnj_jabatan`
--

DROP TABLE IF EXISTS `jnj_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jnj_jabatan` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tnj` double NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jnj_jabatan`
--

LOCK TABLES `jnj_jabatan` WRITE;
/*!40000 ALTER TABLE `jnj_jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jnj_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jns_perawatan`
--

DROP TABLE IF EXISTS `jns_perawatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jns_perawatan` (
  `kd_jenis_prw` varchar(8) NOT NULL,
  `nm_perawatan` varchar(80) DEFAULT NULL,
  `kd_kategori` char(5) DEFAULT NULL,
  `material` double DEFAULT NULL,
  `tarif_tindakandr` double DEFAULT NULL,
  `tarif_tindakanpr` double DEFAULT NULL,
  `total_byrdr` double DEFAULT NULL,
  `total_byrpr` double DEFAULT NULL,
  `kd_pj` char(3) NOT NULL,
  `kd_poli` char(5) NOT NULL,
  PRIMARY KEY (`kd_jenis_prw`),
  KEY `kd_kategori` (`kd_kategori`),
  KEY `kd_pj` (`kd_pj`),
  KEY `kd_poli` (`kd_poli`),
  CONSTRAINT `jns_perawatan_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori_perawatan` (`kd_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `jns_perawatan_ibfk_2` FOREIGN KEY (`kd_pj`) REFERENCES `penjab` (`kd_pj`) ON UPDATE CASCADE,
  CONSTRAINT `jns_perawatan_ibfk_3` FOREIGN KEY (`kd_poli`) REFERENCES `poliklinik` (`kd_poli`) ON UPDATE CASCADE,
  CONSTRAINT `jns_perawatan_ranap_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori_perawatan` (`kd_kategori`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jns_perawatan`
--

LOCK TABLES `jns_perawatan` WRITE;
/*!40000 ALTER TABLE `jns_perawatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jns_perawatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jns_perawatan_inap`
--

DROP TABLE IF EXISTS `jns_perawatan_inap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jns_perawatan_inap` (
  `kd_jenis_prw` varchar(8) NOT NULL,
  `nm_perawatan` varchar(80) DEFAULT NULL,
  `kd_kategori` char(5) DEFAULT NULL,
  `material` double DEFAULT NULL,
  `tarif_tindakandr` double DEFAULT NULL,
  `tarif_tindakanpr` double DEFAULT NULL,
  `total_byrdr` double DEFAULT NULL,
  `total_byrpr` double DEFAULT NULL,
  `kd_pj` char(3) NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`kd_jenis_prw`),
  KEY `kd_kategori` (`kd_kategori`),
  KEY `kd_pj` (`kd_pj`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `jns_perawatan_inap_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori_perawatan` (`kd_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `jns_perawatan_inap_ibfk_2` FOREIGN KEY (`kd_pj`) REFERENCES `penjab` (`kd_pj`) ON UPDATE CASCADE,
  CONSTRAINT `jns_perawatan_inap_ibfk_3` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jns_perawatan_inap`
--

LOCK TABLES `jns_perawatan_inap` WRITE;
/*!40000 ALTER TABLE `jns_perawatan_inap` DISABLE KEYS */;
/*!40000 ALTER TABLE `jns_perawatan_inap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurnal`
--

DROP TABLE IF EXISTS `jurnal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurnal` (
  `no_jurnal` varchar(8) NOT NULL,
  `no_bukti` varchar(20) DEFAULT NULL,
  `tgl_jurnal` date DEFAULT NULL,
  `jenis` enum('U','P') DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_jurnal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurnal`
--

LOCK TABLES `jurnal` WRITE;
/*!40000 ALTER TABLE `jurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jurnal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kabupaten`
--

DROP TABLE IF EXISTS `kabupaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kabupaten` (
  `kd_kab` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kab` varchar(60) NOT NULL,
  PRIMARY KEY (`kd_kab`),
  UNIQUE KEY `nm_kab` (`nm_kab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kabupaten`
--

LOCK TABLES `kabupaten` WRITE;
/*!40000 ALTER TABLE `kabupaten` DISABLE KEYS */;
/*!40000 ALTER TABLE `kabupaten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kamar` (
  `kd_kamar` varchar(15) NOT NULL,
  `kd_bangsal` char(5) DEFAULT NULL,
  `trf_kamar` double DEFAULT NULL,
  `status` enum('ISI','KOSONG') DEFAULT NULL,
  `kelas` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_kamar`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar`
--

LOCK TABLES `kamar` WRITE;
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar_inap`
--

DROP TABLE IF EXISTS `kamar_inap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kamar_inap` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_kamar` varchar(15) NOT NULL,
  `diagnosa_awal` varchar(100) DEFAULT NULL,
  `diagnosa_akhir` varchar(100) DEFAULT NULL,
  `tgl_masuk` date NOT NULL DEFAULT '0000-00-00',
  `jam_masuk` time NOT NULL DEFAULT '00:00:00',
  `tgl_keluar` date DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `ttl_biaya` double DEFAULT NULL,
  `stts_pulang` enum('Sehat','Rujuk','APS','+','Meninggal','Sembuh','Membaik','Pulang Paksa','-','Pindah Kamar') NOT NULL,
  PRIMARY KEY (`no_rawat`,`tgl_masuk`,`jam_masuk`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_kamar` (`kd_kamar`),
  CONSTRAINT `kamar_inap_ibfk_2` FOREIGN KEY (`kd_kamar`) REFERENCES `kamar` (`kd_kamar`) ON UPDATE CASCADE,
  CONSTRAINT `kamar_inap_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar_inap`
--

LOCK TABLES `kamar_inap` WRITE;
/*!40000 ALTER TABLE `kamar_inap` DISABLE KEYS */;
/*!40000 ALTER TABLE `kamar_inap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar_inap_bayi`
--

DROP TABLE IF EXISTS `kamar_inap_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kamar_inap_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_kamar` varchar(8) DEFAULT NULL,
  `diagnosa_awal` varchar(100) DEFAULT NULL,
  `cara_masuk` varchar(25) DEFAULT NULL,
  `tgl_masuk` date NOT NULL DEFAULT '0000-00-00',
  `jam_masuk` time NOT NULL DEFAULT '00:00:00',
  `tgl_keluar` date DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `ttl_biaya` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`tgl_masuk`,`jam_masuk`),
  KEY `kd_kamar` (`kd_kamar`),
  CONSTRAINT `kamar_inap_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `kamar_inap_bayi_ibfk_2` FOREIGN KEY (`kd_kamar`) REFERENCES `kamar` (`kd_kamar`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar_inap_bayi`
--

LOCK TABLES `kamar_inap_bayi` WRITE;
/*!40000 ALTER TABLE `kamar_inap_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kamar_inap_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar_inap_ibu`
--

DROP TABLE IF EXISTS `kamar_inap_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kamar_inap_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_kamar` varchar(8) DEFAULT NULL,
  `diagnosa_awal` varchar(100) DEFAULT NULL,
  `cara_masuk` varchar(25) DEFAULT NULL,
  `tgl_masuk` date NOT NULL DEFAULT '0000-00-00',
  `jam_masuk` time NOT NULL DEFAULT '00:00:00',
  `tgl_keluar` date DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `ttl_biaya` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`tgl_masuk`,`jam_masuk`),
  KEY `kd_kamar` (`kd_kamar`),
  CONSTRAINT `kamar_inap_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `kamar_inap_ibu_ibfk_2` FOREIGN KEY (`kd_kamar`) REFERENCES `kamar` (`kd_kamar`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar_inap_ibu`
--

LOCK TABLES `kamar_inap_ibu` WRITE;
/*!40000 ALTER TABLE `kamar_inap_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `kamar_inap_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kasbon`
--

DROP TABLE IF EXISTS `kasbon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kasbon` (
  `thn` year(4) NOT NULL,
  `bln` tinyint(4) NOT NULL,
  `id` int(11) NOT NULL,
  `jml` double NOT NULL,
  `ktg` varchar(70) NOT NULL,
  PRIMARY KEY (`thn`,`bln`,`id`),
  KEY `id` (`id`),
  CONSTRAINT `kasbon_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai_gaji` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kasbon`
--

LOCK TABLES `kasbon` WRITE;
/*!40000 ALTER TABLE `kasbon` DISABLE KEYS */;
/*!40000 ALTER TABLE `kasbon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_penyakit`
--

DROP TABLE IF EXISTS `kategori_penyakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_penyakit` (
  `kd_ktg` varchar(8) NOT NULL,
  `nm_kategori` varchar(30) DEFAULT NULL,
  `ciri_umum` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kd_ktg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_penyakit`
--

LOCK TABLES `kategori_penyakit` WRITE;
/*!40000 ALTER TABLE `kategori_penyakit` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori_penyakit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_perawatan`
--

DROP TABLE IF EXISTS `kategori_perawatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_perawatan` (
  `kd_kategori` char(5) NOT NULL,
  `nm_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_perawatan`
--

LOCK TABLES `kategori_perawatan` WRITE;
/*!40000 ALTER TABLE `kategori_perawatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori_perawatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keanggotaan`
--

DROP TABLE IF EXISTS `keanggotaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keanggotaan` (
  `id` int(11) NOT NULL,
  `asuransi` char(5) NOT NULL,
  `jamsostek` char(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `koperasi` (`asuransi`),
  KEY `jamsostek` (`jamsostek`),
  CONSTRAINT `keanggotaan_ibfk_1` FOREIGN KEY (`asuransi`) REFERENCES `asuransi` (`stts`) ON UPDATE CASCADE,
  CONSTRAINT `keanggotaan_ibfk_2` FOREIGN KEY (`jamsostek`) REFERENCES `jamsostek` (`stts`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keanggotaan`
--

LOCK TABLES `keanggotaan` WRITE;
/*!40000 ALTER TABLE `keanggotaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `keanggotaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kecamatan` (
  `kd_kec` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kec` varchar(60) NOT NULL,
  PRIMARY KEY (`kd_kec`),
  UNIQUE KEY `nm_kec` (`nm_kec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelurahan` (
  `kd_kel` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kel` varchar(60) NOT NULL,
  PRIMARY KEY (`kd_kel`),
  UNIQUE KEY `nm_kel` (`nm_kel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelurahan`
--

LOCK TABLES `kelurahan` WRITE;
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ketidakhadiran`
--

DROP TABLE IF EXISTS `ketidakhadiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ketidakhadiran` (
  `tgl` date NOT NULL,
  `id` int(11) NOT NULL,
  `jns` enum('A','S','C','I') NOT NULL,
  `ktg` varchar(40) NOT NULL,
  `jml` int(10) DEFAULT NULL,
  PRIMARY KEY (`tgl`,`id`,`jns`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketidakhadiran`
--

LOCK TABLES `ketidakhadiran` WRITE;
/*!40000 ALTER TABLE `ketidakhadiran` DISABLE KEYS */;
/*!40000 ALTER TABLE `ketidakhadiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kodesatuan`
--

DROP TABLE IF EXISTS `kodesatuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kodesatuan` (
  `kode_sat` char(3) NOT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_sat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kodesatuan`
--

LOCK TABLES `kodesatuan` WRITE;
/*!40000 ALTER TABLE `kodesatuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kodesatuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konver_sat`
--

DROP TABLE IF EXISTS `konver_sat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konver_sat` (
  `nilai` double DEFAULT NULL,
  `kode_sat` char(3) NOT NULL DEFAULT '',
  `nilai_konversi` double DEFAULT NULL,
  `sat_konversi` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`kode_sat`,`sat_konversi`),
  KEY `kode_sat` (`kode_sat`),
  CONSTRAINT `konver_sat_ibfk_1` FOREIGN KEY (`kode_sat`) REFERENCES `kodesatuan` (`kode_sat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konver_sat`
--

LOCK TABLES `konver_sat` WRITE;
/*!40000 ALTER TABLE `konver_sat` DISABLE KEYS */;
/*!40000 ALTER TABLE `konver_sat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_user`
--

DROP TABLE IF EXISTS `login_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `jabatan` enum('Yes','No') NOT NULL,
  `pegawai` enum('Yes','No') NOT NULL,
  `tnj_bulan` enum('Yes','No') NOT NULL,
  `tnj_harian` enum('Yes','No') NOT NULL,
  `premi_jam` enum('Yes','No') NOT NULL,
  `penerima_tnj` enum('Yes','No') NOT NULL,
  `asuransi` enum('Yes','No') NOT NULL,
  `lembur` enum('Yes','No') NOT NULL,
  `ketidakhadiran` enum('Yes','No') NOT NULL,
  `shift_malam` enum('Yes','No') NOT NULL,
  `tambahan_lain` enum('Yes','No') NOT NULL,
  `input_premi` enum('Yes','No') NOT NULL,
  `pinjaman` enum('Yes','No') NOT NULL,
  `potongan` enum('Yes','No') NOT NULL,
  `set_shift_malam` enum('Yes','No') NOT NULL,
  `set_potongan_alpha` enum('Yes','No') NOT NULL,
  `set_tunjangan_nikah` enum('Yes','No') NOT NULL,
  `set_tunjangan_anak` enum('Yes','No') NOT NULL,
  `set_lembur_hb` enum('Yes','No') NOT NULL,
  `set_lembur_hr` enum('Yes','No') NOT NULL,
  `password` varchar(700) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_user`
--

LOCK TABLES `login_user` WRITE;
/*!40000 ALTER TABLE `login_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_tunjangan_bulanan`
--

DROP TABLE IF EXISTS `master_tunjangan_bulanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_tunjangan_bulanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `tnj` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_tunjangan_bulanan`
--

LOCK TABLES `master_tunjangan_bulanan` WRITE;
/*!40000 ALTER TABLE `master_tunjangan_bulanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_tunjangan_bulanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_tunjangan_harian`
--

DROP TABLE IF EXISTS `master_tunjangan_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_tunjangan_harian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `tnj` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_tunjangan_harian`
--

LOCK TABLES `master_tunjangan_harian` WRITE;
/*!40000 ALTER TABLE `master_tunjangan_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_tunjangan_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mutasibarang`
--

DROP TABLE IF EXISTS `mutasibarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mutasibarang` (
  `kode_brng` varchar(15) NOT NULL,
  `jml` double NOT NULL,
  `kd_bangsaldari` char(5) NOT NULL,
  `kd_bangsalke` char(5) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  PRIMARY KEY (`kode_brng`,`kd_bangsaldari`,`kd_bangsalke`,`tanggal`),
  KEY `kd_bangsaldari` (`kd_bangsaldari`),
  KEY `kd_bangsalke` (`kd_bangsalke`),
  CONSTRAINT `mutasibarang_ibfk_1` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `mutasibarang_ibfk_2` FOREIGN KEY (`kd_bangsaldari`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE,
  CONSTRAINT `mutasibarang_ibfk_3` FOREIGN KEY (`kd_bangsalke`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mutasibarang`
--

LOCK TABLES `mutasibarang` WRITE;
/*!40000 ALTER TABLE `mutasibarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `mutasibarang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obat_penyakit`
--

DROP TABLE IF EXISTS `obat_penyakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obat_penyakit` (
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL,
  `referensi` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`kd_penyakit`,`kode_brng`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `obat_penyakit_ibfk_1` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `obat_penyakit_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obat_penyakit`
--

LOCK TABLES `obat_penyakit` WRITE;
/*!40000 ALTER TABLE `obat_penyakit` DISABLE KEYS */;
/*!40000 ALTER TABLE `obat_penyakit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obatbhp_ok`
--

DROP TABLE IF EXISTS `obatbhp_ok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obatbhp_ok` (
  `kd_obat` varchar(15) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `kode_sat` char(3) NOT NULL,
  `hargasatuan` double NOT NULL,
  PRIMARY KEY (`kd_obat`),
  KEY `kode_sat` (`kode_sat`),
  CONSTRAINT `obatbhp_ok_ibfk_1` FOREIGN KEY (`kode_sat`) REFERENCES `kodesatuan` (`kode_sat`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obatbhp_ok`
--

LOCK TABLES `obatbhp_ok` WRITE;
/*!40000 ALTER TABLE `obatbhp_ok` DISABLE KEYS */;
/*!40000 ALTER TABLE `obatbhp_ok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operasi`
--

DROP TABLE IF EXISTS `operasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operasi` (
  `no_rawat` varchar(17) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `tgl_operasi` date NOT NULL,
  `jenis_anasthesi` varchar(8) NOT NULL,
  `operator1` varchar(20) NOT NULL,
  `operator2` varchar(20) NOT NULL,
  `operator3` varchar(20) NOT NULL,
  `asisten_operator1` varchar(20) NOT NULL,
  `asisten_operator2` varchar(20) NOT NULL,
  `asisten_operator3` varchar(20) NOT NULL,
  `dokter_anak` varchar(20) NOT NULL,
  `perawaat_resusitas` varchar(20) NOT NULL,
  `dokter_anestesi` varchar(20) NOT NULL,
  `asisten_anestesi` varchar(20) NOT NULL,
  `bidan` varchar(20) NOT NULL,
  `perawat_luar` varchar(20) NOT NULL,
  `kode_paket` varchar(8) NOT NULL,
  `biayaoperator1` double NOT NULL,
  `biayaoperator2` double NOT NULL,
  `biayaoperator3` double NOT NULL,
  `biayaasisten_operator1` double NOT NULL,
  `biayaasisten_operator2` double NOT NULL,
  `biayaasisten_operator3` double NOT NULL,
  `biayadokter_anak` double NOT NULL,
  `biayaperawaat_resusitas` double NOT NULL,
  `biayadokter_anestesi` double NOT NULL,
  `biayaasisten_anestesi` double NOT NULL,
  `biayabidan` double NOT NULL,
  `biayaperawat_luar` double NOT NULL,
  `biayaalat` double NOT NULL,
  `biayasewaok` double NOT NULL,
  `biayasewavk` double NOT NULL,
  `bagian_rs` double NOT NULL,
  `omloop` double NOT NULL,
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `no_rawat` (`no_rawat`),
  KEY `operator1` (`operator1`),
  KEY `operator2` (`operator2`),
  KEY `operator3` (`operator3`),
  KEY `asisten_operator1` (`asisten_operator1`),
  KEY `asisten_operator2` (`asisten_operator2`),
  KEY `asisten_operator3` (`asisten_operator3`),
  KEY `dokter_anak` (`dokter_anak`),
  KEY `perawaat_resusitas` (`perawaat_resusitas`),
  KEY `dokter_anestesi` (`dokter_anestesi`),
  KEY `asisten_anestesi` (`asisten_anestesi`),
  KEY `bidan` (`bidan`),
  KEY `perawat_luar` (`perawat_luar`),
  KEY `kode_paket` (`kode_paket`),
  CONSTRAINT `operasi_ibfk_1` FOREIGN KEY (`operator1`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_10` FOREIGN KEY (`asisten_anestesi`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_11` FOREIGN KEY (`bidan`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_12` FOREIGN KEY (`perawat_luar`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_13` FOREIGN KEY (`kode_paket`) REFERENCES `paket_operasi` (`kode_paket`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_15` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_16` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_2` FOREIGN KEY (`operator2`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_3` FOREIGN KEY (`operator3`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_4` FOREIGN KEY (`asisten_operator1`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_5` FOREIGN KEY (`asisten_operator2`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_6` FOREIGN KEY (`asisten_operator3`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_7` FOREIGN KEY (`dokter_anak`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_8` FOREIGN KEY (`perawaat_resusitas`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `operasi_ibfk_9` FOREIGN KEY (`dokter_anestesi`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operasi`
--

LOCK TABLES `operasi` WRITE;
/*!40000 ALTER TABLE `operasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `operasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opname`
--

DROP TABLE IF EXISTS `opname`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opname` (
  `kode_brng` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `stok` int(11) NOT NULL,
  `real` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `nomihilang` double NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`kode_brng`,`tanggal`,`kd_bangsal`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `opname_ibfk_1` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `opname_ibfk_2` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opname`
--

LOCK TABLES `opname` WRITE;
/*!40000 ALTER TABLE `opname` DISABLE KEYS */;
/*!40000 ALTER TABLE `opname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paket_operasi`
--

DROP TABLE IF EXISTS `paket_operasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paket_operasi` (
  `kode_paket` varchar(8) NOT NULL,
  `nm_perawatan` varchar(80) NOT NULL,
  `operator1` double NOT NULL,
  `operator2` double NOT NULL,
  `operator3` double NOT NULL,
  `asisten_operator1` double NOT NULL,
  `asisten_operator2` double NOT NULL,
  `asisten_operator3` double NOT NULL,
  `dokter_anak` double NOT NULL,
  `perawaat_resusitas` double NOT NULL,
  `dokter_anestesi` double NOT NULL,
  `asisten_anestesi` double NOT NULL,
  `bidan` double NOT NULL,
  `perawat_luar` double NOT NULL,
  `sewa_ok` double NOT NULL,
  `alat` double NOT NULL,
  `sewa_vk` double NOT NULL,
  `bagian_rs` double NOT NULL,
  `omloop` double NOT NULL,
  PRIMARY KEY (`kode_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paket_operasi`
--

LOCK TABLES `paket_operasi` WRITE;
/*!40000 ALTER TABLE `paket_operasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `paket_operasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien` (
  `no_rkm_medis` varchar(10) NOT NULL,
  `nm_pasien` varchar(40) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tmp_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `gol_darah` enum('A','B','O','AB','-') DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  `stts_nikah` enum('SINGLE','MENIKAH','JANDA','DUDHA') DEFAULT NULL,
  `agama` varchar(12) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  `umur` varchar(20) NOT NULL,
  `pnd` enum('TS','TK','SD','SMP','SMA','D1','D2','D3','D4','S1','S2','S3','-') NOT NULL,
  `keluarga` enum('AYAH','IBU','ISTRI','SUAMI','SAUDARA') NOT NULL,
  `namakeluarga` varchar(50) NOT NULL,
  `kd_pj` char(3) NOT NULL,
  `kd_kel` int(11) NOT NULL,
  `kd_kec` int(11) NOT NULL,
  `kd_kab` int(11) NOT NULL,
  PRIMARY KEY (`no_rkm_medis`),
  KEY `kd_pj` (`kd_pj`),
  KEY `kd_kel` (`kd_kel`,`kd_kec`,`kd_kab`),
  KEY `kd_kec` (`kd_kec`),
  KEY `kd_kab` (`kd_kab`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`kd_pj`) REFERENCES `penjab` (`kd_pj`) ON UPDATE CASCADE,
  CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`kd_kel`) REFERENCES `kelurahan` (`kd_kel`) ON UPDATE CASCADE,
  CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`kd_kec`) REFERENCES `kecamatan` (`kd_kec`) ON UPDATE CASCADE,
  CONSTRAINT `pasien_ibfk_4` FOREIGN KEY (`kd_kab`) REFERENCES `kabupaten` (`kd_kab`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien_bayi`
--

DROP TABLE IF EXISTS `pasien_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien_bayi` (
  `no_rkm_medis` varchar(10) NOT NULL,
  `umur_ibu` varchar(8) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `umur_ayah` varchar(8) NOT NULL,
  `berat_badan` varchar(10) NOT NULL,
  `panjang_badan` varchar(10) NOT NULL,
  `lingkar_kepala` varchar(10) NOT NULL,
  `proses_lahir` varchar(10) NOT NULL,
  `anakke` char(2) NOT NULL,
  `jam_lahir` time NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`no_rkm_medis`),
  CONSTRAINT `pasien_bayi_ibfk_1` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien_bayi`
--

LOCK TABLES `pasien_bayi` WRITE;
/*!40000 ALTER TABLE `pasien_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasien_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien_ibu`
--

DROP TABLE IF EXISTS `pasien_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien_ibu` (
  `no_rm_ibu` varchar(10) NOT NULL,
  `nm_pasien` varchar(40) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `umur` char(2) DEFAULT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `gol_darah` enum('A','B','O','AB','-') DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  `agama` varchar(12) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `diagnosa_awal` varchar(100) DEFAULT NULL,
  `pnddkn` enum('TS','SD','SMP','SMA','SMK','D1','D2','D3','D4','S1','S2','S3','-') DEFAULT NULL,
  `stts_nikah` enum('SINGLE','MENIKAH','JANDA') DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`no_rm_ibu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien_ibu`
--

LOCK TABLES `pasien_ibu` WRITE;
/*!40000 ALTER TABLE `pasien_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasien_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien_mati`
--

DROP TABLE IF EXISTS `pasien_mati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien_mati` (
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `no_rkm_medis` varchar(10) NOT NULL DEFAULT '',
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_rkm_medis`),
  CONSTRAINT `pasien_mati_ibfk_1` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien_mati`
--

LOCK TABLES `pasien_mati` WRITE;
/*!40000 ALTER TABLE `pasien_mati` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasien_mati` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien_mati_bayi`
--

DROP TABLE IF EXISTS `pasien_mati_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien_mati_bayi` (
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `no_rm_bayi` varchar(10) NOT NULL DEFAULT '',
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_rm_bayi`),
  CONSTRAINT `pasien_mati_bayi_ibfk_1` FOREIGN KEY (`no_rm_bayi`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien_mati_bayi`
--

LOCK TABLES `pasien_mati_bayi` WRITE;
/*!40000 ALTER TABLE `pasien_mati_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasien_mati_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien_mati_ibu`
--

DROP TABLE IF EXISTS `pasien_mati_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien_mati_ibu` (
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `no_rm_ibu` varchar(10) NOT NULL DEFAULT '',
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_rm_ibu`),
  CONSTRAINT `pasien_mati_ibu_ibfk_1` FOREIGN KEY (`no_rm_ibu`) REFERENCES `pasien_ibu` (`no_rm_ibu`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien_mati_ibu`
--

LOCK TABLES `pasien_mati_ibu` WRITE;
/*!40000 ALTER TABLE `pasien_mati_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasien_mati_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai_gaji`
--

DROP TABLE IF EXISTS `pegawai_gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai_gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `jnj_jabatan` varchar(10) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `pendidikan` varchar(80) NOT NULL,
  `gapok` double NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `stts_aktif` enum('Aktif','Cuti','Keluar') NOT NULL,
  `dankes_diambil` double NOT NULL,
  `stts_nikah` enum('Nikah','Single') NOT NULL,
  `jml_anak` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jnj_jabatan` (`jnj_jabatan`),
  CONSTRAINT `pegawai_gaji_ibfk_1` FOREIGN KEY (`jnj_jabatan`) REFERENCES `jnj_jabatan` (`kode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai_gaji`
--

LOCK TABLES `pegawai_gaji` WRITE;
/*!40000 ALTER TABLE `pegawai_gaji` DISABLE KEYS */;
/*!40000 ALTER TABLE `pegawai_gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian` (
  `no_faktur` varchar(15) NOT NULL,
  `kode_suplier` char(5) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `total1` double NOT NULL,
  `potongan` double NOT NULL,
  `total2` double NOT NULL,
  `ppn` double NOT NULL,
  `tagihan` double NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`no_faktur`),
  KEY `kode_suplier` (`kode_suplier`),
  KEY `nip` (`nip`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_suplier`) REFERENCES `datasuplier` (`kode_suplier`) ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengurangan_biaya`
--

DROP TABLE IF EXISTS `pengurangan_biaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengurangan_biaya` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `nama_pengurangan` varchar(60) NOT NULL,
  `besar_pengurangan` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`nama_pengurangan`),
  CONSTRAINT `pengurangan_biaya_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengurangan_biaya`
--

LOCK TABLES `pengurangan_biaya` WRITE;
/*!40000 ALTER TABLE `pengurangan_biaya` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengurangan_biaya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjab`
--

DROP TABLE IF EXISTS `penjab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjab` (
  `kd_pj` char(3) NOT NULL,
  `png_jawab` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_pj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjab`
--

LOCK TABLES `penjab` WRITE;
/*!40000 ALTER TABLE `penjab` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `nota_jual` varchar(8) NOT NULL DEFAULT '',
  `tgl_jual` date DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `no_rkm_medis` varchar(10) DEFAULT NULL,
  `nm_pasien` varchar(50) DEFAULT NULL,
  `keterangan` varchar(40) DEFAULT NULL,
  `jns_jual` enum('Ranap Umum','Ranap JKM','Rawat Jalan') DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `status` enum('Umum','Pajak') DEFAULT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`nota_jual`),
  KEY `nip` (`nip`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `penjualan_ibfk_4` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE,
  CONSTRAINT `penjualan_ibfk_5` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyakit`
--

DROP TABLE IF EXISTS `penyakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nm_penyakit` varchar(35) DEFAULT NULL,
  `ciri_ciri` text,
  `keterangan` varchar(60) DEFAULT NULL,
  `kd_ktg` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`kd_penyakit`),
  KEY `kd_ktg` (`kd_ktg`),
  CONSTRAINT `penyakit_ibfk_1` FOREIGN KEY (`kd_ktg`) REFERENCES `kategori_penyakit` (`kd_ktg`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyakit`
--

LOCK TABLES `penyakit` WRITE;
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;
/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periksa_lab`
--

DROP TABLE IF EXISTS `periksa_lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periksa_lab` (
  `no_rawat` varchar(17) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `jam` time NOT NULL,
  `dokter_perujuk` varchar(60) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`tgl_periksa`,`jam`),
  KEY `nip` (`nip`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  CONSTRAINT `periksa_lab_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `periksa_lab_ibfk_3` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `periksa_lab_ibfk_4` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periksa_lab`
--

LOCK TABLES `periksa_lab` WRITE;
/*!40000 ALTER TABLE `periksa_lab` DISABLE KEYS */;
/*!40000 ALTER TABLE `periksa_lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tmp_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gol_darah` enum('A','B','O','AB','-') DEFAULT NULL,
  `agama` varchar(12) DEFAULT NULL,
  `stts_nikah` enum('SINGLE','MENIKAH','JANDA','DUDHA') DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `kd_jbtn` char(4) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `kd_jbtn` (`kd_jbtn`),
  CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`kd_jbtn`) REFERENCES `jabatan` (`kd_jbtn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piutang`
--

DROP TABLE IF EXISTS `piutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piutang` (
  `nota_piutang` varchar(8) NOT NULL,
  `tgl_piutang` date DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `no_rkm_medis` varchar(10) DEFAULT NULL,
  `nm_pasien` varchar(50) DEFAULT NULL,
  `catatan` varchar(40) DEFAULT NULL,
  `jns_jual` enum('Ranap Umum','Ranap JKM','Rawat Jalan') NOT NULL,
  `ongkir` double DEFAULT NULL,
  `uangmuka` double DEFAULT NULL,
  `sisapiutang` double NOT NULL,
  `status` enum('UMUM','PAJAK') DEFAULT NULL,
  `tgltempo` date NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`nota_piutang`),
  KEY `nip` (`nip`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `piutang_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `piutang_ibfk_2` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE,
  CONSTRAINT `piutang_ibfk_3` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piutang`
--

LOCK TABLES `piutang` WRITE;
/*!40000 ALTER TABLE `piutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `piutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piutang_pasien`
--

DROP TABLE IF EXISTS `piutang_pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piutang_pasien` (
  `no_rawat` varchar(17) NOT NULL,
  `tgl_piutang` date DEFAULT NULL,
  `no_rkm_medis` varchar(10) DEFAULT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL,
  `totalpiutang` double DEFAULT NULL,
  `uangmuka` double DEFAULT NULL,
  `sisapiutang` double NOT NULL,
  `tgltempo` date NOT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  CONSTRAINT `piutang_pasien_ibfk_2` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE,
  CONSTRAINT `piutang_pasien_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piutang_pasien`
--

LOCK TABLES `piutang_pasien` WRITE;
/*!40000 ALTER TABLE `piutang_pasien` DISABLE KEYS */;
/*!40000 ALTER TABLE `piutang_pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pnm_tnj_bulanan`
--

DROP TABLE IF EXISTS `pnm_tnj_bulanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pnm_tnj_bulanan` (
  `id` int(11) NOT NULL,
  `id_tnj` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_tnj`),
  KEY `id_tnj` (`id_tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pnm_tnj_bulanan`
--

LOCK TABLES `pnm_tnj_bulanan` WRITE;
/*!40000 ALTER TABLE `pnm_tnj_bulanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pnm_tnj_bulanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pnm_tnj_harian`
--

DROP TABLE IF EXISTS `pnm_tnj_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pnm_tnj_harian` (
  `id` int(11) NOT NULL,
  `id_tnj` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_tnj`),
  KEY `id_tnj` (`id_tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pnm_tnj_harian`
--

LOCK TABLES `pnm_tnj_harian` WRITE;
/*!40000 ALTER TABLE `pnm_tnj_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pnm_tnj_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poliklinik`
--

DROP TABLE IF EXISTS `poliklinik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poliklinik` (
  `kd_poli` char(5) NOT NULL DEFAULT '',
  `nm_poli` varchar(30) DEFAULT NULL,
  `registrasi` double NOT NULL,
  PRIMARY KEY (`kd_poli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poliklinik`
--

LOCK TABLES `poliklinik` WRITE;
/*!40000 ALTER TABLE `poliklinik` DISABLE KEYS */;
/*!40000 ALTER TABLE `poliklinik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `potongan`
--

DROP TABLE IF EXISTS `potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `potongan` (
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `id` int(11) NOT NULL,
  `jamsostek` double NOT NULL,
  `asuransi` double NOT NULL,
  `angpinjam` double NOT NULL,
  `angla` double NOT NULL,
  `telpri` double NOT NULL,
  `pajak` double NOT NULL,
  `dankes_diambil` double NOT NULL,
  `ktg` varchar(50) NOT NULL,
  PRIMARY KEY (`tahun`,`bulan`,`id`),
  KEY `id` (`id`),
  CONSTRAINT `potongan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai_gaji` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `potongan`
--

LOCK TABLES `potongan` WRITE;
/*!40000 ALTER TABLE `potongan` DISABLE KEYS */;
/*!40000 ALTER TABLE `potongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premi`
--

DROP TABLE IF EXISTS `premi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `premi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `tnj` double NOT NULL,
  `hm` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premi`
--

LOCK TABLES `premi` WRITE;
/*!40000 ALTER TABLE `premi` DISABLE KEYS */;
/*!40000 ALTER TABLE `premi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presensi`
--

DROP TABLE IF EXISTS `presensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presensi` (
  `tgl` date NOT NULL,
  `id` int(11) NOT NULL,
  `jns` enum('HR','HB') NOT NULL,
  `lembur` int(11) NOT NULL,
  PRIMARY KEY (`tgl`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presensi`
--

LOCK TABLES `presensi` WRITE;
/*!40000 ALTER TABLE `presensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `presensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap_dr`
--

DROP TABLE IF EXISTS `rawat_inap_dr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap_dr` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `kd_dokter` varchar(20) NOT NULL,
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(7) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_rawat` time NOT NULL DEFAULT '00:00:00',
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kd_jenis_prw`,`kd_dokter`,`tgl_perawatan`,`jam_rawat`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `kd_dokter` (`kd_dokter`),
  KEY `kd_penyakit` (`kd_penyakit`),
  CONSTRAINT `rawat_inap_dr_ibfk_3` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_ibfk_4` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_ibfk_5` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_ibfk_6` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan_inap` (`kd_jenis_prw`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap_dr`
--

LOCK TABLES `rawat_inap_dr` WRITE;
/*!40000 ALTER TABLE `rawat_inap_dr` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_inap_dr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap_dr_bayi`
--

DROP TABLE IF EXISTS `rawat_inap_dr_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap_dr_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `kd_dokter` varchar(8) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_rawat` time NOT NULL DEFAULT '00:00:00',
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`kd_dokter`,`tgl_perawatan`,`jam_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `kd_dokter` (`kd_dokter`),
  CONSTRAINT `rawat_inap_dr_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_bayi_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_bayi_ibfk_3` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap_dr_bayi`
--

LOCK TABLES `rawat_inap_dr_bayi` WRITE;
/*!40000 ALTER TABLE `rawat_inap_dr_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_inap_dr_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap_dr_ibu`
--

DROP TABLE IF EXISTS `rawat_inap_dr_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap_dr_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `kd_dokter` varchar(8) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_rawat` time NOT NULL DEFAULT '00:00:00',
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`kd_dokter`,`tgl_perawatan`,`jam_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `kd_dokter` (`kd_dokter`),
  CONSTRAINT `rawat_inap_dr_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_ibu_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_dr_ibu_ibfk_3` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap_dr_ibu`
--

LOCK TABLES `rawat_inap_dr_ibu` WRITE;
/*!40000 ALTER TABLE `rawat_inap_dr_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_inap_dr_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap_pr`
--

DROP TABLE IF EXISTS `rawat_inap_pr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap_pr` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(7) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_rawat` time NOT NULL DEFAULT '00:00:00',
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kd_jenis_prw`,`nip`,`tgl_perawatan`,`jam_rawat`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `nip` (`nip`),
  KEY `kd_penyakit` (`kd_penyakit`),
  CONSTRAINT `rawat_inap_pr_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_ibfk_4` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_ibfk_5` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_ibfk_6` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan_inap` (`kd_jenis_prw`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap_pr`
--

LOCK TABLES `rawat_inap_pr` WRITE;
/*!40000 ALTER TABLE `rawat_inap_pr` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_inap_pr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap_pr_bayi`
--

DROP TABLE IF EXISTS `rawat_inap_pr_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap_pr_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_rawat` time NOT NULL DEFAULT '00:00:00',
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`nip`,`tgl_perawatan`,`jam_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `nip` (`nip`),
  CONSTRAINT `rawat_inap_pr_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_bayi_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_bayi_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap_pr_bayi`
--

LOCK TABLES `rawat_inap_pr_bayi` WRITE;
/*!40000 ALTER TABLE `rawat_inap_pr_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_inap_pr_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap_pr_ibu`
--

DROP TABLE IF EXISTS `rawat_inap_pr_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap_pr_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `tgl_perawatan` date NOT NULL DEFAULT '0000-00-00',
  `jam_rawat` time NOT NULL DEFAULT '00:00:00',
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`nip`,`tgl_perawatan`,`jam_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `nip` (`nip`),
  CONSTRAINT `rawat_inap_pr_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_ibu_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_inap_pr_ibu_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap_pr_ibu`
--

LOCK TABLES `rawat_inap_pr_ibu` WRITE;
/*!40000 ALTER TABLE `rawat_inap_pr_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_inap_pr_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jl_dr`
--

DROP TABLE IF EXISTS `rawat_jl_dr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jl_dr` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `kd_dokter` varchar(20) NOT NULL,
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(7) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kd_jenis_prw`,`kd_dokter`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `kd_dokter` (`kd_dokter`),
  KEY `kd_penyakit` (`kd_penyakit`),
  CONSTRAINT `rawat_jl_dr_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_ibfk_3` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_ibfk_4` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_ibfk_5` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jl_dr`
--

LOCK TABLES `rawat_jl_dr` WRITE;
/*!40000 ALTER TABLE `rawat_jl_dr` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_jl_dr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jl_dr_bayi`
--

DROP TABLE IF EXISTS `rawat_jl_dr_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jl_dr_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `kd_dokter` varchar(8) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`kd_dokter`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `kd_dokter` (`kd_dokter`),
  CONSTRAINT `rawat_jl_dr_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_bayi_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_bayi_ibfk_3` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jl_dr_bayi`
--

LOCK TABLES `rawat_jl_dr_bayi` WRITE;
/*!40000 ALTER TABLE `rawat_jl_dr_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_jl_dr_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jl_dr_ibu`
--

DROP TABLE IF EXISTS `rawat_jl_dr_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jl_dr_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `kd_dokter` varchar(8) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`kd_dokter`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `kd_dokter` (`kd_dokter`),
  CONSTRAINT `rawat_jl_dr_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_ibu_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_dr_ibu_ibfk_3` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jl_dr_ibu`
--

LOCK TABLES `rawat_jl_dr_ibu` WRITE;
/*!40000 ALTER TABLE `rawat_jl_dr_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_jl_dr_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jl_pr`
--

DROP TABLE IF EXISTS `rawat_jl_pr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jl_pr` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(7) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kd_jenis_prw`,`nip`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `nip` (`nip`),
  KEY `kd_penyakit` (`kd_penyakit`),
  CONSTRAINT `rawat_jl_pr_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_ibfk_4` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_ibfk_5` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jl_pr`
--

LOCK TABLES `rawat_jl_pr` WRITE;
/*!40000 ALTER TABLE `rawat_jl_pr` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_jl_pr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jl_pr_bayi`
--

DROP TABLE IF EXISTS `rawat_jl_pr_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jl_pr_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`nip`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `nip` (`nip`),
  CONSTRAINT `rawat_jl_pr_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_bayi_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_bayi_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jl_pr_bayi`
--

LOCK TABLES `rawat_jl_pr_bayi` WRITE;
/*!40000 ALTER TABLE `rawat_jl_pr_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_jl_pr_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jl_pr_ibu`
--

DROP TABLE IF EXISTS `rawat_jl_pr_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jl_pr_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_jenis_prw` varchar(8) NOT NULL DEFAULT '',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `suhu_tubuh` char(5) DEFAULT NULL,
  `tensi` char(5) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `perkembangan` varchar(100) DEFAULT NULL,
  `biaya_rawat` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_jenis_prw`,`nip`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  KEY `nip` (`nip`),
  CONSTRAINT `rawat_jl_pr_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_ibu_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON UPDATE CASCADE,
  CONSTRAINT `rawat_jl_pr_ibu_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jl_pr_ibu`
--

LOCK TABLES `rawat_jl_pr_ibu` WRITE;
/*!40000 ALTER TABLE `rawat_jl_pr_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `rawat_jl_pr_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_periksa`
--

DROP TABLE IF EXISTS `reg_periksa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_periksa` (
  `no_reg` varchar(8) DEFAULT NULL,
  `no_rawat` varchar(17) NOT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  `jam_reg` time DEFAULT NULL,
  `kd_dokter` varchar(20) DEFAULT NULL,
  `no_rkm_medis` varchar(10) DEFAULT NULL,
  `kd_poli` char(5) DEFAULT NULL,
  `p_jawab` varchar(200) DEFAULT NULL,
  `almt_pj` varchar(100) DEFAULT NULL,
  `hubunganpj` varchar(20) DEFAULT NULL,
  `biaya_reg` double DEFAULT NULL,
  `stts` enum('Belum','Sudah','Bayar') NOT NULL,
  `stts_daftar` enum('-','Lama','Baru') NOT NULL,
  `status_lanjut` enum('Ralan','Ranap') NOT NULL,
  `kd_pj` char(3) NOT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `nip` (`kd_dokter`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  KEY `kd_poli` (`kd_poli`),
  KEY `kd_pj` (`kd_pj`),
  CONSTRAINT `reg_periksa_ibfk_3` FOREIGN KEY (`kd_poli`) REFERENCES `poliklinik` (`kd_poli`) ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_ibfk_4` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_ibfk_5` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_ibfk_6` FOREIGN KEY (`kd_pj`) REFERENCES `penjab` (`kd_pj`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_periksa`
--

LOCK TABLES `reg_periksa` WRITE;
/*!40000 ALTER TABLE `reg_periksa` DISABLE KEYS */;
/*!40000 ALTER TABLE `reg_periksa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_periksa_bayi`
--

DROP TABLE IF EXISTS `reg_periksa_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_periksa_bayi` (
  `no_reg` varchar(8) DEFAULT NULL,
  `no_rawat` varchar(17) NOT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  `jam_reg` time DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `no_rm_bayi` varchar(10) DEFAULT NULL,
  `kd_poli` char(5) DEFAULT NULL,
  `p_jawab` varchar(30) DEFAULT NULL,
  `almt_pj` varchar(60) DEFAULT NULL,
  `hubunganpj` varchar(20) DEFAULT NULL,
  `biaya_reg` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `nip` (`nip`),
  KEY `no_rm_bayi` (`no_rm_bayi`),
  KEY `kd_poli` (`kd_poli`),
  CONSTRAINT `reg_periksa_bayi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_bayi_ibfk_3` FOREIGN KEY (`kd_poli`) REFERENCES `poliklinik` (`kd_poli`) ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_bayi_ibfk_4` FOREIGN KEY (`no_rm_bayi`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_periksa_bayi`
--

LOCK TABLES `reg_periksa_bayi` WRITE;
/*!40000 ALTER TABLE `reg_periksa_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `reg_periksa_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_periksa_ibu`
--

DROP TABLE IF EXISTS `reg_periksa_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_periksa_ibu` (
  `no_reg` varchar(8) DEFAULT NULL,
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `tgl_registrasi` date DEFAULT NULL,
  `jam_reg` time DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `no_rm_ibu` varchar(10) DEFAULT NULL,
  `kd_poli` char(5) DEFAULT NULL,
  `p_jawab` varchar(30) DEFAULT NULL,
  `almt_pj` varchar(60) DEFAULT NULL,
  `hubunganpj` varchar(20) DEFAULT NULL,
  `biaya_reg` double DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `nip` (`nip`),
  KEY `no_rm_ibu` (`no_rm_ibu`),
  KEY `kd_poli` (`kd_poli`),
  CONSTRAINT `reg_periksa_ibu_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_ibu_ibfk_2` FOREIGN KEY (`no_rm_ibu`) REFERENCES `pasien_ibu` (`no_rm_ibu`) ON UPDATE CASCADE,
  CONSTRAINT `reg_periksa_ibu_ibfk_3` FOREIGN KEY (`kd_poli`) REFERENCES `poliklinik` (`kd_poli`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_periksa_ibu`
--

LOCK TABLES `reg_periksa_ibu` WRITE;
/*!40000 ALTER TABLE `reg_periksa_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `reg_periksa_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekap_presensi`
--

DROP TABLE IF EXISTS `rekap_presensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekap_presensi` (
  `nip` varchar(20) NOT NULL DEFAULT '',
  `shift` enum('Pagi1','Pagi2','Pagi3','Midle Pagi1','Midle Pagi2','Midle Pagi3','Midle Siang1','Midle Siang2','Siang','Midle Siang3','Sore','Midle Sore1','Midle Sore2','Malam','Midle Malam1','Midle Malam2') NOT NULL,
  `jam_datang` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `jam_pulang` datetime DEFAULT NULL,
  `status` enum('Tepat Waktu','Terlambat') NOT NULL,
  `keterlambatan` varchar(20) NOT NULL,
  `durasi` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`nip`,`jam_datang`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekap_presensi`
--

LOCK TABLES `rekap_presensi` WRITE;
/*!40000 ALTER TABLE `rekap_presensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rekap_presensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekening`
--

DROP TABLE IF EXISTS `rekening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekening` (
  `kd_rek` char(5) NOT NULL,
  `nm_rek` varchar(50) DEFAULT NULL,
  `tipe` char(1) DEFAULT NULL,
  `balance` char(1) DEFAULT NULL,
  PRIMARY KEY (`kd_rek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekening`
--

LOCK TABLES `rekening` WRITE;
/*!40000 ALTER TABLE `rekening` DISABLE KEYS */;
INSERT INTO `rekening` VALUES ('11110','KAS DI BANK','N','D'),('11120','KAS DI TANGAN','N','D'),('11300','PERSEDIAAN BARANG','R','D'),('12110','PERALATAN','N','D'),('21000','HUTANG USAHA','N','K'),('31000','MODAL','M','K'),('41000','PENJUALAN','R','K'),('42000','PEMBAYARAN PASIEN','R','K'),('43000','POTONGAN PENJUALAN','R','D'),('44000','RETUR PENJUALAN','R','D'),('51000','PEMBELIAN','R','D'),('53000','POTONGAN PEMBELIAN','R','K'),('54000','RETUR PEMBELIAN','R','K'),('61100','BIAYA GAJI','R','D'),('61200','BIAYA LISTRIK','R','D'),('71000','PIUTANG DAGANG','R','D'),('72000','BAYAR PIUTANG','R','K'),('74000','RETUR PIUTANG','R','D');
/*!40000 ALTER TABLE `rekening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekeningtahun`
--

DROP TABLE IF EXISTS `rekeningtahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekeningtahun` (
  `thn` year(4) NOT NULL,
  `kd_rek` char(5) NOT NULL,
  `saldo_awal` double NOT NULL,
  PRIMARY KEY (`thn`,`kd_rek`),
  KEY `kd_rek` (`kd_rek`),
  CONSTRAINT `rekeningtahun_ibfk_1` FOREIGN KEY (`kd_rek`) REFERENCES `rekening` (`kd_rek`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekeningtahun`
--

LOCK TABLES `rekeningtahun` WRITE;
/*!40000 ALTER TABLE `rekeningtahun` DISABLE KEYS */;
/*!40000 ALTER TABLE `rekeningtahun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resep_obat`
--

DROP TABLE IF EXISTS `resep_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resep_obat` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `kode_brng` varchar(14) NOT NULL,
  `dosis_obat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kode_brng`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `resep_obat_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `resep_obat_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `resep_obat_ibfk_4` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resep_obat`
--

LOCK TABLES `resep_obat` WRITE;
/*!40000 ALTER TABLE `resep_obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `resep_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resep_obat_bayi`
--

DROP TABLE IF EXISTS `resep_obat_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resep_obat_bayi` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL,
  `dosis_obat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kode_brng`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `resep_obat_bayi_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_bayi` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `resep_obat_bayi_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `resep_obat_bayi_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resep_obat_bayi`
--

LOCK TABLES `resep_obat_bayi` WRITE;
/*!40000 ALTER TABLE `resep_obat_bayi` DISABLE KEYS */;
/*!40000 ALTER TABLE `resep_obat_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resep_obat_ibu`
--

DROP TABLE IF EXISTS `resep_obat_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resep_obat_ibu` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `kd_penyakit` varchar(10) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL,
  `dosis_obat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`no_rawat`,`kd_penyakit`,`kode_brng`),
  KEY `kd_penyakit` (`kd_penyakit`),
  KEY `kd_obat` (`kode_brng`),
  CONSTRAINT `resep_obat_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `resep_obat_ibu_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON UPDATE CASCADE,
  CONSTRAINT `resep_obat_ibu_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resep_obat_ibu`
--

LOCK TABLES `resep_obat_ibu` WRITE;
/*!40000 ALTER TABLE `resep_obat_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `resep_obat_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resep_pulang`
--

DROP TABLE IF EXISTS `resep_pulang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resep_pulang` (
  `no_rawat` varchar(17) NOT NULL,
  `kode_brng` varchar(15) NOT NULL,
  `jml_barang` double NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL,
  `dosis` varchar(20) NOT NULL,
  PRIMARY KEY (`no_rawat`,`kode_brng`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `resep_pulang_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE,
  CONSTRAINT `resep_pulang_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resep_pulang`
--

LOCK TABLES `resep_pulang` WRITE;
/*!40000 ALTER TABLE `resep_pulang` DISABLE KEYS */;
/*!40000 ALTER TABLE `resep_pulang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returbeli`
--

DROP TABLE IF EXISTS `returbeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returbeli` (
  `no_retur_beli` varchar(8) NOT NULL DEFAULT '',
  `tgl_retur` date DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `kode_suplier` char(5) NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`no_retur_beli`),
  KEY `nip` (`nip`),
  KEY `kode_suplier` (`kode_suplier`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `returbeli_ibfk_2` FOREIGN KEY (`kode_suplier`) REFERENCES `datasuplier` (`kode_suplier`) ON UPDATE CASCADE,
  CONSTRAINT `returbeli_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `returbeli_ibfk_4` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returbeli`
--

LOCK TABLES `returbeli` WRITE;
/*!40000 ALTER TABLE `returbeli` DISABLE KEYS */;
/*!40000 ALTER TABLE `returbeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returjual`
--

DROP TABLE IF EXISTS `returjual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returjual` (
  `no_retur_jual` varchar(8) NOT NULL DEFAULT '',
  `tgl_retur` date DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `no_rkm_medis` varchar(10) NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`no_retur_jual`),
  KEY `nip` (`nip`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `returjual_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `returjual_ibfk_4` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE,
  CONSTRAINT `returjual_ibfk_5` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returjual`
--

LOCK TABLES `returjual` WRITE;
/*!40000 ALTER TABLE `returjual` DISABLE KEYS */;
/*!40000 ALTER TABLE `returjual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returpiutang`
--

DROP TABLE IF EXISTS `returpiutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returpiutang` (
  `no_retur_piutang` varchar(8) NOT NULL DEFAULT '',
  `tgl_retur` date DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `no_rkm_medis` varchar(10) NOT NULL,
  `kd_bangsal` char(5) NOT NULL,
  PRIMARY KEY (`no_retur_piutang`),
  KEY `nip` (`nip`),
  KEY `no_rkm_medis` (`no_rkm_medis`),
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `returpiutang_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE,
  CONSTRAINT `returpiutang_ibfk_4` FOREIGN KEY (`no_rkm_medis`) REFERENCES `pasien` (`no_rkm_medis`) ON UPDATE CASCADE,
  CONSTRAINT `returpiutang_ibfk_5` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returpiutang`
--

LOCK TABLES `returpiutang` WRITE;
/*!40000 ALTER TABLE `returpiutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `returpiutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rujuk`
--

DROP TABLE IF EXISTS `rujuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rujuk` (
  `no_rujuk` varchar(10) NOT NULL,
  `no_rawat` varchar(17) DEFAULT NULL,
  `rujuk_ke` varchar(45) DEFAULT NULL,
  `tgl_rujuk` date DEFAULT NULL,
  `keterangan_diagnosa` text,
  `kd_dokter` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no_rujuk`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_dokter` (`kd_dokter`),
  CONSTRAINT `rujuk_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE,
  CONSTRAINT `rujuk_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rujuk`
--

LOCK TABLES `rujuk` WRITE;
/*!40000 ALTER TABLE `rujuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `rujuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rujuk_ibu`
--

DROP TABLE IF EXISTS `rujuk_ibu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rujuk_ibu` (
  `no_rujuk` varchar(10) NOT NULL DEFAULT '',
  `no_rawat` varchar(17) DEFAULT NULL,
  `rujuk_ke` varchar(45) DEFAULT NULL,
  `tgl_rujuk` date DEFAULT NULL,
  `keterangan_diagnosa` text,
  `kd_dokter` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`no_rujuk`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_dokter` (`kd_dokter`),
  CONSTRAINT `rujuk_ibu_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa_ibu` (`no_rawat`) ON UPDATE CASCADE,
  CONSTRAINT `rujuk_ibu_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rujuk_ibu`
--

LOCK TABLES `rujuk_ibu` WRITE;
/*!40000 ALTER TABLE `rujuk_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `rujuk_ibu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rujuk_masuk`
--

DROP TABLE IF EXISTS `rujuk_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rujuk_masuk` (
  `no_rawat` varchar(17) NOT NULL DEFAULT '',
  `perujuk` varchar(60) DEFAULT NULL,
  `alamat` varchar(70) NOT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `no_rawat` (`no_rawat`),
  KEY `kd_dokter` (`perujuk`),
  CONSTRAINT `rujuk_masuk_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rujuk_masuk`
--

LOCK TABLES `rujuk_masuk` WRITE;
/*!40000 ALTER TABLE `rujuk_masuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `rujuk_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `runtext`
--

DROP TABLE IF EXISTS `runtext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `runtext` (
  `teks` text NOT NULL,
  `aktifkan` enum('Yes','No') NOT NULL,
  `gambar` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runtext`
--

LOCK TABLES `runtext` WRITE;
/*!40000 ALTER TABLE `runtext` DISABLE KEYS */;
/*!40000 ALTER TABLE `runtext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesion`
--

DROP TABLE IF EXISTS `sesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sesion` (
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesion`
--

LOCK TABLES `sesion` WRITE;
/*!40000 ALTER TABLE `sesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_hadir`
--

DROP TABLE IF EXISTS `set_hadir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_hadir` (
  `tnj` double NOT NULL,
  PRIMARY KEY (`tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_hadir`
--

LOCK TABLES `set_hadir` WRITE;
/*!40000 ALTER TABLE `set_hadir` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_hadir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_hari_libur`
--

DROP TABLE IF EXISTS `set_hari_libur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_hari_libur` (
  `tanggal` date NOT NULL,
  `ktg` varchar(40) NOT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_hari_libur`
--

LOCK TABLES `set_hari_libur` WRITE;
/*!40000 ALTER TABLE `set_hari_libur` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_hari_libur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_jam_minimal`
--

DROP TABLE IF EXISTS `set_jam_minimal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_jam_minimal` (
  `lamajam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_jam_minimal`
--

LOCK TABLES `set_jam_minimal` WRITE;
/*!40000 ALTER TABLE `set_jam_minimal` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_jam_minimal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_jgmlm`
--

DROP TABLE IF EXISTS `set_jgmlm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_jgmlm` (
  `tnj` double NOT NULL,
  PRIMARY KEY (`tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_jgmlm`
--

LOCK TABLES `set_jgmlm` WRITE;
/*!40000 ALTER TABLE `set_jgmlm` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_jgmlm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_lemburhb`
--

DROP TABLE IF EXISTS `set_lemburhb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_lemburhb` (
  `tnj` double NOT NULL,
  PRIMARY KEY (`tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_lemburhb`
--

LOCK TABLES `set_lemburhb` WRITE;
/*!40000 ALTER TABLE `set_lemburhb` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_lemburhb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_lemburhr`
--

DROP TABLE IF EXISTS `set_lemburhr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_lemburhr` (
  `tnj` double NOT NULL,
  PRIMARY KEY (`tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_lemburhr`
--

LOCK TABLES `set_lemburhr` WRITE;
/*!40000 ALTER TABLE `set_lemburhr` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_lemburhr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_lokasi`
--

DROP TABLE IF EXISTS `set_lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_lokasi` (
  `kd_bangsal` char(5) NOT NULL,
  KEY `kd_bangsal` (`kd_bangsal`),
  CONSTRAINT `set_lokasi_ibfk_1` FOREIGN KEY (`kd_bangsal`) REFERENCES `bangsal` (`kd_bangsal`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_lokasi`
--

LOCK TABLES `set_lokasi` WRITE;
/*!40000 ALTER TABLE `set_lokasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_otomatis_tindakan_ralan`
--

DROP TABLE IF EXISTS `set_otomatis_tindakan_ralan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_otomatis_tindakan_ralan` (
  `kd_dokter` varchar(8) NOT NULL,
  `kd_jenis_prw` varchar(8) NOT NULL,
  PRIMARY KEY (`kd_dokter`,`kd_jenis_prw`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`),
  CONSTRAINT `set_otomatis_tindakan_ralan_ibfk_1` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `set_otomatis_tindakan_ralan_ibfk_2` FOREIGN KEY (`kd_jenis_prw`) REFERENCES `jns_perawatan` (`kd_jenis_prw`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_otomatis_tindakan_ralan`
--

LOCK TABLES `set_otomatis_tindakan_ralan` WRITE;
/*!40000 ALTER TABLE `set_otomatis_tindakan_ralan` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_otomatis_tindakan_ralan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_tahun`
--

DROP TABLE IF EXISTS `set_tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_tahun` (
  `tahun` year(4) NOT NULL,
  `bulan` tinyint(2) NOT NULL,
  `jmlhr` int(11) NOT NULL,
  `jmllbr` int(11) NOT NULL,
  `normal` int(11) NOT NULL,
  PRIMARY KEY (`tahun`,`bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_tahun`
--

LOCK TABLES `set_tahun` WRITE;
/*!40000 ALTER TABLE `set_tahun` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_tahun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_tnjanak`
--

DROP TABLE IF EXISTS `set_tnjanak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_tnjanak` (
  `tnj` double NOT NULL,
  PRIMARY KEY (`tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_tnjanak`
--

LOCK TABLES `set_tnjanak` WRITE;
/*!40000 ALTER TABLE `set_tnjanak` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_tnjanak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_tnjnikah`
--

DROP TABLE IF EXISTS `set_tnjnikah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_tnjnikah` (
  `tnj` double NOT NULL,
  PRIMARY KEY (`tnj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_tnjnikah`
--

LOCK TABLES `set_tnjnikah` WRITE;
/*!40000 ALTER TABLE `set_tnjnikah` DISABLE KEYS */;
/*!40000 ALTER TABLE `set_tnjnikah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setpenjualan`
--

DROP TABLE IF EXISTS `setpenjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setpenjualan` (
  `distributor` float NOT NULL,
  `grosir` float NOT NULL,
  `retail` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setpenjualan`
--

LOCK TABLES `setpenjualan` WRITE;
/*!40000 ALTER TABLE `setpenjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `setpenjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setsms`
--

DROP TABLE IF EXISTS `setsms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setsms` (
  `kode_sms` varchar(200) NOT NULL DEFAULT '',
  `sintax_balasan` text,
  PRIMARY KEY (`kode_sms`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setsms`
--

LOCK TABLES `setsms` WRITE;
/*!40000 ALTER TABLE `setsms` DISABLE KEYS */;
/*!40000 ALTER TABLE `setsms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `nama_instansi` varchar(60) NOT NULL DEFAULT '',
  `alamat_instansi` varchar(70) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `propinsi` varchar(30) DEFAULT NULL,
  `aktifkan` enum('Yes','No') NOT NULL,
  `wallpaper` longblob,
  PRIMARY KEY (`nama_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `id_pesan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sms_masuk` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `pdu_pesan` varchar(255) DEFAULT NULL,
  `encoding` varchar(20) DEFAULT NULL,
  `id_gateway` varchar(20) DEFAULT NULL,
  `tgl_sms` datetime DEFAULT NULL,
  `sms_balasan` varchar(200) DEFAULT NULL,
  `stts_sms` enum('SUDAH DIBALAS','BELUM DIBALAS') DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spesialis`
--

DROP TABLE IF EXISTS `spesialis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spesialis` (
  `kd_sps` char(5) NOT NULL DEFAULT '',
  `nm_sps` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_sps`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spesialis`
--

LOCK TABLES `spesialis` WRITE;
/*!40000 ALTER TABLE `spesialis` DISABLE KEYS */;
/*!40000 ALTER TABLE `spesialis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagihan_obat_langsung`
--

DROP TABLE IF EXISTS `tagihan_obat_langsung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagihan_obat_langsung` (
  `no_rawat` varchar(17) NOT NULL,
  `besar_tagihan` double NOT NULL,
  KEY `no_rawat` (`no_rawat`),
  CONSTRAINT `tagihan_obat_langsung_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagihan_obat_langsung`
--

LOCK TABLES `tagihan_obat_langsung` WRITE;
/*!40000 ALTER TABLE `tagihan_obat_langsung` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagihan_obat_langsung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagihan_sadewa`
--

DROP TABLE IF EXISTS `tagihan_sadewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagihan_sadewa` (
  `no_nota` varchar(17) NOT NULL,
  `no_rkm_medis` varchar(10) NOT NULL,
  `nama_pasien` varchar(60) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `jenis_bayar` enum('Pelunasan','Deposit','Cicilan','Uang Muka') NOT NULL,
  `jumlah_tagihan` double NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `status` enum('Sudah','Belum') NOT NULL,
  PRIMARY KEY (`no_nota`,`tgl_bayar`),
  CONSTRAINT `tagihan_sadewa_ibfk_1` FOREIGN KEY (`no_nota`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagihan_sadewa`
--

LOCK TABLES `tagihan_sadewa` WRITE;
/*!40000 ALTER TABLE `tagihan_sadewa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagihan_sadewa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tambahan_biaya`
--

DROP TABLE IF EXISTS `tambahan_biaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tambahan_biaya` (
  `no_rawat` varchar(17) NOT NULL,
  `nama_biaya` varchar(60) NOT NULL,
  `besar_biaya` double NOT NULL,
  PRIMARY KEY (`no_rawat`,`nama_biaya`),
  CONSTRAINT `potongan_biaya_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tambahan_biaya_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `reg_periksa` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tambahan_biaya`
--

LOCK TABLES `tambahan_biaya` WRITE;
/*!40000 ALTER TABLE `tambahan_biaya` DISABLE KEYS */;
/*!40000 ALTER TABLE `tambahan_biaya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampbeli1`
--

DROP TABLE IF EXISTS `tampbeli1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampbeli1` (
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(100) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `satuan_stok` varchar(10) DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `jumlah_stok` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`kode_brng`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `tampbeli1_ibfk_1` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampbeli1`
--

LOCK TABLES `tampbeli1` WRITE;
/*!40000 ALTER TABLE `tampbeli1` DISABLE KEYS */;
/*!40000 ALTER TABLE `tampbeli1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampjual1`
--

DROP TABLE IF EXISTS `tampjual1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampjual1` (
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(100) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `h_jual` double DEFAULT NULL,
  `h_beli` double NOT NULL,
  `jumlah` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `dis` double DEFAULT NULL,
  `bsr_dis` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`kode_brng`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `tampjual1_ibfk_1` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampjual1`
--

LOCK TABLES `tampjual1` WRITE;
/*!40000 ALTER TABLE `tampjual1` DISABLE KEYS */;
/*!40000 ALTER TABLE `tampjual1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampjurnal`
--

DROP TABLE IF EXISTS `tampjurnal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampjurnal` (
  `kd_rek` char(5) NOT NULL DEFAULT '',
  `nm_rek` varchar(50) DEFAULT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  PRIMARY KEY (`kd_rek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampjurnal`
--

LOCK TABLES `tampjurnal` WRITE;
/*!40000 ALTER TABLE `tampjurnal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tampjurnal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamppiutang`
--

DROP TABLE IF EXISTS `tamppiutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tamppiutang` (
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(50) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `h_jual` double DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `dis` double DEFAULT NULL,
  `bsr_dis` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`kode_brng`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `tamppiutang_ibfk_1` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamppiutang`
--

LOCK TABLES `tamppiutang` WRITE;
/*!40000 ALTER TABLE `tamppiutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tamppiutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampreturbeli`
--

DROP TABLE IF EXISTS `tampreturbeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampreturbeli` (
  `no_faktur` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(100) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `h_beli` double DEFAULT NULL,
  `jml_beli` double DEFAULT NULL,
  `h_retur` double DEFAULT NULL,
  `jml_retur` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`no_faktur`,`kode_brng`),
  KEY `no_faktur` (`no_faktur`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `tampreturbeli_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampreturbeli`
--

LOCK TABLES `tampreturbeli` WRITE;
/*!40000 ALTER TABLE `tampreturbeli` DISABLE KEYS */;
/*!40000 ALTER TABLE `tampreturbeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampreturjual`
--

DROP TABLE IF EXISTS `tampreturjual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampreturjual` (
  `nota_jual` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(100) DEFAULT NULL,
  `jml_jual` double DEFAULT NULL,
  `h_jual` double DEFAULT NULL,
  `jml_retur` double DEFAULT NULL,
  `h_retur` double DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`nota_jual`,`kode_brng`),
  KEY `nota_jual` (`nota_jual`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `tampreturjual_ibfk_3` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampreturjual`
--

LOCK TABLES `tampreturjual` WRITE;
/*!40000 ALTER TABLE `tampreturjual` DISABLE KEYS */;
/*!40000 ALTER TABLE `tampreturjual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tampreturpiutang`
--

DROP TABLE IF EXISTS `tampreturpiutang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tampreturpiutang` (
  `nota_piutang` varchar(8) NOT NULL DEFAULT '',
  `kode_brng` varchar(15) NOT NULL DEFAULT '',
  `nama_brng` varchar(100) DEFAULT NULL,
  `jml_piutang` double DEFAULT NULL,
  `h_piutang` double DEFAULT NULL,
  `jml_retur` double DEFAULT NULL,
  `h_retur` double DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`nota_piutang`,`kode_brng`),
  KEY `kode_brng` (`kode_brng`),
  CONSTRAINT `tampreturpiutang_ibfk_2` FOREIGN KEY (`kode_brng`) REFERENCES `databarang` (`kode_brng`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tampreturpiutang`
--

LOCK TABLES `tampreturpiutang` WRITE;
/*!40000 ALTER TABLE `tampreturpiutang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tampreturpiutang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_laboratorium`
--

DROP TABLE IF EXISTS `template_laboratorium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_laboratorium` (
  `kd_jenis_prw` varchar(8) NOT NULL,
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `Pemeriksaan` varchar(200) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `nilai_rujukan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_template`),
  KEY `kd_jenis_prw` (`kd_jenis_prw`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_laboratorium`
--

LOCK TABLES `template_laboratorium` WRITE;
/*!40000 ALTER TABLE `template_laboratorium` DISABLE KEYS */;
/*!40000 ALTER TABLE `template_laboratorium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporary`
--

DROP TABLE IF EXISTS `temporary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporary` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `temp1` varchar(100) NOT NULL,
  `temp2` varchar(100) NOT NULL,
  `temp3` varchar(100) NOT NULL,
  `temp4` varchar(100) NOT NULL,
  `temp5` varchar(100) NOT NULL,
  `temp6` varchar(100) NOT NULL,
  `temp7` varchar(100) NOT NULL,
  `temp8` varchar(100) NOT NULL,
  `temp9` varchar(100) NOT NULL,
  `temp10` varchar(100) NOT NULL,
  `temp11` varchar(100) NOT NULL,
  `temp12` varchar(100) NOT NULL,
  `temp13` varchar(100) NOT NULL,
  `temp14` varchar(100) NOT NULL,
  `temp15` varchar(100) NOT NULL,
  `temp16` varchar(100) NOT NULL,
  `temp17` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporary`
--

LOCK TABLES `temporary` WRITE;
/*!40000 ALTER TABLE `temporary` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporary_bayar_ralan`
--

DROP TABLE IF EXISTS `temporary_bayar_ralan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporary_bayar_ralan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `temp1` varchar(100) NOT NULL,
  `temp2` varchar(100) NOT NULL,
  `temp3` varchar(100) NOT NULL,
  `temp4` varchar(100) NOT NULL,
  `temp5` varchar(100) NOT NULL,
  `temp6` varchar(100) NOT NULL,
  `temp7` varchar(100) NOT NULL,
  `temp8` varchar(100) NOT NULL,
  `temp9` varchar(100) NOT NULL,
  `temp10` varchar(100) NOT NULL,
  `temp11` varchar(100) NOT NULL,
  `temp12` varchar(100) NOT NULL,
  `temp13` varchar(100) NOT NULL,
  `temp14` varchar(100) NOT NULL,
  `temp15` varchar(100) NOT NULL,
  `temp16` varchar(100) NOT NULL,
  `temp17` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporary_bayar_ralan`
--

LOCK TABLES `temporary_bayar_ralan` WRITE;
/*!40000 ALTER TABLE `temporary_bayar_ralan` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporary_bayar_ralan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporary_bayar_ranap`
--

DROP TABLE IF EXISTS `temporary_bayar_ranap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporary_bayar_ranap` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `temp1` varchar(100) NOT NULL,
  `temp2` varchar(100) NOT NULL,
  `temp3` varchar(100) NOT NULL,
  `temp4` varchar(100) NOT NULL,
  `temp5` varchar(100) NOT NULL,
  `temp6` varchar(100) NOT NULL,
  `temp7` varchar(100) NOT NULL,
  `temp8` varchar(100) NOT NULL,
  `temp9` varchar(100) NOT NULL,
  `temp10` varchar(100) NOT NULL,
  `temp11` varchar(100) NOT NULL,
  `temp12` varchar(100) NOT NULL,
  `temp13` varchar(100) NOT NULL,
  `temp14` varchar(100) NOT NULL,
  `temp15` varchar(100) NOT NULL,
  `temp16` varchar(100) NOT NULL,
  `temp17` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporary_bayar_ranap`
--

LOCK TABLES `temporary_bayar_ranap` WRITE;
/*!40000 ALTER TABLE `temporary_bayar_ranap` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporary_bayar_ranap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporary_presensi`
--

DROP TABLE IF EXISTS `temporary_presensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporary_presensi` (
  `nip` varchar(20) NOT NULL,
  `shift` enum('Pagi1','Pagi2','Pagi3','Midle Pagi1','Midle Pagi2','Midle Pagi3','Midle Siang1','Midle Siang2','Siang','Midle Siang3','Sore','Midle Sore1','Midle Sore2','Malam','Midle Malam1','Midle Malam2') NOT NULL,
  `jam_datang` datetime DEFAULT NULL,
  `jam_pulang` datetime DEFAULT NULL,
  `status` enum('Tepat Waktu','Terlambat') NOT NULL,
  `keterlambatan` varchar(20) NOT NULL,
  `durasi` varchar(20) DEFAULT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`nip`),
  CONSTRAINT `temporary_presensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporary_presensi`
--

LOCK TABLES `temporary_presensi` WRITE;
/*!40000 ALTER TABLE `temporary_presensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporary_presensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracker`
--

DROP TABLE IF EXISTS `tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracker` (
  `nip` varchar(20) NOT NULL,
  `tgl_login` date NOT NULL,
  `jam_login` time NOT NULL,
  PRIMARY KEY (`nip`,`tgl_login`,`jam_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracker`
--

LOCK TABLES `tracker` WRITE;
/*!40000 ALTER TABLE `tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` varchar(750) NOT NULL DEFAULT '',
  `password` text,
  `jabatan` enum('true','false') DEFAULT NULL,
  `spesialis` enum('true','false') DEFAULT NULL,
  `tagihan_operasi` enum('true','false') DEFAULT NULL,
  `ktg_prw` enum('true','false') DEFAULT NULL,
  `jns_prw` enum('true','false') DEFAULT NULL,
  `poli` enum('true','false') DEFAULT NULL,
  `bangsal` enum('true','false') DEFAULT NULL,
  `kamar` enum('true','false') DEFAULT NULL,
  `ktg_penyakit` enum('true','false') DEFAULT NULL,
  `penyakit` enum('true','false') DEFAULT NULL,
  `obat` enum('true','false') DEFAULT NULL,
  `obat_penyakit` enum('true','false') DEFAULT NULL,
  `petugas` enum('true','false') DEFAULT NULL,
  `dokter` enum('true','false') DEFAULT NULL,
  `jadwal` enum('true','false') DEFAULT NULL,
  `pasien` enum('true','false') DEFAULT NULL,
  `paket_operasi` enum('true','false') DEFAULT NULL,
  `diet_pasien` enum('true','false') DEFAULT NULL,
  `reg` enum('true','false') DEFAULT NULL,
  `kelahiran_bayi` enum('true','false') DEFAULT NULL,
  `periksa_lab` enum('true','false') DEFAULT NULL,
  `kamar_inap` enum('true','false') DEFAULT NULL,
  `billing_ralan` enum('true','false') DEFAULT NULL,
  `billing_ranap` enum('true','false') DEFAULT NULL,
  `biling` enum('true','false') DEFAULT NULL,
  `suplier` enum('true','false') DEFAULT NULL,
  `satuan` enum('true','false') DEFAULT NULL,
  `rw_jln` enum('true','false') DEFAULT NULL,
  `resep` enum('true','false') DEFAULT NULL,
  `rujuk` enum('true','false') DEFAULT NULL,
  `rw_inp` enum('true','false') DEFAULT NULL,
  `konversi` enum('true','false') DEFAULT NULL,
  `br_obat` enum('true','false') DEFAULT NULL,
  `stok_opname` enum('true','false') DEFAULT NULL,
  `pembelian` enum('true','false') DEFAULT NULL,
  `penjualan` enum('true','false') DEFAULT NULL,
  `piutang` enum('true','false') DEFAULT NULL,
  `bayar_piutang` enum('true','false') DEFAULT NULL,
  `retur_jual` enum('true','false') DEFAULT NULL,
  `retur_beli` enum('true','false') DEFAULT NULL,
  `retur_piutang` enum('true','false') DEFAULT NULL,
  `keuntungan_jual` enum('true','false') DEFAULT NULL,
  `sirkulasi` enum('true','false') DEFAULT NULL,
  `akun_rekening` enum('true','false') DEFAULT NULL,
  `rekening_tahun` enum('true','false') DEFAULT NULL,
  `pasien_mati` enum('true','false') DEFAULT NULL,
  `posting_jurnal` enum('true','false') DEFAULT NULL,
  `bubes` enum('true','false') DEFAULT NULL,
  `cashflow` enum('true','false') DEFAULT NULL,
  `keuangan` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usere`
--

DROP TABLE IF EXISTS `usere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usere` (
  `nip` varchar(25) NOT NULL,
  `usere` varchar(600) NOT NULL DEFAULT '',
  `passwordte` varchar(600) DEFAULT NULL,
  `type` enum('ADMIN','PEGAWAI','DOSEN','OPERATOR') NOT NULL,
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usere`
--

LOCK TABLES `usere` WRITE;
/*!40000 ALTER TABLE `usere` DISABLE KEYS */;
/*!40000 ALTER TABLE `usere` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-31  1:19:50
