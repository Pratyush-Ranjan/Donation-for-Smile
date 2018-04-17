-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2018 at 08:21 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_verify`
--

DROP TABLE IF EXISTS `doc_verify`;
CREATE TABLE IF NOT EXISTS `doc_verify` (
  `name` varchar(255) NOT NULL,
  `adhaar_no` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `document` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_verify`
--

INSERT INTO `doc_verify` (`name`, `adhaar_no`, `license`, `document`) VALUES
('Pratyush Ranjan', '2345-6789-8765', 'WL374672XM78', 'Acoustics Participants.docx');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `category` enum('Primary','Middle','Secondary') NOT NULL,
  `quantity` int(11) NOT NULL,
  `images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `class`, `category`, `quantity`, `images`) VALUES
(1, 'Sumita Arora C++', 11, 'Secondary', 5, 'sumita.jpg'),
(2, 'Pradeep Physics', 11, 'Secondary', 2, 'pradeepphy11.jpeg'),
(3, 'Ncert Chemistry', 11, 'Secondary', 2, 'chemistry_ncert_11.jpg'),
(4, 'S.L. Arora', 12, 'Secondary', 12, 'slarora12.jpeg'),
(5, 'Political science', 9, 'Secondary', 2, 'polisci9.jpg'),
(6, 'Moral Science', 4, 'Primary', 8, 'moral4.jpg'),
(7, 'Geography', 8, 'Middle', 9, 'geo8.jpeg'),
(8, 'R.D. Sharma', 12, 'Secondary', 7, 'rd12.jpeg'),
(9, 'R.S. Agarwal', 10, 'Secondary', 5, 'rs10.jpg'),
(10, 'Ncert Economics', 10, 'Secondary', 9, 'eco12.jpg'),
(11, 'Algebra Mathematics', 7, 'Middle', 5, 'math7.png'),
(13, 'Ncert Physics', 12, 'Secondary', 2, 'ncphy12.jpg'),
(14, 'English (Prachi publ.)', 7, 'Middle', 6, 'praeng7.png'),
(15, 'Rimjhim (hindi book)', 2, 'Primary', 2, 'hinrim2.jpg'),
(16, 'NCERT BIOLOGY', 12, 'Secondary', 3, ''),
(17, 'English Reader(Rajasthan)', 6, 'Middle', 4, '6englishreaderrjb.jpg'),
(18, 'History & Civics (cbse)', 6, 'Middle', 3, '6history&civicscbse.jpg'),
(19, 'Maths (Maharashtra)', 6, 'Middle', 7, '6mathsMP.jpg'),
(20, 'Maths (Rajasthan)', 6, 'Middle', 4, '6mathsrjb.jpg\r\n'),
(21, 'Sanskrit (cbse)', 6, 'Middle', 6, '6sanskritcnse.jpg'),
(22, 'Science(MP Board)', 6, 'Middle', 8, '6scienceMP.jpg'),
(23, 'Durva (MP board)', 7, 'Middle', 6, '7durvaMP.jpg'),
(24, 'English (MP board)', 7, 'Middle', 8, '7englishMP.jpg'),
(25, 'English (UP board)', 7, 'Middle', 11, '7englishUP.jpg'),
(26, 'Maths (MP board)', 7, 'Middle', 12, '7mathsMP.jpg'),
(27, 'Science (Rajasthan)', 7, 'Middle', 11, '7sciencerjb.jpg'),
(28, 'Bharat Khoj(UP)', 8, 'Middle', 3, '8bharatkhojUP.jpg'),
(29, 'Biology (icse)', 8, 'Middle', 3, '8biologyicse.jpg'),
(30, 'Chemistry (icse)', 8, 'Middle', 4, '8chemistryicse.jpg'),
(31, 'English(Maharashtra)', 8, 'Middle', 5, '8englishmaharashtra.jpg'),
(32, 'Geography (icse)', 8, 'Middle', 6, '8geographyicse.jpg'),
(33, 'Maths (icse)', 8, 'Middle', 6, '8mathsicse.jpg'),
(34, 'Maths in hindi (cbse)', 8, 'Middle', 7, '8mathsinhindicbse.jpg'),
(35, 'Science (cbse)', 8, 'Middle', 7, '8sciencecbse.jpg'),
(36, 'Science(Maharashtra)', 8, 'Middle', 5, '8sciencemaharashtra.jpg'),
(37, 'Social Science (cbse)', 8, 'Middle', 6, '8socialsciencecbse.jpg'),
(38, 'Science (UP Board)', 8, 'Middle', 5, '8sscience.jpg'),
(39, 'Economics (icse)', 9, 'Secondary', 4, '9economicsicse.jpg'),
(40, 'Hindi (Maharashtra)', 9, 'Secondary', 5, '9hindimaharashtra.jpg'),
(41, 'Mathematics (icse)', 9, 'Secondary', 11, '9mathematicsicse.jpg'),
(42, 'Maths (Jharkhand)', 9, 'Secondary', 5, '9mathsjharkhand.jpg'),
(43, 'Maths (Maharashtra)', 9, 'Secondary', 3, '9mathsmaharashtra.jpg'),
(44, 'Physics (icse)', 9, 'Secondary', 6, '9physicsicse.jpg'),
(45, 'Biology (icse)', 10, 'Secondary', 6, '10biologyicse.jpg'),
(46, 'Computer (icse)', 10, 'Secondary', 3, '10computerapplicationicse.jpg'),
(47, 'EVS (icse)', 10, 'Secondary', 6, '10evsicse.jpg'),
(48, 'Grah Vigyan (UP)', 10, 'Secondary', 6, '10grahvigyanup.jpg'),
(49, 'Hindi (UP board)', 10, 'Secondary', 14, '10hindiup.jpg'),
(50, 'History (icse)', 10, 'Secondary', 13, '10historyicse.jpg'),
(51, 'Vigyan (UP Board)', 10, 'Secondary', 13, '10vigyan.up.jpg'),
(52, 'Biology(Maharashtra)', 11, 'Secondary', 12, '11biologymaharashtra.jpg'),
(53, 'General English(UP)', 11, 'Secondary', 4, '11generalenglishup.jpg'),
(54, 'History (tamil)', 11, 'Secondary', 6, '11historytamil.png'),
(55, 'Jeev Vigyan (UP)', 11, 'Secondary', 4, '11jeevvigyanup.jpg'),
(56, 'Maths (Tamil board)', 11, 'Secondary', 6, '11mathstamil.jpg'),
(57, 'Rasayan Vvigyan(UP)', 11, 'Secondary', 6, '11rasayanvigyanup.jpg'),
(58, 'Chemistry (Tamil)', 12, 'Secondary', 6, '12chemistrytamil.jpg'),
(59, 'English (Tamil)', 12, 'Secondary', 7, '12englishtamil.jpg'),
(60, 'Mathematics (UP)', 12, 'Secondary', 7, '12mathematicsup.jpg'),
(61, 'Maths (Jharkhand)', 12, 'Secondary', 3, '12mathsjharkhand.jpg'),
(62, 'NTSE English', 10, 'Secondary', 2, 'ntsetextbook.jpg'),
(63, 'Marigold (cbse)', 1, 'Primary', 1, '1marigoldcbse.jpg'),
(64, 'Maths (Rajasthan)', 1, 'Primary', 10, '1mathsrjb.jpg'),
(65, 'Rimjhim (cbse)', 1, 'Primary', 3, '1rimjhimcbse.jpg'),
(66, 'Grammar (cbse)', 2, 'Primary', 2, '2grammarcbse.jpg'),
(67, 'Maths Magic (cbse)', 2, 'Primary', 3, '2mathmagiccbse.jpg'),
(68, 'Comprehension(cbse)', 3, 'Primary', 4, '3comprehensioncbse.jpg'),
(69, 'English (Rajasthan)', 3, 'Primary', 2, '3engrjb.jpg'),
(70, 'Social Study (cbse)', 3, 'Primary', 2, '3socialstudycbse.jpg'),
(71, 'Terabytes (cbse)', 3, 'Primary', 2, '3terabytescbse.jpg'),
(72, 'EVS (Rajasthan)', 5, 'Primary', 3, '5evsrjb.jpg'),
(73, 'Hindi (Rajasthan)', 5, 'Primary', 4, '5hindirjb.jpg'),
(75, 'History & Civics', 3, 'Primary', 4, 'history&civics3.jpg'),
(76, 'Computers (icse)', 2, 'Primary', 6, 'icse_enjoying_computers_class_-_2-9789381158531-central_books_online.jpg'),
(77, 'Foundation Maths(icse)', 3, 'Primary', 5, 'icsefoundationmathematics.jpg'),
(78, 'Mathematics (icse)', 2, 'Primary', 4, 'icsemathematics.jpg'),
(79, 'Oxford English (icse)', 3, 'Primary', 2, 'icseoxfordeng3.jpg'),
(80, 'Modern English (icse)', 2, 'Primary', 5, 'modernenglishicse.jpg'),
(81, 'Together With Mahak (icse)', 2, 'Primary', 5, 'Togetherwithicsemahak.jpg'),
(82, 'Bhasha Gaurav (UP)', 3, 'Primary', 1, 'UPbhasha-gaurav-3.jpg'),
(83, 'Decent English Reader (UP)', 3, 'Primary', 4, 'UPDecent-English-Reader-3.jpg'),
(84, 'Rhimjhim Abhayas Pustika (UP)', 3, 'Primary', 4, 'UPRhimjhim-Abhayas-Pustika-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_class` int(11) NOT NULL,
  `product_category` enum('Primary','Middle','Secondary') NOT NULL,
  `product_images` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(1, 'Pratyush', 'pratyushranjan14@yahoo.in', 'd8f4ad11e2f27ab43ad495328f6b4676', '9297319198', 'Allahabad', '1626/A1/908 kalyani devi, dariyabad');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

DROP TABLE IF EXISTS `users_items`;
CREATE TABLE IF NOT EXISTS `users_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT '1',
  `status` enum('Added to cart','Confirmed') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `book_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_class` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  PRIMARY KEY (`book_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`book_user_id`, `user_name`, `book_name`, `book_class`, `book_quantity`) VALUES
(1, 'Pratyush', 'Algebra Mathematics', 7, 2),
(2, 'Pratyush', 'Moral Science', 4, 1),
(3, 'Pratyush', 'Geography', 8, 1),
(6, 'Pratyush', 'English (Prachi publication)', 7, 2),
(7, 'Pratyush', 'English (Prachi publication)', 7, 1),
(8, 'Pratyush', 'English (Prachi publication)', 7, 1),
(9, 'Pratyush', 'English (Prachi publication)', 7, 1),
(10, 'Pratyush', 'English (Prachi publication)', 7, 1),
(11, 'Pratyush', 'Rimjhim (hindi book)', 2, 1),
(12, 'Pratyush', 'Rimjhim', 2, 1),
(13, 'Pratyush', 'Rimjhim (hindi book)', 2, 1),
(14, 'Pratyush', 'Rimjhim (hindi book)', 2, 1),
(15, 'Pratyush', 'Sumita Arora C++', 11, 1),
(16, 'Abhishek Verma', 'NCERT BIOLOGY', 12, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
