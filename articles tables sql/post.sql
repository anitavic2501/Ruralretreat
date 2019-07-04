-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 05:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_industry`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'published'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_content`, `date`, `status`) VALUES
(1, 'This is sample Article no.1 of this website. ', 'This is sample Article no.2 of this website. ', '2019-05-23', 'published'),
(2, 'Dogs Are Even More Like Us Than We Thought', 'IT\'S LIKELY NO surprise to dog owners, but growing research suggests that man\'s best friend often acts more human than canine.   \r\n\r\nDogs can read facial expressions, communicate jealousy, display empathy, and even watch TV, studies have shown. They\'ve picked up these people-like traits during their evolution from wolves to domesticated pets, which occurred between 11,000 and 16,000 years ago, experts say.\r\n\r\nIn particular, \"paying attention to us, getting along with us, [and] tolerating us\" has led to particular characteristics that often mirror ours, says Laurie Santos, director of the Yale Comparative Cognition Laboratory.', '2019-05-24', 'published'),
(3, 'Article 3', 'ksadj;klfnasdfn;ONSOINALKSNCJLN;ljsndkj kjACOI;iqsdnlknQSDNLKnw', '0000-00-00', 'published'),
(4, 'ARticle 3', 'asf;kjwndfnWEIJFINDJLKNC;KLacm\'APSJDIPJqwdD', '2019-04-09', 'published'),
(5, 'Dogs of Atlantic', 'The dogs of ATlantic are great huge dogs that weights about 5 tons anddevour a whale shark in minutes', '0000-00-00', 'published'),
(6, 'Dogger Mania', 'Relaunching of Rural Retrerat', '0000-00-00', 'published'),
(7, 'Dogger Mania', 'Relaunching of Rural Retrerat', '0000-00-00', 'published'),
(9, 'Dogs of Atlantic', 'Relaunching of \'Rural Retrerat', '0000-00-00', 'published'),
(10, 'Dogger Mania', 'Relaunching of Rural Retrerat', '0000-00-00', 'published'),
(11, 'BarkaholIC', 'The dogs of ATlantic are great huge dogs that weights about 5 tons anddevour a whale shark in minutes', '0000-00-00', 'published'),
(12, 'Yellow Dogs', 'If you see a dog with a YELLOW ribbon, bandana or similar on the leash or on the dog, this is a dog which needs some space.   Please, do not approach this dog or its people with your dog. They are indicating that their dog cannot be close to other dogs. How close is too close? Only the dog or his people know, so maintain distance and give them time to move out of your way.', '0000-00-00', 'published'),
(13, 'Life after dog\'s death', 'We need to survive', '0000-00-00', 'published');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
