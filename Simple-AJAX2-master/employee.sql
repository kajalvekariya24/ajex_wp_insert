-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2016 at 08:09 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`) VALUES
(1, 'BSc'),
(2, 'MSc'),
(3, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `job_title`, `salary`, `notes`) VALUES
(1, 'Robin', 'Jackman', 'Software Engineer', 5500, NULL),
(2, 'Taylor', 'Edward', 'Software Architect', 7200, NULL),
(3, 'Vivian', 'Dickens', 'Database Administrator', 6000, NULL),
(4, 'Harry', 'Clifford', 'Database Administrator', 6800, NULL),
(5, 'Eliza', 'Clifford', 'Software Engineer', 4750, NULL),
(6, 'Nancy', 'Newman', 'Software Engineer', 5100, NULL),
(7, 'Melinda', 'Clifford', 'Project Manager', 8500, NULL),
(8, 'Harley', 'Gilbert', 'Software Architect', 8000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE IF NOT EXISTS `employee_education` (
  `employee_id` int(11) NOT NULL,
  `education_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_education`
--

INSERT INTO `employee_education` (`employee_id`, `education_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `name`) VALUES
(1, 'Casual'),
(2, 'Medical');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_user`
--

CREATE TABLE IF NOT EXISTS `meeting_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meeting_user`
--

INSERT INTO `meeting_user` (`id`, `user_id`, `username`, `password`) VALUES
(1, NULL, 'm_admin', 'm_admin'),
(2, 3, 'm_taylor', 'm_taylor'),
(3, 4, 'm_vivian', 'm_vivian'),
(4, 6, 'm_melinda', 'm_melinda'),
(5, 7, 'm_harley', 'm_harley');

-- --------------------------------------------------------

--
-- Table structure for table `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `telephone`
--

INSERT INTO `telephone` (`id`, `employee_id`, `type`, `no`) VALUES
(1, 1, 'mobile', '245-249697'),
(2, 2, 'mobile', '270-235969'),
(3, 2, 'land', '325-888885'),
(4, 3, 'mobile', '270-684972'),
(5, 4, 'mobile', '245-782365'),
(6, 4, 'land', '325-888886'),
(7, 5, 'mobile', '245-537891'),
(8, 6, 'mobile', '270-359457'),
(9, 7, 'mobile', '245-436589'),
(10, 7, 'land', '325-888887'),
(11, 8, 'mobile', '245-279164'),
(12, 8, 'land', '325-888888');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `employee_id`, `user_type`, `username`, `password`) VALUES
(1, NULL, 'SUPER ADMIN', 'admin', 'admin'),
(2, 1, 'NORMAL', 'robin', 'robin'),
(3, 2, 'ADMIN', 'taylor', 'taylor'),
(4, 3, 'ADMIN', 'vivian', 'vivian'),
(5, 4, 'NORMAL', 'harry', 'harry'),
(6, 7, 'ADMIN', 'melinda', 'melinda'),
(7, 8, 'NORMAL', 'harley', 'harley');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
