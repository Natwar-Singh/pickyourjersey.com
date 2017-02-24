-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2017 at 04:22 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `f_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`f_id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`f_id`, `user_id`, `url`, `date`) VALUES
(138, 1, 'images/NATWAR24MALE1', '2017-02-24 07:29:55'),
(139, 5, 'images/NATWAR24MALE5', '2017-02-24 07:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(20) DEFAULT NULL,
  `position_no` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`, `position_no`) VALUES
(1, 'Defender', 101),
(2, 'Striker', 24),
(3, 'Midfilder', 10),
(4, 'Coach', 16),
(5, 'Goalkeeper', 18),
(6, 'SELECT YOUR POSITION', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` smallint(6) NOT NULL,
  `role_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `position_id` smallint(6) DEFAULT NULL,
  `role_id` smallint(6) DEFAULT NULL,
  `player` varchar(20) DEFAULT NULL,
  `state` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `position_id`, `role_id`, `player`, `state`) VALUES
(1, 'Natwar Singh', 'natwarsingh96@gmail.com', '61310b5d8b74317c86bf68b9929a738f', 1, 1, 'male', 'active'),
(5, 'pqrst', 'pqr@gmail.com', '61310b5d8b74317c86bf68b9929a738f', NULL, 2, 'male', 'active'),
(6, 'pqrs', 'pqrs@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 2, 'male', 'active'),
(7, 'mohit', 'mohit@gmail.com', 'd8052f9e09a17e6907629e76bbd261cc', NULL, 2, 'MALE', 'active'),
(8, 'dhaval', 'dhaval@gmail.com', '975ef70ce2dd7ae8dd7de7c930d90d0d', NULL, 2, 'MALE', 'active'),
(9, 'preeti', 'preeti@gmail.com', '48d9d2bbfdb0d128464d3d7ecfa626b4', NULL, 2, 'FEMALE', 'active'),
(11, 'aman', 'aman@gmail.com', '61310b5d8b74317c86bf68b9929a738f', NULL, 2, 'MALE', 'active'),
(12, 'aman', 'aman1@gmail.com', '0c0cbd26b89674134a9311df8f92ec72', NULL, 2, 'MALE', 'active'),
(13, 'mohit', 'mohitsukhwal13@gmail.com', '61310b5d8b74317c86bf68b9929a738f', NULL, 2, 'MALE', 'active'),
(26, 'natwar', 'sdf@gmail.com', '6ceb561506b59acecf4b9932efa26dba', NULL, 2, 'MALE', 'active'),
(27, 'dfasd', 'esfwef@gmail.com', '6ceb561506b59acecf4b9932efa26dba', NULL, 2, 'MALE', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
