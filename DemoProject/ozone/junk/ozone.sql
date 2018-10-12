-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 05:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ozone`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `organisation` varchar(200) DEFAULT NULL,
  `job_title` varchar(200) DEFAULT NULL,
  `office_phone` varchar(60) DEFAULT NULL,
  `home_phone` varchar(60) DEFAULT NULL,
  `mobile_phone` varchar(60) DEFAULT NULL,
  `fax_number` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `notes` text NOT NULL,
  `good_practices_training` text NOT NULL,
  `hydrocarbons_training` text NOT NULL,
  `tools_received` text NOT NULL,
  `dateedited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `title`, `fname`, `lname`, `organisation`, `job_title`, `office_phone`, `home_phone`, `mobile_phone`, `fax_number`, `email`, `street`, `village`, `province`, `region`, `notes`, `good_practices_training`, `hydrocarbons_training`, `tools_received`, `dateedited`, `dateadded`) VALUES
(3, 'Personal', 'Ms.', 'Natasha', 'Persaud', 'Ministry of Agriculture - National Ozone Action Unit', 'Owner', '2314565', '2201967', '6562321', '2314544', 'natashap@gxmediagy.com', '45 Small Street', 'Pouderoyen', 'West Bank Demerara', 7, '', '', '', '', '2017-05-02 22:07:05', '2017-05-02 00:09:34'),
(4, 'Technician', 'Mr.', 'Shaka', 'Dow', 'eGov', 'Boss Man', '2315657', '2225656', '6546565', '2314543', 'sdow@yahoo.com', '123 New Street', 'Denamstel', 'West Coast Demerara', 3, 'You can get him at work between 9am - 11am only on Mondays', '04/2017: West Demerara Secondary\r\n01/2016: Leonora Center', 'none', 'Tube cutter,  Flaring tool set ,  Vise grip pliers, Combination long nose pliers, Tube bender', '2017-05-02 22:08:24', '2017-05-02 21:08:48'),
(5, 'Business', 'Mr.', 'Gregory', 'Seetram', 'Swiss Machinery', 'Manager', '2334545', '2334546', '6191418', '2339898', 'gergs@swiss.com', '121 Public Road', 'Eccles', 'East Bank Demerara', 4, '', '', '', '', '2017-05-03 07:40:07', '2017-05-02 22:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `whoid` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `details` varchar(200) NOT NULL,
  `when` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `whoid`, `usertype`, `ip`, `details`, `when`) VALUES
(66, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-21 00:45:31'),
(67, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-21 00:45:34'),
(68, 2, 'admin', '127.0.0.1', 'Girendra deleted user with id = 5', '2017-04-21 00:47:05'),
(69, 2, 'admin', '127.0.0.1', 'Girendra deleted user Direndra', '2017-04-21 00:48:41'),
(70, 2, 'admin', '127.0.0.1', 'Girendra added a new user Direndra', '2017-04-21 00:51:32'),
(71, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-21 06:42:40'),
(72, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-21 07:47:03'),
(73, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-21 11:36:56'),
(75, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-27 14:21:13'),
(76, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-27 17:22:18'),
(77, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-27 17:22:25'),
(78, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-27 17:28:44'),
(79, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-27 17:36:39'),
(80, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 19:33:22'),
(81, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 19:33:36'),
(82, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 19:35:50'),
(83, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 21:04:22'),
(84, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 21:04:32'),
(85, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-27 21:13:25'),
(86, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 22:15:48'),
(87, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-27 23:16:37'),
(88, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-27 23:32:55'),
(89, 2, 'admin', '127.0.0.1', 'Girendra deleted publication', '2017-04-27 23:36:36'),
(90, 2, 'admin', '127.0.0.1', 'Girendra deleted user Direndra', '2017-04-27 23:39:05'),
(91, 2, 'admin', '127.0.0.1', 'Girendra added a new user Direndra', '2017-04-27 23:39:35'),
(92, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-27 23:54:41'),
(94, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-27 23:55:37'),
(95, 2, 'admin', '127.0.0.1', 'Girendra edited user Direndra', '2017-04-28 00:22:30'),
(96, 2, 'admin', '127.0.0.1', 'Girendra edited user Direndra', '2017-04-28 00:22:46'),
(97, 2, 'admin', '127.0.0.1', 'Girendra edited user Direndra', '2017-04-28 00:23:33'),
(98, 2, 'admin', '127.0.0.1', 'Girendra edited user Direndra', '2017-04-28 00:23:37'),
(99, 2, 'admin', '127.0.0.1', 'Girendra edited and change password for user Direndra', '2017-04-28 00:24:06'),
(100, 2, 'admin', '127.0.0.1', 'Girendra edited and change password for user Direndra', '2017-04-28 00:24:22'),
(101, 2, 'admin', '127.0.0.1', 'Girendra edited user Direndra', '2017-04-28 00:24:37'),
(102, 2, 'admin', '127.0.0.1', 'Girendra edited user Direndra', '2017-04-28 00:24:53'),
(103, 2, 'admin', '127.0.0.1', 'Girendra deleted user Direndra', '2017-04-28 00:25:01'),
(104, 2, 'admin', '127.0.0.1', 'Girendra added a new user Direndra', '2017-04-28 00:59:49'),
(105, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-28 01:06:33'),
(106, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-28 01:06:39'),
(107, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-04-28 01:11:52'),
(109, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-04-28 01:12:07'),
(110, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:24:10'),
(111, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:24:17'),
(112, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:24:25'),
(113, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:30:18'),
(114, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:41:48'),
(115, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-05-01 21:41:59'),
(116, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-05-01 21:42:04'),
(117, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:44:17'),
(118, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:46:03'),
(119, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-01 21:46:10'),
(120, 2, 'admin', '127.0.0.1', 'Girendra added a new user ', '2017-05-01 23:55:12'),
(121, 2, 'admin', '127.0.0.1', 'Girendra deleted user ', '2017-05-02 00:04:44'),
(122, 2, 'admin', '127.0.0.1', 'Girendra deleted contact', '2017-05-02 00:06:32'),
(123, 2, 'admin', '127.0.0.1', 'Girendra added a new user ', '2017-05-02 00:07:19'),
(124, 2, 'admin', '127.0.0.1', 'Girendra added a new user ', '2017-05-02 00:09:34'),
(125, 2, 'admin', '127.0.0.1', 'settings updated', '2017-05-02 20:29:29'),
(126, 2, 'admin', '127.0.0.1', 'Girendra added a new user ', '2017-05-02 21:08:48'),
(127, 2, 'admin', '127.0.0.1', 'Girendra deleted contact', '2017-05-02 21:37:32'),
(128, 2, 'admin', '127.0.0.1', 'Girendra edited contact ', '2017-05-02 22:05:10'),
(129, 2, 'admin', '127.0.0.1', 'Girendra edited contact ', '2017-05-02 22:05:31'),
(130, 2, 'admin', '127.0.0.1', 'Girendra edited contact ', '2017-05-02 22:07:05'),
(131, 2, 'admin', '127.0.0.1', 'Girendra edited contact Shaka', '2017-05-02 22:08:24'),
(132, 2, 'admin', '127.0.0.1', 'Girendra added a new contact Gregory', '2017-05-02 22:09:53'),
(133, 2, 'admin', '127.0.0.1', 'Girendra edited contact Gregory', '2017-05-02 22:12:57'),
(134, 2, 'admin', '127.0.0.1', 'Girendra edited contact Gregory', '2017-05-02 22:46:44'),
(135, 2, 'admin', '127.0.0.1', 'Girendra edited contact Gregory', '2017-05-02 22:47:17'),
(136, 2, 'admin', '127.0.0.1', 'Girendra logout', '2017-05-03 07:34:09'),
(137, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2017-05-03 07:39:40'),
(138, 2, 'admin', '127.0.0.1', 'Girendra edited contact Gregory', '2017-05-03 07:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `reviewers` varchar(200) DEFAULT NULL,
  `journal_title` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `abstract` text NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `publication_year` varchar(8) NOT NULL,
  `quantity` int(11) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateedited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `author`, `reviewers`, `journal_title`, `title`, `abstract`, `publisher`, `publication_year`, `quantity`, `keywords`, `notes`, `dateadded`, `dateedited`) VALUES
(7, 'Anil Markandya and Nick Dale', 'Stephen O. Anderson, Stephen DeCanio and Shiqiu Zhang', '', 'The Montreal Protocol and the Green Economy: Assessing the contributions and co-benefits of a Multilateral Environmental Agreement', '', 'United Nations Environment Programme, Nairobi, Kenya', '2010', 1, 'Green Economy, Montreal Protocol, climate change, ozone depleting substances, ozone depletion, ODP, GWP', '', '2017-04-27 23:36:56', '2017-04-28 00:16:20'),
(8, 'Swedish Environmental Protection Agency', '', '', 'Alternatives to HCFCs in the refrigeration and air conditioning sector: Practical guidelines and case studies for equipment retrofit and replacement', '', 'United Nations Environment Programme, Nairobi, Kenya', '2012', 1, 'HCFCs, HCFC phase-out, ODS alternatives, refrigeration and air conditioning technicians, refrigeration and air conditioning, Montreal Protocol', '', '2017-04-27 23:37:19', '2017-04-27 23:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `signature` text NOT NULL,
  `organisation` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `email`, `phone`, `signature`, `organisation`, `logo`, `date`) VALUES
(1, 'http://me/ozone', 'support@ozone.gy', '2253014', 'Support Unit \\nNational Ozone Action Unit. \\nTel: +592 2253014  \\nEMail: support@ozone.gy', 'Ministry of Agriculture - National Ozone Action Unit', '/images/logo.png', '2017-05-02 20:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL COMMENT 'Type will be admin or ordinary users',
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `organisation` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `hashed_password` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `fname`, `lname`, `organisation`, `email`, `street`, `city`, `country`, `phone`, `hashed_password`, `date`) VALUES
(2, 'admin', 'Girendra', 'Persaud', 'GxMedia', 'girendra1@gmail.com', '38 Hibiscus Place Blankenburg', 'West Coast Demerara', 'GY', '6261032', '9cbf8a4dcb8e30682b927f352d6559a0', '2016-03-11 11:37:54'),
(10, 'admin', 'Direndra', 'Persaud', 'GxMedia', 'direndrap@gxmediagy.com', '38 Hibiscus Place', 'Blankenburg WCD', 'GY', '6261034', 'dd77a7b91c956d98ac80aeba802ad1d2', '2017-04-28 00:59:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
