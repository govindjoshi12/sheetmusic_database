-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2019 at 12:08 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loginassignment`
--
CREATE DATABASE IF NOT EXISTS `loginassignment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loginassignment`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'govi', 'govi'),
(2, 'brovi', 'brovi'),
(3, 'bruh', 'bruh'),
(4, 'briannadp', 'iluvwesley');
--
-- Database: `sheetmusic_database`
--
CREATE DATABASE IF NOT EXISTS `sheetmusic_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sheetmusic_database`;

-- --------------------------------------------------------

--
-- Table structure for table `ensemble_types`
--

CREATE TABLE IF NOT EXISTS `ensemble_types` (
  `ensemble_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ensemble_type` varchar(255) NOT NULL,
  PRIMARY KEY (`ensemble_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ensemble_types`
--

INSERT INTO `ensemble_types` (`ensemble_type_id`, `ensemble_type`) VALUES
(1, 'Full Band'),
(2, 'Solo'),
(3, 'Chamber Ensemble'),
(4, 'Educational');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre`) VALUES
(1, 'Marching Band'),
(2, 'Holiday'),
(3, 'Jazz'),
(4, 'Funk'),
(5, 'Classical');

-- --------------------------------------------------------

--
-- Table structure for table `instrumentation`
--

CREATE TABLE IF NOT EXISTS `instrumentation` (
  `instrumentation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `instrument` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`instrumentation_id`),
  UNIQUE KEY `instrumentation_id` (`instrumentation_id`),
  KEY `instrumentation_id_2` (`instrumentation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `instrumentation`
--

INSERT INTO `instrumentation` (`instrumentation_id`, `instrument`, `quantity`, `note`) VALUES
(1, 'Soprano Saxophone', 1, 'none'),
(2, 'Alto Saxophone', 1, 'none'),
(3, 'Tenor Saxophone', 1, 'none'),
(4, 'Baritone Saxophone', 1, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `instrument_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `instrument` varchar(255) NOT NULL,
  PRIMARY KEY (`instrument_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrument_id`, `instrument`) VALUES
(1, 'Soprano Saxophone'),
(2, 'Alto Saxophone'),
(3, 'Tenor Saxophone'),
(4, 'Baritone Saxophone'),
(5, 'Bb Clarinet'),
(6, 'Bb Trumpet'),
(7, 'Tuba'),
(8, 'French Horn'),
(9, 'Tenor Trombone'),
(10, 'Bass Trombone'),
(11, 'Harp'),
(12, 'Euphonium'),
(13, 'Flute'),
(14, 'Piccolo'),
(15, 'Bassoon'),
(16, 'Bass Clarinet'),
(17, 'Contrabass Clarinet'),
(18, 'Marimba'),
(19, 'Snare Drum'),
(20, 'Bass Drum'),
(21, 'Timpani');

-- --------------------------------------------------------

--
-- Table structure for table `sheetmusic`
--

CREATE TABLE IF NOT EXISTS `sheetmusic` (
  `sheetmusic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `composer` varchar(255) NOT NULL,
  `arranger` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `comment` text NOT NULL,
  `uil_pml_number` varchar(255) NOT NULL,
  `nmr` tinyint(1) NOT NULL,
  `wiki_link` text NOT NULL,
  `imslp_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `instrumentation` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sheetmusic_id`),
  UNIQUE KEY `sheetmusic_id` (`sheetmusic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sheetmusic`
--

INSERT INTO `sheetmusic` (`sheetmusic_id`, `title`, `composer`, `arranger`, `genre`, `grade`, `comment`, `uil_pml_number`, `nmr`, `wiki_link`, `imslp_link`, `youtube_link`, `instrumentation`, `user_id`, `timestamp`) VALUES
(1, 'Andante et Scherzo', 'Eugene Bozza', 'NO_ARRANGER', 'Classical', 1, 'NO_COMMENT', '246-1-11973', 0, 'NO_WIKI_LINK', 'NO_IMSLP_LINK', 'https://www.youtube.com/watch?v=9hniqvfbgkA', '1 2 3 4 ', 1, '2019-04-09 02:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'govindjoshi', 'dragonband2019'),
(3, 'brittanygraham', 'frenchhorn'),
(4, 'briannadp', 'iluvwesley'),
(5, 'vmjaustin', 'abc123');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
