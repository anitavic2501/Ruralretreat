-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2019 at 11:34 PM
-- Server version: 8.0.15
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruralretreat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `dog_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `provider_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `user_id` (`user_id`),
  KEY `dog_id` (`dog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `startdate`, `enddate`, `user_id`, `dog_id`, `price`, `status`, `provider_id`) VALUES
(155, '2019-07-21', '2019-07-24', 6, 11, NULL, 'approve', NULL),
(156, '2019-07-14', '2019-07-16', 6, 11, NULL, 'approve', NULL),
(157, '2019-07-22', '2019-07-25', 6, 11, NULL, 'approve', NULL),
(158, '2019-08-12', '2019-08-15', 6, 11, NULL, 'approve', NULL),
(159, '2019-07-08', '2019-07-11', 8, 12, NULL, 'pending', 2),
(160, '2019-07-08', '2019-07-10', 6, 11, NULL, 'pending', NULL),
(161, '2019-09-10', '2019-09-12', 6, 11, NULL, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

DROP TABLE IF EXISTS `dogs`;
CREATE TABLE IF NOT EXISTS `dogs` (
  `dog_id` int(11) NOT NULL AUTO_INCREMENT,
  `dogname` varchar(40) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `breed` varchar(40) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(80) DEFAULT NULL,
  `vaccination` varchar(1000) DEFAULT NULL,
  `datareceived` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `medicalcondition` varchar(1000) DEFAULT NULL,
  `allergies` varchar(1000) DEFAULT NULL,
  `movrestr` varchar(1000) DEFAULT NULL,
  `label` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'green',
  PRIMARY KEY (`dog_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dog_id`, `dogname`, `user_id`, `breed`, `age`, `gender`, `vaccination`, `datareceived`, `duedate`, `medicalcondition`, `allergies`, `movrestr`, `label`) VALUES
(1, 'Kyle', 1, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'green'),
(2, 'Jake', 1, 'Bulldog', 3, 'Female Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'yellow'),
(7, 'Kiki', 2, 'Golden', 2, 'Female Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'Green'),
(11, 'Tim', 6, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'green'),
(12, 'Alo', 8, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `picture` blob NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'published',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `descriprion` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `services` varchar(40) NOT NULL,
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `description` text,
  `image` char(150) DEFAULT NULL,
  `service_type` varchar(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services`, `service_id`, `price`, `description`, `image`, `service_type`) VALUES
('Grooming Type 1', 1, 15, NULL, NULL, 'addon'),
('Grooming Type 2', 2, 17, NULL, NULL, 'addon'),
('Spa Type 1', 3, 35, NULL, NULL, 'addon'),
('Spa Type 2', 4, 37, NULL, NULL, 'addon'),
('Overnight', 5, 55, NULL, NULL, 'main'),
('No additional service', 6, 0, NULL, NULL, 'addon');

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

DROP TABLE IF EXISTS `service_booking`;
CREATE TABLE IF NOT EXISTS `service_booking` (
  `service_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`service_id`, `booking_id`) VALUES
(1, 0),
(1, 0),
(1, 110),
(1, 111),
(4, 112),
(5, 116),
(5, 117),
(1, 117),
(2, 117),
(5, 118),
(1, 118),
(2, 118),
(5, 119),
(1, 119),
(2, 119),
(5, 120),
(2, 120),
(3, 120),
(5, 121),
(1, 121),
(3, 121),
(5, 122),
(2, 122),
(3, 122),
(5, 123),
(2, 123),
(3, 123),
(5, 124),
(2, 124),
(3, 124),
(5, 125),
(1, 125),
(4, 125),
(5, 126),
(1, 126),
(3, 126),
(5, 127),
(2, 127),
(4, 127),
(5, 128),
(5, 129),
(5, 130),
(3, 130),
(5, 131),
(1, 131),
(3, 131),
(5, 132),
(1, 132),
(3, 132),
(5, 133),
(1, 133),
(2, 133),
(3, 133),
(4, 133),
(5, 134),
(1, 134),
(3, 134),
(5, 135),
(1, 135),
(4, 135),
(5, 136),
(1, 136),
(3, 136),
(5, 137),
(1, 137),
(3, 137),
(5, 138),
(1, 138),
(2, 138),
(3, 138),
(4, 138),
(5, 139),
(1, 139),
(3, 139),
(5, 140),
(1, 140),
(3, 140),
(5, 141),
(1, 141),
(3, 141),
(5, 142),
(2, 142),
(4, 142),
(5, 143),
(2, 143),
(4, 143),
(5, 144),
(1, 144),
(4, 144),
(5, 145),
(1, 145),
(3, 145),
(5, 146),
(1, 146),
(3, 146),
(5, 147),
(1, 147),
(4, 147),
(5, 148),
(1, 148),
(3, 148),
(5, 149),
(1, 149),
(3, 149),
(5, 150),
(1, 150),
(3, 150),
(5, 151),
(1, 151),
(3, 151),
(5, 152),
(1, 152),
(4, 152),
(5, 153),
(1, 153),
(3, 153),
(5, 154),
(2, 154),
(5, 155),
(1, 155),
(3, 155),
(5, 156),
(1, 156),
(3, 156),
(5, 157),
(1, 157),
(3, 157),
(5, 158),
(1, 158),
(3, 158),
(5, 159),
(1, 159),
(4, 159),
(5, 160),
(5, 161),
(6, 161);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
CREATE TABLE IF NOT EXISTS `slots` (
  `totalbookings` int(11) NOT NULL,
  `date` date NOT NULL,
  `yellow` int(11) NOT NULL,
  `green` int(11) NOT NULL,
  `blue` int(11) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`totalbookings`, `date`, `yellow`, `green`, `blue`) VALUES
(2, '2019-07-08', 0, 2, 0),
(1, '2019-07-14', 0, 1, 0),
(1, '2019-07-21', 0, 1, 0),
(1, '2019-07-22', 0, 1, 0),
(1, '2019-08-12', 0, 1, 0),
(1, '2019-09-10', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `userfname` varchar(40) NOT NULL,
  `userlname` varchar(40) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `emrgcontactname_1` varchar(40) NOT NULL,
  `emrgcontactnumber_1` varchar(40) NOT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT '3',
  `provider_id` int(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userfname`, `userlname`, `username`, `email`, `password`, `contact_number`, `emrgcontactname_1`, `emrgcontactnumber_1`, `user_type_id`, `provider_id`) VALUES
(1, 'Roman', 'Fatin', 'fatinrmn', 'fatirmn@googl.ecom', '$2y$10$m/Dwwf5CPjx7GNHXBGPEO.kiv1pVaYtP4bIggN9iMdZ2cVlCEIsDK', '7739284799', '7392874791', '2193871', 3, 0),
(2, 'Koil', 'Jocinasd', 'Jojo', 'joj@gmail.com', '$2y$10$AbUJI3eJvNkf8hKp7yVIF.VEXbzmXp8LeG729YXV319DLT.g5m9QS', '355555', 'Koko', '123347234', 2, 0),
(3, 'Admin 1', 'Admin 1', 'admin', 'admin@gmail.com', '$2y$10$KucRP4sfFx93W4jcb9tzMu0nPhEfZcXJajQN/CC5TjpXsxiBJi7.2', '1321314123', '', '', 1, 0),
(4, 'Test', 'Testovi4', 'test1', 'test@gmail.com', '$2y$10$MYIR/0LWVMPceSJA6wujwewbAxPdVGGDHp4CehqiF78dDVZzhaQEW', '6827641', '', '', 3, 0),
(6, 'Fatin', 'Roman', 'Romantest', 'fatinroman@yandex.ru', '$2y$10$gRHdqq.1W3UoRc3yNg0/puSiyWmTpMAA39C210tZeVwa1DlQxQjnK', '4759832749', 'Rita', '8723948234', 3, 0),
(8, 'Provider', 'Provider', 'provider', 'provider@gmail.xom', '$2y$10$3eFMM1l0ha0q/YTErQQuL.IicGywDdmmoa7RdradcEPu3v105LqXC', '1234', '', '', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'Provider'),
(3, 'User');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`dog_id`) REFERENCES `dogs` (`dog_id`);

--
-- Constraints for table `dogs`
--
ALTER TABLE `dogs`
  ADD CONSTRAINT `dogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type_ffk1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
