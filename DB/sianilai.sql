-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2012 at 03:57 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siasma`
--
CREATE DATABASE `siasma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siasma`;

-- --------------------------------------------------------

--
-- Table structure for table `r_agama`
--

CREATE TABLE IF NOT EXISTS `r_agama` (
  `id_agama` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `r_agama`
--

INSERT INTO `r_agama` (`id_agama`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Budha'),
(4, 'Hindu'),
(5, 'Katolik');

-- --------------------------------------------------------

--
-- Table structure for table `r_goldarah`
--

CREATE TABLE IF NOT EXISTS `r_goldarah` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `r_goldarah`
--

INSERT INTO `r_goldarah` (`id`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `r_jk`
--

CREATE TABLE IF NOT EXISTS `r_jk` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `r_jk`
--

INSERT INTO `r_jk` (`id`, `nama`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `r_kelas`
--

CREATE TABLE IF NOT EXISTS `r_kelas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `r_kelas`
--

INSERT INTO `r_kelas` (`id`, `nama`) VALUES
(4, 'X-1'),
(7, 'X-2'),
(8, 'X-4'),
(11, 'X-3'),
(12, 'X-5'),
(13, 'XI IPA 1'),
(14, 'XI IPA 2'),
(15, 'XI IPS 1'),
(16, 'XI IPS 2'),
(17, 'XI IPS 3'),
(18, 'XII IPA 1'),
(19, 'XII IPA 2'),
(20, 'XII IPS 1'),
(21, 'XII IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `r_level`
--

CREATE TABLE IF NOT EXISTS `r_level` (
  `id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `key` varchar(15) NOT NULL,
  `aktif` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_level`
--

INSERT INTO `r_level` (`id`, `level`, `key`, `aktif`) VALUES
(1, 'admin', 'username', 1),
(10, 'guru', 'nip', 1),
(50, 'siswa', 'nis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_mapelkelas`
--

CREATE TABLE IF NOT EXISTS `r_mapelkelas` (
  `kdkelas` int(11) NOT NULL,
  `kdmapel` int(11) NOT NULL,
  PRIMARY KEY (`kdkelas`,`kdmapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_matapelajaran`
--

CREATE TABLE IF NOT EXISTS `r_matapelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `kkm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `r_matapelajaran`
--

INSERT INTO `r_matapelajaran` (`id`, `nama`, `kkm`) VALUES
(1, 'SOSIOLOGI', 73),
(2, 'BP / BK', 0),
(3, 'P. Agama Islam', 75),
(4, 'MATEMATIKA', 75),
(5, 'BIOLOGI', 75),
(6, 'Bhs. INDONESIA', 72),
(7, 'PKn', 75),
(8, 'FISIKA', 72),
(9, 'KIMIA', 71),
(10, 'SEJARAH', 75),
(11, 'Bhs. INGGRIS', 72),
(12, 'TIK', 72),
(13, 'EKONOMI', 72),
(14, 'AKUNTANSI', 73),
(15, 'GEOGRAFI', 70),
(16, 'P. Seni', 75),
(17, 'Bhs. ARAB', 70),
(18, 'TATA BOGA', 75),
(19, 'P. Jasmani', 75);

-- --------------------------------------------------------

--
-- Table structure for table `r_semester`
--

CREATE TABLE IF NOT EXISTS `r_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(7) NOT NULL,
  `aktif` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `r_semester`
--

INSERT INTO `r_semester` (`id`, `semester`, `aktif`) VALUES
(1, 'Ganjil', 1),
(2, 'Genap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_tahunajaran`
--

CREATE TABLE IF NOT EXISTS `r_tahunajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahunajaran` varchar(15) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `r_tahunajaran`
--

INSERT INTO `r_tahunajaran` (`id`, `tahunajaran`, `aktif`) VALUES
(2, '2009/2010', 0),
(3, '2011/2012', 1),
(4, '2010/2011', 0),
(5, '2008/2009', 0),
(6, '2012/2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `re_siswakelas`
--

CREATE TABLE IF NOT EXISTS `re_siswakelas` (
  `tahunajaran` int(11) NOT NULL,
  `nis` varchar(7) NOT NULL,
  `kelas` int(3) NOT NULL,
  PRIMARY KEY (`tahunajaran`,`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_siswakelas`
--

INSERT INTO `re_siswakelas` (`tahunajaran`, `nis`, `kelas`) VALUES
(3, '002737', 4),
(3, '002751', 4),
(3, '002752', 4),
(3, '002760', 4),
(3, '002768', 4),
(3, '002769', 4),
(6, '002737', 13),
(6, '002751', 13);

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE IF NOT EXISTS `t_guru` (
  `nip` varchar(20) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `panggilan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` int(2) NOT NULL,
  `jk` int(2) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `gol_darah` int(2) NOT NULL,
  `foto` varchar(2) NOT NULL,
  `postdate` datetime NOT NULL,
  `postby` varchar(20) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`nip`, `nuptk`, `nama`, `panggilan`, `tempat_lahir`, `tgl_lahir`, `agama`, `jk`, `alamat`, `telp`, `gol_darah`, `foto`, `postdate`, `postby`) VALUES
('195111101978031006', '', 'Drs. Widji Wiyono', '', '', '0000-00-00', 1, 1, '', '', 0, '', '2012-05-31 12:05:19', ''),
('195405191980031012', '', 'Drs. Sumijan', '', '', '0000-00-00', 1, 1, '', '', 0, '', '2012-06-01 12:06:46', ''),
('195407151980031031', '', 'Drs. Achmad Turmudi', '', '', '0000-00-00', 1, 1, '', '', 0, '', '2012-05-31 12:05:06', ''),
('195808101986031029', '', 'Drs. Lukman H.', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:28', ''),
('195901011986031038', '', 'Drs. Imam Damami', 'Imam', '', '0000-00-00', 1, 1, '', '', 0, '', '2012-06-01 12:06:37', ''),
('195910281987012002', '', 'Dra. Suwarsih', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:28', ''),
('196111251988032005', '', 'Dra. Pujiharti', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:09', ''),
('196202281996012001', '', 'Dra. Puyarmi', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:32', ''),
('196406191990031008', '', 'Drs. Budiono, MM', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:59', ''),
('196507281990031007', '', 'Drs. Samsi', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:49', ''),
('196509142007012007', '', 'Siti Salamah, S.Pd, M.Si', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:20', ''),
('196604141989011003', '', 'Drs. Harnaji', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:41', ''),
('196609081995121002', '', 'Drs. Suparlan', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:17', ''),
('196612152007011013', '', 'Saroni, S.Pd, M.Si', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:05', ''),
('196806191995032003', '', 'Dra. Wiwik Widayati', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:11', ''),
('196808231998031007', '', 'Atok Urohman, S.Pd', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:31', ''),
('196808261998021004', '', 'Edi Wicaksono Utomo, S.Pd', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:40', ''),
('196812072007011014', '', 'Drs. Rony Eko Prasetyo', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:17', ''),
('196901051994121003', '', 'Drs. Dwi Purwita', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:05', ''),
('196906301992032008', '', 'Sri Asih, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:23', ''),
('197001091993012002', '', 'Amin Nyiwuryati, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:05', ''),
('197002142008012015', '', 'Sumarti, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:39', ''),
('197010182008011005', '', 'Moch. Arif, S.Pd', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:31', ''),
('197011201998022004', '', 'Anisah Nikmah, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:42', ''),
('197012162008012012', '', 'Hartining, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:06', ''),
('197103052006042029', '', 'Paniyem, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:36', ''),
('197104091997021007', '', 'Priyatmoko S.Pd, MMA', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:05', ''),
('197105161993011001', '', 'Wahyudi Iswantono', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:03', ''),
('197112312008012018', '', 'Lina Ambarwati, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:08', ''),
('197202292008011005', '', 'Jainul Munadir, S.Pd', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:39', ''),
('197209231998022003', '', 'Endang Rahayuningsih, S.Pd', '', '', '0000-00-00', 0, 2, '', '', 0, '', '2012-06-01 12:06:12', ''),
('197506172009031001', '', 'Sudarmaji, S.Sos', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:08', ''),
('198108202009031004', '', 'Sony Sumarsono, S.Pd', '', '', '0000-00-00', 0, 1, '', '', 0, '', '2012-06-01 12:06:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_guruajar`
--

CREATE TABLE IF NOT EXISTS `t_guruajar` (
  `nip` varchar(20) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `semester` int(2) NOT NULL,
  `kd_matapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `aktif` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nip`,`id_tahunajaran`,`semester`,`kd_matapel`,`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_guruajar`
--

INSERT INTO `t_guruajar` (`nip`, `id_tahunajaran`, `semester`, `kd_matapel`, `id_kelas`, `aktif`) VALUES
('195901011986031038', 3, 1, 3, 4, 1),
('195901011986031038', 3, 1, 3, 7, 1),
('195901011986031038', 3, 1, 3, 8, 1),
('195901011986031038', 3, 1, 3, 11, 1),
('195901011986031038', 3, 1, 3, 12, 1),
('195901011986031038', 3, 1, 3, 13, 1),
('195901011986031038', 3, 1, 3, 14, 1),
('195901011986031038', 3, 1, 3, 15, 1),
('195901011986031038', 3, 1, 3, 16, 1),
('195901011986031038', 3, 1, 3, 17, 1),
('195901011986031038', 3, 1, 3, 18, 1),
('195901011986031038', 3, 1, 3, 19, 1),
('195901011986031038', 3, 1, 3, 20, 1),
('195901011986031038', 3, 1, 3, 21, 1),
('197011201998022004', 3, 1, 6, 4, 1),
('197011201998022004', 3, 1, 6, 7, 1),
('197011201998022004', 3, 1, 6, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai`
--

CREATE TABLE IF NOT EXISTS `t_nilai` (
  `nis` varchar(7) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `semester` int(2) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matapel` int(11) NOT NULL,
  `UH` int(11) NOT NULL,
  `UTS` int(11) NOT NULL,
  `US` int(11) NOT NULL,
  `KOG` int(11) NOT NULL,
  `PSI` int(11) NOT NULL,
  `AFE` varchar(4) NOT NULL,
  `KK1` int(11) NOT NULL,
  `KK2` int(11) NOT NULL,
  `KK3` int(11) NOT NULL,
  `KK4` int(11) NOT NULL,
  `KK5` int(11) NOT NULL,
  `rata2` decimal(10,2) NOT NULL,
  PRIMARY KEY (`nis`,`id_tahunajaran`,`semester`,`id_kelas`,`id_matapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nilai`
--

INSERT INTO `t_nilai` (`nis`, `id_tahunajaran`, `semester`, `id_kelas`, `id_matapel`, `UH`, `UTS`, `US`, `KOG`, `PSI`, `AFE`, `KK1`, `KK2`, `KK3`, `KK4`, `KK5`, `rata2`) VALUES
('002737', 3, 1, 4, 3, 85, 87, 100, 100, 100, 'A', 40, 50, 30, 20, 50, 0.00),
('002737', 3, 1, 4, 7, 80, 70, 89, 87, 95, 'B', 70, 80, 60, 80, 88, 0.00),
('002751', 3, 1, 4, 3, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002751', 3, 1, 4, 7, 80, 90, 80, 75, 0, '', 0, 0, 0, 0, 0, 0.00),
('002752', 3, 1, 4, 3, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002752', 3, 1, 4, 7, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002760', 3, 1, 4, 3, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002760', 3, 1, 4, 7, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002768', 3, 1, 4, 3, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002768', 3, 1, 4, 7, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00),
('002769', 3, 1, 4, 3, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE IF NOT EXISTS `t_siswa` (
  `nis` varchar(7) NOT NULL,
  `nis_nas` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `panggilan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` int(2) DEFAULT NULL,
  `jk` int(2) DEFAULT NULL,
  `anakke` int(3) DEFAULT NULL,
  `alamat` varchar(150) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `gol_darah` int(2) DEFAULT NULL,
  `tgl_sttb` date DEFAULT NULL,
  `no_sttb` varchar(20) DEFAULT NULL,
  `diterima_ta` int(2) NOT NULL,
  `diterima_kelas` int(2) DEFAULT NULL,
  `foto` varchar(2) NOT NULL,
  `postdate` datetime DEFAULT NULL,
  `postby` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`nis`, `nis_nas`, `nama`, `panggilan`, `tempat_lahir`, `tgl_lahir`, `agama`, `jk`, `anakke`, `alamat`, `telp`, `gol_darah`, `tgl_sttb`, `no_sttb`, `diterima_ta`, `diterima_kelas`, `foto`, `postdate`, `postby`) VALUES
('002737', '', 'ADI NOTO BEKTI', '', '', '0000-00-00', 1, 1, 0, '', '', 0, '0000-00-00', '', 3, 4, '', '2012-05-30 11:05:50', ''),
('002751', '', 'ANGGUN KHOLIFATUL ENDARWATI', '', '', '0000-00-00', 1, 2, 0, '', '', 0, '0000-00-00', '', 3, 4, '', '2012-05-30 11:05:01', ''),
('002752', '', 'ANJAR RAHMAWATI', '', '', '0000-00-00', 1, 2, 0, '', '', 0, '0000-00-00', '', 3, 4, '', '2012-05-30 11:05:25', ''),
('002760', '', 'ASTIKA PURWANINGSIH', '', '', '0000-00-00', 1, 2, 0, '', '', 0, '0000-00-00', '', 3, 4, '', '2012-05-30 11:05:05', ''),
('002768', '', 'BINTI LATIFATUN KH.', '', '', '0000-00-00', 1, 2, 0, '', '', 0, '0000-00-00', '', 3, 4, '', '2012-05-31 12:05:54', ''),
('002769', '', 'BINTI SETIAWATI', '', '', '0000-00-00', 1, 2, 0, '', '', 0, '0000-00-00', '', 3, 4, '', '2012-06-01 01:06:34', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nip_nis` varchar(25) NOT NULL,
  `level` varchar(5) NOT NULL,
  `create_date` date NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`username`, `password`, `nip_nis`, `level`, `create_date`, `last_login`) VALUES
('002737', 'd534d7999bcbfd03eda7c8917fe03c84', '002737', '50', '2012-01-09', '0000-00-00'),
('002751', 'f0620748333224db0f0d9c41d86b7bc9', '002751', '50', '2012-01-09', '0000-00-00'),
('002752', '15ff019844d8e84ef7718059bb48a966', '002752', '50', '2012-05-30', '2012-05-30'),
('002760', '039fdacf8ba49eed18530e7737a0a0a9', '002760', '50', '2012-05-30', '2012-05-30'),
('002768', '27fc95b88bc5b82ea4ee8bdd79288ce3', '002768', '50', '2012-05-31', '2012-05-31'),
('002769', '2bb945fd1cec7606af1afbcf27cb6641', '002769', '50', '2012-06-01', '2012-06-01'),
('195111101978031006', '6bf02911b7d79d38eb1140c652e891d4', '195111101978031006', '10', '0000-00-00', '0000-00-00'),
('195405191980031012', '62e6f5db2e0c17618695d872e4dcb1ee', '195405191980031012', '10', '0000-00-00', '0000-00-00'),
('195407151980031031', '0296740b77c565987ec17a0131108924', '195407151980031031', '10', '0000-00-00', '0000-00-00'),
('195808101986031029', '50f65b8f43113c634c20a568307c1143', '195808101986031029', '10', '0000-00-00', '0000-00-00'),
('195901011986031038', '40a08fe51962e820b2976410171d2007', '195901011986031038', '10', '0000-00-00', '0000-00-00'),
('195910281987012002', '46da2d6a10de59df3f61d2317a8575df', '195910281987012002', '10', '0000-00-00', '0000-00-00'),
('196111251988032005', '5a7af5c604ed179a26e453055c2b3461', '196111251988032005', '10', '0000-00-00', '0000-00-00'),
('196202281996012001', '3d345f259f5d02bd9eb94b6c5065416d', '196202281996012001', '10', '0000-00-00', '0000-00-00'),
('196406191990031008', 'a5d69138c652727dafd72c74926f267f', '196406191990031008', '10', '0000-00-00', '0000-00-00'),
('196507281990031007', 'cfaaf197fef8554a4ae6b7a68da87c44', '196507281990031007', '10', '0000-00-00', '0000-00-00'),
('196509142007012007', 'd873e918e9f2e6025a2419b26c0258b1', '196509142007012007', '10', '0000-00-00', '0000-00-00'),
('196604141989011003', 'f2caf022af475a2b01441f67b17aa6d2', '196604141989011003', '10', '0000-00-00', '0000-00-00'),
('196609081995121002', 'f71d989bc2c611a34de8605f1b9a08d2', '196609081995121002', '10', '0000-00-00', '0000-00-00'),
('196612152007011013', '3dd688a4e1b1b20ec8b685db4c25cca6', '196612152007011013', '10', '0000-00-00', '0000-00-00'),
('196806191995032003', '58a4ad0d3a831b5189fd13a8d5b5a9aa', '196806191995032003', '10', '0000-00-00', '0000-00-00'),
('196808231998031007', 'f51551fad2110f2a87c2b9fed7cc2348', '196808231998031007', '10', '0000-00-00', '0000-00-00'),
('196808261998021004', 'f5dce4cfdd09d3fa4bb497bbfebecaab', '196808261998021004', '10', '0000-00-00', '0000-00-00'),
('196812072007011014', 'de5d2850e111c9a08abe637e9e6784ff', '196812072007011014', '10', '0000-00-00', '0000-00-00'),
('196901051994121003', '61cb0b8f88be92e94f6ff17641fd6024', '196901051994121003', '10', '0000-00-00', '0000-00-00'),
('196906301992032008', 'f0c795d4e04422305c484ee4cd141f6d', '196906301992032008', '10', '0000-00-00', '0000-00-00'),
('197001091993012002', '6300e472cb92a2d6f624105be0067cc9', '197001091993012002', '10', '0000-00-00', '0000-00-00'),
('197002142008012015', '7ffb2b664b98ca2d56d8e36442785b32', '197002142008012015', '10', '0000-00-00', '0000-00-00'),
('197010182008011005', 'b163eea4f5a96dd1d2644f314acfb1ea', '197010182008011005', '10', '0000-00-00', '0000-00-00'),
('197011201998022004', '213f0848d99976d6be0dbd7b7abce144', '197011201998022004', '10', '0000-00-00', '0000-00-00'),
('197012162008012012', 'a8fc7a1eae2da0be2f3fd30684e99b0e', '197012162008012012', '10', '0000-00-00', '0000-00-00'),
('197103052006042029', '6097d1970c931df3a3952e89d5a59082', '197103052006042029', '10', '0000-00-00', '0000-00-00'),
('197104091997021007', 'e4b8954c4dfd0580ba5091fe28ce3713', '197104091997021007', '10', '0000-00-00', '0000-00-00'),
('197105161993011001', '2e8dcc2350f6be820af855a71f2eff09', '197105161993011001', '10', '0000-00-00', '0000-00-00'),
('197112312008012018', '0ae0a14bba594faa3dcdfb23a4bb05c7', '197112312008012018', '10', '0000-00-00', '0000-00-00'),
('197202292008011005', 'c75575eb7590fb7fcf4bf7e6eb4707fd', '197202292008011005', '10', '0000-00-00', '0000-00-00'),
('197209231998022003', 'd34357b12449c14b478a7edc179bc45e', '197209231998022003', '10', '0000-00-00', '0000-00-00'),
('197506172009031001', '47e751b8e3d14545ea166b158437cf18', '197506172009031001', '10', '0000-00-00', '0000-00-00'),
('198108202009031004', '04e8769bbcc3c62a5a48a9ead8f1ecd2', '198108202009031004', '10', '0000-00-00', '0000-00-00'),
('admin', '21232f297a57a5a743894a0e4a801fc3', '', '1', '2012-01-09', '2012-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `t_walikelas`
--

CREATE TABLE IF NOT EXISTS `t_walikelas` (
  `tahunajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  PRIMARY KEY (`tahunajaran`,`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_walikelas`
--

INSERT INTO `t_walikelas` (`tahunajaran`, `id_kelas`, `nip`) VALUES
(3, 4, '197103052006042029'),
(3, 7, '196812072007011014'),
(3, 8, '197112312008012018'),
(3, 11, '197506172009031001'),
(3, 13, '197011201998022004');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
