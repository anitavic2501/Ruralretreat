-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2019 at 11:02 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `startdate`, `enddate`, `user_id`, `dog_id`, `price`, `status`, `provider_id`) VALUES
(155, '2019-07-21', '2019-07-24', 6, 11, NULL, 'approve', NULL),
(156, '2019-07-14', '2019-07-16', 6, 11, NULL, 'approve', NULL),
(157, '2019-07-22', '2019-07-25', 6, 11, NULL, 'approve', NULL),
(158, '2019-08-12', '2019-08-15', 6, 11, NULL, 'approve', NULL),
(159, '2019-07-08', '2019-07-11', 8, 12, NULL, 'approve', 2),
(160, '2019-07-08', '2019-07-10', 6, 11, NULL, 'pending', NULL),
(161, '2019-09-10', '2019-09-12', 6, 11, NULL, 'approve', NULL),
(162, '2019-08-18', '2019-08-21', 6, 11, NULL, 'approve', NULL),
(163, '2019-08-18', '2019-08-21', 6, 11, NULL, 'reject', NULL),
(164, '2019-07-24', '2019-07-26', 6, 13, NULL, 'approve', NULL),
(165, '2019-07-29', '2019-07-31', 6, 11, NULL, 'pending', NULL),
(166, '2019-07-25', '2019-07-26', 6, 11, NULL, 'pending', NULL),
(167, '2019-08-28', '2019-08-30', 6, 13, NULL, 'pending', NULL),
(168, '2019-07-24', '2019-07-26', 6, 11, NULL, 'pending', NULL),
(169, '2019-08-20', '2019-08-22', 6, 11, NULL, 'pending', NULL),
(170, '2019-11-25', '2019-11-27', 6, 11, NULL, 'pending', NULL),
(171, '2019-08-27', '2019-08-29', 6, 11, NULL, 'pending', NULL),
(172, '2019-08-21', '2019-08-22', 6, 11, NULL, 'pending', NULL),
(173, '2019-09-10', '2019-09-12', 6, 11, NULL, 'pending', NULL),
(174, '2019-10-16', '2019-10-18', 6, 13, NULL, 'pending', NULL),
(175, '2019-11-21', '2019-11-22', 6, 11, NULL, 'pending', NULL),
(176, '2019-09-03', '2019-09-06', 6, 11, NULL, 'pending', NULL),
(177, '2019-07-05', '2019-07-11', 6, 13, NULL, 'pending', NULL),
(178, '2019-08-29', '2019-08-31', 6, 13, NULL, 'pending', NULL),
(179, '2019-07-17', '2019-07-19', 6, 13, NULL, 'pending', NULL),
(180, '2019-07-17', '2019-07-19', 6, 11, NULL, 'pending', NULL),
(181, '2019-07-17', '2019-07-19', 6, 11, NULL, 'pending', NULL),
(182, '2019-07-23', '2019-07-25', 6, 11, NULL, 'pending', NULL),
(183, '2019-07-05', '2019-07-07', 6, 11, NULL, 'pending', NULL),
(184, '2019-08-14', '2019-08-16', 6, 11, NULL, 'pending', NULL),
(185, '2019-07-16', '2019-07-18', 6, 11, NULL, 'approve', NULL),
(186, '2019-07-23', '2019-07-25', 6, 11, NULL, 'pending', NULL),
(187, '2019-08-15', '2019-08-16', 6, 13, NULL, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `message_id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`message_id`, `email`, `name`, `message`) VALUES
(1, 'dfDSFsfdSD', 'DsfsdfDFSDFHFDSFE', 'dfgdnefvdsgrhhtvrqecqxf'),
(4, 'ADFJVNAF', 'KJFNVAD', 'tiubahviunfdapviudfnpijadvfda\r\ndpifvhbdapfivjdfnlijdsfbvoiafldvjbdfva\r\nfdpaihbvpdfivjafnpvaijfvnavdavdfvafdvfadvafdbhjdaf\r\nadfvhibadfvlidfnjadfvvdf'),
(7, 'admin@gmail.com', 'sdgufdbv;ajbv', ';afdjvn;pdfkjunadjubapdjudfpvjb\r\nadfkvjabdvkijabdvki\r\ndvijdfnv;iadkjb;pjudfvdfvdvsdvsv');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dog_id`, `dogname`, `user_id`, `breed`, `age`, `gender`, `vaccination`, `datareceived`, `duedate`, `medicalcondition`, `allergies`, `movrestr`, `label`) VALUES
(1, 'Kyle', 1, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'yellow'),
(2, 'Jake', 1, 'Bulldog', 3, 'Female Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'yellow'),
(7, 'Kiki', 2, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'blue'),
(11, 'Tim', 6, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'green'),
(12, 'Alo', 8, 'Golden', 2, 'Male Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'green'),
(13, 'Kyle', 6, 'Chihuahua', 3, 'Female Whole', NULL, NULL, NULL, NULL, NULL, NULL, 'green');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services`, `service_id`, `price`, `description`, `image`, `service_type`) VALUES
('Grooming Type 1', 1, 15, '5 surcharge applies for day care and over night care during peak periods, including all long weekends, Easter weekend and the two week break over Christmas and New Years <br> 2 dog = 20 off the price of a concession card,  <br>3 dogs at day care= 30 off the price of a concession card,  <br> 4 dogs at day care= 40 off the price of a concess', 'doggrooming.jpg', 'addon'),
('Grooming Type 2', 2, 17, 'oidhfaposidfhjdsfdsfsdfs', 'commondog_grooming.jpg', 'addon'),
('Spa Type 1', 3, 35, 'fdsaf', 'Dog-in-Towel.png', 'addon'),
('Spa Type 2', 4, 37, 'dfsdafsfaf', 'grooming-2000.jpg', 'addon'),
('Overnight', 5, 55, NULL, NULL, 'main'),
('ewrwt', 10, 58, 'egvsfdacxeafcfasdf\r\nsdfasef a\r\nsdv', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

DROP TABLE IF EXISTS `service_booking`;
CREATE TABLE IF NOT EXISTS `service_booking` (
  `service_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`service_id`, `booking_id`, `quantity`) VALUES
(1, 0, 1),
(1, 0, 1),
(1, 110, 1),
(1, 111, 1),
(4, 112, 1),
(5, 116, 1),
(5, 117, 1),
(1, 117, 1),
(2, 117, 1),
(5, 118, 1),
(1, 118, 1),
(2, 118, 1),
(5, 119, 1),
(1, 119, 1),
(2, 119, 1),
(5, 120, 1),
(2, 120, 1),
(3, 120, 1),
(5, 121, 1),
(1, 121, 1),
(3, 121, 1),
(5, 122, 1),
(2, 122, 1),
(3, 122, 1),
(5, 123, 1),
(2, 123, 1),
(3, 123, 1),
(5, 124, 1),
(2, 124, 1),
(3, 124, 1),
(5, 125, 1),
(1, 125, 1),
(4, 125, 1),
(5, 126, 1),
(1, 126, 1),
(3, 126, 1),
(5, 127, 1),
(2, 127, 1),
(4, 127, 1),
(5, 128, 1),
(5, 129, 1),
(5, 130, 1),
(3, 130, 1),
(5, 131, 1),
(1, 131, 1),
(3, 131, 1),
(5, 132, 1),
(1, 132, 1),
(3, 132, 1),
(5, 133, 1),
(1, 133, 1),
(2, 133, 1),
(3, 133, 1),
(4, 133, 1),
(5, 134, 1),
(1, 134, 1),
(3, 134, 1),
(5, 135, 1),
(1, 135, 1),
(4, 135, 1),
(5, 136, 1),
(1, 136, 1),
(3, 136, 1),
(5, 137, 1),
(1, 137, 1),
(3, 137, 1),
(5, 138, 1),
(1, 138, 1),
(2, 138, 1),
(3, 138, 1),
(4, 138, 1),
(5, 139, 1),
(1, 139, 1),
(3, 139, 1),
(5, 140, 1),
(1, 140, 1),
(3, 140, 1),
(5, 141, 1),
(1, 141, 1),
(3, 141, 1),
(5, 142, 1),
(2, 142, 1),
(4, 142, 1),
(5, 143, 1),
(2, 143, 1),
(4, 143, 1),
(5, 144, 1),
(1, 144, 1),
(4, 144, 1),
(5, 145, 1),
(1, 145, 1),
(3, 145, 1),
(5, 146, 1),
(1, 146, 1),
(3, 146, 1),
(5, 147, 1),
(1, 147, 1),
(4, 147, 1),
(5, 148, 1),
(1, 148, 1),
(3, 148, 1),
(5, 149, 1),
(1, 149, 1),
(3, 149, 1),
(5, 150, 1),
(1, 150, 1),
(3, 150, 1),
(5, 151, 1),
(1, 151, 1),
(3, 151, 1),
(5, 152, 1),
(1, 152, 1),
(4, 152, 1),
(5, 153, 1),
(1, 153, 1),
(3, 153, 1),
(5, 154, 1),
(2, 154, 1),
(5, 155, 2),
(1, 155, 1),
(3, 155, 1),
(5, 156, 1),
(1, 156, 1),
(3, 156, 1),
(5, 157, 1),
(1, 157, 1),
(3, 157, 1),
(5, 158, 1),
(1, 158, 1),
(3, 158, 1),
(5, 159, 1),
(1, 159, 1),
(4, 159, 1),
(5, 160, 1),
(5, 161, 1),
(6, 161, 1),
(5, 162, 1),
(5, 163, 1),
(5, 164, 1),
(2, 164, 1),
(5, 165, 1),
(2, 165, 1),
(4, 165, 1),
(5, 166, 1),
(5, 167, 1),
(5, 168, 1),
(1, 168, 1),
(3, 168, 1),
(5, 169, 1),
(1, 169, 1),
(3, 169, 1),
(5, 170, 1),
(5, 171, 1),
(1, 171, 1),
(3, 171, 1),
(5, 172, 1),
(1, 172, 1),
(3, 172, 1),
(5, 173, 1),
(5, 174, 1),
(5, 175, 1),
(5, 176, 1),
(1, 176, 1),
(2, 176, 1),
(3, 176, 1),
(4, 176, 1),
(5, 177, 1),
(1, 177, 1),
(2, 177, 1),
(3, 177, 1),
(4, 177, 1),
(5, 178, 1),
(1, 178, 1),
(3, 178, 1),
(5, 181, 2),
(5, 182, 2),
(5, 183, 2),
(1, 183, 1),
(5, 184, 2),
(1, 184, 1),
(3, 184, 1),
(5, 185, 2),
(1, 185, 1),
(3, 185, 1),
(5, 186, 2),
(1, 186, 1),
(5, 187, 1),
(1, 187, 1),
(2, 187, 1);

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
(2, '2019-07-05', 0, 2, 0),
(2, '2019-07-08', 0, 2, 0),
(1, '2019-07-14', 0, 1, 0),
(1, '2019-07-16', 0, 1, 0),
(3, '2019-07-17', 0, 3, 0),
(1, '2019-07-21', 0, 1, 0),
(1, '2019-07-22', 0, 1, 0),
(2, '2019-07-23', 0, 2, 0),
(2, '2019-07-24', 0, 2, 0),
(1, '2019-07-25', 0, 1, 0),
(1, '2019-07-29', 0, 1, 0),
(1, '2019-08-12', 0, 1, 0),
(1, '2019-08-14', 0, 1, 0),
(1, '2019-08-15', 0, 1, 0),
(2, '2019-08-18', 0, 2, 0),
(1, '2019-08-20', 0, 1, 0),
(1, '2019-08-21', 0, 1, 0),
(1, '2019-08-27', 0, 1, 0),
(1, '2019-08-28', 0, 1, 0),
(1, '2019-08-29', 0, 1, 0),
(1, '2019-09-03', 0, 1, 0),
(2, '2019-09-10', 0, 2, 0),
(1, '2019-10-16', 0, 1, 0),
(1, '2019-11-21', 0, 1, 0),
(1, '2019-11-25', 0, 1, 0);

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
