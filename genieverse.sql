-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2023 at 12:37 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genieverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenthistory`
--

DROP TABLE IF EXISTS `appointmenthistory`;
CREATE TABLE IF NOT EXISTS `appointmenthistory` (
  `history_sno` int(11) NOT NULL AUTO_INCREMENT,
  `genie_sno` int(11) NOT NULL,
  `user_sno` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `occupation` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`history_sno`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointmenthistory`
--

INSERT INTO `appointmenthistory` (`history_sno`, `genie_sno`, `user_sno`, `user_email`, `occupation`, `datetime`) VALUES
(1, 1, 4, 'john@gmail.com', 'Carpenter', '2023-11-18 03:26:15'),
(2, 3, 4, 'john@gmail.com', 'Milk Man', '2023-11-18 03:26:15'),
(3, 4, 4, 'john@gmail.com', 'Mechanic', '2023-11-18 03:26:15'),
(4, 2, 2, 'michael@gmail.com', 'Plumber', '2023-09-21 15:50:00'),
(5, 5, 2, 'michael@gmail.com', 'Electrician', '2023-10-24 20:35:20'),
(6, 6, 1, 'james@gmail.com', 'Laundry', '2023-01-12 20:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`sno`, `name`, `email`, `subject`, `message`, `datetime`) VALUES
(1, 'ABC ', 'abc@gmail.com', 'Profile Edit', 'Need Help in Profile Editing', '2023-03-19 14:18:43'),
(2, 'XYZ', 'xyz@gmail.com', 'Account Access', 'I cant access my account', '2023-03-19 14:19:14'),
(3, 'PQR', 'pqr@gmail.com', 'Genie Appointment Cancel', 'How to cancel my Booking', '2023-11-13 16:26:16'),
(4, 'QWE', 'qwe@gmail.com', 'Appointment Process', 'Need help for getting appointment', '2023-11-22 20:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `genie_profile`
--

DROP TABLE IF EXISTS `genie_profile`;
CREATE TABLE IF NOT EXISTS `genie_profile` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `phoneno` varchar(11) CHARACTER SET utf8 NOT NULL,
  `occupation` text CHARACTER SET utf8 NOT NULL,
  `experience` text CHARACTER SET utf8 NOT NULL,
  `rating` float NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `profilepic` text CHARACTER SET utf8 NOT NULL,
  `gender` text CHARACTER SET utf8 NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phoneno` (`phoneno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genie_profile`
--

INSERT INTO `genie_profile` (`userid`, `name`, `username`, `email`, `password`, `phoneno`, `occupation`, `experience`, `rating`, `address`, `profilepic`, `gender`, `datetime`) VALUES
(1, 'Alex', 'Alex38', 'alex@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '9897215199', 'Carpenter', '10 years', 3.8, 'Alenberg', 'noDP.jpg', 'Male', '2023-03-19 12:18:07'),
(2, 'Stalin Bod', 'Stalin', 'stalinbod@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '7894561525', 'Plumber', '7 years', 4, 'Daily Cafe Road', 'noDP.jpg', 'Male', '2023-08-06 20:17:31'),
(3, 'Martin Joy', 'Martin', 'joymartin@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '7856986458', 'Milkman', '5 years', 4.5, ' New Street', 'noDP.jpg', 'Male', '2023-03-05 20:17:31'),
(4, 'Roger Gilf', 'Roger', 'rogerg@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '7530581705', 'Mechanic', '4 years', 3, 'New Shop City Road', 'noDP.jpg', 'Male', '2023-04-06 20:17:31'),
(5, 'Otis Adam', 'Otis', 'otis@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '6871594380', 'Electrician', '5 years', 3.5, 'Santa Cruz', 'noDP.jpg', 'Male', '2023-04-06 20:17:31'),
(6, 'Romanoff', 'Roman', 'roman@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '7984563120', 'Laundry', '8 years', 4, 'New Jersey', 'noDP.jpg', 'Male', '2023-04-06 20:17:31'),
(7, 'Natasha', 'natasha', 'natasha@gmail.com', '$2y$10$KTW/MXy99ezTYYglpGyp5OsBBHP3fdG2RjxveSoISP5K/5BXa7y0O', '7984565120', 'Laundry', '8.5 years', 4, 'New Jersey', 'noDP.jpg', 'Female', '2023-11-26 20:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_sno` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `rating` float NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_sno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_sno`, `username`, `name`, `email`, `rating`, `message`, `datetime`) VALUES
(1, 'Jackson', 'Jackson', 'jacksn@gmail.com', 4.5, 'Great work', '2023-11-18 03:26:15'),
(2, 'Lucas', 'Lucas', 'lucas@gmail.com', 3.6, 'Exellent Work', '2023-09-21 15:50:00'),
(3, 'William', 'William', 'William@gmail.com', 4.5, 'Good Service', '2023-10-24 20:35:20'),
(4, 'Jocab roy', 'Jocab roy', 'royjocab@gmail.com', 0, 'Good Work', '2023-01-12 20:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `user_sno` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `password` text NOT NULL,
  `state` text NOT NULL,
  `district` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_sno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_sno`, `user_name`, `user_email`, `password`, `state`, `district`, `datetime`) VALUES
(1, 'James', 'james@gmail.com', '$2y$10$qiJeOuWBvrK9SE3Hb6xBx.ptIMwWo6Up4HYCgA..l3vsY/x85NIFu', 'Uttar Pradesh', 'Aligarh', '2023-08-05 23:20:51'),
(2, 'Michael', 'michael@gmail.com', '$2y$10$3fqHQ/m.LH5FpBNG1K31cOHxCXSkfUZGwXg7ic4zHKMRCTazKnIxi', 'UP', 'Aligarh', '2023-11-07 21:39:31'),
(3, 'Andrew', 'andrew@gmail.com', '$2y$10$kNG/bElIHfaSl.f9L1XfAu4/B9H/MpByrg06H.xNH48ogM1WX55DK', 'Delhi', 'South West Delhi', '2023-11-13 16:24:06'),
(4, 'John', 'john@gmail.com', '$2y$10$s8x6ZbNNKd.pTLOzCRKllOut953ecXxa.e4nyz6CYW0NEpZMX.9ui', 'Uttar Pradesh', 'Agra', '2023-11-23 03:33:43'),
(5, 'otis', 'otis@gmail.com', '$2y$10$J8N6nDAu8v2PEWEduDir4.6Yksidueb550EG5Gzo/GekevmooLZGW', 'Nagaland', 'Dimapur', '2023-11-26 19:37:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
