-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 01:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS ozone_cse3101;

CREATE DATABASE IF NOT EXISTS ozone_cse3101;

USE ozone_cse3101;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ozone_cse3101`
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
  `importer` varchar(20) NOT NULL,
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
  `licence` varchar(200) NOT NULL,
  `certification` varchar(200) NOT NULL,
  `certification_date` varchar(20) NOT NULL,
  `good_practices_training` text NOT NULL,
  `hydrocarbons_training` text NOT NULL,
  `tools_received` text NOT NULL,
  `dateedited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipmentimport`
--

CREATE TABLE IF NOT EXISTS `equipmentimport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `year` varchar(6) NOT NULL,
  `month` varchar(20) NOT NULL,
  `equipment` varchar(200) NOT NULL,
  `refrigerant` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(30) NOT NULL,
  `brand` varchar(40) NOT NULL,
  `coo` varchar(200) NOT NULL,
  `entry_port` varchar(200) NOT NULL,
  `chemical_name` varchar(10) NOT NULL,
  `quantity_label` varchar(10) NOT NULL,
  `noau_officer` varchar(60) NOT NULL,
  `gra_officer` varchar(60) NOT NULL,
  `representative` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `dateedited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `export_content`
--

CREATE TABLE IF NOT EXISTS `export_content` (
  `id` int(1) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `whoid`, `usertype`, `ip`, `details`, `when`) VALUES
(1, 2, 'admin', '127.0.0.1', 'Girendra logout', '2018-09-08 19:03:36'),
(2, 2, 'admin', '127.0.0.1', 'Girendra Sign in', '2018-09-08 19:03:44');

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
  `website` varchar(300) NOT NULL,
  `ref` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateedited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE IF NOT EXISTS `recovery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `equipment_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recovery_entries`
--

CREATE TABLE IF NOT EXISTS `recovery_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `quarter` varchar(4) NOT NULL,
  `gas_type` varchar(20) NOT NULL,
  `entry_type` varchar(20) NOT NULL,
  `unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recovery_entry_notes`
--

CREATE TABLE IF NOT EXISTS `recovery_entry_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `quarter` varchar(4) NOT NULL,
  `gas_type` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `contact_categories` text NOT NULL,
  `gas_types` text NOT NULL,
  `equipment_types` text NOT NULL,
  `approved_by` text NOT NULL,
  `officers` text NOT NULL,
  `entry_ports` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `email`, `phone`, `signature`, `organisation`, `logo`, `contact_categories`, `gas_types`, `equipment_types`, `approved_by`, `officers`, `entry_ports`, `date`) VALUES
(1, 'http://ozone.gy', 'support@ozone.gy', '2253014', 'Support Unit\r\nNational Ozone Action Unit\r\nTel: +592 2253014  \r\nEMail: support@ozone.gy', 'Ministry of Agriculture, Hydrometeorological Service - National Ozone Action Unit', '/images/logo.png', 'Broker, Technician, Business, Organisation, Institution, Service Agent, Personal', 'R12, R22, R32, R125, R134a, R141b, R404A, R407C, R410A, R502, R290, R600, R600a, R744, R1234yf, Methyl Bromide\r\n', 'Chillers, Cold Storage Warehouses / Rooms, Commercial Ice Machines, Household Refrigerators and Freezers, Industrial Process Air Conditioning, Industrial Process Refrigeration / Plate Freezers, Motor Vehicle Air Conditioning, Residential and Light Commercial Air Conditioning and Heat Pumps, Refrigerated Transport / Trucks, Retail Food Refrigeration / Display Units, Vending Machines, Water Coolers / Dispensers, Refrigerated Containers, Portable Air Conditioning Units\r\n', 'Garvin Cummings, Diana Misir, Haymawattie Danny, Komalchand Dhiaram, Odessa Shako', 'Zainool Rahaman, Azid Ali, Behonka Dey, Odessa Shako, Anil Ramsarran, Trevaughn Forsthye, Zainool Rahaman and Trevaugn Forestyne, Zainool Rahaman and Anil Ramsarran, Odessa Shako and Trevaugn', 'John Fernandes Wharf, John Fernandes Terminal, Muneshwar Wharf, Q Trex Shipping, Demerara Shipping Limited, Guyana National Industrial Company Inc., Guyana National Shipping Company Limited, Corriverton Wharf / Warehouse, Business Premises/On site\r\n', '2017-06-08 09:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `substanceimport`
--

CREATE TABLE IF NOT EXISTS `substanceimport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `substance` varchar(200) NOT NULL,
  `year` varchar(8) NOT NULL,
  `permit_required` varchar(10) NOT NULL,
  `permit_issue_date` varchar(20) NOT NULL,
  `date_imported` varchar(20) NOT NULL,
  `quota_requested` decimal(10,2) NOT NULL,
  `quota_approved` decimal(10,2) NOT NULL,
  `quantity_imported` decimal(10,2) NOT NULL,
  `coo` varchar(200) NOT NULL,
  `entry_port` varchar(200) NOT NULL,
  `chemical_name` varchar(10) NOT NULL,
  `colour_code` varchar(10) NOT NULL,
  `quantity_label` varchar(10) NOT NULL,
  `blend` varchar(10) NOT NULL,
  `noau_officer` varchar(60) NOT NULL,
  `gra_officer` varchar(60) NOT NULL,
  `representative` varchar(100) NOT NULL,
  `approved_by` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `dateedited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `fname`, `lname`, `organisation`, `email`, `street`, `city`, `country`, `phone`, `hashed_password`, `date`) VALUES 
(2, 'admin', 'Girendra', 'Persaud', 'GxMedia', 'admin@gmail.com', '38 Hibiscus Place Blankenburg', 'West Coast Demerara', 'GY', '6261032', md5('admin'), '2016-03-11 11:37:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
