-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2015 at 11:39 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataebt`
--

CREATE TABLE IF NOT EXISTS `dataebt` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `prov` int(11) NOT NULL,
  `kab` int(11) NOT NULL,
  `kec` bigint(20) NOT NULL,
  `kel` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `dusun` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `energi` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `terpasang` int(11) NOT NULL,
  `kwh` int(11) NOT NULL,
  PRIMARY KEY (`id_data`),
  UNIQUE KEY `prov` (`prov`,`kab`,`kec`,`kel`,`dusun`,`energi`,`posisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
