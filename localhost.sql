-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2015 at 03:06 AM
-- Server version: 5.5.41
-- PHP Version: 5.3.10-1ubuntu3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tab`
--
CREATE DATABASE `tab` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tab`;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `Username` varchar(20) NOT NULL,
  `Attempt` int(2) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`Username`, `Attempt`, `Time`) VALUES
('shivamx', 1, '13-02-2015 02:11:48'),
('shivamx', 2, '13-02-2015 02:11:52'),
('shivamx', 3, '13-02-2015 02:11:55'),
('shivam_chrome', 1, '13-02-2015 02:19:12'),
('shivam_chrome', 2, '13-02-2015 02:19:19'),
('shivam_chrome', 3, '13-02-2015 02:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`) VALUES
('shivamx', '123'),
('shivam_chrome', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
