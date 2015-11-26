-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2015 at 08:28 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guards_correct`
--
CREATE DATABASE IF NOT EXISTS `guards_correct` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `guards_correct`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  `tid` varchar(50) NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `category`, `name`, `address`, `date_added`, `tid`) VALUES
(3, 'CBA', 'Eldoret Securities', 'Eldoret', '2015-11-26', '5656cabe63e50');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `contribution_id` int(5) NOT NULL AUTO_INCREMENT,
  `member_id` int(7) NOT NULL,
  `date_contributed` date NOT NULL,
  `contribution_amt` int(10) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  PRIMARY KEY (`contribution_id`),
  UNIQUE KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `member_id`, `date_contributed`, `contribution_amt`, `transaction_id`) VALUES
(5, 1, '2015-11-26', 2000, '5656fb04a11b5');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `meber_id` int(10) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `national_id` int(12) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `company_id` int(5) NOT NULL,
  `date_applied` date NOT NULL,
  `date_approved` date NOT NULL,
  `application_status` varchar(30) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  PRIMARY KEY (`meber_id`),
  UNIQUE KEY `national_id` (`national_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`meber_id`, `names`, `gender`, `phone`, `national_id`, `designation`, `location`, `employee_no`, `company_id`, `date_applied`, `date_approved`, `application_status`, `transaction_id`) VALUES
(1, 'Tom Owino', 'Male', '0723740215', 24770648, 'Watchman', 'Nairobi', 'A1234', 1, '2015-11-03', '2015-11-26', 'Approved', '5656bc8464e2b');

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

CREATE TABLE IF NOT EXISTS `transcations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `tranaction_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transcations`
--

INSERT INTO `transcations` (`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES
(9, '5656fb04a11b5', 1, '2015-11-26', 'Added New Contribution');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
