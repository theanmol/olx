-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2016 at 05:40 AM
-- Server version: 5.1.48
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `retail`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_title` varchar(60) NOT NULL,
  `image` longblob,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `time_used` varchar(20) NOT NULL,
  `status` enum('available','sold','hold') NOT NULL DEFAULT 'available',
  `s_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `flag` enum('approved','not_approved','waiting') NOT NULL DEFAULT 'waiting',
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `newad_ibfk_2` (`s_id`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`ad_id`, `ad_title`, `image`, `description`, `price`, `time_used`, `status`, `s_id`, `post_date`, `flag`, `catid`) VALUES
(1, 'kurose book', NULL, 'networking book', 500, '4', 'available', 1, '2016-04-26', 'approved', 1),
(2, 'hero cycle', NULL, 'new hero cycle', 1500, '11', 'available', 2, '2016-04-06', 'approved', 3),
(3, 'operation system book', NULL, 'new never used book', 500, '5', 'available', 2, '2016-04-13', 'waiting', 1),
(4, 'kenstar fan', NULL, 'new kenstar fan', 900, '6', 'available', 2, '2016-04-19', 'approved', 2),
(5, 'samsung mobile', NULL, 'samsung duos', 4900, '19', 'available', 2, '2016-04-13', 'approved', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'Anmol Garg', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ad_id` int(11) NOT NULL,
  `author` varchar(40) NOT NULL,
  `title` varchar(40) NOT NULL,
  `publisher` varchar(30) DEFAULT NULL,
  `branch` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ad_id`, `author`, `title`, `publisher`, `branch`) VALUES
(1, 'Kurose and Ross', 'Computer Networks', 'pearson', 'I.T.'),
(3, 'William Stallings', 'Operating Systems', 'mcgrawhill', 'I.T.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `ad_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`ad_id`,`c_id`),
  KEY `cart_item_ibfk_1` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`catid`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `cat_name`) VALUES
(3, 'automobile'),
(1, 'books'),
(2, 'electronics'),
(4, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `brand` varchar(40) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `subid` (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`brand`, `ad_id`, `subid`) VALUES
('hero', 2, 4),
('kenstar', 4, 6),
('samsung', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(40) NOT NULL,
  `bu_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `del_date` date NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_ibfk_2` (`ad_id`),
  KEY `order_ibfk_1` (`bu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  PRIMARY KEY (`subid`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`subid`, `catid`, `sub_name`) VALUES
(1, 2, 'mobile phones'),
(2, 2, 'iron'),
(4, 3, 'cycles'),
(5, 3, 'bike'),
(6, 2, 'fan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `hostel` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `f_name`, `l_name`, `password`, `email`, `room_no`, `hostel`, `contact`) VALUES
(1, 'Deexita', 'Goel', 'd', 'deexitamzn@gmail.com', '100', 'kngh', '9473854449'),
(2, 'Avneesh', 'Tiwari', 'a', 'avneeshavailable@gmail.com', '233', 'tondon', '8795645688'),
(3, 'Anubhav', 'Gupta', 'a', 'anubhavgupt1995@gmial.com', '232', 'tondonn', '9786543211'),
(4, 'Ayushi', 'Bajpai', 'a', 'ayushibjp@gmail.com', '101', 'kngh', '123567890'),
(5, 'anmol', 'garg', 'g', 'garganmol95@gmail.com', 'f-39', 'KNGH', '9876543210'),
(6, 'abc', 'def', 'abc', 'abc@gmail.com', 'f4', 'kngh', '1478520369'),
(7, 'vishakha', 'prasad', 'vis', 'vishakha@gmail.com', 'f-52', 'KNGH', '9638527410'),
(8, 'kdk', 'jdh', '45', 'guptaneha0303@gmail.com', 'g-4', 'hb', '9518476230');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ad_ibfk_3` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`ad_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general`
--
ALTER TABLE `general`
  ADD CONSTRAINT `general_ibfk_4` FOREIGN KEY (`subid`) REFERENCES `subcat` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `general_ibfk_5` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`bu_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcat`
--
ALTER TABLE `subcat`
  ADD CONSTRAINT `subcat_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;
