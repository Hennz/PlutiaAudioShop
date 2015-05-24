-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2015 at 01:52 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kupingkaleng`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` float NOT NULL,
  `cicilan` float NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `deskripsi`, `harga`, `cicilan`, `foto`) VALUES
(1, 'ATH-M50', '<h3>Product Description</h3>\r\n<p align=''justify''>Audio Technica M50 adalah headphone dengan harga sekitar 1 jutaan yang paling popular di toko kami. Kelebihan dari headphone ini terletak di bass yang berkualitas baik untuk kisaran harganya.</p>\r\n<h3>Product Details</h3>\r\n<ul>\r\n    <li>Closed-back Dynamic</li>\r\n    <li>45mm Neodymium driver</li>\r\n    <li>CCAW voice coil ensures wide-range response</li>\r\n    <li>Outstanding seal for maximum isolation</li>\r\n    <li>Adjustable padded headband for comfortable fit</li>\r\n    <li>Collapsible design ideal for portability and convenient storage</li>\r\n</ul>', 1720000, 160000, 'athm50.jpg'),
(2, 'Superlux HD 668 B', '<h3>Product Description</h3>\r\n<p align=''justify''>Superlux HD 668 B adalah headphone dengan harga sekitar 300 ribu yang paling popular di toko kami. Kelebihan dari headphone ini terletak di clarity dan vocal yang berkualitas baik untuk kisaran harganya.</p>\r\n<h3>Product Details</h3>\r\n<ul>\r\n    <li>Type: Dynamic</li>\r\n    <li>Frequency Response: 10 to 30,000Hz/li>\r\n    <li>Acoustic Design: Semi Open/li>\r\n    <li>Driver: ?50 mm, 38µ double dome, neodynium magnet./li>\r\n    <li>Voice Coil (at 1,000Hz Open Circuit Voltage): 56?, copper coated aluminum wire/li>\r\n    <li>Sensitivity: 98dB SPL, 1mW/li>\r\n</ul>', 345000, 30000, '18-superlux-hd668b.jpg'),
(3, 'Sennheiser HD 202', '<h3>Product Description</h3>\r\n<p align=''justify''>Sennheiser HD 202 adalah headphone dengan harga sekitar 300 ribu yang paling popular di toko kami. Kelebihan dari headphone ini terletak di bass yang berkualitas baik untuk kisaran harganya.</p>\r\n<h3>Product Details</h3>\r\n<ul>\r\n<li>Closed, supra-aural, dynamic hi-fi stereo headphones</li>\r\n<li>For DJs ,ideal for both mobile sources and home mini hi-fi systems</li>\r\n<li>Good attenuation of ambient noise</li>\r\n<li>Earcups can be removed from the headband</li>\r\n<li>Specially designed damping perforation ensures powerful bass response</li>\r\n<li>Lightweight diaphragm material with “turbine ” embossing for extremely low bass</li>\r\n<li>Powerful neodymium magnets and lightweight diaphragms for high sound levels</li>\r\n<li>Powerful bass and increased signal levels for modern rhythm-driven music</li>\r\n<li>Clips to the belt: cord take-up for adjusting the cable length when listening on the move</li>\r\n<li>Extremely comfortable to wear due to ultra-lightweight design, even for extended listening</li>\r\n<li>Rugged outdoor design with extremely flexible headband</li>\r\n<li>3 m highly conductive OFC copper cable</li>\r\n<li>Replaceable leatherette ear pads</li>\r\n</ul>', 320000, 30000, 'hd202-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE IF NOT EXISTS `confirmation` (
  `nomor` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `scan_confirmation` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`nomor`, `nama`, `scan_confirmation`) VALUES
(16, 'Unknown', 'noimage.png'),
(17, 'Unknown', 'noimage.png'),
(18, 'Unknown', 'noimage.png'),
(20, 'Unknown', 'noimage.png'),
(21, 'Unknown', 'noimage.png'),
(22, 'Unknown', 'noimage.png'),
(23, 'Unknown', 'noimage.png'),
(24, 'Unknown', 'noimage.png'),
(25, 'Unknown', 'noimage.png'),
(26, 'Unknown', 'noimage.png'),
(27, 'Unknown', 'noimage.png'),
(28, 'Unknown', 'noimage.png'),
(29, 'Unknown', 'noimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE IF NOT EXISTS `order_user` (
  `nomor` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `items` varchar(100) NOT NULL,
  `dp` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `status_credit` varchar(100) NOT NULL,
  `confirmation` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`nomor`, `nama`, `items`, `dp`, `credit`, `status_credit`, `confirmation`) VALUES
(16, 'Unknown', 'ATH-M50', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(17, 'Unknown', 'Superlux HD 668 B', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(18, 'Unknown', 'Sennheiser HD 202', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(20, 'Unknown', 'Sennheiser HD 202', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(21, 'Unknown', 'Superlux HD 668 B', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(22, 'Unknown', 'Sennheiser HD 202', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(23, 'Unknown', 'Sennheiser HD 202', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(24, 'Unknown', 'Superlux HD 668 B', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(25, 'Unknown', 'ATH-M50', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(26, 'Unknown', 'ATH-M50', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(27, 'Unknown', 'Superlux HD 668 B', 100000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(28, 'Unknown', 'ATH-M50', 500000, 0, 'Belum_Lunas', 'belum_konfirmasi'),
(29, 'Unknown', 'Sennheiser HD 202', 500000, 0, 'Belum_Lunas', 'belum_konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`, `mail`, `nama`, `phone`, `address`) VALUES
('aaaa', 'aaaa', 2, 'vita.reinforce@gmail.com', 'Unknown', '0', 'aaaa'),
('admin', 'admin', 1, 'admin@admin.com', 'Blank', '222222222', 'Anonymous');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
